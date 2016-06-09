<?php

/*** functions.php ***/

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 15;' ), 20 );

?>