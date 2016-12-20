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

		<h3><span class="glyphicon glyphicon-user"></span>  개인 정보</h3>
		<ul class="list-group">
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="id_value"></h3>
				<p class="list-group-item-text">ID</p>
			</li>
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="name_value"></h3>
				<p class="list-group-item-text">이름</p>
			</li>
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="sex_value"></h3>
				<p class="list-group-item-text">성별</p>
			</li>
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="birth_value"></h3>
				<p class="list-group-item-text">생년월일</p>
			</li>
		</ul>
		<hr>
		<h3><span class="glyphicon glyphicon-heart"></span>  활동 정보</h3>
		<ul class="list-group">
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="nick_value"></h3>
				<p class="list-group-item-text">별명</p>
			</li>
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="ip_value"></h3>
				<p class="list-group-item-text">Inbody Point</p>
			</li>
			<li href="#" class="list-group-item">
				<h3 class="list-group-item-heading" id="sp_value"></h3>
				<p class="list-group-item-text">Social Point</p>
			</li>
		</ul>
	</div>

	<script>
		function loadSelect(){
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
					var obj = JSON.parse(result);
					document.getElementById('id_value').innerHTML="<?php echo $_SESSION['loged_id'] ?>";
					document.getElementById('name_value').innerHTML=obj.name;
					document.getElementById('sex_value').innerHTML=obj.sex;
					document.getElementById('birth_value').innerHTML=obj.birth;
					document.getElementById('nick_value').innerHTML=obj.nickname;
					document.getElementById('ip_value').innerHTML=obj.i_point;
					document.getElementById('sp_value').innerHTML=obj.s_point;
				}
			};
			xhttp.open("POST", "./GodHose/bridge.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			var str="select_id=<?php echo $_SESSION['loged_id']; ?>";
			xhttp.send(str);
		}

		loadSelect();
	</script>
</body>
</html>