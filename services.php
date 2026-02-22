<?php
$pageTitle = 'Услуги электрика в Воронеже: цены на электромонтажные работы 2024 | ЭлектрикаВРН';
$pageDescription = 'Электромонтажные работы в Воронеже: квартиры от 15000₽, дома от 25000₽, офисы от 20000₽. Замена проводки от 50₽/м, установка розеток от 150₽. Срочный выезд электрика 24/7. Гарантия до 5 лет.';
$pageCanonical = 'https://electrikavrn.ru/services';
$pageType = 'services';
$pageImage = 'https://electrikavrn.ru/assets/images/services/elektromontazh-white.jpg';

// Определяем услуги для Schema.org
$services = [
    [
        "name" => "Электромонтаж в квартирах",
        "description" => "Полный комплекс электромонтажных работ в квартирах",
        "lowPrice" => 15000,
        "highPrice" => 50000,
        "offers" => [
            ["name" => "Замена проводки", "price" => 50, "unitText" => "м.п."],
            ["name" => "Установка розетки", "price" => 150, "unitText" => "шт."]
        ]
    ],
    [
        "name" => "Электромонтаж в частных домах",
        "description" => "Комплексный электромонтаж в частных домах и коттеджах",
        "lowPrice" => 25000,
        "highPrice" => 100000
    ],
    [
        "name" => "Коммерческий электромонтаж",
        "description" => "Электромонтажные работы в офисах и коммерческих помещениях",
        "lowPrice" => 20000,
        "highPrice" => 150000
    ]
];

// FAQ для Schema.org
$faq = [
    [
        "question" => "Какие виды электромонтажных работ вы выполняете?",
        "answer" => "Мы выполняем полный спектр электромонтажных работ: замена и монтаж проводки, установка розеток и выключателей, сборка электрощитов, монтаж освещения, подключение бытовой техники и другие работы."
    ],
    [
        "question" => "Сколько стоит вызов электрика на дом?",
        "answer" => "Выезд электрика в пределах города бесплатный при заказе работ. Стоимость срочного выезда - от 1000₽."
    ],
    [
        "question" => "Даете ли вы гарантию на работы?",
        "answer" => "Да, мы предоставляем гарантию до 5 лет на все выполненные работы. Гарантия подтверждается документально."
    ]
];

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>

    <!-- Основной контент -->
    <main>
        <!-- Секция для жилых помещений -->
        <section id="residential" class="py-5">
            <div class="container mt-5">
                <h2 class="text-center mb-5 pt-4" data-aos="fade-up">Услуги для жилых помещений</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-plug fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Замена проводки</h3>
                                <p>Полная или частичная замена электропроводки в квартирах и домах</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-lightbulb fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Монтаж освещения</h3>
                                <p>Установка и подключение люстр, светильников, точечного освещения</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-bolt fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Электрощиты</h3>
                                <p>Сборка и установка электрощитов, замена автоматов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Секция для коммерческих объектов -->
        <section id="commercial" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Услуги для коммерческих объектов</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-store fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Электромонтаж в магазинах</h3>
                                <p>Монтаж освещения, силовых линий и слаботочных систем в торговых помещениях</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-building fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Офисные помещения</h3>
                                <p>Комплексный электромонтаж в офисах, включая компьютерные сети</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-utensils fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Рестораны и кафе</h3>
                                <p>Монтаж силовых линий для кухонного оборудования, освещения залов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Секция для промышленных объектов -->
        <section id="industrial" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Промышленный электромонтаж</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-industry fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Производственные помещения</h3>
                                <p>Монтаж силовых линий для станков и промышленного оборудования</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-warehouse fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Складские комплексы</h3>
                                <p>Освещение складов, монтаж силовых линий для погрузочной техники</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="fas fa-cogs fa-3x mb-4 text-primary"></i>
                                <h3 class="h5">Автоматизация</h3>
                                <p>Монтаж систем автоматизации производственных процессов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Секция аварийного вызова -->
        <section id="emergency" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Аварийный вызов электрика</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-exclamation-triangle fa-3x mb-4 text-warning"></i>
                                <h3 class="h5 mb-4">Срочный выезд электрика 24/7</h3>
                                <p class="mb-4">Оперативный выезд специалиста для устранения аварийных ситуаций в любое
                                    время суток</p>
                                <a href="#contact" class="btn btn-primary rounded-pill px-4" data-callback>
                                    <i class="fas fa-phone-alt me-2"></i>Вызвать электрика
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- Скрипты -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        // Инициализация AOS после загрузки всех скриптов
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: false
            });
        });
    </script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>    

</body>
</html>