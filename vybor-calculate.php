<?php
$pageTitle = 'Калькуляторы стоимости электромонтажа в Воронеже | ЭлектрикаВРН';
$pageDescription = 'Онлайн калькуляторы для расчета стоимости электромонтажа в Воронеже. Простой и профессиональный расчет цены работ для квартир, домов и офисов. Актуальные цены 2024 года.';
$pageCanonical = 'https://electrikavrn.ru/vybor-calculate.php';
$pageType = 'calculator';
$pageImage = 'https://electrikavrn.ru/assets/images/services/elektromontazh-white.jpg';

// Определяем калькуляторы для Schema.org
$calculators = [
    [
        "name" => "Простой калькулятор",
        "description" => "Калькулятор для быстрого расчета стоимости базовых электромонтажных работ",
        "url" => "https://electrikavrn.ru/calculate-dlya-chaynikov.php",
        "applicationCategory" => "CalculatorApplication"
    ],
    [
        "name" => "Профессиональный калькулятор",
        "description" => "Детальный калькулятор для точного расчета стоимости всех видов электромонтажных работ",
        "url" => "https://electrikavrn.ru/calculate.php",
        "applicationCategory" => "CalculatorApplication"
    ]
];

// FAQ для Schema.org
$faq = [
    [
        "question" => "Какой калькулятор выбрать?",
        "answer" => "Если вам нужен быстрый предварительный расчет - используйте простой калькулятор. Для точного расчета с учетом всех деталей выберите профессиональный калькулятор."
    ],
    [
        "question" => "Учитывают ли калькуляторы стоимость материалов?",
        "answer" => "Калькуляторы рассчитывают стоимость работ без учета материалов. Точную стоимость материалов можно узнать после составления сметы."
    ]
];

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>

    <!-- Заголовок страницы -->
    <section class="py-5 mt-5">
        <div class="container">
            <h1 class="text-center mb-5">Выберите тип калькулятора</h1>
            <div class="row justify-content-center">
                <div class="col-md-6 mb-4">
                    <div class="card h-100" data-aos="fade-up">
                        <div class="card-body text-center p-5">
                            <i class="fas fa-calculator fa-4x mb-4 text-primary"></i>
                            <h3 class="card-title mb-4">Калькулятор предварительного расчета</h3>
                            <p class="card-text mb-4">
                                Калькулятор для предварительного расчета стоимости работ по базовым параметрам помещения.
                                Подходит для предварительной оценки стоимости работ.
                            </p>
                            <ul class="list-unstyled text-start mb-4">
                                <li><i class="fas fa-check text-success me-2"></i> Указываете тип помещения</li>
                                <li><i class="fas fa-check text-success me-2"></i> Вводите количество комнат</li>
                                <li><i class="fas fa-check text-success me-2"></i> Указываете площадь</li>
                                <li><i class="fas fa-check text-success me-2"></i> Выбираете тип работ</li>
                            </ul>
                            <a href="calculate-dlya-chaynikov.php" class="btn btn-primary btn-lg">
                                Перейти к расчету
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-body text-center p-5">
                            <i class="fas fa-tools fa-4x mb-4 text-primary"></i>
                            <h3 class="card-title mb-4">Калькулятор для "профи"</h3>
                            <p class="card-text mb-4">
                                Детальный расчет стоимости по конкретным видам работ и материалам.
                                Для точного расчета уже известных объемов.
                            </p>
                            <ul class="list-unstyled text-start mb-4">
                                <li><i class="fas fa-check text-success me-2"></i> Расчет по типам работ</li>
                                <li><i class="fas fa-check text-success me-2"></i> Учет материалов</li>
                                <li><i class="fas fa-check text-success me-2"></i> Щитовое оборудование</li>
                                <li><i class="fas fa-check text-success me-2"></i> Точная стоимость</li>
                            </ul>
                            <a href="calculate.php" class="btn btn-primary btn-lg">
                                Перейти к расчету
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>

</body>
</html>