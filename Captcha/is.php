<?
session_start();
$cap = $_POST["captch"];

if($cap == $_SESSION['Sikretik']);
echo "OK";
?>