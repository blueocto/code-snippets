<?php 

	// Orders all top-level categories by ID, wraps in a div, gives the category a H2, puts all sub-categories in a UL
	// originally used on index.php

	$categories = get_categories( 'orderby=id' );
	foreach( $categories as $cat ) : if( !$cat->parent ) { 
		echo '<div class="category_block">';
		echo '<h2>' . $cat->name . '</h2> <a class="view_all" href="category/' . $cat->slug . '">View All</a>';
		echo '<ul>';
		process_cat_tree( $cat->term_id );
	}
	endforeach;
	
	function process_cat_tree( $cat ) { 
		$subcat = wp_list_categories( $args = array( 'orderby' => 'id', 'order' => 'ASC', 'show_count' => 0, 'hide_empty' => 0, 'use_desc_for_title' => 1, 'child_of' => $cat, 'hierarchical' => true, 'title_li' => __( '' ) ) );
		echo '</ul></div>';
	}
?>