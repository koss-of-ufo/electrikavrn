<?php
$pageTitle = 'Статьи об электромонтаже - советы электрика, инструкции, безопасность | ЭлектрикаВРН';
$pageDescription = 'Полезные статьи об электромонтаже от профессиональных электриков: пошаговые инструкции, советы по безопасности, рекомендации по экономии электроэнергии.';
$pageCanonical = 'https://electrikavrn.ru/articles';
$pageType = 'articles';
$pageImage = 'https://electrikavrn.ru/assets/images/articles/bezopasnaya-elektrika-avtomatika.jpg';


// Получаем имя статьи из URL (параметр article)
$article = $_GET['article'] ?? null;

if ($article) {
    // Очистка имени файла — разрешаем только буквы, цифры и дефисы
    if (preg_match('/^[a-z0-9\-]+$/i', $article)) {
        $filepath = __DIR__ . '/' . $article . '.php';
        if (file_exists($filepath)) {
            include $filepath;
            exit;
        } else {
            // Если файл не найден — 404
            header("HTTP/1.0 404 Not Found");
            include __DIR__ . '/../404.php'; // путь к 404
            exit;
        }
    } else {
        // Если в параметре что-то подозрительное — 400 или 404
        header("HTTP/1.0 400 Bad Request");
        exit('Неверный запрос');
    }
} else {
    // Главная страница статей, например:
    include __DIR__ . '/main.php'; // или что у тебя для списка статей
}


include 'head-articles.php';
?>

<body>
    <?php include 'preloader-articles.php'; ?>
    <?php include 'header-articles.php'; ?>

    <!-- Статьи -->
    <section class="py-5 mt-5">
        <div class="container">
            <h1 class="text-center mb-5">Полезная информация</h1>

            <!-- Фильтры -->
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">Все
                            статьи</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="safety">Безопасность</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="howto">Инструкции</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="tips">Советы</button>
                    </div>
                </div>
            </div>

            <!-- Список статей -->
            <div class="row g-4">
                <!-- Безопасность -->
                <div class="col-lg-4 col-md-6 article-item" data-category="safety" data-aos="fade-up">
                    <div class="card h-100">
                        <img src="assets/images/articles/bezopasnaya-elektrika-avtomatika.jpg" class="card-img-top" alt="Безопасность электропроводки" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-danger mb-2">Безопасность</span>
                            <h5 class="card-title">Как обеспечить безопасность электропроводки в доме</h5>
                            <p class="card-text">Основные правила и рекомендации по обеспечению безопасности
                                электропроводки в жилых помещениях. Узнайте, как защитить свой дом от электрических
                                проблем.</p>
                            <a href="/articles/electrical-safety-home" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 15.03.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Инструкции -->
                <div class="col-lg-4 col-md-6 article-item" data-category="howto" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="card h-100">
                        <img src="assets/images/articles/ustanovka-zamena-rozetok.png" class="card-img-top" alt="Замена розетки" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Инструкция</span>
                            <h5 class="card-title">Пошаговая инструкция по замене розетки</h5>
                            <p class="card-text">Подробное руководство по безопасной замене электрической розетки своими
                                руками. Все этапы работы с необходимыми мерами предосторожности.</p>
                            <a href="/articles/socket-replacement-guide" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 10.03.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Советы -->
                <div class="col-lg-4 col-md-6 article-item" data-category="tips" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="card h-100">
                        <img src="assets/images/articles/ekonomiya-elektroenergii.jpg" class="card-img-top" alt="Экономия электроэнергии" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Советы</span>
                            <h5 class="card-title">10 способов сэкономить на электроэнергии</h5>
                            <p class="card-text">Практические советы по снижению потребления электроэнергии и уменьшению
                                счетов за электричество. Эффективные методы экономии без ущерба комфорту.</p>
                            <a href="/articles/energy-saving-tips" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 05.03.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Требования к современной электрике -->
                <div class="col-lg-4 col-md-6 article-item" data-category="howto" data-aos="fade-up">
                    <div class="card h-100">
                        <img src="assets/images/articles/sovremennaya-electrica.png" class="card-img-top" alt="Требования к современной электрике" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Ремонт</span>
                            <h5 class="card-title">Каким требованиям должна соответствовать современная электрика</h5>
                            <p class="card-text">Современные требования к электрике в квартире и доме. Как правильно подготовиться к ремонту и обеспечить безопасность, надежность и комфорт.</p>
                            <a href="/articles/electrical-requirements" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 15.05.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Проверка электропроводки -->
                <div class="col-lg-4 col-md-6 article-item" data-category="tips" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="card h-100">
                        <img src="assets/images/articles/samostoyatelniy-remont.jpg" class="card-img-top" alt="Проверка электропроводки" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">Советы</span>
                            <h5 class="card-title">Как проверить свою электрическую проводку самостоятельно</h5>
                            <p class="card-text">Простые способы проверки состояния электропроводки без привлечения специалистов. Что можно и нужно проверять самостоятельно.</p>
                            <a href="/articles/wiring-check" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 18.05.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Заземление -->
                <div class="col-lg-4 col-md-6 article-item" data-category="safety" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="card h-100">
                        <img src="assets/images/articles/zazemlenie.jpg" class="card-img-top" alt="Схема заземления" style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-danger mb-2">Безопасность</span>
                            <h5 class="card-title">Зачем нужно заземление и нужно ли оно вообще?</h5>
                            <p class="card-text">Подробно о том, что такое заземление, зачем оно нужно, какие функции выполняет и как влияет на безопасность вашего дома.</p>
                            <a href="/articles/grounding-importance" class="btn btn-primary">Читать далее</a>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Опубликовано: 20.05.2024</small>
                        </div>
                    </div>
                </div>

                <!-- Добавьте больше статей по аналогии -->
            </div>
        </div>
    </section>

    <?php include 'footer-articles.php'; ?>
    <?php include 'modal-articles.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/articles.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>

</body>
</html>