<?php 

/*** What a nightmare I had with this! ***/


/** Step 1 **/

// Copy the contents of /woocommerce/templates/... from the WooCommerce plugin
// to your theme folder, e.g. /mytheme/woocommerce/...


/** Step 2 **/

// In the WooCommerce plugin admin > Catalog > bottom of the page are the sizing options

// Catalog Images        W x H    : anything in the loop, categories, etc
// Single Product Image  W x H    : largest image on the single product page
// Product Thumbnails    W x H    : thumbnail images beneath (or in a gallery), on the single product page

// This corresponds with the code in the templates...

$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );

// where 'shop_large' = Single Product Image
// where 'shop_thumbnail' = Product Thumbnails


/** Step 3 **/

// Include the following in your functions.php to enable featured image = Single Product Image

// Add theme support for post thumbnails, and integrate the size settings.
if( function_exists( 'add_theme_support' ) ) {
    if( get_option( 'woo_post_image_support' ) == 'true' ) {
        add_theme_support( 'post-thumbnails' );
    }
}

?>