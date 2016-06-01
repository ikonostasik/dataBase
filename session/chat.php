<?php
session_start();
	if(!isset($_SESSION['logged_user'])){
		 header("Location: auth.php");
		 exit;
	}
	
?>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('button').click(function(){
				if($('textarea').val() != '') {
					var text = $('textarea').val();
                                        
					$.ajax({
						url:"action.php",
						type:"POST",
						data: {text:text},
						success: function(data){
							$('textarea').val("");
						}
					})
				}
			})
			window.setInterval(function(){

				var id = $('li:last').attr('id');
				$.ajax({
						url:"action_1.php",
						type:"POST",
						data: {id:id},
						success: function(data){
							if(data==1){ 
							}
							else {
								$('ul').append(data);
							}
						}
					})
			},500)
		})
	</script>
	<meta charset="utf-8">
	<style>
		#Right {
			float:right;
		}
		
		#main_wrap {
				position: absolute;
				border: 1px solid black;
				width: 800px;
				left: 26%;
				float: left;
				margin: 70px 0 0 0;
		}
		#msgarea { 
			    height: 400px;
		}
		#textarea { 
			    background-color: #EEEED6;

		}
		#textarea textarea {
				width: 720px;
				height: 51px;
				resize: none;
			}
		#textarea button {
			    float: right;
    height: 50px;
		}
	</style>
</head>
<body>

<div id="Right">
<a href="destroy.php"><button>&#1042;&#1099;&#1081;&#1090;&#1080;</button></a>
</div>
<div id="main_wrap">
	<div id="msgarea">
		<ul>
			<?
					$dbloc ="mysql.hostinger.ru";
					$dbuser ="u533224130_user";
					$dbpass ="password";

					$dsn = "mysql:host={$dbloc}";
					$conn = new PDO($dsn, $dbuser, $dbpass);
					$sql = "SELECT id,text FROM `u533224130_stas`.`Message` ORDER BY id";
					$result = $conn -> query($sql);
					if(($result->columnCount()) > 0) {
						while ($row = $result->fetch(PDO::FETCH_ASSOC)){
							printf("<li id='{$row[id]}'>{$row[User]}:{$row[text]}</li>");
							}
					}
					else {
						echo "<span>&#1063;&#1072;&#1090; &#1055;&#1091;&#1089;&#1090;</span>";
					}
					
					
			?>
			
		</ul>
	</div>
	<div id="textarea">
	<textarea></textarea>
	<button> &#1054;&#1090;&#1087;&#1088;&#1072;&#1074;&#1080;&#1090;&#1100;</button>
	</div>

</div>
</body>
</html>