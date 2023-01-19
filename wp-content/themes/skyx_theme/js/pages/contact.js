function initMap() {
    var styledMapType = new google.maps.StyledMapType(
        [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                        "saturation": 36
                    },
                    {
                        "color": "#A7A9AC"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "color": "#000000"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#36373B"
                    },
                    {
                        "lightness": 0
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#000000"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                        "color": "#54565B"
                    },
                    {
                        "lightness": 0
                    }
                ]
            }
        ], {
            name: 'Styled Map'
        });

    var maphq = new google.maps.Map(document.getElementById('mapHQ'), {
        center: {
            lat: 43.7962835,
            lng: -79.5479215
        },
        zoom: 13,
        zoomControl: false,
        fullscreenControl: false,
        mapTypeControl: false,
        streetViewControl: false
    });

    var markerhq = new google.maps.Marker({
        position: {
          lat: 43.7962835,
          lng: -79.5479215
        },
        map: maphq,
        icon: 'https://skyx.com/wp-content/themes/skyx_theme/img/map-marker.png'
    });

    var mapushq = new google.maps.Map(document.getElementById('mapUSHQ'), {
        center: {
            lat: 29.7604,
            lng: -95.3698
        },
        zoom: 12,
        zoomControl: false,
        fullscreenControl: false,
        mapTypeControl: false,
        streetViewControl: false
    });

    var markerushq = new google.maps.Marker({
        position: {
            lat: 29.7604,
            lng: -95.3698
        },
        map: mapushq,
        icon: 'https://skyx.com/wp-content/themes/skyx_theme/img/map-marker.png'
    });

    var mapeuhq = new google.maps.Map(document.getElementById('mapEuropeHQ'), {
        center: {
            lat: 45.7750777,
            lng: 21.2114171
        },
        zoom: 14,
        zoomControl: false,
        fullscreenControl: false,
        mapTypeControl: false,
        streetViewControl: false
    });

    var markereuhq = new google.maps.Marker({
        position: {
            lat: 45.7750777,
            lng: 21.2114171
        },
        map: mapeuhq,
        icon: 'https://skyx.com/wp-content/themes/skyx_theme/img/map-marker.png'
    });

    //Associate the styled map with the MapTypeId and set it to display.
    maphq.mapTypes.set('styled_map', styledMapType);
    maphq.setMapTypeId('styled_map');
    mapushq.mapTypes.set('styled_map', styledMapType);
    mapushq.setMapTypeId('styled_map');
    mapeuhq.mapTypes.set('styled_map', styledMapType);
    mapeuhq.setMapTypeId('styled_map');
}