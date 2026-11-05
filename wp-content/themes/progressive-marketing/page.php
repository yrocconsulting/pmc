<?php
/**
 * Default page. Industry pages (children of /industries/) use the industry layout.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();

$pmc_slug       = get_post_field( 'post_name', get_queried_object_id() );
$pmc_industries = pmc_industries();

if ( isset( $pmc_industries[ $pmc_slug ] ) ) {
	get_template_part( 'template-parts/industry', null, array( 'slug' => $pmc_slug, 'ind' => $pmc_industries[ $pmc_slug ] ) );
} else {
	while ( have_posts() ) :
		the_post();
		?>
		<section class="page-hero page-hero-center page-hero-sm">
			<div class="container narrow"><h1><?php the_title(); ?></h1></div>
		</section>
		<section class="section section-tight">
			<div class="container narrow prose entry-content"><?php the_content(); ?></div>
		</section>
		<?php
	endwhile;
}

get_footer();
