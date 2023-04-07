<?php

require_once('../models/db_con.php');
require('../controllers/security.php');


if(isset($_POST['validate'])){

    //verification des champs non vide/ si oui on renvoit le msg error 'remplissez tous.....'
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5($_POST['password']);
        //$pass = htmlspecialchars($_POST['password']);

            // verifier if un user existe avec un email & password
            //$result = mysqli_query($db, "SELECT nom,prenom,email,password FROM users WHERE email='$email' and password='$pass'");
            $result = mysqli_query($db, "SELECT email FROM users WHERE email='$email'");
            
            // on compte le nombre de user/on lie le retour fait par le query 
            $user_matched = mysqli_num_rows($result);

            // on les info récupérées depuis la db dans une table puis on les passent dans une var($data_db)
            $data_db = mysqli_fetch_array($result);

            // Vérifier if user correspond/exist, stoker l'email de user en session et rediriger ensuite sur la page menu
            if ($user_matched > 0) {
                if ($email === $data_db['email']) {
                    mysqli_query($db, "UPDATE users SET password='$pass' WHERE email='$email'");
                    //echo "<script>alert('Bien modifier!')</script>";
                    $_SESSION['error'] = 'La réinitialisation du mot de passe réçue avec succès !';
                    
                    header("location: ../");
                } else{
                    //$error = '<div class="alert alert-danger">L\'email ou le mot de passe incorrect</div>';
                    echo "<script>alert('L\'email entré est incorrect , veuilez ressayer..!')</script>";
                } 
                
            } else {
                echo "<script>alert('Utilisateur inconnu, Veuilez ressayer..!')</script>";   
            }

    }else {
        // $error = '<div class="alert alert-danger">Remplissez tous les champs...!</div>';
        echo "<script>alert('Remplissez tous les champs...!')</script>";
    }

}