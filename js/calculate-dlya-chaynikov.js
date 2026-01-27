// Глобальные переменные для хранения состояния
const state = {
    shtroba: MATERIAL_PRICES.gazosilikat.shtroba.price,
    ustKorobki: MATERIAL_PRICES.gazosilikat.ustKorobki.price,
    shit: SHITOK_PRICES.nakladnoy.price
};

// Константы для количества кабеля по площади помещения (в метрах)
const CABLE_LENGTH_BY_AREA = {
    "20-30kvm": 70,
    "30-40kvm": 80,
    "40-50kvm": 100,
    "50-60kvm": 140,
    "60-70kvm": 180,
    "70-80kvm": 300,
    "80-90kvm": 400,
    "90-100kvm": 450,
    "100-120kvm": 500,
    "120-140kvm": 600,
    "140-160kvm": 700,
    "160-180kvm": 750,
    "180-200kvm": 800,
    "200-250kvm": 850,
    "250-300kvm": 900,
    "300-350kvm": 950,
    "350-400kvm": 1000
};

// Константы для параметров бытовой техники
const APPLIANCE_PARAMS = {
    elPlita: {
        kabelLength: 15,    // Длина кабеля
        podrozetniki: 1,    // Количество подрозетников
        avtomaty1p: 1,      // Количество автоматов 1P
        shtroba: 2.1        // Длина штробы
    },
    duhShkaf: {
        kabelLength: 15,
        podrozetniki: 1,
        avtomaty1p: 1,
        shtroba: 2.1
    },
    posudomoy: {
        kabelLength: 15,
        podrozetniki: 1,
        avtomaty1p: 1,
        shtroba: 2.1
    },
    boyler: {
        kabelLength: 15,
        podrozetniki: 1,
        avtomaty1p: 1,
        shtroba: 1
    },
    condey: {
        kabelLength: 15,
        podrozetniki: 1,
        avtomaty1p: 1,
        shtroba: 0.5
    }
};

// Глобальные переменные
let shtroba, ustKorobki, shit;
let kolvoKabelya = 0;
let obsheeKolvoKabelya = 0;
let kolvoOtverstiy = 0;
let kolvoPodrozetnikov, kolvoShtrobiVikl, kolvoShtrobiRoz, kolvoShtrobi, kolvoShtrobViklShtuk, kolvoShtrovRozShtuk, obsheeKolvoRoz, obsheeKolvoVikl, kolvoShtrobiTvEth;
let kolvoRaspaek = 0;
let dopAVroz = 0;
let kolvoAV1p = 0;

// Глобальные переменные для бытовой техники
let nalichieElPlita = 0;
let podrozElPlita = 0;
let AV1pElPlita = 0;
let shtrobaElPlita = 0;

let nalichieDuhShkaf = 0;
let podrozDuhShkaf = 0;
let AV1pDuhShkaf = 0;
let shtrobaDuhShkaf = 0;

let nalichiePosudomoy = 0;
let podrozPosudomoy = 0;
let AV1pPosudomoy = 0;
let shtrobaPosudomoy = 0;

let nalichieBoyler = 0;
let podrozBoyler = 0;
let AV1pBoyler = 0;
let shtrobaBoyler = 0;

let nalichieCondey = 0;
let podrozCondey = 0;
let AV1pCondey = 0;
let shtrobaCondey = 0;

var prices = [50, shtroba, 200, ustKorobki, 300, shit, 200, 350, 350, 100, 150];
var totals = [0, 0, 0, 0];
var grandTotal = 0;
var inputs = document.querySelectorAll('input[type="number"]');
var spans = document.querySelectorAll('span[id^="total"]');

