$(document).ready(function(){
  window.isConnected=false;
  $.post("php/session.php", function(result){
    alert(result);
    if(result !== null && result.trim() !== ""){
      window.isConnected=true;
    }
  });
});
