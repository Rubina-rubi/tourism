
<section class="header_area text-center"> 
	
	<div class="signup_form_area col-lg-10 col-md-10">
		<br>
		<div class="form_area col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-4">
			
			<h3>Login</h3>
			 <?php 
                        $msg = $this->session->flashdata('msg');
                        if (isset($msg)) {
                            echo $msg;
                        }
                    ?>
			<br>
			<form action="<?= base_url()?>Login" method="POST" >
				

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

				

					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					 
				<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
					<div class="form-group"> 
						<input type="submit" class="sign_up_btn form-control btn btn-default input-lg"  value="Submit" />
					</div>
					<span class="txt_blue" ><p>Don't Have an account!</span><a href="<?= base_url()?>Signup"><input type="button" class="btn btn-default" value="signup"></a></p></span>
				</div>
				
			</form>
			<br>
		</div>
<br>
				
	</div> </form></div></div></section>
	