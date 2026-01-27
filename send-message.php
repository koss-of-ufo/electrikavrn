<?php
header('Content-Type: application/json');

// Включаем отображение ошибок для отладки
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Создаем функцию для логирования
function writeLog($message) {
    $logFile = __DIR__ . '/debug.log';
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message" . PHP_EOL;
    @file_put_contents($logFile, $logMessage, FILE_APPEND);
}

writeLog('Скрипт начал выполнение');

// Загружаем конфигурацию
try {
    $config = require_once __DIR__ . '/bot/config.php';
    writeLog('Конфигурация загружена успешно');
} catch (Exception $e) {
    writeLog('Ошибка загрузки конфигурации: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Configuration error']);
    exit;
}

// Получаем источник запроса
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
writeLog('Origin запроса: ' . $origin);

if (!in_array($origin, $config['allowed_origins'])) {
    writeLog('Запрещенный origin: ' . $origin);
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden']);
    exit;
}

// Разрешаем CORS для разрешенных доменов
header("Access-Control-Allow-Origin: $origin");
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Max-Age: 86400'); // 24 часа

writeLog('CORS заголовки установлены');

// Обработка OPTIONS запроса
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    writeLog('Получен OPTIONS запрос');
    http_response_code(200);
    exit;
}

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    writeLog('Неверный метод запроса: ' . $_SERVER['REQUEST_METHOD']);
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

writeLog('Метод запроса: POST');

// Получаем JSON данные
$json = file_get_contents('php://input');
if (!$json) {
    writeLog('Не получены данные');
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

writeLog('Получены данные: ' . $json);

$data = json_decode($json, true);
if (!$data) {
    writeLog('Ошибка декодирования JSON: ' . json_last_error_msg());
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

writeLog('Данные успешно декодированы');

// Функция для получения реального IP
function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Функция для получения информации по IP
function getLocationInfo($ip) {
    $url = "http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,lat,lon,query&lang=ru";
    $response = @file_get_contents($url);
    if (!$response) {
        return [
            'city' => 'Неизвестно',
            'region' => 'Неизвестно',
            'country' => 'Неизвестно',
            'ip' => $ip,
            'lat' => null,
            'lon' => null
        ];
    }
    $data = json_decode($response, true);

    return $data && $data['status'] === 'success' ? [
        'city' => $data['city'] ?? 'Неизвестно',
        'region' => $data['regionName'] ?? 'Неизвестно',
        'country' => $data['country'] ?? 'Неизвестно',
        'ip' => $data['query'],
        'lat' => $data['lat'] ?? null,
        'lon' => $data['lon'] ?? null
    ] : [
        'city' => 'Неизвестно',
        'region' => 'Неизвестно',
        'country' => 'Неизвестно',
        'ip' => $ip,
        'lat' => null,
        'lon' => null
    ];
}

// Функция для получения адреса по координатам
function getAddressByCoordinates($latitude, $longitude) {
    if (!$latitude || !$longitude) {
        return [
            'city' => 'Неизвестно',
            'region' => 'Неизвестно',
            'country' => 'Неизвестно',
            'full_address' => 'Неизвестно'
        ];
    }

    $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$latitude}&lon={$longitude}&accept-language=ru";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if (!$response || $error) {
        return [
            'city' => 'Неизвестно',
            'region' => 'Неизвестно',
            'country' => 'Неизвестно',
            'full_address' => 'Неизвестно'
        ];
    }

    $data = json_decode($response, true);

    return !empty($data['address']) ? [
        'city' => $data['address']['city'] ?? $data['address']['town'] ?? $data['address']['village'] ?? 'Неизвестно',
        'region' => $data['address']['state'] ?? 'Неизвестно',
        'country' => $data['address']['country'] ?? 'Неизвестно',
        'full_address' => $data['display_name'] ?? 'Неизвестно'
    ] : [
        'city' => 'Неизвестно',
        'region' => 'Неизвестно',
        'country' => 'Неизвестно',
        'full_address' => 'Неизвестно'
    ];
}

// Получаем IP и местоположение
$ip = getRealIP();
writeLog('IP пользователя: ' . $ip);

$locationInfo = getLocationInfo($ip);
writeLog('Получена информация о местоположении');

// Получаем координаты из данных
$latitude = isset($data['latitude']) && $data['latitude'] !== 'Не указано' ? trim($data['latitude']) : ($locationInfo['lat'] ?? null);
$longitude = isset($data['longitude']) && $data['longitude'] !== 'Не указано' ? trim($data['longitude']) : ($locationInfo['lon'] ?? null);

// Если координаты переданы, получаем местоположение точнее
$geoInfo = ($latitude && $longitude) ? getAddressByCoordinates($latitude, $longitude) : $locationInfo;
writeLog('Геоинформация получена');

