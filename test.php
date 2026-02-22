<?php
$pageTitle = 'Электромонтажные работы в Воронеже: квартиры, дома, офисы | ЭлектрикаВРН';
$pageDescription = 'Профессиональный электромонтаж в Воронеже от 50₽/м. Замена проводки, установка розеток, сборка электрощитов. Опыт более 10 лет, гарантия до 5 лет. Онлайн-калькулятор стоимости. Работаем без выходных.';
$pageCanonical = 'https://electrikavrn.ru/';
$pageType = 'home';
$pageImage = 'https://electrikavrn.ru/assets/images/services/elektromontazh-white.jpg';

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>

    <!-- Основной контент -->
    <main>
        <!-- Главный баннер -->
        <section class="hero-section hero-v2">
  <!-- декоративные световые пятна -->
  <div class="hero-blob hero-blob--1"></div>
  <div class="hero-blob hero-blob--2"></div>

  <div class="container">
    <div class="row align-items-center g-4">
      <!-- Левая колонка: смысл + CTA -->
      <div class="col-lg-7">
        <div class="hero-copy" data-aos="fade-up">
          <div class="hero-kicker">
            <span class="hero-dot"></span>
            Воронеж · Работаем по договору · Гарантия до 5 лет
          </div>

          <h1 class="hero-title">
            Инженерные системы <br>
            <span class="hero-accent">под ключ</span> — быстро и аккуратно
          </h1>

          <p class="hero-subtitle">
            Монтаж, диагностика и запуск. Прозрачная смета, соблюдение сроков,
            чистота на объекте и понятная коммуникация.
          </p>

          <!-- Три направления -->
          <div class="hero-chips">
            <span class="hero-chip"><i class="fas fa-bolt"></i> Электрика</span>
            <span class="hero-chip"><i class="fas fa-network-wired"></i> Слаботочка</span>
            <span class="hero-chip"><i class="fas fa-play-circle"></i> Пусконаладка</span>
          </div>

          <!-- Кнопки -->
          <div class="hero-actions">
            <a href="#calculator" class="btn btn-primary btn-lg">
              Рассчитать стоимость
            </a>
            <a href="#portfolio" class="btn btn-outline-light btn-lg">
              Посмотреть работы
            </a>
          </div>

          <!-- мини-доверие -->
          <div class="hero-proof">
            <span><i class="fas fa-check-circle"></i> Смета за 30 минут</span>
            <span><i class="fas fa-check-circle"></i> Выезд на объект</span>
            <span><i class="fas fa-check-circle"></i> Фото/видео отчёт</span>
          </div>
        </div>
      </div>

      <!-- Правая колонка: “витрина” услуг -->
      <div class="col-lg-5">
        <div class="hero-showcase" data-aos="fade-up" data-aos-delay="120">
          <div class="hero-card hero-card--main">
            <div class="hero-card__icon"><i class="fas fa-bolt"></i></div>
            <div class="hero-card__content">
              <div class="hero-card__title">Электрика</div>
              <div class="hero-card__text">проводка · щиты · освещение · розетки</div>
            </div>
          </div>

          <div class="hero-card hero-card--tilt">
            <div class="hero-card__icon"><i class="fas fa-network-wired"></i></div>
            <div class="hero-card__content">
              <div class="hero-card__title">Слаботочка</div>
              <div class="hero-card__text">интернет · CCTV · домофон · сигнализация</div>
            </div>
          </div>

          <div class="hero-card hero-card--ghost">
            <div class="hero-card__icon"><i class="fas fa-play-circle"></i></div>
            <div class="hero-card__content">
              <div class="hero-card__title">Пусконаладка</div>
              <div class="hero-card__text">проверка · замеры · запуск · сдача</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- подсказка скролла -->
    <div class="hero-scroll" aria-hidden="true">
      <span class="hero-mouse"></span>
      <span class="hero-scroll-text">Листай вниз</span>
    </div>
  </div>
