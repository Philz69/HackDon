<?php
	require_once("gameScore.php");

	//Ajoute un dons à une certaine fondation/projet
	session_start();

	if(!empty($_POST["amountDon"]) && !empty($_POST["projectID"]))
	{
		require_once("connectionDb.php");
		$db = connectDb();

		try{
			$addDon = $db -> prepare("INSERT INTO donations VALUES (DEFAULT,:accountID,:projectID,:amount,NOW())");

			if(!empty($_SESSION["Id_user"])){
				$user = $_SESSION["Id_user"];
			}else{
				$user = null;
			}

			$addDon -> bindValue(":accountID",$user);
			$addDon -> bindValue(":projectID",$_POST["projectID"]);
			$addDon -> bindValue(":amount",$_POST["amountDon"]);

			if(!$addDon -> execute()){
				throw new PDOException("Can't donate".$e -> getMessage());

			}
			else{
				//Le don a fonctionner donc on l'ajoute également au amountCollected du projet
				$updateProject = $db -> prepare("UPDATE project SET amountCollected = amountCollected + :dons WHERE Id = :id");
				$updateProject -> bindValue(":dons",$_POST["amountDon"]);
				$updateProject -> bindValue(":id",$_POST["projectID"]); //Project ID correspond à l'ID unique du projet dans la table project

				if(!$updateProject -> execute()){
					throw new PDOException("Can't add the donation".$e -> getMessage());
				}
				else{
					//Le don a été ajouté au projet
					echo "Thanks!";
				}


			}
		}
		catch(PDOException $e){
			echo "Can't connect".$e -> getMessage();
		}

		addScore($user, $_POST["amountDon"]);
	}
?>
