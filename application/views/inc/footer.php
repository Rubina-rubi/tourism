<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
.my_fafa{margin-left: 5px!important;}
</style>
<section class=""> 
           <div class="footer_area col-lg-12">
        <div footer_area col-lg-12">
          <div col-lg-12">
            <a href="#" class="fa fa-facebook fa-2x"></a>
            <a href="#" class="fa fa-twitter fa-2x"></a>
            <a href="#" class="fa fa-google fa-2x"></a>
            
          </div>
          <div class="copy">
            <a href="#">Sylhet Tourism &copy 2018 | <a href="#">Privacy Policy</a> |<a href="#" class="fa fa-mobile"></a><a href="#"> Mobile:+8801744304967 |<a href="#" class="fa fa-mobile"></a><a href="#"> Email:jashir.bd007@gmail.com |<a href="#" class="fa fa-bkash"></a><a href="#"> Bkash/Rocket:+8801744304967
          </div>
        </div>
      </div>
</section>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=base_url()?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>asset/js/plugins.js"></script>
        <script src="<?=base_url()?>asset/js/main.js"></script>       
    
    
    
    <!-- this prob-->
    
    <script src="<?=base_url()?>asset/ukit/js/uikit.min.js"></script>
    <script src="<?=base_url()?>asset/ukit/js/components/slider.min.js"></script>
    <script src="<?=base_url()?>asset/ukit/js/components/datepicker.js"></script>
    <script src="<?=base_url()?>asset/ukit/js/components/form-select.js"></script>
    
    <!-- this prob-->
    
    <script type="text/javascript">

  $(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 115) {
      $('#nav_bar').addClass('navbar-fixed-top');
    }
    if ($(window).scrollTop() < 116) {
      $('#nav_bar').removeClass('navbar-fixed-top');
    }
  });
});

</script>
  

</body>
</html>