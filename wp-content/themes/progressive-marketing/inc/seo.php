<?php
/**
 * Meta descriptions, Open Graph tags, and structured data.
 * Meta and OG output is skipped when Yoast SEO or Rank Math is active.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Is an SEO plugin handling meta tags?
 */
function pmc_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' );
}

/**
 * Meta description for the current page.
 */
function pmc_meta_description() {
	$by_slug = array(
		'driveby'      => 'PMC Driveby is a location-based ranking system that moves your Google Business Profile into the top 3 on Google Maps across your whole service area.',
		'case-studies' => 'Real before-and-after Google Maps ranking results from clinics using PMC Driveby: #8 to #1 for “chiropractor near me,” 97.53% share of local voice for an animal hospital, and more.',
		'about-us'     => 'Progressive Marketing Concepts helps local businesses dominate Google Maps with PMC Driveby, precision Google Business Profile optimization.',
		'contact-us'   => 'Start a free 7-day PMC Driveby trial or call (817) 703-3689 to talk with Progressive Marketing Concepts.',
		'industries'   => 'Google Maps ranking for medical clinics, auto dealerships, hotels, and veterinary clinics.',
	);
	if ( is_front_page() ) {
		return 'Progressive Marketing Concepts puts medical clinics, auto dealerships, hotels, and veterinary clinics in the top 3 on Google Maps with PMC Driveby. Start a free 7-day trial.';
	}
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $by_slug[ $slug ] ) ) {
			return $by_slug[ $slug ];
		}
		$industries = pmc_industries();
		if ( isset( $industries[ $slug ] ) ) {
			return wp_strip_all_tags( $industries[ $slug ]['hero'] . ' ' . $industries[ $slug ]['lead'] );
		}
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
 * Print meta description and Open Graph tags.
 */
function pmc_head_meta() {
	if ( pmc_seo_plugin_active() ) {
		return;
	}
	$desc  = pmc_meta_description();
	$title = wp_get_document_title();
	$url   = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
	if ( $desc ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
		printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
	}
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	echo '<meta property="og:type" content="website">' . "\n";
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
	printf( '<meta property="og:image" content="%s">' . "\n", esc_url( pmc_img( 'grapevine-animal-hospital-near-me.webp' ) ) );
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action( 'wp_head', 'pmc_head_meta', 1 );

/**
 * JSON-LD: organization on every page, FAQ where FAQs are shown.
 */
function pmc_structured_data() {
	$graph = array(
		array(
			'@type'       => 'ProfessionalService',
			'@id'         => home_url( '/#organization' ),
			'name'        => 'Progressive Marketing Concepts',
			'url'         => home_url( '/' ),
			'logo'        => pmc_img( 'logo.png' ),
			'telephone'   => pmc_opt( 'phone' ),
			'email'       => pmc_opt( 'email' ),
			'description' => 'Google Maps and local search ranking for medical clinics, auto dealerships, hotels, and veterinary clinics with PMC Driveby.',
			'areaServed'  => 'US',
			'knowsAbout'  => array( 'Google Business Profile optimization', 'Local SEO', 'Google Maps ranking', 'Local search visibility' ),
			'makesOffer'  => array(
				'@type'       => 'Offer',
				'name'        => 'PMC Driveby 7-Day Free Trial',
				'price'       => '0',
				'priceCurrency' => 'USD',
				'itemOffered' => array(
					'@type'       => 'Service',
					'name'        => 'PMC Driveby',
					'serviceType' => 'Google Business Profile ranking',
				),
			),
		),
	);

	$slug = is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '';
	if ( is_front_page() || 'driveby' === $slug ) {
		$faq = array(
			'@type'      => 'FAQPage',
			'mainEntity' => array(),
		);
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
add_action( 'wp_head', 'pmc_structured_data', 20 );
