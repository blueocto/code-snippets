<!-- Quick and nasty way to do it -->

<?php include $_SERVER['DOCUMENT_ROOT'].'/news/wp-blog-header.php'; ?>
				
<?php query_posts('showposts=3'); ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="news_post">
		<p><?php the_title(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More</a></p>
	</div>
<?php endwhile;?>