// Получаем данные из JSON
$name = isset($data['name']) ? trim($data['name']) : 'Не указано';
$phone = isset($data['phone']) ? trim($data['phone']) : 'Не указано';
$message = isset($data['message']) ? trim($data['message']) : 'Не указано';
$requestType = isset($data['request_type']) ? trim($data['request_type']) : 'form';

writeLog('Данные формы получены. Имя: ' . $name . ', Телефон: ' . $phone);

// Формируем сообщение для Telegram
$text = "<b>🔔 Новая заявка с сайта!</b>\n\n";
$text .= "<b>👤 Имя:</b> " . htmlspecialchars($name) . "\n";
$text .= "<b>📱 Телефон:</b> " . htmlspecialchars($phone) . "\n";
$text .= "<b>💬 Сообщение:</b> " . htmlspecialchars($message) . "\n\n";
$text .= "<b>🕒 Дата:</b> " . date('d.m.Y H:i:s') . "\n";
$text .= "<b>🌍 Страна:</b> " . htmlspecialchars($geoInfo['country']) . "\n";
$text .= "<b>🏠 Регион:</b> " . htmlspecialchars($geoInfo['region']) . "\n";
$text .= "<b>🌆 Город:</b> " . htmlspecialchars($geoInfo['city']) . "\n";
$text .= "<b>📍 Адрес:</b> " . htmlspecialchars($geoInfo['full_address'] ?? 'Неизвестно') . "\n";
$text .= "<b>🌐 IP:</b> " . htmlspecialchars($locationInfo['ip']) . "\n";

if ($latitude && $longitude) {
    $text .= "<b>🗺️ Координаты:</b> {$latitude}, {$longitude}\n";
    if (isset($data['location_source'])) {
        $text .= "<b>📍 Источник координат:</b> " . ($data['location_source'] === 'browser' ? 'Браузер' : 'IP') . "\n";
    }
} else {
    $text .= "<b>📌 Местоположение определено по IP</b>\n";
}

// Добавляем источник заявки
switch ($requestType) {
    case 'call':
        $text .= "<b>📞 Источник:</b> Заказ звонка\n";
        break;
    case 'telegram':
        $text .= "<b>📞 Источник:</b> Telegram\n";
        break;
    case 'vk':
        $text .= "<b>📞 Источник:</b> ВКонтакте\n";
        break;
    case 'whatsapp':
        $text .= "<b>📞 Источник:</b> WhatsApp\n";
        break;
    default:
        $text .= "<b>📞 Источник:</b> Форма на сайте\n";
        break;
}

writeLog('Сообщение для Telegram сформировано');

// Отправка в Telegram
$telegram_api_url = "https://api.telegram.org/bot" . $config['token'] . "/sendMessage";
$telegram_data = [
    'chat_id' => $config['admin_chat_id'],
    'text' => $text,
    'parse_mode' => 'HTML',
    'disable_web_page_preview' => true
];

writeLog('Подготовка к отправке в Telegram');

try {
    writeLog('Начало отправки в Telegram');
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegram_api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegram_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    writeLog('CURL опции установлены');
    
    $result = curl_exec($ch);
    $error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    writeLog('CURL выполнен. HTTP код: ' . $http_code);
    if ($error) {
        writeLog('CURL ошибка: ' . $error);
    }
    if ($result) {
        writeLog('Ответ Telegram: ' . $result);
    }
    
    curl_close($ch);
    
    if ($error) {
        throw new Exception('Ошибка CURL: ' . $error);
    }
    
    if ($http_code !== 200) {
        throw new Exception('Ошибка HTTP: ' . $http_code);
    }
    
    // Проверяем успешность отправки
    $response = json_decode($result, true);
    if (!isset($response['ok']) || $response['ok'] !== true) {
        throw new Exception('Ошибка Telegram: ' . ($response['description'] ?? 'Неизвестная ошибка'));
    }
    
    writeLog('Сообщение успешно отправлено в Telegram');
    
    // Запись в лог заявок
    $leadsLogMessage = date('Y-m-d H:i:s') . ' | Новая заявка | Телефон: ' . $phone . ' | IP: ' . $ip . ' | Тип: ' . $requestType . PHP_EOL;
    $leadsLogFile = __DIR__ . '/bot/leads.log';
    
    if (@file_put_contents($leadsLogFile, $leadsLogMessage, FILE_APPEND)) {
        writeLog('Заявка записана в лог');
    } else {
        writeLog('Ошибка записи в лог заявок');
    }
    
    // Возвращаем успешный ответ
    echo json_encode(['success' => true, 'message' => 'Заявка успешно отправлена']);
    writeLog('Отправлен успешный ответ клиенту');
    
} catch (Exception $e) {
    $errorMessage = "Ошибка отправки в Telegram: " . $e->getMessage();
    writeLog($errorMessage);
    error_log($errorMessage);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Ошибка отправки заявки: ' . $e->getMessage()]);
} 