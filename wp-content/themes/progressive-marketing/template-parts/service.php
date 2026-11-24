<?php
/**
 * Single service page.
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, svc }
 */

defined( 'ABSPATH' ) || exit;
$slug = $args['slug'];
$svc  = $args['svc'];
?>
<section class="page-hero hero-dark">
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container page-hero-inner" data-reveal>
		<p class="eyebrow"><span class="eyebrow-icon"><?php echo pmc_icon( $svc['icon'] ); // phpcs:ignore ?></span> <?php echo esc_html( $svc['name'] ); ?> <?php echo pmc_draft_badge( $svc ); // phpcs:ignore ?></p>
		<h1><?php echo esc_html( $svc['tagline'] ); ?></h1>
		<p class="lead"><?php echo esc_html( $svc['future'] ); ?></p>
		<div class="hero-actions">
			<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See results</a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Your future', 'What *changes* for you.' ); ?>
		<div class="outcomes">
			<?php foreach ( $svc['outcomes'] as $i => $o ) : ?>
				<div class="outcome" data-reveal style="--r:<?php echo (int) $i; ?>">
					<span class="outcome-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<p><?php echo esc_html( $o ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-dark">
	<div class="container<?php echo 'ripple' === $slug ? ' split split-center' : ''; ?>">
		<div>
			<?php pmc_heading( 'How it works', 'Four steps, *start to finish.*' ); ?>
			<ol class="process process-dark<?php echo 'ripple' === $slug ? ' process-stack' : ''; ?>">
				<?php foreach ( $svc['steps'] as $i => $st ) : ?>
					<li class="process-step" style="--r:<?php echo (int) $i; ?>">
						<span class="process-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3><?php echo esc_html( $st[0] ); ?></h3>
						<p><?php echo esc_html( $st[1] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
		<?php if ( 'ripple' === $slug ) : ?>
			<?php get_template_part( 'template-parts/ripple-viz' ); ?>
		<?php endif; ?>
	</div>
</section>

<?php if ( 'website-builds' === $slug ) : ?>
<section class="section section-paper">
	<div class="container split">
		<?php pmc_heading( 'Built for AI search', 'When someone asks an AI, *it names you.*', 'People now ask ChatGPT, Gemini, and Google’s AI Overviews who to call. Those answers come from your listing, your reviews, and a website machines can read.' ); ?>
		<?php get_template_part( 'template-parts/ai-answer' ); ?>
	</div>
</section>
<?php endif; ?>

<section class="section section-paper">
	<div class="container split">
		<div data-reveal>
			<p class="eyebrow">How we get you there</p>
			<h2 class="sec-title"><?php echo esc_html( $svc['name'] ); ?></h2>
			<p class="sec-lead"><?php echo esc_html( pmc_copy( $svc['summary'] ) ); ?></p>
		</div>
		<div class="parts">
			<?php foreach ( $svc['parts'] as $i => $p ) : ?>
				<div class="part" data-reveal style="--r:<?php echo (int) $i; ?>">
					<h3><?php echo esc_html( $p[0] ); ?></h3>
					<p><?php echo esc_html( pmc_copy( $p[1] ) ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php if ( 'driveby-review-guard' === $slug ) : ?>
<section class="section">
	<div class="container">
		<?php pmc_heading( 'Proof', 'The map, *before and after.*', 'Drag the slider. Every dot is a point in the client’s market; green means top three.' ); ?>
		<div class="case-grid">
			<?php foreach ( pmc_case_studies() as $cs_slug => $cs ) : ?>
				<?php get_template_part( 'template-parts/case-card', null, array( 'slug' => $cs_slug, 'cs' => $cs ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php endif; ?>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'The other two', 'One system, *three ways in.*' ); ?>
		<div class="svc-grid svc-grid-2">
			<?php foreach ( pmc_services() as $o_slug => $o ) : ?>
				<?php
				if ( $o_slug === $slug ) {
					continue;
				}
				?>
				<a class="svc-card" href="<?php echo esc_url( home_url( '/services/' . $o_slug . '/' ) ); ?>" data-reveal>
					<span class="svc-icon"><?php echo pmc_icon( $o['icon'] ); // phpcs:ignore ?></span>
					<h3><?php echo esc_html( $o['name'] ); ?></h3>
					<p class="svc-tagline"><?php echo esc_html( $o['tagline'] ); ?></p>
					<p><?php echo esc_html( $o['future'] ); ?></p>
					<span class="link-arrow">Explore <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/cta' ); ?>
