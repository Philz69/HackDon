var notifInterval;
function activateNotificationsService(accountID){
  var notifAlert = new Audio('res/Bell.mp3');

  notifInterval = setInterval(function(){
    $.post("php/checkForNotifications.php",
    {"accountID": accountID},
    function(data){
      var notifications = JSON.parse(data);

      for(var key in notifications){
        $("#notifications").append('<div style="width: 250px;">\
                                      <span>Projet: ' + notifications[key].projectName + '<span>\
                                      <br />\
                                      <span>Message: '+ notifications[key].content + '</span>\
                                    </div>');

       $("#notifCount").html(Number.parseInt($("#notifCount").html()) + 1);

       notifAlert.play();
     }
    });
  }, 10000);
}
function disableNotifService(){
  clearInterval(notifInterval);
}

function sendNotification(accountID, projectID, message){
  $.post("php/sendNotifications.php", {
    "accountID": accountID,
    "projectID": projectID,
    "content": message
  });
}
