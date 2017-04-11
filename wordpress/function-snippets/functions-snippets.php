<?php

/* ==========================================================================
	Disable the auto-save feature completely
========================================================================== */
function no_autosave() {
	wp_deregister_script('autosave');
}
add_action( 'wp_print_scripts', 'no_autosave' );


/* ==========================================================================
	function to call and print shortened post title
========================================================================== */
function the_title_shorten($len,$rep='...') {
	$title = the_title('','',false);
	$shortened_title = textLimit($title, $len, $rep);
	print $shortened_title;
}


/* ==========================================================================
	shorten without cutting full words
========================================================================== */
function textLimit($string, $length, $replacer) {
	if(strlen($string) > $length)
	return (preg_match('/^(.*)W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
	return $string;
}


/* ==========================================================================
	Custom footer links in Admin
========================================================================== */
function modify_footer_admin () {
	echo 'Created by <a title="Web Development Newcastle" href="http://www.caroline-murphy.co.uk">Caroline Murphy</a>.';
	echo 'Powered by<a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');


/* ==========================================================================
	Hide the upgrade notice in Admin
========================================================================== */
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );


/* ==========================================================================
	Hide plugin updates notification in the dashboard
========================================================================== */
function hide_plugin_update_indicator(){
	global $menu,$submenu;
	$menu[65][0] = 'Plugins';
	$submenu['index.php'][10][0] = 'Updates';
}
add_action('admin_menu', 'hide_plugin_update_indicator');


/* ==========================================================================
	Hide menu items to clean up Admin
========================================================================== */
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


/* ==========================================================================
	Hide the Editor option in Admin
========================================================================== */
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/* ==========================================================================
	Custom excerpt length on posts
========================================================================== */
function custom_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');


/* ==========================================================================
	Returns a "Continue Reading" link for excerpts
========================================================================== */
function twentyeleven_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}


/* ==========================================================================
	Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link() [above].
========================================================================== */
function twentyeleven_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyeleven_auto_excerpt_more' );


/* ==========================================================================
	Adds a pretty "Continue Reading" link to custom post excerpts.
========================================================================== */
function twentyeleven_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyeleven_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyeleven_custom_excerpt_more' );


/* ==========================================================================
	Set the $content_width for things such as video embeds.
========================================================================== */
if ( !isset( $content_width ) )
	$content_width = 600;


/* ==========================================================================
	Add default posts and comments RSS feed links to <head>.
========================================================================== */
add_theme_support( 'automatic-feed-links' );


/* ==========================================================================
	Add support for a variety of post formats
========================================================================== */
add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );


/* ==========================================================================
	Get the slug of the page
========================================================================== */
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}


/* ==========================================================================
	Remove wordpress version from header
========================================================================== */
remove_action('wp_head', 'wp_generator');


/* ==========================================================================
	Remove Wordpress bumpf from HEAD tags
========================================================================== */
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