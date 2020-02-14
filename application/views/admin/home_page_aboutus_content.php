<div class="content-wrapper">
<section class="content-header">
      <h1>
        About Us details
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">About Us details</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Us details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="defaultForm" method="post" class="" action="<?php echo base_url('content/aboutuspost'); ?>" enctype="multipart/form-data">
					<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
						); ?>
								<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
								
								
								<div class="col-md-12">
									<div class="form-group">
										<label class=" control-label">About Us</label>
										<div class="">
											<textarea type="text" class="form-control" name="aboutus" id="aboutus" placeholder="Enter about Us" ><?php echo isset($ab_d['aboutus'])?$ab_d['aboutus']:''; ?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class=" control-label">Why Choose Us?</label>
										<div class="">
											<textarea type="text" class="form-control" name="choose_us" id="choose_us" placeholder="Enter Why Choose Us" ><?php echo isset($ab_d['choose_us'])?$ab_d['choose_us']:''; ?></textarea>
										</div>
									</div>
								</div>
						

						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-10">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update</button>
								<a href="classes.php" type="submit" class="btn btn-warning" >Back</a>
                                
                            </div>
                        </div>
						
                    </form>
					<div class="clearfix">&nbsp;</div>
          </div>
          </div>
          <!-- /.box -->

         

        </div>
      
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section> 
</div>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<script>
$(function () {
    CKEDITOR.replace('aboutus');
    $(".textarea").wysihtml5();
  }); 
  $(function () {
    CKEDITOR.replace('choose_us');
    $(".textarea").wysihtml5();
  }); 
</script>

