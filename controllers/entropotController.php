<?php 

	require_once('../models/db_con.php');
	require('../controllers/security.php');

	// initialize variables
	$code = "";
	$libelle = "";
	$adresse = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {

		if (!empty($_POST['code']) AND !empty($_POST['libelle']) AND !empty($_POST['adresse'])) {
            $code = htmlspecialchars($_POST['code']);
            $libelle = htmlspecialchars($_POST['libelle']);
            $adresse = htmlspecialchars($_POST['adresse']);
			
			//  verification du code existant, on récupere d'abord
			$cod_lib_result = mysqli_query($db, "SELECT code,libelle FROM entropot WHERE code='$code' and libelle='$libelle'");
	
			// ici on compte le result récuperé
			$entropot_matched = mysqli_num_rows($cod_lib_result);
	
			// If number de user recuperé après le compte est > 0, on signale que code existe sinon on fait l'insertion, tu peux aussi faire autrement
			if ($entropot_matched > 0) {
				echo "<script>alert('L\'entropot $libelle existe déjà ,  merci de ressayer à nouveau...!')</script>";
				//$_SESSION['error'] = "Cet entropot existe déjà avec un code $code, merci de ressayer à nouveau...!";
			} else {
				// Insertion de donnée dans table user vers la db
				$result = mysqli_query($db, "INSERT INTO entropot (code,libelle,adresse) VALUES ('$code','$libelle','$adresse')");
				
				// ici on verifie le result, if c'est $result on sort un msg de success sinon error
				if ($result) {
					echo "<script>alert('Bien ajouté!'); window.location = '../views/entropot.php'</script";
					//$_SESSION['message'] = "Bien ajouté!";
					//header('location: ../views/entropot.php'); 
				} else {
					echo "<script>alert('Erreur d\'insertion , Ressayez')</script>";
					//$_SESSION['error'] = "Erreur d'inscription, Ressayez"; //. mysqli_error($mysqli);
				}
			}
		}else {
			echo "<script>alert('Remplissez tous les champs...!'); window.location = '../views/entropot.php'</script>";
			//$_SESSION['error'] = "Remplissez tous les champs...!";
		}
	}

// ...modification
if (isset($_POST['update'])) {
	if (!empty($_POST['code']) AND !empty($_POST['libelle']) AND !empty($_POST['adresse'])) {
		$id = $_POST['id'];
		$code = $_POST['code'];
		$libelle = $_POST['libelle'];
		$adresse = $_POST['adresse'];

		$result = mysqli_query($db, "UPDATE entropot SET code='$code', libelle='$libelle', adresse='$adresse' WHERE idE=$id");
		if ($result) {
			echo "<script>alert('Bien modifié!'); window.location = '../views/entropot.php'</script>";
			// $_SESSION['message'] = "Bien modifié!";
			//header('location: ../views/entropot.php');
		} else{
			echo "<script>alert('Erreur de modification, Ressayez')</script>";
			//$_SESSION['error'] = "Erreur de modification, Ressayez"; //. mysqli_error($mysqli);
		}
	
	} else {
		echo "<script>alert('Remplissez tous les champs...!')</script>";
		//$_SESSION['error'] = "Remplissez tous les champs...!";
		//header('location: ../views/entropot.php');
	}
}

// ici est le code de delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$result = mysqli_query($db, "DELETE FROM entropot WHERE idE=$id");
	if ($result) {
		echo "<script>alert('Bien supprimé!'); window.location = '../views/entropot.php'</script>";
		//$_SESSION['message'] = "Bien supprimé!"; 
		//header('location: ../views/entropot.php');
	}else{
		echo "<script>alert('Impossible de supprimer ! , car cet entropot contient des agents'); window.location = '../views/entropot.php'</script>";
		//$_SESSION['message'] = "Impossible de supprimer ! , car cet entropot contient des agents"; 
		//header('location: ../views/entropot.php');
	}
				
}
