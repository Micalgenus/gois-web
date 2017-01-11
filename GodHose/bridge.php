<?php
session_start();
if(!isset($_COOKIE['info_list_page']))setcookie('info_list_page', 0, time() + (86400 * 30), "/");

$post_data["admin_id"]="gois";
$post_data["admin_pw"]="getonese!fintoshape@";

//account
if(isset($_POST['account_id']) && isset($_POST['account_pw']) && isset($_POST['account_nickname']) && isset($_POST['account_name']) && isset($_POST['account_birth']) && isset($_POST['account_sex'])){
	$url = 'https://api.gois.me/user/create'; //호출 URL 지정
	
	if(isset($_POST['account_key'])){
		$post_data["key"]=$_POST["account_key"];
	}
	$post_data["id"]=$_POST['account_id'];
	$post_data["pw"]=$_POST['account_pw'];
	$post_data["nickname"]=$_POST['account_nickname'];
	$post_data["name"]=$_POST['account_name'];
	$post_data["birth"]=$_POST['account_birth'];
	$post_data["sex"]=$_POST['account_sex'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data); 
	//curl_setopt ($curlsession, CURLOPT_POSTFIELDSIZE, 0); 
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo json_decode($res)->status;
	//$j_res = json_decode($res);

	//echo $j_res->status;
	/*
	var_dump($res); //결과값 출력
	print_r(curl_getinfo($curlsession)); //모든정보 출력
	echo curl_errno($curlsession); //에러정보 출력
	echo curl_error($curlsession); //에러정보 출력
	*/
	curl_close($curlsession); 
}

//login
if(isset($_POST['login_id']) && isset($_POST['login_pw'])){
	$url = 'https://api.gois.me/user/login'; //호출 URL 지정
	
	$post_data["id"]=$_POST['login_id'];
	$post_data["pw"]=$_POST['login_pw'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data); 
	//curl_setopt ($curlsession, CURLOPT_POSTFIELDSIZE, 0); 
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res)->status;
	echo json_decode($res)->status;

	if($j_res == 100){
		$_SESSION["loged_id"]=$post_data["id"];
	}
	

	curl_close($curlsession); 
}

//test
if(isset($_POST['select_id'])){
	$url = 'https://api.gois.me/user/select'; //호출 URL 지정
	
	$post_data["id"]=$_POST['select_id'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data); 
	//curl_setopt ($curlsession, CURLOPT_POSTFIELDSIZE, 0); 
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo $res;
	

	curl_close($curlsession); 
}

