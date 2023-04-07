<?php require_once("../controllers/registerController.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        #err, #addOk{
            display: none;
        }    
    </style>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body class="img">
    <div class="container col-md-4 card mt-4 p-3">
        <h5 class="text-success"><?php if(isset($success)){ echo $success; } ?></h5>
        <h5 class="text-danger"><?php if(isset($error)){ echo $error; } ?></h5>
        <form class="container" method="POST">
            <div class="mb-3">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Nom" onkeyup="this.value=this.value.toUpperCase()">
            </div>
            <div class="mb-3">
                <label for="">Prénom</label>
                <input type="text" class="form-control mjPrenom" name="prenom" placeholder="Prénom">
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="*******">
            </div><br>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
    <div class="container col-md-4 mt-3">
        <h5><a href="../">Connectez-vous</a></h5>
    </div>
    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap.min.js"></script>
    <script  type="text/javascript" src="../app.js"></script>
</body>
</html>