<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HOME | HALシネマ</title>
		<link rel="stylesheet" type="text/css" href="css/seat.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	
	<body>
	
		<div id="wrapper">
		
			<div id="header">
				<div id="logo"><a href="index.php"><img src="img/HALCINEMA.png" alt="ロゴ" /></a></div>
				<!--<div id="login">
					<form action="login.php" method="POST">
						ユーザ名<input type="text" name="loginName" size="20" />
						PASS<input type="text" name="loginPass" size="20" />
						<input type="submit" name="login" value="ログイン" id="loginButton" />
						<div id="error">
							<?php
							
								session_start();
								
								// 空白エラー表示
								if(isset($_SESSION["loginError"])){
									if($_SESSION["loginError"] != ""){
										echo "<span style='color:red;'>".$_SESSION["loginError"]."</span>";
										$_SESSION["loginError"] = "";
									}
								}
							?>
						</div>
					</form>
				</div>-->
				<div id="loginArea">
					<ul>
						<li><a href="">マイページ</a></li>
						<li><a href="">ログイン</a></li>
						<li><a href="">会員登録</a></li>
					</ul>
				</div>
				<div id="global">
					<ul>
						<li><a href="index.php"><img src="img/home.png" alt="HOME" /></a></li>
						<li><a href="show.php"><img src="img/showing.png" alt="上映映画" /></a></li>
						<li><a href="index.php"><img src="img/access.png" alt="アクセス" /></a></li>
						<li><a href="index.php"><img src="img/facility.png" alt="施設詳細" /></a></li>
						<li><a href="index.php"><img src="img/inquiry.png" alt="お問い合わせ" /></a></li>
					</ul>
				</div>
			</div>
			
			<div id="main1">
				
			</div>
			
			
			<div id="footer">
				<ul>
					<li><a href="">プライバシーポリシー</a></li>
					<li><a href="">特定商取引法に基づく表記</a></li>
					<li><a href="">ご利用規約</a></li>
				</ul>
				<p>© 2013 HAL Cinemas Ltd. All Rights Reserved.</p>
			</div>
		
		</div>
	
	</body>
</html>