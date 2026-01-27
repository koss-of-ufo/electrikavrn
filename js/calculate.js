/* Инициализация AOS */
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    mirror: false
});

/* Коэффициенты сложности для материалов стен */
const wallMaterialCoefficients = {
    'concrete': 1.3,      /* Бетон */
    'brick': 1.2,         /* Кирпич */
    'gasSilicate': 1.1    /* Газосиликат */
};

/* Функция инициализации цен */
function initializePrices() {
    /* Установка фиксированных цен */
    document.getElementById('cablePrice').textContent = servicePrices.cableLayingPrice + ' ₽';
    document.getElementById('holesPrice').textContent = servicePrices.holesDrillingPrice + ' ₽';
    document.getElementById('boxPrice').textContent = servicePrices.boxAssemblyPrice + ' ₽';
    document.getElementById('singlePolePrice').textContent = servicePrices.singlePolePrice + ' ₽';
    document.getElementById('doublePolePrice').textContent = servicePrices.doublePolePrice + ' ₽';
    document.getElementById('diffPrice').textContent = servicePrices.diffSwitchPrice + ' ₽';
    document.getElementById('tempLightPrice').textContent = servicePrices.tempLightingPrice + ' ₽';
    document.getElementById('tempSocketPrice').textContent = servicePrices.tempSocketPrice + ' ₽';
    
    /* Обновление цен в зависимости от материала и типа щитка */
    updatePrices();
    updatePrices2();
}

/* Обновление цен в зависимости от материала */
function updatePrices() {
    const material = document.getElementById('wallMaterial').value;
    const shitokType = document.getElementById('shitokType').value;
    
    console.log('Updating prices for material:', material, 'and shitok type:', shitokType);

    try {
        // Обновление цены штробления
        const shtrobaPrice = document.getElementById('shtrobaPrice');
        if (shtrobaPrice && MATERIAL_PRICES[material] && MATERIAL_PRICES[material].shtroba) {
            shtrobaPrice.textContent = MATERIAL_PRICES[material].shtroba.price;
        }
        
        // Обновление цены установки подрозетников
        const ustKorobkiPrice = document.getElementById('ustKorobkiPrice');
        if (ustKorobkiPrice && MATERIAL_PRICES[material] && MATERIAL_PRICES[material].ustKorobki) {
            ustKorobkiPrice.textContent = MATERIAL_PRICES[material].ustKorobki.price;
        }
        
        // Обновление цены монтажа щита
        const shitokPrice = document.getElementById('shitokPrice');
        if (shitokPrice) {
            let price;
            if (shitokType === 'nakladnoy') {
                price = SHITOK_PRICES.nakladnoy.price;
            } else if (SHITOK_PRICES.vstraivaemiy[shitokType] && SHITOK_PRICES.vstraivaemiy[shitokType][material]) {
                price = SHITOK_PRICES.vstraivaemiy[shitokType][material].price;
            }
            if (price) {
                shitokPrice.textContent = price;
            }
        }

        // Обновление базовых цен
        const kabelPrice = document.getElementById('kabelPrice');
        if (kabelPrice) kabelPrice.textContent = BASE_PRICES.kabel;

        const otverstyPrice = document.getElementById('otverstyPrice');
        if (otverstyPrice) otverstyPrice.textContent = BASE_PRICES.otversty;

        const korobkaPrice = document.getElementById('korobkaPrice');
        if (korobkaPrice) korobkaPrice.textContent = BASE_PRICES.korobka;

        const av1pPrice = document.getElementById('av1pPrice');
        if (av1pPrice) av1pPrice.textContent = BASE_PRICES.av1p;

        const av2pPrice = document.getElementById('av2pPrice');
        if (av2pPrice) av2pPrice.textContent = BASE_PRICES.av2p;

        // Пересчет общей стоимости
        calculateTotal();
        
    } catch (error) {
        console.error('Error updating prices:', error);
    }
}

/* Обновление цен в зависимости от типа щитка */
function updatePrices2() {
    const shitok = document.getElementById('shitok').value;
    const price = shitokPrices[shitok];
    
    document.getElementById('shit').textContent = price + ' ₽';
    
    calculateTotal();
}

/* Функция валидации формы */
function validateProForm() {
    const form = document.getElementById('calculatorProForm');
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    return isValid;
}

