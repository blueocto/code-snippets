<?php

// Disable the auto-save feature completely
function no_autosave() {
	wp_deregister_script('autosave');
}
add_action( 'wp_print_scripts', 'no_autosave' );


//function to call and print shortened post title
function the_title_shorten($len,$rep='...') {
	$title = the_title('','',false);
	$shortened_title = textLimit($title, $len, $rep);
	print $shortened_title;
}

//shorten without cutting full words
function textLimit($string, $length, $replacer) {
	if(strlen($string) > $length)
	return (preg_match('/^(.*)W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
	return $string;
}


//Custom footer links in Admin
function modify_footer_admin () {
	echo 'Created by <a title="Web Development Newcastle" href="http://www.caroline-murphy.co.uk">Caroline Murphy</a>.';
	echo 'Powered by<a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');


//Hide the upgrade notice in Admin
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

//Hide plugin updates notification in the dashboard
function hide_plugin_update_indicator(){
	global $menu,$submenu;
	$menu[65][0] = 'Plugins';
	$submenu['index.php'][10][0] = 'Updates';
}
add_action('admin_menu', 'hide_plugin_update_indicator');


//Hide menu items to clean up Admin
function remove_menu_items() {
	global $menu;
	$restricted = array(__('Links'), __('Comments'), __('Media'), __('Plugins'), __('Tools'), __('Users'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
		unset($menu[key($menu)]);}
		}
	}
add_action('admin_menu', 'remove_menu_items');


//Hide the Editor option in Admin
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


//Custom excerpt length on posts
function custom_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//Returns a "Continue Reading" link for excerpts
function twentyeleven_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}

//Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link() [above].
function twentyeleven_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );

//Adds a pretty "Continue Reading" link to custom post excerpts.
function twentyeleven_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyeleven_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );


//Set the $content_width for things such as video embeds.
if ( !isset( $content_width ) )
	$content_width = 600;


//Add default posts and comments RSS feed links to <head>.
add_theme_support( 'automatic-feed-links' );


//Add support for a variety of post formats
add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );


//Get the slug of the page
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}


//Customise and simplify the administration area for this theme

//Remove Dashboard widgets
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

//Change the Admin menu
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

//Remove the Editor link from the Appearance menu
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

//Remove items from the Post page
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


//Remove comments number from column in Post / Pages view
function custom_post_columns($defaults) {
	unset($defaults['comments']);
	return $defaults;
}
add_filter('manage_posts_columns', 'custom_post_columns');

//Remove comments option from the top drop-down menu, top left
function custom_favorite_actions($actions) {
	unset($actions['edit-comments.php']);
	return $actions;
}
add_filter('favorite_actions', 'custom_favorite_actions');


//Rename 'Posts' to 'News'
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


/* remove query strings from static resources */
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


//Remove wordpress version from header
remove_action('wp_head', 'wp_generator');


// Remove Wordpress bumpf from HEAD tags
function roots_head_cleanup() {
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

	add_filter('use_default_gallery_style', '__return_null');
}
add_action('init', 'roots_head_cleanup');


?>