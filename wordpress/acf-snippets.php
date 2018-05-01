<!-- Single entry -->
<p><?php the_field('field_name'); ?></p>



<!-- If, else -->

<?php 
    if (get_field('field_name')) { 
        echo '<p>' . get_field('field_name') . '</p>';
    } else {
        //do nothing
    }
?>



<!-- Array values : checkbox, select, relationship, repeater -->

<?php 
    $values = get_field('field_name');
    if($values) {
        echo '<ul>';
        foreach($values as $value) {
            echo '<li>' . $value . '</li>';
        }
        echo '</ul>';
    }
    // always good to see exactly what you are working with
    var_dump($values);
?>



<!-- Repeater Field : https://www.advancedcustomfields.com/resources/repeater/  -->

<?php

// check if the repeater field has rows of data
if( have_rows('repeater_field_name') ):

    // loop through the rows of data
    while ( have_rows('repeater_field_name') ) : the_row();

        // display a sub field value
        the_sub_field('sub_field_name');

    endwhile;

else :

    // no rows found

endif;

?>



<!-- Repeater : sub fields - If empty... else -->

<?php 
    $mysubfield = get_sub_field('file_size'); 
    if (empty($mysubfield)) { //do nothing
    } else {
        echo "&nbsp;<small>&#91;" . $mysubfield . "&#93;</small>"; 
    }
?>



<!-- Count rows in Repeater field -->

<?php $count_document_downloads = count(get_sub_field('gallery_images')); echo $count_document_downloads; ?>



<!-- Simple text fields -->

<?php if( get_field( 'text_field' ) ): ?>
	<?php the_field('text_field'); ?>
<?php endif; ?>

<!-- or -->

<?php if( get_field( 'text_field', 123 ) ): ?>



<!-- custom image as background on DIV - set as Image OBJECT / Array -->
<?php $image = get_field('image'); if( !empty($image) ): ?>
<div style="<?php echo $image['url']; ?>">
<?php endif; ?>

<!-- or -->

<section class="welcome" <?php $image = get_field('image'); if( !empty($image) ): ?> style="background-image: url(<?php echo $image['url']; ?>)"<?php endif; ?>>



<!-- Add image with alt + title data 

	Make sure you set the Custom Field to "Image ID" as opposed to "Image URL" -->

<?php 
	if( get_field( "section_two_image" ) ):                           
	$attachment_id = get_field('section_two_image'); 
	$size = "full"; // (thumbnail, medium, large, full or custom size) 
	$image_attributes = wp_get_attachment_image_src( $attachment_id, $size ); 
	$attachmentinfo = get_post( $attachment_id ); 
	$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
?>

<img src="<?php echo $image_attributes[0]; ?>" alt="<?php echo $alt; ?>" />



<!-- simple TRUE/FALSE with if / else statement -->
<?php if (get_field('section_a')) { ?>
    <p>enabled</p>
<?php } else { ?>
    <p>not enabled</p>
<?php } ?>



<!-- Is this article, a featured article? TRUE/FALSE -->
<?php 
    $args = array( 
        'post_type' => 'advice', 
        'posts_per_page' => 1, 
        'meta_query' => array(
            array(
                'key' => 'featured_article',
                'compare' => '=',
                'value' => '1' // the Yes option is selected, to be featured
            )
        )
    ); 
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(); 
?>
<?php get_template_part( 'parts/loop', 'advice-featured' ); ?>
<?php endwhile; ?>



<!-- then let's load a bunch of posts, excluding the featured article (as once its been set, then unset it still comes back as TRUE!) -->
<?php 
    // to ensure we capture those that are not set, and those that are now unset
    $args = array( 
        'post_type' => 'advice', 
        'posts_per_page' => 3, 
        'meta_query' => array(
            array(
                'relation' => 'OR',
                array(
                    'key'     => 'featured_article',
                    'compare' => '=', 
                    'value'   => '0'
                ),
                array(
                    'key'     => 'featured_article',
                    'compare' => 'NOT EXISTS'
                )
            )
        )
    ); 
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(); 
?>

<?php get_template_part( 'parts/loop', 'home' ); ?>

<?php endwhile; ?>



