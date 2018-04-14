<?php
	//Inscription des organismes sur le site 

	if(!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["pwd"]) && !empty($_POST["description"]))
	{
		require_once("connexionDb.php");

		$hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

		try{
			$createAccount = $db -> prepare("INSERT INTO accountorganisation VALUES (DEFAULT,:name,:mail,:pwd,:description,DEFAULT,DEFAULT,DEFAULT)");
			$createAccount -> bindValue(":name",$_POST["name"]);
			$createAccount -> bindValue(":mail",$_POST["mail"]);
			$createAccount -> bindValue(":pwd",$hash);
			$createAccount -> bindValue(":description",$_POST["description"]);

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