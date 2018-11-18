<?php
//Add qty text before qty selector
add_action( 'woocommerce_before_add_to_cart_quantity', 'adv_echo_qty_front_add_cart', 100 );

function adv_echo_qty_front_add_cart() {
        if(is_product() && has_term( 'adventure', 'product_cat' )){
            echo '<div class="qty" style="padding:5px 10px 0 0;">No. of Travelers:</div>'; 
        }
	if(is_product() && has_term( 'outbound', 'product_cat' )){
            echo '<div class="qty" style="padding:5px 10px 0 0;">No. of Pax:</div>'; 
        }
        else {
			         echo '<div class="qty" style="padding:5px 10px 0 0;">Qty:</div>'; 
		}
}
