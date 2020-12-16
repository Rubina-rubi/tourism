<?php
	$bi_id = $this->input->post('bi_id');
	$name = trim($this->input->post('name'));
	$contact_number = trim($this->input->post('contact_number'));
	$email = trim($this->input->post('email'));
	$status = $this->input->post('status');
	$contact_groups = $this->input->post('contact_groups');

	if(!$this->input->post('submit') && $details){
		$bi_id = $details['bi_id'];
		$name = $details['ci_name'];
		$contact_number = $details['mo_code'].$details['ci_contact_number'];
		$email = $details['ci_email'];
		$status = $details['ci_status'];
		$contact_groups = '';
	}
?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<h1 class="page-header"><?php echo ($details) ? 'Update Contact Info' : 'Add New Contact'; ?></h1>
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
							<label>Full Name:</label>
							<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
						</div>

						<div class="form-group">
							<label>Contact Number:</label>
							<input type="text" class="form-control" name="contact_number" value="<?php echo $contact_number; ?>" placeholder="01XXXXXXXXX" data-rule-number="true" data-rule-minlength="11" data-rule-maxlength="11" data-msg-minlength="Exactly 11 characters please" data-msg-maxlength="Exactly 11 characters please" required>
						</div>

						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
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

				      <div class="form-group">
				        <label>Groups</label>
				        <input type="text" class="form-control" id="search_contact_groups" name="contact_groups" placeholder="e.g. Select Groups" value="<?php echo $contact_groups; ?>" >

				  <script>
				  $( function() {
				    function split( val ) {
				      return val.split( /,\s*/ );
				    }
				    function extractLast( term ) {
				      return split( term ).pop();
				    }
				 
				    $( "#search_contact_groups" )
				      // don't navigate away from the field on tab when selecting an item
				      .on( "keydown", function( event ) {
				        if ( event.keyCode === $.ui.keyCode.TAB &&
				            $( this ).autocomplete( "instance" ).menu.active ) {
				          event.preventDefault();
				        }
				      })
				      .autocomplete({
				        source: function( request, response ) {
				          $.getJSON( "<?php echo base_url().'data/get-contact-groups'; ?>", {
				            term: extractLast( request.term )
				          }, response );
				        },
				        search: function() {
				          // custom minLength
				          var term = extractLast( this.value );
				          if ( term.length < 2 ) {
				            return false;
				          }
				        },
				        focus: function() {
				          // prevent value inserted on focus
				          return false;
				        },
				        select: function( event, ui ) {
				          var terms = split( this.value );
				          // remove the current input
				          terms.pop();
				          // add the selected item
				          terms.push( ui.item.value );
				          // add placeholder to get the comma-and-space at the end
				          terms.push( "" );
				          this.value = terms.join( ", " );
				          return false;
				        }
				      });
				  } );
				  </script>
				      </div>

						<div class="next-step">
							<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->
