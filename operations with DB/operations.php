<?php 
		$FIO = $_GET['FIO'];
	    $Url = $_GET['Url'];
		$id = $_GET['id'];
		$ids = $_GET['id'];
		$action = $GET['action'];

		switch(action) {
			case "del": 
				del();
				break;
			case "up": 
				up();
				break;
			case "add":
				add();
				break;
			default:
				printf("ERROR");
			

		}
		 function add(){
					$sql = "INSERT INTO `u533224130_stas`.`Users` (`FIO`, `url_to_blog`) VALUES ('{$FIO}','{$Url}');";
					echo $sql;
					$result = $conn -> query($sql)or die("ERROR: ".mysql_error());	
							}
		

		 function del() {
						if (!empty($id)){
					$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$id}";
					
					$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
					}
					else {
						$arr = explode(",", $ids);
						for($i = 0;$i<count($arr);$i++){
								$sql =  " DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$arr[$i]}";
								$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
					
					}
			}
		}

		 function up(){
			if(!empty($id)){
							//UPDATE "group" SET group_name = "Unicornsss", date_of_creation = "2014-02-01" WHERE  "id" = 1
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$FIO}', `url_to_blog` = '{$url}' WHERE `Users`.`id`={$id}";
							echo $sql;
							sleep(3);
							$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
						}
		
		else{
						$arrId = explode(",", $ids);
						$arrFio = explode(",", $FIO);
						$arrUrl = explode(",", $url);
						
						for($i = 0;$i<count($arrId);$i++){
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$arrFio[$i]}', `url_to_blog` = '{$arrUrl[$i]}' WHERE `Users`.`id`={$arrId[$i]}";
							$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
						}
		}
		}
		
	
?>