<?php
/**
 * Industries hub (/industries/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero">
	<div class="container page-hero-split">
		<div class="page-hero-copy" data-reveal>
			<p class="eyebrow">Industries</p>
			<h1>Where the map decides, <em>we make it decide for you.</em></h1>
			<p class="lead"><?php echo esc_html( sprintf( 'From clinics to contractors: %d industries in %d categories, all places where customers choose from a short list on their phone. Find yours and see what your future looks like.', pmc_industry_count(), count( pmc_industries() ) ) ); ?></p>
		</div>
		<?php pmc_page_media( 'industries' ); ?>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="cat-grid">
			<?php $pmc_i = 0; ?>
			<?php foreach ( pmc_industries() as $slug => $ind ) : ?>
				<article class="cat-card" data-reveal style="--r:<?php echo (int) ( $pmc_i++ % 3 ); ?>">
					<a class="cat-head" href="<?php echo esc_url( pmc_industry_url( $slug ) ); ?>">
						<span class="svc-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span>
						<span>
							<span class="cat-name"><?php echo esc_html( $ind['name'] ); ?></span>
							<span class="cat-future"><?php echo esc_html( $ind['future'] ); ?></span>
						</span>
					</a>
					<ul class="cat-links">
						<?php foreach ( $ind['industries'] as $sl => $r ) : ?>
							<li><a href="<?php echo esc_url( pmc_industry_url( $slug, $sl ) ); ?>"><?php echo esc_html( $r[0] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<a class="link-arrow" href="<?php echo esc_url( pmc_industry_url( $slug ) ); ?>">All <?php echo esc_html( strtolower( $ind['name'] ) ); ?> <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="cat-note">Don’t see your industry? If customers find you on Google Maps, PMC Driveby works for you. <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Ask us about your market.</a></p>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
