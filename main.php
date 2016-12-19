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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">인바디 추가</h4>
        </div>
        <div class="modal-body">
					<form>
						<input type="date" class="form-control input-lg" id="mdate" placeholder="검사 날짜">
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
					</form>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="종료">
					<input type="button" class="btn btn-default" id="sendMyInbody" data-dismiss="modal" value="추가">
        </div>
      </div>
    </div>
  </div>

	<h1 id="demo"></h1>		
	<div class="row">
		<div class="pull-left">
			<form class="form-horizontal">
				<input type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="인바디 추가">
				<input type="button" class="btn btn-success btn-lg" id="loadSelect" value="정보보기">
			</form>
		</div>
	</div>
</div>

<script>

$("#loadSelect").click(function(){
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

	var str="select_id=<?php echo $_SESSION['loged_id']; ?>";
	xhttp.send(str);
});

$("#loadLogout").click(function(){
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
				alert("로그아웃!");
				document.location.href='index.php';
			}
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send("logout=true");
});

$("#sendMyInbody").click(function(){	
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

	str+="id="+"<?php echo $_SESSION['loged_id'];?>"+"&";
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

