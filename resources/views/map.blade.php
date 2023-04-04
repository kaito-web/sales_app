<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Map Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBwIdK_hUEf3du0qlUHRAmXGR2XRMddZ4&callback=initMap"
        asyncdefer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script>
        let address = @json($address);

        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {
                    lat: 35.6585769,
                    lng: 139.7454506
                } // 東京タワーの座標をデフォルトに設定
            });

            const geocoder = new google.maps.Geocoder();
            geocodeAddress(geocoder, map, address);
        }

        function geocodeAddress(geocoder, resultsMap, address) {
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    console.error('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
</body>

</html>
