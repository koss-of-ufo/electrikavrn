<?php
$pageTitle = "Карта сайта | ЭлектрикаВРН";
$pageDescription = "Карта сайта ЭлектрикаВРН. Полный список всех страниц и разделов сайта для удобной навигации.";
$pageCanonical = "https://electrikavrn.ru/sitemap.php";
$pageType = "sitemap";

// Schema.org разметка для страницы
$schemaMarkup = [
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "name" => "Карта сайта",
    "description" => "Карта сайта ЭлектрикаВРН. Полный список всех страниц и разделов сайта для удобной навигации.",
    "url" => "https://electrikavrn.ru/sitemap.php",
    "isPartOf" => [
        "@type" => "WebSite",
        "name" => "ЭлектрикаВРН",
        "url" => "https://electrikavrn.ru/"
    ],
    "breadcrumb" => [
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Главная",
                "item" => "https://electrikavrn.ru/"
            ],
            [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "Карта сайта",
                "item" => "https://electrikavrn.ru/sitemap.php"
            ]
        ]
    ],
    "mainEntity" => [
        "@type" => "SiteNavigationElement",
        "name" => "Карта сайта ЭлектрикаВРН",
        "description" => "Навигационная структура сайта электромонтажной компании ЭлектрикаВРН",
        "hasPart" => [
            [
                "@type" => "SiteNavigationElement",
                "name" => "Главная",
                "url" => "https://electrikavrn.ru/"
            ],
            [
                "@type" => "SiteNavigationElement",
                "name" => "Услуги",
                "url" => "https://electrikavrn.ru/services.php"
            ],
            [
                "@type" => "SiteNavigationElement",
                "name" => "Проекты",
                "url" => "https://electrikavrn.ru/projects.php"
            ],
            [
                "@type" => "SiteNavigationElement",
                "name" => "Статьи",
                "url" => "https://electrikavrn.ru/articles.php"
            ],
            [
                "@type" => "SiteNavigationElement",
                "name" => "Калькулятор",
                "url" => "https://electrikavrn.ru/calculate.php"
            ],
            [
                "@type" => "SiteNavigationElement",
                "name" => "Контакты",
                "url" => "https://electrikavrn.ru/contacts.php"
            ]
        ]
    ]
];

include 'head.php';
?>

<body>
<?php include 'preloader.php'; ?>
<?php include 'header.php'; ?>

<!-- Основной контент карты сайта -->
<section class="py-5 mt-5">
    <div class="container">
        <h1 class="text-center mb-5">Карта сайта</h1>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow" data-aos="fade-up">
                    <div class="card-body">
                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Главные разделы</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="index.php">Главная страница</a></li>
                                <li class="mb-2"><a href="services.php">Услуги</a></li>
                                <li class="mb-2"><a href="projects.php">Проекты</a></li>
                                <li class="mb-2"><a href="gallery.php">Галерея</a></li>
                                <li class="mb-2"><a href="articles.php">Статьи</a></li>
                                <li class="mb-2"><a href="contacts.php">Контакты</a></li>
                            </ul>
                        </div>

                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Услуги</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="services.php#residential">Для жилых помещений</a></li>
                                <li class="mb-2"><a href="services.php#commercial">Для коммерческих объектов</a></li>
                                <li class="mb-2"><a href="services.php#industrial">Промышленный электромонтаж</a></li>
                                <li class="mb-2"><a href="services.php#emergency">Аварийный вызов</a></li>
                            </ul>
                        </div>

                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Калькуляторы</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="vybor-calculate.php">Список всех калькуляторов</a></li>
                                <li class="mb-2"><a href="calculate-dlya-chaynikov.php">Калькулятор предварительного расчета</a></li>
                                <li class="mb-2"><a href="calculate.php">Детальный расчет</a></li>
                            </ul>
                        </div>

                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Статьи</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="articles.php">Все статьи</a></li>
                                <li class="mb-2"><a href="articles/electrical-safety-home.php">Как обеспечить безопасность электропроводки в доме</a></li>
                                <li class="mb-2"><a href="articles/socket-replacement-guide.php">Пошаговая инструкция по замене розетки</a></li>
                                <li class="mb-2"><a href="articles/energy-saving-tips.php">10 способов сэкономить на электроэнергии</a></li>
                                <li class="mb-2"><a href="articles/electrical-requirements.php">Каким требованиям должна соответствовать современная электрика</a></li>
                                <li class="mb-2"><a href="articles/wiring-check.php">Как проверить свою электрическую проводку самостоятельно</a></li>
                                <li class="mb-2"><a href="articles/grounding-importance.php">Зачем нужно заземление и нужно ли оно вообще?</a></li>
                            </ul>
                        </div>

                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Проекты</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="projects.php">Все проекты</a></li>
                                <li class="mb-2"><a href="projects/house-comfort.php">Электромонтаж в частном доме (комфорт)</a></li>
                                <li class="mb-2"><a href="projects/house-budget.php">Электромонтаж в частном доме (бюджет)</a></li>
                                <li class="mb-2"><a href="projects/2room-comfort.php">Электромонтаж в 2-комнатной квартире (комфорт)</a></li>
                                <li class="mb-2"><a href="projects/2room-budget.php">Электромонтаж в 2-комнатной квартире (бюджет)</a></li>
                                <li class="mb-2"><a href="projects/1room-comfort.php">Электромонтаж в 1-комнатной квартире (комфорт)</a></li>
                                <li class="mb-2"><a href="projects/1room-budget.php">Электромонтаж в 1-комнатной квартире (бюджет)</a></li>
                            </ul>
                        </div>

                        <div class="sitemap-section mb-4">
                            <h2 class="h4 mb-3">Дополнительная информация</h2>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="privacy.php">Политика конфиденциальности</a></li>
                                <li class="mb-2"><a href="sitemap.php">Карта сайта</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
include 'modal.php';
?>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/main.js"></script>
<script src="js/callback.js"></script>

<script>
    // Инициализация AOS после полной загрузки страницы
    window.addEventListener('load', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Скрываем прелоадер после инициализации AOS
        document.getElementById('preloader').style.display = 'none';
    });
</script>
</body>
</html>