//insertinbody
if(isset($_POST['id']) && isset($_POST['mdate']) && isset($_POST['wicell']) && isset($_POST['wocell']) && isset($_POST['protein']) && isset($_POST['mineral']) && isset($_POST['body_fat']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['s_muscle']) && isset($_POST['bmi']) && isset($_POST['p_body_fat']) && isset($_POST['waist_hip'])){
	$url = 'https://api.gois.me/info/insert'; //호출 URL 지정
	
	$post_data["id"]=$_POST['id'];
	$post_data["mdate"]=$_POST['mdate'];
	$post_data["wicell"]=$_POST['wicell'];
	$post_data["wocell"]=$_POST['wocell'];
	$post_data["protein"]=$_POST['protein'];
	$post_data["mineral"]=$_POST['mineral'];
	$post_data["body_fat"]=$_POST['body_fat'];
	$post_data["weight"]=$_POST['weight'];
	$post_data["height"]=$_POST['height'];
	$post_data["s_muscle"]=$_POST['s_muscle'];
	$post_data["bmi"]=$_POST['bmi'];
	$post_data["p_body_fat"]=$_POST['p_body_fat'];
	$post_data["waist_hip"]=$_POST['waist_hip'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo $res;
	
	curl_close($curlsession); 
}

//info/select
if(isset($_POST['info_list_id']) && isset($_POST['info_list_flag'])){
	$url = 'https://api.gois.me/info/select'; //호출 URL 지정

	$post_data["id"]=$_POST['info_list_id'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str="<thead>
      <tr>
        <th class='text-center'>인바디 정보 보기</th>
      </tr>
    </thead>
    <tbody>";

	if(!isset($_COOKIE['info_list_page']))setcookie('info_list_page', 0, time() + (86400 * 30), "/");

	setcookie('member_id', $_POST['info_list_id'], time() + (86400 * 30), "/sub_group.php");
	
	$flag = $_POST['info_list_flag'];

	$page_start=0;
	$page_end=13;
	if($flag == "Zero"){
		setcookie('info_list_page', 0, time() + (86400 * 30), "/");
	}
	if($flag != "Zero"){
		if($flag == "Pre"){
			$pager = $_COOKIE['info_list_page']-13;
			if($pager < 0)$pager=0;
			setcookie('info_list_page', $pager, time() + (86400 * 30), "/");
			$page_start=$pager;
			$page_end=$pager+13;
		}
		else if($flag == "Next"){
			if($_COOKIE['info_list_page']+13 < $j_res->size){
				$pager = $_COOKIE['info_list_page']+13;
				setcookie('info_list_page', $pager, time() + (86400 * 30), "/");
				$page_start=$pager;
				$page_end=$pager+13;
			}
			else{
				$pager = $_COOKIE['info_list_page'];
				$page_start=$pager;
				$page_end=$pager+13;
			}
		}
	}
	if($page_end > $j_res->size)$page_end=$j_res->size;
		
	for($i=$page_start; $i < $page_end; $i++){
		$str=$str."<tr><td class='text-center'><a href='#' onclick='clickInbodyList(".$j_res->list[$i]->key.")'>".$j_res->list[$i]->date."</a></td></tr>";
	}

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//info/detail
if(isset($_POST['detail_key'])){
	$url = 'https://api.gois.me/info/detail'; //호출 URL 지정

	$post_data["key"]=$_POST['detail_key'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	//print_r(json_decode($res));
	
	$j_res = json_decode($res);

	$str="<colgroup>
			<col width='20%'></col>
			<col></col>
		</colgroup><thead>
      <tr>
        <th>속성</th>
				<th>값</th>
      </tr>
    </thead>
    <tbody>";
		$str=$str."<tr><td>검사 날짜</td><td>".$j_res->mdate."</td></tr>";
		$str=$str."<tr><td>기관명</td><td><a href='#' onclick='moveMap(".$j_res->akey.")'>".$j_res->agency."</a></td></tr>";
		$str=$str."<tr><td>세포내수분</td><td>".$j_res->wicell."</td></tr>";
		$str=$str."<tr><td>세포외수분</td><td>".$j_res->wocell."</td></tr>";
		$str=$str."<tr><td>단백질</td><td>".$j_res->protein."</td></tr>";
		$str=$str."<tr><td>무기질</td><td>".$j_res->mineral."</td></tr>";
		$str=$str."<tr><td>체지방</td><td>".$j_res->body_fat."</td></tr>";
		$str=$str."<tr><td>체중</td><td>".$j_res->weight."</td></tr>";
		$str=$str."<tr><td>신장</td><td>".$j_res->height."</td></tr>";
		$str=$str."<tr><td>골격근량</td><td>".$j_res->s_muscle."</td></tr>";
		$str=$str."<tr><td>BMI</td><td>".$j_res->bmi."</td></tr>";
		$str=$str."<tr><td>체지방률</td><td>".$j_res->p_body_fat."</td></tr>";
		$str=$str."<tr><td>복부지방률</td><td>".$j_res->waist_hip."</td></tr>";
		$str=$str."</tbody>";

	echo $str;
	

	curl_close($curlsession); 
}


//board_write
if(isset($_POST['board_write_title']) && isset($_POST['board_write_contents']) && isset($_POST['board_write_id'])){
	$url = 'https://api.gois.me/board/insert'; //호출 URL 지정


	$post_data["id"]=$_POST['board_write_id'];
	$post_data["title"]=$_POST['board_write_title'];
	$post_data["contents"]=$_POST['board_write_contents'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo json_decode($res)->status;

	curl_close($curlsession); 
}

//board_list
if(isset($_POST['board_list_page'])){
	$url = 'https://api.gois.me/board/list'; //호출 URL 지정

	$post_data["board_list_page"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
			<col width="8%">
			<col>
			<col width="15%">
			<col width="17%">
			<col width="8%">
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
				<tbody>';
	
	if(!isset($_COOKIE['board_list_page']))setcookie('board_list_page', 0, time() + (86400 * 30), "/");
	
	$flag = $_POST['board_list_page'];

	$page_start=0;
	$page_end=20;
	if($flag == "Zero"){
		setcookie('board_list_page', 0, time() + (86400 * 30), "/");
	}
	if($flag != "Zero"){
		if($flag == "Pre"){
			$pager = $_COOKIE['board_list_page']-20;
			if($pager < 0)$pager=0;
			setcookie('board_list_page', $pager, time() + (86400 * 30), "/");
			$page_start=$pager;
			$page_end=$pager+20;
		}
		else if($flag == "Next"){
			if($_COOKIE['board_list_page']+20 < $j_res->size){
				$pager = $_COOKIE['board_list_page']+20;
				setcookie('board_list_page', $pager, time() + (86400 * 30), "/");
				$page_start=$pager;
				$page_end=$pager+20;
			}
			else{
				$pager = $_COOKIE['board_list_page'];
				$page_start=$pager;
				$page_end=$pager+20;
			}
		}
	}
	if($page_end > $j_res->size)$page_end=$j_res->size;
		
	//<a href='#' onclick='clickInbodyList(".$j_res->list[$i]->key.")'>".$j_res->list[$i]->date."</a>
	for($i=$page_start; $i < $page_end; $i++){
		$str=$str."<tr onclick='clickBoardList(".$j_res->list[$i]->key.")'><td>".$j_res->list[$i]->key."</td><td class='text-left'>".$j_res->list[$i]->title."</td><td>".$j_res->list[$i]->writer."</td><td>".$j_res->list[$i]->date."</td><td>".$j_res->list[$i]->hits."</td></tr>";
	}
	

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//board_list
if(isset($_POST['main_board_list_page'])){
	$url = 'https://api.gois.me/board/list'; //호출 URL 지정

	$post_data["main_board_list_page"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
			<col width="8%">
			<col>
			<col width="15%">
			<col width="17%">
			<col width="8%">
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
				<tbody>';
	
	$end = 10;
	if($end > $j_res->size)$end=$j_res->size;
	for($i=0; $i < $end; $i++){
		$str=$str."<tr onclick='clickBoardList(".$j_res->list[$i]->key.")'><td>".$j_res->list[$i]->key."</td><td class='text-left'>".$j_res->list[$i]->title."</td><td>".$j_res->list[$i]->writer."</td><td>".$j_res->list[$i]->date."</td><td>".$j_res->list[$i]->hits."</td></tr>";
	}
	

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//board_list
if(isset($_POST['board_detail_key'])){
	$url = 'https://api.gois.me/board/detail'; //호출 URL 지정

	$post_data["key"]=$_POST['board_detail_key'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
			<col></col>
			<col width=8%"></col>
			<col width="14%"></col>
		</colgroup>
			<thead>
				<tr>
					<th colspan="3">'.$j_res->title.'</th>
				</tr>
			</thead>
			<tbody>
			  <tr>
				<td>'.$j_res->writer.'</td>
				<td>조회 수 '.$j_res->hits.'</td>
				<td>'.$j_res->date.'</td>
			  </tr>
			  <tr>
				<td colspan="3" style="padding:50px 50px 50px 50px;">'.$j_res->contents.'</td>
			  </tr>
			  <tr>
			  <td><button type="button" class="btn btn-default" onclick="gotoList()">To List</button></td>
			  <td></td>
			  <td>';
	if($_SESSION['loged_id'] == $j_res->id){
		$str=$str.'<button type="button" class="btn btn-default" onclick="deleteBoardDetail('.$_POST['board_detail_key'].')">Delete</button>';
	}
	$str=$str.'</td>
			  </tr>
			</tbody>';

	echo $str;

	curl_close($curlsession); 
}

//board_delete
if(isset($_POST['board_detail_delete']) && isset($_POST['board_detail_id'])){
	$url = 'https://api.gois.me/board/delete'; //호출 URL 지정

	$post_data["key"]=$_POST['board_detail_delete'];
	$post_data["id"]=$_POST['board_detail_id'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo json_decode($res)->status;

	curl_close($curlsession); 
}


//rank_list_social
if(isset($_POST['rank_list_social'])){
	$url = 'https://api.gois.me/rank/social'; //호출 URL 지정

	$post_data["rank_list_social"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
					<col width="10%"></col>
					<col></col>
					<col width="20%"></col>
				</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">User Name</th>
							<th class="text-center">Score</th>
						</tr>
					</thead>
					<tbody>';
	
	for($i=0; $i < $j_res->size; $i++){
		$str=$str."<tr><td>".($i+1)."</td><td>".$j_res->list[$i]->nickname."</td><td>".$j_res->list[$i]->score."</td></tr>";
	}

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//main_rank_list_social
if(isset($_POST['main_rank_list_social'])){
	$url = 'https://api.gois.me/rank/social'; //호출 URL 지정

	$post_data["rank_list_social"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
					<col width="10%"></col>
					<col></col>
					<col width="20%"></col>
				</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Score</th>
						</tr>
					</thead>
					<tbody>';
	
	$end=5;
	if($end > $j_res->size)$end=$j_res->size;
	for($i=0; $i < $end; $i++){
		$str=$str."<tr><td>".($i+1)."</td><td>".$j_res->list[$i]->nickname."</td><td>".$j_res->list[$i]->score."</td></tr>";
	}

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//rank_list_inbody
if(isset($_POST['rank_list_inbody'])){
	$url = 'https://api.gois.me/rank/inbody'; //호출 URL 지정

	$post_data["rank_list_inbody"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
					<col width="10%"></col>
					<col></col>
					<col width="20%"></col>
				</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">User Name</th>
							<th class="text-center">Score</th>
						</tr>
					</thead>
					<tbody>';
	
	for($i=0; $i < $j_res->size; $i++){
		$str=$str."<tr><td>".($i+1)."</td><td>".$j_res->list[$i]->nickname."</td><td>".$j_res->list[$i]->score."</td></tr>";
	}

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//main_rank_list_inbody
if(isset($_POST['main_rank_list_inbody'])){
	$url = 'https://api.gois.me/rank/inbody'; //호출 URL 지정

	$post_data["rank_list_inbody"]="OK";

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str='<colgroup>
					<col width="10%"></col>
					<col></col>
					<col width="20%"></col>
				</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Score</th>
						</tr>
					</thead>
					<tbody>';
	
	$end=5;
	if($end > $j_res->size)$end=$j_res->size;
	for($i=0; $i < $end; $i++){
		$str=$str."<tr><td>".($i+1)."</td><td>".$j_res->list[$i]->nickname."</td><td>".$j_res->list[$i]->score."</td></tr>";
	}

	$str=$str."</tbody>";

	echo $str;

	curl_close($curlsession); 
}

//group/join
if(isset($_POST['join_group_id']) && isset($_POST['join_group_name'])){
	$url = 'https://api.gois.me/group/join'; //호출 URL 지정

	$post_data["id"]=$_POST['join_group_id'];
	$post_data["name"]=$_POST['join_group_name'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo json_decode($res)->status;

	curl_close($curlsession); 
}

//group/exit
if(isset($_POST['exit_group_id']) && isset($_POST['exit_group_name'])){
	$url = 'https://api.gois.me/group/joinout'; //호출 URL 지정

	$post_data["id"]=$_POST['exit_group_id'];
	$post_data["name"]=$_POST['exit_group_name'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo json_decode($res)->status;

	curl_close($curlsession); 
}

//group/mylist
if(isset($_POST['group_list_id'])){
	$url = 'https://api.gois.me/group/mylist'; //호출 URL 지정

	$post_data["id"]=$_POST['group_list_id'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);


	$str="";
	$end=6;
	if($end > $j_res->size)$end=$j_res->size;
	for($i=0; $i < $end; $i++){
		$str=$str.'<a href="#" class="list-group-item" onclick="clickGroupList('.$j_res->list[$i]->key.')">'.$j_res->list[$i]->name.'</a>';
	}

	echo $str;

	curl_close($curlsession); 
}

//group/member
if(isset($_POST['member_list_name'])){
	$url = 'https://api.gois.me/group/member'; //호출 URL 지정

	$post_data["key"]=$_POST['member_list_name'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	$j_res = json_decode($res);

	$str="";
	$end=6;
	if($end > $j_res->size)$end=$j_res->size;
	for($i=0; $i < $end; $i++){
		$str=$str.'<a href="#" class="list-group-item" onclick="clickMemberList(\''. $j_res->list[$i]->id .'\')">'.$j_res->list[$i]->nickname.'</a>';
	}

	echo $str;

	curl_close($curlsession); 
}

//online_maps_akey
if(isset($_POST['online_maps_akey'])){
	$url = 'https://api.gois.me/admin/info'; //호출 URL 지정


	$post_data["akey"]=$_POST['online_maps_akey'];

	$curlsession = curl_init (); 
	curl_setopt ($curlsession, CURLOPT_URL, $url); 
	curl_setopt ($curlsession, CURLOPT_POST, 1); 
	curl_setopt ($curlsession, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt ($curlsession, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec ($curlsession); 

	echo $res;


	curl_close($curlsession); 
}

//logout
if(isset($_POST['logout'])){
	session_unset();
	echo "100";
}
?>