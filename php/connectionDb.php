<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=hackDon","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOexception $e){
		echo "Can't reach db";
		
	}
?>