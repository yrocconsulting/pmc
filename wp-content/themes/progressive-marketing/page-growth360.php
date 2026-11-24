<?php
/**
 * Growth360 hub (/growth360/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero">
	<div class="container page-hero-inner" data-reveal>
		<p class="eyebrow">Growth360™</p>
		<h1>An executive growth system, <em>built for your industry.</em></h1>
		<p class="lead">Growth360™ brings local visibility, reputation, and executive reporting into one program. It starts with a complimentary seven-day Executive Evaluation: no consultation, no Zoom, no sales presentation.</p>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="ind-grid ind-grid-2">
			<?php foreach ( pmc_growth360_editions() as $slug => $ed ) : ?>
				<a class="ind-card" href="<?php echo esc_url( home_url( '/growth360/' . $slug . '/' ) ); ?>" data-reveal>
					<p class="eyebrow"><?php echo esc_html( $ed['edition'] ); ?></p>
					<h2><?php echo esc_html( $ed['headline'] ); ?></h2>
					<p><?php echo esc_html( $ed['lead'] ); ?></p>
					<span class="link-arrow">Growth360™ for <?php echo esc_html( $ed['name'] ); ?> <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
