
  <section class="header_area_booking text-center"> 
  
  <div class="col-lg-10 col-md-10">

    <div class="form_area col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-4">
        <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }
                ?>
      <h3>Booking</h3>
      <form action="<?= base_url()?>Welcome/booking/<?=$result[0]['p_id']?>" method="POST" >
        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
            <img style="height: 250px;margin-bottom: 10px; border:1px solid black;"  src="<?=base_url()?>Photo/<?=$result[0]['place_img']?>" alt="Image placeholder"> 
          </div>
          <div class="error"><?=form_error('user_name')?></div>
        </div>

        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
            <input type="text" name="place_name"  value="<?=$result[0]['place_name']?>" class="form_input form-control input-lg" placeholder="Enter Your Name" disabled/>
          </div>
          <div class="error"><?=form_error('user_email')?></div>
        </div>

        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
           <input type="text" name="place_name"  value="<?=$result[0]['place_cost']?>" class="form_input form-control input-lg" placeholder="Enter Your Name" disabled/>
          </div>
          <div class="error"><?=form_error('user_password')?></div>
        </div>

         <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
              
          <select name="payment_type" id="" class="form-control input-lg" required > 
          
            <option value="">--select Payment Option--</option>
             <option <?php if(set_value('payment_type')=='Rocket') echo 'selected'; ?> value="Rocket" >Rocket</option>
            <option <?php if(set_value('payment_type')=='Bkash') echo 'selected'; ?> value="Bkash">Bkash</option>
            <div class="error"><?=form_error('payment_type')?></div>
          </select>
        </div>
        </div>
        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
             <input type="text" name="bkash_id"  value="<?=set_value('bkash_id')?>" class="form_input form-control input-lg" placeholder="Enter Bkash Transection ID" required />
          </div>
          <div class="error"><?=form_error('user_mobile')?></div>
        </div>
        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
            
          </div>
          <div class="error"><?=form_error('user_mobile')?></div>
        </div>

       

   
      <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
            <input type="date" name="date" value="<?php date('d-m-yy') ?>" class="form_input form-control input-lg" placeholder="Enter Date"/>
          </div>
      </div>

        
         <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
          <div class="form-group"> 
            <input type="submit" class="sign_up_btn form-control btn btn-default input-lg"  value="Submit" />
          </div>
        </div>
    </form>
      
  </div>
</div>
</section>