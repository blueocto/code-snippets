<!-- To order seperately from Blog -->

<!-- Start The Loop -->
<?php $query = new WP_Query( 'orderby=rand&post_type=partner&posts_per_page=-1'); 
	while($query->have_posts()) : $query->the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="entry_content">
			<?php the_title('<h2><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '">', '</a></h2>'); ?>
			<span class="byline">By <?php the_author_posts_link(); ?> on <?php the_time('D d F'); ?> | <?php comments_popup_link(__('0 comments'), __('1 Response'), __('% Responses'), 'comments-link', __('Comments closed')); ?></span>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink() ?>">Read more &raquo;</a></p>
		</div><!-- //entry_content -->
	
	</div><!-- //post-id -->

<?php endwhile; wp_reset_postdata(); // reset the query ?>
<!-- End The Loop -->


<!-- To pull posts from a specific custom taxonomy -->

<?php 
	/* retrieve all posts in Care Homes taxonomy */
	$query = new WP_Query( 
		array('orderby'=>'date', 'post_type'=>'jobs', 'posts_per_page' => '-1', 'term' => 'carehomes', 'carehomes' => 'all')
	); 
	while($query->have_posts()) : $query->the_post(); 
?>

	<p><strong><?php the_title(); ?></strong></p>

	<p><?php the_excerpt(); ?></p>

	<p><a href="<?php the_permalink() ?>">Read more</a></p>

<?php endwhile; wp_reset_postdata(); // reset the query ?>


<!-- A better snippet 

// Taken from the bluechipsafety.com website homepage....
// the Custom Post Types are setup in functions as Taxonomy "course-category" and Post Type "course" 
and we want to only pull from the taxonomy with the slug "wellbeing"

-->


<?php 
	$args = array( 
		'orderby' => 'date', 
		'order' => 'DESC', 
		'posts_per_page' => 3,
		'post_type' => 'course', 
		'course-category' => 'wellbeing'
	); 
	$query = new WP_Query( $args ); 
	while($query->have_posts()) : $query->the_post(); 
?>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />

<?php endwhile; wp_reset_postdata(); ?>