<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// custom login for theme
function childtheme_custom_login() {
	echo '<style>
	#login h1 a {
		background-image:url(' . get_template_directory_uri() . '/project-04-assets/images/logos/inhabitent-logo-text-dark.svg );
		background-size: 200px;	
		width: 200px;
		background-position: bottom;
		
	}
	</style>';
}
 
add_action('login_head', 'childtheme_custom_login');

function the_url( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );

add_filter( 'body_class', 'custom_page_class');
function custom_page_class( $classes ) {
	if ( is_page('About')) {
		$classes[] = 'about-page';
	}
	if ( is_page('Front Page')) {
		$classes[] = 'front-page';
	}
 
	return $classes; 
}

