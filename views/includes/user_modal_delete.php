<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>		
				<div class="modal-header">						
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_d" name="id_d" class="form-control">							
					<p>Are you sure you want to delete these Records ?</p>
					<div class="text-center">
            <h2 class="bold username"></h2>
          </div>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> -->
					<button type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"><i class="fa fa-close"></i> Cancel</button>
					<!-- <button type="submit" class="btn btn-danger" id="delete" name="delete">Delete</button> -->
					<button type="button" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>