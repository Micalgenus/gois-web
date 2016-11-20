<nav class="navbar navbar-inverse" style="padding-bottom:15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://gois.me/index.php"><img src="image/title.png" alt="title.png" /></a>
    </div>
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