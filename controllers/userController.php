<?php

require_once('../models/db_con.php');
require('../controllers/security.php');


// if (isset($_POST['update'])) {
//     $id = $_POST['id'];
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $email = $_POST['email'];
//     $password = md5($_POST['password']);

// 	$result = mysqli_query($db, "UPDATE users SET nom='$nom', prenom='$prenom', email='$email', password='$password' WHERE id=$id");
// 	if ($result) {
// 		$_SESSION['message'] = "Bien modifié!"; 
// 		header('location: ../views/user.php');
// 	}else{
// 		echo "<script>alert('Erreur de modification !')</script>";
// 	}
	
// }


//if (isset($_POST['update'])) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "UPDATE `users` SET `nom`='$nom',`prenom`='$prenom',`email`='$email',`password`='$password' WHERE id = '$id'";
		if (mysqli_query($db, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
		mysqli_close($db);
	}
//}

// action pour le button delete
// if (isset($_GET['del'])) {
// 	$id = $_GET['del'];
// 	mysqli_query($db, "DELETE FROM users WHERE id=$id");
// 	$_SESSION['message'] = "Bien supprimé!"; 
// 	header('location: ../views/user.php');
// }