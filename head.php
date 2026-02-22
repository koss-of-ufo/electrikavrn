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

function getArticlesSchema($metaTags, $articles = null) {
    // Если статьи не переданы, используем дефолтный список
    if ($articles === null) {
        $articles = [
            [
                "url" => SITE_URL . "/articles/electrical-safety-home",
                "name" => "Как обеспечить безопасность электропроводки в доме",
                "description" => "Основные правила и рекомендации по обеспечению безопасности электропроводки в жилых помещениях",
                "image" => SITE_URL . "/assets/images/articles/bezopasnaya-elektrika-avtomatika.jpg",
                "datePublished" => "2024-03-15"
            ],
            [
                "url" => SITE_URL . "/articles/socket-replacement-guide",
                "name" => "Пошаговая инструкция по замене розетки",
                "description" => "Подробное руководство по безопасной замене электрической розетки своими руками",
                "image" => SITE_URL . "/assets/images/articles/ustanovka-zamena-rozetok.png",
                "datePublished" => "2024-03-10"
            ],
            [
                "url" => SITE_URL . "/articles/energy-saving-tips",
                "name" => "10 способов сэкономить на электроэнергии",
                "description" => "Практические советы по снижению потребления электроэнергии",
                "image" => SITE_URL . "/assets/images/articles/ekonomiya-elektroenergii.jpg",
                "datePublished" => "2024-03-05"
            ]
        ];
    }

    return [
        "@context" => "https://schema.org",
        "@type" => "CollectionPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Статьи', 'url' => SITE_URL . '//articles']
        ]),
        "mainEntity" => [
            "@type" => "ItemList",
            "itemListElement" => array_map(function($article, $index) {
                return array_merge(
                    ["@type" => "Article", "position" => $index + 1],
                    $article
                );
            }, $articles, array_keys($articles))
        ]
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

function getWebPageSchema($metaTags, $breadcrumbItems) {
    return [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList($breadcrumbItems)
    ];
}

function getServicesSchema($metaTags) {
    return [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Услуги', 'url' => SITE_URL . '//services']
        ]),
        "mainEntity" => [
            "@type" => "Service",
            "provider" => [
                "@type" => "Organization",
                "name" => SITE_NAME,
                "url" => SITE_URL
            ],
            "areaServed" => [
                "@type" => "City",
                "name" => "Воронеж"
            ]
        ]
    ];
}

function getProjectsSchema($metaTags, $projects = null) {
    return [
        "@context" => "https://schema.org",
        "@type" => "CollectionPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Проекты', 'url' => SITE_URL . '//projects']
        ])
    ];
}

function getCalculatorSchema($metaTags) {
    return [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Калькулятор', 'url' => SITE_URL . '//calculate']
        ])
    ];
}

function getContactsSchema($metaTags) {
    return [
        "@context" => "https://schema.org",
        "@type" => "ContactPage",
        "name" => $metaTags['title'],
        "description" => $metaTags['description'],
        "publisher" => [
            "@type" => "Organization",
            "name" => SITE_NAME,
            "url" => SITE_URL
        ],
        "breadcrumb" => getBreadcrumbList([
            ['name' => 'Главная', 'url' => SITE_URL],
            ['name' => 'Контакты', 'url' => SITE_URL . '//contacts']
        ]),
        "mainEntity" => getOrganizationSchema()
    ];
}

// Инициализация метатегов
$metaTags = getDefaultMetaTags($pageTitle ?? null, $pageDescription ?? null, $pageCanonical ?? null);

// Формирование Schema.org разметки
if (!isset($schemaMarkup)) {
    switch ($pageType ?? '') {
        case 'home':
            $schemaMarkup = getOrganizationSchema();
            break;
        case 'articles':
            $schemaMarkup = getArticlesSchema($metaTags, $articles ?? null);
            break;
        case 'article':
            if (isset($article)) {
                $schemaMarkup = getArticleSchema($metaTags, $article);
            } else {
                $schemaMarkup = getWebPageSchema($metaTags, [
                    ['name' => 'Главная', 'url' => SITE_URL]
                ]);
            }
            break;
        case 'services':
            $schemaMarkup = getServicesSchema($metaTags);
            break;
        case 'projects':
            $schemaMarkup = getProjectsSchema($metaTags);
            break;
        case 'calculator':
            $schemaMarkup = getCalculatorSchema($metaTags);
            break;
        case 'contacts':
            $schemaMarkup = getContactsSchema($metaTags);
            break;
        case 'privacy':
            $schemaMarkup = getWebPageSchema($metaTags, [
                ['name' => 'Главная', 'url' => SITE_URL],
                ['name' => 'Политика конфиденциальности', 'url' => SITE_URL . '//privacy']
            ]);
            break;
        case 'sitemap':
            $schemaMarkup = getWebPageSchema($metaTags, [
                ['name' => 'Главная', 'url' => SITE_URL],
                ['name' => 'Карта сайта', 'url' => SITE_URL . '//sitemap']
            ]);
            break;
        default:
            $schemaMarkup = getWebPageSchema($metaTags, [
                ['name' => 'Главная', 'url' => SITE_URL]
            ]);
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
    <meta name="keywords" content="электромонтаж Воронеж, электрик Воронеж, замена проводки, установка розеток, электромонтажные работы, вызов электрика">
    
    <!-- Canonical -->
    <link rel="canonical" href="<?php echo $metaTags['canonical']; ?>">
    
    <!-- Open Graph -->
    <meta property="og:type" content="<?php echo $pageType === 'article' ? 'article' : 'website'; ?>">
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
    <link rel="icon" type="image/png" href="assets/favicon.png">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link href="css/variables.css" rel="stylesheet">
    <link href="css/components.css" rel="stylesheet">
    <link href="css/pages.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/cookie-notice.css" rel="stylesheet">

    <?php if (isset($additionalCss) && is_array($additionalCss)): ?>
        <?php foreach ($additionalCss as $cssFile): ?>
            <link href="<?php echo $cssFile; ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php include 'included/ya-metrika.php'; ?>
</head>
