<?php
  require_once("connectionDb.php");

  function addScore($accountID, $donationAmount){
    if($accountID!=null && $donationAmount!=null){
      $accountID = (int)$accountID;

      $db = connectDB();

      $result = $db->query("SELECT COUNT(ID) AS count, SUM(amount) AS sum FROM donations WHERE accountID=$accountID;")->fetch(PDO::FETCH_ASSOC);
      $nbDonations = $result["count"];
      $totalAmount = $result["sum"];

      //Calcul du score
      $score = (int)(($totalAmount/log($totalAmount, 10)) + ($nbDonations*5) + (log($donationAmount, 10)*100));

      $query_score = $db->prepare("UPDATE accountUser SET Score= Score + :score WHERE ID=:accountID;");
      $query_score->bindParam(":accountID", $accountID);
      $query_score->bindParam(":score", $score);
      $query_score->execute();

      $db=null;
    }
  }

  addScore($_GET["accountID"], $_GET["amount"]);
?>
