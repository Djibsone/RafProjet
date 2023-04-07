<?php  include('../controllers/entropotController.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM entropot WHERE idE=$id");
        $records = mysqli_num_rows($record);
		if ($records == 1 ) {
			$n = mysqli_fetch_array($record);
			$code = $n['code'];
			$libelle = $n['libelle'];
			$adresse = $n['adresse'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Entropot</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css">
</head>
<body>

<!-- message de success et error -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="err">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif ?>

<!-- formulaire d'inscription -->
	<form method="post" action="" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Code entropot</label>
			<input type="text" name="code" value="<?php echo $code; ?>" onkeyup="this.value=this.value.toUpperCase()">
		</div>
		<div class="input-group">
			<label>Libéller</label>
			<input type="text" name="libelle" value="<?php echo $libelle; ?>">
		</div>
		<div class="input-group">
			<label>Adresse</label>
			<input class="maj2" type="text" name="adresse" value="<?php echo $adresse; ?>">
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
    <?php $results = mysqli_query($db, "SELECT * FROM entropot"); ?>

        <table>
            <thead>
                <tr>
                    <th>Code Entropot</th>
                    <th>Libéller</th>
                    <th>Adresse</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['code'] ?></td>
                    <td><?php echo $row['libelle'] ?></td>
                    <td><?php echo $row['adresse'] ?></td>
                    <td>
                        <a href="entropot.php?edit=<?php echo $row['idE'] ?>" class="edit_btn" title="Edit"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="../controllers/entropotController.php?del=<?php echo $row['idE'] ?>" class="del_btn" onclick='return confirmation();' title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>