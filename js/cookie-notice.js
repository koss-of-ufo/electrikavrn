document.addEventListener('DOMContentLoaded', function() {
    // Проверяем, было ли уже показано уведомление
    if (!localStorage.getItem('cookieNoticeAccepted')) {
        // Создаем элемент уведомления
        const notice = document.createElement('div');
        notice.className = 'cookie-notice';
        notice.innerHTML = `
            <img src="assets/favicon.png" alt="Cookie" class="cookie-notice-icon">
            <div class="cookie-notice-content">
                <div class="cookie-notice-text">
                    Этот сайт использует файлы cookie для хранения данных. Продолжая использовать сайт, вы даете свое согласие на работу с этими файлами. Подробнее в <a href="/privacy">политике конфиденциальности</a>.
                </div>
                <button class="btn btn-primary">Хорошо, принимаю</button>
            </div>
        `;

        // Добавляем уведомление на страницу
        document.body.appendChild(notice);

        // Показываем уведомление с небольшой задержкой
        setTimeout(() => {
            notice.classList.add('show');
        }, 1000);

        // Обработчик для кнопки принятия
        notice.querySelector('.btn.btn-primary').addEventListener('click', function() {
            localStorage.setItem('cookieNoticeAccepted', 'true');
            notice.classList.remove('show');
            setTimeout(() => notice.remove(), 300);
        });
    }
});