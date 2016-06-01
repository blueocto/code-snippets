<?php 
	$children = get_pages( array('child_of' => $post->ID) ); 
	if( count( $children ) != 0 ) { 
?>

<h3 class="h3">Sub Pages</h3>

<?php
	$args = array( 
		'post_parent' => $post->ID, 
		'post_type' => 'page', 
		'order' => 'ASC', 
		'orderby' => 
		'name', 
		'posts_per_page' => -1); 
	$child_query = new WP_Query( $args ); 
	while ( $child_query->have_posts() ) : $child_query->the_post();
?>

<h4><?php the_title(); ?></h4>
<p><?php $content = get_the_content(); $trimmed_content = wp_trim_words( $content, 20, '&hellip;' ); echo $trimmed_content; ?></p>
<p><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">Read more</a></p>

<?php endwhile; wp_reset_postdata(); ?>

<?php } else { /*do nothing*/ } ?>