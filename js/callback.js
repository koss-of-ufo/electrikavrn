document.addEventListener('DOMContentLoaded', function() {
    // Находим все элементы с атрибутом data-callback
    const callbackButtons = document.querySelectorAll('[data-callback]');
    
    // Добавляем обработчик для каждой кнопки
    callbackButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('callbackModal'));
            modal.show();
        });
    });

    // Инициализация всех форм обратной связи
    document.querySelectorAll('.callback-form').forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            await handleFormSubmit(this);
        });
    });

    // Обработчик для кнопки закрытия модального окна
    const closeButtons = document.querySelectorAll('.btn-close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            if (modal) {
                modal.removeAttribute('aria-hidden');
            }
        });
    });

    // Функция для маски телефона
    function initPhoneMask(input) {
        if (!input) return;
        
        input.addEventListener('input', function(e) {
            let x = e.target.value.replace(/\D/g, '')
                .match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);
            
            e.target.value = !x[2] ? x[1] : 
                '+7 (' + x[2] + (x[3] ? ') ' + x[3] : '') + 
                (x[4] ? '-' + x[4] : '');
        });
    }

    // Инициализация масок для телефонов
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => initPhoneMask(input));
});

async function getLocationByIP() {
    try {
        const response = await fetch('https://ipapi.co/json/');
        const data = await response.json();
        return {
            lat: data.latitude,
            lon: data.longitude
        };
    } catch (error) {
        console.log('Ошибка получения координат по IP:', error);
        return null;
    }
}

async function handleFormSubmit(form, options = {}) {
    const formData = {
        name: form.querySelector('input[name="name"]').value,
        phone: form.querySelector('input[name="phone"]').value,
        message: form.querySelector('textarea[name="message"]')?.value || '',
        source: options.source || 'Форма обратной связи',
        url: window.location.href
    };

    try {
        // Получаем координаты
        const location = await getLocationByIP();
        if (location) {
            formData.lat = location.lat;
            formData.lon = location.lon;
        }
    } catch (error) {
        console.log('Ошибка получения координат:', error);
    }

    if (!formData.name || !formData.phone) {
        Swal.fire({
            title: 'Ошибка',
            text: 'Пожалуйста, заполните обязательные поля',
            icon: 'error'
        });
        return;
    }

    const privacyCheckbox = form.querySelector('input[name="privacyAgree"]');
    if (!privacyCheckbox.checked) {
        Swal.fire({
            title: 'Ошибка',
            text: 'Пожалуйста, подтвердите согласие с политикой конфиденциальности',
            icon: 'error'
        });
        return;
    }

    // Показываем индикатор загрузки
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Отправка...';

    try {
        const response = await fetch('/send-message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();

        if (result.success) {
            // Очищаем форму
            form.reset();
            
            // Показываем сообщение об успехе
            Swal.fire({
                title: 'Успешно!',
                text: 'Ваша заявка принята. Мы свяжемся с вами в ближайшее время.',
                icon: 'success'
            });
        } else {
            throw new Error(result.message || 'Ошибка отправки формы');
        }
    } catch (error) {
        console.log('Ошибка:', error);
        Swal.fire({
            title: 'Ошибка',
            text: 'Произошла ошибка при отправке формы. Пожалуйста, попробуйте позже.',
            icon: 'error'
        });
    } finally {
        // Восстанавливаем кнопку
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
} 