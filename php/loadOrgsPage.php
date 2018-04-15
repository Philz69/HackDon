<?php
  require_once("connectionDb.php");

  function setOrganisationsPage(){
    $db = connectDb();

    $data = array();
    $i=0;
    foreach($db->query("SELECT ID, name, description, bannerImg, code FROM accountOrganisation;") as $row){

      $projects = $db->query("SELECT name, description, objective FROM project WHERE organisationID=".$row['ID']." && isCompleted=FALSE LIMIT 2;")->fetchAll(PDO::FETCH_ASSOC);

      $data[$i] = [
        "name"=>$row["name"],
        "description"=>$row["description"],
        "img"=>$row["bannerImg"],
        "code"=>$row["code"],
        "projects"=> $projects
      ];

      ++$i;
    }

    echo json_encode($data);
  }

  setOrganisationsPage();
?>
