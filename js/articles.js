// Инициализация AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: false,
    mirror: false
});

// Общие функции для работы со статьями
const articleEffects = {
    // Эффект при наведении на карточки
    initHoverEffects: function(selector = '.card') {
        document.querySelectorAll(selector).forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.transition = 'transform 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    },

    // Плавная прокрутка для внутренних ссылок
    initSmoothScroll: function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    },

    // Фильтрация статей по категориям
    initFilters: function() {
        const filterButtons = document.querySelectorAll('[data-filter]');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                const articles = document.querySelectorAll('.article-item');
                
                articles.forEach(article => {
                    if (filterValue === 'all' || article.getAttribute('data-category') === filterValue) {
                        article.style.display = '';
                        article.style.opacity = '1';
                    } else {
                        article.style.display = 'none';
                        article.style.opacity = '0';
                    }
                });
            });
        });
    },

    // Расчет времени чтения
    calculateReadingTime: function() {
        const articleContent = document.querySelector('.article-content');
        if (!articleContent) return;

        const text = articleContent.textContent;
        const wordCount = text.trim().split(/\s+/).length;
        const readingTime = Math.ceil(wordCount / 200); // Среднее время чтения: 200 слов в минуту

        const readingTimeElement = document.querySelector('.reading-time');
        if (readingTimeElement) {
            readingTimeElement.textContent = `${readingTime} мин чтения`;
        }
    }
};

// Инициализация всех эффектов при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    articleEffects.initHoverEffects('.card, .related-article');
    articleEffects.initSmoothScroll();
    articleEffects.initFilters();
    articleEffects.calculateReadingTime();
}); 