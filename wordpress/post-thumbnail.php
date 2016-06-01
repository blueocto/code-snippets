<!-- Simple example -->

<!-- The Post Thumbnail function is active by default, but this line of php will make it display. -->
<?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) { ?>
	<div class="image_style">
			<div class="image_style_inner">
					<?php the_post_thumbnail( array(646,646) ); ?>
				</div>
		</div>
<?php } ?>
<!-- //image_style -->


<!-- or with fallback -->

<!-- The Post Thumbnail function is active by default, but this line of php will make it display. -->
<?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) { ?>
<div class="image_style">
<div class="image_style_inner">
<?php the_post_thumbnail( array(646,646) ); //define your max-width or max-height here ?>
</div>
</div>
<?php } elseif { ?>
<img src="/images/default-image.jpg" alt="<?php the_title(); ?>" />
<?php endif; ?>
<!-- //The Post Thumbnail -->