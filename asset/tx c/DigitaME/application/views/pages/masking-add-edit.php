<?php
	$name = trim($this->input->post('name'));
	$mask = trim($this->input->post('mask'));
	$status = $this->input->post('status');

	if(!$this->input->post('submit') && $masking_details){
		$name = $masking_details['mi_name'];
		$mask = $masking_details['mi_mask'];
		$status = $masking_details['mi_status'];
	}
?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<h1 class="page-header"><?php echo ($masking_details) ? 'Update Masking Info' : 'Add New Masking'; ?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="full-body-content">
			        <?php
			            if ( isset($message) && $message!='') {
			              echo '<div class="alert alert-danger"><strong>Error.</strong> '.$message.' </div>';
			            }
			        ?>
					<form class="validation" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Masking Name:</label>
							<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
						</div>

						<div class="form-group">
							<label>Mask:</label>
							<input type="text" class="form-control" name="mask" value="<?php echo $mask; ?>" required>
						</div>

						<div class="form-group">
							<label>Status</label>
							<select class="form-control select-category" name="status" required>
								<option value="1" <?php echo ($status===null || $status) ? 'selected' : ''; ?> >Active</option>
								<option value="0" <?php echo ($status===null || $status) ? '' : 'selected'; ?> >Inactive</option>
							</select>
						</div>

						<div class="next-step">
							<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->