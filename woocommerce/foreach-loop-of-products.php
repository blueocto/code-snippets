<!-- handy if you want to list products on another page, outside the loop -->

<?php 
$args = array( 'posts_per_page' => 2, 'post_type' => 'product' );
$lastposts = get_posts( $args ); 
foreach($lastposts as $post) : setup_postdata($post); ?>

<li>
  <a href="<?php the_permalink(); ?>" class="img">
    <?php if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail( array(100,100) ); ?>
    <?php } ?>
  </a>
  <div class="bd">
    <strong><?php the_title(); ?></strong><br />
    <?php 
      $content = get_the_content(); 
      $trimmed_content = wp_trim_words( $content, 10 ); 
      echo $trimmed_content;
    ?>
    <span class="ftr_price"><?php global $post, $product; echo $product->get_price_html(); ?></span>
  </div>
</li>

<?php endforeach; ?>