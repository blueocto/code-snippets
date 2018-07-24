<!-- Handy for Google Maps or Contact Forms -->

<?php if ( is_page( 16 ) ) { ?>

<body onLoad="initialize()" <?php body_class($class); ?>>

<?php } else { ?>

<body <?php body_class($class); ?> >

<?php }?>


<!-- if lookin for a specific page... -->

<?php if ( is_page( array( 48, 'education', 'Education' ) ) ) { ?><?php } ?>


<!-- 
	Testing for sub-Pages
	There is no is_subpage() function yet, but you can test this with a little code:
-->

<?php 
	// If outside the loop.
	$post = get_post();
	 
	if ( is_page() && $post->post_parent ) {
	    // This is a subpage
	} else {
	    // This is not a subpage
}
?>

<!--
	If child page of a parent, and want to get siblings
-->

<?php 
	/* let's get all siblings of this child page */
	global $post;
	$direct_parent = $post->post_parent;
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $direct_parent, // Get this pages id and find the children
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post__not_in' => array( $post->ID ),
	); 
	$parent = new WP_Query( $args ); 
	if ( $parent->have_posts() ) : 
?>


<!-- helpful for swapping out hero's -->
<?php // if is homepage...
	 if ( is_front_page() ) { ?>

<div class="responsive-embed widescreen video-container">
</div>

<?php }
	// if is blog, or search ....
	 elseif ( is_home() || is_search() ) { ?>

<div class="hero-container parallax-window" role="banner">
</div><!-- // hero-container -->

<?php } else { ?>

<div class="hero-container parallax-window" role="banner">
</div><!-- // hero-container -->

<?php } ?>

