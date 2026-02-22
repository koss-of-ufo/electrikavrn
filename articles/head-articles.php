<?php
/**
 * Конфигурация сайта
 */
define('SITE_URL', 'https://electrikavrn.ru');
define('SITE_NAME', 'ЭлектрикаВРН');
define('SITE_DESCRIPTION', 'Профессиональные электромонтажные работы в Воронеже');

/**
 * Функции для работы с метаданными и Schema.org разметкой
 */
function getDefaultMetaTags($pageTitle = null, $pageDescription = null, $pageCanonical = null) {
    return [
        'title' => $pageTitle ?? SITE_NAME . ' - ' . SITE_DESCRIPTION,
        'description' => $pageDescription ?? SITE_DESCRIPTION,
        'canonical' => $pageCanonical ?? SITE_URL
    ];
}

function getOrganizationSchema() {
    return [
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => SITE_NAME,
        "url" => SITE_URL,
        "logo" => SITE_URL . "/assets/images/logo.png",
        "description" => SITE_DESCRIPTION,
        "address" => [
            "@type" => "PostalAddress",
            "addressLocality" => "Воронеж",
            "addressRegion" => "Воронежская область",
            "addressCountry" => "RU"
        ],
        "contactPoint" => [
            "@type" => "ContactPoint",
            "telephone" => "+7 (473) 229-45-69",
            "contactType" => "customer service"
        ],
        "sameAs" => [
            "https://vk.com/electrikavrn",
            "https://t.me/electrikavrn"
        ]
    ];
}

function getBreadcrumbList($items) {
    return [
        "@type" => "BreadcrumbList",
        "itemListElement" => array_map(function($item, $index) {
            return [
                "@type" => "ListItem",
                "position" => $index + 1,
                "name" => $item['name'],
                "item" => $item['url']
            ];
        }, $items, array_keys($items))
    ];
}

function getArticleSchema($metaTags, $article) {
    return [
        "@context" => "https://schema.org",
        "@type" => "Article",
        "headline" => $article['name'],
        "description" => $article['description'],
        "image" => $article['image'],
        "datePublished" => $article['datePublished'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Статьи', 'url' => SITE_URL . '//articles'],
            ['name' => $article['name'], 'url' => $article['url']]
        ])
    ];
}

// Инициализация метатегов
$metaTags = getDefaultMetaTags($pageTitle ?? null, $pageDescription ?? null, $pageCanonical ?? null);

// Формирование Schema.org разметки
if (!isset($schemaMarkup)) {
    if (isset($article)) {
        $schemaMarkup = getArticleSchema($metaTags, $article);
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTags['title']; ?></title>
    <meta name="description" content="<?php echo $metaTags['description']; ?>">
    
    <!-- Canonical -->
    <link rel="canonical" href="<?php echo $metaTags['canonical']; ?>">
    
    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo $metaTags['title']; ?>">
    <meta property="og:description" content="<?php echo $metaTags['description']; ?>">
    <meta property="og:url" content="<?php echo $metaTags['canonical']; ?>">
    <?php if (isset($pageImage)): ?>
    <meta property="og:image" content="<?php echo $pageImage; ?>">
    <?php endif; ?>
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    <meta property="og:locale" content="ru_RU">
    
    <!-- Schema.org разметка -->
    <?php if (isset($schemaMarkup)): ?>
    <script type="application/ld+json">
    <?php echo json_encode($schemaMarkup, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/favicon.png">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="../css/variables.css" rel="stylesheet">
    <link href="../css/components.css" rel="stylesheet">
    <link href="../css/pages.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/modal.css" rel="stylesheet">
</head> 