<div class="breadcrumbs">
    <div class="container" >
   
    <div class="col-lg-12">
        <h3>Add Slider Images</h3><br>
        <form action="<?= base_url()?>Dashboard/slide_img" method="POST" enctype="multipart/form-data">
            <div class="form_area col-lg-8">
                <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
                
                
                <div class="form-group"> 
                    <input type="text" name="slide_name" placeholder="slider name" class="form_input form-control input-lg">
                    
                </div>

                <div class="form-group"> 
                    <input type="file" name="slide_img" class="form_input form-control input-lg">
                    
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
