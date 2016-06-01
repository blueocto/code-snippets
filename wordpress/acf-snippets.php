<!-- Single entry -->
<p><?php the_field('field_name'); ?></p>


<!-- If, else -->

<?php 
    if(get_field('field_name')) { 
        echo '<p>' . get_field('field_name') . '</p>';
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


<!-- Repeater Field -->

<?php if(get_field('create_gallery')): ?>

<?php while(has_sub_field('create_gallery')): ?>

	<?php the_sub_field("gallery_name"); ?>
   
<?php endwhile;?>

<?php endif; ?>


<!-- Repeater : sub fields - If empty... else -->

<?php 
    $mysubfield = get_sub_field('file_size'); 
    if (empty($mysubfield)) { //do nothing
    } else {
        echo "&nbsp;<small>&#91;" . $mysubfield . "&#93;</small>"; 
    }
?>


<!-- Embed repeater inside of a repeater -->

<?php if(get_field('create_gallery')): ?>

<?php while(has_sub_field('create_gallery')): ?>

	<?php while(has_sub_field('gallery_images')): ?>
		<?php the_sub_field('gallery_name'); ?>
	<?php endwhile;?>

	<?php the_sub_field('gallery_name'); ?>
	
<?php endwhile;?>

<?php endif; ?>


<!-- Count rows in Repeater field -->

<?php $count_document_downloads = count(get_sub_field('gallery_images')); echo $count_document_downloads; ?>


<!-- SImple text fields -->

<?php if( get_field( 'text_field' ) ): ?>
	<?php the_field('text_field'); ?>
<?php endif; ?>


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