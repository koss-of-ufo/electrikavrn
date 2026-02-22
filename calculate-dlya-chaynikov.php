<?php
$pageTitle = 'Калькулятор стоимости электромонтажа: простой расчет цены | ЭлектрикаВРН';
$pageDescription = 'Простой калькулятор стоимости электромонтажа в Воронеже. Быстрый расчет цены работ для квартиры или дома. Актуальные цены 2024 года, учет материала стен и типа помещения.';
$pageCanonical = 'https://electrikavrn.ru/calculate-dlya-chaynikov';
$pageType = 'calculator';
$pageImage = 'https://electrikavrn.ru/assets/images/services/elektromontazh-white.jpg';

// Дополнительные стили
$additionalCss = ['css/calculator.css'];

// Дополнительная Schema.org разметка для FAQ
$faqSchema = [
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => [
        [
            "@type" => "Question",
            "name" => "Как пользоваться калькулятором?",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "Выберите тип помещения, укажите площадь и материал стен. Калькулятор автоматически рассчитает примерную стоимость работ с учетом базовых параметров."
            ]
        ],
        [
            "@type" => "Question",
            "name" => "Насколько точен расчет?",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "Калькулятор дает предварительную оценку стоимости. Точная цена определяется после осмотра объекта специалистом, который учтет все особенности помещения."
            ]
        ],
        [
            "@type" => "Question",
            "name" => "Что входит в базовую стоимость?",
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => "В базовую стоимость входит монтаж проводки, установка розеток и выключателей, сборка электрощита. Дополнительные работы рассчитываются отдельно."
            ]
        ]
    ]
];

include 'head.php';
?>

