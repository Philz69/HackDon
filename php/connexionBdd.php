<?php
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=hackDon","root","root",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOexception $e){
		throw new PDOException("Connexion à la BDD impossible.".$e -> getMessage());
		
	}
?>