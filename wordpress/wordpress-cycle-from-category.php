<!-- the PHP -->

<div class="featured_cycle">
	<div class="inner clearfix">
		<ul id="nav" class="slideshow_nav">
			<?php 
			$args = array( 'numberposts' => 3, 'category' => 3 ); //define how many slides and from which category
			$postslist = get_posts( $args );
			foreach ($postslist as $post) :  setup_postdata($post); ?>
			<li>
				<a href="#" class="clearfix">
					<div class="slide_thumb"><div class="slide_thumb_inner"><?php the_post_thumbnail( array(160,160), true ); ?></div></div>
					<div class="slide_title"><?php the_title(); ?></div>
					<div class="slide_excerpt"><?php the_excerpt(); ?></div>
				</a>
			</li>
			<?php endforeach; ?>
		</ul><!-- //slideshow_nav -->
		<div id="slideshow" class="slideshow">
			<?php 
				$args = array( 'numberposts' => 3, 'category' => 3 ); //must match the above
				$postslist = get_posts( $args );
				foreach ($postslist as $post) :  setup_postdata($post); ?>
				<?php the_post_thumbnail(); ?>
			<?php endforeach; ?>
		</div><!-- //slideshow -->
	</div>
</div><!-- //featured_cycle -->


<!-- the CSS -->

<style>
.featured_cycle { width: 100%; height: auto; padding: 47px 0; background: url("img/leather-bg.gif") top center repeat; border-bottom: 1px solid #FE7F00;}
	.featured_cycle .inner { padding: 10px 0 10px 10px; width: 950px; background-color: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.1); -webkit-border-radius: 5px; border-radius: 5px;}
	/*** cycle nav right ***/
	.slideshow_nav { float: right; width: 379px; list-style: none;}
		.slideshow_nav li { display: inline;}
			.slideshow_nav a { display: block; margin-top: -1px; padding: 12px 20px; color: #FFF; text-decoration: none; background-color: rgba(0,0,0,0.1); border-top: 1px solid #565D63; border-bottom: 1px solid #565D63;}
			.slide_thumb { float: left; margin-right: 18px; padding: 4px; width: 80px; height: 80px; background-color: #585F63; border: 1px solid #484C4E;}
				.slide_thumb_inner { width: 80px; height: 80px; overflow: hidden;}
			.slide_title { font-size: 20px; text-decoration: underline;}
			.slide_excerpt { font-size: 12px; color: #BBC6CD;}
		.slideshow_nav li.activeSlide a { background-color: rgba(0,0,0,0.5); border-color: #8C9193;}
		.slideshow_nav a:focus { outline: none; }
				
	/*** cycle images left ***/
	.slideshow { float: left; width: 560px; height: 350px; overflow: hidden;}
</style>


<!-- the jQuery -->

<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.min.js"></script>
<script>
$('#slideshow').cycle({ 
	fx:     'fade', 
	speed:  'fast', 
	timeout: 5000,
	pager:  '#nav', 
	pagerAnchorBuilder: function(idx, slide) { 
		// return selector string for existing anchor 
		return '#nav li:eq(' + idx + ') a'; 
	} 
});
</script>
