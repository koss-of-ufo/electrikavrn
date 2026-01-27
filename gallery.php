<?php
// Метаданные страницы
$pageTitle = 'Галерея работ - фото электромонтажа в квартирах и домах | ЭлектрикаВРН';
$pageDescription = 'Фотографии выполненных электромонтажных работ в Воронеже...';
$pageCanonical = 'https://electrikavrn.ru/gallery.php';
$pageType = 'gallery';
$pageImage = 'https://electrikavrn.ru/assets/images/gallery/residential/electrika-v-trehkomnatnoy-kvartire-1.jpg';


// Schema.org разметка для галереи
$gallerySchema = [
    "@type" => "ImageGallery",
    "name" => "Галерея работ ЭлектрикаВРН",
    "description" => "Фотографии выполненных электромонтажных работ в Воронеже",
    "image" => [
        [
            "@type" => "ImageObject",
            "contentUrl" => "https://electrikavrn.ru/assets/images/portfolio/electrika-v-trehkomnatnoy-kvartire-1.jpg",
            "name" => "Электромонтаж в трехкомнатной квартире",
            "description" => "Полная замена проводки в трехкомнатной квартире"
        ],
        [
            "@type" => "ImageObject",
            "contentUrl" => "https://electrikavrn.ru/assets/images/portfolio/service-osveshenie-mp.jpg",
            "name" => "Монтаж освещения",
            "description" => "Установка светильников в торговом центре"
        ],
        [
            "@type" => "ImageObject",
            "contentUrl" => "https://electrikavrn.ru/assets/images/portfolio/shit-v-trehkomnatnoy-kvartire.jpg",
            "name" => "Электрощит в частном доме",
            "description" => "Монтаж и подключение электрощита"
        ]
    ]
];

// Хлебные крошки для Schema.org
$breadcrumbItems = [
    ['name' => 'Главная', 'url' => 'https://electrikavrn.ru/'],
    ['name' => 'Галерея', 'url' => 'https://electrikavrn.ru/gallery.php']
];

