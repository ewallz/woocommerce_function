<?php
//Payment Gateway for Packages/Cruise/Adventure/Outbound
add_filter( 'woocommerce_available_payment_gateways', 'pkg_unset_gateway_by_category' );
 
function pkg_unset_gateway_by_category( $available_gateways ) {
global $woocommerce;
$unset = false;
$category_ids = array( 83,197,199,221); // The ID of the category for which the gateway  will be removed.  Get the ID by clicking on the category under Products -> Categories and reading the "tag_ID" in the address bar.
foreach ( $woocommerce->cart->cart_contents as $key => $values ) {
    $terms = get_the_terms( $values['product_id'], 'product_cat' );    
    foreach ( $terms as $term ) {        
        if ( in_array( $term->term_id, $category_ids ) ) {
            $unset = true;
            break;
        }
    }
}
    if ( $unset == true ) unset( $available_gateways['billplz'] );
    if ( $unset == true ) unset( $available_gateways['paypal'] );// One of the five hardcoded Woocommerce standard types of payment gateways - paypal, cod, bacs, cheque or mijireh_checkout
    return $available_gateways;
}
