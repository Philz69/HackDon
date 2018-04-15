function getGameScore(accountID, callback){
  $.post("php/gameGetScore.php", {"accountID": accountID}, function(response){
    callback(response);
  };
}
