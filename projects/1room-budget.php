<?php
$pageTitle = 'Проект электромонтажа в однокомнатной квартире 40 м² - Бюджетный вариант под ключ | ЭлектрикаВРН';
$pageDescription = 'Готовый проект электромонтажа для однокомнатной квартиры 40 м². Бюджетный вариант включает: 13 розеток, 4 выключателя, базовое освещение, накладной щит. Срок работ: 6 дней. Цена: 26 150 ₽. Оптимальное решение для ремонта.';
$pageCanonical = 'https://electrikavrn.ru/projects/1room-budget.php';
$pageImage = 'https://electrikavrn.ru/assets/images/projects/1-komn/kollag-1km-budget.jpg';

// Данные проекта для Schema.org
$project = [
    'name' => 'Проект электромонтажа однокомнатной квартиры 40 м² (Бюджет)',
    'description' => 'Базовый проект электромонтажа для однокомнатной квартиры площадью 40 м². Включает оптимальное количество розеток, базовое освещение и накладной электрощит. Идеальное решение для экономного ремонта.',
    'image' => $pageImage,
    'price' => '26150',
    'priceValidUntil' => '2024-12-31',
    'properties' => [
        [
            '@type' => 'PropertyValue',
            'name' => 'Площадь',
            'value' => '40 м²'
        ],
        [
            '@type' => 'PropertyValue',
            'name' => 'Срок выполнения',
            'value' => '6 дней'
        ],
        [
            '@type' => 'PropertyValue',
            'name' => 'Количество розеток',
            'value' => '13'
        ],
        [
            '@type' => 'PropertyValue',
            'name' => 'Количество выключателей',
            'value' => '4'
        ],
        [
            '@type' => 'PropertyValue',
            'name' => 'Тип освещения',
            'value' => 'Базовое освещение'
        ],
        [
            '@type' => 'PropertyValue',
            'name' => 'Тип электрощита',
            'value' => 'Накладной'
        ]
    ]
];

// Хлебные крошки
$breadcrumbItems = [
    ['name' => 'Главная', 'url' => 'https://electrikavrn.ru/'],
    ['name' => 'Проекты', 'url' => 'https://electrikavrn.ru/projects.php'],
    ['name' => 'Однокомнатная квартира 40 м² (Бюджетный вариант)', 'url' => $pageCanonical]
];

// Данные этапов работ
$stages = [
    [
        'title' => 'Черновой электромонтаж',
        'duration' => '5 рабочих дней',
        'works' => [
            [
                'name' => 'Прокладка кабеля',
                'unit' => 'м.п.',
                'quantity' => 75,
                'price' => 50,
                'data_price' => 'kabel'
            ],
            [
                'name' => 'Штроба (бетон)',
                'unit' => 'м.п.',
                'quantity' => 20,
                'price' => 300,
                'data_price' => 'shtroba',
                'data_material' => 'beton'
            ],
            [
                'name' => 'Отверстия капитальные d20 до 250мм',
                'unit' => 'шт.',
                'quantity' => 3,
                'price' => 200,
                'data_price' => 'otversty'
            ],
            [
                'name' => 'Монтаж коробки установочной d67 в бетоне',
                'unit' => 'шт.',
                'quantity' => 17,
                'price' => 300,
                'data_price' => 'ustKorobki',
                'data_material' => 'beton'
            ],
            [
                'name' => 'Сборка схемы распределительной коробки',
                'unit' => 'шт.',
                'quantity' => 8,
                'price' => 300,
                'data_price' => 'korobka'
            ],
            [
                'name' => 'Монтаж накладного щита 18 модулей',
                'unit' => 'шт.',
                'quantity' => 1,
                'price' => 2000,
                'data_price' => 'shitok',
                'data_type' => 'nakladnoy'
            ],
            [
                'name' => 'Монтаж автоматических выключателей 1 полюс',
                'unit' => 'шт.',
                'quantity' => 4,
                'price' => 200,
                'data_price' => 'av1p'
            ],
            [
                'name' => 'Монтаж автоматических выключателей 2 полюса',
                'unit' => 'шт.',
                'quantity' => 1,
                'price' => 350,
                'data_price' => 'av2p'
            ],
            [
                'name' => 'Монтаж дифференциальных автоматов',
                'unit' => 'шт.',
                'quantity' => 1,
                'price' => 350,
                'data_price' => 'dif'
            ],
            [
                'name' => 'Монтаж цоколей',
                'unit' => 'шт.',
                'quantity' => 4,
                'price' => 100,
                'data_price' => 'tempLight'
            ],
            [
                'name' => 'Монтаж временных розеток',
                'unit' => 'шт.',
                'quantity' => 3,
                'price' => 150,
                'data_price' => 'tempSocket'
            ]
        ]
    ],
    [
        'title' => 'Чистовой электромонтаж',
        'duration' => '1 рабочий день',
        'works' => [
            [
                'name' => 'Установка выключателей',
                'unit' => 'шт.',
                'quantity' => 4,
                'price' => 150,
                'data_price' => 'switch',
                'data_type' => 'basic'
            ],
            [
                'name' => 'Установка розеток',
                'unit' => 'шт.',
                'quantity' => 13,
                'price' => 150,
                'data_price' => 'socket',
                'data_type' => 'basic'
            ],
            [
                'name' => 'Монтаж люстр до 3х кг.',
                'unit' => 'шт.',
                'quantity' => 2,
                'price' => 700,
                'data_price' => 'light',
                'data_type' => 'chandelier'
            ]
        ]
    ]
];

