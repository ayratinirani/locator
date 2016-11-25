<!DOCTYPE html>
<html>
<head>
	
	<title>موقعیتهای افراد</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>


	
</head>
<body>



<div id="mapid" style="width: 600px; height: 400px;"></div>
<script>
<?php $center=$points[0];

?>
	var mymap = L.map('mapid').setView([<?=$center["lat"]?>, <?=$center["lon"]?>], 8);

	L.tileLayer('http://b.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	<?php
foreach($points as $point){
	
?>L.marker([<?=$point["lat"]?>, <?=$point["lon"]?>]).addTo(mymap)
		.bindPopup("<b><?=$point["sender"]?></b><br /> <?=date("Y-m-d H:i:s  A",$point["time"])?>.").openPopup();
		
		
<?php		
		}
?>
//توضیحات
	L.circle([<?=$center["lat"]?>, <?=$center["lon"]?>], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("I am a circle.");
<!--
L.polyline([
	<?php
	foreach($points as $point){
		echo "[".$point["lat"].",".$point["lon"]."],";
		}?>
	]).addTo(mymap).bindPopup("I am a polygon.");
-->

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);
  marker.on("click",onMapClick);
</script>

<div>
<pre>
<?php print_r($points);?>
</pre>
</div>

</body>

</html>
