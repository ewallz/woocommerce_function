<?php
//Add text after price
function ew_change_product_price_display( $price ) {
            // different text for certain categories
        if ( has_term( 'adventure', 'product_cat')) {
            $price .= ' /person';
            return $price;
        }
        if ( has_term( 'rental', 'product_cat')) {
            $price .= ' /day';
            return $price;
        }
        if ( has_term( 'outbound', 'product_cat')) {
            $price .= ' /pax';
            return $price;
        }
        //for other categories
        else {
            return $price;
        }
    
}
add_filter( 'woocommerce_get_price_html', 'ew_change_product_price_display' );
//add_filter( 'woocommerce_cart_item_price', 'ew_change_product_price_display' ); -- if want to display on cart
