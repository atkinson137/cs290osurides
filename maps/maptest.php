<html>
  <head>
    <title>This is a test map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 50%;
		width: 50%;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }

    </style>
  </head>
  <body>
    <input id="pac-input1" class="controls" type="text"
        placeholder="Enter start">
	<input id="pac-input2" class="controls" type="text"
        placeholder="Enter destination">
    <div id="map"></div>

    <script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 44.00, lng: -120.5},
    zoom: 6
  });

  var start = document.getElementById('pac-input1');
  var destination = document.getElementById('pac-input2');

  var startAutocomplete = new google.maps.places.Autocomplete(start);
  startAutocomplete.bindTo('bounds', map);

  var destinationAutocomplete = new google.maps.places.Autocomplete(destination);
  destinationAutocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(start);

  var startInfowindow = new google.maps.InfoWindow();
  var startMarker = new google.maps.Marker({
    map: map
  });
  startMarker.addListener('click', function() {
    startInfowindow.open(map, startMarker);
  });

  var destinationInfowindow = new google.maps.InfoWindow();
  var destinationMarker = new google.maps.Marker({
    map: map
  });
  destinationMarker.addListener('click', function() {
    destinationInfowindow.open(map, destinationMarker);
  });

  startAutocomplete.addListener('place_changed', function() {
    startInfowindow.close();
    var place = startAutocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    startMarker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    startMarker.setVisible(true);

    startInfowindow.setContent('<div><strong>' + place.formatted_address + '</strong>');
    startInfowindow.open(map, startMarker);
  });

  destinationAutocomplete.addListener('place_changed', function() {
    destinationInfowindow.close();
    var place = destinationAutocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    destinationMarker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });
    destinationMarker.setVisible(true);

    destinationInfowindow.setContent('<div><strong>' + place.formatted_address + '</strong>');
    destinationInfowindow.open(map, destinationMarker);
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBec-tg3yBpOcZzd4ino_TbWGXh4PcaC54&libraries=places&sign_in=true&callback=initMap"
        async defer>
    </script>
  </body>
</html>