<?php

require_once('../models/db_con.php');

if(isset($_POST['register'])){

    //verification des champs non vide/ si oui on renvoit le msg error 'remplissez tous.....'
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        //$pass = htmlspecialchars($_POST['password']);
        $pass = md5($_POST['password']);

        //  verification de email existant, on recupere d'abord
        $email_result = mysqli_query($db, "SELECT email FROM users WHERE email='$email' /*and password='$pass'*/");

        // ici on compte le result récuperé
        $user_matched = mysqli_num_rows($email_result);

        // If number de user recuperé après le compte est > 0, on signale que email existe déjà dans db, sinon on fait l'insertion, tu peux aussi faire autrement la condition
        if ($user_matched > 0) {
            //$error ='<div class="alert alert-danger">L\'utilisateur existe déjà avec un identifiant '.$email.', merci de ressayer à nouveau...!</div>';
            echo "<script>alert('L\'utilisateur existe déjà avec un identifiant $email , merci de récréer un autre...!')</script>";
        } else {
            // Insertion de donnée dans table user vers la db
            $result = mysqli_query($db, "INSERT INTO users(nom,prenom,email,password) VALUES('$nom','$prenom','$email','$pass')");

            // ici on verifie le result, if c'est $result(c-à-d si l'insertion a été bien faite), si oui on sort le msg de succès sinon on sort le msg de error
            if ($result) {
                echo "<script>alert('Bien ajouté!')</script>";
                //$success = '<div class="alert alert-success">Bien ajouté!</div>';
            } else {
                echo "<script>alert('Erreur d\'inscription, Ressayez')</script>";
                //$error ='<div class="alert alert-danger">Erreur d\'inscription, Ressayez</div>' . mysqli_error($db);
            }
        }
    }else {
        echo "<script>alert('Remplissez tous les champs...!')</script>";
        //$error = '<div class="alert alert-danger">Remplissez tous les champs...!</div>';
    }
}