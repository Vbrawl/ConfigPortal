<?php
session_start();
if(!isset($_SESSION["LOGGED_IN"]) || $_SESSION["LOGGED_IN"] !== true) {
  header("Location: /html/login.php");
  exit(1);
}

include "../php/config.php";
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

    <select id="config-selector" onchange="add_raw_edit();">
      <?php

      for($i = 0; $i < count($config_paths); $i++) {
        echo "<option value=\"$i\">$config_paths[$i]</option>";
      }

      ?>
    </select>

    <div id="dynamic"></div>
    <div class="Save Button" onclick="send_changes();">Save</div>
  </body>
</html>
