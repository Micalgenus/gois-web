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
								<input class="form-control" id="ex1" type="text">
							</div>
							참가하기 
							<button type="button" class="btn btn-success">
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</div>
					</li>
					<li href="#" class="list-group-item">
						<div style="text-align:center;">
							<div class="col-xs-8">
								<input class="form-control" id="ex1" type="text">
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
						<div class="list-group">
							<a href="#" class="list-group-item">First item</a>
							<a href="#" class="list-group-item">Second item</a>
							<a href="#" class="list-group-item">Third item</a>
							<a href="#" class="list-group-item">Fourth item</a>
							<a href="#" class="list-group-item">Fifth item</a>
							<a href="#" class="list-group-item">Sixth item</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">Group Members</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="#" class="list-group-item">First item</a>
							<a href="#" class="list-group-item">Second item</a>
							<a href="#" class="list-group-item">Third item</a>
							<a href="#" class="list-group-item">Fourth item</a>
							<a href="#" class="list-group-item">Fifth item</a>
							<a href="#" class="list-group-item">Sixth item</a>
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
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>인바디 정보 보기</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
							<tr>
								<td>1</td>
							</tr>
						</tbody>
					</table>
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
</body>
</html>