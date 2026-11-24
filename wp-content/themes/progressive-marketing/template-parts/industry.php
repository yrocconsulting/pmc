<?php
/**
 * Single industry page.
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, ind }
 */

defined( 'ABSPATH' ) || exit;
$slug    = $args['slug'];
$ind     = $args['ind'];
$own     = pmc_case_studies_for( $slug );
$cases   = $own ? $own : pmc_case_studies();
$program = ! empty( $ind['program'] ) ? $ind['program'] : '';
?>
<section class="page-hero">
	<div class="container hero-split">
		<div data-reveal>
			<p class="eyebrow"><span class="eyebrow-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span> <?php echo esc_html( $ind['name'] ); ?></p>
			<h1><?php echo esc_html( $ind['hero'] ); ?></h1>
			<p class="lead"><?php echo esc_html( $ind['lead'] ); ?></p>
			<div class="hero-actions">
				<?php if ( $program ) : ?>
					<a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/growth360/' . $program . '/' ) ); ?>">Explore Growth360™ <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<?php else : ?>
					<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<?php endif; ?>
				<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See results</a>
			</div>
		</div>
		<div class="search-card" data-reveal>
			<p class="search-card-title"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?> Searches where <?php echo esc_html( $ind['customers'] ); ?> find you first</p>
			<ul>
				<?php foreach ( $ind['searches'] as $q ) : ?>
					<li><span class="rank-pill">#1</span><?php echo esc_html( $q ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Your future', $ind['future'] ); ?>
		<div class="outcomes">
			<?php foreach ( $ind['moments'] as $i => $m ) : ?>
				<div class="outcome" data-reveal style="--r:<?php echo (int) $i; ?>">
					<span class="outcome-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $m[0] ); ?></h3>
					<p><?php echo esc_html( $m[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'Proof', $own ? 'Results for *' . strtolower( $ind['name'] ) . '.*' : 'Results from *our clients.*', 'Drag the slider to compare the map before and after.' ); ?>
		<?php if ( $own ) : ?>
			<?php foreach ( $own as $cs_slug => $cs ) : ?>
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

<section class="section">
	<div class="container">
		<?php pmc_heading( 'How we get you there', 'Three services. *One outcome.*' ); ?>
		<?php get_template_part( 'template-parts/services-grid' ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
