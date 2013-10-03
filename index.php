<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HOME | HALシネマ</title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
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
			
			<div id="main">
				<div id="mainvisual">
					<img src="img/topmv1.png" />
				</div>
				<div id="serch">
					<div id="serchTitle">検索</div>
					<form action="serch.php" method="POST">
						<div id="serchArea">
							<h3>タイトル検索</h3>
							<select name="title" id="select">
								<option>選択してください</option>
							</select>
							<input type="submit" name="titleSerch" value="検索" class="serchBt" />
							<h3 id="date">日時検索</h3>
							<select name="year" class="serchDate" id="year">
								<option>年</option>
								<option>2013</option>
							</select>
							<p>年</p>
							<select name="month" class="serchDate">
								<option>月</option>
								<option>9</option>
							</select>
							<p>月</p>
							<select name="day" class="serchDate">
								<option>日</option>
								<option>27</option>
								<option>28</option>
								<option>29</option>
							</select>
							<p>日</p>
							<input type="submit" name="dateSerch" value="検索" class="serchBt" />
						</div>
					</form>
				</div>
				<div id="contents">
					<div class="show">
						<img src="img/zyouei.png" alt="上映中" />
						<?php
							
							$con = mysqli_connect('localhost','root','');
							
							if(isset($con) && $con != false){
								
								mysqli_set_charset($con,'utf8');
								mysqli_select_db($con,'iw31');
								
								$today = date('Y-m-d');
								
								$result = mysqli_query($con,"SELECT * FROM movies WHERE end_date >=  '".$today."' LIMIT 0,4");
								
								echo "<ul>";
								while($row = mysqli_fetch_array($result)){
									echo "<li><img src='img/$row[9].png' alt='$row[1]' />";
									echo "<p><a href='movieDet.php?movieid=$row[0]'>$row[1]</a></p></li>";
								}
								echo "</ul>";
							}
							
							//mysqli_close($con);
						?>
						<!--<ul>
							<li>
								<img src="img/jacket1.jpg" alt="風立ちぬ" />
								<p><a href="">風立ちぬ</a></p>
							</li>
							<li>
								<img src="img/jacket2.png" alt="貞子3D2" />
								<p><a href="">貞子3D 2</a></p>
							</li>
							<li>
								<img src="img/jacket3.png" alt="そして父になる" />
								<p><a href="">そして父になる</a></p>
							</li>
							<li>
								<img src="img/jacket4.png" alt="ウルヴァリン SAMURAI" />
								<p><a href="">ウルヴァリン SAMURAI</a></p>
							</li>
						</ul>-->
						<div id="more"><a href="show.php">もっとみる</a></div>
					</div>
					<div class="show">
						<img src="img/yotei.png" alt="予定" />
						<?php
						
							$result = mysqli_query($con,"SELECT * FROM movies WHERE start_date >  '".$today."' LIMIT 0,4");
							
							echo "<ul>";
							while($row = mysqli_fetch_array($result)){
								echo "<li><img src='img/$row[9].png' alt='$row[1]' />";
								echo "<p><a href='movieDet.php?movieid=$row[0]'>$row[1]</a></p></li>";
							}
							echo "</ul>";
						?>
						<!--<ul>
							<li>
								<img src="img/jacket6.png" alt="怪盗グル―" />
								<p><a href="">怪盗グル―</a></p>
							</li>
							<li>
								<img src="img/jacket7.png" alt="クロニクル" />
								<p><a href="">クロニクル</a></p>
							</li>
							<li>
								<img src="img/jacket3.png" alt="そして父になる" />
								<p><a href="">そして父になる</a></p>
							</li>
							<li>
								<img src="img/jacket4.png" alt="ウルヴァリン SAMURAI" />
								<p><a href="">ウルヴァリン SAMURAI</a></p>
							</li>
						</ul>
						<div id="more"><a href="">もっとみる</a></div>
					</div>
					<div id="publicity">
						<img src="img/tyuumoku.png" alt="注目" />
						<ul>
							<li>
								<img src="img/jacket1.png" alt="風立ちぬ" />
								<p><a href="">風立ちぬ</a></p>
							</li>
							<li>
								<img src="img/jacket2.png" alt="貞子3D2" />
								<p><a href="">貞子3D 2</a></p>
							</li>
						</ul>-->
					</div>
					<div id="osusume">
						<img src="img/osusume.png" alt="おすすめ" />
						<!--<ul>
							<li>
								<img src="img/jacket1.png" alt="風立ちぬ" />
								<p><a href="">風立ちぬ</a></p>
							</li>
							<li>
								<img src="img/jacket2.png" alt="貞子3D2" />
								<p><a href="">貞子3D 2</a></p>
							</li>
						</ul>-->
					</div>
				</div>
				<div id="ranking">
					<img src="img/ranking.png" alt="ランキング" />
					<!--<ul>
						<li>
							<div class="high">1</div>
							<img src="img/jacket1.png" alt="風立ちぬ" />
							<p><a href="">風立ちぬ</a></p>
						</li>
						<li>
							<div class="high">2</div>
							<img src="img/jacket2.png" alt="貞子3D2" />
							<p><a href="">貞子3D 2</a></p>
						</li>
						<li>
							<div class="high">3</div>
							<img src="img/jacket3.png" alt="そして父になる" />
							<p><a href="">そして父になる</a></p>
						</li>
						<li>
							<div>4</div>
							<img src="img/jacket4.png" alt="ウルヴァリン SAMURAI" />
							<p><a href="">ウルヴァリン SAMURAI</a></p>
						</li>
						<li>
							<div>5</div>
							<img src="img/jacket5.png" alt="あの花" />
							<p><a href="">あの花</a></p>
						</li>
					</ul>-->
				</div>
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