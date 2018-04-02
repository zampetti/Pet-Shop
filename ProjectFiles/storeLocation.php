<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Store Location</title>
<style>
#map {
height: 400px;
width: 75%;
margin: auto;
}
</style>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
</head>
<body>
<?php require 'Includes/Header.php' ?>
<h3>Shop Location</h3>
<div>
    <table id="location">
        <th><h3>Directions:</h3></th>
        <tr><td>Sandy's is located on W. Allegan St., just south of the Capital Building, and west of the Grand River.</td></tr>
        <th><h3>Our hours of operation are:</h3></th>
        <tr><td>Monday-Friday: 8 AM to 8 PM</td></tr>
        <tr><td>Saturday: 9 AM to 5 PM</td></tr>
    </table>
</div>
<div id="map"></div>
<script>
function initMap() {
var uluru = {lat: 42.732535, lng: -84.555535};
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 10,
center: uluru
});
var marker = new google.maps.Marker({
position: uluru,
map: map
});
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMeWa8WsYM0ObU5Q6dmpQ7gknMndmGVE&callback=initMap"></script>
    <?php require 'Includes/Footer.php' ?>
</body>
</html>