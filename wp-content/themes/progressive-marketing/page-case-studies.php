<?php
/**
 * Results (/case-studies/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
$cases = pmc_case_studies();
?>
<section class="page-hero hero-dark">
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container page-hero-inner" data-reveal>
		<p class="eyebrow">Results</p>
		<h1>Their future <em>already happened.</em></h1>
		<p class="lead">Real before-and-after reports from businesses that partnered with PMC Driveby. Every dot is a point in their market. Red means invisible. Green means top three.</p>
	</div>
	<nav class="container case-jump" aria-label="Case studies" data-reveal>
		<?php foreach ( $cases as $slug => $cs ) : ?>
			<a href="#<?php echo esc_attr( $slug ); ?>"><strong><?php echo esc_html( $cs['highlight']['value'] ); ?></strong><span><?php echo esc_html( $cs['title'] ); ?>, <?php echo esc_html( $cs['location'] ); ?></span></a>
		<?php endforeach; ?>
	</nav>
</section>
<section class="section">
	<div class="container">
		<?php foreach ( $cases as $slug => $cs ) : ?>
			<?php get_template_part( 'template-parts/case-study', null, array( 'slug' => $slug, 'cs' => $cs ) ); ?>
		<?php endforeach; ?>
		<p class="fine-print">ARP = average ranking position across the grid (lower is better). SOLV = share of local voice, the percentage of grid points where the business ranks in the top 3.</p>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta', null, array( 'title' => 'Your map *could be next.*' ) ); ?>
<?php
get_footer();
