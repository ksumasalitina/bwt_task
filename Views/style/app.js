let latitude = document.getElementById('lat').innerHTML;
let longitude = document.getElementById('lng').innerHTML;
function initMap() {
    let pos = {lat: Number(latitude), lng: Number(longitude)};
    let opt = {
        center: pos,
        zoom: 15
    }
    let map = new google.maps.Map(document.getElementById("map"),opt);

    let marker = new google.maps.Marker({
        position: pos,
        map: map,
        title: 'Science meeting'
    });
}

new AirDatepicker('#input');
