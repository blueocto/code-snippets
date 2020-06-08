<?php
// this file must be called in your functions.php

add_action('wp_ajax_myfilter', 'blueocto_filter_function'); // wp_ajax_{ACTION HERE} 
// see the HTML
// <input type="hidden" name="action" value="myfilter">
add_action('wp_ajax_nopriv_myfilter', 'blueocto_filter_function');
 
function blueocto_filter_function(){
	// must be declaired first
	$args = [
		'post_type' => 'property',
		'posts_per_page' => '-1'
	];
	
	// die();
	$taxonArr = [];
	if( 
		(empty($_POST['property']) && empty($_POST['area']))
		 || (in_array('-1', $_POST['property']) && in_array('-1', $_POST['area']) ) ) {
		//dont do any tax filters
		// $s_array['tax_query'] = [];
	}else{
		if(!empty($_POST['property']) && !in_array('-1', $_POST['property']) ) {
			array_push($taxonArr, array(
				'taxonomy' => 'property-type',
				'field' => 'id',
				'terms' => $_POST['property']
			));
		}
		if(!empty($_POST['area']) && !in_array('-1', $_POST['area']) ) {
			array_push($taxonArr, array(
				'taxonomy' => 'area-type',
				'field' => 'id',
				'terms' => $_POST['area']
			));
		}
		
		$args['tax_query'] = array(
			'relation' => 'AND',
			$taxonArr[0]
		);
	}

	// $cpt_query = array_merge( $s_array, (array) $wp->query_vars );

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {

		echo '<div class="row expanded devs--row">';

			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
			get_template_part( 'template-parts/property-excerpt' );
		
			} //endwhile
			
			wp_reset_postdata();

		echo '</div>';

	} else {
		
		get_template_part( 'template-parts/content', 'none' );

	 } //End have_posts() check.

	die();

}