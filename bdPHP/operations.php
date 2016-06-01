<?php 
		require('../Classes/connect.php');
		$FIO = $_GET['FIO'];
	    $Url = $_GET['Url'];
		$id = $_GET['id'];
		$ids = $_GET['ids'];
		$action = $_GET['action'];

		$dbh = Connection::getInstance()->connect();
				
		
		
		switch($action) {
			case "del": 
				del($id,$ids,$dbh);
				break;
			case "up": 
				up($FIO,$url,$id,$ids,$dbh);
				break;
			case "add":
				
				add($FIO,$Url,$dbh);
				break;
			default:
				printf("ERROR in action");
				break;
			

		}
		 function add($FIO,$Url,$dbh){
					$sql = "INSERT INTO `u533224130_stas`.`Users` (`FIO`, `url_to_blog`) VALUES ('{$FIO}','{$Url}');";
					echo $sql;
					echo $action;
					$result = $dbh->query($sql)or die("ERROR: ".mysql_error());	
							}
		

		 function del($id,$ids,$dbh) {
						if (!empty($id)){
					$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$id}";
					
					$result = $dbh->query($sql)or die("ERROR: ".mysql_error());
					}
					else {
						$arr = explode(",", $ids);
						for($i = 0;$i<count($arr);$i++){
								$sql =  " DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$arr[$i]}";
								$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
					
					}
			}
		}

		 function up($FIO,$url,$id,$ids,$dbh){
			if(!empty($id)){
							//UPDATE "group" SET group_name = "Unicornsss", date_of_creation = "2014-02-01" WHERE  "id" = 1
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$FIO}', `url_to_blog` = '{$url}' WHERE `Users`.`id`={$id}";
							echo $sql;
							sleep(3);
							$result = $dbh->query($sql)or die("ERROR: ".mysql_error());
						}
		
		else{
						$arrId = explode(",", $ids);
						$arrFio = explode(",", $FIO);
						$arrUrl = explode(",", $url);
						
						for($i = 0;$i<count($arrId);$i++){
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$arrFio[$i]}', `url_to_blog` = '{$arrUrl[$i]}' WHERE `Users`.`id`={$arrId[$i]}";
							$result = $dbh->query($sql)or die("ERROR: ".mysql_error());
						}
		}
		}
		
	
?>