// Объект для управления галереей
const galleryManager = {
    scale: 1,
    ZOOM_SPEED: 0.1,
    MAX_SCALE: 3,
    MIN_SCALE: 1,

    // Инициализация AOS
    initAOS: function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: false,
            mirror: false
        });
    },

    // Инициализация Lightbox
    initLightbox: function() {
        lightbox.option({
            'maxWidth': 1200,
            'maxHeight': 900,
            'fitImagesInViewport': true,
            'imageFadeDuration': 300,
            'resizeDuration': 300,
            'wrapAround': true,
            'disableScrolling': true,
            'positionFromTop': 50,
            'showImageNumberLabel': true,
            'albumLabel': 'Изображение %1 из %2',
            'alwaysShowNavOnTouchDevices': true,
            'onClose': function() {
                galleryManager.resetZoom();
            }
        });
    },

    // Сброс масштаба
    resetZoom: function() {
        this.scale = 1;
        const image = document.querySelector('.lb-image');
        if (image) {
            image.style.transform = 'scale(1)';
        }
    },

    // Инициализация зума
    initZoom: function() {
        document.addEventListener('wheel', function(e) {
            const lightboxContainer = document.querySelector('.lb-container');
            const lightboxImage = document.querySelector('.lb-image');
            
            if (lightboxContainer && lightboxImage && e.target.closest('.lb-container')) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? -1 : 1;
                const newScale = galleryManager.scale + (delta * galleryManager.ZOOM_SPEED);
                
                if (newScale >= galleryManager.MIN_SCALE && newScale <= galleryManager.MAX_SCALE) {
                    galleryManager.scale = newScale;
                    lightboxImage.style.transform = `scale(${galleryManager.scale})`;
                }
            }
        }, { passive: false });
    },

    // Инициализация фильтров
    initFilters: function() {
        const filterButtons = document.querySelectorAll('[data-filter]');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const filterValue = this.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        item.setAttribute('data-aos-delay', '0');
                        item.setAttribute('data-aos', 'fade-up');
                    } else {
                        item.style.display = 'none';
                    }
                });

                AOS.refresh();
            });
        });
    },

    // Инициализация эффектов при наведении
    initHoverEffects: function() {
        document.querySelectorAll('.gallery-item-inner').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('.gallery-item-caption').style.opacity = '1';
            });

            item.addEventListener('mouseleave', function() {
                this.querySelector('.gallery-item-caption').style.opacity = '0';
            });
        });
    },

    // Автоматическое определение формата изображения
    initImageFormat: function() {
        document.querySelectorAll('.gallery-item').forEach(item => {
            const img = item.querySelector('img');
            if (img) {
                img.onload = function() {
                    const ratio = this.naturalWidth / this.naturalHeight;
                    if (ratio > 1.5) {
                        item.classList.add('landscape');
                    } else if (ratio < 0.8) {
                        item.classList.add('portrait');
                    } else {
                        item.classList.add('square');
                    }
                };
            }
        });
    },

    // Инициализация всех компонентов
    init: function() {
        this.initAOS();
        this.initLightbox();
        this.initZoom();
        this.initFilters();
        this.initHoverEffects();
        this.initImageFormat();
    }
};

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    galleryManager.init();
}); 