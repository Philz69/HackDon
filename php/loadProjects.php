<?php

	//Charge tout les projets d'un organisme dans des <option>
	function loadProjects(){

		if(!empty($_SESSION["Id_org"])){
			require_once("connectionDb.php");
			$db = connectDb();
			
			
			try{
				$loadProjects = $db -> prepare("SELECT ID,name FROM project WHERE organisationID = :IDOrg");
				$loadProjects -> bindValue(":IDOrg",$_SESSION["Id_org"]);
				
				if(!$loadProjects -> execute()){
					throw new PDOException("Can't load projects".$e -> getMessage());
				}
				else{	
					echo "<select id='selectProject'>";

					while($projects = $loadProjects -> fetch())
					{	
						echo "<option value='".$projects["ID"]."'>".$projects["name"]."</option>";
					}

					echo "</select>";
				}
			}
			catch(PDOException $e){
				echo "Can't load projects".$e -> getMessage();
			}

		}
	}



?>