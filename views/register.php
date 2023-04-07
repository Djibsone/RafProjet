<?php require_once("../controllers/registerController.php") ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link rel="stylesheet" href="../assets/css/stylee.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css">
</head>
<body class="register">
  <div class="wrapper">
    <header>Register Form</header>
    <form action="" method="POST">
      <div class="field name">
        <div class="input-area">
          <input type="text" name="nom" placeholder="Name">
          <i class="icon fa fa-user"></i>
          <!-- <i class="error error-icon fa fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Name can't be blank</div>
      </div>
      <div class="field firstname">
        <div class="input-area">
          <input type="text" name="prenom" placeholder="Firstname">
          <i class="icon fa fa-user"></i>
          <!-- <i class="error error-icon fa fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Name can't be blank</div>
      </div>
      <div class="field email">
        <div class="input-area">
          <input type="text" name="email" placeholder="Email Address">
          <i class="icon fa fa-envelope"></i>
          <!-- <i class="error error-icon fa fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="password" placeholder="Password">
          <i class="icon fa fa-lock"></i>
          <!-- <i class="error error-icon fa fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <input type="submit" name="register" value="Register">
    </form>
    <div class="sign-txt">Connecte <a href="../">Log in</a></div>
  </div>

  <script src="Script.js"></script>

</body>
</html>
