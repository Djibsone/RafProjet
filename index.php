<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/stylee.css">
</head>
<body class="login">
  <div class="wrapper">
    <div>
        <?php session_start(); include 'views/includes/msg_error_success.php' ?>
    </div>
    <?= date('Y-m-d H:i:s') ?>
    <!-- <?php echo date('\N\o\u\s \s\o\m\m\e\s \l\e d-m-Y \à H:i:s') ?> -->
    <header>Login Form</header>
    <form action="controllers/indexController.php" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="text" name="email" placeholder="Email Address">
          <i class="icon fa fa-envelope"></i>
          <!-- <i class="error error-icon fas fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" name="password" placeholder="Password">
          <i class="icon fa fa-lock"></i>
          <!-- <i class="error error-icon fas fa-exclamation-circle"></i> -->
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <input type="submit" name="login" value="Log in">
    </form>
    <div class="pass-txt"><a href="views/forgot.php">Forgot password?</a></div>
    <div class="sign-txt">Your are a member? <a href="views/register.php">Regiter</a></div>
  </div>

  <script src="script.js"></script>

</body>
</html>
