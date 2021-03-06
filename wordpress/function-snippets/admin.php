<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/* ==========================================================================
	Dashboard Widgets
========================================================================== */
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// RSS Dashboard Widget
function joints_rss_dashboard_widget() {
	if(function_exists('fetch_feed')) {
		include_once(ABSPATH . WPINC . '/feed.php');               // include the required file
		$feed = fetch_feed('http://jointswp.com/feed/rss/');        // specify the source feed
		$limit = $feed->get_item_quantity(5);                      // specify number of items
		$items = $feed->get_items(0, $limit);                      // create an array of items
	}
	if ($limit == 0) echo '<div>' . __( 'The RSS Feed is either empty or unavailable.', 'jointswp' ) . '</div>';   // fallback message
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date(__('j F Y @ g:i a', 'jointswp'), $item->get_date('Y-m-d H:i:s')); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}

// Calling all custom dashboard widgets
function joints_custom_dashboard_widgets() {
	wp_add_dashboard_widget('joints_rss_dashboard_widget', __('Custom RSS Feed (Customize in admin.php)', 'jointswp'), 'joints_rss_dashboard_widget');
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'joints_custom_dashboard_widgets');


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
	Custom footer links in Admin
========================================================================== */
function modify_footer_admin () {
	echo 'Created by <a title="Web Development Newcastle" href="https://www.blueocto.co.uk">Blueocto Ltd</a>.';
	echo 'Powered by<a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');


/* ==========================================================================
	Hide the update-nag notice in Admin
========================================================================== */
function byebye_notices() {
	remove_all_actions('admin_notices');
}
add_action('in_admin_header', 'byebye_notices');


/* ==========================================================================
	Hide plugin updates notification in the dashboard
========================================================================== */
function hide_plugin_update_indicator(){
	global $menu,$submenu;
	$menu[65][0] = 'Plugins';
	$submenu['index.php'][10][0] = 'Updates';
}
add_action('admin_menu', 'hide_plugin_update_indicator');



