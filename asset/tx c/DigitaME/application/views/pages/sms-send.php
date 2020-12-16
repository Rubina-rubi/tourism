<?php
	$bi_id = $this->input->post('bi_id');
	$sms = trim($this->input->post('sms'));
?>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<h1 class="page-header">Send SMS</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="full-body-content">
			        <?php
			            if($message) {
			            	if($message=='successful'){
			            		echo '<div class="alert alert-success" role="alert">SMS has been sent successfully.<br/>'.$last_error.'</div>';
			            	}
			            	else{
			            		echo '<div class="alert alert-danger"><strong>Error.</strong> '.$message.' </div>';
			            	}
			            }
			        ?>
					 <ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Group SMS</a></li>
					  <li><a data-toggle="tab" href="#menu1">Number SMS</a></li>
					  <li><a data-toggle="tab" href="#menu2">Excel SMS</a></li>
					</ul>

					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active">
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
								<label>Group</label>
								<select class="form-control" name="group"></select>
							</div>

							<div id="container-masking" class="form-group">
								<label>Masking</label>
								<select class="form-control" name="mi_id" required></select>
							</div>

							<div class="form-group">
								<label>SMS:</label>
								<!-- <textarea class="form-control" name="sms" value="<?php echo $sms; ?>" required rows="3"></textarea> -->



								<textarea class="form-control" id="sms" name="sms" placeholder="Type in your message" value="<?php echo $sms; ?>" rows="2"></textarea>
        							<h6 class="pull-right" id="count_message"></h6>
							</div>
							

							<div class="next-step">
								<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
							</div>
						</form>
					  </div>

					  <div id="menu1" class="tab-pane fade">
					  	
					     <form class="validation" action="#" method="POST" enctype="multipart/form-data">
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
								<label>Number:</label>
								<textarea style="height:100px;" class="form-control" placeholder="Enter Comma Separated Mobile Numbers" name="sms" value="<?php echo $sms; ?>" required rows="3"></textarea>
							</div>

							<div class="form-group">
								<label>SMS:</label>
								<textarea class="form-control" id="sms" name="sms" placeholder="Type in your message" value="<?php echo $sms; ?>" rows="2"></textarea>
        							<h6 class="pull-right" id="count_message"></h6>
							</div>
							

							<div class="next-step">
								<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
							</div>
						</form>
					  </div>

					  <div id="menu2" class="tab-pane fade">
					    <p>Upcoming</p>
					   <!--  <form class="validation" action="#" method="POST" enctype="multipart/form-data">
							 <div class="form-group">
							    <label>Choose an Excel File:</label>
							    <input type="file" class="form-control input-lg" id="exampleFormControlFile1">
							 </div>
							

							<div class="form-group">
								<label>Number:</label>
								<textarea class="form-control" placeholder="Enter Comma Separated Mobile Numbers" name="sms" value="<?php echo $sms; ?>" required rows="3"></textarea>
							</div>

							<div class="form-group">
								<label>SMS:</label>
								<textarea class="form-control" placeholder="Type Your SMS Here" name="sms" value="<?php echo $sms; ?>" required rows="3"></textarea>
							</div>
							

							<div class="next-step">
								<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
							</div>
						</form> -->
					  </div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

  <script>
    function getGroupByBusiness(){
      var bi_id =  $("select[name=bi_id]").val();
        var dataPass = 'bi_id='+bi_id;
        $.ajax({
          url: "<?php echo site_url('data/groups-by-business');?>",         
          data: dataPass,
          dataType: 'json',     
          success: function(data){
            var content = "<option value=''>All</option>";

            if(data.length > 0){
              $.each(data, function( key, value ) {
                  var gi_id = value['gi_id'];
                  var gi_name = value['gi_name'];

                  content += '<option value="'+ gi_id +'">'+ gi_name +'</option>';
              });
            }
            // Set HTML
            $('select[name=group]').html(content);

          }// END success: function(data)
        });// END $.ajax
    }// END getGroupByBusiness

    function getMaskingByBusiness(){
      var bi_id =  $("select[name=bi_id]").val();
        var dataPass = 'bi_id='+bi_id;
        $.ajax({
          url: "<?php echo site_url('data/mask-by-business');?>",         
          data: dataPass,
          dataType: 'json',     
          success: function(data){

            var business_details = data['business_details'];

            if(business_details['bi_allow_masking']==1){
	            $('#container-masking').show();

            	var business_masking = data['business_masking'];

            	var content = "<option value=''>Select</option>";
	            if(business_masking.length > 0){
	              $.each(business_masking, function( key, value ) {
	                  var mi_id = value['mi_id'];
	                  var mi_mask = value['mi_mask'];

	                  content += '<option value="'+ mi_id +'">'+ mi_mask +'</option>';
	              });
	            }
	            // Set HTML
	            $('select[name=mi_id]').html(content);
            }
            else{
	            $('#container-masking').hide();
            }

          }// END success: function(data)
        });// END $.ajax
    }// END getMaskingByBusiness

    $(document).ready(function () {
        getGroupByBusiness();
        getMaskingByBusiness();
      $("select[name=bi_id]").on('change', function(e){
        getGroupByBusiness();
        getMaskingByBusiness();
        return false;
      });
    });
  </script>
<script type="text/javascript">
	var text_max = 200;
$('#count_message').html(text_max + ' remaining');

$('#sms').keyup(function() {
  var text_length = $('#sms').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_remaining + ' remaining');
});

</script>