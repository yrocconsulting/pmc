<?php
/**
 * Single industry page (/industries/{category}/{industry}/).
 *
 * @package ProgressiveMarketing
 * @var array $args { cat, cat_data, ind }
 */

defined( 'ABSPATH' ) || exit;
$cat     = $args['cat'];
$cd      = $args['cat_data'];
$si      = $args['ind'];
$exact   = pmc_case_studies_for( $cat, $si['slug'] );
$related = pmc_case_studies_for( $cat );
$cases   = $exact ? $exact : ( $related ? $related : pmc_case_studies() );
$program = ! empty( $cd['program'] ) ? $cd['program'] : '';
$who     = $cd['customers'];
?>
<section class="page-hero">
	<div class="container hero-split">
		<div data-reveal>
			<p class="eyebrow"><span class="eyebrow-icon"><?php echo pmc_icon( $cd['icon'] ); // phpcs:ignore ?></span> <a class="crumb" href="<?php echo esc_url( pmc_industry_url( $cat ) ); ?>"><?php echo esc_html( $cd['name'] ); ?></a> · <?php echo esc_html( $si['name'] ); ?></p>
			<h1><?php echo esc_html( $si['line'] ); ?></h1>
			<p class="lead"><?php echo esc_html( sprintf( 'When %s need a %s, they search on their phone, compare the first few results on the map, read reviews, and call. In your future, yours is the %s they find first, trust on sight, and choose.', $who, $si['singular'], $si['singular'] ) ); ?></p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<?php if ( $program ) : ?>
					<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url( '/growth360/' . $program . '/' ) ); ?>">Explore Growth360™</a>
				<?php else : ?>
					<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See results</a>
				<?php endif; ?>
			</div>
		</div>
		<?php ob_start(); ?>
		<div class="search-card">
			<p class="search-card-title"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?> Where <?php echo esc_html( $who ); ?> find you first</p>
			<ul>
				<?php foreach ( $si['searches'] as $q ) : ?>
					<li><span class="rank-pill">#1</span><?php echo esc_html( $q ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php pmc_page_media( $cat, ob_get_clean() ); ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Your future', 'What changes for your *' . strtolower( $si['singular'] ) . '.*' ); ?>
		<div class="outcomes">
			<div class="outcome" data-reveal>
				<span class="outcome-num">01 · Found first</span>
				<h3>Top of the map for “<?php echo esc_html( $si['searches'][0] ); ?>”</h3>
				<p><?php echo esc_html( sprintf( 'PMC Driveby lifts your Google Business Profile into the top three across your whole service area, for the searches %s actually type.', $who ) ); ?></p>
			</div>
			<?php foreach ( array_slice( $cd['moments'], 1 ) as $i => $m ) : ?>
				<div class="outcome" data-reveal style="--r:<?php echo (int) $i + 1; ?>">
					<span class="outcome-num"><?php echo esc_html( str_pad( $i + 2, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $m[0] ); ?></h3>
					<p><?php echo esc_html( $m[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-paper">
	<div class="container">
		<?php
		if ( $exact ) {
			$proof = 'Results for *' . strtolower( $si['name'] ) . '.*';
		} elseif ( $related ) {
			$proof = 'Results in *' . strtolower( $cd['name'] ) . '.*';
		} else {
			$proof = 'Results from *our clients.*';
		}
		pmc_heading( 'Proof', $proof, 'Real client reports. Drag the slider to compare the map before and after.' );
		?>
		<?php if ( $exact ) : ?>
			<?php foreach ( $exact as $cs_slug => $cs ) : ?>
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
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'How we get you there', 'Three services. *One outcome.*' ); ?>
		<?php get_template_part( 'template-parts/services-grid' ); ?>
	</div>
</section>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'Related', 'More in *' . strtolower( $cd['name'] ) . '.*' ); ?>
		<?php get_template_part( 'template-parts/industry-list', null, array( 'cat' => $cat, 'ind' => $cd, 'exclude' => $si['slug'] ) ); ?>
	</div>
</section>

<?php
get_template_part(
	'template-parts/cta',
	null,
	array( 'title' => 'See where your ' . strtolower( $si['singular'] ) . ' ranks *today.*' )
);
