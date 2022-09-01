<?php
session_start();

if(!isset($_GET["action"])) {exit(1);}


if($_GET["action"] == "authenticate") {
  include "config.php";

  function GetJsonResponse()
  {
    return json_decode(file_get_contents("php://input"), true);
  }

  $resp = array("status" => "Failed");
  if($password == GetJsonResponse()["password"]) {
    $_SESSION["LOGGED_IN"] = true;
    $resp["status"] = "Success";
  }

  echo json_encode($resp);
}
else if($_GET["action"] == "sessionend") {
  $_SESSION["LOGGED_IN"] = false;
}





 ?>
