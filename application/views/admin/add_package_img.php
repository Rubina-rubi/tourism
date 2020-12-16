<div class="breadcrumbs">
    <div class="container" >
   
    <div class="col-lg-12">
        <h3>Add Images</h3><br>
        <form action="<?= base_url()?>Dashboard/add_package_img" method="POST" enctype="multipart/form-data">
            <div class="form_area col-lg-8">
                <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
                
                
                <div class="form-group">           
                    <select name="place_id" id="" class="form-control input-lg">
                     <option value="">--select Place Name--</option>
                        <?php foreach ($result as $result) { ?>
                        <option value="<?=$result->p_id;?>"><?=$result->place_name;?></option>
                        <?php } ?>
                    </select>  
                    <div class="error"><?=form_error('place_id')?></div>
                </div>
                <div class="form-group"> 
                    <input type="file" name="place_img" class="form_input form-control input-lg">
                    <div class="error"><?=form_error('place_img')?></div>
                </div>

             

                <div class="col-lg-4 float-right">
                    <div class="form-group"> 
                        <input type="Submit" class="form-control btn btn-success input-lg"  value="Submit" />
                    </div>
                </div>
            </div>

        </form>  

            </div>
    </div>
    </div>
