<?php

/*** Add wrapper to all pages ***/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="body_cont inner">';
}
function my_theme_wrapper_end() {
  echo '</div>';
}
add_theme_support( 'woocommerce' );


/*** Add theme support for post thumbnails (featured images). ***/

add_theme_support( 'post-thumbnails', array( 'post', 'page', 'product' ) );


/*** Add WooCommerce support for thumbnails ***/

// Add theme support for Woocommerce thumbnails, and integrate the size settings.
if( function_exists( 'add_theme_support' ) ) {
    if( get_option( 'woo_post_image_support' ) == 'true' ) {
        add_theme_support( 'post-thumbnails' );
    }
}


/*** wc_remove_related_products | Clear the query arguments for related products so none show. ***/

function wc_remove_related_products( $args ) {
    return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10)


?>