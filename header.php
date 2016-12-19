<nav class="navbar navbar-inverse" style="padding-bottom:15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php 
			if(isset($_SESSION['loged_id'])){
				echo 'https://gois.me/main.php';
			}
			else{
				echo 'https://gois.me/index.php';
			}
			?>"><img src="image/title.png" alt="title.png" /></a>
    </div>
	<ul class="nav navbar-nav">
				<li style="text-size:20px;"><a href="#">My information</a></li>
				<li><a href="#">Ranking</a></li>
				<li><a href="#">Board</a></li>
			</ul>
		<form class="navbar-form navbar-right" style="margin-top:25px;">
		<?php
		//logined
		if(isset($_SESSION['loged_id'])){
			echo '
			<input type="button" class="btn btn-default" id="loadLogout" value="로그아웃">';
		}
		//unlogined
		else{
			echo '<div class="form-group">
        <input type="text" class="form-control" id="login_id" placeholder="아이디">
				<input type="password" class="form-control" id="login_pw" placeholder="비밀번호">
      </div>
			<input type="button" class="btn btn-default" id="loadLogin" value="로그인">';
		}
		?>
      

    </form>
		
  </div>
</nav> 