// Инициализация AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: false,
    mirror: false
});

// Объект для управления лайтбоксом
const lightboxManager = {
    scale: 1,
    ZOOM_SPEED: 0.1,
    MAX_SCALE: 3,
    MIN_SCALE: 1,

    init: function() {
        // Конфигурация Lightbox
        lightbox.option({
            'maxWidth': 1200,
            'maxHeight': 900,
            'fitImagesInViewport': true,
            'imageFadeDuration': 300,
            'resizeDuration': 300,
            'wrapAround': true,
            'onClose': () => this.resetZoom()
        });

        // Инициализация зума
        this.initZoom();
    },

    initZoom: function() {
        document.addEventListener('wheel', (e) => {
            const lightboxContainer = document.querySelector('.lb-container');
            const lightboxImage = document.querySelector('.lb-image');
            
            if (lightboxContainer && lightboxImage && e.target.closest('.lb-container')) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? -1 : 1;
                const newScale = this.scale + (delta * this.ZOOM_SPEED);
                
                if (newScale >= this.MIN_SCALE && newScale <= this.MAX_SCALE) {
                    this.scale = newScale;
                    lightboxImage.style.transform = `scale(${this.scale})`;
                }
            }
        }, { passive: false });
    },

    resetZoom: function() {
        this.scale = 1;
        const image = document.querySelector('.lb-image');
        if (image) {
            image.style.transform = 'scale(1)';
        }
    }
};

// Плавная прокрутка для навигационных ссылок
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    // Пропускаем кнопки обратного звонка
    if (anchor.hasAttribute('data-callback')) return;
    
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').slice(1);
        if (!targetId) return; // Пропускаем пустые href="#"
        
        const target = document.getElementById(targetId);
        
        if (target) {
            const offset = 100; // Отступ от верха страницы
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            
            // Обновляем URL без перезагрузки страницы
            if (history.pushState) {
                history.pushState(null, null, `#${targetId}`);
            } else {
                location.hash = `#${targetId}`;
            }
        }
    });
});

// Анимация для навигационной панели при прокрутке
let lastScrollTop = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > lastScrollTop) {
        // Прокрутка вниз
        navbar.style.transform = 'translateY(-100%)';
    } else {
        // Прокрутка вверх
        navbar.style.transform = 'translateY(0)';
    }
    
    lastScrollTop = scrollTop;
});

// Активация всплывающих подсказок Bootstrap
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Валидация формы обратной связи
const validateForm = (form) => {
    const inputs = form.querySelectorAll('input, textarea');
    let isValid = true;

    inputs.forEach(input => {
        if (input.hasAttribute('required') && !input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }

        if (input.type === 'email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value.trim())) {
                input.classList.add('is-invalid');
                isValid = false;
            }
        }

        if (input.type === 'tel') {
            const phoneRegex = /^\+?[0-9]{10,}$/;
            if (!phoneRegex.test(input.value.trim().replace(/\D/g, ''))) {
                input.classList.add('is-invalid');
                isValid = false;
            }
        }
    });

    return isValid;
};

