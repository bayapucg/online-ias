<style>
.menu_active{
	color:#ffb400 !important;
}
</style>
<body>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left logo-cus">
        <h1><a href="<?php echo base_url(); ?>" class="scrollto"><img src="<?php echo base_url(); ?>assets/design/img/logo.png" ></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
         
          <li ><a class="<?php if($this->uri->segment(1)==''){ echo 'menu_active'; } ?>" href="<?php echo base_url(); ?>">Home </a></li>
          <li ><a class="<?php if($this->uri->segment(1)=='about'){ echo 'menu_active'; } ?>" href="<?php echo base_url('about'); ?>">About Online IAS Academy </a></li>
		  <?php if(isset($cdata) && count($cdata)>0){ ?>
		  <li ><a class="<?php if($this->uri->segment(2)=='clarification'){ echo 'menu_active'; } ?>" href="<?php echo base_url('videos/clarification'); ?>">Video Classes</a></li>
		 		    <li class="menu-has-children">
					<a href="" class="<?php if($this->uri->segment(1)=='profile' || $this->uri->segment(2)=='paymentlist' || $this->uri->segment(2)=='changepassword' || $this->uri->segment(1)=='payment'){ echo 'menu_active'; } ?>">My Account</a>
					<ul>
					  <li><a href="<?php echo base_url('profile'); ?>">Profile </a></li>
					  <li><a href="<?php echo base_url('profile/paymentlist'); ?>">Payment Paid List </a></li>
					  <li><a href="<?php echo base_url('payment/index'); ?>">Payment List </a></li>
					  <li><a href="<?php echo base_url('videos/clarification'); ?>">Video Classes</a></li>
					  <li><a href="<?php echo base_url('profile/changepassword'); ?>">Change Password</a></li>
					  <li><a href="<?php echo base_url('dashboard/logout'); ?>">Logout</a></li>
					 </ul>
				  </li>
		  <?php }else{ ?>
				<li><a class="<?php if($this->uri->segment(1)=='user'){ echo 'menu_active'; } ?>" href="<?php echo base_url('user'); ?>">Login / Register</a></li>
		  <?php } ?>
		   <li ><a class="<?php if($this->uri->segment(1)=='contactus'){ echo 'menu_active'; } ?>" href="<?php echo base_url('contactus'); ?>">Contact Us </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>