<?php

// NOTE : The taxonomy always has to come before the custom post type!

// Best to get the files sorted before making live.

// Updated 21-06-13

/* To go into the functions.php */

// hook into the init action and call create_project_taxonomies when it fires
add_action( 'init', 'create_project_taxonomies', 0 );
// create taxonomy for the post type "project"
function create_project_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Project Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Types' ),
		'all_items'         => __( 'All Project Types' ),
		'parent_item'       => __( 'Parent Project Types' ),
		'parent_item_colon' => __( 'Parent Project Type:' ),
		'edit_item'         => __( 'Edit Project Type' ),
		'update_item'       => __( 'Update Project Type' ),
		'add_new_item'      => __( 'Add New Project Type' ),
		'new_item_name'     => __( 'New Project Type Name' ),
		'menu_name'         => __( 'Project Type' ),
		'popular_items'     => NULL, //hides tag cloud
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-type' ),
	);
	register_taxonomy( 'project-type', array( 'project' ), $args );
}
// create post type
function codex_custom_init() {
	$labels = array(
		'name'                  => 'Projects',
		'singular_name'         => 'Project',
		'add_new'               => 'Add New',
		'add_new_item'          => 'Add New Project',
		'edit_item'             => 'Edit Project',
		'new_item'              => 'New Project',
		'all_items'             => 'All Projects',
		'view_item'             => 'View Project',
		'search_items'          => 'Search Projects',
		'not_found'             =>  'No projects found',
		'not_found_in_trash'    => 'No projects found in Trash', 
		'parent_item_colon'     => '',
		'menu_name'             => 'Projects'
	);
	$args = array(
		'labels'                => $labels,
		'can_export'            => true,
		'capability_type'       => 'post',
		'description'           => 'Our portfolio of work',
		'exclude_from_search'   => false,
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_icon'             => 'website-types.png',
		'menu_position'         => 20,
		'public'                => true,
		'publicly_queryable'    => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'project' ),
		'show_ui'               => true, 
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' )
	); 
	register_post_type( 'project', $args );
}
add_action( 'init', 'codex_custom_init' );


/* For a proper hover menu icon */

// http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
//Comment out line 55 above, then use the following at the bottom of your functions file:

?>

<?php
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
	?>
	<style type="text/css" media="screen">
		#menu-posts-project .wp-menu-image {
			background: url('/wp-content/uploads/2013/06/heart.png') no-repeat 6px -17px !important;
		}
	#menu-posts-project:hover .wp-menu-image, #menu-posts-project.wp-has-current-submenu .wp-menu-image {
			background-position:6px 7px!important;
		}
	</style>
<?php } ?>

<!-- 
	better WP icons for newer versions
	http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
-->
