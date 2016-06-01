<!-- Handy for Google Maps or Contact Forms -->

<?php if ( is_page( 16 ) ) { ?>

<body onLoad="initialize()" <?php body_class($class); ?>>

<?php } else { ?>

<body <?php body_class($class); ?> >

<?php }?>