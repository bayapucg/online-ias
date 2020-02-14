<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">

   
   
          <div class="panel panel-info">
          
            <div class="panel-body">
              <div class="row justify-content-center d-flex">
			  
               <div class=" col-md-8 card py-4 "> 
				  <h2 class="text-center">Change Password</h2>

	<div class="container-fluid">
            <form id="changepassword" method="post" class="" action="<?php echo base_url('profile/pwdpost'); ?>" enctype="multipart/form-data">
      <div class="row ">
			<div class="form-group col-md-6">
				<label class="">Old password</label>
				<div class="">
					<input type="password" class="form-control" name="oldpassword" id="oldpassword" value="" placeholder="Enter Old Password" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">New Password</label>
				<div class="">
					<input type="password" class="form-control" name="password" value="" id="password" placeholder="Enter New Password" />
				</div>
			</div>
			<div class="form-group col-md-6">
				<label class="">Confirm Password</label>
				<div class="">
					<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" value="" placeholder="Enter Confirm password" />
				</div>
			</div>
			
			<div class="form-group col-lg-12">
				<div class="justify-content-center d-flex">
					<button type="submit" class="btn btn-primary" name="signup" > Update Password </button>
				  
				</div>
			</div>
                    
		
      </div>
     </form>
        
    </div>
                  
                </div>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>

<script type="text/javascript">
$(document).ready(function() {
    $('#changepassword').bootstrapValidator({
        
        fields: {
            oldpassword: {
                validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            }, password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
            confirmpassword: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
					}
					}
				}
            }
        })
     
});

</script>

