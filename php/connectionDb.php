<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=hackDon","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOexception $e){
		throw new PDOException("Can't reach de Db".$e -> getMessage());
		
	}
?>