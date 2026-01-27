// Базовые цены для всех работ
const BASE_PRICES = {
    // Базовые работы
    kabel: 130,              // Прокладка кабеля
    otversty: 600,          // Отверстия капитальные
    korobka: 800,           // Сборка схемы распределительной коробки
    av1p: 250,              // Монтаж автоматических выключателей 1 полюс
    av2p: 500,              // Монтаж автоматических выключателей 2 полюса
    dif: 500,               // Монтаж дифференциальных автоматов
    tempLight: 100,         // Монтаж временного освещения
    tempSocket: 150,        // Монтаж временных розеток
    
    // Чистовые работы
    switch: {
        basic: 200,         // Обычный выключатель
        double: 250,         // Выключатель с подсветкой
        triple: 300         // Выключатель с регулятором
    },
    socket: {
        basic: 200,         // Обычная розетка
        double: 250,        // Двойная розетка
        tv: 300,           // ТВ розетка
        internet: 300      // Интернет розетка
    },
    light: {
        spot: 500,          // Точечный светильник
        chandelier: 1500,    // Люстра до 3 кг
        bra: 2000,           // Люстра более 3 кг
        led: 2000,           // Люстра с димированием
        projector: 1000      // Прожектор
    },
    
    // Базовые цены для разных материалов
    shtroba: {
        gazosilikat: 300,   // Базовая цена штробления в газосиликате
        kirpich: 400,       // Базовая цена штробления в кирпиче
        beton: 500          // Базовая цена штробления в бетоне
    },
    
    ustKorobki: {
        gazosilikat: 500,   // Базовая цена установки подрозетников в газосиликате
        kirpich: 700,       // Базовая цена установки подрозетников в кирпиче
        beton: 800          // Базовая цена установки подрозетников в бетоне
    },
    
    // Базовые цены для щитков
    shitok: {
        nakladnoy: 2000,     // Базовая цена установки накладного щита
        vstraivaemiy: {     // Базовые цены для встраиваемых щитов
            gazosilikat: 2500,  // Базовая цена для газосиликата
            kirpich: 3000,      // Базовая цена для кирпича
            beton: 3500         // Базовая цена для бетона
        }
    }
};

// Коэффициенты для расчета цен встраиваемых щитов разного размера
const SHITOK_SIZE_COEFFICIENTS = {
    12: 1.0,    // Базовый коэффициент для щита на 12 модулей
    18: 1.3,    // Коэффициент для щита на 18 модулей
    24: 1.5,    // Коэффициент для щита на 24 модуля
    36: 1.6,    // Коэффициент для щита на 36 модулей
    54: 1.8     // Коэффициент для щита на 54 модуля
};

// Формирование итоговых объектов с ценами
const UNIT_PRICES = {
    kabel: { price: BASE_PRICES.kabel },
    otversty: { price: BASE_PRICES.otversty },
    korobka: { price: BASE_PRICES.korobka },
    av1p: { price: BASE_PRICES.av1p },
    av2p: { price: BASE_PRICES.av2p },
    dif: { price: BASE_PRICES.dif },
    tempLight: { price: BASE_PRICES.tempLight },
    tempSocket: { price: BASE_PRICES.tempSocket },
    switch: {
        basic: { price: BASE_PRICES.switch.basic },
        double: { price: BASE_PRICES.switch.double },
        triple: { price: BASE_PRICES.switch.triple }
    },
    socket: {
        basic: { price: BASE_PRICES.socket.basic },
        double: { price: BASE_PRICES.socket.double },
        tv: { price: BASE_PRICES.socket.tv },
        internet: { price: BASE_PRICES.socket.internet }
    },
    light: {
        spot: { price: BASE_PRICES.light.spot },
        chandelier: { price: BASE_PRICES.light.chandelier },
        bra: { price: BASE_PRICES.light.bra },
        led: { price: BASE_PRICES.light.led },
        projector: { price: BASE_PRICES.light.projector }
    }
};

const MATERIAL_PRICES = {
    beton: {
        shtroba: { price: BASE_PRICES.shtroba.beton, description: "Штробление в бетоне за метр" },
        ustKorobki: { price: BASE_PRICES.ustKorobki.beton, description: "Установка подрозетников в бетоне" }
    },
    kirpich: {
        shtroba: { price: BASE_PRICES.shtroba.kirpich, description: "Штробление в кирпиче за метр" },
        ustKorobki: { price: BASE_PRICES.ustKorobki.kirpich, description: "Установка подрозетников в кирпиче" }
    },
    gazosilikat: {
        shtroba: { price: BASE_PRICES.shtroba.gazosilikat, description: "Штробление в газосиликате за метр" },
        ustKorobki: { price: BASE_PRICES.ustKorobki.gazosilikat, description: "Установка подрозетников в газосиликате" }
    },
    gipsokarton: {
        shtroba: {
            price: 200,
            description: 'Штробление гипсокартона'
        },
        ustKorobki: {
            price: 150,
            description: 'Установка подрозетника в гипсокартон'
        }
    }
};

const SHITOK_PRICES = {
    nakladnoy: { price: BASE_PRICES.shitok.nakladnoy, description: "Установка накладного электрощита" },
    vstraivaemiy: Object.fromEntries(
        Object.entries(SHITOK_SIZE_COEFFICIENTS).map(([size, coef]) => [
            size,
            {
                gazosilikat: { 
                    price: Math.round(BASE_PRICES.shitok.vstraivaemiy.gazosilikat * coef), 
                    description: `Установка встраиваемого щита на ${size} модулей в газосиликат` 
                },
                kirpich: { 
                    price: Math.round(BASE_PRICES.shitok.vstraivaemiy.kirpich * coef), 
                    description: `Установка встраиваемого щита на ${size} модулей в кирпич` 
                },
                beton: { 
                    price: Math.round(BASE_PRICES.shitok.vstraivaemiy.beton * coef), 
                    description: `Установка встраиваемого щита на ${size} модулей в бетон` 
                }
            }
        ])
    )
}; 

// Цены на дополнительные работы
const ADDITIONAL_PRICES = {
    rozetka: { price: 200, description: "Монтаж розетки/выключателя" },
    svet: { price: 500, description: "Монтаж светильника" },
    lustra: { price: 1500, description: "Монтаж люстры" },
    elPlita: { price: 1000, description: "Подключение электроплиты" },
    varPanel: { price: 1000, description: "Подключение варочной панели" },
    duh: { price: 800, description: "Подключение духового шкафа" },
    pm: { price: 800, description: "Подключение посудомоечной машины" },
    cond: { price: 1500, description: "Подключение кондиционера" }
}; 