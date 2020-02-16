<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">

   
   
          <div class="panel panel-info">
          
            <div class="panel-body">
              <div class="row justify-content-center d-flex">
			  <form action="<?php echo base_url('payment/confirmation'); ?>" method="POST">
			  <input type="hidden" id="c_amount" name="c_amount" value="">
			  <input type="hidden" id="p_id" name="p_id" value="<?php echo isset($p_d['p_id'])?$p_d['p_id']:''; ?>">
               <div class=" col-md-8 card py-4"> 
				 <table class="table table-user-information">
					<tbody>
                      <tr>
                        <td>Title:</td>
                        <td><?php echo isset($p_d['title'])?$p_d['title']:''; ?></td>
                      </tr>
					  <tr>
                        <td>Description:</td>
                        <td><?php echo isset($p_d['description'])?$p_d['description']:''; ?></td>
                      </tr>
                      <tr>
                        <td>Amount</td>
                        <td><?php echo isset($p_d['amt'])?$p_d['amt']:''; ?></td>
                      </tr>
					  <tr>
                        <td>Promo Code</td>
                        <td>
						<input type="text" class="form-control" name="p_code" id="p_code" value="">
						<span id="c_s_msg"></span>
						<button class="btn btn-warning" id="c_apply_id" type="button" onclick="apply_p_code();">Apply</button>
						</td>
                      </tr>
					  
                    </tbody>
                  </table>
                  
                </div>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<div class="clearfix">&nbsp;</div>
              </div>
            </div>
                
            
          </div>
       </main>
  <!-- page-content" -->

</section>
<script>
function apply_p_code(){
	var pcode=$('#p_code').val();
	if(pcode!=''){
		jQuery.ajax({
				url: "<?php echo site_url('payment/check_coupon_code');?>",
				type: 'post',
				data: {
					p_code: pcode,
					p_id: <?php echo isset($p_d['p_id'])?$p_d['p_id']:''; ?>,
					},
				dataType: 'json',
				success: function (data) {
						if(data.msg==1){
						$("#c_s_msg").empty();
						$("#c_s_msg").append(data.text);
						$("#c_amount").empty();
						$("#c_amount").val(data.c_amount);
						$("#c_apply_id").hide();
						}
				
				}
			});
	}
}
</script>
