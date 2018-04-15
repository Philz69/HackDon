<?php
	function connectDB(){
		try{

			$db = new PDO("mysql:host=localhost;dbname=hackDon","root","taldna14",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		}catch(PDOexception $e){
			die("Can't reach db");
		}

		return $db;
	}
?>
