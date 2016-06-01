<!-- The Post Thumbnail function is active by default, but this line of php will make it display. -->
<?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) { ?>
<div class="feat_img">
	<div class="feat_img_inner">
		<?php the_post_thumbnail( array(940,940) ); //define your max-width or max-height here ?>
	</div>
</div>
<?php } ?>


<!-- CSS
	.feat_img { float: none; margin: 0 auto 1em;}
	.feat_img_inner { position: relative; width: 100%; height: 300px;}
	.feat_img img { position: absolute; margin: auto; top: 0; bottom: 0; left: 0; right: 0;}
-->