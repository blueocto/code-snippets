<?php

// Handy without having lines of functions, or one excerpt length for them all.

$content = get_the_content();
$trimmed_content = wp_trim_words( $content, 40, '<a href="'. get_permalink() .'"> ...Read More</a>' );
echo $trimmed_content;

?>