<?php
	require_once("connectionDb.php");

	function sendNotification($accountID, $projectID, $content){
		$db = connectDB();
		$query = $db->prepare("INSERT INTO notifications(accountID, projectID, content) VALUES(:accountID, :projectID, :notification);");
		$query->bindParam(":accountID", $accountID);
		$query->bindParam(":projectID", $projectID);
		$query->bindParam(":notification", $content);

		$query->execute();

		$db = null;
	}

	//Ajouter la notification
	sendNotification($POST["accountID"], $POST["projectID"], $POST["content"]);
?>
