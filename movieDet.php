<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/movieDet.css" />
<title>無題ドキュメント</title>
</head>

<body>
	<div id="main">
		<?php
		
			$movieId = $_GET['movieid'];
		
			$con = mysqli_connect('localhost','root','');
			
			if(isset($con) && $con != false){
				
				mysqli_set_charset($con,'utf8');
				mysqli_select_db($con,'iw31');
				
				$today = date('n月j日');
			}
			
			//mysqli_close($con);
			
		?>
        <div id = "visual"> 
        	<div id="img"><img src="img/kazetachinu.png" /></div>
        </div>
        
        <div id = "word">
				
					<?php
						$result = mysqli_query($con,"SELECT * FROM movies WHERE movie_id = ".$movieId."");
						
						// index.phpかshow.phpからmovie_idをとってくる処理を先にする
						while($row = mysqli_fetch_array($result)){
							echo "<div id='title'>$row[2]</div>";
							echo "<p class='setumei'>$row[5]</p>";
							echo "<p class='setumei'>監督：$row[3]</p>";
							echo "<p class='setumei'>出演：$row[4]</p>";
						}
					?>
        
					<!--<div id="title">風立ちぬ</div>
					
					<p id="setsumei">かつて、日本で戦争があった。<br />大正から昭和へ、1920年代の日本は、不景気と貧乏、病気、そして大震災と、<br />まことに生きるのに辛い時代だった。<br />そして、日本は戦争へ突入していった。<br />当時の若者たちは、そんな時代をどう生きたのか？<br />イタリアのカプローニへの時空を超えた尊敬と友情、後に神話と化した零戦の誕生、<br />薄幸の少女菜穂子との出会いと別れ。<br />この映画は、実在の人物、堀越二郎の半生を描く――。</p>
					
					<p id="setsumei">監督：宮崎駿</p>
					<p id="setsumei">出演　声：庵野秀明</p>
        </div>-->
        
        <div id = "schedule">
            <img src="img/schedule_midashi.png">
            
            <div id="schedule_menu">
            
            	<div id="schedule_gyou">
                         
							 <div id="schedule_day">
								<p>9/27(日)</p>
							 </div>
																	 
							 <div id="schedule_theater">
								<p>1</p>
									<p>シアター</p>
							 </div>

							 <div id="schedule_naiyou">
								 <p>9:30　12:30　15:30　18:30　21:30</p>                     
							 </div>                     
							</div>
                
             	<div id="schedule_gyou">        
								<div id="schedule_day">
									<p>9/28(月)</p>
								</div>                    
					 			<div id="schedule_theater">
									<p>1<p>
									<p>シアター</p>
								</div>
								<div id="schedule_naiyou">
									<p>9:30　12:30　15:30　18:30</p>                     
								</div>                     
               </div>
                
            	<div id="schedule_gyou">           
                     <div id="schedule_day">
                     	<p>9/29(火)</p>
                     </div>
					 <div id="schedule_theater">
                      	<p>1<p>
                        <p>シアター</p>
                     </div>
                     <div id="schedule_naiyou">
                     	<p>12:30　15:30　18:30</p>                     
                     </div>                     
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
