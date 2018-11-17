//Add qty text before qty selector
add_action( 'woocommerce_before_add_to_cart_quantity', 'ew_echo_qty_front_add_cart' );
 
function ew_echo_qty_front_add_cart() {
 echo '<div class="qty" style="padding:5px 10px 0 0;">Qty:</div>'; 
}
