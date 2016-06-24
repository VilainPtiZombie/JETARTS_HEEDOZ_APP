var LoginModalController = {
    tabsElementName: ".logmod__tabs li",
    tabElementName: ".logmod__tab",
    hidePasswordName: ".hide-password",
    
    inputElements: null,
    tabsElement: null,
    tabElement: null,
    hidePassword: null,
    
    activeTab: null,
    tabSelection: 0, // 0 - first, 1 - second
    
    findElements: function () {
        var base = this;
        
        base.tabsElement = $(base.tabsElementName);
        base.tabElement = $(base.tabElementName);
        base.inputElements = $(base.inputElementsName);
        base.hidePassword = $(base.hidePasswordName);
        
        return base;
    },
    
    setState: function (state) {
      var base = this,
            elem = null;
        
        if (!state) {
            state = 0;
        }
        
        if (base.tabsElement) {
          elem = $(base.tabsElement[state]);
            elem.addClass("current");
            $("." + elem.attr("data-tabtar")).addClass("show");
        }
  
        return base;
    },
    
    getActiveTab: function () {
        var base = this;
        
        base.tabsElement.each(function (i, el) {
           if ($(el).hasClass("current")) {
               base.activeTab = $(el);
           }
        });
        
        return base;
    },
   
    addClickEvents: function () {
      var base = this;
        
        base.hidePassword.on("click", function (e) {
            var $this = $(this),
                $pwInput = $this.prev("input");
            
            if ($pwInput.attr("type") == "password") {
                $pwInput.attr("type", "text");
                $this.text("Hide");
            } else {
                $pwInput.attr("type", "password");
                $this.text("Show");
            }
        });
 
        base.tabsElement.on("click", function (e) {
            var targetTab = $(this).attr("data-tabtar");
            
            e.preventDefault();
            base.activeTab.removeClass("current");
            base.activeTab = $(this);
            base.activeTab.addClass("current");
            
            base.tabElement.each(function (i, el) {
                el = $(el);
                el.removeClass("show");
                if (el.hasClass(targetTab)) {
                    el.addClass("show");
                }
            });
        });
        
        base.inputElements.find("label").on("click", function (e) {
           var $this = $(this),
               $input = $this.next("input");
            
            $input.focus();
        });
        
        return base;
    },
    
    initialize: function () {
        var base = this;
        
        base.findElements().setState().getActiveTab().addClickEvents();
    }
};

$(document).ready(function() {
    LoginModalController.initialize();
});


L.mapbox.accessToken = 'pk.eyJ1IjoicmlzcG8iLCJhIjoiY2lqbG01cGM0MDAzYXQ5a29hZnRnM3E0NCJ9.MnohId0xjh0ywtR5bmdwOw';
    var geojson = [
        {
          "type": "FeatureCollection",
          "features": [
            {
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  2.3815982,
                  48.8558409
                ]
              },
              "properties": {
                "name": "Mango",
                "phoneFormatted": "(202) 234-7336",
                "phone": "2022347336",
                "address": "Charlie Hebdo",
                "city": "Paris",
                "country": "France",
                "crossStreet": "31 rue richard lenoir",
                "postalCode": "www.facebook.com",
                "state": "D.C."
              }
            },
            {
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  2.3760990,
                  48.8512640
                ]
              },
              "properties": {
                "phoneFormatted": "(202) 507-8357",
                "phone": "2025078357",
                "address": "2221 I St NW",
                "city": "Washington DC",
                "country": "United States",
                "crossStreet": "at 22nd St NW",
                "postalCode": "20037",
                "state": "D.C."
              }
            },
        ]
      }
  ];
  var geolocate = document.getElementById('geolocate');
var map = L.mapbox.map('map', 'mapbox.streets');

var myLayer = L.mapbox.featureLayer().addTo(map);

  map.scrollWheelZoom.disable();

  var listings = document.getElementById('listings');
  var locations = L.mapbox.featureLayer().addTo(map);

  locations.setGeoJSON(geojson);

  function setActive(el) {
    var siblings = listings.getElementsByTagName('div');
    for (var i = 0; i < siblings.length; i++) {
      siblings[i].className = siblings[i].className
      .replace(/active/, '').replace(/\s\s*$/, '');
    }

    el.className += ' active';
  }

  locations.eachLayer(function(locale) {

    // Shorten locale.feature.properties to just `prop` so we're not
    // writing this long form over and over again.
    var prop = locale.feature.properties;

    // Each marker on the map.
    var popup = '<h3>Shopping</h3><div>' + prop.address;

    var listing = listings.appendChild(document.createElement('div'));
    

    var link = listing.appendChild(document.createElement('a'));
  

    link.innerHTML = prop.address;
    if (prop.crossStreet) {
      popup += '<br /><small class="quiet">' + prop.crossStreet + '<br /><small class="quiet">' + prop.postalCode +'</small>';
    }

    var details = listing.appendChild(document.createElement('div'));
    details.innerHTML = prop.city;
    if (prop.phone) {
      details.innerHTML += ' &middot; ' + prop.phoneFormatted;
    }

    link.onclick = function() {
      setActive(listing);

      // When a menu item is clicked, animate the map to center
      // its associated locale and open its popup.
      map.setView(locale.getLatLng(), 16);
      locale.openPopup();
      return false;
    };

    // Marker interaction
    locale.on('click', function(e) {
      // 1. center the map on the selected marker.
      map.panTo(locale.getLatLng());

      // 2. Set active the markers associated listing.
      setActive(listing);
    });

    popup += '</div>';
    locale.bindPopup(popup);

    locale.setIcon(L.icon({
      iconUrl: 'marker.png',
      iconSize: [56, 56],
      iconAnchor: [28, 28],
      popupAnchor: [0, -34]
    }));

});

if (!navigator.geolocation) {
    geolocate.innerHTML = 'Geolocation is not available';
} else {
    geolocate.onclick = function (e) {
        e.preventDefault();
        e.stopPropagation();
        map.locate();
    };
}
map.on('locationfound', function(e) {
    map.fitBounds(e.bounds);

    myLayer.setGeoJSON({
        type: 'Feature',
        geometry: {
            type: 'Point',
            coordinates: [e.latlng.lng, e.latlng.lat]
        },
        properties: {
            'title': 'Vous êtes ici !',
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

$('.carousel').carousel();


