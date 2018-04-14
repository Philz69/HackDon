<?php
	//Connexion de l'organisme
	if(!empty($_POST["mail"]) && !empty($_POST["pwd"]))
	{
		require_once("connectionDb.php");
		$db = connectDb();
		
		try{
			$connectOrg = $db -> prepare("SELECT Id,passwordHash FROM accountorganisation WHERE email = :mail");
			$connectOrg -> bindValue(":mail",$_POST["mail"]);

			if(!$connectOrg -> execute()){
				throw new PDOException(": ".$e -> getMessage());
			}
			else{
				$connectInfos = $connectOrg -> fetch();

				if(password_verify($_POST["pwd"],$connectInfos["passwordHash"])){//User's connected
					$_SESSION["Id_org"] = $connectInfos["Id"];
				}
				else{//Connection didn't work
					echo "Wrong mail/password";
				}	
			}


		}
		catch(PDOException $e){
			echo "Can't connect";
		}
	}
?>