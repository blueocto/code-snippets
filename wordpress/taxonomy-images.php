<?php

// Install plugin "Taxonomy Images"
// Settings > Taxonomy Images > select which you'd like it to apply to
// Refer to the plugin Description to insert code in your template


	$categories = get_categories( 'orderby=id&taxonomy=projects' );
	foreach( $categories as $cat ) : if( !$cat->parent ) {
		echo '<div class="type-project">';
		echo '<a title="' . $cat->name . '" href="' . $cat->slug . '">';
		echo '<p>' . $cat->name . '</p>';
		// this snippet is what you need to pull in category image
		$url = get_category_link( $cat->term_id );
		$img = $taxonomy_images_plugin->get_image_html( 'thumbnail', $cat->term_taxonomy_id );
		if( !empty( $img ) ) print $img;
		// end snippet
		echo '</a></div>';
		
	}
	
	endforeach;
?>