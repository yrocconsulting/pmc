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
		foreach ( $ind['industries'] as $sl => $r ) {
			pmc_ensure_page( $r[0], $sl, $pages[ $slug ] );
		}
	}
	// Retire the pages from the earlier four-industry structure (moved to trash, recoverable).
	foreach ( array( 'medical-clinics', 'auto-dealerships', 'hotels', 'veterinary-clinics' ) as $old ) {
		$legacy = get_page_by_path( 'industries/' . $old );
		if ( $legacy ) {
			wp_trash_post( $legacy->ID );
		}
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
			foreach ( pmc_featured_industries() as $slug => $ind ) {
				$add( $ind['name'], $pages[ $slug ], $parent );
			}
			$add( 'All industries', $pages['industries'], $parent );
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
	pmc_sync_industries_menu( $pages );

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

/**
 * Keep the Industries dropdown in the primary menu in step with the
 * featured categories (rebuilt only when the list changes).
 *
 * @param array $pages Page IDs by key.
 */
function pmc_sync_industries_menu( $pages ) {
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary'] ) ) {
		return;
	}
	$menu_id = (int) $locations['primary'];
	$wanted  = array_keys( pmc_featured_industries() );
	$sig     = md5( implode( ',', $wanted ) . '|all' );
	if ( get_option( 'pmc_industry_menu_sig' ) === $sig ) {
		return;
	}
	$items  = wp_get_nav_menu_items( $menu_id, array( 'post_status' => 'any' ) );
	$parent = 0;
	foreach ( (array) $items as $item ) {
		if ( ! $item->menu_item_parent && (int) $item->object_id === (int) $pages['industries'] ) {
			$parent = (int) $item->ID;
		}
	}
	if ( ! $parent ) {
		return;
	}
	foreach ( (array) $items as $item ) {
		if ( (int) $item->menu_item_parent === $parent ) {
			wp_delete_post( $item->ID, true );
		}
	}
	foreach ( pmc_featured_industries() as $slug => $ind ) {
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $ind['name'], 'menu-item-object' => 'page', 'menu-item-object-id' => $pages[ $slug ], 'menu-item-type' => 'post_type', 'menu-item-parent-id' => $parent, 'menu-item-status' => 'publish' ) );
	}
	wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'All industries', 'menu-item-object' => 'page', 'menu-item-object-id' => $pages['industries'], 'menu-item-type' => 'post_type', 'menu-item-parent-id' => $parent, 'menu-item-status' => 'publish' ) );
	update_option( 'pmc_industry_menu_sig', $sig );
}
