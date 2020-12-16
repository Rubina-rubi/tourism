<div class="breadcrumbs">
    <div class="container" >
   
    <div class="col-lg-12">
        <h3>Add Admin</h3><br>

        <div class="signup_form_area col-lg-10 col-md-10">
        <br>
                <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
            <br>
            <form action="<?= base_url()?>Dashboard/add_admin" method="POST" >
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

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group"> 
                        <input type="text" name="user_mobile"  value="<?=set_value('user_mobile')?>" class="form_input form-control input-lg" placeholder="Enter Your Mobile"/>
                    </div>
                    <div class="error"><?=form_error('user_mobile')?></div>
                </div>

                     <input type="hidden" name="user_type"  value="admin" class="form_input form-control input-lg" placeholder="Enter Your Mobile"/>
                     
                <div class="col-md-10 col-lg-10">
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-success" > Submit </button>
                    </div>
                </div>

            </form>
            

    </div>
    </div>
    </div>
