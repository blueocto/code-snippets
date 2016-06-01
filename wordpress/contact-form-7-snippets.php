<?php

// to add or remove P tags, add the following to wp-config.php
define( 'WPCF7_AUTOP', false );

?>

<!-- Errors, Simple colours and position, if non supplied. -->
<style>

/* error msgs */
span.wpcf7-not-valid-tip { top: -28px!important; left: 0!important; color: #A1403A; border: 1px solid #FD8076!important;}
div.wpcf7-response-output { clear: both; margin: 20px 0; padding: 10px;}
/* red */   div.wpcf7-validation-errors { color: #A1403A; background-color: #FFF; border: 2px solid #FD8076!important;}
/* green */ div.wpcf7-mail-sent-ok { color: #61B445; background-color: #FFF; border: 2px solid #95D179!important;}

</style>