function updatePrices() {
    console.log('Updating prices...');
    const material = document.getElementById("material").value;
    const shitok = document.getElementById("shitok").value;
    
    console.log('Selected material:', material);
    console.log('Selected shitok:', shitok);

    if (material && MATERIAL_PRICES[material]) {
        state.shtroba = MATERIAL_PRICES[material].shtroba.price;
        state.ustKorobki = MATERIAL_PRICES[material].ustKorobki.price;
        console.log('Updated material prices:', {
            shtroba: state.shtroba,
            ustKorobki: state.ustKorobki
        });
    }

    if (shitok === 'nakladnoy') {
        state.shit = SHITOK_PRICES.nakladnoy.price;
        console.log('Updated shitok price (nakladnoy):', state.shit);
    } else {
        const [, size] = shitok.match(/vstraivaemiy(\d+)/) || [];
        if (size && SHITOK_PRICES.vstraivaemiy[size][material]) {
            state.shit = SHITOK_PRICES.vstraivaemiy[size][material].price;
            console.log('Updated shitok price (vstraivaemiy):', state.shit);
        } else {
            state.shit = SHITOK_PRICES.nakladnoy.price;
            console.log('Using default nakladnoy price:', state.shit);
        }
    }

    updatePriceDisplay();
    calculateTotals();
}

function updatePriceDisplay() {
    console.log('Updating price display...');
    
    // Обновляем цены из UNIT_PRICES
    const shtrobaEl = document.getElementById("shtroba");
    const ustKorobkiEl = document.getElementById("ustKorobki");
    const shitEl = document.getElementById("shit");

    if (shtrobaEl) {
        shtrobaEl.textContent = state.shtroba + " ₽";
        console.log('Updated shtroba display:', shtrobaEl.textContent);
    } else {
        console.warn('Element with id "shtroba" not found');
    }

    if (ustKorobkiEl) {
        ustKorobkiEl.textContent = state.ustKorobki + " ₽";
        console.log('Updated ustKorobki display:', ustKorobkiEl.textContent);
    } else {
        console.warn('Element with id "ustKorobki" not found');
    }

    if (shitEl) {
        shitEl.textContent = state.shit + " ₽";
        console.log('Updated shit display:', shitEl.textContent);
    } else {
        console.warn('Element with id "shit" not found');
    }

    // Обновляем все цены в таблице
    const prices = {
        "qty1": UNIT_PRICES.kabel.price,
        "qty3": UNIT_PRICES.otversty.price,
        "qty5": UNIT_PRICES.korobka.price,
        "qty7": UNIT_PRICES.av1p.price,
        "qty8": UNIT_PRICES.av2p.price,
        "qty9": UNIT_PRICES.dif.price,
        "qty10": UNIT_PRICES.tempLight.price,
        "qty11": UNIT_PRICES.tempSocket.price
    };

    // Обновляем отображение цен
    Object.entries(prices).forEach(([id, price]) => {
        const row = document.getElementById(id)?.closest('tr');
        if (row) {
            const priceCell = row.querySelector('td:nth-child(2)');
            if (priceCell) {
                priceCell.textContent = price + " ₽";
                console.log(`Updated price for ${id}:`, priceCell.textContent);
            } else {
                console.warn(`Price cell not found for ${id}`);
            }
        } else {
            console.warn(`Row not found for element with id ${id}`);
        }
    });
}

