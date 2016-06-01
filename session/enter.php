<html>

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link rel="stylesheet" href="../font-awesome-4.2.0/css/font-awesome.min.css" />
	<meta charset='utf-8'>
	<style type="text/css">
		#enter {
			left: 39%;
			position: absolute;
			border: 1px solid black;
			margin: 13% 0 0 0;
			padding: 13px;
			border-radius: 8px;
		}
			input {
			    width: 95%;
			    line-height: 23px;
			    border-radius: 5px;
			}

		p {
			text-align: center;
			font-size: 20px;
		}

			#button {
			    margin: 20px 0 0 1px;
			    font-size: 30px;
			    width: 95%;
			    line-height: 40px;
		}	
		img {
			border-radius: 3px;
			margin: 20px 0px -8px 0px;
		}
		.refresh {
			margin: 31px 29px 0 0;
			float: right;
			font-size: 25px;
			padding: 12px 16px;
			margin: 18px 15px 0 0px;
		}
		#captcha {
			margin: 25px 0 -15px 0;
		}
		
	</style>
	<script>
			$(document).ready(function(){
		$(".refresh").click(function(event){
			event.preventDefault();
			$('.img').attr({
			src: "../Captcha/captcha.php",			
			});
		});
			})
	</script>
</head>

<body>
	<form method="post" action="auth.php">
	<div id="enter">
		<h1>Добро пожаловать!</h1>
		<p>Введите имя пользователя</p><input name="name"/> 
		<p>Введите Пароль </p><input type="password" name="Password">
		<div>
			<img class="img" src="../Captcha/captcha.php"> 
			<button class="refresh"/><i class="fa fa-refresh"></i></button>
		</div>
		<input id="captcha" name = "captcha">
		<input value="Войти" id="button" type="submit">
	</div>
	
<form>
<div class="stas"></div>

</body>

</html>
