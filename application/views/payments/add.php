
<div class="content-wrapper">
 <section class="content-header mb-4">
      <h1> Add Payment </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo base_url('payments/index'); ?>"><i class="fa fa-list"></i> list</a></li>
         <li class="active">Add Payment</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Video</h3>
            </div>
			<div style="padding:20px;">
			<form id="addemp" method="post"  action="<?php echo base_url('payments/addpost'); ?>" enctype="multipart/form-data">
					<?php $csrf = array(
						'name' => $this->security->get_csrf_token_name(),
						'hash' => $this->security->get_csrf_hash()
									); ?>
					<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Title </label>
							<div class="">
								<input type="text" class="form-control" name="title" placeholder="Enter Title name" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Description</label>
							<div class="">
								<input type="text" class="form-control" name="description" placeholder="Enter Description" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Amount</label>
							<div class="">
								<input type="text" class="form-control" name="amt" placeholder="Enter Amount" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Promo Code </label>
							<div class="">
								<input type="text" class="form-control" name="promo" placeholder="Enter Promo Code" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Promo Code Amount</label>
							<div class="">
								<input type="text" class="form-control" name="promo_amt" placeholder="Enter Promo Code Amount" />
							</div>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="form-group">
					   <div class="col-lg-12 text-center">
						  <button type="submit" class="btn btn-primary  " name="signup" value="Sign up">Add</button>
					   </div>
                    </div>					
			   </form>
			</div>
			<div class="clearfix">&nbsp;</div>
         
          </div>
		</div>
      
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section> 
</div>
  <script type="text/javascript">
$(document).ready(function() {
  $('#addemp').bootstrapValidator({
		fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'Title is required'
                    }
                }
            },type: {
                validators: {
                    notEmpty: {
                        message: 'type is required'
                    }
                }
            },topic: {
                validators: {
                    notEmpty: {
                        message: 'Topic is required'
                    }
                }
            },teacher: {
                validators: {
                    notEmpty: {
                        message: 'Teacher  is required'
                    }
                }
            },video: {
                validators: {
					notEmpty: {
                        message: 'Video is required'
                    },
					regexp: {
					regexp: "(.*?)\.(mp4|Mp4|MP4)$",
					message: 'Uploaded file is not a valid. Only mp4 file are allowed'
					}
				}
            }
        }
    });

});
</script>
