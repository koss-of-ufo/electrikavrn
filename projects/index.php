<?php
$pageTitle = 'Наши проекты электромонтажа в Воронеже - ЭлектрикаВРН';
$pageDescription = 'Готовые проекты электромонтажа в Воронеже: квартиры, частные дома, коммерческие помещения. Бюджетные и комфортные варианты с подробными планами и расчетами.';
$pageCanonical = 'https://electrikavrn.ru/projects';
$pageType = 'projects';
$pageImage = 'https://electrikavrn.ru/assets/images/projects/dom-90-kv/kollag-dom90-komfort.jpg';

// Получаем имя проекта из URL (параметр project)
$project = $_GET['project'] ?? null;

if ($project) {
    // Очистка имени файла — разрешаем только буквы, цифры и дефисы
    if (preg_match('/^[a-z0-9\-]+$/i', $project)) {
        $filepath = __DIR__ . '/' . $project . '.php';
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
    // Главная страница проектов
    include __DIR__ . '/main.php'; // замени на нужный файл, если не main.php
}

include '../articles/head-articles.php';
?>

<body>
    <?php include '../articles/preloader-articles.php'; ?>
    <?php include '../articles/header-articles.php'; ?>

    <!-- Проекты -->
    <section class="py-5 mt-5">
        <div class="container">
            <h1 class="text-center mb-5">Наши проекты</h1>
            
            <!-- Фильтры -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="btn-group" role="group" aria-label="Фильтры проектов">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">Все проекты</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="budget">Бюджетные</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="comfort">Комфорт</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="apartment">Квартиры</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="house">Частные дома</button>
                    </div>
                </div>
            </div>

            <!-- Список проектов -->
            <div class="row g-4">
                <!-- Однокомнатная квартира (Бюджет) -->
                <div class="col-md-6 col-lg-4" data-category="budget apartment">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/1-komn/planirovka-1km-budget.png" class="card-img-top" alt="План электромонтажа однокомнатной квартиры 40 м² - бюджетный вариант">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Однокомнатная квартира 40 м²</h3>
                            <p class="card-text">Бюджетный вариант электромонтажа</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>6 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="1room-budget"></span></li>
                            </ul>
                            <a href="/projects/1room-budget" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>

                <!-- Однокомнатная квартира (Комфорт) -->
                <div class="col-md-6 col-lg-4" data-category="comfort apartment">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/1-komn/planirovka-1km-komfort.png" class="card-img-top" alt="План электромонтажа однокомнатной квартиры 40 м² - комфортный вариант">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Однокомнатная квартира 40 м²</h3>
                            <p class="card-text">Вариант "Комфорт" с расширенным функционалом</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>9 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="1room-comfort"></span></li>
                            </ul>
                            <a href="/projects/1room-comfort" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>

                <!-- Двухкомнатная квартира (Бюджет) -->
                <div class="col-md-6 col-lg-4" data-category="budget apartment">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/2-komn/planirovka-2km-budget.png" class="card-img-top" alt="План электромонтажа двухкомнатной квартиры 60 м² - бюджетный вариант">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Двухкомнатная квартира 60 м²</h3>
                            <p class="card-text">Бюджетный вариант электромонтажа</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>8 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="2room-budget"></span></li>
                            </ul>
                            <a href="/projects/2room-budget" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>

                <!-- Двухкомнатная квартира (Комфорт) -->
                <div class="col-md-6 col-lg-4" data-category="comfort apartment">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/2-komn/planirovka-2km-komfort.png" class="card-img-top" alt="Двухкомнатная квартира комфорт">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Двухкомнатная квартира 60 м²</h3>
                            <p class="card-text">Вариант "Комфорт" с расширенным функционалом</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>12 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="2room-comfort"></span></li>
                            </ul>
                            <a href="/projects/2room-comfort" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>

                <!-- Частный дом (Бюджет) -->
                <div class="col-md-6 col-lg-4" data-category="budget house">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/dom-90-kv/dom-90-budget.png" class="card-img-top" alt="Частный дом">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Частный дом 90 м²</h3>
                            <p class="card-text">Бюджетный вариант электромонтажа</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>8 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="house-budget"></span></li>
                            </ul>
                            <a href="/projects/house-budget" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>

                <!-- Частный дом (Комфорт) -->
                <div class="col-md-6 col-lg-4" data-category="comfort house">
                    <div class="card project-card">
                        <div class="project-images">
                            <img src="assets/images/projects/dom-90-kv/dom-90-komfort.png" class="card-img-top" alt="Частный дом комфорт">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">Частный дом 90 м²</h3>
                            <p class="card-text">Вариант "Комфорт" с расширенным функционалом</p>
                            <ul class="list-unstyled mb-3">
                                <li><i class="fas fa-clock me-2"></i>12 дней</li>
                                <li><i class="fas fa-ruble-sign me-2"></i><span class="project-total" data-project="house-comfort"></span></li>
                            </ul>
                            <a href="/projects/house-comfort" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../articles/footer-articles.php'; ?>
    <?php include '../articles/modal-articles.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="js/prices.js?v=2"></script>
    <script src="js/project-totals.js?v=2"></script>
    <script src="js/projects.js?v=2"></script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>
    <script>
        // После загрузки всех скриптов
        document.addEventListener('DOMContentLoaded', function() {
            // Обновляем цены, если функция доступна
            if (typeof updateProjectTotals === 'function') {
                // Обновляем цены для всех проектов
                document.querySelectorAll('.project-total').forEach(element => {
                    const projectId = element.getAttribute('data-project');
                    if (projectId) {
                        const total = calculateProjectTotal(projectId);
                        element.textContent = formatNumber(total) + ' ₽';
                    }
                });
            }
        });
    </script>

</body>

</html>