</section>

        <!-- Преимущества -->
        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-tools fa-3x mb-4"></i>
                                <h3 class="card-title h5">Опытные специалисты</h3>
                                <p class="card-text">Более 10 лет опыта в электромонтажных работах</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-shield-alt fa-3x mb-4"></i>
                                <h3 class="card-title h5">Гарантия качества</h3>
                                <p class="card-text">Гарантия на все виды работ до 5 лет</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="fas fa-clock fa-3x mb-4"></i>
                                <h3 class="card-title h5">Точные сроки</h3>
                                <p class="card-text">Выполняем работу в оговоренные сроки</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Услуги -->
        <section id="services" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Наши услуги</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card h-100">
                            <img src="assets/images/services/elektromontazh-white.jpg" class="card-img-top" alt="Электромонтаж">
                            <div class="card-body">
                                <h3 class="card-title h5">Электромонтаж</h3>
                                <p class="card-text">Полный комплекс электромонтажных работ в квартирах, домах и офисах</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100">
                            <img src="assets/images/services/diagnostika-3.jpg" class="card-img-top" alt="Диагностика">
                            <div class="card-body">
                                <h3 class="card-title h5">Диагностика электропроводки</h3>
                                <p class="card-text">Профессиональная диагностика и поиск неисправностей</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <img src="assets/images/services/ustanovka-elektrooborudovaniya-white.jpg" class="card-img-top" alt="Установка">
                            <div class="card-body">
                                <h3 class="card-title h5">Установка электрооборудования</h3>
                                <p class="card-text">Монтаж розеток, выключателей, светильников и другого оборудования</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Калькулятор -->
        <section id="calculator" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Рассчитать стоимость работ</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <p class="lead mb-4" data-aos="fade-up">Воспользуйтесь нашими онлайн-калькуляторами для предварительного расчета стоимости электромонтажных работ</p>
                        <div class="row g-4">
                            <div class="col-md-4" data-aos="fade-up">
                                <div class="card">
                                    <div class="card-body py-4">
                                        <i class="fas fa-calculator fa-2x mb-3 text-primary"></i>
                                        <h3 class="h5 mb-2">Калькулятор предварительного расчета</h3>
                                        <p class="card-text mb-3">Быстрый расчет стоимости базовых электромонтажных работ для квартир и домов</p>
                                        <a href="calculate-dlya-chaynikov.html" class="btn btn-primary">Рассчитать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <div class="card-body py-4">
                                        <i class="fas fa-tools fa-2x mb-3 text-primary"></i>
                                        <h3 class="h5 mb-2">Профессиональный калькулятор</h3>
                                        <p class="card-text mb-3">Детальный расчет с учетом всех параметров и дополнительных работ. Требует глубокого понимания объекта строительства</p>
                                        <a href="calculate.html" class="btn btn-primary">Рассчитать</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="card">
                                    <div class="card-body py-4">
                                        <i class="fas fa-home fa-2x mb-3 text-primary"></i>
                                        <h3 class="h5 mb-2">Типовые проекты</h3>
                                        <p class="card-text mb-3">Готовые проекты электромонтажа для квартир, домов и коммерческих помещений</p>
                                        <a href="projects.html" class="btn btn-primary">Смотреть проекты</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Портфолио -->
        <section id="portfolio" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5" data-aos="fade-up">Наши работы</h2>
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card h-100">
                            <a href="assets/images/portfolio/electrika-v-trehkomnatnoy-kvartire-1.jpg" data-lightbox="portfolio" data-title="Электромонтаж в квартире">
                                <img src="assets/images/portfolio/electrika-v-trehkomnatnoy-kvartire-1.jpg" class="card-img-top" alt="Проект 1" style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title h5">Электромонтаж в квартире</h3>
                                <p class="card-text">Полная замена проводки в трехкомнатной квартире</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100">
                            <a href="assets/images/portfolio/service-osveshenie-mp.jpg" data-lightbox="portfolio" data-title="Монтаж освещения">
                                <img src="assets/images/portfolio/service-osveshenie-mp.jpg" class="card-img-top" alt="Проект 2" style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title h5">Монтаж освещения</h3>
                                <p class="card-text">Установка светильников в торговом центре</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100">
                            <a href="assets/images/portfolio/shit-v-trehkomnatnoy-kvartire.jpg" data-lightbox="portfolio" data-title="Электрощит в частном доме">
                                <img src="assets/images/portfolio/shit-v-trehkomnatnoy-kvartire.jpg" class="card-img-top" alt="Проект 3" style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <h3 class="card-title h5">Электрощит в частном доме</h3>
                                <p class="card-text">Монтаж и подключение электрощита</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="gallery.html" class="btn btn-primary" data-aos="fade-up">
                        Смотреть все работы
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- JavaScript -->
    <?php include 'included/included-js.php'; ?>

</body>