/*** 
** Gravity Forms - control styles for each form 
** change the "formid1" for each instance
***/
function dequeue_formid1_stylesheets() {
	// wp_dequeue_style( 'gforms_reset_css' );
	wp_dequeue_style( 'gforms_datepicker_css' );
	wp_dequeue_style( 'gforms_formsmain_css' );
	// wp_dequeue_style( 'gforms_ready_class_css' );
	wp_dequeue_style( 'gforms_browsers_css' );
}
add_action( 'gform_enqueue_scripts_1', 'dequeue_formid1_stylesheets', 11 );

