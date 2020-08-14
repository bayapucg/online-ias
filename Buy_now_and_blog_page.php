Blog  page  purpose  :

.img-box img {
 width: 170px !important;
height: 150px !important;
}
@media (max-width: 767px) {
.img-box img {
 max-width: 100%;
    display: block !important;
    position: relative;
    border-radius: 3px;
    transition: all .5s;
}
}

/*--------------------*/
Buy now button purpose(js) : 
<script>
jQuery('.pisol_buy_now_button ').addClass('disabled');
	if(window.location.href=='https://www.taevasglobal.com/ecoairmask/'){
		var myVar = setInterval(function(){
				if(document.getElementsByName("variation_id")[0].value >0){
				  jQuery('.pisol_buy_now_button').removeClass('disabled');
				}else{
					  jQuery('.pisol_buy_now_button ').addClass('disabled');
				} 
	}, 100);
}
/* ----*/
jQuery(document).ready(function(){
 jQuery('.pisol_single_buy_now').prop("disabled", true);
 jQuery('.pisol_single_buy_now').removeAttr("pisol_single_buy_now");
});
jQuery(".pisol_buy_now_button").click(function(){
	if(document.getElementsByName("variation_id")[0].value==0){
		alert('Please select both Color/Size options before adding this product to your cart.');return false;
	}
});

</script>

Buy now button css  :

.button.pisol_buy_now_button.pisol_type_variable.wc-variation-selection-needed {
width: 111px !important;
margin-left: 5px;
margin-top: 0px !important;
padding-top: 8px !important;
padding-bottom: 9px !important;
background-color: #72d5de !important;
}

file Path : public_html/airmask/wp-content/plugins/add-to-cart-direct-checkout-for-woocommerce/public/class-pi-dcw-buy-now.php
replace below function 
<?php
public function add_quick_buy_button() {
		global $product;
		$product_id = $product->get_id();
		$class = 'pisol_type_'.$product->get_type();
		
		if ( $product->get_type() == 'variable'){
			echo '<input class="button  pisol_buy_now_button '.$class.'" type="submit" name="pi_quick_checkout" value="'.esc_attr($this->label_loop).'">';
		}else{
			echo '<button class="button pisol_single_buy_now pisol_buy_now_button '.$class.'" type="submit" name="add-to-cart" value="'.esc_attr($product_id).'">'.$this->label_loop.'</button>
			
			';
		}	
}
?>



