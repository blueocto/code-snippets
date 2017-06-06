<?php

// Defer load
// function defer_scripts($url)
// {
//     if ( strpos( $url, '#deferload') === false )
//         return $url;
//     else if ( is_admin() )
//         return str_replace( '#deferload', '', $url );
//     else
//     return str_replace( '#deferload', '', $url )."' defer='defer"; 
//     }
// add_filter( 'clean_url', 'defer_scripts', 11, 1 );



/* Function to defer or asynchronously load scripts not aggregated by Autoptimize
ref: https://jasonyingling.me/fixing-render-blocking-scripts-third-party-sources-wordpress/ */
function js_async_attr($tag){

# Do not add defer or async attribute to these scripts
$scripts_to_exclude = array('jquery.min.js');
 
foreach($scripts_to_exclude as $exclude_script){
    if(true == strpos($tag, $exclude_script ) )
    return $tag;    
}

# Defer or async all remaining scripts not excluded above
return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );



/*Function to defer or asynchronously load scripts not aggregated by Autoptimize*/
function aty_js_async_attr($tag){

    # Add defer or async attribute to these scripts
    $scripts_to_include = array('js.stripe.com', 'devicepx-jetpack.js');

    foreach($scripts_to_include as $include_script){
        if(true == strpos($tag, $include_script ))
        # Async the scripts included above
        return str_replace( ' src', ' async="async" src', $tag );
    }

    # Return original tag for all scripts not included
    return $tag;

}
add_filter( 'script_loader_tag', 'aty_js_async_attr', 10 );



// Remove jQuery Migrate Script from header
function crunchify_stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        // We don't need oEmbed
        wp_dequeue_script_script('wp-embed'); 
        // Remove WP jQuery and Migrate
        wp_dequeue_script_script('jquery');
        // USe your own jQuery source instead
        //wp_register_script('jquery', get_template_directory_uri() . '/vendor/jquery/jquery-deprecated-sizzle-wrap.min.js', false, '1.11.0');
        wp_dequeue_script_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, '1.12.4');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');


function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'jquery' ), '6.2.3', true );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);