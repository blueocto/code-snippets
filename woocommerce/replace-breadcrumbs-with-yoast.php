/* 
** Replace WooCommerce Breadcrumbs With Yoast Breadcrumbs
** Last Tested: Jan 25, 2018 using Yoast SEO 6.2 on WordPress 4.9.2
** Theme: Non-WooThemes like Twenty Seventeen, Genesis
*/
/* Remove WooCommerce Breadcrumbs */
remove_action( 'init', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
/* Add Yoast Breadcrumbs */
add_action( 'woocommerce_before_main_content','my_yoast_breadcrumb', 20, 0 );
if (!function_exists('my_yoast_breadcrumb') ) {
    function my_yoast_breadcrumb() {
        echo '<div class="row breadcrumbs-row">'; 
            echo '<div class="small-12 columns">'; 
                yoast_breadcrumb('<span id="breadcrumbs" class="yoast-breadcrumbs">','</span>');
            echo '</div>'; 
        echo '</div><!-- // row -->'; 
    }
}