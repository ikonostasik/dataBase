
		
		function del_all(){
				var id = [];
				var i = 0;
				$('.check:checked').each(function(){
					id[i++] = $(this).parent().next().next().next().children().val();
					
					})
					if(confirm("Подтвердите удаление")) {
								$.get("../session/test.php?ids="+id,function(data){
									console.log(data);
								})
								alert("&#1059;&#1076;&#1072;&#1083;&#1077;&#1085;&#1080;&#1077; &#1087;&#1088;&#1086;&#1096;&#1083;&#1086; &#1091;&#1089;&#1087;&#1077;&#1096;&#1085;&#1086;");
								$('.right').load('../bdPHP/display.php');	
				}
		}
		
		
		function chng_all(){
			var ids = [];
			var FIO = []; 
			var Url = [];
				var i = 0; 
				$('.check:checked').each(function(){
					ids[i] = FIO[i] = $(this).parent().next().next().next().children().val();
					FIO[i] = $(this).parent().next().next().next().next().children().val();
					Url[i++] = $(this).parent().next().next().next().next().next().children().val();
					})
					if(confirm("Подтвердите Изменение")){
								$.get("../session/update.php?ids="+ids+"&FIO="+FIO+"&url="+Url,function(data){
									console.log(data);
								})
								alert("Изменения вступили в силу!");
								$('.right').load('../bdPHP/display.php');	
					}
					
		}