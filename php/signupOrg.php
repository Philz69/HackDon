<?php
	//Inscription des organismes sur le site

	if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["pwd"]))
	{
		require_once("connectionDb.php");
		$db = connectDb();

		$hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

		try{
			$createAccount = $db -> prepare("INSERT INTO accountOrganisation VALUES (DEFAULT,:name,:mail,:pwd,:description,:banner,:code,NOW())");
			$createAccount -> bindValue(":name",$_POST["name"]);
			$createAccount -> bindValue(":mail",$_POST["mail"]);
			$createAccount -> bindValue(":pwd",$hash);
			$createAccount -> bindValue(":code",hash('sha256', $_POST["name"]));
			$createAccount -> bindValue(":description","Desc temporaire");
			$createAccount -> bindValue(":banner","jhasdkjasd");

			if(!$createAccount -> execute()){
				throw new PDOException("Can't execute to register".$e -> getMessage());
			}
			else{

				echo "Account created";
			}
		}
		catch(PDOException $e){
			echo "Can't register".$e-> getMessage();
			exit;
		}



	}
?>
