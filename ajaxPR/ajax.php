<?php
header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<link rel="stylesheet" href="../font-awesome-4.2.0/css/font-awesome.min.css" />
		<style type="text/css">
			textarea{
				padding:0;
				margin:0;
			}
			td {
				padding:5px;
			}
			.left {
				float: left;
			}
			.right {
				float: right;
			}
			input {background-color:transparent;
				   border:none;
				   height:100%}
			table { border: 0px; border-collapse: collapse; }
			th:nth-child(even) {background:#CCC}
			tr:nth-child(odd) {background: #CCC}
			tr:nth-child(even) {background: #FFF}
			textarea {position:absolute;}
			.conf{border-radius:100%}

		</style>
	</head>
	<body>
		<div class="right">
		<table>	
				<th></th>
				<th title="Нажмите на Плюсик, чтобы добавить запись">Добавить</th>
				<th><i class="fa fa-plus-square"></i></th>
				<th>ID</th>
				<th>Фамилия Имя Отчество</th>
				<th>Адрес блога</th>
				<th>Время добавления </th>
		<?php 
			

				$dbloc ="mysql.hostinger.ru";
				$dbuser ="u533224130_user";
				$dbpass ="password";
				if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
				$dbloc ="localhost";
				$dbuser ="root";
				$dbpass ="";
				};
				$dsn = "mysql:host={$dbloc}";
				$conn = new PDO($dsn, $dbuser, $dbpass);
				$conn-> exec("SET CHARACTER SET utf8");




				// 'u533224130_stas'.
				$sql = "SELECT * FROM `u533224130_stas`.`Users`";

				$result = $conn -> query($sql);
				while ($row = $result->fetch(PDO::FETCH_ASSOC)){
					print "<tr>";
					echo "<td><input class='check' type='checkbox'></td>";
					//echo "<td><textarea>ыефы</textarea></td>";
					echo "<td class='update' id={$row[id]}><button  title='Подсказка: Значения меняются в смих столбцах'>Изменить</button></td>";
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
				"<tr> <td><button clas='conf' onclick='stasik()'><i class='fa fa-check'></i></button></td> <td class='update' id={$row[id]}><button>Изменить</button></td>" +
				"<td class='del'><button>Удалить</button></td> <td><input readonly value = 'id'></td>" +
				"<td><input id='FIO'></td><td><input id='Url'></td> <td><input readonly value = 'time'></td></tr> ");
				console.log(1)
			});
		})
			
			
			$('.update').click(function(){
				var id = $(this).attr('id')
				var FIO = $(this).next().next().next().children().val();
				var url = $(this).next().next().next().next().children().val();
				$.get("/update.php?id=" + id +"&FIO="+FIO+"&url="+url, function(data){
				});
				$('.right').load('/bdPHP/nestas.php');
					})
				
			$(".del").click(function(){
				var id = $(this).next().children().val();
					if(confirm("Подтвердить удаление"))
					{
				$.get("/test.php?id=" + id, function(data){
				});				
					}
				$('.right').load('/bdPHP/nestas.php');	
			});	
			

		function stasik(){
				var FIO = document.getElementById('FIO').value;
				var Url = document.getElementById('Url').value;
				var request = new XMLHttpRequest();
				var url = "/bdPHP/add.php?FIO="+ FIO + "&Url=" +Url;
				console.log(url);
				request.onreadystatechange = showAsc;
				request.open("GET",url,true);
				request.send(null);			
				function showAsc(){
					$('.right').load('/bdPHP/nestas.php');
			}
		}
				
			
		//Шаблон Ajax На чистом JavaScript
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
		<button onclick="chng_all()" class="chng_all">Изменить выбранное </button>
		<button onclick="del_all()" class='del_all'>Удалить выбранное</button>
		</div>
	<script>
		
		//УДАЛИТЬ ВЫБРАННОЕ
		function del_all(){
				console.log(1);
				var id = [];
				var i = 0;
				$('.check:checked').each(function(){
					id[i++] = $(this).parent().next().next().next().children().val();
					
					})
					if(confirm("Подтвердить удаление")) {
								$.get("/test.php?ids="+id,function(data){
									console.log(data);
								})
								$('.right').load('/bdPHP/nestas.php');	
				}
		}
		
		// ИЗМЕНИТЬ ВЫБРАННОЕ 
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
					if(confirm("Подтвердить Изменения")){
								$.get("/update.php?ids="+ids+"&FIO="+FIO+"&url="+Url,function(data){
									console.log(data);
								})
								alert("Изменения вступили в силу");
								$('.right').load('/bdPHP/nestas.php');	
					}
					
		}
	</script>	
	</body>
</html>
		