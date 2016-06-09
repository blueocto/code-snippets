// Category title
<?php woocommerce_page_title(); ?>

// or the full version
<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
<?php endif; ?>


// The category description
<?php do_action( 'woocommerce_archive_description' ); ?>