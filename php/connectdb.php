<?php 
	try {
		$conn = new PDO('mysql:host=#;dbname=#','ordercertUser','#');	
	} catch (PDOException $e) {
		echo 'ОШИБКА'.$e->getMessage()."<br />";
	}
?>