
L.mapbox.accessToken = 'pk.eyJ1IjoicmlzcG8iLCJhIjoiY2lqbG01cGM0MDAzYXQ5a29hZnRnM3E0NCJ9.MnohId0xjh0ywtR5bmdwOw';
var mapTooltipsJS = L.mapbox.map('map', 'mapbox.streets')
  .setView([48.856614, 2.352222], 4);
var myLayer = L.mapbox.featureLayer().addTo(mapTooltipsJS);

var geojson = [
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [2.3760990,48.8512640]
    },
    "properties": {
      "title": "Mapbox DC",
      "description": "1714 14th St NW, Washington DC",
      "image": "https://farm9.staticflickr.com/8604/15769066303_3e4dcce464_n.jpg",
      "icon": {
          "iconUrl": "https://www.mapbox.com/mapbox.js/assets/images/astronaut1.png",
          "iconSize": [50, 50], // size of the icon
          "iconAnchor": [25, 25], // point of the icon which will correspond to marker's location
          "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
          "className": "dot"
      }
    }
  },
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [48.87053736960908,2.3355698169361774]
    },
    "properties": {
      "title": "Mapbox SF",
      "description": "155 9th St, San Francisco",
      "image": "https://farm9.staticflickr.com/8571/15844010757_63b093d527_n.jpg",
      "icon": {
          "iconUrl": "https://www.mapbox.com/mapbox.js/assets/images/astronaut2.png",
          "iconSize": [50, 50], // size of the icon
          "iconAnchor": [25, 25], // point of the icon which will correspond to marker's location
          "popupAnchor": [0, -25], // point from which the popup should open relative to the iconAnchor
          "className": "dot"
      }
    }
  }
];
// Set a custom icon on each marker based on feature properties.
myLayer.on('layeradd', function(e) {
  var marker = e.layer,
    feature = marker.feature;
  marker.setIcon(L.icon(feature.properties.icon));
  var content = '<h2>'+ feature.properties.title+'<\/h2>' + '<img src="'+feature.properties.image+'" alt="">';
  marker.bindPopup(content);
});
myLayer.setGeoJSON(geojson);
mapTooltipsJS.scrollWheelZoom.disable();