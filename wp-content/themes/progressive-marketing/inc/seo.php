<?php
/**
 * Search and AI optimization:
 *  - meta description + Open Graph (skipped when an SEO plugin is active),
 *  - JSON-LD: Organization, WebSite, Service, BreadcrumbList, FAQPage,
 *  - /llms.txt, a plain-language summary of the business for AI assistants,
 *  - robots.txt that welcomes AI crawlers and points to llms.txt,
 *  - automatic noindex on staging hosts.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hosts that must never be indexed (staging copies).
 */
function pmc_is_staging() {
	$host = wp_parse_url( home_url(), PHP_URL_HOST );
	return (bool) preg_match( '/(yroc\.host|staging|localhost|\.local$)/', (string) $host );
}

/**
 * Is an SEO plugin handling meta tags?
 */
function pmc_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' );
}

/**
 * Current page context: [type, key] where type is service|industry|growth360|page.
 */
function pmc_page_context() {
	if ( ! is_page() ) {
		return array( '', '' );
	}
	$id     = get_queried_object_id();
	$slug   = get_post_field( 'post_name', $id );
	$parent = wp_get_post_parent_id( $id );
	$pslug  = $parent ? get_post_field( 'post_name', $parent ) : '';
	if ( 'services' === $pslug && isset( pmc_services()[ $slug ] ) ) {
		return array( 'service', $slug );
	}
	if ( 'industries' === $pslug && isset( pmc_industries()[ $slug ] ) ) {
		return array( 'industry', $slug );
	}
	if ( 'growth360' === $pslug && isset( pmc_growth360_editions()[ $slug ] ) ) {
		return array( 'growth360', $slug );
	}
	return array( 'page', $slug );
}

/**
 * Meta description for the current page.
 */
function pmc_meta_description() {
	if ( is_front_page() ) {
		return 'Progressive Marketing Concepts helps established local businesses become the obvious choice: top of Google Maps, protected reviews, momentum that spreads, and websites built for AI search.';
	}
	list( $type, $key ) = pmc_page_context();
	if ( 'service' === $type ) {
		$s = pmc_services()[ $key ];
		return pmc_copy( $s['future'] );
	}
	if ( 'industry' === $type ) {
		$i = pmc_industries()[ $key ];
		return $i['hero'] . ' ' . $i['lead'];
	}
	if ( 'growth360' === $type ) {
		return pmc_growth360_editions()[ $key ]['lead'];
	}
	$by_slug = array(
		'services'     => 'Three services, one outcome: become the obvious choice in your market. PMC Driveby & Review Guard, Ripple, and high-end website builds.',
		'industries'   => 'What the future looks like for medical clinics, auto dealerships, hotels, and veterinary clinics that work with Progressive Marketing Concepts.',
		'case-studies' => 'Real before-and-after Google Maps results: #8 to #1 for “chiropractor near me,” 97.53% share of local voice for an animal hospital, and more.',
		'growth360'    => 'Growth360™ is an executive growth system for established clinics and dealerships, starting with a complimentary seven-day Executive Evaluation.',
		'about-us'     => 'Progressive Marketing Concepts helps great local businesses get the attention they deserve, with total transparency and no sales pressure.',
		'contact-us'   => 'Talk with Progressive Marketing Concepts or start a free 7-day PMC Driveby trial. Call (817) 703-3689.',
	);
	if ( isset( $by_slug[ $key ] ) ) {
		return $by_slug[ $key ];
	}
	if ( is_singular() ) {
		$excerpt = get_the_excerpt( get_queried_object_id() );
		if ( $excerpt ) {
			return wp_trim_words( $excerpt, 30, '…' );
		}
	}
	return get_bloginfo( 'description' );
}

/**
 * Meta description and Open Graph tags.
 */
function pmc_head_meta() {
	if ( pmc_seo_plugin_active() ) {
		return;
	}
	$desc  = pmc_meta_description();
	$title = wp_get_document_title();
	$url   = is_singular() ? get_permalink() : home_url( '/' );
	if ( $desc ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
		printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
	}
	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $url ) );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	echo '<meta property="og:type" content="website">' . "\n";
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( pmc_img( 'og-image.jpg' ) ) );
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	printf( '<link rel="alternate" type="text/markdown" title="llms.txt" href="%s">' . "\n", esc_url( home_url( '/llms.txt' ) ) );
}
add_action( 'wp_head', 'pmc_head_meta', 1 );
remove_action( 'wp_head', 'rel_canonical' );

