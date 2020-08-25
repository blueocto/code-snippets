<?php

/**
 * Add srcset & sizes to custom sizes
 * 
 * This goes in your functions.php file or plugin file.
 */

/*
 * Add custom image sizes
 * 
 * Example header uses 16:9 HD video aspect ratio
 */
 function ccd_add_image_sizes() {
  add_image_size( 'header-large', 2048, 1152, true );
  add_image_size( 'header-medium', 1024, 576, true );
  add_image_size( 'header-small', 640, 360, true );
 }
 add_action( 'after_setup_theme', 'ccd_add_image_sizes' );

?>

<?php

/**
 * Use the srcset function in a template file.
 */
<img class="img-class" <?php ccd_responsive_images( get_field( 'img_field' ), 'thumb-640', '640px' ); ?> />

?>

<?php

/**
 * Use the srcset with custom image
 * sizes in a template file.
 */
$header_img    = get_field( 'ccd_header_image' );
$header_size   = 'header-large';
$header_src    = wp_get_attachment_image_src( $header_img, $header_size );
$header_srcset = wp_get_attachment_image_srcset( $header_img, $header_size );
?>

<img class="header-class" src="<?php echo esc_url( $header_src[0] ); ?>" srcset="<?php echo esc_attr( $header_srcset ); ?>" sizes="(max-width: 640px) 640px, (max-width: 1024px) 1024px, 2048px" />


<?php

/**
 * These go in your functions.php file or plugin file.
 */

/*
 * Add srcset & sizes.
 */
function ccd_responsive_images( $image_id, $image_size, $max_width ) {
	// Check if the image ID is not blank
	if ( $image_id != '' ) {
		// Set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );
		// Set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		// Generate the markup for the responsive image
		echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
	}
}

/*
 * Optional: change the WordPress default maximum width of 1600px.
 */
function ccd_max_srcset_image_width() {
  return 2048;
}
add_filter( 'max_srcset_image_width', 'ccd_max_srcset_image_width', 10 , 2 );

?>


<?php
	// ACF IMAGE (ID) - MAKE SURE FIELD IS SET TO 'Image ID'
	$img_acf = get_field('your_custom_field_name');
	$img_acf_size = 'your_custom_image_size';
	$img_acf_src = wp_get_attachment_image_src( $img_acf, $img_acf_size );
	$img_acf_srcset = wp_get_attachment_image_srcset( $img_acf, $img_acf_size );
	$img_acf_srcset_sizes = wp_get_attachment_image_sizes( $img_acf, $img_acf_size );
	$img_acf_alt_text = get_post_meta( $img_acf, '_wp_attachment_image_alt', true);
	$img_acf_meta = wp_get_attachment_metadata( $img_acf );
	$img_acf_title = get_the_title( $img_acf );
	$img_acf_caption = get_the_excerpt( $img_acf );
?>
						 
<?php if( $img_acf ){ ?>
							
	<?php if( $img_acf_caption ){ ?>
		<!-- ACF Image with Caption START -->
		<figure class="acf-caption wp-caption">
	<?php } ?>
							
		<!-- ACF Image START-->
		<img class="your-class" 
			src="<?php echo esc_url( $img_acf_src[0] ); ?>"
			title="<?php echo esc_attr( $img_acf_title ); ?>"
			srcset="<?php echo esc_attr( $img_acf_srcset ); ?>"
			sizes="<?php echo esc_attr( $img_acf_srcset_sizes ); ?>" 
			alt="<?php echo $img_acf_alt_text ?>"
		/>
		<!-- ACF Image END -->
								
			<?php if( $img_acf_caption ){ ?>
								
				<!-- ACF Image Caption START -->
				<figcaption class="acf-caption-text wp-caption-text"><?php echo $img_acf_caption; ?></figcaption>
				<!-- ACF Image Caption END -->
								
			<?php } ?>
							
		<?php if( $img_acf_caption ){ ?>
			</figure>
			<!-- ACF Image with Caption END -->
		<?php } ?>
							
<?php } ?>


<?php /* 
// For art direction and fallbacks, use PICTURE 
// xample
*/ ?>
<picture>
	<!-- Start with Webp: https://squoosh.app/ -->
	<source srcset="party.webp" type="image/webp" />
	<!-- Safari prefers JPEG2000 -->
  	<source srcset="party.jp2" type="image/jp2" />
	<!-- IE prefers JPEG-XR -->  
  	<img src="party.jxr" type="image/vnd.ms-photo" />
	<!-- Jpeg afterwards -->
  <source 
    srcset="
      baby-zoomed-out-2x.jpg 2x,
      baby-zoomed-out.jpg
    "
    media="(min-width: 1000px)"
  />
  <source 
    srcset="
      baby-2x.jpg 2x,
      baby.jpg
    "
    media="(min-width: 600px)"
  />
  <img 
    srcset="
      baby-zoomed-out-2x.jpg 2x
    "
    src="baby-zoomed-out.jpg"
    alt="Baby Sleeping"
  />
  <!-- Maybe you want to support dark mode? -->
  <source srcset="mojave-night.jpg" media="(prefers-color-scheme: dark)">
  <img src="mojave-night.jpg" />
  <!-- Maybe improve accessibility and reduce motion? -->
  <source srcset="no-motion.jpg" media="(prefers-reduced-motion: reduce)">
  	<img src="animated.gif" />
</picture>



