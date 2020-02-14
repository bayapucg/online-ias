<body>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left logo-cus">
        <h1><a href="<?php echo base_url(); ?>" class="scrollto"><img src="<?php echo base_url(); ?>assets/design/img/logo.png" ></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
         
          <li ><a href="<?php echo base_url(); ?>">Home </a></li>
          <li ><a href="<?php echo base_url('about'); ?>">About Online IAS Academy </a></li>
		  <?php if(isset($cdata) && count($cdata)>0){ ?>
		 		    <li class="menu-has-children">
					<a href="">My Account</a>
					<ul>
					  <li><a href="<?php echo base_url('profile'); ?>">Profile </a></li>
					  <li><a href="<?php echo base_url('videos'); ?>">Saved Videos </a></li>
					  <li><a href="<?php echo base_url('profile/changepassword'); ?>">Change Password</a></li>
					  <li><a href="<?php echo base_url('dashboard/logout'); ?>">Logout</a></li>
					 </ul>
				  </li>
		  <?php }else{ ?>
				<li><a href="<?php echo base_url('user'); ?>">Login / Register</a></li>
		  <?php } ?>
		   <li ><a href="<?php echo base_url('contactus'); ?>">Contact Us </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>