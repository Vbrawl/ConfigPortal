<?php
session_start();

if(isset($_SESSION["LOGGED_IN"]) && $_SESSION["LOGGED_IN"] === true) {
  header("Location: /html/panel.php");
  exit(0);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
    <script src="/js/login.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="login-box">

      <div class="password-field">
        <span class="password-field-input-label">Password</span>
        <input class="password-field-input" onfocusout="label_unshow(this, document.getElementsByClassName('password-field-input-label')[0])" onfocus="label_show(document.getElementsByClassName('password-field-input-label')[0])"/>
      </div>

      <div class="login-button" onclick="send_password()">Login</div>


    </div>
  </body>
</html>
