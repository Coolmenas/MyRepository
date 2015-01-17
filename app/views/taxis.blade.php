@extends('layout')

@section('content')
    <!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
var map;
 var markerLocations;
//var markersArray;// = <?php echo $taxis; ?> ;
var markers = [];



function initialize() {
  var mapOptions = {
    zoom: 12
  };
  map = new google.maps.Map(document.getElementById('googleMap'),
      mapOptions);

  // Info window element 
  

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content:'<div style="width:110px;">Jūsų buvimo vieta</div>'
      });

    map.setCenter(pos);
   //getMarkers();
   // showTaxis();
   // clearOverlays();

    }, function() {
      handleNoGeolocation(true);
      
    });
    } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
    }


}

function clearMarkers(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
}

function showTaxis (){
    for (i = 0; i < markers.length; i++) {
      createMarker(markers[i].x,markers[i].y);
    };
}

function getMarkers (){
  var posi;
  markerLocations = <?php echo $taxis; ?> ;
    for (i = 0; i < markerLocations.length; i++) {
      posi = new google.maps.LatLng(markerLocations[i].x, markerLocations[i].y);
      addMarker(posi,i,markerLocations[i].aviable);//markerLocations[i].x,markerLocations[i].y);
      //message = (string) markerLocations.x;
      addInfoWindow(markers[i], markerLocations[i]);
      changeMarkerColor(markers[i])
    };
}

function changeMarkerColor(marker){
   if(marker.aviable)
    marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
}

function addInfoWindow(marker, mInfo) {

            var pos = marker.getPosition();
            var infoWindow = new google.maps.InfoWindow({
                content: '<div style="width:150px;">'+String(mInfo.Name)+ "<br>" + String(mInfo.phone)+'</div>',
                position:  pos,
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
            });
}

function addMarker(location,i,aviable) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    title:name,
  });
  if(aviable)
    marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
  markers[i] = marker;
  


}

function createMarker ($x, $y) {
    var posi = new google.maps.LatLng($x, $y);
    var marker=new google.maps.Marker({
      position:posi
      });
    markers.push(marker);
    //marker.setMap(map);
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>

<body background = 'http://www.psdgraphics.com/file/colorful-triangles-background.jpg'>
<div id="googleMap" style="width:80%;height:70%;"></div>

</body>
</html>

<?php echo Form::open(array(null, null, 'onsubmit' => 'getMarkers(); return false ;')); ?>
    <?php echo Form::submit('Rodyti taxi', null, array('id'=>'getMarkers', 'class'=>'button radius right')); ?>
<?php echo Form::close(); ?>

<?php echo Form::open(array(null, null, 'onsubmit' => 'clearMarkers(null); return false;')); ?>
    <?php echo Form::submit('Išvalyti taxi', null, array('id'=>'clearMarkers', 'class'=>'button radius right')); ?>
<?php echo Form::close(); ?>



<!--
-->
    <h1>Taxi Sąrašas</h1>
    @foreach($taxis as $taxis)
        @if($taxis->aviable)
        <p>{{ $taxis->Name }} <ins> Galimas </ins></p>
        <p>{{ $taxis->phone}}</p>
        @else
        <p>{{ $taxis->Name }}  Užimtas</p>
        <p>{{ $taxis->phone}}</p>   
        @endif
    @endforeach

@stop