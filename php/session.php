<?php
  session_start();
  if(isset($_SESSION["Id_user"]))
    echo "true";
  else
    echo null;
?>
