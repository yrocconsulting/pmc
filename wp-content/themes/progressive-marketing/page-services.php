<?php
/**
 * Services hub (/services/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero hero-dark">
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container page-hero-inner" data-reveal>
		<p class="eyebrow">Services</p>
		<h1>Three ways in. <em>One future.</em></h1>
		<p class="lead">Found first, trusted on sight, chosen again and again. Every service we offer exists to get you there, and they work best together.</p>
	</div>
</section>
<section class="section">
	<div class="container">
		<?php get_template_part( 'template-parts/services-grid' ); ?>
	</div>
</section>
<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'The path', 'How the three *work together.*' ); ?>
		<?php get_template_part( 'template-parts/process' ); ?>
	</div>
</section>
<?php get_template_part( 'template-parts/faq' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
