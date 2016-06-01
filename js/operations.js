$(document).ready(function(){
			$('.fa-plus-square').click(function(){
				$('table').append(
				"<tr> <td><button clas='conf' onclick='stasik()'><i class='fa fa-check'></i></button></td> <td class='update' id={$row[id]}><button>&#1048;&#1079;&#1084;&#1077;&#1085;&#1080;&#1090;&#1100;</button></td>" +
				"<td class='del'><button>&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100;</button></td> <td><input readonly value = 'id'></td>" +
				"<td><input id='FIO'></td><td><input id='Url'></td> <td><input readonly value = 'time'></td></tr> ");
				console.log(1)
			});
		})
			
			
			$('.update').click(function(){
				var id = $(this).attr('id')
				var FIO = $(this).next().next().next().children().val();
				var url = $(this).next().next().next().next().children().val();
				$.get("../session/update.php?id=" + id +"&FIO="+FIO+"&url="+url, function(data){
				});
                                alert("Изменения вступили в силу");
				$('.right').load('../bdPHP/display.php');
					})
				
			$(".del").click(function(){
				var id = $(this).next().children().val();
					if(confirm("Подтвердите удаление"))
					{
				$.get("../session/test.php?id=" + id, function(data){
				});				
					}
				$('.right').load('../bdPHP/display.php');	
			});	
			

		function stasik(){
				var FIO = document.getElementById('FIO').value;
				var Url = document.getElementById('Url').value;
				var request = new XMLHttpRequest();
				var url = "../bdPHP/operations.php?FIO="+ FIO + "&Url=" +Url + "&action=add";
				console.log(url);
				request.onreadystatechange = showAsc;
				request.open("GET",url,true);
				request.send(null);			
				function showAsc(){
					$('.right').load('../bdPHP/display.php');
			}
		}
				
			
		//&#1095;&#1090;&#1086; &#1090;&#1086; JavaScript
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