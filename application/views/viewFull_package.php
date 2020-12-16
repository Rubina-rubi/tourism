<div class="container">
	<div class="col-lg-12" >
		<!-- <?php foreach ($result as $result) { ?>
		<img class="full_img thumbnail" src="<?=base_url()?>Photo/<?=$result['place_img']?>" alt="Image placeholder"> </a>  -->
		<h2 class="text-center" >Related Images...</h2>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  .carousel-caption h1{margin-top: -280px; font-size: 50px;}
  .my_slider img{min-height: 500px;max-height:500px;width: 100%;}
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
    <?php foreach ($img as $img) { ?>
    <div class="item">
      <img src="<?=base_url()?>allimages/<?=$img['place_img']?>"/>
      <div class="carousel-caption">
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
  </div>


		    <!-- <?php foreach ($img as $img) { ?>
              <div class="col-lg-3" >
                <img class="all_img thumbnail" src="<?=base_url()?>allimages/<?=$img['place_img']?>" alt="Image placeholder">
              </div>
            <?php } ?> -->
           <h1 class="thumbnail" ><a href="<?=base_url()?>Welcome/viewFullPackage/<?=$result['p_id']?>"><?=$result['place_name']?></a></h1>
            <h3 class="thumbnail"><a href="">Package Price: <?=$result['place_cost']?>BDT</a></h3>
            <p class="thumbnail"><?=$result['place_details']?></p>
            <!-- <p></p> -->
            <div class="reviews-star float-left">
			<form action="" method="POST">
              <?php if($this->session->userdata('user_id')) {   ?>
				<?php for($i=1;$i<=5;$i++){ ?>
					<button type="submit" <?php if($rating&&$i<=$rating[0]['rating']){ echo 'class="active-this"';}  ?> name="rating" value="<?=$i?>">&#9733;</button>
					<?php } ?>
			  <?php }else{  ?>
					
					<?php for($i=1;$i<=5;$i++){ ?>
					<button type="button" <?php if($rating&&$i<=$rating[0]['rating']){ echo 'class="active-this"';}  ?> name="rating" onclick="alert('Please Login')" value="<?=$i?>">&#9733;</button>
					<?php } ?>
			
			  <?php }  ?>
			  </form>
			  <h3 style="float: left;padding: 10px 10px;" ><?php echo $review;?> <i>Reviews</i></h3>
			</div>
			<h2 class="text-center">Location in google Map</h2>
			<div id="map"></div>
          <script>
          // Initialize and add the map
            function initMap() {
            // The location of Uluru
            var uluru = {lat:<?=$result['latitude']?> , lng: <?=$result['longitude'];?>};
            // The map, centered at Uluru
            var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 10, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
            }
          </script>
          
          <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCNjHPnfn99hsrTNiqh7lKTvoo70yOu3U&callback=initMap">
          </script>
        
	</div>

	<div class="col-lg-6 col-lg-offset-3 " >
		<h1 class="text-center" >Comments</h1>
		 <?php 
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) {
                        echo $msg;
                    }?>
		<form action="<?=base_url()?>Welcome/comment" method="POST">
			<div class="my_cmnt form-group">
				<textarea class="form-control" name="comment" rows="4" placeholder="Add Your Review" id="comment"></textarea>
			</div>
			<input type="hidden"name="user_id" value="<?php $this->session->userdata('user_id') ?>" required/>

			<input type="hidden" name="p_id" value="<?=$result['p_id']?>"/>
					
			 <div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div> 
		</form>
<br>
		<div class="cmnt thumbnail col-lg-12" >
			<?php foreach ($comment as $cmt) { ?>
						<p style="color:red;"><b><?= $cmt['user_name']?></b></p>
						<p>  <?= $cmt['comment']?>
						 <span style="color: gray;" ><?= $cmt['cmnt_date']?> 
             <?php $time_format = strtotime($cmt['cmnt_time']); ?>
						 <?php echo date("h.i A", $time_format)?></span></p>
                         <br>
					<?php } ?>
		</div>
	</div>
</div>
</div>
<?php } ?>
<style type="text/css">
#map {
margin-top: 100px;
margin-bottom: 20px;
/*margin-left: 20%;*/
height: 300px;  /* The height is 400 pixels */
width: 100%;  /* The width is the width of the web page */
}
.my_cmnt{
	margin-top: 100px;
}
.cmnt{
	font-family: 'Arial';
	margin-top: 10px;
}
.cmnt p{
	margin-top: -5px;
}
button {
border: 0;
background: transparent;
font-size: 1.5em;
margin: 0;
padding: 0;
float: left;
color:gray;
}

button:hover,
button:hover + button,
button:hover + button + button,
button:hover + button + button + button,
button:hover + button + button + button + button {
color: #e5580b;
}

.active-this{

color: #e5580b;
}
.all_img{
	min-height: 200px;
	max-height: 200px;
	width: 200px;
}
			
</style>