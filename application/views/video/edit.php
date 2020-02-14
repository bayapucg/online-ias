
<div class="content-wrapper">
 <section class="content-header mb-4">
      <h1> Edit Video </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo base_url('video/index'); ?>"><i class="fa fa-list"></i> list</a></li>
         <li class="active">Edit Video</li>
      </ol>
   </section>
   <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Video
			  </h3>
            </div>
			<div style="padding:20px;">
			<form id="addemp" method="post"  action="<?php echo base_url('video/editpost'); ?>" enctype="multipart/form-data">
			<?php $csrf = array(
						'name' => $this->security->get_csrf_token_name(),
						'hash' => $this->security->get_csrf_hash()
									); ?>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
			<input type="hidden" name="v_id" value="<?php echo isset($v_d['v_id'])?$v_d['v_id']:''; ?>">
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Title </label>
							<div class="">
								<input type="text" class="form-control" name="title" value="<?php echo isset($v_d['title'])?$v_d['title']:''; ?>" placeholder="Enter Title name" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Topic</label>
							<div class="">
								<input type="text" class="form-control" name="topic" value="<?php echo isset($v_d['topic'])?$v_d['topic']:''; ?>" placeholder="Enter Topic name" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Teacher </label>
							<div class="">
								<input type="text" class="form-control" name="teacher" value="<?php echo isset($v_d['teacher'])?$v_d['teacher']:''; ?>" placeholder="Enter Teacher name" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class=" control-label">Video </label>
							<div class="">
								<input type="file" class="form-control" name="video" placeholder="Enter Teacher name" />
							</div>
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="form-group">
					   <div class="col-lg-12 text-center">
						  <button type="submit" class="btn btn-primary  " name="signup" value="Sign up">Update</button>
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

