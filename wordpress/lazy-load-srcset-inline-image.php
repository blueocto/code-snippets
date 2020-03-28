<?php /* handy to use in a hero. Can apply overlay colour, or text using absolutes */ ?>
<picture>
	<?php if ( is_home() ) {
			$page_for_posts = get_option( 'page_for_posts' ); 
			echo get_the_post_thumbnail($page_for_posts, 'large');

		} elseif ( has_post_thumbnail( $post->ID ) ) { 
			the_post_thumbnail( 'xxlarge', array( 'loading' => 'lazy' ) ); 

		} else { ?>
		<img src="<?php echo get_template_directory_uri() . '/dist/assets/images/homepage-hero-bg.jpg'; ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
	<?php } ?>
</picture>