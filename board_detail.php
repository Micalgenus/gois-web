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
		<table class="table" id="tblBoardDetail"></table>
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

		function deleteBoardDetail(key){
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
						
					if(result == 100){
						alert("삭제가 완료되었습니다");
					}
					else{
						alert("삭제 중에 오류가 발생했습니다");
					}					
					
					document.location.href='board_list.php';
				}
			}
			xhttp.open("POST", "./GodHose/bridge.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			var str="";
			str+="board_detail_delete="+key+"&";
			str+="board_detail_id="+"<?php echo $_SESSION['loged_id']; ?>";

			xhttp.send(str);
		}

		function gotoList(){
			document.location.href='board_list.php';
		}
	</script>
</body>
</html>