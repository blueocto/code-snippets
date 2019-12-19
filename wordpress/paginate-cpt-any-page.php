<?php
	$postsPerPage = 6; 
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 

	$args = array(
		'post_type' => 'case_study',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $postsPerPage,
		'paged' => $paged
	);
	$caseStudies = new WP_Query($args);

	while ( $caseStudies->have_posts() ) :
		$caseStudies->the_post();

			//$caseStudies->the_post();
			$csItem = get_post(get_the_ID());
?>

<!-- your content -->

<?php endwhile; ?>


<!-- PAGINATION -->
<?php
	$args1 = array(
		'format' => 'page/%#%/',
		'total' => ceil($caseStudies->found_posts / $postsPerPage),
		'current' => $paged,
		'show_all' => FALSE,
		'end_size' => 1,
		'mid_size' => 2,
		'prev_next' => TRUE,
		'prev_text' => __('Previous'),
		'next_text' => __('Next'),
		'type' => 'list',
		'add_args' => TRUE,
		'add_fragment' => '',
		'before_page_number' => '',
		'after_page_number' => ''
	);
	echo paginate_links($args1);
?>
