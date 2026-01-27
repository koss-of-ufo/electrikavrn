<?php
// Базовые настройки сайта
define('SITE_URL', 'https://electrikavrn.ru');
define('SITE_NAME', 'ЭлектрикаВРН');
define('SITE_DESCRIPTION', 'Профессиональные электромонтажные работы в Воронеже');

// Функция для генерации базовых мета-тегов
function getDefaultMetaTags($pageTitle, $pageDescription, $pageImage) {
    return [
        'title' => $pageTitle,
        'description' => $pageDescription,
        'og:title' => $pageTitle,
        'og:description' => $pageDescription,
        'og:type' => 'article',
        'og:image' => $pageImage,
        'og:url' => SITE_URL . $_SERVER['REQUEST_URI'],
        'og:site_name' => SITE_NAME,
        'og:locale' => 'ru_RU'
    ];
}

// Функция для генерации разметки Schema.org для организации
function getOrganizationSchema() {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => SITE_NAME,
        'email' => 'electrikavrn@yandex.ru',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Воронеж',
            'addressCountry' => 'RU'
        ]
    ];
}

// Функция для генерации разметки Schema.org для хлебных крошек
function getBreadcrumbList($items) {
    $itemListElement = [];
    foreach ($items as $index => $item) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['url']
        ];
    }
    
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];
}

// Функция для генерации разметки Schema.org для проекта
function getProjectSchema($project) {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $project['name'],
        'description' => $project['description'],
        'image' => $project['image'],
        'offers' => [
            '@type' => 'Offer',
            'price' => $project['price'],
            'priceCurrency' => 'RUB',
            'availability' => 'https://schema.org/InStock',
            'priceValidUntil' => $project['priceValidUntil']
        ],
        'brand' => [
            '@type' => 'Brand',
            'name' => SITE_NAME
        ],
        'additionalProperty' => $project['properties']
    ];
}

// Инициализация мета-тегов
$metaTags = getDefaultMetaTags($pageTitle, $pageDescription, $pageImage);

// Формирование JSON-LD разметки
$schemaMarkup = [
    getProjectSchema($project),
    getBreadcrumbList($breadcrumbItems),
    getOrganizationSchema()
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Мета-теги -->
    <title><?php echo $metaTags['title']; ?></title>
    <meta name="description" content="<?php echo $metaTags['description']; ?>">
    
    <!-- Canonical -->
    <link rel="canonical" href="<?php echo $pageCanonical; ?>">
    
    <!-- Open Graph -->
    <?php foreach ($metaTags as $property => $content): ?>
        <?php if (strpos($property, 'og:') === 0): ?>
            <meta property="<?php echo $property; ?>" content="<?php echo $content; ?>">
        <?php endif; ?>
    <?php endforeach; ?>
    
    <!-- Schema.org разметка -->
    <?php foreach ($schemaMarkup as $schema): ?>
        <script type="application/ld+json">
            <?php echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        </script>
    <?php endforeach; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/pages.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
</head>
</rewritten_file> 