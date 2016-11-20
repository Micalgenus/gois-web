<?php
$post_data["admin_id"]="gois";
$post_data["admin_pw"]="getonese!fintoshape@";

//account
if(isset($_POST['account_id']) && isset($_POST['account_pw']) && isset($_POST['account_nickname']) && isset($_POST['account_name']) && isset($_POST['account_birth']) && isset($_POST['account_sex'])){
	$url = 'https://api.gois.me/user/create'; //호출 URL 지정
	
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

	echo $res;
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

	echo json_decode($res)->status;

	curl_close($curlsession); 
}
?>