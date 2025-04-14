<?php 
	try {
		$conn = new PDO('mysql:host=10.10.100.202;dbname=ordercert','ordercertUser','Te@cher!');	
	} catch (PDOException $e) {
		echo 'ОШИБКА'.$e->getMessage()."<br />";
	}
?>