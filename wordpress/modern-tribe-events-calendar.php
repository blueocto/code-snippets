<?php

// Things to look out for...

// the jQuery can clash with your theme, so, remove it from your theme (footer) and add this following to functions.php

// Enqueue jQuery to fix the conflict between Events Calendar and theme
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11); 
	function my_jquery_enqueue() { 
		wp_deregister_script('jquery'); 
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null); 
		wp_enqueue_script('jquery'); 
}


// It doest like using Wordpress SEO titles
// You can use a hard-coded fallback to fix the titles...

?>

<?php if( tribe_is_photo() && !is_tax() ) { ?>
	<title>Find A Course | <?php bloginfo('name'); ?></title>
<?php } else { ?>
	<title><?php wp_title('|'); ?></title>
<?php } ?>