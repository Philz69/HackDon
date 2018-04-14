<?php
	//Inscription des organismes sur le site 

	if(!empty($_POST["name"]) && !empty($_POST["pwd"]) && !empty($_POST["desc"]))
	{
		require_once("connexionDb.php");


?>