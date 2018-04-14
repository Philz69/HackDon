<?php
	//Publie l'update du sujet fait par l'organisme
	session_start();

	if(!empty($_SESSION["Id_org"]) && !empty($_POST["projectID"]) && !empty($_POST["message"])){
		
		require_once("connectionDb.php");
		$db = connectDb();
		
		
		try{
			$postUpdate = $db -> prepare("INSERT INTO Publications VALUES (DEFAULT,:Id_org,:projectID,:message,NOW())");
			$postUpdate -> bindValue(":Id_org",$_SESSION["Id_org"]);
			$postUpdate -> bindValue(":projectID",$_POST["projectID"]);
			$postUpdate -> bindValue(":message",$_POST["message"]);


			if(!$postUpdate -> execute()){
				throw new PDOException("Can't post".$e -> getMessage());
			}
			else{	
				//Le post a été publié
			}
		}
		catch(PDOException $e){
			echo "Can't post".$e -> getMessage();
		}
		}
	
?>