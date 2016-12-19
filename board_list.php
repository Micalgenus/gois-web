<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GOIS Test Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	<h3 class="text-left">자유게시판</h3>
	<table class="table text-center table-hover" id="tblBoardList"></table>
</div>

<script>

function loadBoardList(){
	var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

			var result = this.responseText;
			document.getElementById('tblBoardList').innerHTML = result;
    }
  }
  xhttp.open("POST", "./GodHose/bridge.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	xhttp.send("board_list=true");
}


loadBoardList();


</script>

</body>
</html>

