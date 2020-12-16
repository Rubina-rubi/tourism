 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>Welcome"><img src="<?=base_url()?>asset/admin/images/logo.png" alt="Sylhet Tourism "></a>
              <!--  <a class="navbar-brand hidden" href="<?=base_url()?>Welcome"><img src="<?=base_url()?>asset/admin/images/logo2.png" alt="Logo"></a>-->
              <img src="<?= base_url('Photo/users-256x256.png'); ?>"height="100" width="150" alt="..." class="img-circle profile_img">
                  <a class="navbar-brand" href="<?=base_url()?>Welcome"><h4><?= $this->session->userdata('user_name'); ?></h4></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?=base_url()?>Dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <?php if ($this->session->userdata('user_type')=='user'){ ?>
                    <li class="active">
                        <a href="<?=base_url()?>Welcome/my_booking"> <i class="menu-icon fa fa-dashboard"></i>My Booking</a>
                    </li>
                    <li class="active">
                        <a href="<?=base_url()?>Welcome"> <i class="menu-icon fa fa-image"></i>Package Booking</a>
                    </li>
                    <li class="active">
                        <a href="<?=base_url()?>Welcome"> <i class="menu-icon fa fa-dashboard"></i>View Packages</a>
                    </li>
                    <!-- /.menu-title -->
                     <?php } ?>
                    <?php if ($this->session->userdata('user_type')=='Superadmin'){ ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Package</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="<?=base_url()?>Dashboard/add_package">add</a></li>
                            <li><i class="fa fa-list"></i><a href="<?=base_url()?>Dashboard/view_package">View</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>User Options</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?=base_url('Dashboard/view_user')?>">All Users</a></li>
                            <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/add_admin')?>">Add Admin</a></li>
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/view_booking')?>">View Booking</a></li>
                        </ul>
                    </li>
                      <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Add Image</a>
                        <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/slide_img')?>">Add Slide Image</a></li>
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/add_package_img')?>">Add Package Image</a></li>
                        </ul>
                    </li>
                    <?php } ?>


                     <?php if ($this->session->userdata('user_type')=='admin'){ ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Package</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="<?=base_url()?>Dashboard/add_package">add</a></li>
                            <li><i class="fa fa-list"></i><a href="<?=base_url()?>Dashboard/view_package">View</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>User Options</a>
                        <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/view_booking')?>">View Booking</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Add Image</a>
                        <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/slide_img')?>">Add Slide Image</a></li>
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/add_package_img')?>">Add Package Image</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Add Image</a>
                        <ul class="sub-menu children dropdown-menu">
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/slide_img')?>">Add Slide Image</a></li>
                              <li><i class="fa fa-plus"></i><a href="<?=base_url('Dashboard/add_package_img')?>">Add Package Image</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button> -->
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                       <!--  <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div> -->

                        <div class="dropdown for-message">
                         <!--  <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button> -->
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-3x" ></i>
                        </a>

                        <div class="user-menu dropdown-menu">
                               <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i></a>

                                 <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> 

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i></a> -->

                                <a class="nav-link" href="<?=base_url()?>Login/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>