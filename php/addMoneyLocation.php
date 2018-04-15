<?php
  require_once("connectionDb.php");

  function addMoneyLocation($projectID, $address, $latlng){
    if($projectID != null && $address !=null && $latlng!=null){
      $projectID = (int)$projectID;

      $db = connectDB();
      $query_loc = $db->prepare("INSERT INTO moneyLocations(projectID, address, latlng) VALUES(:projectID, :address, :latlng)");

      $query_loc->bindParam(":projectID", $projectID);
      $query_loc->bindParam(":address", $address);
      $query_loc->bindParam(":latlng", $latlng);

      $query_loc->execute();
    }
  }

  addMoneyLocation($_POST["projectID"], $_POST["address"], $_POST["latlng"]);
?>
