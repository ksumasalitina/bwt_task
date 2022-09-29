//Получаем значения координат
let latitude = document.getElementById('lat').value;
let longitude = document.getElementById('lng').value;

//Инициализация карты для отображения адресса
function initMap() {
    let pos = {lat: Number(latitude), lng: Number(longitude)};
    let opt = {
        center: pos,
        zoom: 15
    }
    let map = new google.maps.Map(document.getElementById("map"),opt);
    let marker = new google.maps.Marker({
        position: pos,
        map: map
    });
}

//Функция для обновления координат
function updateCoordinates(lat, lng) {
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
}

//Инициализация карты для изменения адресса
function initMapChange() {
    let pos = {lat: Number(latitude), lng: Number(longitude)};
    let opt = {
        center: pos,
        zoom: 15
    }
    let map = new google.maps.Map(document.getElementById("map"),opt);
    let marker = new google.maps.Marker({
        position: pos,
        map: map,
        draggable:true
    });

//Обработка событий при передвижении маркера
    marker.addListener('dragend', function(e) {
        let position = marker.getPosition();
        updateCoordinates(position.lat(), position.lng())
    });

    map.addListener('click', function(e) {
        marker.setPosition(e.latLng);
        updateCoordinates(e.latLng.lat(), e.latLng.lng())
    });
    map.panTo(pos);
}

//Изменение координат при передвижении маркера
document.getElementsByName("latitude")[0].addEventListener('change', initMapChange);
document.getElementsByName("longitude")[0].addEventListener('change', initMapChange)

//Валидация данных
function validate(){
    let title = document.getElementsByName('title')[0].value;
    let date = document.getElementsByName('date')[0].value;
    let validation = false;
    if(title.length <= 2 || title.length > 255){
        document.getElementById('title_error').style.display = "block";
    }
    else{
        document.getElementById('title_error').style.display = "none";
        validation = true;
    }
    if(validation){
        document.getElementById('save').removeAttribute('disabled');
    }
}
document.getElementsByName("title")[0].addEventListener('input', validate);

