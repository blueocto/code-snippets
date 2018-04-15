<?php
/*** https://federicojacobi.com/foundation-6-block-grid-wordpress-gallery/ ***/
function blockgrid_gallery( $output, $atts, $instance ) {
	$atts = shortcode_atts( array(
		'order'   => 'ASC',
		'orderby' => 'menu_order ID',
		'id'      => get_the_ID(),
		'columns' => 3,
		'size'    => 'thumbnail',
		'include' => '',
		'exclude' => '',
		), $atts );
 
	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
 
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => intval( $atts[ 'id' ] ), 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => intval( $atts[ 'id' ] ), 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}
 
	if ( empty( $attachments ) )
		return '';
 
	$output = '<div class="wp-gallery row small-up-1 medium-up-2 large-up-' . intval( $atts[ 'columns' ] ) . '" >';
 
	foreach ( $attachments as $id => $attachment ) {
		$img             = wp_get_attachment_image_url( $id, $atts[ 'size' ] );
		$img_srcset      = wp_get_attachment_image_srcset( $id, $atts[ 'size' ] ); 
		// set the size of the image when clicked on
		$img_thumbnail   = wp_get_attachment_image_url( $id, 'thumbnail' );
		$img_medium      = wp_get_attachment_image_url( $id, 'medium' );
		$img_full        = wp_get_attachment_image_url( $id, 'full' );
 
		$caption = ( ! $attachment->post_excerpt ) ? '' : ' data-caption="' . esc_attr( $attachment->post_excerpt ) . '" ';
 
		$output .= '<div class="column">'
			
			// optional, if you want to open the full image
			. '<a href="' . esc_url( $img_full ) . '">'

			. '<img src="' . esc_url( $img ) . '" ' . $caption . ' class="thumbnail" alt="' . esc_attr( $attachment->title ) . '"  srcset="' . esc_attr( $img_srcset ) . '" sizes="(max-width: 50em) 87vw, 680px" />'
			
			. '</a></div>';
	}
 
	$output .= '</div>';
 
	return $output;
}
add_filter( 'post_gallery', 'blockgrid_gallery', 10, 3 );
