<?php 

/* Unhook the new Gravity Forms stylesheets, so we can style without so many overrides */
add_action( 'gform_enqueue_scripts_1', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
	wp_deregister_style( 'gravity_forms_theme_reset' );
	wp_deregister_style( 'gravity_forms_theme_framework' );
	wp_deregister_style( 'gravity_forms_orbital_theme' );
}
