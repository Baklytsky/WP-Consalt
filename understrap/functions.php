<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

function my_logo() {
	$output = '';
	$output .= '<a class="navbar-brand" aria-label="home" href="'.get_home_url().'">';
	$custom_logo_id = get_theme_mod('custom_logo');
	$custom_logo_attr = '';
	if ($custom_logo_id) {
		$custom_logo_attr = array(
			'class' => 'custom_logo',
		);
		$image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
		if (empty ($image_alt)) {
			$custom_logo_attr ['alt'] = get_bloginfo('name','display');
		}
	}
	$output .= wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr). '</a>';

	echo $output;
}

function new_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 35;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_action( 'init', 'init_industry' );
/**
 * Register a book post type.
 */
function init_industry() {
	$labels = array(
		'name'               => _x( 'Industry', 'post type general name', 'understrap' ),
		'singular_name'      => _x( 'Industries', 'post type singular name', 'understrap' ),
		'menu_name'          => _x( 'Industry', 'admin menu', 'understrap' ),
		'name_admin_bar'     => _x( 'Industry', 'add new on admin bar', 'understrap' ),
		'add_new'            => _x( 'Add New Industry', 'Specialize', 'understrap' ),
		'add_new_item'       => __( 'Add New Industry', 'understrap' ),
		'new_item'           => __( 'New Industry', 'understrap' ),
		'edit_item'          => __( 'Edit Industry', 'understrap' ),
		'view_item'          => __( 'View Industry', 'understrap' ),
		'all_items'          => __( 'All Industries', 'understrap' ),
		'search_items'       => __( 'Search Industry', 'understrap' ),
		'parent_item_colon'  => __( 'Parent Industry:', 'understrap' ),
		'not_found'          => __( 'No Industry found.', 'understrap' ),
		'not_found_in_trash' => __( 'No Industry found in Trash.', 'understrap' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Industry.', 'understrap' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'industry' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','excerpt','thumbnail' ),
		'menu_icon'			 => 'dashicons-feedback'
	);

	register_post_type( 'Industry', $args );
}
