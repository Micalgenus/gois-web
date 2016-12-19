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

	<div class="row">
		<div class="account">
			<h1><strong>인바디 정보 입력</strong></h1>
			<div class="pull-left">
				<form class="form-horizontal">

						<input type="date" class="form-control input-lg" id="mdate" placeholder="검사 날짜">
						<input type="text" class="form-control input-lg" id="id" placeholder="아이디">
						<input type="text" class="form-control input-lg" id="wicell" placeholder="세포내수분">
						<input type="text" class="form-control input-lg" id="wocell" placeholder="세포외수분">
						<input type="text" class="form-control input-lg" id="protein" placeholder="단백질">
						<input type="text" class="form-control input-lg" id="mineral" placeholder="무기질">
						<input type="text" class="form-control input-lg" id="body_fat" placeholder="체지방">
						<input type="text" class="form-control input-lg" id="weight" placeholder="체중">
						<input type="text" class="form-control input-lg" id="s_muscle" placeholder="골격근량">
						<input type="text" class="form-control input-lg" id="bmi" placeholder="BMI">
						<input type="text" class="form-control input-lg" id="p_body_fat" placeholder="체지방률">
						<input type="text" class="form-control input-lg" id="waist_hip" placeholder="복부지방률">
						
						
						<br>
						<input type="button" class="btn btn-success btn-lg" id="sendinbody" value="입력하기">
				</form>

				<br>
				<p id="demo">test</p>
				
				
			</div>
		</div>
	
</div>

<script>

$("#sendinbody").click(function(){	
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

			document.getElementById('demo').innerHTML=result;
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var str="";
	str+="id="+$("#id").val()+"&";
	str+="mdate="+$("#mdate").val()+"&";
	str+="wicell="+$("#wicell").val()+"&";
	str+="wocell="+$("#wocell").val()+"&";
	str+="protein="+$("#protein").val()+"&";
	str+="mineral="+$("#mineral").val()+"&";
	str+="body_fat="+$("#body_fat").val()+"&";
	str+="weight="+$("#weight").val()+"&";
	str+="s_muscle="+$("#s_muscle").val()+"&";
	str+="bmi="+$("#bmi").val()+"&";
	str+="p_body_fat="+$("#p_body_fat").val()+"&";
	str+="waist_hip="+$("#waist_hip").val();

  xhttp.send(str);
	
});

</script>

</body>
</html>

