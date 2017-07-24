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



/* Function to defer loaded scripts
ref: https://jasonyingling.me/fixing-render-blocking-scripts-third-party-sources-wordpress/ */
function js_async_attr($tag){
// Do not add defer attribute to these scripts
$scripts_to_exclude = array('jquery.min.js');
foreach($scripts_to_exclude as $exclude_script){
	if(true == strpos($tag, $exclude_script ) )
	return $tag;    
}
// Defer or async all remaining scripts not excluded above
return str_replace( ' src', ' defer src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );



/* Function to asynchronously load scripts */
function aty_js_async_attr($tag){
	// Add async attribute to these scripts
	$scripts_to_include = array('jquery.min.js');
	foreach($scripts_to_include as $include_script){
		if(true == strpos($tag, $include_script ))
		// Async the scripts included above
		return str_replace( ' src', ' async src', $tag );
	}
	// Return original tag for all scripts not included
	return $tag;
}
add_filter( 'script_loader_tag', 'aty_js_async_attr', 10 );



function site_scripts() {
	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		// We don't need oEmbed
        wp_deregister_script( 'wp-embed' ); 
        // Or comments
        wp_deregister_script( 'comment-reply' );

        // Remove WP jQuery and Migrate
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null);
        wp_enqueue_script('jquery'); 

		// Load Your styles and scripts
		wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );

	}
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);