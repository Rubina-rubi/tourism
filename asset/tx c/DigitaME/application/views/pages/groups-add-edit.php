<?php
	$bi_id = $this->input->post('bi_id');
	$group_name = trim($this->input->post('group_name'));
	$status = $this->input->post('status');

	if(!$this->input->post('submit') && $details){
		$bi_id = $details['bi_id'];
		$group_name = $details['gi_name'];
		$status = $details['gi_status'];
	}
?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<h1 class="page-header"><?php echo ($details) ? 'Update Group Info' : 'Add New Group'; ?></h1>
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
							<label>Business</label>
							<select class="form-control" name="bi_id" required>
								<option value="">Select</option>
							<?php
								foreach ($businesses as $val) {
									$isSelected = ($val['bi_id']==$bi_id) ? 'selected' : '';
									echo '<option value="'.$val['bi_id'].'" '.$isSelected.'>'.$val['bi_name'].'</option>';
								}
							?>
							</select>
						</div>

						<div class="form-group">
							<label>Group Name:</label>
							<input type="text" class="form-control" name="group_name" value="<?php echo $group_name; ?>" required>
						</div>

						<div class="form-group">
							<label>Status:</label>
							<label class="radio-inline">
							  <input type="radio" name="status" value="1" <?php echo ($status===null || $status) ? 'checked' : ''; ?> > Active
							</label>
							<label class="radio-inline">
							  <input type="radio" name="status" value="0" <?php echo ($status===null || $status) ? '' : 'checked'; ?> > Inactive
							</label>
						</div>

						<div class="next-step">
							<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->
