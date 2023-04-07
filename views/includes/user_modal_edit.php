	<!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="update_form">
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_u" name="id_u" class="form-control">
					<div class="form-group">
						<label>Nom</label>
						<input type="text" id="nom" name="nom" class="form-control">
					</div>
					<div class="form-group">
						<label>Prénom</label>
						<input type="text" id="prenom" name="prenom" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email" name="email" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label>Mot de passe</label>
						<input type="password" id="password" name="password" class="form-control">
					</div>				
				</div>
				<div class="modal-footer">
					<!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> -->
					<button type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"><i class="fa fa-close"></i> Cancel</button>
					<button type="button" class="btn btn-info" id="update"><i class="fa fa-save"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<!--fin modal-->

	<!-- user modal -->
	<div id="exampleModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">All Users</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<?php $i = 1; $results = mysqli_query($db, "SELECT * FROM users ORDER BY nom"); ?>
					<table class="table" id="table"> 
						<thead>
							<th>N°</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Email</th>
							<!-- <th>Mot de passe</th> -->
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
							<!-- <td><?php echo $row['password']; ?></td> -->
						<?php
						}
						?>
						</tbody>
						<h2>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
    <!-- user modal fin -->