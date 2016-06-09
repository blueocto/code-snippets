// Before anything...
<?php global $woocommerce; ?>

// Output Cart URL
<?php echo $woocommerce->cart->get_cart_url(); ?>

// Output "title" text
<?php _e('View your shopping cart', 'woothemes'); ?>">

// "% items" in Cart
<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>

// Get Cart Total
<?php echo $woocommerce->cart->get_cart_total(); ?>

// Show SKU code
<?php echo $_product->sku; ?>

// Show quantity of a product as plain text (or near enough)
<?php 
  if ( $_product->is_sold_individually() ) { 
  //$product_quantity = sprintf( '1 ', $cart_item_key ); 
  } else { 
  $product_quantity = sprintf( '%s', esc_attr( $values['quantity'] ) );
  } 
  echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity );
?>