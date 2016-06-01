<!-- Wordpress main site (A) has a blog feed or custom post type, pull this onto a subdomain (B), in Wordpress Multisite -->

<?php 
	global $switched;
	switch_to_blog(1); //switched to "craig healthcare"
	/* retrieve all posts in Care Homes taxonomy */
	$query = new WP_Query( 'orderby=date&post_type=jobs&posts_per_page=2'); 
	while($query->have_posts()) : $query->the_post(); 
?>

<p><strong><?php the_title(); ?></strong></p>
<p><?php the_excerpt(); ?></p>
<p><a href="<?php the_permalink() ?>">Read more</a></p>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>
<?php restore_current_blog(); //switched back to main site ?>