// Добавляем разметку Schema.org
$schemaMarkup = [
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "name" => $pageTitle,
    "description" => $pageDescription,
    "mainEntity" => $gallerySchema
];

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>

    <!-- Галерея -->
    <section class="py-5 mt-5">
        <div class="container">
            <h1 class="text-center mb-5" data-aos="fade-up">Галерея наших работ</h1>

            <!-- Фильтры -->
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary active" data-filter="all">Все работы</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="apartments">Квартиры</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="houses">Частные дома</button>
                        <button type="button" class="btn btn-outline-primary" data-filter="commercial">Коммерческие</button>
                    </div>
                </div>
            </div>

            <!-- Сетка изображений -->
            <div class="gallery-grid">
                <!-- Квартиры -->
                <div class="gallery-item big" data-category="apartments" data-aos="fade-up">
                    <a href="assets/images/gallery/apartments/raspredelitelniy-shit-v-trhkomnatnoy-kvartire.jpg" data-lightbox="gallery" data-title="Распределительный щит в трехкомнатной квартире">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/raspredelitelniy-shit-v-trhkomnatnoy-kvartire.jpg" alt="Распределительный щит">
                            <div class="gallery-item-caption">
                                <h5>Распределительный щит</h5>
                                <p>Монтаж и сборка распределительного щита в трехкомнатной квартире с современной компоновкой</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/electrika-v-trehkomnatnoy-kvartire-2.jpg" data-lightbox="gallery" data-title="Электрика в трехкомнатной квартире">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/electrika-v-trehkomnatnoy-kvartire-2.jpg" alt="Электромонтаж в квартире">
                            <div class="gallery-item-caption">
                                <h5>Электромонтаж в трехкомнатной квартире</h5>
                                <p>Прокладка кабельных линий и установка электрооборудования</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/raspredelitelniy-shit-v-trhkomnatnoy-kvartire-108kvm.jpg" data-lightbox="gallery" data-title="Электромонтаж в квартире 108 кв.м">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/raspredelitelniy-shit-v-trhkomnatnoy-kvartire-108kvm.jpg" alt="Электромонтаж в квартире">
                            <div class="gallery-item-caption">
                                <h5>Переделка электрики от застройщика в трешке: щиток</h5>
                                <p>Обновление и подключение электрического щитка после переделки</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="gallery-item big" data-category="apartments" data-aos="fade-up">
                    <a href="assets/images/portfolio/electrika-v-trehkomnatnoy-kvartire-1.jpg" data-lightbox="gallery" data-title="Монтаж электрощита в трехкомнатной квартире">
                        <div class="gallery-item-inner">
                            <img src="assets/images/portfolio/electrika-v-trehkomnatnoy-kvartire-1.jpg" alt="Монтаж электрощита">
                            <div class="gallery-item-caption">
                                <h5>Переделка электрики от застройщика в трешке</h5>
                                <p>Общий вид на работу по переделке электрики в трёхкомнатной квартире</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/electrika-v-trehkomnatnoy-kvartire-3.jpg" data-lightbox="gallery" data-title="Электромонтаж в квартире 108 кв.m">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/electrika-v-trehkomnatnoy-kvartire-3.jpg" alt="Электромонтаж в квартире">
                            <div class="gallery-item-caption">
                                <h5>Квартира 108 кв.m</h5>
                                <p>Комплексный электромонтаж с установкой современного оборудования</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika.jpg" data-lightbox="gallery" data-title="Доработка электрики от застройщика">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika.jpg" alt="Доработка электрики">
                            <div class="gallery-item-caption">
                                <h5>Доработка электрики от застройщика</h5>
                                <p>Модернизация и улучшение существующей электропроводки в новостройке</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika-2.jpg" data-lightbox="gallery" data-title="Электромонтаж в квартире 108 кв.m">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika-2.jpg" alt="Электромонтаж в квартире">
                            <div class="gallery-item-caption">
                                <h5>Доработка электрики: щиток</h5>
                                <p>Корректировка подключения и распределение проводки в щитке</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="apartments" data-aos="fade-up" data-aos-delay="100">
                    <a href="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika-3.jpg" data-lightbox="gallery" data-title="Электромонтаж в квартире 108 кв.m">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/apartments/dorabotka-elektriki-ot-zastrojshika-3.jpg" alt="Электромонтаж в квартире">
                            <div class="gallery-item-caption">
                                <h5>Доработка электрики: готово</h5>
                                <p>Финальная доработка электрики на кухне, готовность к эксплуатации</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Частные дома -->
                <div class="gallery-item tall" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/electrika-v-chastnom-dome-lestnisa.jpg" data-lightbox="gallery" data-title="Электрика в частном доме - лестница">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/electrika-v-chastnom-dome-lestnisa.jpg" alt="Электромонтаж лестницы">
                            <div class="gallery-item-caption">
                                <h5>Монтаж проводки на лестнице</h5>
                                <p>Установка электрики в зоне лестничного марша частного дома</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/electrika-v-chastnom-dome-lestnisa-gotovo.jpg" data-lightbox="gallery" data-title="Завершение электромонтажа в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/electrika-v-chastnom-dome-lestnisa-gotovo.jpg" alt="Готовый электромонтаж">
                            <div class="gallery-item-caption">
                                <h5>Частный дом - Финал</h5>
                                <p>Завершенный монтаж с установкой розеток и выключателей</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/razvodka-po-polu-v-chastnom-dome.jpg" data-lightbox="gallery" data-title="Разводка по полу в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/razvodka-po-polu-v-chastnom-dome.jpg" alt="Разводка по полу">
                            <div class="gallery-item-caption">
                                <h5>Разводка по полу</h5>
                                <p>Монтаж кабельных трасс в полу частного дома с соблюдением всех норм</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/razvodka-po-polu-v-chastnom-dome-2.jpg" data-lightbox="gallery" data-title="Завершение электромонтажа в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/razvodka-po-polu-v-chastnom-dome-2.jpg" alt="Готовый электромонтаж">
                            <div class="gallery-item-caption">
                                <h5>Черновая разводка по полу в коттедже</h5>
                                <p>Укладка и подключение электропроводки по полу в коттедже</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/electrika-v-chastnom-dome-razvodka-po-potolku.jpg" data-lightbox="gallery" data-title="Разводка электрики по потолку">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/electrika-v-chastnom-dome-razvodka-po-potolku.jpg" alt="Разводка по потолку">
                            <div class="gallery-item-caption">
                                <h5>Потолочная разводка</h5>
                                <p>Монтаж электропроводки по потолку с подготовкой под освещение</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/svorka-i-montazh-lustr.jpg" data-lightbox="gallery" data-title="Сборка и монтаж люстр">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/svorka-i-montazh-lustr.jpg" alt="Монтаж люстр">
                            <div class="gallery-item-caption">
                                <h5>Установка люстр</h5>
                                <p>Профессиональная сборка и монтаж осветительных приборов</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/osvechenie-na-cherdake.jpg" data-lightbox="gallery" data-title="Освещение на чердаке">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/osvechenie-na-cherdake.jpg" alt="Чердачное освещение">
                            <div class="gallery-item-caption">
                                <h5>Освещение чердака</h5>
                                <p>Монтаж системы освещения в чердачном помещении</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/peredelki-noviy-disain-proekt.jpg" data-lightbox="gallery" data-title="Завершение электромонтажа в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/peredelki-noviy-disain-proekt.jpg" alt="Готовый электромонтаж">
                            <div class="gallery-item-caption">
                                <h5>Переделки в частном доме: новый проект дизайнера</h5>
                                <p>Реализация изменений в интерьере по новому проекту дизайнера в частном доме</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb.jpg" data-lightbox="gallery" data-title="Перенос счетчика с дома на столб">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb.jpg" alt="Перенос счетчика">
                            <div class="gallery-item-caption">
                                <h5>Электромонтаж на даче: перенос электросчетчика</h5>
                                <p>Перенос прибора учета электроэнергии с дома на опору</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb-2.jpg" data-lightbox="gallery" data-title="Завершение электромонтажа в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb-2.jpg" alt="Готовый электромонтаж">
                            <div class="gallery-item-caption">
                                <h5>Электромонтаж на даче: готовый счетчик</h5>
                                <p>Закрепленный и подключенный счетчик, готовый к эксплуатации</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="houses" data-aos="fade-up" data-aos-delay="200">
                    <a href="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb-3.jpg" data-lightbox="gallery" data-title="Завершение электромонтажа в частном доме">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/houses/perenos-schetchika-s-doma-na-stolb-3.jpg" alt="Готовый электромонтаж">
                            <div class="gallery-item-caption">
                                <h5>Электромонтаж на даче: общий вид</h5>
                                <p>Финальный результат с установленным счетчиком на столбе</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Коммерческие -->
                <div class="gallery-item wide" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/trc-mp-zolla.jpg" data-lightbox="gallery" data-title="Электромонтаж в магазине Zolla">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/trc-mp-zolla.jpg" alt="Электромонтаж в магазине">
                            <div class="gallery-item-caption">
                                <h5>Магазин Zolla</h5>
                                <p>Комплексный электромонтаж торговой площади с системой освещения</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/trc-mp-zolla-2.jpg" data-lightbox="gallery" data-title="Электромонтаж в офисе">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/trc-mp-zolla-2.jpg" alt="Электромонтаж офис 1">
                            <div class="gallery-item-caption">
                                <h5>Магазин Zolla</h5>
                                <p>Электромонтаж в магазине. Монтаж освещения, розеток, выключателей, установка электрощита.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/podsvetka-vitrin.jpg" data-lightbox="gallery" data-title="Подсветка витрин">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/podsvetka-vitrin.jpg" alt="Подсветка витрин">
                            <div class="gallery-item-caption">
                                <h5>Освещение витрин</h5>
                                <p>Монтаж системы подсветки торговых витрин с LED-освещением</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/rabota-nad-podsvetkoj-vitrin.jpg" data-lightbox="gallery" data-title="Электромонтаж в офисе">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/rabota-nad-podsvetkoj-vitrin.jpg" alt="Электромонтаж офис 1">
                            <div class="gallery-item-caption">
                                <h5>Монтаж подсветки витрин</h5>
                                <p>Установка и подключение осветительных элементов для витрин</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/osveshenie-pavelyona-sharm.jpg" data-lightbox="gallery" data-title="Освещение павильона Шарм">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/osveshenie-pavelyona-sharm.jpg" alt="Освещение павильона">
                            <div class="gallery-item-caption">
                                <h5>Павильон "Шарм"</h5>
                                <p>Комплексное освещение торгового павильона с акцентной подсветкой</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/osveshenie-pavelyona-i-vitrin.jpg" data-lightbox="gallery" data-title="Электромонтаж в офисе">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/osveshenie-pavelyona-i-vitrin.jpg" alt="Электромонтаж офис 1">
                            <div class="gallery-item-caption">
                                <h5>Монтаж освещения и подсветки</h5>
                                <p>Установка осветительных приборов в павильоне и монтаж подсветки витрин</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/montazh-avr-i-skafov-sobstvennih-nuzhd.jpg" data-lightbox="gallery" data-title="Монтаж АВР и шкафов собственных нужд">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/montazh-avr-i-skafov-sobstvennih-nuzhd.jpg" alt="Монтаж АВР">
                            <div class="gallery-item-caption">
                                <h5>Монтаж АВР</h5>
                                <p>Установка автоматического ввода резерва и шкафов собственных нужд</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="gallery-item" data-category="commercial" data-aos="fade-up">
                    <a href="assets/images/gallery/commercial/montazh-avr-i-skafov-sobstvennih-nuzhd-2.jpg" data-lightbox="gallery" data-title="Электромонтаж в офисе">
                        <div class="gallery-item-inner">
                            <img src="assets/images/gallery/commercial/montazh-avr-i-skafov-sobstvennih-nuzhd-2.jpg" alt="Электромонтаж офис 1">
                            <div class="gallery-item-caption">
                                <h5>Подключение и настройка АВР</h5>
                                <p>Подключение автоматического ввода резерва и наладка оборудования для стабильной работы системы</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/main.js"></script>
    <script src="js/gallery.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>
</body>
</html> 