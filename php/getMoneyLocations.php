<?php
  require_once("connectionDb.php");

  function getMoneyLocations($projectID){
    $db = connectDB();
    return $db->query("SELECT ID, address, latlng FROM moneyLocations WHERE projectID=$projectID;")->fetchAll(PDO::FETCH_ASSOC);
  }

  echo json_encode(getMoneyLocations($_POST["projectID"]));
?>
