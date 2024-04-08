<?php echo wp_get_attachment_image( $image_id , array(452,452), '', array( 'class' => 'picture_child', 'loading' => 'lazy') ); ?>

<img width="120" height="50" src="<?= get_bloginfo('template_directory'); ?>/dist/images/logo-white.svg" alt="<?= get_bloginfo('name'); ?>" loading="lazy" />