// Функция расчета общей стоимости
function calculateTotals() {
    // Получаем все необходимые значения
    const values = {
        kabel: getNumericValue("qty1"),
        shtroba: getNumericValue("qty2"),
        otversty: getNumericValue("qty3"),
        korobka: getNumericValue("qty4"),
        rasprKorobka: getNumericValue("qty5"),
        shit: getNumericValue("qty6"),
        av1p: getNumericValue("qty7"),
        av2p: getNumericValue("qty8"),
        dif: getNumericValue("qty9"),
        tempLight: getNumericValue("qty10"),
        tempSocket: getNumericValue("qty11")
    };

    // Рассчитываем стоимость для каждой позиции
    const totals = {
        kabel: Math.round(values.kabel * UNIT_PRICES.kabel.price),
        shtroba: Math.round(values.shtroba * state.shtroba),
        otversty: Math.round(values.otversty * UNIT_PRICES.otversty.price),
        korobka: Math.round(values.korobka * state.ustKorobki),
        rasprKorobka: Math.round(values.rasprKorobka * UNIT_PRICES.korobka.price),
        shit: Math.round(values.shit * state.shit),
        av1p: Math.round(values.av1p * UNIT_PRICES.av1p.price),
        av2p: Math.round(values.av2p * UNIT_PRICES.av2p.price),
        dif: Math.round(values.dif * UNIT_PRICES.dif.price),
        tempLight: Math.round(values.tempLight * UNIT_PRICES.tempLight.price),
        tempSocket: Math.round(values.tempSocket * UNIT_PRICES.tempSocket.price)
    };

    // Обновляем отображение всех итогов
    Object.entries(totals).forEach(([key, value], index) => {
        const totalElement = document.getElementById(`total${index + 1}`);
        if (totalElement) {
            totalElement.textContent = value + " ₽";
        }
    });

    // Считаем общую сумму
    const grandTotal = Math.round(Object.values(totals).reduce((sum, value) => sum + value, 0));
    document.getElementById("grandTotal").textContent = grandTotal + " ₽";
}

// Вспомогательная функция для получения числового значения из input
function getNumericValue(elementId) {
    const element = document.getElementById(elementId);
    if (!element) return 0;
    const value = parseFloat(element.value);
    return isNaN(value) ? 0 : value;
}

// Функция обновления количества кабеля
function updateKolvoKabelya() {
    const ploshad = document.getElementById("ploshad").value;
    const baseKabel = CABLE_LENGTH_BY_AREA[ploshad] || 0;

    obsheeKolvoKabelya = baseKabel + 
        nalichieElPlita + 
        nalichieDuhShkaf + 
        nalichiePosudomoy + 
        nalichieCondey + 
        nalichieBoyler;

    document.getElementById("qty1").value = obsheeKolvoKabelya;
    calculateTotals();
}

// Функция обновления количества штроб и количества подрозетников
function updateKolvoShtrobi() {
    const switches = calculateSwitchesTotal();
    const sockets = calculateSocketsTotal();
    const tvEth = calculateTvEthTotal();
    
    kolvoPodrozetnikov = switches.total + sockets.total + tvEth + 
        podrozDuhShkaf + podrozPosudomoy + podrozBoyler;
    
    kolvoShtrobiVikl = Math.round(switches.count * 1.6 * 10) / 10;
    kolvoShtrobiRoz = Math.round(sockets.count * 2.1 * 10) / 10;
    kolvoShtrobiTvEth = Math.round(tvEth * 2 * 10) / 10;
    
    kolvoShtrobi = Math.round((kolvoShtrobiVikl + kolvoShtrobiRoz + kolvoShtrobiTvEth + 
        shtrobaElPlita + shtrobaDuhShkaf + shtrobaPosudomoy + 
        shtrobaBoyler + shtrobaCondey) * 10) / 10;

    document.getElementById("qty2").value = kolvoShtrobi;
    document.getElementById("qty4").value = kolvoPodrozetnikov;
    document.getElementById("obsheeKolvoVikl").innerHTML = switches.total;
    document.getElementById("obsheeKolvoRoz").innerHTML = sockets.total;
    
    calculateTotals();
}

// Вспомогательные функции для расчета количества выключателей и розеток
function calculateSwitchesTotal() {
    const counts = [1, 2, 3, 4, 5].map(i => {
        const value = getNumericValue(`kolvoVikl${i > 1 ? i : ''}`);
        return { single: value, total: value * i };
    });
    
    return {
        count: counts.reduce((sum, item) => sum + item.single, 0),
        total: counts.reduce((sum, item) => sum + item.total, 0)
    };
}

function calculateSocketsTotal() {
    const counts = [1, 2, 3, 4, 5].map(i => {
        const value = getNumericValue(`kolvoRoz${i > 1 ? i : ''}`);
        return { single: value, total: value * i };
    });
    
    return {
        count: counts.reduce((sum, item) => sum + item.single, 0),
        total: counts.reduce((sum, item) => sum + item.total, 0)
    };
}

