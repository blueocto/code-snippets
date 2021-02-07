<!-- Simple text fields -->

<?php if( get_field( 'text_field' ) ): ?>
	<?php the_field( 'text_field' ); ?>
<?php endif; ?>

<!-- Theme Options field -->
<?php the_field( 'field_name', 'option' ); ?>


<!-- Single entry -->
<p><?php the_field('field_name'); ?></p>


<!-- If, else -->

<?php 
	if (get_field('field_name')) { 
		echo '<p>' . get_field('field_name') . '</p>';
	} else {
		//do nothing
	}
?>



<!-- Array values : checkbox, select, relationship, repeater -->

<?php 
	$values = get_field('field_name');
	if($values) {
		echo '<ul>';
		foreach($values as $value) {
			echo '<li>' . $value . '</li>';
		}
		echo '</ul>';
	}
	// always good to see exactly what you are working with
	var_dump($values);
?>



<!-- Repeater Field : https://www.advancedcustomfields.com/resources/repeater/  -->

<?php
	// check if the repeater field has rows of data
	if( have_rows( 'repeater_field_name' ) ):
?>
<?php
	// loop through the rows of data
	while ( have_rows( 'repeater_field_name' ) ) : the_row();
?>

		// display a sub field value
<?php the_sub_field( 'sub_field_name' ); ?>

<?php 
		endwhile;
	else :
	// no rows found
	endif;
?>


<!-- Repeater Field : Limit output to a particular number -->

<?php
	if( have_rows('staggered_boxes_matrix') ):
		$i = 0;
		
		while ( have_rows('staggered_boxes_matrix') ) : the_row();
			
			$i++; 
			if( $i > 5 ): // determine number here
			// break; 
			endif; 
?>

	<div class="featured-post-row">
		<div class="row">
			
			<div class="small-12 columns">
				<h1><?php the_sub_field('sub-page_title'); ?></h1>
			</div><!-- // small-12 columns -->

		</div><!-- // row -->
	</div><!-- // featured-post-row -->

<?php
		endwhile;
	else :
		// no rows found
	endif;
?>



<!-- Repeater : sub fields - If empty... else -->

<?php 
	$mysubfield = get_sub_field('file_size'); 
	if (empty($mysubfield)) { //do nothing
	} else {
		echo "&nbsp;<small>&#91;" . $mysubfield . "&#93;</small>"; 
	}
?>



<!-- Count rows in Repeater field -->

<?php $count_document_downloads = count(get_sub_field('gallery_images')); echo $count_document_downloads; ?>



<!-- or -->

<?php if( get_field( 'text_field', 123 ) ): ?>



<!-- custom image as background on DIV - set as Image Array -->
<?php $image = get_field('image'); if( !empty($image) ): ?>
<div style="<?php echo $image['url']; ?>">
<?php endif; ?>

<!-- or -->

<section class="welcome" <?php $image = get_field('image'); if( !empty($image) ): ?> style="background-image: url(<?php echo $image['url']; ?>)"<?php endif; ?>>

<!-- or -->

<!-- ensure set to an Image ID -->
<?php
	/** to dictate the size output use **/ 
	$thumb_id = get_sub_field('background_image');
	if ( '' != $thumb_id ) {
		// setting last param to false, stops WP outputting the default image, so you can set your own.
		$thumb_url  = wp_get_attachment_image_src( $thumb_id, 'medium', false );
		$slideBgImage = $thumb_url[0];
	} 
?>


<!-- Add image with alt + title data 

	Make sure you set the Custom Field to "Image ID" as opposed to "Image URL" -->

<?php 
	if( get_field( "section_two_image" ) ):
	$attachment_id = get_field('section_two_image'); 
	$size = "full"; // (thumbnail, medium, large, full or custom size) 
	$image_attributes = wp_get_attachment_image_src( $attachment_id, $size ); 
	$attachmentinfo = get_post( $attachment_id ); 
	$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
?>

<img src="<?php echo $image_attributes[0]; ?>" alt="<?php echo $alt; ?>" />
<?php endif; ?>



<!-- simple TRUE/FALSE with if / else statement -->
<?php if (get_field( 'section_a' )) { ?>
	<p>enabled</p>
<?php } else { ?>
	<p>not enabled</p>
<?php } ?>



<!-- Is this article, a featured article? TRUE/FALSE -->
<?php 
	$args = array( 
		'post_type' => 'advice', 
		'posts_per_page' => 1, 
		'meta_query' => array(
			array(
				'key' => 'featured_article',
				'compare' => '=',
				'value' => '1' // the Yes option is selected, to be featured
			)
		)
	); 
	$loop = new WP_Query( $args ); 
	while ( $loop->have_posts() ) : $loop->the_post(); 
