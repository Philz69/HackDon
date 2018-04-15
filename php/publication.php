<?php
	//Les organismes peuvent publier ici
	session_start();
	
	if(!empty($_SESSION["Id_org"]) && !empty($_POST["projectID"]) && !empty($_POST["message"]))
	{
		require_once("connectionDb.php");
			$db = connectDb();
			
			try{

				$addPost = $db -> prepare("INSERT INTO publications VALUES (DEFAULT,:orgID,:projectID,:message,NOW())");

				$addPost -> bindValue(":orgID",$_SESSION["Id_org"]);
				$addPost -> bindValue(":projectID",$_POST["projectID"]);
				$addPost -> bindValue(":message",$_POST["message"]);

				if(!$addPost -> execute()){
					throw new PDOException("Can't post".$e -> getMessage());
				}
				else{
					//Le post vient d'être fait
				}

			}
			catch(PDOException $e){
				echo "Can't post".$e > getMessage();
			}
	}
?>