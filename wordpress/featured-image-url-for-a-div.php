<?php /* Lets grab the URL for the featured image */ $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div style="background-image:url(<?php echo $featuredImage; ?>);">