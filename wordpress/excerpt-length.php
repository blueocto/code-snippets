<?php 
	$content = get_the_content(); 
	$trimmed_content = wp_trim_words( $content, 15, '&hellip;' ); 
	echo $trimmed_content;
?>