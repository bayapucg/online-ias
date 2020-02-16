<style>
	.razorpay-payment-button{
		 background:#192f5d;
		 color:#fff;
		 padding:9px;
		 border:none;
		 border-radius:3px;
		 margin-top:5px;
		 
	 }
	 table {
  border-collapse: collapse !important;
}

table, td, th {
  border: 1px solid black !important;
  padding:8px !important;
}
</style>
<section style="background:#f1f1f1;" >

		
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
<main class="page-content">
<?php //echo "<pre>";print_r($bill_details);exit; ?>
<div class="container " style="">
	<div class="row justify-content-md-center">
		<div class=" col-md-6 card py-2 mt-4 col-md-offset-3 bg-white">
			<div>
				<div class=" text-center">
					<h2>Bill Preview</h2>
				</div>
				
				<table class="table table-bordered">
					<tr>
						<th>Title</th>
						<td>
							<?php echo isset($p_de[ 'title'])?$p_de[ 'title']: ''; ?>
						</td>
					</tr>
					<tr>
						<th>Description</th>
						<td>
							<?php echo isset($p_de[ 'description'])?$p_de[ 'description']: ''; ?>
						</td>
					</tr>
					<tr>
						<th>Mobile</th>
						<td>
							<?php echo isset($u_de[ 'mobile'])?$u_de[ 'mobile']: ''; ?>
						</td>
					</tr>
					<tr>
						<th>Total Amount</th>
						<td>
							<?php echo isset($p_de['amt'])?$p_de['amt']: ''; ?>
						</td>
					</tr>
					<?php if(isset($p_post_d['c_amount']) && $p_post_d['c_amount']!=''){ ?>
					<tr>
						<th>Promo Code</th>
						<td>
							<?php echo isset($p_de['promo'])?$p_de['promo']: ''; ?>
						</td>
					</tr>
					<tr>
						<th>Promo Code Amount</th>
						<td>
							<?php echo isset($p_de['promo_amt'])?$p_de['promo_amt']: ''; ?>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<th>Pay Amount</th>
						<td>
							<?php echo isset($paid_amt)?$paid_amt: ''; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-md-3">	<a href="<?php echo base_url('payment/index'); ?>" class="btn btn-warning">Edit</a>
					</div>
					<div class="col-md-3">
						<form id="paymentform" name="paymentform" action="<?php echo base_url('payment/success'); ?>" method="POST">
						<?php $csrf = array(
						'name' => $this->security->get_csrf_token_name(),
						'hash' => $this->security->get_csrf_hash()
									); ?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				
							<script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $details['key']?>" data-amount="<?php echo $details['amount']?>" data-currency="INR" data-name="<?php echo $details['name']?>" data-image="<?php echo $details['image']?>" data-description="<?php echo $details['description']?>" data-prefill.name="<?php echo $details['prefill']['name']?>" data-prefill.email="<?php echo $details['prefill']['email']?>" data-prefill.contact="<?php echo $details['prefill']['contact']?>" data-notes.shopping_order_id="<?php echo $bill_details['b_id']?>" data-order_id="<?php echo $details['order_id']?>" <?php if ($details[ 'display_currency'] !=='INR' ) { ?>
								data-display_amount="<?php echo $details['amount']?>" <?php } ?>
								    <?php if ($details['display_currency'] !== 'INR') { ?> data-display_currency="<?php echo $details['display_currency']?>" <?php } ?>
								  >
							</script>
							<!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
							<input type="hidden" name="p_id" value="<?php echo isset($p_de['p_id'])?$p_de['p_id']:''; ?>">
							<input type="hidden" name="total_amt" value="<?php echo isset($fee_details['cart_amt_delivery_c'])?$fee_details['cart_amt_delivery_c']: ''; ?>">
							<input type="hidden" name="paid_amt" value="<?php echo isset($paid_amt)?$paid_amt:''; ?>">
							<input type="hidden" name="coupon_code" value="<?php echo isset($p_post_d['c_amount'])?$p_post_d['c_amount']:''; ?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> &nbsp;</div>
</main>
  <!-- page-content" -->

</section>