/* Функция анимации изменения цены */
function animatePrice(oldPrice, newPrice) {
    const duration = 1000;
    const steps = 60;
    const step = Math.abs(newPrice - oldPrice) / steps;
    let current = oldPrice;
    let progress = 0;

    const animate = () => {
        progress++;
        if (newPrice > oldPrice) {
            current = Math.min(current + step, newPrice);
        } else {
            current = Math.max(current - step, newPrice);
        }

        document.getElementById('totalPrice').textContent = Math.round(current).toLocaleString();

        if (progress < steps) {
            requestAnimationFrame(animate);
        }
    };

    requestAnimationFrame(animate);
}

/* Функция форматирования числа */
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

/* Функция форматирования цены */
function formatPrice(num) {
    return formatNumber(num) + ' ₽';
}

/* Обновление цен за единицу в таблице */
function updateUnitPrices() {
    const material = document.getElementById('wallMaterial').value;
    const shitokType = document.getElementById('shitokType').value;
    
    try {
        // Обновление цены штробления
        if (MATERIAL_PRICES[material] && MATERIAL_PRICES[material].shtroba) {
            document.getElementById('shtrobaPrice').textContent = formatNumber(MATERIAL_PRICES[material].shtroba.price);
        }
        
        // Обновление цены установки подрозетников
        if (MATERIAL_PRICES[material] && MATERIAL_PRICES[material].ustKorobki) {
            document.getElementById('ustKorobkiPrice').textContent = formatNumber(MATERIAL_PRICES[material].ustKorobki.price);
        }
        
        // Обновление цены монтажа щита
        let shitokPrice;
        if (shitokType === 'nakladnoy') {
            shitokPrice = SHITOK_PRICES.nakladnoy.price;
        } else if (SHITOK_PRICES.vstraivaemiy[shitokType] && SHITOK_PRICES.vstraivaemiy[shitokType][material]) {
            shitokPrice = SHITOK_PRICES.vstraivaemiy[shitokType][material].price;
        }
        if (shitokPrice) {
            document.getElementById('shitokPrice').textContent = formatNumber(shitokPrice);
        }

        // Обновление базовых цен
        document.getElementById('kabelPrice').textContent = formatNumber(BASE_PRICES.kabel);
        document.getElementById('otverstyPrice').textContent = formatNumber(BASE_PRICES.otversty);
        document.getElementById('korobkaPrice').textContent = formatNumber(BASE_PRICES.korobka);
        document.getElementById('av1pPrice').textContent = formatNumber(BASE_PRICES.av1p);
        document.getElementById('av2pPrice').textContent = formatNumber(BASE_PRICES.av2p);

        // Обновление цен дополнительных работ
        document.getElementById('rozetkaPrice').textContent = formatNumber(ADDITIONAL_PRICES.rozetka.price);
        document.getElementById('svetPrice').textContent = formatNumber(ADDITIONAL_PRICES.svet.price);
        document.getElementById('lustraPrice').textContent = formatNumber(ADDITIONAL_PRICES.lustra.price);
        document.getElementById('elPlitaPrice').textContent = formatNumber(ADDITIONAL_PRICES.elPlita.price);
        document.getElementById('varPanelPrice').textContent = formatNumber(ADDITIONAL_PRICES.varPanel.price);
        document.getElementById('duhPrice').textContent = formatNumber(ADDITIONAL_PRICES.duh.price);
        document.getElementById('pmPrice').textContent = formatNumber(ADDITIONAL_PRICES.pm.price);
        document.getElementById('condPrice').textContent = formatNumber(ADDITIONAL_PRICES.cond.price);
        
    } catch (error) {
        console.error('Ошибка при обновлении цен за единицу:', error);
    }
}

