L.mapbox.accessToken = 'pk.eyJ1IjoicmlzcG8iLCJhIjoiY2lqbG01cGM0MDAzYXQ5a29hZnRnM3E0NCJ9.MnohId0xjh0ywtR5bmdwOw';
var geolocate = document.getElementById('geolocate');
var map = L.mapbox.map('map', 'mapbox.streets');
 
var myLayer = L.mapbox.featureLayer().addTo(map);

// This uses the HTML5 geolocation API, which is available on
// most mobile browsers and modern browsers, but not in Internet Explorer
//
// See this chart of compatibility for details:
// http://caniuse.com/#feat=geolocation
if (!navigator.geolocation) {
    geolocate.innerHTML = 'Geolocation is not available';
} else {
    geolocate.onclick = function (e) {
        e.preventDefault();
        e.stopPropagation();
        map.locate();
    };
}

// Once we've got a position, zoom and center the map
// on it, and add a single marker.
map.on('locationfound', function(e) {
    map.fitBounds(e.bounds);

    myLayer.setGeoJSON({
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [e.latlng.lng, e.latlng.lat]
        },
        properties: {
            'title': 'Here I am!',
            'marker-color': '#ff8888',
            'marker-symbol': 'star'
        }
    });

    // And hide the geolocation button
    geolocate.parentNode.removeChild(geolocate);
});

// If the user chooses not to allow their location
// to be shared, display an error message.
map.on('locationerror', function() {
    geolocate.innerHTML = 'Position could not be found';
});

var RADIUS = 500;
var filterCircle = L.circle(L.latLng(40, -75), RADIUS, {
    opacity: 1,
    weight: 1,
    fillOpacity: 0.4
}).addTo(map);

var csvLayer = omnivore.csv('/mapbox.js/assets/data/airports.csv', null, L.mapbox.featureLayer())
    .addTo(map);

map.on('locationfound', function(e) {
    filterCircle.setLatLng(e.latlng);
    csvLayer.setFilter(function showAirport(feature) {
        return e.latlng.distanceTo(L.latLng(
                feature.geometry.coordinates[1],
                feature.geometry.coordinates[0])) < RADIUS;
    });
});