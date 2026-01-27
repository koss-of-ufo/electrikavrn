// Проверка инициализации цен
console.log('Checking price initialization...');
if (typeof UNIT_PRICES === 'undefined' || typeof MATERIAL_PRICES === 'undefined' || typeof SHITOK_PRICES === 'undefined') {
    console.error('Price objects are not initialized properly!');
    console.log('UNIT_PRICES:', typeof UNIT_PRICES !== 'undefined' ? 'defined' : 'undefined');
    console.log('MATERIAL_PRICES:', typeof MATERIAL_PRICES !== 'undefined' ? 'defined' : 'undefined');
    console.log('SHITOK_PRICES:', typeof SHITOK_PRICES !== 'undefined' ? 'defined' : 'undefined');
} else {
    console.log('All price objects initialized successfully');
    console.log('UNIT_PRICES sample:', UNIT_PRICES.kabel);
    console.log('MATERIAL_PRICES sample:', MATERIAL_PRICES.beton);
    console.log('SHITOK_PRICES sample:', SHITOK_PRICES.nakladnoy);
}

// Объект с данными для расчета стоимости проектов
const PROJECT_DATA = {
    '1room-budget': {
        rough: [
            { type: 'kabel', quantity: 75 },
            { type: 'shtroba', material: 'beton', quantity: 20 },
            { type: 'otversty', quantity: 3 },
            { type: 'ustKorobki', material: 'beton', quantity: 17 },
            { type: 'korobka', quantity: 8 },
            { type: 'shitok', shitok_type: 'nakladnoy', material: 'beton', size: '18', quantity: 1 },
            { type: 'av1p', quantity: 4 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 4 },
            { type: 'tempSocket', quantity: 3 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 4 },
            { type: 'socket', socket_type: 'basic', quantity: 13 },
            { type: 'light', light_type: 'chandelier', quantity: 2 }
        ]
    },
    '1room-comfort': {
        rough: [
            { type: 'kabel', quantity: 180 },
            { type: 'shtroba', material: 'beton', quantity: 25 },
            { type: 'otversty', quantity: 5 },
            { type: 'ustKorobki', material: 'beton', quantity: 33 },
            { type: 'korobka', quantity: 12 },
            { type: 'shitok', shitok_type: 'vstraivaemiy', material: 'beton', size: '18', quantity: 1 },
            { type: 'av1p', quantity: 6 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 5 },
            { type: 'tempSocket', quantity: 3 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 5 },
            { type: 'socket', socket_type: 'basic', quantity: 24 },
            { type: 'socket', socket_type: 'tv', quantity: 2 },
            { type: 'socket', socket_type: 'internet', quantity: 2 },
            { type: 'light', light_type: 'spot', quantity: 14 },
            { type: 'light', light_type: 'chandelier', quantity: 1 }
        ]
    },
    '2room-budget': {
        rough: [
            { type: 'kabel', quantity: 145 },
            { type: 'shtroba', material: 'beton', quantity: 26 },
            { type: 'otversty', quantity: 4 },
            { type: 'ustKorobki', material: 'beton', quantity: 22 },
            { type: 'korobka', quantity: 9 },
            { type: 'shitok', shitok_type: 'nakladnoy', material: 'beton', size: '18', quantity: 1 },
            { type: 'av1p', quantity: 5 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 7 },
            { type: 'tempSocket', quantity: 4 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 5 },
            { type: 'socket', socket_type: 'basic', quantity: 17 },
            { type: 'light', light_type: 'chandelier', quantity: 3 }
        ]
    },
    '2room-comfort': {
        rough: [
            { type: 'kabel', quantity: 260 },
            { type: 'shtroba', material: 'beton', quantity: 38 },
            { type: 'otversty', quantity: 6 },
            { type: 'ustKorobki', material: 'beton', quantity: 39 },
            { type: 'korobka', quantity: 15 },
            { type: 'shitok', shitok_type: 'vstraivaemiy', material: 'beton', size: '18', quantity: 1 },
            { type: 'av1p', quantity: 7 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 8 },
            { type: 'tempSocket', quantity: 4 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 6 },
            { type: 'socket', socket_type: 'basic', quantity: 29 },
            { type: 'socket', socket_type: 'tv', quantity: 2 },
            { type: 'socket', socket_type: 'internet', quantity: 2 },
            { type: 'light', light_type: 'spot', quantity: 7 },
            { type: 'light', light_type: 'chandelier', quantity: 3 }
        ]
    },
    'house-budget': {
        rough: [
            { type: 'kabel', quantity: 160 },
            { type: 'shtroba', material: 'kirpich', quantity: 32 },
            { type: 'otversty', quantity: 5 },
            { type: 'ustKorobki', material: 'kirpich', quantity: 24 },
            { type: 'korobka', quantity: 6 },
            { type: 'shitok', shitok_type: 'nakladnoy', material: 'kirpich', size: '18', quantity: 1 },
            { type: 'av1p', quantity: 4 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 4 },
            { type: 'tempSocket', quantity: 3 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 6 },
            { type: 'socket', socket_type: 'basic', quantity: 18 },
            { type: 'light', light_type: 'chandelier', quantity: 4 }
        ]
    },
    'house-comfort': {
        rough: [
            { type: 'kabel', quantity: 335 },
            { type: 'shtroba', material: 'kirpich', quantity: 42 },
            { type: 'otversty', quantity: 6 },
            { type: 'ustKorobki', material: 'kirpich', quantity: 44 },
            { type: 'korobka', quantity: 8 },
            { type: 'shitok', shitok_type: 'vstraivaemiy', material: 'kirpich', size: '24', quantity: 1 },
            { type: 'av1p', quantity: 5 },
            { type: 'av2p', quantity: 1 },
            { type: 'dif', quantity: 1 },
            { type: 'tempLight', quantity: 8 },
            { type: 'tempSocket', quantity: 4 }
        ],
        final: [
            { type: 'switch', switch_type: 'basic', quantity: 8 },
            { type: 'socket', socket_type: 'basic', quantity: 30 },
            { type: 'socket', socket_type: 'tv', quantity: 2 },
            { type: 'socket', socket_type: 'internet', quantity: 4 },
            { type: 'light', light_type: 'spot', quantity: 11 },
            { type: 'light', light_type: 'chandelier', quantity: 4 },
            { type: 'light', light_type: 'bra', quantity: 2 },
            { type: 'light', light_type: 'projector', quantity: 1 }
        ]
    }
};

