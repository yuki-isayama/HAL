<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>映画一覧 | HALシネマ</title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/show.css"/>
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
				<div id="pankuzu"><a href="index.php">HOME</a> > <a href="show.php">映画一覧</a></div>
				<div id="contents">
					<div class="showArea">
						<?php
							// MySQLサーバとの接続をオープン
							$con = mysqli_connect('localhost','root','');
							
							// $conがセットされているか
							if(isset($con) && $con != false){
								// $conがセットされている場合
								
								// 文字コード設定
								mysqli_set_charset($con,'utf8');
								// データベースの選択
								mysqli_select_db($con,'iw31');
								
								// 日付取得
								$today = date('Y-m-d');
								$day = date('Y年n月j日');
								
								// SQL文
								$result = mysqli_query($con,"SELECT * FROM movies WHERE end_date >=  '".$today."'");
								$schedule = mysqli_query($con,"SELECT * FROM movies m,schedule s WHERE m.movie_id=s.movie_id AND end_date >=  '".$today."'");
								
								echo "<ul id='showContent'>";
								while($row = mysqli_fetch_array($result)){
									echo "<li class='list'><img src='img/$row[9].png' alt='$row[1]' />";
									echo "<div class='detArea'><p class='title'><a href=''>$row[1]</a></p>";
									echo "<p class='actor'>監督：$row[2]<br />出演：$row[5]</p>";
									echo "<ul class='schedule'><li class='first'>シアター$row[8]</li>";
									while($scheduleRow = mysqli_fetch_array($schedule)){
										echo "<a href='seat.php?movieid=$row[0]&date=$day&time=$scheduleRow[13]～$scheduleRow[14]'><li>$scheduleRow[13]<br />～<br />$scheduleRow[14]</li></a>";
										/*echo "<a href=''><li class='line'></li></a>";
										echo "<a href=''><li class='line'></li></a>";
										echo "<a href=''><li class='line'></li></a>";*/
									}
									echo "</ul></div></li>";
								}
								echo "</ul>";
							}
							
							mysqli_close($con);
							
						?>
						<!--<ul id="showContent">
							<li class="list">
								<img src="img/jacket1.png" alt="風立ちぬ" />
								<div class="detArea">
									<p class="title"><a href="">風立ちぬ</a></p>
									<p class="actor">
										監督：宮崎駿<br />
										出演：声　庵野秀明
									</p>
									<ul class="schedule">
										<li class="first">シアター1</li>
										<a href=""><li>12:00<br />～<br />13:00</li></a>
										<a href=""><li class="line">12:00<br />～<br />13:00</li></a>
										<a href=""><li class="line">12:00<br />～<br />13:00</li></a>
										<a href=""><li class="line">12:00<br />～<br />13:00</li></a>
									</ul>
								</div>
							</li>
							<li class="list">
								<img src="img/jacket2.png" alt="貞子3D2" />
								<div class="detArea">
									<p class="title"><a href="">貞子3D 2</a></p>
									<p class="actor">
										監督：英勉<br />
										出演：瀧本美織、大沢逸美、石原さとみ、山本裕典
									</p>
									<p class="schedule">
										
									</p>
								</div>
							</li>
							<li class="list">
								<img src="img/jacket3.png" alt="そして父になる" />
								<div class="detArea">
									<p class="title"><a href="">そして父になる</a></p>
									<p class="actor">
										監督：是枝裕和<br />
										出演：福山雅治、尾野真千子、真木よう子、リリー・フランキー
									</p>
									<p class="schedule">
										
									</p>
								</div>
							</li>
							<li class="list">
								<img src="img/jacket4.png" alt="ウルヴァリン SAMURAI" />
								<div class="detArea">
									<p class="title"><a href="">ウルヴァリン SAMURAI</a></p>
									<p class="actor">
										監督：ジェームズ・マンゴールド<br />
										出演：ヒュー・ジャックマン、真田広之、ＴＡＯ、福島リラ
									</p>
									<p class="schedule">
										
									</p>
								</div>
							</li>
						</ul>-->
					</div>
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