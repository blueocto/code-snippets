<?php 
	if ( is_product_category() ){
    	global $wp_query;
    	$cat = $wp_query->get_queried_object();
    	$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
    	// $image = wp_get_attachment_url( $thumbnail_id );

    	$alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);


		$imgsrcs = wp_get_attachment_image_srcset( $thumbnail_id );

		function interchangeWPSrcSets($imgsrcs) {
			$cleanImgUrls = [];
			$rawImgs = explode(",", $imgsrcs);
			foreach($rawImgs as $rawImg) {
				$cleanImgUrl = explode(" ", $rawImg);
				array_pop($cleanImgUrl);
				$removeLastOne = implode("",$cleanImgUrl);
				array_push($cleanImgUrls, $removeLastOne);
			}

			$sortedImgs = [];

			$sizes = ["featured-small","featured-medium","featured-large","featured-xlarge"];
			$index = 0;

			foreach($cleanImgUrls as $url) {
				array_push($sortedImgs, "[".$url . ", ". $sizes[$index]."]");
				$index++;
			}

			$interchangeSrcSet = implode(", ",$sortedImgs);
			return $interchangeSrcSet;
		}
?>
    	<figure class="featured-image featured-image--woo" data-interchange="<?php echo interchangeWPSrcSets($imgsrcs); ?>"></figure>
<?php
	} // end if is_product_category
?>