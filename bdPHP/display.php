<?php 
require('../Classes/connect.php');
?>
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
		
		<script src="../js/operations.js"></script>
	</table>
<br> <br>
		<button onclick="chng_all()" class="chng_all">&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100; &#1074;&#1089;&#1077;</button>
		<button onclick="del_all()" class='del_all'>&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1074;&#1089;&#1077;</button>	