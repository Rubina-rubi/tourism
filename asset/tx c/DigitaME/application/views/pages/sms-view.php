	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">SMS</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="full-body-content">
			        <?php
			            if ($message=='empty-field') {
			              echo '<div class="alert alert-danger"><strong>Error.</strong> Try again. </div>';
			            }
			            if ($message=='updated') {
			              echo '<div class="alert alert-success" role="alert">SMS content successfully updated.</div>';
			            }
			        ?>
					<form id="setting-sms" action="<?php echo site_url('sms'); ?>" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Check-in Message</label>
							<textarea class="form-control" name="checkin-message" rows="7" required><?php echo $checkin_sms['sd_body']; ?></textarea>
    						<p class="help-block">Keys: &lt;title&gt;, &lt;fname&gt;, &lt;mname&gt;, &lt;lname&gt;, &lt;roomno&gt;</p>
							<input type="hidden" name="checkin-id" value="<?php echo $checkin_sms['sd_id']; ?>">
						</div>

						<div class="form-group">
							<label>Check-out Message</label>
							<textarea class="form-control" name="checkout-message" rows="7" required><?php echo $checkout_sms['sd_body']; ?></textarea>
    						<p class="help-block">Keys: &lt;title&gt;, &lt;fname&gt;, &lt;mname&gt;, &lt;lname&gt;, &lt;roomno&gt;</p>
							<input type="hidden" name="checkout-id" value="<?php echo $checkout_sms['sd_id']; ?>">
						</div>

						<div class="form-group">
							<label>Birthday Message</label>
							<textarea class="form-control" name="birthday-message" rows="7" required><?php echo $birthday_sms['sd_body']; ?></textarea>
    						<p class="help-block">Keys: &lt;title&gt;, &lt;fname&gt;, &lt;mname&gt;, &lt;lname&gt;, &lt;roomno&gt;</p>
							<input type="hidden" name="birthday-id" value="<?php echo $birthday_sms['sd_id']; ?>">
						</div>

						<div class="next-step">
							<button type="submit" class="btn btn-primary" name="update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div><!--/.row-->

<script>

// Form Validation
$(document).ready(function() {
	$("#setting-sms").validate({
	  rules: {
	    'checkin-message': {
	      maxlength: 150
	    },
	    'checkout-message': {
	      maxlength: 150
	    },
	    'birthday-message': {
	      maxlength: 150
	    }
	  }
	});
});
</script>