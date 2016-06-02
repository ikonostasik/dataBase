<?php
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
		<div class="exit">
		<a href="../session/destroy.php" ><button id="exit">Выход</button></a>
		</div>
		<div class="right">
		<?php
		require("../bdPHP/display.php");
		?>
		</div>
	<script src="../js/operations_mas.js"></script>	
	</body>
</html>
		