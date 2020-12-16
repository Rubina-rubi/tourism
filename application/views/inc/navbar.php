
<nav class="my_nav navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?=base_url()?>welcome"><h1>Sylhet Tourism</h1> </a>
    </div>
    <ul class="nav navbar-nav">

      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a> -->
        <!-- <ul class="dropdown-menu"> -->
          <!-- <li><a href="#">Page 1-1</a></li> -->
          <!-- <li><a href="#">Page 1-2</a></li> -->
          <!-- <li><a href="#">Page 1-3</a></li> -->
        <!-- </ul> -->
      <!-- </li> -->
     
    </ul>

    <ul class="nav navbar-nav navbar-right">
     <?php if($this->session->userdata('user_type')!=('user'||'admin'||'Superadmin')) { ?>
      
      <li><a href="<?=base_url()?>Signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="<?=base_url()?>Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li><?php } ?>
       <?php if($this->session->userdata('user_type')==('user'||'admin'||'Superadmin')) { ?>
      <li><a href="<?=base_url()?>Dashboard"><span class="glyphicon glyphicon-log-in"></span> Dashboard</a></li><?php } ?>
    </ul>
  </div>
</nav>
    