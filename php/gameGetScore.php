<?php
  require_once("connectionDb.php");

  function getScore($accountID){
      if($accountID != null){
        $db = connectDB();
        $score = $db->query("SELECT score FROM accountUser WHERE ID=$accountID;")->fetch(PDO::FETCH_ASSOC);

        return (int)$score['score'];
      }
  }

  echo getScore($_POST["accountID"]);

?>