function calculateTvEthTotal() {
    const tv = getNumericValue("tvRoz");
    const eth = getNumericValue("ethRoz");
    return (tv + eth) * 2;
}

// Функция обработки изменения типа плиты
function handleElPlitaChange() {
    const elPlitaSelect = document.getElementById("elPlita");
    const isElectric = elPlitaSelect.value === "elPlitaYes";

    if (isElectric) {
        nalichieElPlita = APPLIANCE_PARAMS.elPlita.kabelLength;
        podrozElPlita = APPLIANCE_PARAMS.elPlita.podrozetniki;
        AV1pElPlita = APPLIANCE_PARAMS.elPlita.avtomaty1p;
        shtrobaElPlita = APPLIANCE_PARAMS.elPlita.shtroba;
    } else {
        nalichieElPlita = 0;
        podrozElPlita = 0;
        AV1pElPlita = 0;
        shtrobaElPlita = 0;
    }

    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoAV1p();
}

// Функция обновления количества автоматических выключателей
function updateKolvoAV1p() {
    const kolvoKomnStroka = document.getElementById("kolvoKomn").value;
    const kolvoKomn = parseInt(kolvoKomnStroka.replace(/\D+/g, '')) || 0;
    
    // Базовое количество автоматов (2 + количество комнат)
    const baseAV1p = kolvoKomn ? 2 + kolvoKomn : 0;
    
    // Дополнительные автоматы от розеток
    const dopAVroz = calculateDopAVroz();
    
    // Автоматы от бытовой техники
    const techAV1p = AV1pElPlita + AV1pDuhShkaf + AV1pPosudomoy + AV1pCondey + AV1pBoyler;
    
    // Общее количество автоматов
    kolvoAV1p = baseAV1p + dopAVroz + techAV1p;
    
    document.getElementById("qty7").value = kolvoAV1p;
    calculateTotals();
}

// Функция для расчета дополнительных автоматов от розеток
function calculateDopAVroz() {
    const kolvoKomnStroka = document.getElementById("kolvoKomn").value;
    const kolvoKomn = parseInt(kolvoKomnStroka.replace(/\D+/g, '')) || 0;
    
    // Считаем общее количество розеток
    const obsheeKolvoRoz = calculateSocketsTotal().total;
    
    // Базовое количество розеток на комнату (6 розеток на комнату)
    const koeffA = kolvoKomn * 6;
    
    // Если розеток больше чем базовое количество, добавляем автоматы
    if (obsheeKolvoRoz > koeffA) {
        return Math.floor((obsheeKolvoRoz - koeffA) / 8);
    }
    
    return 0;
}

// Функции обработки изменений бытовой техники
function handleDuhShkafChange() {
    const checked = document.getElementById("duhShkaf").checked;
    if (checked) {
        nalichieDuhShkaf = APPLIANCE_PARAMS.duhShkaf.kabelLength;
        podrozDuhShkaf = APPLIANCE_PARAMS.duhShkaf.podrozetniki;
        AV1pDuhShkaf = APPLIANCE_PARAMS.duhShkaf.avtomaty1p;
        shtrobaDuhShkaf = APPLIANCE_PARAMS.duhShkaf.shtroba;
    } else {
        nalichieDuhShkaf = 0;
        podrozDuhShkaf = 0;
        AV1pDuhShkaf = 0;
        shtrobaDuhShkaf = 0;
    }
    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoAV1p();
}

function handlePosudomoyChange() {
    const checked = document.getElementById("posudomoy").checked;
    if (checked) {
        nalichiePosudomoy = APPLIANCE_PARAMS.posudomoy.kabelLength;
        podrozPosudomoy = APPLIANCE_PARAMS.posudomoy.podrozetniki;
        AV1pPosudomoy = APPLIANCE_PARAMS.posudomoy.avtomaty1p;
        shtrobaPosudomoy = APPLIANCE_PARAMS.posudomoy.shtroba;
    } else {
        nalichiePosudomoy = 0;
        podrozPosudomoy = 0;
        AV1pPosudomoy = 0;
        shtrobaPosudomoy = 0;
    }
    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoAV1p();
}

