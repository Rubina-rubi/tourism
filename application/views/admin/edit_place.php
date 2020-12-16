<div class="breadcrumbs">
    <div class="container" >
   
    <div class="col-lg-12">
        <h3>Edit Package</h3><br>
        <form action="<?= base_url()?>Dashboard/edit_place/<?=$editPlace->p_id?>" method="POST" enctype="multipart/form-data">
            <div class="form_area col-lg-8">
                <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
                <div class="form-group"> 
                    <input type="text" name="place_name"  value="<?=$editPlace->place_name;?>" class="form_input form-control input-lg" placeholder="Enter Your Place Name"/><div class="error"><?=form_error('place_name')?></div>
                </div> 
                <div class="form-group"> 
                    <input type="text" name="place_cost"  value="<?=$editPlace->place_cost?>" class="form_input form-control input-lg" placeholder="Enter Service Charge"/><div class="error"><?=form_error('place_cost')?></div>
                </div>
                 <div class="form-group"> 
                    <input type="text" name="latitude"  value="<?=$editPlace->latitude?>" class="form_input form-control input-lg" placeholder="Enter Place Latitude"/><div class="error"><?=form_error('latitude')?></div>
                </div>
                <div class="form-group"> 
                    <input type="text" name="longitude"  value="<?=$editPlace->longitude?>" class="form_input form-control input-lg" placeholder="Enter Place longitude"/><div class="error"><?=form_error('longitude')?></div>
                </div>

                <div class="form-group"> 
                    <textarea rows="5" name="place_details" class="form_input form-control input-lg" placeholder="Place Details"  value="<?=$editPlace->place_details?>"><?=$editPlace->place_details?></textarea>
                    <div class="error"><?=form_error('place_details')?></div>
                </div>
            
                <div class="form-group"> 
                    <img src="<?=base_url()?>Photo/<?=$editPlace->place_img;?>" height="150" width="200" ">
                </div>

                <div class="form-group"> 
                  <input type="hidden" name="old_img" value="<?php echo $editPlace->place_img ?>" />
                </div>
                
                <div class="form-group"> 
                    <input type="file" name="place_img" class="form_input form-control input-lg">
                    <div class="error"><?=form_error('place_img')?></div>
                </div>

             

                <div class="col-lg-4 float-right">
                    <div class="form-group"> 
                        <input type="submit" class="form-control btn btn-success input-lg"  value="Submit" />
                    </div>
                </div>
            </div>

        </form>  

            </div>
    </div>
    </div>