<body>
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>
    
    <!-- Основной контент калькулятора -->
    <section class="calculator-section py-5 mt-5">
        <div class="calcul">
            <h1>Калькулятор предварительного расчета</h1>
            <table>
                <tbody>
                    <tr class="tablculc">
                        <td>Характеристики квартиры (дома):</td>
                        <td>
                            <div class="room-select-container">
                                <select id="kolvoKomn">
                                    <option value="">Количество комнат</option>
                                    <option value="komn1">1 комната</option>
                                    <option value="komn2">2 комнаты</option>
                                    <option value="komn3">3 комнаты</option>
                                    <option value="komn4">4 комнаты</option>
                                    <option value="komn5">5 комнат</option>
                                    <option value="komn6">6 комнат</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="area-select-container">
                                <select id="ploshad">
                                    <option value="">Площадь</option>
                                    <option value="20-30kvm">20-30 кв.м.</option>
                                    <option value="30-40kvm">30-40 кв.м.</option>
                                    <option value="40-50kvm">40-50 кв.м.</option>
                                    <option value="50-60kvm">50-60 кв.м.</option>
                                    <option value="60-70kvm">60-70 кв.м.</option>
                                    <option value="70-80kvm">70-80 кв.m.</option>
                                    <option value="80-90kvm">80-90 кв.m.</option>
                                    <option value="90-100kvm">90-100 кв.m.</option>
                                    <option value="100-120kvm">100-120 кв.m.</option>
                                    <option value="120-140kvm">120-140 кв.m.</option>
                                    <option value="140-160kvm">140-160 кв.m.</option>
                                    <option value="160-180kvm">160-180 кв.m.</option>
                                    <option value="180-200kvm">180-200 кв.m.</option>
                                    <option value="200-250kvm">200-250 кв.m.</option>
                                    <option value="250-300kvm">250-300 кв.m.</option>
                                    <option value="300-350kvm">250-300 кв.m.</option>
                                    <option value="350-400kvm">250-300 кв.m.</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="wall-select-container">
                                <select id="material">
                                    <option value="">Материал стен</option>
                                    <option value="beton">Бетон</option>
                                    <option value="kirpich">Кирпич</option>
                                    <option value="gazosilikat">Газосиликат</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table2">
                <tbody>
                    <tr>
                        <td>Щиток (вид монтажа):<img id="vopros"
                                data-tippy-content="Есть два варианта монтажа электрического щитка: Накладной - бюджетный вариант, но возможно не самый эстетичный. Встраиваемый - более эстетичный вариант, но и более дорогой, т.к. приходится изготавливать нишу под щиток"
                                src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png"
                                title="Нажмите чтобы увидеть подсказку" alt="Выбор монтажа щитка"></td>
                        <td><select id="shitok">
                                <option value="nakladnoy">Накладной</option>
                                <option value="vstraivaemiy12">Встраиваемый 12 модулей</option>
                                <option value="vstraivaemiy18">Встраиваемый 18 модулей</option>
                                <option value="vstraivaemiy24">Встраиваемый 24 модуля</option>
                                <option value="vstraivaemiy36">Встраиваемый 36 модулей</option>
                                <option value="vstraivaemiy54">Встраиваемый 54 модуля</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>Тип варочной поверхности (плиты):</td>
                        <td><select id="elPlita">
                                <option value="elPlitaNo">У меня газовая плита</option>
                                <option value="elPlitaYes">У меня электрическая плита</option>
                            </select></td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>Кондиционер:</td>
                        <td><select id="condey">
                                <option value="condeyNo">Не планирую</option>
                                <option value="condey1">Планирую 1 кондиционер</option>
                                <option value="condey2">Планирую 2 кондиционера</option>
                                <option value="condey3">Планирую 3 кондиционера</option>
                                <option value="condey4">Планирую 4 кондиционера</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr class="bitteh">
                        <td>Дополнительная бытовая техника:</td>
                        <td><label for="duhShkafCheckbox">
                                <input type="checkbox" id="duhShkaf">
                                Электрический духовой шкаф
                            </label></td>
                        <td><label for="posudomoyCheckbox">
                                <input type="checkbox" id="posudomoy">
                                Посудомоечная машина
                            </label></td>
                        <td><label for="boylerCheckbox">
                                <input type="checkbox" id="boyler">
                                Бойлер
                            </label></td>
                    </tr>
                </tbody>
            </table>
    
            <div id="infoContent">
                <table class="responsive-table">
                    <tbody>
                        <tr class="image-cell">
                            <td>
                                <div class="post-info">
                                    <div class="post-title">Блоки розеток/выключателей
                                        <img id="vopros" data-tippy-content="Для того чтобы расчёт получился максимально точный, потребуется максимально точно посчитать количество каждого из типов блоков (далее постов) (одинарные, двойные, тройные и т.д.). Для этого рекомендуется зарисовать план расстановки мебели в карандаше." src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png" title="Нажмите чтобы увидеть подсказку" alt="Расчет количества выключателей и розеток">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">1 пост
                                        <img id="vopros" data-tippy-content="Один пост - значит всего одно устройство, а значит один подрозетник. Двухклавишный выключатель - это один пост, двойная розетка - тоже один пост." src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png" title="Нажмите чтобы увидеть подсказку" alt="Пояснение к одинарному блоку">
                                    </div>
                                    <div class="post-image">
                                        <img src="https://electrikavrn.ru/assets/images/calculate/1-blok-300x300.jpg" alt="Одинарный блок">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">2 поста
                                        <img id="vopros" data-tippy-content="Два поста - значит два устройства, а значит два подрозетника. Двухклавишный выключатель - это один пост, двойная розетка - тоже один пост." src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png" title="Нажмите чтобы увидеть подсказку" alt="Пояснение к двойному блоку">
                                    </div>
                                    <div class="post-image">
                                        <img src="https://electrikavrn.ru/assets/images/calculate/2-blok-300x159.jpg" alt="Двойной блок">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">3 поста
                                        <img id="vopros" data-tippy-content="Три поста - значит три устройства, а значит три подрозетника. Так же называют тройной блок." src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png" title="Нажмите чтобы увидеть подсказку" alt="Пояснение к тройному блоку">
                                    </div>
                                    <div class="post-image">
                                        <img src="https://electrikavrn.ru/assets/images/calculate/3-blok-300x107.jpg" alt="Тройной блок">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">4 поста
                                        <img id="vopros" data-tippy-content="Четыре поста - значит четыре устройство, а значит четыре подрозетника." src="https://electrikavrn.ru/assets/images/calculate/vopros2-300x300.png" title="Нажмите чтобы увидеть подсказку" alt="Пояснение к четверному блоку">
                                    </div>
                                    <div class="post-image">
                                        <img src="https://electrikavrn.ru/assets/images/calculate/4-blok-300x88.jpg" alt="Четверной блок">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">5 постов</div>
                                    <div class="post-image">
                                        <img id="post5" src="https://electrikavrn.ru/assets/images/calculate/5-blok-300x69.jpg" alt="Пятерной блок">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="post-info">
                                    <div class="post-title">Общее кол-во</div>
                                </div>
                            </td>
                        </tr>
                    
                        <tr class="image-cell">
                            <td>Количество выключателей:</td>
                            <td><input type="number" id="kolvoVikl" value="0" min="0"></td>
                            <td><input type="number" id="kolvoVikl2" value="0" min="0"></td>
                            <td><input type="number" id="kolvoVikl3" value="0" min="0"></td>
                            <td><input type="number" id="kolvoVikl4" value="0" min="0"></td>
                            <td><input type="number" id="kolvoVikl5" value="0" min="0"></td>
                            <td><span id="obsheeKolvoVikl">0</span></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>Количество розеток:</td>
                            <td><input type="number" id="kolvoRoz" value="0" min="0"></td>
                            <td><input type="number" id="kolvoRoz2" value="0" min="0"></td>
                            <td><input type="number" id="kolvoRoz3" value="0" min="0"></td>
                            <td><input type="number" id="kolvoRoz4" value="0" min="0"></td>
                            <td><input type="number" id="kolvoRoz5" value="0" min="0"></td>
                            <td><span id="obsheeKolvoRoz">0</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <div id="infoContent2">
                <table>
                    <tbody>
                        <tr>
                            <td>Количество TV-розеток (антенна):</td>
                            <td><input type="number" id="tvRoz" value="0" min="0"></td>
                            <td>Количество Eth-розеток (интернет):</td>
                            <td><input type="number" id="ethRoz" value="0" min="0"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <details>
                <summary>Подробный расчёт</summary>
                <table>
                    <thead>
                        <tr>
                            <th>Наименование услуги</th>
                            <th>Стоимость за единицу</th>
                            <th>Объем работ</th>
                            <th>Итого</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Прокладка кабеля (м.п.)</td>
                            <td>50 ₽</td>
                            <td><input type="number" id="qty1" value="0"></td>
                            <td><span id="total1">0</span></td>
                        </tr>
                        <tr>
                            <td>Штроба (м.п.)</td>
                            <td id="shtroba"></td>
                            <td><input type="number" id="qty2" value="0"></td>
                            <td><span id="total2">0</span></td>
                        </tr>
                        <tr>
                            <td>Отверстия капитальные d20 до 250мм (шт.)</td>
                            <td>200 ₽</td>
                            <td><input type="number" id="qty3" value="0"></td>
                            <td><span id="total3">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж коробки установочной d67 (шт.)</td>
                            <td id="ustKorobki"></td>
                            <td><input type="number" id="qty4" value="0"></td>
                            <td><span id="total4">0</span></td>
                        </tr>
                        <tr>
                            <td>Сборка схемы распределительной коробки (шт.)</td>
                            <td>300 ₽</td>
                            <td><input type="number" id="qty5" value="0"></td>
                            <td><span id="total5">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж щита (шт.)</td>
                            <td id="shit"></td>
                            <td><input type="number" id="qty6" value="0"></td>
                            <td><span id="total6">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж автомотических выключателей 1 полюс (шт.)</td>
                            <td>200 ₽</td>
                            <td><input type="number" id="qty7" value="0"></td>
                            <td><span id="total7">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж автомотических выключателей 2 полюса (шт.)</td>
                            <td>350 ₽</td>
                            <td><input type="number" id="qty8" value="0"></td>
                            <td><span id="total8">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж дифференциальных автоматов (шт.)</td>
                            <td>350 ₽</td>
                            <td><input type="number" id="qty9" value="0"></td>
                            <td><span id="total9">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж временного освещения (шт.)</td>
                            <td>100 ₽</td>
                            <td><input type="number" id="qty10" value="0"></td>
                            <td><span id="total10">0</span></td>
                        </tr>
                        <tr>
                            <td>Монтаж временных розеток (шт.)</td>
                            <td>150 ₽</td>
                            <td><input type="number" id="qty11" value="0"></td>
                            <td><span id="total11">0</span></td>
                        </tr>
                    </tbody>
                </table>
            </details>
            <table>
                <tbody>
                    <tr class="tablculc">
                        <td colspan="3"><strong>Общая стоимость:</strong></td>
                        <td><span id="grandTotal">0</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <?php include 'modal.php'; ?>

    <!-- JavaScript -->
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>
    <script src="js/prices.js"></script>
    <script src="js/calculate-dlya-chaynikov.js"></script>

    <?php include 'included/included-js.php'; ?>
    
</body>
</html>