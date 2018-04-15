function initMap() {

  window.map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    center: {lat: 33, lng: 25}
  });

  // Add some markers to the map.
  // Note: The code uses the JavaScript Array.prototype.map() method to
  // create an array of markers based on a given "locations" array.
  // The map() method here has nothing to do with the Google Maps API.
  getLocationsFromDB(function(locations){
    var markers = locations.map(function(location, i) {
      return new google.maps.Marker({
        position: location
      });
    });

    // Add a marker clusterer to manage the markers.
    window.markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  });

  map.addListener('click', function(e) {
    placeMarker(e.latLng, null, map);
  });

  window.geocoder = new google.maps.Geocoder();
}

function placeMarker(location, address, map) {
    window.markerCluster.addMarker(new google.maps.Marker({
        position: location,
        map: map
    }));

    if(address===null){
      reverseGeocode(location, function(address){
          addLocationToDB(address, JSON.stringify(location));
      });
    }else{
      addLocationToDB(address, JSON.stringify(location));
    }
}

function reverseGeocode(latlng, callback){
  window.geocoder.geocode( { 'location': latlng}, function(results, status) {
      if (status == 'OK') {
        callback(results[0].formatted_address);
      } else {
        console.error('Reverse geocode was not successful for the following reason: ' + status);
      }
    });
}

function geocode(address){
  window.geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        placeMarker(results[0].geometry.location, address, window.map);
      } else {
        console.error('Geocode was not successful for the following reason: ' + status);
      }
    });
}

$(document).ready(function(){
  $("#addMarkerByAddress").click(function(){
    geocode($("#addressInput")[0].value);
  });

  //Add the autocomplete
  new google.maps.places.Autocomplete(document.getElementById("addressInput"), {types: ['geocode']});
});

function addLocationToDB(address, latlngStr){
  $.post("php/addMoneyLocation.php",{
                                      "projectID": 1,//THIS IS TEMPORARY
                                      "address": address,
                                      "latlng": latlngStr
                                    });
}

function getLocationsFromDB(callback){//ProjectID IS TEMPORARY
  $.post("php/getMoneyLocations.php",{"projectID": 1}, function(data){
    callback(JSON.parse(JSON.parse(data)));
  });
}
