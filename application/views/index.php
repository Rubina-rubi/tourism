<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  .carousel-caption h1{margin-top: -270px; font-size: 50px;}
  /*.place_div img{text-align: center;margin: 0px 0px 0px 10px;}*/
</style>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators"> -->
    <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> -->
    <!-- <li data-target="#myCarousel" data-slide-to="1"></li> -->
    <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
  <!-- </ol> -->

  <!-- Wrapper for slides -->
  <div class="my_slider carousel-inner">
     <div class="item active">
      <img src="<?=base_url()?>asset/images/a.jpg" alt="Chania">
      <div class="carousel-caption">
         <h1>Sylhet Tourism</h1>
        <p>LA is always so much fun!</p>
      </div>
    </div>
    
    <?php foreach ($slide as $slide) { ?>
    <div class="item">
      <img src="<?=base_url()?>slide_img/<?=$slide['slide_img'];?>"/>
      <div class="carousel-caption">
        <h1><?=$slide['slide_name'];?></h1>
      </div>
    </div><?php } ?>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="<?=base_url()?>#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="<?=base_url()?>#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
    <br>
    <br>

  <div class="container"> 
    <div class="col-lg-12" >
    <?php foreach ($result as $result) { ?>
      <div class="place_div col-lg-4">
         <a href="<?=base_url()?>Welcome/viewFullPackage/<?=$result['p_id']?>">
            <img class="my_thm thumbnail" class="img-responsive" src="<?=base_url()?>Photo/<?=$result['place_img']?>"></a> 
        <h3>Package Name: <?=$result['place_name']?></h3>
        <h3>Package Price: <?=$result['place_cost']?></h3>
        <h3>Package Duration: 1 Day</h3>
        <h3>Transport: Bus</h3>
       <div class="star_div">
        
          <?php $temp_rating= $rating[$result['p_id']][0]['rate'];   for($i=1;$i<=5;$i++){ ?>
          <button type="" <?php if($rating&&$i<=$temp_rating){ echo 'class="active-this"';}  ?> name="rating" onclick="alert('Please Login')" value="<?=$i?>">&#9733;</button>

          <?php } ?> 
        <!--  <h3 style="float: right;padding: 25px 0px;" ><?php echo $review;?> <i>Reviews</i></h3> -->
            </div>
        <?php if ($this->session->userdata('user_type')=='user') { ?>
        <a href="<?=base_url()?>Booking/user_booking/<?=$result['p_id']?>">
        <button class="my_btn btn btn-info">Booking</button></a>
        <?php }else{ ?>
            <button class="my_btn btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm">Booking</button><?php }?>
      </div>
  <?php } ?>  
    </div>   <?php
            echo  $this->pagination->create_links();
         ?>
  </div>  <br>


  <div class="footer_area col-lg-12" >
            <a href="https://web.facebook.com/" class="fa fa-facebook fa-2x"></a>&nbsp &nbsp
            <a href="https://twitter.com/" class="fa fa-twitter fa-2x"></a>&nbsp &nbsp
            <a href="https://gmail.com/" class="fa fa-google fa-2x"></a><br>&nbsp 

            <a href="http://localhost/tourism/Welcome">Sylhet Tourism &copy 2018 |&nbsp<a href="#">Privacy Policy</a> |    <a href="#" class="fa fa-mobile"></a><a href="#"> Mobile:+8801744304967 |&nbsp<a href="#" class="fa fa-mobile"></a><a href="#"> Email:jashir.bd007@gmail.com |&nbsp<a href="#" class="fa fa-bkash"></a><a href="#"> Bkash/Rocket:+8801744304967

      <!-- <p>Sylhet Tourism &copy 2018, Mobile:+8801744304967, Email:jashir.bd007@gmail.com, Bkash/Rocket:+8801744304967</p>-->
     </div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      

<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Attention!!!</h4>
</div>
<div class="modal-body">
<p>Please login</p>
</div>
<div class="modal-footer">
<button type="button" class="my_btn btn btn-danger" data-dismiss="modal">Close</button>
<a href="<?=base_url()?>login"><button type="button" class="my_btn btn btn-success">LOGIN NOW</button></a>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

            
      
    </div>
    </section>
    <style type="text/css"> 
      
      .reviews-count{
      margin-left:-100px;  
      }
      .reviews-star{
        float:left;
        width:100px;
        margin-top:-25px;
      }
      .count{
        color: black;
      }
      button {
        border: 0;
        background: transparent;
        font-size: 1.5em;
        margin: 0;
        padding: 0;
        /*float: right;*/
        color:gray;
      }
      
  
      
      .active-this{
        
        color: #e5580b;
      }