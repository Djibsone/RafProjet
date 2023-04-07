<?php

require_once('../models/db_con.php');

/*if(isset($_POST['login'])){

    //verification des champs non vide/ si oui on renvoit le msg error 'remplissez tous.....'
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5($_POST['password']);
        //$pass = htmlspecialchars($_POST['password']);

            // verifier if un user existe avec un email & password
            $result = mysqli_query($db, "SELECT * FROM users WHERE email='$email' and password='$pass'");

            // on compte le nombre de user/on lie le retour fait par le query 
            $user_matched = mysqli_num_rows($result);

            // on les info récupérées depuis la db dans une table puis on les passent dans une var($data_db)
            $data_db = mysqli_fetch_array($result);

            // on récupère le nom du user qui se connect
            $nom = $data_db['nom'];
            $prenom = $data_db['prenom'];

            // Vérifier if user correspond/exist, stoker l'email de user en session et rediriger ensuite sur la page menu
            if ($user_matched > 0) {

                if ($result === $email && $result === $pass) {
                    $_SESSION["nom"] = $nom;
                    $_SESSION["prenom"] = $prenom;
                    header("location: views/menu.php");
                }else{
                    //$error = '<div class="alert alert-danger">L\'email ou le mot de passe incorrect</div>';
                    echo "<script>alert('L\'email ou le mot de passe incorrect')</script>";
                }
            } else {
                //$error = '<div class="alert alert-danger">L\'email ou le mot de passe incorrect</div>';
               echo "<script>alert('L\'utilisateur inconu, Veuilez ressayer..!')</script>";
            }

    }else {
        // $error = '<div class="alert alert-danger">Remplissez tous les champs...!</div>';
        echo "<script>alert('Remplissez tous les champs...!')</script>";
    }

}*/

/*
}  else if (($result !== $email && $result !== $pass) || ($result !== $email && $result === $pass) || ($result === $email && $result !== $pass)) {
                echo "<script>alert('L\'email ou le mot de passe incorrect')</script>";
            } else {
                echo "<script>alert('L\'utilisateur inconu, Veuilez ressayer..!')</script>";
            }
*/

/*if(isset($_POST['login'])){

    //verification des champs non vide/ si oui on renvoit le msg error 'remplissez tous.....'
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5($_POST['password']);
        //$pass = htmlspecialchars($_POST['password']);

            // verifier if un user existe avec un email & password
            $result = mysqli_query($db, "SELECT * FROM users WHERE email='$email' and password='$pass'");

            // on compte le nombre de user/on lie le retour fait par le query 
            $user_matched = mysqli_num_rows($result);

            // on les info récupérées depuis la db dans une table puis on les passent dans une var($data_db)
            $data_db = mysqli_fetch_array($result);

            // on récupère le nom du user qui se connect
            $nom = $data_db['nom'];
            $prenom = $data_db['prenom'];

            // Vérifier if user correspond/exist, stoker l'email de user en session et rediriger ensuite sur la page menu
            if ($user_matched > 0) {

                $_SESSION["nom"] = $nom;
                $_SESSION["prenom"] = $prenom;
                header("location: views/menu.php");
                
            }  else if ($email !== $user_matched ) {
                // $error = '<div class="alert alert-danger">'Cet email $email est inconnu, Veuilez ressayer..!</div>';
                echo "<script>alert('Utilisateur inconu, Veuilez ressayer..!')</script>";
                //echo "<script>alert('Cet email $email est inconnu, Veuilez ressayer..!')</script>";
            } else {
                //$error = '<div class="alert alert-danger">L\'email ou le mot de passe incorrect</div>';
                echo "<script>alert('L\'email ou le mot de passe incorrect')</script>";
            }

    }else {
        // $error = '<div class="alert alert-danger">Remplissez tous les champs...!</div>';
        echo "<script>alert('Remplissez tous les champs...!')</script>";
    }

}*/

if(isset($_POST['login'])){

    //verification des champs non vide/ si oui on renvoit le msg error 'remplissez tous.....'
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5($_POST['password']);
        //$pass = htmlspecialchars($_POST['password']);

            // verifier if un user existe avec un email & password
            //$result = mysqli_query($db, "SELECT nom,prenom,email,password FROM users WHERE email='$email' and password='$pass'");
            $result = mysqli_query($db, "SELECT nom,prenom,email,password FROM users WHERE email='$email'");
            
            // on compte le nombre de user/on lie le retour fait par le query 
            $user_matched = mysqli_num_rows($result);

            // on les info récupérées depuis la db dans une table puis on les passent dans une var($data_db)
            $data_db = mysqli_fetch_array($result);

            // on récupère le nom du user qui se connect
            $nom = $data_db['nom'];
            $prenom = $data_db['prenom'];
            $email = $data_db['email'];

            // Vérifier if user correspond/exist, stoker l'email de user en session et rediriger ensuite sur la page menu
            if ($user_matched > 0) {
                if ($email === $data_db['email'] && $pass === $data_db['password']) {
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = 'BIENVENUE '.$_SESSION['nom'].' '.$_SESSION['prenom'];
                    header("location: ../views/menu.php");
                } else{
                    //$error = '<div class="alert alert-danger">L\'email ou le mot de passe incorrect</div>';
                    //echo "<script>alert('L\'email ou le mot de passe incorrect')</script>";
                    $_SESSION['error'] = 'L\'email ou le mot de passe incorrect';
                    header("location: ../");                
                } 
                //header("location: ../views/menu.php");
            } else {
                //echo "<script>alert('Utilisateur inconnu, Veuilez ressayer..!')</script>";   
                $_SESSION['error'] = 'L\'Utilisateur inconnu, Veuilez ressayer..!';
                header("location: ../");
            }

    }else {
        //$error = '<div class="alert alert-danger">Remplissez tous les champs...!</div>';
        //echo "<script>alert('Remplissez tous les champs...!')</script>";
        $_SESSION['error'] = 'Remplissez tous les champs...!';
        header("location: ../");
    }
    //header("location: ../");

}

/* if ($data_db['email'] !== $email) {
                    # code...
                }
            }  else if ($email !== $user_matched ) {
                // $error = '<div class="alert alert-danger">'Cet email $email est inconnu, Veuilez ressayer..!</div>';
                echo "<script>alert('Utilisateur inconu, Veuilez ressayer..!')</script>";
                //echo "<script>alert('Cet email $email est inconnu, Veuilez ressayer..!')</script>"; */