// Функции калькулятора
function calculateSimple() {
    const form = document.getElementById('calculatorSimpleForm');
    const roomType = form.querySelector('[name="roomType"]').value;
    const roomCount = parseInt(form.querySelector('[name="roomCount"]').value);
    const totalArea = parseInt(form.querySelector('[name="totalArea"]').value);
    const workTypes = Array.from(form.querySelectorAll('[name="workTypes"]:checked')).map(cb => cb.value);

    let basePrice = 0;
    
    // Базовая стоимость в зависимости от типа помещения
    switch(roomType) {
        case 'apartment':
            basePrice = 15000;
            break;
        case 'house':
            basePrice = 20000;
            break;
        case 'office':
            basePrice = 25000;
            break;
    }

    // Добавляем стоимость за каждую комнату
    basePrice += roomCount * 5000;

    // Добавляем стоимость за площадь
    basePrice += totalArea * 300;

    // Модификаторы в зависимости от типа работ
    if (workTypes.includes('newWiring')) {
        basePrice *= 1.2; // +20% за новую проводку
    }
    if (workTypes.includes('replacement')) {
        basePrice *= 1.3; // +30% за замену старой проводки
    }
    if (workTypes.includes('addition')) {
        basePrice *= 1.1; // +10% за добавление точек
    }

    // Создаем модальное окно с результатом
    const resultModal = new bootstrap.Modal(document.createElement('div'));
    resultModal.element.innerHTML = `
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Результат расчета</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="h4 mb-4">Примерная стоимость работ: ${Math.round(basePrice)} ₽</p>
                    <p class="small text-muted">* Окончательная стоимость может быть скорректирована после осмотра объекта</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="location.href='#contacts'">Оставить заявку</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(resultModal.element);
    resultModal.show();
}

function calculatePro() {
    let total = 0;
    const inputs = document.querySelectorAll('#calculatorProForm .calc-input');
    
    inputs.forEach(input => {
        const price = parseInt(input.dataset.price);
        const quantity = parseInt(input.value) || 0;
        total += price * quantity;
    });

    document.getElementById('totalPrice').textContent = total.toLocaleString();
}

// Автоматический расчет при изменении значений в профессиональном калькуляторе
document.querySelectorAll('#calculatorProForm .calc-input').forEach(input => {
    input.addEventListener('input', calculatePro);
});

// Обработка мобильного меню
document.addEventListener('DOMContentLoaded', function() {
    const isMobile = window.innerWidth < 992;
    const dropdownToggle = document.querySelector('#calculatorDropdown');
    
    if (isMobile && dropdownToggle) {
        dropdownToggle.addEventListener('click', function(e) {
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu.classList.contains('show')) {
                window.location.href = this.getAttribute('href');
            }
        });
    }

    // Инициализация AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Обработка прелоадера
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.classList.add('fade-out');
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 800);
        }
    });
});

// Preloader и инициализация страницы
(() => {
    const preloader = document.querySelector('.preloader');
    if (!preloader) return;

    // Функция скрытия прелоадера
    const hidePreloader = () => {
        preloader.classList.add('fade-out');
        setTimeout(() => {
            preloader.remove();
        }, 500);
    };

    // Функция инициализации страницы
    const initializePage = () => {
        // Инициализация лайтбокса
        lightboxManager.init();

        // Управление навигационной панелью при прокрутке
        const navbar = document.querySelector('.navbar');
        let lastScrollTop = 0;

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }
            lastScrollTop = scrollTop;
        });

        // Активация выпадающих меню при наведении на десктопе
        if (window.innerWidth > 992) {
            document.querySelectorAll('.navbar .dropdown').forEach(dropdown => {
                dropdown.addEventListener('mouseenter', () => {
                    dropdown.querySelector('.dropdown-menu')?.classList.add('show');
                });
                dropdown.addEventListener('mouseleave', () => {
                    dropdown.querySelector('.dropdown-menu')?.classList.remove('show');
                });
            });
        }

        // Плавная прокрутка для якорных ссылок
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const href = anchor.getAttribute('href');
                
                // Пропускаем обработку для кнопок обратного звонка и пустых ссылок
                if (anchor.hasAttribute('data-callback') || !href || href === '#') {
                    return;
                }
                
                // Проверяем, существует ли целевой элемент
                const targetId = href.slice(1);
                const target = targetId ? document.getElementById(targetId) : null;
                
                if (target) {
                    e.preventDefault();
                    const headerOffset = 100;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition - headerOffset;
                    window.scrollBy({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Закрытие мобильного меню при клике на ссылку
        document.querySelectorAll('.navbar-nav a').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelector('.navbar-collapse')?.classList.remove('show');
            });
        });
    };

    // Ждем загрузки DOM
    document.addEventListener('DOMContentLoaded', () => {
        // Инициализируем страницу
        initializePage();
        
        // Ждем полной загрузки страницы
        window.addEventListener('load', hidePreloader);
        
        // Таймаут безопасности
        setTimeout(hidePreloader, 3000);
    });
})(); 