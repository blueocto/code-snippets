<!-- 
	Basically, if you have a Custom Field or are using the "Just Custom Fields" or "Multiple Content Blocks" plugin, best ot use this. So if the field is empty, nothing will show. 
-->


<!-- Single item -->
<?php $redphoto = get_post_meta($post->ID, 'red-photo', true); if(!empty($redphoto)) { ?>
	<p><?php echo $redphoto; ?></p>
<?php } ?>


<!-- If, else -->
<?php 
if ($datafilter == "graphic-design") { 
	echo ("icon-pencil");
}
else if ($datafilter == "web-design"){ 
	echo ("icon-picture");
}
else if ($datafilter == "dev"){ 
	echo ("icon-wrench");
}
else if ($datafilter == "projects"){ 
	echo ("icon-beaker");
}
else { 
	echo ("icon-star");
}
?>">


<!-- Foreach -->
<?php $meta_values =  get_post_meta($post->ID, 'datafilter', true); foreach($meta_values as $meta_value) { echo $meta_value . ' ';} ?>

//Within an existing item
<!-- Category -->
<?php $datafilter = get_post_meta($post->ID, 'datafilter', true); if(!empty($datafilter)) { ?>
	<h4>Category</h4>
	<p><a href="index.php#<?php echo $datafilter; ?>">
	<?php $meta_values =  get_post_meta($post->ID, 'datafilter', true); foreach($meta_values as $meta_value) { echo "#" . $meta_value . " ";} ?>
	</a></p>
<?php } ?>


<!-- Foreach -->
<?php 
	$meta_values =  get_post_meta($post->ID, 'iconpicker', true);
	echo ("<i class="");
	foreach ($meta_values as $meta_value) {
		if ($meta_value == "graphic-design") { echo ("icon-pencil "); }
		if ($meta_value == "web-design") { echo ("icon-picture "); }
		if ($meta_value == "dev") { echo ("icon-wrench "); }
		if ($meta_value == "projects") { echo ("icon-beaker "); }
		if ($meta_value == "email") { echo ("icon-envelope "); }
		if ($meta_value == "wordpress") { echo ("icon-font "); }
		if ($meta_value == "prestashop") { echo ("icon-shopping-cart "); }
		if ($meta_value == "mobile") { echo ("icon-phone "); }
	}
	echo (""></i>");
?>