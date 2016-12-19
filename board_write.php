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
		
	<div class="form-group text-left" style="margin-top:10px;">
		<label for="Title">Title:</label>
		<input type="text" class="form-control" id="board_write_title">
	</div>
	<div class="form-group text-left">
		<label for="comment">Contents:</label>
		<textarea class="form-control" rows="15" id="board_write_contents"></textarea>
	</div>
	<div class="btn-group text-center">
		<button type="submit" class="btn btn-default text-right" onclick="boardWrite()"><span class="glyphicon glyphicon-ok"></span> OK</button>
		<a href="2.html" type="button" class="btn btn-default text-right"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
	</div>
</div>

<script>

function boardWrite(){
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
				alert("성공적으로 게시되었습니다");
			}
			else{
				alert("알 수 없는 오류가 발생했습니다");
			}
			document.location.href='board_list.php';
    }
  };
  xhttp.open("POST", "./GodHose/bridge.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	if($('#board_write_title').val().length <= 0)alert("제목이 비어 있습니다");
	else if($('#board_write_contents').val().length <= 0)alert("내용이 비어 있습니다");
	else{
		var str="";
		str+="board_write_id=<?php echo $_SESSION['loged_id']; ?>"+"&";
		str+="board_write_title="+$('#board_write_title').val()+"&";
		str+="board_write_contents="+$('#board_write_contents').val();
		
		xhttp.send(str);

	}
}
</script>

</body>
</html>

