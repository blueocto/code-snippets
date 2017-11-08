<?php
// Detect any loaded scripts or styles and display their handle on the front-end

function wpcustom_inspect_scripts_and_styles() {
	global $wp_scripts;
	global $wp_styles;

	// Runs through the queue scripts
	foreach( $wp_scripts->queue as $handle ) :
		$scripts_list .= $handle . ' | ';
	endforeach;

	// Runs through the queue styles
	foreach( $wp_styles->queue as $handle ) :
		$styles_list .= $handle . ' | ';
	endforeach;

	printf('Scripts: %1$s  Styles: %2$s', 
	$scripts_list, 
	$styles_list);
}
add_action( 'wp_print_scripts', 'wpcustom_inspect_scripts_and_styles' );

// Then you can dequeue or deregister them here

function wpcustom_deregister_scripts_and_styles(){
	wp_dequeue_style( 'storefront-style' ); 
	wp_dequeue_style( 'storefront-icons' ); 
	wp_dequeue_style( 'storefront-fonts' ); 
	wp_dequeue_style( 'storefront-woocommerce-style' ); 
	wp_dequeue_style( 'storefront-child-style' ); 
	wp_dequeue_style( 'main-styles' ); 
}
add_action( 'wp_print_styles', 'wpcustom_deregister_scripts_and_styles', 100 );

