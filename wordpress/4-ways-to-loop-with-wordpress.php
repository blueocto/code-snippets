<?php

// 4 Ways to Loop with Wordpress

/*
The bottom line for customizing default loops and creating multiple loops:

To modify the default loop, use query_posts()

To modify loops and/or create multiple loops, use WP_Query()

To create static, additional loops, use get_posts()
*/

?>

<?php // The Default Loop ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
    </div>

<?php endwhile; ?>

    <div class="navigation">
        <div class="next-posts"><?php next_posts_link(); ?></div>
        <div class="prev-posts"><?php previous_posts_link(); ?></div>
    </div>

<?php else : ?>

    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h1>Not Found</h1>
    </div>

<?php endif; ?>


<?php // Loop with query_posts() ?>

<?php global $query_string; // required
$posts = query_posts($query_string.'&cat=-9'); // exclude category 9 ?>

<?php // DEFAULT LOOP GOES HERE ?>

<?php wp_reset_query(); // reset the query ?>


<?php // Loop with WP_Query() ?>

<?php $custom_query = new WP_Query('cat=-9'); // exclude category 9
while($custom_query->have_posts()) : $custom_query->the_post(); ?>

    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
    </div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

/*= OR =*/

<?php // Loop 1
$first_query = new WP_Query('cat=-1'); // exclude category
while($first_query->have_posts()) : $first_query->the_post();
...
endwhile;
wp_reset_postdata();

// Loop 2
$second_query = new WP_Query('cat=-2'); // exclude category
while($second_query->have_posts()) : $second_query->the_post();
...
endwhile;
wp_reset_postdata();

// Loop 3
$third_query = new WP_Query('cat=-3'); // exclude category
while($third_query->have_posts()) : $third_query->the_post();
...
endwhile;
wp_reset_postdata();
?>


<?php // Loop with get_posts() ?>

<?php global $post; // required
$args = array('category' => -9); // exclude category 9
$custom_posts = get_posts($args);
foreach($custom_posts as $post) : setup_postdata($post);
/////
endforeach;
?>