<?php 

/* Remove excess classes from menus, but keep the current classes */
function wp_nav_menu_remove($var) {
	return is_array($var) ? array_intersect($var, array(
        'current-menu-item', 
        'menu-item', 
        'menu-item-has-children',
        )
    ) : '';
}

add_filter('page_css_class', 'wp_nav_menu_remove', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_remove', 100, 1);
add_filter('nav_menu_css_class', 'wp_nav_menu_remove', 100, 1);

/* Remove IDs from custom menu items */
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
	return "";
}

