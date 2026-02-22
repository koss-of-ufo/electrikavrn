<?php
$pageTitle = 'Калькулятор стоимости электромонтажных работ в Воронеже | ЭлектрикаВРН';
$pageDescription = 'Рассчитайте точную стоимость электромонтажа в Воронеже: замена проводки, установка розеток, монтаж освещения. Учитываем материал стен, тип щита, количество точек. Актуальные цены 2024 года.';
$pageCanonical = 'https://electrikavrn.ru/calculate';
$pageType = 'calculator';
$pageImage = 'https://electrikavrn.ru/assets/images/services/elektromontazh-white.jpg';

// Дополнительные стили
$additionalCss = ['css/calculator.css'];

include 'head.php';
?>

<body>    
    <?php include 'preloader.php'; ?>
    <?php include 'header.php'; ?>    

    <!-- Основной контент калькулятора -->
    <section class="calcul py-5 mt-5">
      <div class="container">
        <h1>Калькулятор стоимости электромонтажных работ</h1>

        <div class="calcul">
          <div class="calculator-container">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="wallMaterial">Материал стен:</label>
                  <select id="wallMaterial">
                    <option value="gazosilikat">Газосиликат</option>
                    <option value="kirpich">Кирпич</option>
                    <option value="beton">Бетон</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="shitokType">Тип электрощита:</label>
                  <select id="shitokType">
                    <option value="nakladnoy">Накладной</option>
                    <option value="12">Встраиваемый 12 модулей</option>
                    <option value="18">Встраиваемый 18 модулей</option>
                    <option value="24">Встраиваемый 24 модуля</option>
                    <option value="36">Встраиваемый 36 модулей</option>
                    <option value="54">Встраиваемый 54 модуля</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="responsive-table">
            <table>
              <thead>
                <tr>
                  <th>Наименование работы</th>
                  <th>Стоимость за единицу</th>
                  <th>Количество</th>
                  <th>Итого</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Прокладка кабеля</td>
                  <td><span id="kabelPrice">50</span></td>
                  <td><input type="number" id="qty1" value="0" min="0" /></td>
                  <td><span id="total1">0</span></td>
                </tr>
                <tr>
                  <td>Штробление стен</td>
                  <td><span id="shtrobaPrice">200</span></td>
                  <td><input type="number" id="qty2" value="0" min="0" /></td>
                  <td><span id="total2">0</span></td>
                </tr>
                <tr>
                  <td>Сверление отверстий</td>
                  <td><span id="otverstyPrice">200</span></td>
                  <td><input type="number" id="qty3" value="0" min="0" /></td>
                  <td><span id="total3">0</span></td>
                </tr>
                <tr>
                  <td>Установка подрозетников</td>
                  <td><span id="ustKorobkiPrice">150</span></td>
                  <td><input type="number" id="qty4" value="0" min="0" /></td>
                  <td><span id="total4">0</span></td>
                </tr>
                <tr>
                  <td>Монтаж распределительной коробки</td>
                  <td><span id="korobkaPrice">300</span></td>
                  <td><input type="number" id="qty5" value="0" min="0" /></td>
                  <td><span id="total5">0</span></td>
                </tr>
                <tr>
                  <td>Монтаж электрощита</td>
                  <td><span id="shitokPrice">2000</span></td>
                  <td><input type="number" id="qty6" value="0" min="0" /></td>
                  <td><span id="total6">0</span></td>
                </tr>
                <tr>
                  <td>Установка автомата 1P</td>
                  <td><span id="av1pPrice">200</span></td>
                  <td><input type="number" id="qty7" value="0" min="0" /></td>
                  <td><span id="total7">0</span></td>
                </tr>
                <tr>
                  <td>Установка автомата 2P</td>
                  <td><span id="av2pPrice">350</span></td>
                  <td><input type="number" id="qty8" value="0" min="0" /></td>
                  <td><span id="total8">0</span></td>
                </tr>
                <tr>
                  <td>Монтаж розетки/выключателя</td>
                  <td><span id="rozetkaPrice">200</span></td>
                  <td><input type="number" id="qty9" value="0" min="0" /></td>
                  <td><span id="total9">0</span></td>
                </tr>
                <tr>
                  <td>Монтаж светильника</td>
                  <td><span id="svetPrice">300</span></td>
                  <td><input type="number" id="qty10" value="0" min="0" /></td>
                  <td><span id="total10">0</span></td>
                </tr>
                <tr>
                  <td>Монтаж люстры</td>
                  <td><span id="lustraPrice">500</span></td>
                  <td><input type="number" id="qty11" value="0" min="0" /></td>
                  <td><span id="total11">0</span></td>
                </tr>
                <tr>
                  <td>Подключение электроплиты</td>
                  <td><span id="elPlitaPrice">1000</span></td>
                  <td><input type="number" id="qty12" value="0" min="0" /></td>
                  <td><span id="total12">0</span></td>
                </tr>
                <tr>
                  <td>Подключение варочной панели</td>
                  <td><span id="varPanelPrice">800</span></td>
                  <td><input type="number" id="qty13" value="0" min="0" /></td>
                  <td><span id="total13">0</span></td>
                </tr>
                <tr>
                  <td>Подключение духового шкафа</td>
                  <td><span id="duhPrice">800</span></td>
                  <td><input type="number" id="qty14" value="0" min="0" /></td>
                  <td><span id="total14">0</span></td>
                </tr>
                <tr>
                  <td>Подключение посудомоечной машины</td>
                  <td><span id="pmPrice">800</span></td>
                  <td><input type="number" id="qty15" value="0" min="0" /></td>
                  <td><span id="total15">0</span></td>
                </tr>
                <tr>
                  <td>Подключение кондиционера</td>
                  <td><span id="condPrice">1500</span></td>
                  <td><input type="number" id="qty16" value="0" min="0" /></td>
                  <td><span id="total16">0</span></td>
                </tr>
                <tr class="tablculc">
                  <td colspan="3">Общая стоимость:</td>
                  <td><span id="grandTotal">0</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="calculator-help mt-4">
            <h4>Важная информация:</h4>
            <ul>
              <li>
                Цены указаны за единицу работы без учета стоимости материалов
              </li>
              <li>Минимальная сумма заказа составляет 5000 рублей</li>
              <li>
                Окончательная стоимость может быть скорректирована после осмотра
                объекта
              </li>
            </ul>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="js/prices.js"></script>
    <script src="js/calculate.js"></script>
    <script src="js/main.js"></script>
    <script src="js/callback.js"></script>
    <script src="js/cookie-notice.js"></script>
    <script src="js/geolocate.js"></script>
</body>
</html>
