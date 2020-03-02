<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  <link href="<?php echo base_url(); ?>assets/design/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/design/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/design/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/css/bootstrapValidator.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>assets/design/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/design/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/design/css/custom _suc.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/design/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/js/bootstrapValidator.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/js/bootstrapValidator.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/design/js/dataTables.bootstrap4.min.js"></script> 
  
  <!-- Global site tag (gtag.js) - Google Analytics -->


</head> 


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