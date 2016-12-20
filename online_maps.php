<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GOIS Test Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/mycss.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (min-width: 1024px) {
			.container-fluid {
				margin-left:20%;
				margin-right:20%;
			}
		}

		.account .form-control{
			margin-top:5px;
			margin-bottom:5px;
		}
	</style>
</head>
<body>

<?php include 'header.php'; ?>
  
<div class="container">
	<h3>기관 주소</h3>
	<div id="map" style="width:100%;height:500px"></div>
</div>

<script>

function myMap() {

  var myCenter = new google.maps.LatLng(<?php echo $_GET['lat']; ?>, <?php echo $_GET['lng']; ?>);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 17};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:"<?php echo $_GET['address']; ?>"
    });
  infowindow.open(map,marker);
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeTijjbsF64U-Xfal_Rmh4-TnCtLc-wiI&callback=myMap"></script>

</body>
</html>

