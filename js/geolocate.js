// Функция для получения геолокации по IP
async function getLocation() {
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    try {
        const response = await fetch('http://ip-api.com/json/?fields=lat,lon,city,region');
        const data = await response.json();
        
        if (data.lat && data.lon) {
            if (latitudeInput) latitudeInput.value = data.lat;
            if (longitudeInput) longitudeInput.value = data.lon;
            
            // Если есть поле города в форме, заполняем его
            const cityInput = document.getElementById('city');
            if (cityInput && data.city) {
                cityInput.value = `${data.city}, ${data.region}`;
            }
        } else {
            if (latitudeInput) latitudeInput.value = 'Не указано';
            if (longitudeInput) longitudeInput.value = 'Не указано';
        }
    } catch (error) {
        console.error('Ошибка получения координат:', error);
        if (latitudeInput) latitudeInput.value = 'Не указано';
        if (longitudeInput) longitudeInput.value = 'Не указано';
    }
}

// Вызываем функцию при загрузке страницы
document.addEventListener('DOMContentLoaded', getLocation);