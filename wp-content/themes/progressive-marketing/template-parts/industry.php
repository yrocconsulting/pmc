<?php
/**
 * Single industry page body.
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, ind }
 */

defined( 'ABSPATH' ) || exit;
$slug  = $args['slug'];
$ind   = $args['ind'];
$cases = pmc_case_studies_for( $slug );
if ( ! $cases ) {
	$cases = pmc_case_studies();
}
?>
<section class="page-hero">
	<div class="container hero-split">
		<div>
			<p class="eyebrow"><span class="eyebrow-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span> PMC Driveby for <?php echo esc_html( $ind['name'] ); ?></p>
			<h1><?php echo esc_html( $ind['hero'] ); ?></h1>
			<p class="lead"><?php echo esc_html( $ind['lead'] ); ?></p>
			<div class="hero-actions">
				<?php if ( ! empty( $ind['program'] ) ) : ?>
					<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $ind['program']['url'] ); ?>"><?php echo esc_html( $ind['program']['cta'] ); ?> <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
					<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">Free 7-day Driveby trial</a>
				<?php else : ?>
					<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">Start my free trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
					<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See results</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="search-card">
			<p class="search-card-title"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?> Searches we help <?php echo esc_html( $ind['customers'] ); ?> find you for</p>
			<ul>
				<?php foreach ( $ind['searches'] as $q ) : ?>
					<li><?php echo esc_html( $q ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="feature-grid">
			<?php foreach ( $ind['points'] as $p ) : ?>
				<div class="feature">
					<span class="feature-check"><?php echo pmc_icon( 'check' ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $p[0] ); ?></h3>
					<p><?php echo esc_html( $p[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<p class="eyebrow">How it works</p>
		<h2 class="section-title">From invisible to the top of the map</h2>
		<?php get_template_part( 'template-parts/steps' ); ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<p class="eyebrow">Proof</p>
		<h2 class="section-title"><?php echo pmc_case_studies_for( $slug ) ? 'Results for ' . esc_html( strtolower( $ind['name'] ) ) : 'Results from our clients'; ?></h2>
		<?php if ( pmc_case_studies_for( $slug ) ) : ?>
			<?php foreach ( $cases as $cs_slug => $cs ) : ?>
				<?php get_template_part( 'template-parts/case-study', null, array( 'slug' => $cs_slug, 'cs' => $cs ) ); ?>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="case-grid">
				<?php foreach ( $cases as $cs_slug => $cs ) : ?>
					<?php get_template_part( 'template-parts/case-card', null, array( 'slug' => $cs_slug, 'cs' => $cs ) ); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php
get_template_part(
	'template-parts/cta',
	null,
	array(
		'title' => 'Find out where your ' . strtolower( rtrim( $ind['name'], 's' ) ) . ' ranks today.',
	)
);
