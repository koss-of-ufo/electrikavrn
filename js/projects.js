// Инициализация AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    mirror: false
});

// Фильтрация проектов
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const projectCards = document.querySelectorAll('[data-category]');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Активный класс для кнопок
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Фильтрация проектов
            projectCards.forEach(card => {
                const categories = card.dataset.category.split(' ');
                if (filter === 'all' || categories.includes(filter)) {
                    card.style.display = '';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 0);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});

// Эффект при наведении на карточки проектов
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
        this.style.transition = 'transform 0.3s ease';
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});

// Добавляем плавный переход между изображениями "до/после" на детальной странице
if (document.querySelector('.project-detail-images')) {
    document.querySelectorAll('.project-detail-images').forEach(container => {
        const images = container.querySelectorAll('img');
        if (images.length === 2) {
            let isShowingBefore = true;
            
            container.addEventListener('click', function() {
                const beforeImage = images[0];
                const afterImage = images[1];
                
                if (isShowingBefore) {
                    beforeImage.style.opacity = '0';
                    afterImage.style.opacity = '1';
                } else {
                    beforeImage.style.opacity = '1';
                    afterImage.style.opacity = '0';
                }
                
                isShowingBefore = !isShowingBefore;
            });

            // Добавляем подсказку
            const hint = document.createElement('div');
            hint.className = 'image-hint';
            hint.textContent = 'Нажмите для переключения До/После';
            container.appendChild(hint);
        }
    });
}

// Функция форматирования числа с пробелами
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

// Функция для обновления цен на странице
function updateProjectPrices() {
    // Проверяем наличие необходимых объектов с ценами
    if (typeof UNIT_PRICES === 'undefined' || typeof MATERIAL_PRICES === 'undefined' || 
        typeof SHITOK_PRICES === 'undefined') {
        console.error('Объекты с ценами не найдены');
        return;
    }

    // Обновляем цены для всех элементов с data-price
    document.querySelectorAll('[data-price]').forEach(element => {
        const priceType = element.getAttribute('data-price');
        const quantity = parseInt(element.getAttribute('data-quantity')) || 0;
        const material = element.getAttribute('data-material');
        const type = element.getAttribute('data-type');
        let price = 0;

        // Определяем цену в зависимости от типа
        switch(priceType) {
            case 'kabel':
            case 'korobka':
            case 'otversty':
            case 'av1p':
            case 'av2p':
            case 'dif':
            case 'tempLight':
            case 'tempSocket':
                price = UNIT_PRICES[priceType]?.price || 0;
                break;
            case 'shtroba':
            case 'ustKorobki':
                if (material && MATERIAL_PRICES[material] && MATERIAL_PRICES[material][priceType]) {
                    price = MATERIAL_PRICES[material][priceType].price;
                }
                break;
            case 'shitok':
                if (type === 'nakladnoy') {
                    price = SHITOK_PRICES.nakladnoy.price;
                } else if (type === 'vstraivaemiy' && material) {
                    const size = element.getAttribute('data-size') || '24';
                    if (SHITOK_PRICES.vstraivaemiy[size] && SHITOK_PRICES.vstraivaemiy[size][material]) {
                        price = SHITOK_PRICES.vstraivaemiy[size][material].price;
                    }
                }
                break;
            case 'switch':
            case 'socket':
            case 'light':
                if (type && UNIT_PRICES[priceType] && UNIT_PRICES[priceType][type]) {
                    price = UNIT_PRICES[priceType][type].price;
                }
                break;
        }

        // Обновляем отображение цены
        if (element.classList.contains('price-value')) {
            element.textContent = `${formatNumber(price)} ₽`;
        }
        // Обновляем отображение суммы
        if (element.classList.contains('total-value')) {
            const total = price * quantity;
            element.textContent = `${formatNumber(total)} ₽`;
        }
    });

    // Обновляем итоговые суммы по секциям
    document.querySelectorAll('table').forEach(table => {
        const totals = Array.from(table.querySelectorAll('.total-value'))
            .map(el => parseInt(el.textContent.replace(/[^\d]/g, '')) || 0);
        
        const sectionTotal = totals.reduce((a, b) => a + b, 0);
        const sectionTotalElement = table.querySelector('tfoot .text-end + td strong');
        
        if (sectionTotalElement) {
            sectionTotalElement.textContent = `${formatNumber(sectionTotal)} ₽`;
        }
    });

    // Обновляем общую стоимость в заголовке
    updateTotalInSummary();
}

// Функция для обновления общей стоимости в заголовке
function updateTotalInSummary() {
    const summaryElement = document.querySelector('.project-summary .list-unstyled li:last-child strong');
    if (!summaryElement) return;

    // Собираем все total-value элементы
    const totalElements = document.querySelectorAll('.total-value');
    let grandTotal = 0;

    totalElements.forEach(element => {
        const value = parseInt(element.textContent.replace(/[^\d]/g, '')) || 0;
        grandTotal += value;
    });

    // Форматируем и обновляем общую стоимость
    const textNode = summaryElement.nextSibling;
    if (textNode) {
        textNode.textContent = ` ${formatNumber(grandTotal)} ₽`;
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Проверяем наличие цен и обновляем их
    if (typeof UNIT_PRICES !== 'undefined' && 
        typeof MATERIAL_PRICES !== 'undefined' && 
        typeof SHITOK_PRICES !== 'undefined') {
        
        // Сначала обновляем цены через updateProjectPrices
        updateProjectPrices();
        
        // Затем, если есть updateProjectTotals, обновляем через неё
        if (typeof updateProjectTotals !== 'undefined') {
            updateProjectTotals();
        }
    } else {
        console.error('Не найдены необходимые объекты с ценами');
    }
}); 