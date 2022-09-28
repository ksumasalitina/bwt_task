function updateCoordinates(lat, lng) {
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
}

let latitude = document.getElementById('lat').value;
let longitude = document.getElementById('lng').value;

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
document.getElementsByName("latitude")[0].addEventListener('change', initMap);

new AirDatepicker('#input');
