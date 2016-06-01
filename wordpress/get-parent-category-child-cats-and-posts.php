<!-- Taken from an archive.php -->

<div class="category_block">
	<h2>
		<?php // $cat = get_the_category(); $parentCatName = get_cat_name($cat[0]->parent); echo $parentCatName;
			printf( single_cat_title( '', false ) ); ?>
	</h2>
	<span>Currently Viewing All</span>
</div>
				
<?php //get the top-level parent category id
	if( is_category() ) { 
		$q_cat = get_query_var('cat'); 
		$catid = get_category( $q_cat ); 
		$parent_id = $catid->category_parent; // Print the ID
	}
?>
		
<?php //get the child categories of the above parent category
	$subcats = get_categories( $args = array( 'orderby' => 'id', 'order' => 'ASC', 'show_count' => 0, 'hide_empty' => 0, 'use_desc_for_title' => 1, 'child_of' => $catid->cat_ID ) ); ?>
	
	<?php //if we are in a child category, loop through all children and their posts 
		if(!empty($subcats)) { ?>
	
		<?php foreach($subcats as $sub) { ?>
		<div class="sub_cat_block">
			<h3><?= $sub->cat_name ?></h3>
			<ul>
				<?php //get the posts for each child category
					$args = array( 'orderby' => 'title', 'order' => 'ASC', 'category' => 'category_parent='.$sub->cat_ID );
					$cat_posts = get_posts( $args );
					foreach($cat_posts as $post) {
						echo '<li><a href="/x/'.$post->post_name.'">'.$post->post_title.'</a></li>';
					}
				?>
			</ul>
		</div>
		<?php } ?>
	
	<?php } else { ?>
		<div class="sub_cat_block">
			<ul>
				<?php //get the posts for each child category
					$args = array( 'orderby' => 'title', 'order' => 'ASC', 'category' => 'category_parent='.$catid->cat_ID );
					$cat_posts = get_posts( $args );
					foreach($cat_posts as $post) {
						echo '<li><a href="/x/'.$post->post_name.'">'.$post->post_title.'</a></li>';
					}
				?>
			</ul>
		</div>
	<?php } ?>
