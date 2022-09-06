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


  else if($_GET["action"] == "start_program") {
    $file = (int)$_GET["file"]; // Translates to start_program_lines index
    $line = $start_program_lines[$file];
    //shell_exec("nohup $line >/dev/null 2>&1 &"); // UNIX
    pclose(popen("start /B ".$line, 'w')); // Windows
  }

  else if($_GET["action"] == "stop_program") {
    $file = (int)$_GET["file"]; // Translates to stop_program_lines
    $line = $stop_program_lines[$file];
    //shell_exec("nohup $line >/dev/null 2>&1 &"); // UNIX
    pclose(popen("start /B ".$line, 'w')); // Windows
  }

  else if($_GET["action"] == "get_program_status") {
    $file = (int)$_GET["file"]; // Translates to program_status_lines
    $line = $program_status_lines[$file];
    echo exec($line); // BOTH
  }




}









 ?>
