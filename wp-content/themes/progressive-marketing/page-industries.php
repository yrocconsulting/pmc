<?php
/**
 * Industries hub (/industries/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero hero-dark">
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container page-hero-inner" data-reveal>
		<p class="eyebrow">Industries</p>
		<h1>Where the map decides, <em>we make it decide for you.</em></h1>
		<p class="lead">We focus on four industries where customers choose from a short list on their phone. Pick yours and see what your future looks like.</p>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="ind-grid">
			<?php foreach ( pmc_industries() as $slug => $ind ) : ?>
				<a class="ind-card" href="<?php echo esc_url( home_url( '/industries/' . $slug . '/' ) ); ?>" data-reveal>
					<span class="svc-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span>
					<p class="eyebrow"><?php echo esc_html( $ind['name'] ); ?></p>
					<h2><?php echo esc_html( $ind['future'] ); ?></h2>
					<p><?php echo esc_html( $ind['short'] ); ?></p>
					<span class="link-arrow">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
