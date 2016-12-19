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
	<div class="container text-center">
		<h3 class="text-left">자유게시판</h3>
		<table class="table text-center table-hover">
		<colgroup>
			<col width="10%">
			<col>
			<col width="15%">
			<col width="12%">
			<col width="10%">
		</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Title</th>
						<th class="text-center">Writer</th>
						<th class="text-center">Date</th>
						<th class="text-center">hits</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td >1</td>
						<td class="text-left">니하오 아임 짱깨윤</td>
						<td>Yoon</td>
						<td>2016-02-19</td>
						<td>23</td>
					</tr>
					<tr>
						<td>2</td>
						<td class="text-left">Park</td>
						<td>Park</td>
						<td>2016-02-19</td>
						<td>21</td>
					</tr>
					<tr>
						<td>3</td>
						<td class="text-left">Han</td>
						<td>Han</td>
						<td>2016-02-19</td>
						<td>10</td>
					</tr>
				</tbody>
		</table>
		<nav>
			<ul class="pagination text-center">
				<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
				<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			</ul>
		</nav>
		<a href="3.html" type="button" class="btn btn-default text-right"><span class="glyphicon glyphicon-pencil"></span> Write</a>
	</div>
</body>
</html>