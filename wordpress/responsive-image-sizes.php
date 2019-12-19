<?php
	// get the ID of the image
	$image_id = get_sub_field('our_services_card_image');
	// smallest image size we'd likely use
	$img_src = wp_get_attachment_image_url( $image_id, 'medium' );
	// largest size we'd likely use
	// up to the size of 600px - defined in the sizes="" attribute below
	$img_srcset = wp_get_attachment_image_srcset( $image_id, 'featured-small' );
	$img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 
?>
<img src="<?php echo esc_attr( $img_src ); ?>" srcset="<?php echo esc_attr( $img_srcset ); ?>" sizes="600px" alt="<?php echo $img_alt; ?>">