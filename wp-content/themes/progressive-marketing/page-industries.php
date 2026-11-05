<?php
/**
 * Industries hub (/industries/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero page-hero-center">
	<div class="container narrow">
		<p class="eyebrow">Industries</p>
		<h1>When customers choose from the map, we put you on top.</h1>
		<p class="lead">PMC Driveby works for any business that serves customers from a physical location. We specialize in four industries where Google Maps decides who gets the call.</p>
	</div>
</section>
<section class="section section-tight">
	<div class="container">
		<?php get_template_part( 'template-parts/industries-grid' ); ?>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
