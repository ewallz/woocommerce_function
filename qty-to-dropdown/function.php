<?php
//WC change qty input to dropdown
function woocommerce_quantity_input($data = null) {
 global $product;
  if (!$data) {
    $defaults = array(
      'input_name'    => 'quantity',
      'input_value'   => '1',
      'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
      'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
      'step'          => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
      'style'         => apply_filters( 'woocommerce_quantity_style', 'float:left;', $product )
    );
  } else {
    $defaults = array(
      'input_name'    => $data['input_name'],
      'input_value'   => $data['input_value'],
      'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
      'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
      'step'          => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
      'style'         => apply_filters( 'woocommerce_quantity_style', 'float:left;margin-right:5px;', $product )
    );
  }
  
  if ( ! empty( $defaults['min_value'] ) )
    $min = $defaults['min_value'];
  else $min = 1;
  if ( ! empty( $defaults['max_value'] ) )
    $max = $defaults['max_value'];
  else $max = 50;
  if ( ! empty( $defaults['step'] ) )
    $step = $defaults['step'];
  else $step = 1;
  $options = '';
  //fix add to cart data to send on cart page
	if (!empty($defaults['input_name'])) {
	  $name = esc_attr($defaults['input_name']);
	} else {
	  $name = 'quantity';
	}
	
  for ( $count = $min; $count <= $max; $count = $count+$step ) {
    $selected = $count === $defaults['input_value'] ? ' selected' : '';
    $options .= '<option value="' . $count . '"'.$selected.'>' . $count . '</option>';
  }
  
  echo '<div class="quantity_select" style="' . $defaults['style'] . '"><select name="' . $name . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty form-control">' . $options . '  </select></div>';
}
