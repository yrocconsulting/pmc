<?php
/**
 * Default page. Routes service, industry, and Growth360 child pages to their layouts.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();

list( $pmc_type, $pmc_key ) = pmc_page_context();

if ( 'service' === $pmc_type ) {
	get_template_part( 'template-parts/service', null, array( 'slug' => $pmc_key, 'svc' => pmc_services()[ $pmc_key ] ) );
} elseif ( 'subindustry' === $pmc_type ) {
	list( $pmc_cat, $pmc_sub ) = explode( '/', $pmc_key );
	get_template_part( 'template-parts/subindustry', null, array( 'cat' => $pmc_cat, 'cat_data' => pmc_industries()[ $pmc_cat ], 'ind' => pmc_subindustry( $pmc_cat, $pmc_sub ) ) );
} elseif ( 'industry' === $pmc_type ) {
	get_template_part( 'template-parts/industry', null, array( 'slug' => $pmc_key, 'ind' => pmc_industries()[ $pmc_key ] ) );
} elseif ( 'growth360' === $pmc_type ) {
	get_template_part( 'template-parts/growth360', null, array( 'slug' => $pmc_key, 'ed' => pmc_growth360_editions()[ $pmc_key ] ) );
} else {
	while ( have_posts() ) :
		the_post();
		?>
		<section class="page-hero page-hero-sm">
			<div class="container"><h1><?php the_title(); ?></h1></div>
		</section>
		<section class="section section-tight">
			<div class="container narrow prose entry-content"><?php the_content(); ?></div>
		</section>
		<?php
	endwhile;
}

get_footer();
