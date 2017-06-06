<?php

/* Stop loading the JavaScript and CSS stylesheet on all pages
ref: https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/ */
define('WPCF7_LOAD_JS', false); 
define('WPCF7_LOAD_CSS', false); 

// The WP_CACHE setting, if true, includes the wp-content/advanced-cache.php script, when executing wp-settings.php.
define( 'WP_CACHE', true );