include 'head-projects.php';
?>

<body>
    <?php include '../articles/preloader-articles.php'; ?>
    <?php include '../articles/header-articles.php'; ?>

    <!-- Хлебные крошки -->
    <nav aria-label="breadcrumb" class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Главная</a></li>
            <li class="breadcrumb-item"><a href="../projects.php">Проекты</a></li>
            <li class="breadcrumb-item active">Однокомнатная квартира 40 м² (Бюджетный)</li>
        </ol>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4">Однокомнатная квартира 40 м² (Вариант "Бюджет")</h1>
        
        <!-- Основная информация -->
        <div class="row mb-5">
            <div class="col-md-8">
                <div class="project-images mb-4">
                    <img src="../assets/images/projects/1-komn/kollag-1km-budget.jpg" alt="До ремонта" class="img-fluid mb-3">
                </div>
            </div>
            <div class="col-md-4">
                <div class="project-summary card">
                    <div class="card-body">
                        <h5 class="card-title">Краткая информация</h5>
                        <ul class="list-unstyled">
                            <li><strong>Площадь:</strong> 40 м²</li>
                            <li><strong>Тип помещения:</strong> Квартира</li>
                            <li><strong>Срок выполнения:</strong> 6 дней</li>
                            <li><strong>Стоимость работ:</strong> 26 150 ₽</li>
                        </ul>
                        <a href="#" class="btn btn-primary w-100" data-callback>Заказать похожий проект</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Детальное описание -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4">Описание проекта</h2>
                <p>Проект подразумевает проведение электропроводки "с нуля", т.е. в квартире она полностью отсутствовала или же стала полностью непригодна (например алюминиевая). По данному проекту в квартире установлена газовая плита, поэтому расходы на монтаж силового кабеля для электроплиты не учтены.</p>
            </div>
        </div>

        <!-- Этапы работ -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4">Этапы работ</h2>
                
                <!-- Черновой электромонтаж -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="h5 mb-0">1. Черновой электромонтаж</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Наименование работ</th>
                                        <th>Ед. изм.</th>
                                        <th>Кол-во</th>
                                        <th>Цена</th>
                                        <th>Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Прокладка кабеля</td>
                                        <td>м.п.</td>
                                        <td>75</td>
                                        <td class="price-value" data-price="kabel">50 ₽</td>
                                        <td class="total-value" data-price="kabel" data-quantity="75">3 750 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Штроба (бетон)</td>
                                        <td>м.п.</td>
                                        <td>20</td>
                                        <td class="price-value" data-price="shtroba" data-material="beton">300 ₽</td>
                                        <td class="total-value" data-price="shtroba" data-material="beton" data-quantity="20">6 000 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Отверстия капитальные d20 до 250мм</td>
                                        <td>шт.</td>
                                        <td>3</td>
                                        <td class="price-value" data-price="otversty">200 ₽</td>
                                        <td class="total-value" data-price="otversty" data-quantity="3">600 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж коробки установочной d67 в бетоне</td>
                                        <td>шт.</td>
                                        <td>17</td>
                                        <td class="price-value" data-price="ustKorobki" data-material="beton">300 ₽</td>
                                        <td class="total-value" data-price="ustKorobki" data-material="beton" data-quantity="17">5 100 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Сборка схемы распределительной коробки</td>
                                        <td>шт.</td>
                                        <td>8</td>
                                        <td class="price-value" data-price="korobka">300 ₽</td>
                                        <td class="total-value" data-price="korobka" data-quantity="8">2 400 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж накладного щита 18 модулей</td>
                                        <td>шт.</td>
                                        <td>1</td>
                                        <td class="price-value" data-price="shitok" data-type="nakladnoy">2 000 ₽</td>
                                        <td class="total-value" data-price="shitok" data-type="nakladnoy" data-quantity="1">2 000 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж автоматических выключателей 1 полюс</td>
                                        <td>шт.</td>
                                        <td>4</td>
                                        <td class="price-value" data-price="av1p">200 ₽</td>
                                        <td class="total-value" data-price="av1p" data-quantity="4">800 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж автоматических выключателей 2 полюса</td>
                                        <td>шт.</td>
                                        <td>1</td>
                                        <td class="price-value" data-price="av2p">350 ₽</td>
                                        <td class="total-value" data-price="av2p" data-quantity="1">350 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж дифференциальных автоматов</td>
                                        <td>шт.</td>
                                        <td>1</td>
                                        <td class="price-value" data-price="dif">350 ₽</td>
                                        <td class="total-value" data-price="dif" data-quantity="1">350 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж цоколей</td>
                                        <td>шт.</td>
                                        <td>4</td>
                                        <td class="price-value" data-price="tempLight">100 ₽</td>
                                        <td class="total-value" data-price="tempLight" data-quantity="4">400 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж временных розеток</td>
                                        <td>шт.</td>
                                        <td>3</td>
                                        <td class="price-value" data-price="tempSocket">150 ₽</td>
                                        <td class="total-value" data-price="tempSocket" data-quantity="3">450 ₽</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Итого:</strong></td>
                                        <td><strong class="section-total">22 200 ₽</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="mt-3">Срок выполнения – 5 рабочих дней</p>
                    </div>
                </div>

                <!-- Чистовой электромонтаж -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="h5 mb-0">2. Чистовой электромонтаж</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Наименование работ</th>
                                        <th>Ед. изм.</th>
                                        <th>Кол-во</th>
                                        <th>Цена</th>
                                        <th>Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Установка выключателей</td>
                                        <td>шт.</td>
                                        <td>4</td>
                                        <td class="price-value" data-price="switch" data-type="basic">150 ₽</td>
                                        <td class="total-value" data-price="switch" data-type="basic" data-quantity="4">600 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Установка розеток</td>
                                        <td>шт.</td>
                                        <td>13</td>
                                        <td class="price-value" data-price="socket" data-type="basic">150 ₽</td>
                                        <td class="total-value" data-price="socket" data-type="basic" data-quantity="13">1 950 ₽</td>
                                    </tr>
                                    <tr>
                                        <td>Монтаж люстр до 3х кг.</td>
                                        <td>шт.</td>
                                        <td>2</td>
                                        <td class="price-value" data-price="light" data-type="chandelier">700 ₽</td>
                                        <td class="total-value" data-price="light" data-type="chandelier" data-quantity="2">1 400 ₽</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Итого:</strong></td>
                                        <td><strong class="section-total">3 950 ₽</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="mt-3">Срок выполнения – 1 рабочий день</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- План расположения -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4">План расположения</h2>
                <div class="row g-4">
                    <!-- Первый ряд фотографий -->
                    <div class="col-md-6">
                        <a href="../assets/images/projects/1-komn/superbyudzhetnaya-1-komn.-plan-gruppy_page-0001.jpg" data-lightbox="plan" data-title="План расположения - страница 1">
                            <img src="../assets/images/projects/1-komn/superbyudzhetnaya-1-komn.-plan-gruppy_page-0001.jpg" alt="План расположения - страница 1" class="img-fluid rounded shadow-sm">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="../assets/images/projects/1-komn/superbyudzhetnaya-1-komn.-plan-gruppy_page-0002.jpg" data-lightbox="plan" data-title="План расположения - страница 2">
                            <img src="../assets/images/projects/1-komn/superbyudzhetnaya-1-komn.-plan-gruppy_page-0002.jpg" alt="План расположения - страница 2" class="img-fluid rounded shadow-sm">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Похожие проекты -->
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Похожие проекты</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../assets/images/projects/1-komn/planirovka-1km-komfort.png" class="card-img-top" alt="Комфорт вариант">
                            <div class="card-body">
                                <h5 class="card-title">Однокомнатная квартира (Комфорт)</h5>
                                <p class="card-text">Вариант с расширенным функционалом</p>
                                <a href="1room-comfort.html" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../assets/images/projects/2-komn/planirovka-2km-budget.png" class="card-img-top" alt="Бюджетный вариант">
                            <div class="card-body">
                                <h5 class="card-title">Двухкомнатная квартира (Бюджет)</h5>
                                <p class="card-text">Базовый вариант электромонтажа</p>
                                <a href="2room-budget.html" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../articles/footer-articles.php'; ?>
    <?php include '../articles/modal-articles.php'; ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="../js/prices.js?v=1"></script>
    <script src="../js/project-totals.js"></script>
    <script src="../js/projects.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/callback.js"></script>
    <script src="../js/geolocate.js"></script>
</body>
</html> 