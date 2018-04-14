<?php
  require_once("connectionDb.php");

  function checkForNotifications($accountID){
    if($accountID != null){
      $accountID = (int)$accountID;

      $data = array();
      $i=0;

      $db = connectDB();

      $notifID = 0;
      $fetchStatement = $db->prepare("UPDATE notifications SET isFetched=TRUE WHERE ID=:id");
      $fetchStatement->bindParam("id", $notifID);

      foreach($db->query("SELECT notifications.ID, projectID, name, content FROM notifications INNER JOIN project ON notifications.projectID = project.ID WHERE accountID=$accountID && isFetched=FALSE;") as $row){
        $data[$i] = ['projectID' => $row['projectID'],
                         'projectName' => $row['name'],
                         'content' => $row['content']
                       ];
        ++$i;

        $notifID = $row["ID"];
        $fetchStatement->execute();
      }
      $db = null;
      return $data;
    }
  }

  echo json_encode(checkForNotifications($_POST["accountID"]));
?>
