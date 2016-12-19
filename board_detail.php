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
		<table class="table" id="tblBoardDetail">
		<colgroup>
			<col></col>
			<col width="7%"></col>
			<col width="7%"></col>
		</colgroup>
			<thead>
				<tr>
					<th colspan="3">Title</th>
				</tr>
			</thead>
			<tbody>
			  <tr>
				<td>Writer</td>
				<td>Hit</td>
				<td>Date</td>
			  </tr>
			  <tr>
				<td colspan="3" style="padding:50px 50px 50px 50px;">Mary</td>
			  </tr>
			  <tr>
			  <td><button type="button" class="btn btn-default">To List</button></td>
			  <td></td>
			  <td><button type="button" class="btn btn-default">Delete</button></td>
			  </tr>
			  
			</tbody>
		</table>
	</div>
	<script>
		function loadBoardDetail(key){
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
					document.getElementById('tblBoardDetail').innerHTML = result;
				}
			}
			xhttp.open("POST", "./GodHose/bridge.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				
			xhttp.send("board_detail_key="+key);
		}

		loadBoardDetail("<?php echo $_GET['key'] ?>");
	</script>
</body>
</html>