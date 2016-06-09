<?php

//Add theme support for post thumbnails (featured images).
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'product' ) );

//Add WooCommerce support
add_theme_support( 'woocommerce' );
// Add theme support for Woocommerce thumbnails, and integrate the size settings.
if( function_exists( 'add_theme_support' ) ) {
    if( get_option( 'woo_post_image_support' ) == 'true' ) {
        add_theme_support( 'post-thumbnails' );
    }
}

?>