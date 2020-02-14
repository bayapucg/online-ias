<div class="content-wrapper">
<section class="content-header">
      <h1>
        Home Page Facts
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home Page Facts</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Home Page Facts</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="defaultForm" method="post" class="" action="<?php echo base_url('content/factpost'); ?>" enctype="multipart/form-data">
					<?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
						); ?>
								<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
								<div class="col-md-12">
									<div class="form-group">
										<label class=" control-label">Text</label>
										<div class="">
											<textarea type="text" class="form-control" name="text" id="text" placeholder="Enter Text" ><?php echo isset($home_facet_d['text'])?$home_facet_d['text']:''; ?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class=" control-label">Sheaps</label>
										<div class="">
											<input type="text" class="form-control" name="sheaps" id="sheaps" placeholder="Enter sheaps " value="<?php echo isset($home_facet_d['text'])?$home_facet_d['text']:''; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class=" control-label">Goats</label>
										<div class="">
											<input type="text" class="form-control" name="goats" id="goats" placeholder="Enter Goats " value="<?php echo isset($home_facet_d['goats'])?$home_facet_d['goats']:''; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class=" control-label">Country Birds</label>
										<div class="">
											<input type="text" class="form-control" name="country_birds" id="country_birds" placeholder="Enter Country Birds " value="<?php echo isset($home_facet_d['country_birds'])?$home_facet_d['country_birds']:''; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class=" control-label">Hard Workers</label>
										<div class="">
											<input type="text" class="form-control" name="hard_workers" id="hard_workers" placeholder="Enter Hard Workers " value="<?php echo isset($home_facet_d['hard_workers'])?$home_facet_d['hard_workers']:''; ?>">
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
<script>
function remove_h_a_service(id){
	if(id!=''){
		 jQuery.ajax({
					url: "<?php echo site_url('content/remove_homepage_service_more');?>",
					data: {
						h_p_a_sm_id: id,
					},
					dataType: 'json',
					type: 'POST',
					success: function (data) {
					if(data.msg==1){
						jQuery('#t_abt_id'+id).empty();
						jQuery('#t_abt_id'+id).hide();
						jQuery('#abt_id'+id).val(0);
					}
				 }
				});
			}
}
</script>
  <script type="text/javascript">
  $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<input type='hidden' name='h_p_a_sm_id[]'  value='0'><td class='form-group'> <input type='text' name='ab_title[]' placeholder='Enter Tilte' class='form-control'> </td><td class='form-group'> <input type='text' name='ab_subtitle[]' placeholder='Enter Subtilte' class='form-control'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
$(document).ready(function() {
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
            name: {
                validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumeric, space and dot'
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
            },phone: {
                 validators: {
					notEmpty: {
						message: 'Phone  Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Phone  Number must be 10 to 14 digits'
					}
				
				}
            },
			address: {
                 validators: {
					notEmpty: {
						message: 'Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address wont allow <> [] = % '
					}
				
				}
            },
			notes: {
                 validators: {
					notEmpty: {
						message: 'Notes is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Notes wont allow <> [] = % '
					}
				
				}
            },
			image: {
                validators: {
					regexp: {
					regexp: "(.*?)\.(png|jpeg|jpg|gif)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif files are allowed'
					}
				}
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>

