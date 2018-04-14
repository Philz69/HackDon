<?php
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
				//Le don a fonctionner
			}
		}
		catch(PDOException $e){
			echo "Can't connect".$e -> getMessage();
		}
	}

?>