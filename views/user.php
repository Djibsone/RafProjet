<?php
//include '../models/db_con.php';
include '../controllers/userController.php'
?>
<!-- <?php 

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
        $records = mysqli_num_rows($record);
        var_dump($records) ;
		if ($records == 1 ) {
			$n = mysqli_fetch_array($record);
			$nom = $n['nom'];
			$prenom = $n['prenom'];
			$email = $n['email'];
			$password = $n['password'];
		}
	}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" >
    <title>User</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid">

    <!-- user modal -->
	<?php 
        include 'includes/user_modal_edit.php'; 
        include 'includes/user_modal_delete.php' 
    ?>

	<!-- container -->
    <div class="container card mt-3">
    
    <!-- header -->
    <?php include 'includes/header.php' ?>

    <div class="col-12 border-start mt-2">
    <div class="col-sm-12 text-info">
		<div class="row">
			<div>
				<h2>Manage <b>Users</b></h2>
			</div>
			<div class="col-lg-12">
				<button class="btn btn-primary float-right btn-sm" data-target="#exampleModal" data-toggle="modal"><i class="fa fa-eye"></i> Show users</button>
			</div>
		</div>
	</div>
		<?php $i = 1; $nom = $_SESSION["nom"]; $prenom = $_SESSION["prenom"]; $results = mysqli_query($db, "SELECT * FROM users WHERE nom='$nom' and prenom='$prenom'"); ?>
			<table class="table" id="table"> 
                <thead>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <!-- <th>Mot de passe</th> -->
                    <th colspan="2">Actions</th>
                </thead>

                <tbody>
                 <?php 
                 while ($row = mysqli_fetch_array($results)) {
                  ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['nom'] ?></td>
                    <td><?php echo $row['prenom'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <!-- <td><?php echo md5($row['password']) ?></td> -->
                    <td>
           				<button class='btn btn-warning edit' data-id='<?php echo $row['id'] ?>' type='button' data-toggle='modal' data-target='#editEmployeeModall'><i class='fa fa-pencil' title='Edit'></i></button>
						<!-- <a href="userUpdate.php?edit=<?php echo $row['id'] ?>" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a> -->
					</td>
                    <td>
                        <button class='btn btn-danger delete' data-id="<?php echo $row['id'] ?>" data-toggle='modal' data-target='#deleteEmployeeModal'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></button>
                        <!-- <a href="../controllers/userController.php?del=<?php echo $row['id'] ?>" class="btn btn-danger" onclick='return confirmation();' title="Delete"><i class="fa fa-trash"></i></a> -->
                    </td>
                  </tr>
                  <?php
                 }
                 ?>
                </tbody>
                <h2>
            </table>
        </div>
    </div>

</div>
</div>
         
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/scripts.js"></script>
</body>
</html>

      <!-- 
	<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>
	<?php $i = 1; $nom = $_SESSION["nom"]; $prenom = $_SESSION["prenom"]; $results = mysqli_query($db, "SELECT * FROM users WHERE nom='$nom' and prenom='$prenom'"); ?>
	<?php $results = mysqli_query($db, 'SELECT * FROM users WHERE nom="'.$_SESSION["nom"].'" and prenom="'.$_SESSION["prenom"].'"'); ?>
	-->