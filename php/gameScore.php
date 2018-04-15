<?php
  require_once("connectionDb.php");

  function addScore($accountID, $donationAmount){
    if($accountID!=null){
      $accountID = (int)$accountID;

      $db = connectDB();

      $result = $db->query("SELECT COUNT(ID), SUM() FROM donations WHERE accountID=$accountID;")[0];
      $nbDonations = $result[0];
      $totalAmount = $result[1];

      //Calcul du score
      $score = (int)(($totalAmount/log($totalAmount, 10)) + ($nbDonations*5) + (log($donationAmount, 10)*100));
echo $score;

      $query_score = $db->prepare("UPDATE accountUser SET Score=:score WHERE ID=:accountID;");
      $query_score.bindParam(":accountID", $accountID);
      $query_score.bindParam(":score", $score);
      $query_score->execute();

      $db=null;
    }
  }

  addScore($_GET["accountID"], $_GET["amount"]);
?>