function handleBoylerChange() {
    const checked = document.getElementById("boyler").checked;
    if (checked) {
        nalichieBoyler = APPLIANCE_PARAMS.boyler.kabelLength;
        podrozBoyler = APPLIANCE_PARAMS.boyler.podrozetniki;
        AV1pBoyler = APPLIANCE_PARAMS.boyler.avtomaty1p;
        shtrobaBoyler = APPLIANCE_PARAMS.boyler.shtroba;
    } else {
        nalichieBoyler = 0;
        podrozBoyler = 0;
        AV1pBoyler = 0;
        shtrobaBoyler = 0;
    }
    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoAV1p();
}

function handleCondeyChange() {
    const condeySelect = document.getElementById("condey");
    const value = condeySelect.value;
    const count = value === "condeyNo" ? 0 : parseInt(value.replace("condey", ""));
    
    nalichieCondey = count * APPLIANCE_PARAMS.condey.kabelLength;
    podrozCondey = count * APPLIANCE_PARAMS.condey.podrozetniki;
    AV1pCondey = count * APPLIANCE_PARAMS.condey.avtomaty1p;
    shtrobaCondey = count * APPLIANCE_PARAMS.condey.shtroba;
    
    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoAV1p();
}

function updateKolvoRaspaek() {
    const kolvoRoz = parseInt(document.getElementById("kolvoRoz").value);
    const kolvoRoz2 = parseInt(document.getElementById("kolvoRoz2").value);
    const kolvoRoz3 = parseInt(document.getElementById("kolvoRoz3").value);
    const kolvoRoz4 = parseInt(document.getElementById("kolvoRoz4").value);
    const kolvoRoz5 = parseInt(document.getElementById("kolvoRoz5").value);
    obsheeKolvoRoz = kolvoRoz + (kolvoRoz2 * 2) + (kolvoRoz3 * 3) + (kolvoRoz4 * 4) + (kolvoRoz5 * 5);
    const kolvoKomnStroka = document.getElementById("kolvoKomn").value;
    const kolvoKomn = parseInt(kolvoKomnStroka.replace(/\D+/g, ''));
    const koeffA = 6 * kolvoKomn;
    const koeffB = (obsheeKolvoRoz - koeffA) / 4;
    const koeffAV = (obsheeKolvoRoz - koeffA) / 8;
    const koeffC = Math.ceil(koeffB);
    dopAVroz = obsheeKolvoRoz >= koeffA ? Math.floor(koeffAV) : 0;
    const kolvoVikl = parseInt(document.getElementById("kolvoVikl").value);
    const kolvoVikl2 = parseInt(document.getElementById("kolvoVikl2").value);
    const kolvoVikl3 = parseInt(document.getElementById("kolvoVikl3").value);
    const kolvoVikl4 = parseInt(document.getElementById("kolvoVikl4").value);
    const kolvoVikl5 = parseInt(document.getElementById("kolvoVikl5").value);
    obsheeKolvoVikl = kolvoVikl + (kolvoVikl2 * 2) + (kolvoVikl3 * 3) + (kolvoVikl4 * 4) + (kolvoVikl5 * 5);
    const koeffVikl = obsheeKolvoVikl - (kolvoKomn + 3);
    const koeffD = koeffVikl < 0 ? 0 : Math.ceil(koeffVikl);

    if (obsheeKolvoRoz === 0 && obsheeKolvoVikl === 0) {
        kolvoRaspaek = 0;
    } else if (koeffA >= obsheeKolvoRoz) {
        kolvoRaspaek = 2 * kolvoKomn + 3;
    } else if (koeffA < obsheeKolvoRoz) {
        kolvoRaspaek = 2 * kolvoKomn + 3 + koeffC + koeffD;
    }
    document.getElementById("qty5").value = kolvoRaspaek;
    calculateTotals();
}

