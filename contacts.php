<?php
$pageTitle = 'Контакты электромонтажной компании ЭлектрикаВРН в Воронеже | Заказать электромонтаж';
$pageDescription = 'Свяжитесь с нами для заказа электромонтажных работ в Воронеже. Профессиональные электрики, выезд на замер бесплатно. Работаем без выходных с 9:00 до 21:00.';
$pageCanonical = 'https://electrikavrn.ru/contacts.php';
$pageType = 'contacts';
$pageImage = 'https://electrikavrn.ru/assets/logo.png';

// Schema.org разметка для организации
$organizationSchema = [
    "@context" => "https://schema.org",
    "@type" => "Organization",
    "name" => "ЭлектрикаВРН",
    "description" => "Профессиональные электромонтажные работы в Воронеже",
    "email" => "electrikavrn@yandex.ru",
    "address" => [
        "@type" => "PostalAddress",
        "addressLocality" => "Воронеж",
        "addressCountry" => "RU"
    ],
    "openingHoursSpecification" => [
        "@type" => "OpeningHoursSpecification",
        "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "opens" => "09:00",
        "closes" => "21:00"
    ],
    "contactPoint" => [
        "@type" => "ContactPoint",
        "contactType" => "customer service",
        "email" => "electrikavrn@yandex.ru",
        "areaServed" => "Воронеж"
    ]
];

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>

    <!-- Основной контент -->
    <main class="py-5 mt-5">
        <section class="contacts-section py-5">
            <div class="container">
                <h1 class="text-center mb-5" data-aos="fade-up">Свяжитесь с нами</h1>
                
                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="card shadow">
                            <div class="card-body p-4 p-md-5">
                                <h2 class="text-center mb-4">Форма обратной связи</h2>
                                <form id="contactForm" class="contact-form">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Ваше имя</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Введите ваше имя" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Телефон</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Сообщение</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Введите ваше сообщение" required></textarea>
                                    </div>
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyAgree" name="privacyAgree">
                                        <label class="form-check-label" for="privacyAgree">Я согласен с <a href="privacy.php" target="_blank">политикой конфиденциальности</a></label>
                                        <div class="invalid-feedback">Пожалуйста, подтвердите согласие с политикой конфиденциальности</div>
                                    </div>
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5">Отправить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-phone-alt fa-3x mb-4 text-primary"></i>
                                <h3 class="h5 mb-3">Телефон</h3>
                                <p class="mb-0">Номер телефона скрыт</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-envelope fa-3x mb-4 text-primary"></i>
                                <h3 class="h5 mb-3">Email</h3>
                                <p class="mb-0">electrikavrn@yandex.ru</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/geolocate.js"></script>
    <script src="js/cookie-notice.js"></script>
</body>
</html> 