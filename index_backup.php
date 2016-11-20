<!DOCTYPE html>
<html lang="en">
<head>
  <title>GOIS Test Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GOIS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" data-toggle="modal" data-target="#accountBox"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" data-toggle="modal" data-target="#loginBox"><span class="glyphicon glyphicon-user"></span>Login</a></li>
    </ul>
  </div>
</nav>


  <!-- Modal -->
<div class="modal fade" id="accountBox" role="dialog">
	<div class="modal-dialog">
	
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">GOIS Account</h4>
			</div>
			<div class="modal-body">
				<form action="https://api.gois.me/user/create" method="post">
					<div class="form-group">
						<input type="hidden" name="admin_id" value="gois">
						<?php /* <input type="hidden" name="admin_pw" value="getonese!fintoshape@"> */  /* Hide Data */ ?>
						<input type="text" class="form-control" name="id" placeholder="id">
						<input type="text" class="form-control" name="pw" placeholder="pw">
						<input type="text" class="form-control" name="name" placeholder="name">
						<input type="text" class="form-control" name="birth" placeholder="birth">
						<input type="text" class="form-control" name="sex" placeholder="sex">
						
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-default">Account</button>
				</form>
			</div>
		</div>
		
	</div>
</div>

<div class="modal fade" id="loginBox" role="dialog">
	<div class="modal-dialog">
	
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">GOIS Login</h4>
			</div>
			<div class="modal-body">
				<form action="https://api.gois.me/user/create" method="post">
					<div class="form-group">
						<input type="hidden" name="admin_id" value="gois">
						<?php /* <input type="hidden" name="admin_pw" value="getonese!fintoshape@"> */  /* Hide Data */ ?>
						<input type="text" class="form-control" name="id" placeholder="id">
						<input type="text" class="form-control" name="pw" placeholder="pw">
						
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-default">Account</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
  
  
<div class="container">
	<h3>GOIS Test Page</h3>
	
</div>

</body>
</html>

