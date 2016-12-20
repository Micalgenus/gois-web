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
		<div class="row">
			<div class="col-sm-4">
				<ul class="list-group">
					<li class="list-group-item">
						<img src="/image/group.png" class="img-rounded" alt="group" width="200" height="200">
						<h4 class="list-group-item-heading">Third List Group Item Heading</h4>
						<p class="list-group-item-text">List Group Item Text</p>
						
					</a>
					<li href="#" class="list-group-item">
						<div style="text-align:center;">
							<div class="col-xs-8">
								<input class="form-control" id="join_group" type="text" placeholder="그룹명">
							</div>
							참가하기 
							<button type="button" class="btn btn-success" id="join_group_btn">
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</div>
					</li>
					<li href="#" class="list-group-item">
						<div style="text-align:center;">
							<div class="col-xs-8">
								<input class="form-control" id="exit_group" type="text" placeholder="그룹명">
							</div>
							탈퇴하기 
							<button type="button" class="btn btn-danger">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">My Group List</div>
					<div class="panel-body">
						<div class="list-group" id="my_group_list">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">Group Members</div>
					<div class="panel-body">
						<div class="list-group" id="my_member_list">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Selected Member's Inbody Information</div>
			<div class="panel-body">
				<div class="col-sm-2">
					<table class="table table-bordered" id="tblList"></table>
					<ul class="pager">
						<li><a href="#" onclick="loadTable('Pre')">Previous</a></li>
						<li><a href="#" onclick="loadTable('Next')">Next</a></li>	
					</ul>
				</div>
				<div class="col-sm-10">
					<table class="table table-bordered">
					<colgroup>
						<col width="20%"></col>
						<col></col>
					</colgroup>
						<thead>
							<tr>
								<th>속성</th>
								<th>값</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>날짜</td>
								<td>2</td>
							</tr>
							<tr>
								<td>기관명</td>
								<td>2</td>
							</tr>
							<tr>
								<td>세포내수분</td>
								<td>2</td>
							</tr>
							<tr>
								<td>세포외수분</td>
								<td>2</td>
							</tr>
							<tr>
								<td>단백질</td>
								<td>2</td>
							</tr>
							<tr>
								<td>무기질</td>
								<td>2</td>
							</tr>
							<tr>
								<td>체지방</td>
								<td>2</td>
							</tr>
							<tr>
								<td>체중</td>
								<td>2</td>
							</tr>
							<tr>
								<td>골격근량</td>
								<td>2</td>
							</tr>
							<tr>
								<td>BMI</td>
								<td>2</td>
							</tr>
							<tr>
								<td>체지방률</td>
								<td>2</td>
							</tr>
							<tr>
								<td>복부지방률</td>
								<td>2</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>

	<script>
	$("#join_group_btn").click(function(){	
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
					alert("그룹에 성공적으로 참여했습니다");
				}
				else if(result == 101){
					alert("새 그룹을 생성했습니다");
				}
				else if(result == 201){
					alert("올바르지 않은 ID 입니다");
				}
				else if(result == 202){
					alert("올바르지 않은 그룹명 입니다");
				}
				else if(result == 401){
					alert("해당 그룹엔 이미 가입한 상태입니다");
				}
				else{
					alert("예기치 않은 오류가 발생했습니다");
				}
				document.location.href='sub_group.php';
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="";

		str+="join_group_id=<?php echo $_SESSION['loged_id']; ?>"+"&";
		str+="join_group_name="+$("#join_group").val();

		xhttp.send(str);
	});

	function loadGroupList(){
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
				document.getElementById('my_group_list').innerHTML=result;
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="";

		str+="group_list_id=<?php echo $_SESSION['loged_id']; ?>";

		xhttp.send(str);
	}
	loadGroupList();

	function clickGroupList(myKey){
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
				
				document.getElementById('my_member_list').innerHTML=result;
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="";

		str+="member_list_name="+myKey;

		xhttp.send(str);
		
	}

	function clickMemberList(myId){
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
				document.getElementById('tblList').innerHTML=result;
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="";

		str+="info_list_id="+myId+"&";
		str+="info_list_flag="+"Zero";

		xhttp.send(str);
	}

	function loadTable(flag){
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
				document.getElementById('tblList').innerHTML=result;
			}
		};
		xhttp.open("POST", "./GodHose/bridge.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		var str="";

		str+="info_list_id="+"<?php echo $_COOKIE['member_id']; ?>"+"&";
		str+="info_list_flag="+flag;

		xhttp.send(str);
	}


	
	</script>
</body>
</html>