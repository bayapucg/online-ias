<head>
	<title>Online IAS Academy | By Kiran Anishetti </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="onlineiasacademy, online-ias-academy, online ias academy in hyderabad, political science, upsc mains, civil services" name="keywords"/>
  <meta content="Online IAS Academy - The vision to reach millions of Civil Service aspirants all over India especially with optional subjects Political Science and International Relations." name="description"/>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158852895-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158852895-1');
</script>
</head>
 <section class="bg-login" >
      <div class="container h-100">
		<div class="d-flex justify-content-center h-100 " style=" position:absolute; top: 50%;
 left: 50%;-ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/design/img/login-logo.png" class="brand_logo" alt="Logo">
						</a>
					</div>
				</div>
				<div class="mt-5 cust-heigh">
					<form id="defaultForm" method="post"  action="<?php echo base_url('user/loginpost'); ?>">
						<div class="input-group mb-3 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" name="uname" class="form-control input_user" value="" placeholder="Email/Mobile">
						</div>
						<div class="input-group mb-2 form-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="pwd" class="form-control " value="" placeholder="password">
						</div>

						
							<div class="d-flex justify-content-center mt-3 ">
							<button type="submit"class="btn btn-primary btn-block" name="signup" value="Sign up">Login</button>
				 	
				   </div>
					</form>
				</div>
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="<?php echo base_url('user/registration'); ?>" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="<?php echo base_url('user/forgotpassword'); ?>">Forgot your password?</a>
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
            uname: {
                validators: {
                    notEmpty: {
                        message: 'Email/Mobile is required'
                    }
                }
            },
            pwd: {
                validators: {
                    notEmpty: {
                         message: 'Password is required'
                    }
                }
            }
        }
    });

});
</script>
