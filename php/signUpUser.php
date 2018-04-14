<?php

	//Enregistrement de l'utilisateur
	if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["pwd"]))
	{
		require_once("connexionDb.php");

		$hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

		try{
			$createAccount = $db -> prepare("INSERT INTO accountuser VALUES (DEFAULT,:name,:mail,:pwd,DEFAULT,DEFAULT)");
			$createAccount -> bindValue(":name",$_POST["name"]);
			$createAccount -> bindValue(":mail",$_POST["mail"]);
			$createAccount -> bindValue(":pwd",$hash);

			if(!$createAccount -> execute()){
				throw new PDOException("Can't execute to register".$e -> getMessage());
			}
			else{
				//User's logged in
				echo "Logged in";
			}
		}
		catch(PDOException $e){
			echo "Can't register";
			exit;
		}



	}
?>