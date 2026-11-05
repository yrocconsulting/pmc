<?php
/**
 * Case studies (/case-studies/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
$cases = pmc_case_studies();
?>
<section class="page-hero page-hero-center">
	<div class="container narrow">
		<p class="eyebrow">Case studies</p>
		<h1>Real clients. Real grids. Results in about a month.</h1>
		<p class="lead">Your visibility on Google Maps directly affects your call volume and monthly revenue. These are before-and-after results from businesses that partnered with PMC Driveby to rise above the noise and take over local search.</p>
	</div>
	<nav class="container case-jump" aria-label="Case studies">
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
		<p class="fine-print">ARP = average ranking position across the grid (lower is better). SOLV = share of local voice, the percentage of grid points where the business ranks in the top 3. More green means higher ranking.</p>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta', null, array( 'title' => 'Want results like these?' ) ); ?>
<?php
get_footer();
