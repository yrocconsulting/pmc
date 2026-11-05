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
		'driveby'      => pmc_ensure_page( 'PMC Driveby', 'driveby' ),
		'industries'   => pmc_ensure_page( 'Industries', 'industries' ),
		'case-studies' => pmc_ensure_page( 'Case Studies', 'case-studies' ),
		'about-us'     => pmc_ensure_page( 'About Us', 'about-us' ),
		'contact-us'   => pmc_ensure_page( 'Contact Us', 'contact-us' ),
		'privacy'      => pmc_ensure_page( 'Privacy Policy', 'privacy-policy', 0, '<!-- wp:paragraph --><p>Add your privacy policy here (Settings → Privacy can generate a starting draft).</p><!-- /wp:paragraph -->' ),
		'terms'        => pmc_ensure_page( 'Terms of Service', 'terms-of-service', 0, '<!-- wp:paragraph --><p>Add your terms of service here.</p><!-- /wp:paragraph -->' ),
	);
	foreach ( pmc_industries() as $slug => $ind ) {
		$pages[ $slug ] = pmc_ensure_page( $ind['name'], $slug, $pages['industries'] );
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
			wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Driveby', 'menu-item-object' => 'page', 'menu-item-object-id' => $pages['driveby'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			$parent = wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Industries', 'menu-item-object' => 'page', 'menu-item-object-id' => $pages['industries'], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			foreach ( pmc_industries() as $slug => $ind ) {
				wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $ind['name'], 'menu-item-object' => 'page', 'menu-item-object-id' => $pages[ $slug ], 'menu-item-type' => 'post_type', 'menu-item-parent-id' => $parent, 'menu-item-status' => 'publish' ) );
			}
			foreach ( array( 'case-studies' => 'Case Studies', 'about-us' => 'About', 'contact-us' => 'Contact' ) as $slug => $label ) {
				wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $label, 'menu-item-object' => 'page', 'menu-item-object-id' => $pages[ $slug ], 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
			}
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
		update_option( 'blogdescription', 'Top 3 on Google Maps with PMC Driveby' );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'pmc_activate' );
