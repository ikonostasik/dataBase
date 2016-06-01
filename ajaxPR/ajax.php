<?php
require('../Classes/connect.php');
header('Access-Control-Allow-Origin: *');
session_start();
	if(!isset($_SESSION['logged_user'])){
		 header("location: ../session/enter.php");
		 exit;
	}
	
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<link rel="stylesheet" href="../font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../css/app.css"/>
		
	</head>
	<body>
		<div>
		<a href="../session/destroy.php" ><button>exit</button></a>
		</div>
		<div class="right">
		<table>	
				<th></th>
				<th title="&#1053;&#1072;&#1078;&#1084;&#1080;&#1090;&#1077; &#1085;&#1072; &#1087;&#1083;&#1102;&#1089;&#1080;&#1082;, &#1095;&#1090;&#1086;&#1073;&#1099; &#1076;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1079;&#1072;&#1087;&#1080;&#1089;&#1100;">&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;</th>
				<th><i class="fa fa-plus-square"></i></th>
				<th>ID</th>
				<th>ФИО</th>
				<th>Адрес блога</th>
				<th>Время добавления</th>
		<?php 
			

				
				$sql = "SELECT * FROM `u533224130_stas`.`Users`";
				
				$dbh = Connection::getInstance()->connect();
				
				$result = $dbh->query($sql);
				

				// 'u533224130_stas'.
				



				while ($row = $result->fetch(PDO::FETCH_ASSOC)){
					print "<tr>";
					echo "<td><input class='check' type='checkbox'></td>";
					echo "<td class='update' id={$row[id]}><button title='Нажмите на поле, чтобы начать изменение данных'> Изменить</button></td>";
					echo "<td class='del'><button>Удалить</button></td>";
					echo "<td><input readonly value='" .($row[id]). "'></td>";
					echo "<td><input value='" .($row[FIO]). "'></td>";
					echo "<td><input value='" .($row[url_to_blog]). "'></td>";
					echo "<td><input readonly value='" .($row[time_when_added]). "'></td>";
					print "</tr>";
				}
		?>
		
		<script>
		$(document).ready(function(){
			$('.fa-plus-square').click(function(){
				$('table').append(
				"<tr> <td><button clas='conf' onclick='stasik()'><i class='fa fa-check'></i></button></td> <td class='update' id={$row[id]}><button>&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;</button></td>" +
				"<td class='del'><button>&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100;</button></td> <td><input readonly value = 'id'></td>" +
				"<td><input id='FIO'></td><td><input id='Url'></td> <td><input readonly value = 'time'></td></tr> ");
				console.log(1)
			});
		})
			
			
			$('.update').click(function(){
				var id = $(this).attr('id')
				var FIO = $(this).next().next().next().children().val();
				var url = $(this).next().next().next().next().children().val();
				$.get("../session/update.php?id=" + id +"&FIO="+FIO+"&url="+url, function(data){
				});
                                alert("Изменения вступили в силу");
				$('.right').load('../bdPHP/nestas.php');
					})
				
			$(".del").click(function(){
				var id = $(this).next().children().val();
					if(confirm("Подтвердите удаление"))
					{
				$.get("../session/test.php?id=" + id, function(data){
				});				
					}
				$('.right').load('/bdPHP/nestas.php');	
			});	
			

		function stasik(){
				var FIO = document.getElementById('FIO').value;
				var Url = document.getElementById('Url').value;
				var request = new XMLHttpRequest();
				var url = "../bdPHP/add.php?FIO="+ FIO + "&Url=" +Url;
				console.log(url);
				request.onreadystatechange = showAsc;
				request.open("GET",url,true);
				request.send(null);			
				function showAsc(){
					$('.right').load('../bdPHP/nestas.php');
			}
		}
				
			
		//&#1095;&#1090;&#1086; &#1090;&#1086; JavaScript
		/**function stas(){
			
			var request = new XMLHttpRequest();
			var url = "/test.php?id=1";
			request.onreadystatechange = showAsc;
			request.open("GET",url,true);
			request.send(null);			
			function showAsc(){
				if(request.readyState == 4){
					var result = document.getElementById("stas");
					result.firstChild.nodeValue = request.responseText;
				}
			}
		}**/
		</script>
		</table>
		<br> <br>
		<button onclick="chng_all()" class="chng_all">&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1074;&#1089;&#1077;</button>
		<button onclick="del_all()" class='del_all'>&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1074;&#1089;&#1077;</button>
		</div>
	<script>
		
		
		function del_all(){
				var id = [];
				var i = 0;
				$('.check:checked').each(function(){
					id[i++] = $(this).parent().next().next().next().children().val();
					
					})
					if(confirm("Подтвердите удаление")) {
								$.get("../session/test.php?ids="+id,function(data){
									console.log(data);
								})
								alert("&#1059;&#1076;&#1072;&#1083;&#1077;&#1085;&#1080;&#1077; &#1087;&#1088;&#1086;&#1096;&#1083;&#1086; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1086;");
								$('.right').load('../bdPHP/nestas.php');	
				}
		}
		
		
		function chng_all(){
			var ids = [];
			var FIO = []; 
			var Url = [];
				var i = 0; 
				$('.check:checked').each(function(){
					ids[i] = FIO[i] = $(this).parent().next().next().next().children().val();
					FIO[i] = $(this).parent().next().next().next().next().children().val();
					Url[i++] = $(this).parent().next().next().next().next().next().children().val();
					})
					if(confirm("Подтвердите Изменение")){
								$.get("../session/update.php?ids="+ids+"&FIO="+FIO+"&url="+Url,function(data){
									console.log(data);
								})
								alert("Изменения вступили в силу!");
								$('.right').load('../bdPHP/nestas.php');	
					}
					
		}
	</script>	
	</body>
</html>
		