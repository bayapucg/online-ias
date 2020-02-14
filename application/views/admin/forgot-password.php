<body class="hold-transition login-page" style="background-image: url('<?php echo base_url(); ?>assets/design/img/bg-login.png');background-position: center;
  background-size:cover;height:100%">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(''); ?>"><img style="width:120px;margin:0 auto;" class="img-responsive" src="<?php echo base_url(); ?>assets/design/img/logo.png"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>

    <form id="defaultForm" method="post" class="" action="<?php echo base_url('admin/forgotpost'); ?>">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Email" name="email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		  </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Forgot</button>
        </div>
		
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
 <script type="text/javascript">
$(document).ready(function() {
    
    $('#defaultForm').bootstrapValidator({

        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email id is required'
                    }
                }
            },
            pwd: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

});
</script>
</body>
</html>

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
