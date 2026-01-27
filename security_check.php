<?php
// Установите пароль для доступа к скрипту
$access_password = '1234koss';

// Проверка пароля
if (!isset($_POST['password']) || $_POST['password'] !== $access_password) {
    ?>
    <form method="post">
        <input type="password" name="password" placeholder="Введите пароль">
        <input type="submit" value="Войти">
    </form>
    <?php
    exit;
}

// Паттерны для поиска подозрительного кода
$suspicious_patterns = [
    'flag-gimn\.ru',
    '<audio[^>]*>',
    'base64_decode\(',
    'eval\(',
    'gzinflate\(',
    'str_rot13\(',
    '\\x[0-9a-fA-F]{2}',
    'document\.write\(',
    'fromCharCode\(',
    'eval\s*\(.*\)',
];

// Расширения файлов для проверки
$file_extensions = ['php', 'js', 'html', 'htm'];

// Функция для получения контекста вокруг найденного совпадения
function getContext($content, $match, $position, $context_lines = 3) {
    $lines = explode("\n", $content);
    $line_number = substr_count(substr($content, 0, $position), "\n") + 1;
    
    $start = max(0, $line_number - $context_lines - 1);
    $end = min(count($lines), $line_number + $context_lines);
    
    $context = [];
    for ($i = $start; $i < $end; $i++) {
        $context[] = [
            'line' => $i + 1,
            'content' => $lines[$i],
            'is_match' => ($i + 1 == $line_number)
        ];
    }
    
    return $context;
}

// Функция для сканирования директории
function scanDirectory($dir) {
    global $suspicious_patterns, $file_extensions;
    $results = [];
    $script_name = basename(__FILE__);
    
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($files as $file) {
        // Пропускаем текущий скрипт проверки
        if ($file->getFilename() === $script_name) {
            continue;
        }
        
        if ($file->isFile()) {
            $ext = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
            if (in_array($ext, $file_extensions)) {
                $content = file_get_contents($file->getPathname());
                foreach ($suspicious_patterns as $pattern) {
                    if (preg_match("/$pattern/i", $content, $matches, PREG_OFFSET_CAPTURE)) {
                        $context = getContext($content, $matches[0][0], $matches[0][1]);
                        $results[] = [
                            'file' => $file->getPathname(),
                            'pattern' => $pattern,
                            'match' => $matches[0][0],
                            'modified' => date("Y-m-d H:i:s", filemtime($file->getPathname())),
                            'context' => $context
                        ];
                    }
                }
            }
        }
    }
    
    return $results;
}

// Начало сканирования
$start_time = microtime(true);
$results = scanDirectory(__DIR__);
$end_time = microtime(true);
$scan_time = round($end_time - $start_time, 2);

// Вывод результатов
?>
<!DOCTYPE html>
<html>
<head>
    <title>Проверка безопасности сайта</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .result { margin: 10px 0; padding: 10px; border: 1px solid #ddd; }
        .suspicious { background-color: #ffe6e6; }
        .info { background-color: #e6f3ff; }
        .context { font-family: monospace; white-space: pre; margin: 10px 0; padding: 10px; background: #f5f5f5; }
        .match-line { background: #ffd7d7; }
        .line-number { color: #666; margin-right: 10px; }
    </style>
</head>
<body>
    <h1>Результаты проверки безопасности</h1>
    <div class="info">
        Время сканирования: <?php echo $scan_time; ?> секунд<br>
        Всего найдено подозрительных фрагментов: <?php echo count($results); ?>
    </div>
    
    <?php foreach ($results as $result): ?>
    <div class="result suspicious">
        <strong>Файл:</strong> <?php echo htmlspecialchars($result['file']); ?><br>
        <strong>Паттерн:</strong> <?php echo htmlspecialchars($result['pattern']); ?><br>
        <strong>Найдено:</strong> <?php echo htmlspecialchars($result['match']); ?><br>
        <strong>Последнее изменение:</strong> <?php echo $result['modified']; ?>
        
        <div class="context">
            <?php foreach ($result['context'] as $line): ?>
            <div class="<?php echo $line['is_match'] ? 'match-line' : ''; ?>">
                <span class="line-number"><?php echo str_pad($line['line'], 4, ' ', STR_PAD_LEFT); ?></span>
                <?php echo htmlspecialchars($line['content']); ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
    
    <?php if (empty($results)): ?>
    <div class="result info">
        Подозрительный код не найден
    </div>
    <?php endif; ?>
</body>
</html> 