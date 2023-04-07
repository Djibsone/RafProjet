<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css">
</head>
<body class="mt-5 img1">
<h2 class="text-warning text-center">
    <?php 
        session_start();
        // echo 'BIENVENUE   '.$_SESSION["nom"].' '.$_SESSION["prenom"];
        //echo 'Bienvenue   '.$_SESSION["prenom"].' '.$_SESSION["nom"];
        //echo '<script>alert("Bienvenue   ".$_SESSION["nom"]." ".$_SESSION["prenom"])</script>';
        
    ?>
</h2>
    <div class="container card">
        <div class="col-md-12">
            
            <div class="mt-2">
                <!-- msg error in success -->
                <?php include 'includes/msg_error_success.php' ?>
            </div>
            
            <!-- header -->
            <?php include 'includes/header.php' ?>

            <!-- page content -->
            <div class="card mb-4 m-5 p-4 ms-5 text-center" style="max-width: 1250px; height: 23rem;">
                <div class="rows g-0 d-flex justify-content-center">
                    <div class="col-md-4">
                        <img src="../assets/image/r.jpg" alt="" style="width: 280px; height: 320px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card" style="color: blue;"> Titre</h5>
                            <p class="card-text">Dolor eirmod diam stet kasd sed.
                                Aliqu rebum est eos. Rebum elitr dolore et eos labore,
                                stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam,
                                Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam,
                                Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam,
                                Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet <!-- eirmod eos labore diam,
                                Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>