function updateKolvoOtverstiy() {
    const kolvoKomnSelect = document.getElementById("kolvoKomn");
    const kolvoKomn = kolvoKomnSelect.value;
    
    // Показываем блоки при выборе любого значения кроме пустого
    if (kolvoKomn && kolvoKomn !== "") {
        document.getElementById("infoContent").style.display = "block";
        document.getElementById("infoContent2").style.display = "block";
        // Добавляем класс для анимации
        document.getElementById("infoContent").classList.add("visible");
        document.getElementById("infoContent2").classList.add("visible");
    } else {
        document.getElementById("infoContent").classList.remove("visible");
        document.getElementById("infoContent2").classList.remove("visible");
        setTimeout(() => {
            document.getElementById("infoContent").style.display = "none";
            document.getElementById("infoContent2").style.display = "none";
        }, 300); // Задержка для анимации
    }
    
    // Извлекаем число из строки (например, из "komn1" получаем 1)
    const kolvoKomnNumber = kolvoKomn ? parseInt(kolvoKomn.replace(/\D/g, '')) : 0;
    kolvoOtverstiy = kolvoKomnNumber ? 2 + kolvoKomnNumber : 0;
    
    document.getElementById("qty3").value = kolvoOtverstiy;
    calculateTotals();
}

// Добавляем слушатель изменений
document.getElementById("kolvoKomn").addEventListener("change", updateKolvoOtverstiy);

function updateShit() {
    const kolvoKomn = document.getElementById("kolvoKomn").value;
    const kolvoShit = kolvoKomn ? 1 : 0;
    const kolvoAV2p = kolvoKomn ? 1 : 0;
    const kolvoDifA = kolvoKomn ? 1 : 0;
    document.getElementById("qty6").value = kolvoShit;
    document.getElementById("qty8").value = kolvoAV2p;
    document.getElementById("qty9").value = kolvoDifA;
    calculateTotals();
}

function updateObsheeKolvoViklRoz() {
    const kolvoKomnStroka = document.getElementById("kolvoKomn").value;
    const kolvoKomn = parseInt(kolvoKomnStroka.replace(/\D+/g, ''));
    const vikl1 = kolvoKomn ? kolvoKomn + 3 : 0;
    const roz1 = kolvoKomn ? kolvoKomn + 2 : 0;
    const roz2 = kolvoKomn ? 2 * kolvoKomn : 0;
    const roz3 = kolvoKomn ? kolvoKomn : 0;
    document.getElementById("kolvoVikl").value = vikl1;
    document.getElementById("kolvoRoz").value = roz1;
    document.getElementById("kolvoRoz2").value = roz2;
    document.getElementById("kolvoRoz3").value = roz3;
    updateKolvoShtrobi();
    updateKolvoRaspaek();
    calculateTotals();
}

function updateKolvoCokoley() {
    const kolvoKomnStroka = document.getElementById("kolvoKomn").value;
    const kolvoKomn = parseInt(kolvoKomnStroka.replace(/\D+/g, ''));
    const kolvoCokoley = kolvoKomn ? kolvoKomn + 3 : 0;
    const kolvoVremVoz = kolvoKomn ? kolvoKomn + 1 : 0;
    document.getElementById("qty10").value = kolvoCokoley;
    document.getElementById("qty11").value = kolvoVremVoz;
    calculateTotals();
}

tippy('[data-tippy-content]', {
    trigger: 'click',
    animation: 'scale-extreme'
});

// Получаем ссылки на кнопку и информацию
function toggleInfo() {
    var infoContent = document.getElementById("infoContent");
    if (infoContent.style.display != "block") {
        infoContent.style.display = "block";
    } else {
        infoContent.style.display = "none";
    }
}

