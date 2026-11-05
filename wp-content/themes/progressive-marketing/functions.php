<?php
/**
 * Progressive Marketing Concepts theme.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

define( 'PMC_VERSION', '1.0.0' );
define( 'PMC_DIR', get_template_directory() );
define( 'PMC_URI', get_template_directory_uri() );

require PMC_DIR . '/inc/content.php';
require PMC_DIR . '/inc/helpers.php';
require PMC_DIR . '/inc/customizer.php';
require PMC_DIR . '/inc/contact-form.php';
require PMC_DIR . '/inc/seo.php';
require PMC_DIR . '/inc/activation.php';

/**
 * Theme supports and menus.
 */
function pmc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'custom-logo', array( 'height' => 48, 'width' => 227, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu', 'pmc' ),
			'footer'  => __( 'Footer menu', 'pmc' ),
		)
	);
}
add_action( 'after_setup_theme', 'pmc_setup' );

/**
 * Styles and scripts.
 */
function pmc_assets() {
	wp_enqueue_style( 'pmc-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap', array(), null );
	wp_enqueue_style( 'pmc-style', get_stylesheet_uri(), array( 'pmc-fonts' ), PMC_VERSION );
	wp_enqueue_script( 'pmc-main', PMC_URI . '/assets/js/main.js', array(), PMC_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'pmc_assets' );

/**
 * Preconnect to Google Fonts.
 */
function pmc_resource_hints( $urls, $relation ) {
	if ( 'preconnect' === $relation ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'pmc_resource_hints', 10, 2 );

/**
 * Fallback primary menu, used until a menu is assigned in Appearance → Menus.
 */
function pmc_fallback_menu() {
	$items = array(
		'driveby'       => 'Driveby',
		'industries'    => 'Industries',
		'case-studies'  => 'Case Studies',
		'about-us'      => 'About',
		'contact-us'    => 'Contact',
	);
	echo '<ul class="menu">';
	foreach ( $items as $slug => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $slug . '/' ) ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * Redirect URLs from the old site that no longer exist.
 */
function pmc_legacy_redirects() {
	if ( ! is_404() ) {
		return;
	}
	$path = trim( (string) wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH ), '/' ); // phpcs:ignore
	$map  = array(
		'home-page' => '/',
		'home'      => '/',
		'services'  => '/driveby/',
		'trial'     => '/contact-us/#trial',
	);
	if ( isset( $map[ $path ] ) ) {
		wp_safe_redirect( home_url( $map[ $path ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'pmc_legacy_redirects' );
