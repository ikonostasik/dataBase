$(document).ready(function(){
	console.log(1);
	$("#button").click(function(e){
		 event.preventDefault();
		 var name = $("#login").val();
		 var password = $("#password").val();

		$.ajax({
		  type: "POST",
		  url: "auth.php",
		  data: {"name":name,"password":password},

		}).done(function(msg){
			console.log(msg);
		  	if(msg=="OK"){
		 		$(".dark").show(400);
		 }
		
		});	

	});
	$("#confirm").click(function(){

	$.ajax({
		  type: "POST",
		  url: "../Captcha/is.php",
		  data: {"captch":$("#captch").val()},

		}).done(function(msg){
			console.log(msg);
		  	window.location.href="http://ikonostasik.esy.es/Application/ajaxPR/ajax.php";
		
		});	
	
})
});