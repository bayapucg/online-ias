<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>K</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SURYA </b>KIRAN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <?php //echo '<pre>';print_r($u_d);exit; ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php if($u_d['profile_pic']!=''){ ?>
                <img src="<?php echo base_url('assets/profile_pic/'.$u_d['profile_pic']); ?>" class="img-circle" alt="<?php echo isset($u_d['name'])?$u_d['name']:''; ?>" style="height:20px;width:30px;">
			<?php }else{  ?>
				<img src="<?php echo base_url('assets/design/img.png'); ?>" class="img-circle" alt="User Image" style="height:20px;width:auto;">

			<?php } ?>
              <span class="hidden-xs"><?php echo isset($u_d['name'])?$u_d['name']:''; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
				<?php if($u_d['profile_pic']!=''){ ?>
					<img src="<?php echo base_url('assets/profile_pic/'.$u_d['profile_pic']); ?>" class="img-circle" alt="User Image">
				<?php }else{  ?>
						<img src="<?php echo base_url('assets/design/img.png'); ?>" class="img-circle" alt="User Image">
				<?php } ?>
                <p>
                 <?php echo isset($u_d['name'])?$u_d['name']:''; ?>
                  <small><?php if($u_d['role']==1){ echo "Admin"; }else{ echo "Employee"; } ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profiles'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
   
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($u_d['profile_pic']!=''){ ?>
					<img src="<?php echo base_url('assets/profile_pic/'.$u_d['profile_pic']); ?>" class="img-circle" alt="User Image">
				<?php }else{  ?>
						<img src="<?php echo base_url('assets/design/img.png'); ?>" class="img-circle" alt="User Image">
				<?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo isset($u_d['name'])?$u_d['name']:''; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
     <?php //echo '<pre>';print_r($u_d);exit; ?>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li>
              <a href="<?php echo base_url('banners'); ?>">Add 
                
              </a>
            </li>
            <li><a href="<?php echo base_url('banners/lists'); ?>">List</a></li>
            
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Video</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li>
              <a href="<?php echo base_url('video/add'); ?>">Add 
                
              </a>
            </li>
            <li><a href="<?php echo base_url('video/index'); ?>">List</a></li>
            
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li>
              <a href="<?php echo base_url('payments/add'); ?>">Add 
                
              </a>
            </li>
            <li><a href="<?php echo base_url('payments/index'); ?>">List</a></li>
            
          </ul>
        </li>
		<li class="treeview">
          <a href="<?php echo base_url('profiles/userlist'); ?>">
            <i class="fa fa-users"></i> <span>User List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		<li class="treeview">
          <a href="<?php echo base_url('profiles/paymentuserlist'); ?>">
            <i class="fa fa-users"></i> <span>Payment User List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
		    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
<!--view modals-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-sm-6  col-sm-6 ">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn pull-left">Cancel</button>
				</div>
				<div class="col-md-6 col-sm-6  col-sm-6 ">
                <a href="?id=value" class="btn  blueBtn popid pull-right" style="text-decoration:none;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>

<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<script>
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}
function admindedeletemsg(id){
	$('#content1').html('Are you sure you want to delete?');
	
}
</script>
