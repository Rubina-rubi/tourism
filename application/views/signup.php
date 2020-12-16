	 
<section class="header_area text-center"> 
	
	<div class="col-lg-10 col-md-10">
		<br>
		<div class="form_area col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-4">
				<?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
			<h3>Registration</h3>
			<br>
			<form action="<?= base_url()?>Signup" method="POST" >
				<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="text" name="user_name"  value="<?=set_value('user_name')?>" class="form_input form-control input-lg" placeholder="Enter Your Name"/>
					</div>
					<div class="error"><?=form_error('user_name')?></div>
				</div>
				

				<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="text" name="user_email"  value="<?=set_value('user_email')?>" class="form_input form-control input-lg" placeholder="Enter Your Email"/>
					</div>
					<div class="error"><?=form_error('user_email')?></div>
				</div>

				<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="Password" name="user_password"  value="<?=set_value('user_password')?>" class="form_input form-control input-lg" placeholder="Enter Your Password"/>
					</div>
					<div class="error"><?=form_error('user_password')?></div>
				</div>
				<!--<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="Password" name="user_con_password"  value="<?=set_value('user_con_password')?>" class="form_input form-control input-lg" placeholder="Enter Your confirm Password"/>
					</div>
					<div class="error"><?=form_error('user_con_password')?></div>
				</div> -->
                 
               

				<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="text" name="user_mobile"  value="<?=set_value('user_mobile')?>" class="form_input form-control input-lg" placeholder="Enter Your Mobile"/>
					</div>
					<div class="error"><?=form_error('user_mobile')?></div>
				</div>

					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					 
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="submit" class="sign_up_btn form-control btn btn-default input-lg"  value="Submit" />
					</div>
			</div>

		</form>
			
	</div>
</div></div></section>


      
      
    