/* Расчет общей стоимости */
function calculateTotal() {
    let total = 0;
    const material = document.getElementById('wallMaterial').value;
    const shitokType = document.getElementById('shitokType').value;

    try {
        // Обновляем цены за единицу
        updateUnitPrices();

        // Получаем количества для всех пунктов
        const quantities = [];
        for(let i = 1; i <= 16; i++) {
            quantities[i] = parseInt(document.getElementById('qty' + i).value || 0);
        }

    // Расчет стоимости базовых работ
        const totals = [];
        
        // Базовые работы
        totals[1] = quantities[1] * BASE_PRICES.kabel;
        totals[2] = quantities[2] * MATERIAL_PRICES[material].shtroba.price;
        totals[3] = quantities[3] * BASE_PRICES.otversty;
        totals[4] = quantities[4] * MATERIAL_PRICES[material].ustKorobki.price;
        totals[5] = quantities[5] * BASE_PRICES.korobka;
    
    // Расчет стоимости монтажа щита
        let shitokPrice;
    if (shitokType === 'nakladnoy') {
            shitokPrice = SHITOK_PRICES.nakladnoy.price;
    } else {
            shitokPrice = SHITOK_PRICES.vstraivaemiy[shitokType][material].price;
        }
        totals[6] = quantities[6] * shitokPrice;
        
        // Автоматы
        totals[7] = quantities[7] * BASE_PRICES.av1p;
        totals[8] = quantities[8] * BASE_PRICES.av2p;

        // Дополнительные работы
        totals[9] = quantities[9] * ADDITIONAL_PRICES.rozetka.price;
        totals[10] = quantities[10] * ADDITIONAL_PRICES.svet.price;
        totals[11] = quantities[11] * ADDITIONAL_PRICES.lustra.price;
        totals[12] = quantities[12] * ADDITIONAL_PRICES.elPlita.price;
        totals[13] = quantities[13] * ADDITIONAL_PRICES.varPanel.price;
        totals[14] = quantities[14] * ADDITIONAL_PRICES.duh.price;
        totals[15] = quantities[15] * ADDITIONAL_PRICES.pm.price;
        totals[16] = quantities[16] * ADDITIONAL_PRICES.cond.price;

        // Обновление отображения всех промежуточных итогов
        for(let i = 1; i <= 16; i++) {
            document.getElementById('total' + i).textContent = formatPrice(totals[i]);
        }

        // Подсчет общей суммы
        total = totals.reduce((sum, current) => sum + (current || 0), 0);

        // Обновление общей стоимости с форматированием
        document.getElementById('grandTotal').textContent = formatPrice(total);

    } catch (error) {
        console.error('Ошибка при расчете стоимости:', error);
    }
}

/* Обработка отправки формы */
function handleFormSubmit(e) {
    e.preventDefault();

    if (!validateProForm()) {
        /* Показываем сообщение об ошибке */
        const toast = new bootstrap.Toast(document.querySelector('.toast-error'));
        toast.show();
        return;
    }

    /* Собираем данные формы */
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    /* Добавляем итоговую стоимость */
    data.totalPrice = document.getElementById('totalPrice').textContent;

    /* Здесь будет отправка данных на сервер */
    console.log('Отправка данных:', data);

    /* Показываем сообщение об успехе */
    const toast = new bootstrap.Toast(document.querySelector('.toast-success'));
    toast.show();
}

/* Инициализация при загрузке страницы */
document.addEventListener('DOMContentLoaded', function() {
    console.log('Страница загружена, инициализация калькулятора...');
    
    // Добавление обработчиков событий для селектов
    const wallMaterialSelect = document.getElementById('wallMaterial');
    const shitokTypeSelect = document.getElementById('shitokType');
    
    if (wallMaterialSelect) {
        wallMaterialSelect.addEventListener('change', calculateTotal);
    }
    
    if (shitokTypeSelect) {
        shitokTypeSelect.addEventListener('change', calculateTotal);
    }
    
    // Добавление обработчиков для всех полей ввода количества
    for(let i = 1; i <= 16; i++) {
        const input = document.getElementById('qty' + i);
        if (input) {
            input.addEventListener('input', calculateTotal);
        }
    }

    // Инициализация тултипов
    const tooltips = document.querySelectorAll('.custom-tooltip');
    tooltips.forEach(tooltip => {
        tooltip.addEventListener('mouseenter', function() {
            const tooltipText = this.querySelector('.tooltip-text');
            if (tooltipText) {
                tooltipText.style.visibility = 'visible';
                tooltipText.style.opacity = '1';
            }
        });

        tooltip.addEventListener('mouseleave', function() {
            const tooltipText = this.querySelector('.tooltip-text');
            if (tooltipText) {
                tooltipText.style.visibility = 'hidden';
                tooltipText.style.opacity = '0';
            }
        });
    });

    // Начальный расчет при загрузке
    calculateTotal();
}); 