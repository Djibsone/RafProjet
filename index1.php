<?php require_once('controllers/indexController.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="container col-md-4 card mt-4 p-3">
        <div>
            <h5 class="text-danger"><?php if(isset($error)){ echo $error; } ?></h5>
        </div>
        <form class="container" method="post">
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="********">
            </div><br>
                <button type="submit" class="btn btn-primary" name="login">Log in</button>
        </form>
    </div>
    <div class="container col-md-4 mt-3">
        <h5><a href="views/register.php">Avez-vous un compte?</a></h5>
    </div>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script  type="text/javascript" src="assets/js/scripts.js"></script>
</body>
</html>