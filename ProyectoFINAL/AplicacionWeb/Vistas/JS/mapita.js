function initMap() {
    // The location of Uluru
    var fmat = {lat: 21.047593, lng: -89.644280};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 18, center: fmat});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: fmat, map: map});
}