<?php

/* ==========================================================================
	remove query strings from static resources
========================================================================== */
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



/* ==========================================================================
	Async or Defer enqueued scripts
========================================================================== */

// Async load
function async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
    return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'async_scripts', 11, 1 ); 

// Defer load
function defer_scripts($url)
{
    if ( strpos( $url, '#deferload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#deferload', '', $url );
    else
    return str_replace( '#deferload', '', $url )."' defer='defer"; 
    }
add_filter( 'clean_url', 'defer_scripts', 11, 1 );

// Example code
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js#deferload', array( 'jquery' ), '6.2.3', true );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.min.js#deferload', array( 'jquery' ), '', true );
}



?>