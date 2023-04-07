<?php 

	require_once('../models/db_con.php');
	require('../controllers/security.php');
	require('../views/includes/slugify.php');
	// initialize variables
	$nom = "";
	$prenom = "";
	$adresse = "";
	$photo = "";
	$entropot = "";
	$id = 0;
	$update = false;
	//$result = is_uploaded_file($_FILES['fic']['tmp_name']);

	if (isset($_POST['save'])) {

		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['entropot'])) {
            $nom = htmlspecialchars($_POST['nom']);
			$slug = slugify($nom);
            $prenom = htmlspecialchars($_POST['prenom']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $entropot = htmlspecialchars($_POST['entropot']);
			$filename = $_FILES['photo']['name'];

			//  verification de nom existant, on recupere d'abord
			$nom_pren_result = mysqli_query($db, "SELECT nom,prenom FROM agent WHERE nom='$nom' and prenom='$prenom'");
	
			// ici on compte le result récuperé qui est ensuit stocké dans une nouvelle variable
			$agent_matched = mysqli_num_rows($nom_pren_result);
	
			// If number de user recuperé après le compte est > 0, on signale que nom existe sinon on fait l'insertion, tu peux aussi faire autrement
			if ($agent_matched > 0) {
				//echo "<script>alert('L\'agent $nom $prenom existe déjà ,  merci de ressayer à nouveau...!')</script>";
				//echo "<script>alert('Cet agent existe déjà avec un nom $nom $prenom,  merci de ressayer à nouveau...!')</script>";
				$_SESSION['error'] = "$nom $prenom  existe déjà , merci de ressayer à nouveau...!";
				header('location: ../views/agent.php');
			} else {
				if (!empty($filename)) {
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					$new_filename = $slug.'.'.$ext;
					move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/image/'.$new_filename);
				} else {
					$new_filename = '';
				}

				// Insertion de donnée dans table user vers la db
				$result = mysqli_query($db, "INSERT INTO agent (nom,prenom,slug,adresse,photo,idE) VALUES ('$nom','$prenom','$slug','$adresse','$new_filename','$entropot')");

				// ici on verifie le result, if c'est $result on sort un msg de success sinon error
				if ($result) {
					//echo "<script>alert('Bien ajouté!'); window.location = '../views/agent.php'</script>";
					//$_SESSION['message'] = "Bien ajouté!";
					$_SESSION['success'] = "$nom $prenom  a été bien ajouté(e) !";
				//header('location: ../views/agent.php');
				} else {
					//echo "<script>alert('Erreur d\'insertion , Ressayez')</script>";
					//$_SESSION['error'] = "Erreur d'inscription, Ressayez"; //. mysqli_error($mysqli);
					$_SESSION['error'] = "Erreur d'insertion , Ressayez...!";
				}
			}
		}else {
			echo "<script>alert('Remplissez tous les champs...!'); window.location = '../views/agent.php'</script>";
			//$_SESSION['error'] = "Remplissez tous les champs...!";
			$_SESSION['error'] = "Remplissez tous les champs...!";
			header('location: ../views/agent.php');
		}
	}

// action pour le button edit
if (isset($_POST['update'])) {
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['adresse']) and !empty($_POST['entropot'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
		$slug = slugify($nom);
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $filename = $_FILES['photo']['name'];
        $entropot = $_POST['entropot'];

		if (!empty($filename)) {
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $slug.'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../assets/image/'.$new_filename);
		} else {
			$new_filename = '';
		}
		
        $result = mysqli_query($db, "UPDATE agent SET nom='$nom', prenom='$prenom', slug='$slug', adresse='$adresse', photo='$new_filename', idE='$entropot' WHERE id=$id");
		if ($result) {
			//echo "<script>alert('Bien modifié!'); window.location = '../views/agent.php'</script>";
			//$_SESSION['message'] = "Bien modifié!";
			$_SESSION['success'] = "Agent updated successfully!";
        	header('location: ../views/agent.php');
		} else{
			echo "<script>alert('Erreur de modification, Ressayez')</script>";
			//$_SESSION['error'] = "Erreur de modification, Ressayez"; //. mysqli_error($mysqli);
			$_SESSION['success'] = "Agent updated error!";
		}
        
    } else {
		echo "<script>alert('Remplissez tous les champs...!'); window.location = '../views/agent.php'</script>";
        // $_SESSION['error'] = "Remplissez tous les champs...!";
		$_SESSION['error'] = "Remplissez tous les champs...!";
		header('location: ../views/agent.php');
    }
}


// ici est le code de delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$result = mysqli_query($db, "DELETE FROM agent WHERE id = $id");
	if ($result) {
		echo "<script>alert('Bien supprimé!'); window.location = '../views/agent.php'</script>";
		//$_SESSION['message'] = "Bien supprimé!"; 
		//header('location: ../views/agent.php');
	}else{
		echo "<script>alert('Erreur de suppression !'); window.location = '../views/agent.php'</script>";
		//$_SESSION['message'] = "Erreur de suppression !"; 
		//header('location: ../views/agent.php');
	}
				
}
