<?php

//Add theme support for post thumbnails (featured images).
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'slide') );

// Let's begin the Slider custom post type
register_post_type('slide', array(
	'label' => 'Homepage Slides', 
	'description' => '', 
	'public' => true, 
	'show_ui' => true, 
	'show_in_menu' => true, 
	'capability_type' => 'post', 
	'hierarchical' => false, 
	'rewrite' => array( 'slug' => 'slide', 'with_front' => false ),
	'query_var' => true, 
	'has_archive' => true, 
	'taxonomies' => array( '' ), 
	'supports' => array( 'title', 'thumbnail' ), 
	'labels' => array ( 
		'name' => 'Slides', 
		'singular_name' => 'Slide', 
		'menu_name' => 'Slides', 
		'add_new' => 'Add Slide', 
		'add_new_item' => 'Add New Slide', 
		'edit' => 'Edit', 
		'edit_item' => 'Edit Slide', 
		'new_item' => 'New Slide', 
		'view' => 'View Slide', 
		'view_item' => 'View Slide', 
		'search_items' => 'Search Slides', 
		'not_found' => 'No Slides Found', 
		'not_found_in_trash' => 'No Slides Found in Trash', 
		'parent' => 'Parent Slide',
		),
	)
);

?>


<!-- Place where you would like to appear -->

<div class="featured_slider">
	<ul id="featuredSlider" class="slider">

	<?php $query=new WP_Query('orderby=date&order=ASC&post_type=slide&posts_per_page=-1');while($query->have_posts()):$query->the_post();?>
	<?php $url=wp_get_attachment_image(get_post_thumbnail_id($post->ID),'full');?>

		<li>
			<?php echo preg_replace('#(width|height)="d+"#','',$url);?>
			<p class="caption"><?php the_field('slide_text');?></p>
		</li>

	<?php endwhile;?>
	<?php wp_reset_postdata();?>

	</ul>
</div><!-- //featured_slider -->