?>
<?php get_template_part( 'parts/loop', 'advice-featured' ); ?>
<?php endwhile; ?>



<!-- then let's load a bunch of posts, excluding the featured article (as once its been set, then unset it still comes back as TRUE!) -->
<?php 
	// to ensure we capture those that are not set, and those that are now unset
	$args = array( 
		'post_type' => 'advice', 
		'posts_per_page' => 3, 
		'meta_query' => array(
			array(
				'relation' => 'OR',
				array(
					'key'     => 'featured_article',
					'compare' => '=', 
					'value'   => '0'
				),
				array(
					'key'     => 'featured_article',
					'compare' => 'NOT EXISTS'
				)
			)
		)
	); 
	$loop = new WP_Query( $args ); 
	while ( $loop->have_posts() ) : $loop->the_post(); 
?>

<?php get_template_part( 'parts/loop', 'home' ); ?>

<?php endwhile; ?>


<!-- repeater field with post object 
	 example, pull out a related product, on a Page -->
<?php
		// loop through the rows of data
		while ( have_rows('related_products_matrix') ) : the_row();

		// setup Post Object for dropdown field name
		$postobject = get_sub_field('select_product'); 
		if( $postobject ) :
		$post = $postobject;
		setup_postdata($post);
	?>
			
		<a class="related--link" href="<?php the_permalink(); ?>">

			<span class="related--title"><?php the_title(); ?></span>

			<?php
				// to dictate the size output use
				$thumb_id = get_post_thumbnail_id( $post->ID );
				if ( '' != $thumb_id ) {
					// setting last param to false, stops WP outputting the default image, so you can set your own.
					$thumb_url  = wp_get_attachment_image_src( $thumb_id, 'large', false );
					$featuredImage      = $thumb_url[0];
				}
			 ?>

			<img class="related--img" src="<?php echo $featuredImage; ?>" alt="" />

			<span class="related--desc">
				<?php 
					$content = get_the_excerpt(); 
					$trimmed_content = wp_trim_words( $content, 10, '&hellip;' ); 
					echo $trimmed_content;
				?>
			</span>

			<span class="shop-btn">View Details</span>
			
		</a>
			
	<?php 
		// IMPORTANT - reset the $post object so the rest of the page works correctly
		wp_reset_postdata(); 
	 ?>

<?php
		endif; 
	endwhile;
else :
// no rows found
endif;
?>


<!-- Example switch case for Radio button ACF -->
<?php
	// color switcher for the Hero overlay
	$colorSelected = get_field('hero_colour_overlay');
	// var_dump($colorSelected);
	switch($colorSelected) {
		case 'Blue':
			$classVal = 'blue-overlay';
			break;
		case 'Pink':
			$classVal = 'pink-overlay';
			break;
		case 'Navy':
			$classVal = 'navy-overlay';
			break;
		case 'Purple':
			$classVal = 'purple-overlay';
			break;
		case 'Lime':
			$classVal = 'lime-overlay';
			break;
		default:
			$classVal = 'blue-overlay';
			break;
	}
	//then echo the $classVal in the html element
?>
<div aria-hidden="true" class="header--bg-overlay <?php echo $classVal; ?>"></div>


<!-- ACF Image as Array, grab all sizes to use with Foundation Interchange -->

<?php
	// If on the Press | index.php page ... pull ACF field

	$featuredImage = get_field('press_featured_image', 76);

		if( !empty($featuredImage) ) :

			// thumbnail
			$featuredImage_featured_small = $featuredImage['sizes'][ 'featured-small' ];

			// medium
			$featuredImage_featured_medium = $featuredImage['sizes'][ 'featured-medium' ];

			// large
			$featuredImage_featured_large = $featuredImage['sizes'][ 'featured-large' ];

			// xlarge
			$featuredImage_featured_xlarge = $featuredImage['sizes'][ 'featured-xlarge' ];
?>

	<header class="featured-image">
		<div class="featured-image--inner" role="banner" 
		     data-interchange="[<?php echo $featuredImage_featured_small; ?>, small], 
		                       [<?php echo $featuredImage_featured_medium; ?>, medium], 
		                       [<?php echo $featuredImage_featured_large; ?>, large], 
		                       [<?php echo $featuredImage_featured_xlarge; ?>, xlarge]">
	   </div>
	</header>

<?php endif; ?>