function toggleInfo2() {
    var infoContent2 = document.getElementById("infoContent2");
    if (infoContent2.style.display != "block") {
        infoContent2.style.display = "block";
    } else {
        infoContent2.style.display = "none";
    }
}

// Основная функция пересчета всех значений
function recalculateAll() {
    updatePrices();
    updateKolvoKabelya();
    updateKolvoShtrobi();
    updateKolvoRaspaek();
    updateKolvoAV1p();
    updateShit();
    calculateTotals();
}

// Обработчик изменения бытовой техники
function updateAppliance(type, values) {
    const element = document.getElementById(type);
    const isChecked = element.type === 'checkbox' ? element.checked : element.value !== type + 'No';
    
    if (isChecked) {
        Object.assign(state, values);
    } else {
        Object.assign(state, {
            ['nalichie' + type]: 0,
            ['podroz' + type]: 0,
            ['AV1p' + type]: 0,
            ['shtroba' + type]: 0
        });
    }
    
    recalculateAll();
}

// Функция для инициализации всех обработчиков событий
function initializeEventListeners() {
    // Обработчики для основных селекторов
    const kolvoKomn = document.getElementById('kolvoKomn');
    if (kolvoKomn) {
        kolvoKomn.addEventListener('change', () => {
            updateKolvoOtverstiy();
            updateObsheeKolvoViklRoz();
            updateKolvoCokoley();
            updateShit();
            updateKolvoAV1p();
            calculateTotals();
        });
    }

    const ploshad = document.getElementById('ploshad');
    if (ploshad) {
        ploshad.addEventListener('change', () => {
            updateKolvoKabelya();
            calculateTotals();
        });
    }

    const material = document.getElementById('material');
    if (material) {
        material.addEventListener('change', () => {
            updatePrices();
            calculateTotals();
        });
    }

    const shitok = document.getElementById('shitok');
    if (shitok) {
        shitok.addEventListener('change', () => {
            updatePrices();
            calculateTotals();
        });
    }

    // Обработчики для бытовой техники
    const elPlita = document.getElementById('elPlita');
    if (elPlita) {
        elPlita.addEventListener('change', handleElPlitaChange);
    }

    const duhShkaf = document.getElementById('duhShkaf');
    if (duhShkaf) {
        duhShkaf.addEventListener('change', handleDuhShkafChange);
    }

    const posudomoy = document.getElementById('posudomoy');
    if (posudomoy) {
        posudomoy.addEventListener('change', handlePosudomoyChange);
    }

    const boyler = document.getElementById('boyler');
    if (boyler) {
        boyler.addEventListener('change', handleBoylerChange);
    }

    const condey = document.getElementById('condey');
    if (condey) {
        condey.addEventListener('change', handleCondeyChange);
    }

    // Обработчики для выключателей и розеток
    ['kolvoVikl', 'kolvoVikl2', 'kolvoVikl3', 'kolvoVikl4', 'kolvoVikl5'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('change', () => {
                updateKolvoShtrobi();
                updateKolvoRaspaek();
                calculateTotals();
            });
        }
    });

    ['kolvoRoz', 'kolvoRoz2', 'kolvoRoz3', 'kolvoRoz4', 'kolvoRoz5'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('change', () => {
                updateKolvoShtrobi();
                updateKolvoRaspaek();
                updateKolvoAV1p();
                calculateTotals();
            });
        }
    });

    // Обработчики для ТВ и интернет розеток
    ['tvRoz', 'ethRoz'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('change', () => {
                updateKolvoShtrobi();
                calculateTotals();
            });
        }
    });
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
    // Инициализируем цены
    updatePrices();
    updatePriceDisplay();

    // Добавляем обработчики событий для изменения материала и типа щитка
    const material = document.getElementById("material");
    if (material) {
        material.addEventListener('change', updatePrices);
    }

    const shitok = document.getElementById("shitok");
    if (shitok) {
        shitok.addEventListener('change', updatePrices);
    }

    // Добавляем обработчики для всех полей ввода
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });

    initializeEventListeners();
    recalculateAll();
});