/**
 * Noindex staging.
 *
 * @param array $robots Robots directives.
 */
function pmc_staging_robots( $robots ) {
	if ( pmc_is_staging() ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'pmc_staging_robots' );

/**
 * JSON-LD graph.
 */
function pmc_structured_data() {
	$org_id = home_url( '/#organization' );
	$graph  = array(
		array(
			'@type'       => 'ProfessionalService',
			'@id'         => $org_id,
			'name'        => 'Progressive Marketing Concepts',
			'alternateName' => 'PMC',
			'url'         => home_url( '/' ),
			'logo'        => pmc_img( 'logo.png' ),
			'image'       => pmc_img( 'og-image.jpg' ),
			'telephone'   => pmc_opt( 'phone' ),
			'email'       => pmc_opt( 'email' ),
			'description' => 'Progressive Marketing Concepts helps established local businesses become the obvious choice in their market with PMC Driveby & Review Guard, Ripple, and high-end website builds.',
			'areaServed'  => 'United States',
			'address'     => array( '@type' => 'PostalAddress', 'addressLocality' => 'Dallas', 'addressRegion' => 'TX', 'addressCountry' => 'US' ),
			'knowsAbout'  => array( 'Google Business Profile optimization', 'Local SEO', 'Google Maps ranking', 'Online reputation management', 'AI search optimization', 'Website design' ),
			'founder'     => array( '@type' => 'Person', 'name' => pmc_opt( 'rep_name' ) ),
			'hasOfferCatalog' => array(
				'@type'           => 'OfferCatalog',
				'name'            => 'Services',
				'itemListElement' => array_values(
					array_map(
						function ( $slug, $s ) {
							return array(
								'@type'       => 'Offer',
								'itemOffered' => array(
									'@type' => 'Service',
									'name'  => $s['name'],
									'url'   => home_url( '/services/' . $slug . '/' ),
								),
							);
						},
						array_keys( pmc_services() ),
						pmc_services()
					)
				),
			),
		),
		array(
			'@type'     => 'WebSite',
			'@id'       => home_url( '/#website' ),
			'url'       => home_url( '/' ),
			'name'      => 'Progressive Marketing Concepts',
			'publisher' => array( '@id' => $org_id ),
		),
	);

	list( $type, $key ) = pmc_page_context();
	if ( 'service' === $type ) {
		$s       = pmc_services()[ $key ];
		$graph[] = array(
			'@type'       => 'Service',
			'name'        => $s['name'],
			'description' => pmc_copy( $s['summary'] ),
			'provider'    => array( '@id' => $org_id ),
			'areaServed'  => 'United States',
			'url'         => get_permalink(),
		);
	}

	if ( is_page() && ! is_front_page() ) {
		$crumbs = array( array( 'Home', home_url( '/' ) ) );
		foreach ( array_reverse( get_post_ancestors( get_queried_object_id() ) ) as $anc ) {
			$crumbs[] = array( get_the_title( $anc ), get_permalink( $anc ) );
		}
		$crumbs[] = array( get_the_title(), get_permalink() );
		$items    = array();
		foreach ( $crumbs as $i => $c ) {
			$items[] = array( '@type' => 'ListItem', 'position' => $i + 1, 'name' => $c[0], 'item' => $c[1] );
		}
		$graph[] = array( '@type' => 'BreadcrumbList', 'itemListElement' => $items );
	}

	if ( ! empty( $GLOBALS['pmc_faq_shown'] ) || is_front_page() ) {
		$faq = array( '@type' => 'FAQPage', 'mainEntity' => array() );
		foreach ( pmc_faqs() as $item ) {
			$faq['mainEntity'][] = array(
				'@type'          => 'Question',
				'name'           => $item[0],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $item[1] ),
			);
		}
		$graph[] = $faq;
	}

	echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_footer', 'pmc_structured_data', 5 );

/**
 * Serve /llms.txt: a plain-language, link-rich summary for AI assistants.
 *
 * @param WP $wp Request.
 */
function pmc_llms_txt( $wp ) {
	if ( 'llms.txt' !== $wp->request ) {
		return;
	}
	$lines   = array();
	$lines[] = '# Progressive Marketing Concepts';
	$lines[] = '';
	$lines[] = '> Progressive Marketing Concepts (PMC) helps established local businesses become the obvious choice in their market: found first on Google Maps and in AI answers, trusted on sight, and chosen again and again. Based in Dallas–Fort Worth, Texas; serves businesses across the United States.';
	$lines[] = '';
	$lines[] = 'Contact: ' . pmc_opt( 'phone' ) . ' · ' . pmc_opt( 'email' );
	$lines[] = '';
	$lines[] = '## Services';
	foreach ( pmc_services() as $slug => $s ) {
		$lines[] = sprintf( '- [%s](%s): %s', $s['name'], home_url( '/services/' . $slug . '/' ), pmc_copy( $s['summary'] ) );
	}
	$lines[] = '';
	$lines[] = '## Industries';
	foreach ( pmc_industries() as $slug => $i ) {
		$lines[] = sprintf( '- [%s](%s): %s', $i['name'], home_url( '/industries/' . $slug . '/' ), $i['future'] );
	}
	$lines[] = '';
	$lines[] = '## Growth360 programs';
	foreach ( pmc_growth360_editions() as $slug => $e ) {
		$lines[] = sprintf( '- [Growth360 for %s](%s): %s', $e['name'], home_url( '/growth360/' . $slug . '/' ), $e['lead'] );
	}
	$lines[] = '';
	$lines[] = '## Client results (Google Maps geo-grid reports)';
	foreach ( pmc_case_studies() as $c ) {
		$r       = $c['results'][0];
		$lines[] = sprintf( '- %s, %s: “%s” before %s; after %s.', $c['title'], $c['location'], $r['keyword'], $r['before'], $r['after'] );
	}
	$lines[] = '- Definitions: ARP is average ranking position across the map grid (lower is better). SOLV, share of local voice, is the percentage of grid points where the business ranks in the top 3.';
	$lines[] = '';
	$lines[] = '## FAQ';
	foreach ( pmc_faqs() as $f ) {
		$lines[] = '### ' . $f[0];
		$lines[] = $f[1];
		$lines[] = '';
	}
	$lines[] = '## Pages';
	foreach ( array( '' => 'Home', 'services/' => 'Services', 'case-studies/' => 'Results', 'about-us/' => 'About', 'contact-us/' => 'Contact' ) as $path => $label ) {
		$lines[] = sprintf( '- [%s](%s)', $label, home_url( '/' . $path ) );
	}

	status_header( 200 );
	header( 'Content-Type: text/markdown; charset=utf-8' );
	header( 'X-Robots-Tag: ' . ( pmc_is_staging() ? 'noindex' : 'all' ) );
	echo implode( "\n", $lines ) . "\n"; // phpcs:ignore
	exit;
}
add_action( 'parse_request', 'pmc_llms_txt' );

/**
 * robots.txt: welcome AI crawlers on production, block everything on staging.
 *
 * @param string $output Output.
 * @param bool   $public Site is public.
 */
function pmc_robots_txt( $output, $public ) {
	if ( pmc_is_staging() ) {
		return "User-agent: *\nDisallow: /\n";
	}
	if ( ! $public ) {
		return $output;
	}
	$bots = array( 'GPTBot', 'OAI-SearchBot', 'ChatGPT-User', 'ClaudeBot', 'Claude-User', 'Claude-SearchBot', 'PerplexityBot', 'Google-Extended', 'Applebot-Extended', 'Bingbot' );
	foreach ( $bots as $bot ) {
		$output .= "\nUser-agent: {$bot}\nAllow: /\n";
	}
	$output .= "\n# AI summary: " . home_url( '/llms.txt' ) . "\n";
	return $output;
}
add_filter( 'robots_txt', 'pmc_robots_txt', 10, 2 );
