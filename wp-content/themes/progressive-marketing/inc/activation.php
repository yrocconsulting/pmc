<?php
/**
 * One-time site setup when the theme is activated:
 * creates the pages, sets the static front page, builds the menus,
 * and turns on pretty permalinks. Existing pages are never overwritten.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Find a page by path, or create it.
 *
 * @param string $title  Title.
 * @param string $slug   Slug.
 * @param int    $parent Parent page ID.
 * @param string $content Initial content.
 * @return int Page ID.
 */
function pmc_ensure_page( $title, $slug, $parent = 0, $content = '' ) {
	$path     = $parent ? get_page_uri( $parent ) . '/' . $slug : $slug;
	$existing = get_page_by_path( $path );
	if ( $existing ) {
		return (int) $existing->ID;
	}
	return (int) wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_parent'  => $parent,
			'post_content' => $content,
		)
	);
}

/**
 * Run setup.
 */
function pmc_activate() {
	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}

	$pages = array(
		'home'         => pmc_ensure_page( 'Home', 'home' ),
		'services'     => pmc_ensure_page( 'Services', 'services' ),
		'industries'   => pmc_ensure_page( 'Industries', 'industries' ),
		'case-studies' => pmc_ensure_page( 'Results', 'case-studies' ),
		'growth360'    => pmc_ensure_page( 'Growth360', 'growth360' ),
		'about-us'     => pmc_ensure_page( 'About Us', 'about-us' ),
		'contact-us'   => pmc_ensure_page( 'Contact Us', 'contact-us' ),
		'privacy'      => pmc_ensure_page( 'Privacy Policy', 'privacy-policy', 0, '<!-- wp:paragraph --><p>Add your privacy policy here (Settings → Privacy can generate a starting draft).</p><!-- /wp:paragraph -->' ),
		'terms'        => pmc_ensure_page( 'Terms of Service', 'terms-of-service', 0, '<!-- wp:paragraph --><p>Add your terms of service here.</p><!-- /wp:paragraph -->' ),
	);
	foreach ( pmc_services() as $slug => $svc ) {
		$pages[ $slug ] = pmc_ensure_page( $svc['name'], $slug, $pages['services'] );
	}
	foreach ( pmc_industries() as $slug => $ind ) {
		$pages[ $slug ] = pmc_ensure_page( $ind['name'], $slug, $pages['industries'] );
	}
	foreach ( pmc_growth360_editions() as $slug => $ed ) {
		$pages[ 'g360-' . $slug ] = pmc_ensure_page( 'Growth360 for ' . $ed['name'], $slug, $pages['growth360'] );
	}

	if ( 'page' !== get_option( 'show_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $pages['home'] );
	}
	if ( ! get_option( 'wp_page_for_privacy_policy' ) ) {
		update_option( 'wp_page_for_privacy_policy', $pages['privacy'] );
	}

	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary'] ) ) {
		$menu_id = wp_create_nav_menu( 'Primary' );
		if ( ! is_wp_error( $menu_id ) ) {
			$add = function ( $title, $page_id, $parent = 0 ) use ( $menu_id ) {
				return wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $title, 'menu-item-object' => 'page', 'menu-item-object-id' => $page_id, 'menu-item-type' => 'post_type', 'menu-item-parent-id' => $parent, 'menu-item-status' => 'publish' ) );
			};
			$parent = $add( 'Services', $pages['services'] );
			foreach ( pmc_services() as $slug => $svc ) {
				$add( $svc['name'], $pages[ $slug ], $parent );
			}
			$parent = $add( 'Industries', $pages['industries'] );
			foreach ( pmc_industries() as $slug => $ind ) {
				$add( $ind['name'], $pages[ $slug ], $parent );
			}
			$add( 'Results', $pages['case-studies'] );
			$add( 'About', $pages['about-us'] );
			$add( 'Contact', $pages['contact-us'] );
			$locations['primary'] = $menu_id;
		}
	}
	if ( empty( $locations['footer'] ) ) {
		$menu_id = wp_create_nav_menu( 'Footer' );
		if ( ! is_wp_error( $menu_id ) ) {
			foreach ( array( 'privacy' => 'Privacy Policy', 'terms' => 'Terms of Service' ) as $key => $label ) {
				wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $label, 'menu-item-object' => 'page', 'menu-item-object-id' => $pages[ $key ], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			}
			$locations['footer'] = $menu_id;
		}
	}
	set_theme_mod( 'nav_menu_locations', $locations );

	if ( 'Just another WordPress site' === get_option( 'blogdescription' ) || '' === get_option( 'blogdescription' ) ) {
		update_option( 'blogdescription', 'Become the obvious choice in your market' );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'pmc_activate' );

/**
 * Re-run setup after a theme update that adds pages (setup never overwrites).
 */
function pmc_maybe_upgrade() {
	if ( get_option( 'pmc_setup_version' ) !== PMC_VERSION ) {
		pmc_activate();
		update_option( 'pmc_setup_version', PMC_VERSION );
	}
}
add_action( 'admin_init', 'pmc_maybe_upgrade' );
