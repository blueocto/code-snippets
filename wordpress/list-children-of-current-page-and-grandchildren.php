<?php
	/*** START LIST CHILDREN OF CURRENT PAGE ***/

	$children = get_pages( array('child_of' => $post->ID) );

	//echo "This page ID: " . $children;
	
	if( count( $children ) != 0 ) {
		$args = array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page' => -1);
		$child_query = new WP_Query( $args );
		while ( $child_query->have_posts() ) {
			$child_query->the_post();
	?>

		<h2><?php the_title(); ?></h2>

		<?php
			/*** START LIST GRANDCHILDREN OF LOOPING CHILDREN ***/

			$thischild = $post->ID;

			//echo "This page ID: " . $thischild;

			$grandchildren = get_pages( array('child_of' => $thischild) );
			
			if( count( $grandchildren ) != 0 ) {
				$gc_args = array( 
					'post_parent' => $thischild, 
					'post_type' => 'page', 
					'order' => 'ASC', 
					'orderby' => 'name', 
					'posts_per_page' => -1
				);
				$grandchild_query = new WP_Query( $gc_args );

				while ( $grandchild_query->have_posts() ) {

					$grandchild_query->the_post(); ?>

					<p><?php the_title(); ?></p>

				<?php
				} // endhwile
			} // endif
		?>

	<?php 
		  } // endwhile
		  wp_reset_postdata();
	} 
?>