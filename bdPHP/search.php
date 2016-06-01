<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<style>
table {
	border: 1px solid black;
}
table td,th {
	border:1px solid black;
}

</style>	
</head>
<body>

	
<table>
	<th>ID</th>
	<th>FIO</th>
	<th>ADRES</th>
	<th>TIME </th>
<?php
mb_internal_encoding("UTF-8");
$dbloc ="mysql.hostinger.ru";
$dbuser ="u533224130_user";
$dbpass ="password";
if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
$dbloc ="localhost";
$dbuser ="root";
$dbpass ="";
};

//$conn = @mysql_connect($dbloc, $dbuser, $dbpass);

$dsn = "mysql:host={$dbloc}";
$conn = new PDO($dsn, $dbuser, $dbpass);
$conn-> exec("SET CHARACTER SET utf8");


$u = $_POST["option2"];
$g = $_POST["option3"];

$ask =$_POST["ask"];
if((isset($u)== true) and (isset($g)==true)){
		$sql = "SELECT `id`,`FIO`,`url_to_blog`,`time_when_added` FROM `u533224130_stas`.`Users` WHERE `FIO` LIKE '%{$ask}%' or `url_to_blog` LIKE '%{$ask}%'";
		$result = $conn -> query($sql);
		$result->fetch(PDO::FETCH_ASSOC)or die("ERROR: ".mysql_error());
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			print "<tr>";
		foreach($row as $r){
			print "<td>" . $r . "</td>";};
		
	print "</tr>";
		};
}
elseif((isset($u)==true) and (isset($g)==false)){
		$sql = "SELECT `id`,`FIO`,`url_to_blog`,`time_when_added` FROM `u533224130_stas`.`Users` WHERE `FIO` LIKE '%{$ask}%'";
		$result = $conn -> query($sql);
		$result->fetch(PDO::FETCH_ASSOC)or die("ERROR: ".mysql_error());
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			print "<tr>";
		foreach($row as $r){
			print "<td>" . $r . "</td>";};
		
	print "</tr>";
	
		};
}
elseif((isset($g)==true) and (isset($u)==false)){
	$sql = "SELECT `id`,`FIO`,`url_to_blog`,`time_when_added` FROM `u533224130_stas`.`Users` WHERE `url_to_blog` LIKE '%{$ask}%'";
		$result = $conn -> query($sql);
		$result = mysql_query($sql, $conn)or die("ERROR: ".mysql_error());
		while($row = mysql_fetch_assoc($result)){
			print "<tr>";
		foreach($row as $r){
			print "<td>" . $r . "</td>";};
		
	print "</tr>";
		};
}
else{
	
	
}
//$sql = "INSERT INTO `u533224130_stas`.`Users` (`FIO`, `url_to_blog`) VALUES (". $unk . $FIO . $unk . ",". $unk . $Url. $unk .");";
//$result = mysql_query($sql,$conn) or die("ERROR: ".mysql_error());
//if($result == true){

//};

?>

</table>
</body>
</html>