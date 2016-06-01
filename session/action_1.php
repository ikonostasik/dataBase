<?
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

$id = $_POST["id"];

$sql = "SELECT * FROM `u533224130_stas`.`Message` WHERE id > '{$id}'";
$result = $conn -> query($sql)or die("ERROR: ".mysql_error());

if ($result->columnCount() > 0) {
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    printf("<li id='{$row[id]}'>{$row[User]}:{$row[text]}</li>");
   }
 }
else {
echo 1;
}
?>	