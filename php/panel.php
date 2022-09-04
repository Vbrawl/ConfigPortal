<?php

session_start();

if(!isset($_SESSION["LOGGED_IN"]) || !isset($_GET["action"]) || !isset($_GET["file"])) {exit(1);}

include "config.php";

if($_SESSION["LOGGED_IN"] == true) {

  if($_GET["action"] == "read_config") {
    readfile($config_paths[(int)$_GET["file"]]);
    exit(0);
  }


  else if($_GET["action"] == "write_config") {
    $file = fopen($config_paths[(int)$_GET["file"]], 'w');
    fwrite($file, file_get_contents("php://input"));
    fclose($file);
    exit(0);
  }




}









 ?>
