<?php 
    include '../controllers/agentController.php';

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM agent WHERE id=$id");
        $records = mysqli_num_rows($record);
		if ($records == 1 ) {
			$n = mysqli_fetch_array($record);
			$nom = $n['nom'];
			$prenom = $n['prenom'];
			$adresse = $n['adresse'];
			$photo = $n['photo'];
			$entropot = $n['idE'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agent</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css">
</head>
<body>

<!-- message de success et error -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="msg">
            <?php include 'msg_error_success.php' ?>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="err">
            <?php include 'msg_error_success.php' ?>
        </div>
    <?php endif ?>
                       
    <!-- formulaire d'inscription -->
	<form method="post" action="../controllers/agentController.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="input-group">
			<label>Nom</label>
			<input type="text" name="nom" value="<?php echo $nom ?>" onkeyup="this.value=this.value.toUpperCase()">
		</div>
		<div class="input-group">
			<label>Prénom</label>
			<input type="text" name="prenom" value="<?php echo $prenom ?>">
		</div>
		<div class="input-group">
			<label>Adresse</label>
			<input type="text" name="adresse" value="<?php echo $adresse ?>">
		</div>
		<div class="input-group">
			<label>Photo</label>
			<input type="file" name="photo" value="<?php echo $photo ?>">
		</div>
        <div class="input-group">
            <label class="form-control">Entropot</label>
                <select name="entropot">
                <option value="">Select entropot</option>
                <?php $result = mysqli_query($db, "SELECT * FROM entropot"); ?>
                    <?php
                     while ($row = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row['idE'] ?>"><?= $row['libelle'] ?></option>
                <?php  } 
                    ?>
            </select>
		</div>
		<div class="input-group">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" title="Update"><i class="fa fa-save"> Update</i></button>
            <?php else: ?>
                <button class="btn" type="submit" name="save" title="Add"><i class="fa fa-plus"> Add</i></button>
            <?php endif ?>
		</div>
        <h4><a href="menu.php">Allez au menu</a></h4>
	</form>

<!-- table d'affichage de data -->
<!-- <?php $results = mysqli_query($db, "SELECT * FROM agent"); ?> -->

    <?php $i=1; $results = mysqli_query($db, "SELECT id,nom,prenom,a.adresse,photo,libelle FROM agent a INNER JOIN entropot e ON a.idE=e.idE ORDER BY rand() LIMIT 0, 6") ?>

        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Photo</th>
                    <th>Entropot</th>
                    <!-- <th>Identifiant Entropot</th> -->
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['nom'] ?></td>
                    <td><?php echo $row['prenom'] ?></td>
                    <td><?php echo $row['adresse'] ?></td>
                    <!-- <td><?php echo $row['photo'] ?></td> -->
                    <td><img  src="../assets/image/<?php echo $row['photo'] ?>" alt=""></td>
                    <td><?php echo $row['libelle'] ?></td>
                    <!-- <td style="text-align: center;"><?php echo $row['idE'] ?></td> -->
                    <td>
                        <a href="agent.php?edit=<?php echo $row['id'] ?>" class="edit_btn" title="Edit"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="../controllers/agentController.php?del=<?php echo $row['id'] ?>" class="del_btn" onclick='return confirmation();' title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>



<!--<div class="row mt-2">
        <div class="col-4">
            <div class="container">
                <h4 class="mb-3">Ajouter un produit</h4>
                <form id="form_add">
                    <div id="err" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Veuillez renseigner tous les champs
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Référence</label>
                        <input type="text" class="form-control" name="refP" id="refP" onkeyup="this.value=this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Libeller</label>
                        <input type="text" class="form-control" name="libelleP" id="libelleP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prix de vente</label>
                        <input type="text" class="form-control" name="pvP" id="pvP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="descriptP" id="descriptP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catégorie</label>
                          <select name="codeP" id="codeP" class="form-control">
                            <option value="">Select category</option>
                              <?php
                                foreach($categories as $row) { ?>
                                <option value="<?= $row['code'] ?>"><?= $row['libelle'] ?></option>
                              <?php  } 
                            ?>
                          </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary w-100" id="produit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8 border-start">
            <table class="table" id="tableP">
                <thead>
                    <th>Référence</th>
                    <th>Libeller</th>
                    <th>Prix de vente</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>Actions</th>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>-->