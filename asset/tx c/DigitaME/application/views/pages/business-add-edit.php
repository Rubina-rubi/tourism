<?php
	$system_user = $this->input->post('system_user');
	$business_name = trim($this->input->post('business_name'));
	$allow_masking = $this->input->post('allow_masking');
	$masking = $this->input->post('masking');

	if(!$this->input->post('submit') && $details){
		$system_user = $details['su_id'];
		$business_name = $details['bi_name'];
		$allow_masking = $details['bi_allow_masking'];

		if($business_masking){
			$masking = implode(', ', array_column($business_masking, 'mi_mask'));
		}
	}
?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo ($details) ? 'Update Business Info' : 'Add New Business'; ?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="full-body-content">
			        <?php
			            if ( isset($message) && $message!='') {
			              echo '<div class="alert alert-danger"><strong>Error.</strong> '.$message.' </div>';
			            }
			        ?>
					<form class="validation" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Customer Admin</label>
							<select class="form-control" name="system_user" required>
								<option value="">Select</option>
							<?php
								foreach ($users as $val) {
									$isSelected = ($val['su_id']==$system_user) ? 'selected' : '';
									echo '<option value="'.$val['su_id'].'" '.$isSelected.'>'.$val['su_email'].'</option>';
								}
							?>
							</select>
						</div>

						<div class="form-group">
							<label>Business Name:</label>
							<input type="text" class="form-control" name="business_name" value="<?php echo $business_name; ?>" required>
						</div>

						<div class="form-group">
							<label>Allow Masking:</label>
							<div>
								<label class="radio-inline">
								  <input type="radio" name="allow_masking" value="1" <?php echo ($allow_masking === null || $allow_masking) ? 'checked' : ''; ?> > Yes
								</label>
								<label class="radio-inline">
								  <input type="radio" name="allow_masking" value="0" <?php echo ($allow_masking === null || $allow_masking) ? '' : 'checked'; ?> > No
								</label>
							</div>
						</div>

					    <div id="container-masking" class="form-group">
					        <label>Masking</label>
					        <input type="text" class="form-control" id="search_masking" name="masking" placeholder="e.g. Select Masking" value="<?php echo $masking; ?>" required>
					    </div>
				  <script>
				  $( function() {
				    function split( val ) {
				      return val.split( /,\s*/ );
				    }
				    function extractLast( term ) {
				      return split( term ).pop();
				    }
				 
				    $( "#search_masking" )
				      // don't navigate away from the field on tab when selecting an item
				      .on( "keydown", function( event ) {
				        if ( event.keyCode === $.ui.keyCode.TAB &&
				            $( this ).autocomplete( "instance" ).menu.active ) {
				          event.preventDefault();
				        }
				      })
				      .autocomplete({
				        source: function( request, response ) {
				          $.getJSON( "<?php echo base_url().'data/get-masking'; ?>", {
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

						<div class="next-step">
							<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->


  <script>
    function allowMaskingOrNot(){
      var allow_masking =  $("input[name=allow_masking]:checked").val();
      if(allow_masking==1){
      	$("#container-masking").show();
      }
      else{
      	$("#container-masking").hide();
      }
    }// END allowMaskingOrNot

    $(document).ready(function () {
      allowMaskingOrNot();
      $("input[name=allow_masking]").on('change', function(e){
        allowMaskingOrNot();
        return false;
      });
    });
  </script>