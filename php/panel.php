<?php

session_start();

if(!isset($_SESSION["LOGGED_IN"]) || !isset($_GET["action"])) {exit(1);}

include "config.php";

if($_SESSION["LOGGED_IN"] == true) {

  if($_GET["action"] == "read_config") {
    readfile($config_path);
  }





}









 ?>