// Функция для расчета стоимости работ
function calculateProjectTotal(projectId) {
    console.log('Расчет стоимости для проекта:', projectId);
    
    const projectData = PROJECT_DATA[projectId];
    if (!projectData) {
        console.error('Данные проекта не найдены для:', projectId);
        return 0;
    }

    let total = 0;
    let roughTotal = 0;
    let finalTotal = 0;

    // Проверяем наличие необходимых объектов с ценами
    if (!UNIT_PRICES || !MATERIAL_PRICES || !SHITOK_PRICES) {
        console.error('Отсутствуют необходимые объекты с ценами!');
        return 0;
    }

    // Расчет стоимости черновых работ
    projectData.rough.forEach(item => {
        let price = 0;
        
        try {
            if (item.type === 'kabel' || item.type === 'otversty' || item.type === 'korobka' || 
                item.type === 'av1p' || item.type === 'av2p' || item.type === 'dif' || 
                item.type === 'tempLight' || item.type === 'tempSocket') {
                price = UNIT_PRICES[item.type].price;
            }
            else if (item.type === 'shtroba' || item.type === 'ustKorobki') {
                price = MATERIAL_PRICES[item.material][item.type].price;
            }
            else if (item.type === 'shitok') {
                if (item.shitok_type === 'vstraivaemiy') {
                    price = SHITOK_PRICES.vstraivaemiy[item.size][item.material].price;
                } else {
                    price = SHITOK_PRICES.nakladnoy.price;
                }
            }
            
            const itemTotal = price * item.quantity;
            roughTotal += itemTotal;
            console.log(`Черновые работы: ${item.type}, цена: ${price}, количество: ${item.quantity}, сумма: ${itemTotal}`);
        } catch (error) {
            console.error(`Ошибка при расчете стоимости черновых работ:`, item, error);
        }
    });

    // Расчет стоимости чистовых работ
    projectData.final.forEach(item => {
        let price = 0;
        
        try {
            if (item.type === 'switch') {
                price = UNIT_PRICES.switch[item.switch_type || 'basic'].price;
            }
            else if (item.type === 'socket') {
                price = UNIT_PRICES.socket[item.socket_type || 'basic'].price;
            }
            else if (item.type === 'light') {
                price = UNIT_PRICES.light[item.light_type || 'chandelier'].price;
            }
            
            const itemTotal = price * item.quantity;
            finalTotal += itemTotal;
            console.log(`Чистовые работы: ${item.type}, цена: ${price}, количество: ${item.quantity}, сумма: ${itemTotal}`);
        } catch (error) {
            console.error(`Ошибка при расчете стоимости чистовых работ:`, item, error);
        }
    });

    total = roughTotal + finalTotal;
    console.log(`Итоги по проекту ${projectId}:`, {
        roughTotal,
        finalTotal,
        total
    });

    return total;
}

// Функция для форматирования числа
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

// Флаг для отслеживания первого выполнения
let updateExecuted = false;

// Функция обновления всех итоговых сумм на странице
function updateProjectTotals() {
    if (updateExecuted) return;
    console.log('Updating project totals...');
    document.querySelectorAll('.project-total').forEach(element => {
        const projectId = element.dataset.project;
        const total = calculateProjectTotal(projectId);
        console.log(`Project ${projectId}: ${total}`);
        element.textContent = formatNumber(total) + ' ₽';
    });
    updateExecuted = true;
}

// Обновляем суммы при загрузке страницы
document.addEventListener('DOMContentLoaded', updateProjectTotals);

// Экспортируем функцию обновления для использования в других скриптах
window.updateProjectTotals = updateProjectTotals; 