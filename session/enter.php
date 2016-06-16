<?php
session_start();

if(!(empty($_SESSION['logged_user'])))
	header("Location: ../ajaxPR/ajax.php");
?>
<html>

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link rel="stylesheet" href="../font-awesome-4.2.0/css/font-awesome.min.css" />
	<meta charset='utf-8'>
	<link rel="stylesheet" href="../css/enter.css" />
	<style type="text/css">
	</style>
</head>

<body>
<button onclick='document.location.href = "reg.php"' id="reg">Регистрация </button>
<div class="dark">
	<div class="hidden">
		<img src="../Captcha/captcha.php"/><br class="hidden">
		<input id="capch"> <br>
		<div>	
			<button id="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
			<button id="confirm">Подтвердить</button>
		</div>
	</div>
</div>
	<form id="loginform" class="unauthorized" method="post" action="auth.php">
	<div id="enter">
		<input required="true"
 name="name" id="login"/> 
		<input required="true"  type="password" name="Password" id="password">
		<input value="Войти" id="button" type="submit">
	</div>
	
<form>
<div class="stas"></div>
<script src="../js/enter.js"></script>
</body>

</html>
