<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=hackdon","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOException $e){
		echo "Can't reach db";
		
	}
?>