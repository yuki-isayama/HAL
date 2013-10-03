<?php
	
	session_start();
	
	$con = mysqli_connect('localhost','root','');
	
	if(isset($con) && $con != false){
		// $conがセットされている場合
		
		mysqli_set_charset($con,'utf8');
		mysqli_select_db($con,'iw31');
		
		// SQLインジェクション対策
		$loginName = mysqli_real_escape_string($con,$_POST["loginName"]);
		$loginPass = mysqli_real_escape_string($con,$_POST["loginPass"]);
		
		$result = mysqli_query($con,"SELECT * FROM users WHERE name = '".$loginName."' AND password = '".$loginPass."'");
							
		// 一致するものがない時index.phpに戻す
		if(!$row = mysqli_fetch_array($result)){
			$_SESSION["loginError"] = "ユーザ名またはPASSが間違っています。";
			header("Location:index.php");
		}
		mysqli_close($con);
	}

?>