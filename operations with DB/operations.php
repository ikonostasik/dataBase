<?php 
		$FIO = $_GET['FIO'];
	    $Url = $_GET['Url'];
		$id = $_GET['id'];
		$ids = $_GET['id'];
		
		public static function add(){
			
		}
		
		public static function del() {
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
		
		public static function up(){
			
		}
		
		public static function stas() {
			
		}
	
?>