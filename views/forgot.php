<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Form</title>
  <link rel="stylesheet" href="../assets/css/stylee.css">
</head>
<body class="forgot">
  <div class="wrapper">
    <!-- msg error in success -->
    <?php include 'includes/msg_error_success.php' ?>

    <header>Forgot Form</header>
    <form action="../controllers/forgotController.php" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="text" name="email" placeholder="Email Address">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="password" placeholder="New Password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <input type="submit" name="validate" value="Validate">
    </form>
    <div class="sign-txt">Your return for login form <a href="../">Log in</a></div>
  </div>

  <script src="Script.js"></script>

</body>
</html>
