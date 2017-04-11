<?php

/* ==========================================================================
	Customise and simplify the administration area for this theme
	Remove Dashboard widgets
========================================================================== */
function remove_dashboard_widgets(){
	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


/* ==========================================================================
	Change the Admin menu
========================================================================== */
add_action( 'admin_menu', 'remove_links_menu' );
function remove_links_menu() {
	remove_menu_page('index.php'); // Dashboard
	remove_menu_page('edit.php'); // Posts
	remove_menu_page('upload.php'); // Media
	remove_menu_page('link-manager.php'); // Links
	remove_menu_page('edit.php?post_type=page'); // Pages
	remove_menu_page('edit-comments.php'); // Comments
	remove_menu_page('themes.php'); // Appearance
	remove_menu_page('plugins.php'); // Plugins
	remove_menu_page('users.php'); // Users
	remove_menu_page('tools.php'); // Tools
	remove_menu_page('options-general.php'); // Settings
}


/* ==========================================================================
	Remove items from the Post page
========================================================================== */
add_action( 'admin_menu', 'remove_meta_boxes' );
function remove_meta_boxes() {
	remove_meta_box( 'submitdiv', 'post', 'normal' ); // Publish meta box
	remove_meta_box( 'commentsdiv', 'post', 'normal' ); // Comments meta box
	remove_meta_box( 'revisionsdiv', 'post', 'normal' ); // Revisions meta box
	remove_meta_box( 'authordiv', 'post', 'normal' ); // Author meta box
	remove_meta_box( 'slugdiv', 'post', 'normal' ); // Slug meta box
	remove_meta_box( 'tagsdiv-post_tag', 'post', 'side' ); // Post tags meta box
	remove_meta_box( 'categorydiv', 'post', 'side' ); // Category meta box
	remove_meta_box( 'postexcerpt', 'post', 'normal' ); // Excerpt meta box
	remove_meta_box( 'formatdiv', 'post', 'normal' ); // Post format meta box
	remove_meta_box( 'trackbacksdiv', 'post', 'normal' ); // Trackbacks meta box
	remove_meta_box( 'postcustom', 'post', 'normal' ); // Custom fields meta box
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); // Comment status meta box
	remove_meta_box( 'postimagediv', 'post', 'side' ); // Featured image meta box   
	remove_meta_box( 'pageparentdiv', 'page', 'side' ); // Page attributes meta box
}


/* ==========================================================================
	Remove comments number from column in Post / Pages view
========================================================================== */
function custom_post_columns($defaults) {
	unset($defaults['comments']);
	return $defaults;
}
add_filter('manage_posts_columns', 'custom_post_columns');


/* ==========================================================================
	Remove comments option from the top drop-down menu, top left
========================================================================== */
function custom_favorite_actions($actions) {
	unset($actions['edit-comments.php']);
	return $actions;
}
add_filter('favorite_actions', 'custom_favorite_actions');


/* ==========================================================================
	Rename 'Posts' to 'News'
========================================================================== */
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'Articles';
	$submenu['edit.php'][10][0] = 'Add Article';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &amp;$wp_post_types['post']-&gt;labels;
	$labels-&gt;name = 'Products';
	$labels-&gt;singular_name = 'Product';
	$labels-&gt;add_new = 'Add Product';
	$labels-&gt;add_new_item = 'Add Product';
	$labels-&gt;edit_item = 'Edit Product';
	$labels-&gt;new_item = 'Products';
	$labels-&gt;view_item = 'View Products';
	$labels-&gt;search_items = 'Search Products';
	$labels-&gt;not_found = 'No Products found';
	$labels-&gt;not_found_in_trash = 'No Products found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


?>