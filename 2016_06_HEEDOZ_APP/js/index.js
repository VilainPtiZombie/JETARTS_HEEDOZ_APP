
    var LoginModalController = {
        tabsElementName: ".logmod__tabs li",
        tabElementName: ".logmod__tab",
        inputElementsName: ".logmod__form .input",
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

    $(document).ready(function () {
        LoginModalController.initialize();
    });
    $(function () {
    /********  create MAP ***********/
    L.mapbox.accessToken = 'pk.eyJ1IjoicmlzcG8iLCJhIjoiY2lqbG01cGM0MDAzYXQ5a29hZnRnM3E0NCJ9.MnohId0xjh0ywtR5bmdwOw';

    var map = L.mapbox.map('map', 'mapbox.streets').setView([46.8, 2.30], 3);
    map.scrollWheelZoom.disable();


    var $geolocateBtn = $('#geolocate');

    var myLayers = [];
    myLayers['user'] = L.mapbox.featureLayer().addTo(map);
    myLayers['places'] = L.mapbox.featureLayer().addTo(map);

    // Set a custom icon on each marker based on feature properties.
    myLayers['places'].on('layeradd', function (e) {
        //nnconsole.log('place');
        var marker = e.layer,
            feature = marker.feature;
        marker.setIcon(L.icon(feature.properties.icon));
        var content = '<a href="">' + feature.properties.title + '<\/a>' + '<img src="' + feature.properties.image + '" alt="">';
        marker.bindPopup(content);
    });

    // Set a custom icon on each marker based on feature properties.
    myLayers['user'].on('layeradd', function (e) {
        //console.log('user');
        var marker = e.layer,
            feature = marker.feature;
        marker.setIcon(L.icon(feature.properties.icon));
        var content = '<a href="">' + feature.properties.title + '<\/a>' + '<img src="' + feature.properties.image + '" alt="">';
        marker.bindPopup(content);
    });

    //var myLayer = L.mapbox.featureLayer();
    //var myLayer = L.mapbox.featureLayer().addTo(map);


    map.on('ready', function (e) {

        var geojson = {
            type: "FeatureCollection",
            features: [
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [2.3760990, 48.8512640]
                    },
                    "properties": {
                        "title": "Mapbox DC",
                        "description": "1714 14th St NW, Washington DC",
                        "image": "https://farm9.staticflickr.com/8604/15769066303_3e4dcce464_n.jpg",
                        "icon": {
                            "iconUrl": "https://static-s.aa-cdn.net/img/ios/680599060/ee455a14e40448002fc1260f4309883f?v=1",
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
                        "coordinates": [48.87053736960908, 2.3355698169361774]
                    },
                    "properties": {
                        "title": "Popo les bons plans",
                        "description": "23 rue de choiseul",
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
            ]
        };

        myLayers['places'].setGeoJSON(geojson);


        // This uses the HTML5 geolocation API, which is available on
        // most mobile browsers and modern browsers, but not in Internet Explorer
        //
        // See this chart of compatibility for details:
        // http://caniuse.com/#feat=geolocation

        if (!navigator.geolocation) {
            //geolocate.innerHTML = 'Geolocation is not available';
            $geolocateBtn.hide();
        } else {
            $geolocateBtn.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                map.locate();
                $geolocateBtn.hide();
            })
        }


// Once we've got a position, zoom and center the map
// on it, and add a single marker.
        map.on('locationfound', function (e) {
            //map.fitBounds(e.bounds);
            map.setView(e.latlng, 14);

            myLayers['user'].setGeoJSON({
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [e.latlng.lng, e.latlng.lat]
                }
                ,
                properties: {
                    'title': 'Je suis là !',
                    'marker-color': '#ff8888',
                    'marker-symbol': 'star'
                }
            });


            // And hide the geolocation button
            //geolocate.parentNode.removeChild(geolocate);
        }).on('locationerror', function () {
            // If the user chooses not to allow their location
            // to be shared, display an error message.
            geolocate.innerHTML = 'Position could not be found';
        });
    });


    $('.carousel').carousel();

})
