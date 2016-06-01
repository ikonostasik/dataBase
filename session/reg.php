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
<button onclick='document.location.href = "enter.php"' id="reg">Вход</button>
	<form id="loginform" class="unauthorized" method="post" action="registration.php">
	<div id="enter">
		<input placeholder="Логин" name="name" id="login"/> 
		<input placeholder="Пароль" type="password" name="password1" id="password1">
		<input placeholder="Повторите Пароль" type="password" name="password2" id="password2">
		<input placeholder="Почта" name="mail" id="mail">
		<input value="Зарегистрироваться" id="button" type="submit">
	</div>
	
<form>

</body>

</html>
