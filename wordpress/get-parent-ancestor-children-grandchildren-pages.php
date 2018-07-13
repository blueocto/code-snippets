<?php 
	/* get current page ID */
	$current = $post->ID; 
	$parent = $post->post_parent; 
	$grandparent_get = get_post($parent); 
	$grandparent = $grandparent_get->post_parent; 
	if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {
		echo get_the_title($grandparent);
	
	} else {
		echo get_the_title($parent);
	}
?>

<?php 

	// echo '<p> current:' . $current . '</p>'; 
	// echo '<p>parent:' . $parent . '</p>'; 
	// echo '<p>grandparent:' . $grandparent . '</p>'; 

	/*  displays only top level pages, but when viewing a page that has children (or is a child) it displays only children of that parent.

	When visiting main page, all top level pages are listed in the sidebar.
	When visiting a top level page with no children, all top level pages are listed.
	When visiting a top level page with children, just the children pages, and descendant pages, are listed.
	When visiting a child page, just the children, and descendant pages, of that parent, are listed.
	*/
	
	// If this is a grandchild, grab grandparent page ID and display the children
	if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {

		$output = wp_list_pages( array(
			'echo'     => 0,
			'depth'    => 2, 
			'child_of' => $grandparent, 
			'title_li' => ''
		) );

		$page = $post->ID; 
		
		if ( $post->post_parent ) {
			$page = $post->post_parent; 
		}  

		echo $output; 
	
	}
	// if this is parent page, display children and grandchildren
	// if is child page, display siblings and grandchildren
	 elseif ( is_page() ) {

		$output = wp_list_pages( array(
			'echo'     => 0,
			'depth'    => 1,
			'title_li' => ''
		) );
		
		$page = $post->ID; 
		
		if ( $post->post_parent ) {
			$page = $post->post_parent; 
		}

		$children = wp_list_pages( array(
			'echo'     => 0,
			'child_of' => $page,
			'title_li' => ''
		) );

		if ( $children ) {
			$output = wp_list_pages( array(
				'echo' => 0,
				'child_of' => $page,
				'title_li' => ''
			) );
		}

		echo $output; 
	}
	
	?>