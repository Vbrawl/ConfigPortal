<?php
session_start();
if(!isset($_SESSION["LOGGED_IN"]) || $_SESSION["LOGGED_IN"] !== true) {
  header("Location: /html/login.php");
  exit(1);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
    <title>Config Panel</title>
    <link rel="stylesheet" href="/css/panel.css">
    <script src="/js/panel.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="Logout Button" onclick="logout();">Logout</div>
    <div id="dynamic"></div>
    <div class="Save Button" onclick="send_changes();">Save</div>
  </body>
</html>
