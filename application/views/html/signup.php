 <section class="bg-login" >
      <div class="container h-100">
		<div class="d-flex justify-content-center h-100 " style=" position:absolute; top: 60%;
 left: 50%;-ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/design/img/login-logo.png" class="brand_logo" alt="Logo"></a>
					</div>
				</div>
				<div class="mt-5 cust-heigh">
					<form id="defaultForm" method="post"  action="<?php echo base_url('user/signuppost'); ?>">
						<input type="hidden" name="role" value="2">
						<div class="input-group mb-3 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" name="name" class="form-control input_user" value="" placeholder="Name">
						</div>
						<div class="input-group mb-2 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="text" name="email" class="form-control " value="" placeholder="Email Id">
						</div>
						<div class="input-group mb-2 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-mobile"></i></span>
							</div>
							<input type="text" name="mobile" class="form-control " value="" placeholder="Mobile No">
						</div>
						<div class="input-group mb-2 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="pwd" class="form-control " value="" placeholder="Enter Password">
						</div>
						<div class="input-group mb-2 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="confirmpwd" class="form-control " value="" placeholder="Confirm  Password">
						</div>

						
							<div class="d-flex justify-content-center mt-3 ">
							<button type="submit" class="btn btn-primary btn-block" name="signup" value="Sign up">Signup</button>
				 	
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="<?php echo base_url('user'); ?>" class="ml-2">Login</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	</section>
	
	<script type="text/javascript">
$(document).ready(function() {
   $('#defaultForm').bootstrapValidator({
        fields: {
           name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
                }
            },mobile: {
                 validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
                }
            },pwd: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters. '
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },confirmpwd: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'pwd',
						message: 'Password and Confirm Password do not match'
					}
					}
				}
        }
    });

});
</script>
