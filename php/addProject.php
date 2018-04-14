<?php
	session_start();
	//Permet à l'organisation de crée un nouveau projet
	if(!empty($_SESSION["Id_org"]) && !empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["objective"]) && !empty($_POST["amountWanted"]))
	{
		include_once("connectionDb.php");
		$db = connectDB();

		try{
			$createProject = $db -> prepare("INSERT INTO project VALUES (DEFAULT,:id_org,:name,:description,:objective,:amountWanted,DEFAULT,DEFAULT,NOW())");

			$createProject -> bindValue(":id_org",$_SESSION["Id_org"]);
			$createProject -> bindValue(":name",$_POST["name"]);
			$createProject -> bindValue(":description",$_POST["description"]);
			$createProject -> bindValue(":objective",$_POST["objective"]);
			$createProject -> bindValue(":amountWanted",$_POST["amountWanted"]);

			if(!$createProject -> execute()){
				throw new PDOException(":".$e -> getMessage());
			}
			else{
				echo "Project created";
			}

		}
		catch(PDOException $e){
			echo "Can't insert a new project";
			
		}
		

	}
?>