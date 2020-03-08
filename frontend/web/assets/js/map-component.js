var marker;
var map;
function initMap() {
    map_obj = document.getElementById('map');
    map = new google.maps.Map(map_obj, {
        center: {
            lat: Number(map_obj.getAttribute('data-latitude')),
            lng: Number(map_obj.getAttribute('data-longitude'))
        },
        zoom: 12
    });

    var contentString = map_obj.getAttribute('data-content');
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position: {
            lat: Number(map_obj.getAttribute('data-latitude')),
            lng: Number(map_obj.getAttribute('data-longitude'))
        }
    });
    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
    marker.setMap(map);


}