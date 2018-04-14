<?php
  require_once("connectionDb.php");

  function checkForNotifications($accountID){
    $data = array();
    $i=0;

    $db = connectDB();
    foreach($db->query("SELECT projectID, name, content FROM notifications INNER JOIN project ON notifications.projectID = project.ID WHERE accountID=$accountID && isSeen=FALSE;") as $row){
      $data[i] = array('projectID' => $row['projectID'],
                       'projectName' => $row['name'],
                       'content' => $row['content']);
      ++$i;
    }
    $db = null;
  }

  echo json_encode($data);
  checkForNotifications($_GET["accountID"]);
?>
