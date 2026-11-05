<?php
/**
 * PMC Driveby service page (/driveby/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="page-hero">
	<div class="container hero-split">
		<div>
			<p class="eyebrow">PMC Driveby</p>
			<h1>Location-based ranking for your Google Business Profile.</h1>
			<p class="lead">PMC Driveby is our precision Google Business Profile ranking system. It raises your visibility across Google Maps, local search, and AI search platforms, expands the radius you rank in, and builds authority for the keywords that drive calls.</p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">Start my free 7-day trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<?php echo wp_kses_post( pmc_phone_link( 'btn btn-ghost btn-lg' ) ); ?>
			</div>
		</div>
		<div class="hero-visual">
			<figure class="shot">
				<img src="<?php echo esc_url( pmc_img( 'mansfield-chiropractor-near-me.webp' ) ); ?>" width="657" height="356" alt="Geo-grid for “chiropractor near me” in Mansfield, TX. Before: rank 8, 1.23% share of local voice. After: rank 1.5, 71.61% share of local voice.">
				<figcaption>“Chiropractor near me,” Mansfield, TX. Before: rank 8. After: rank 1.5. More green means higher ranking.</figcaption>
			</figure>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="feature-grid">
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?></span>
				<h3>Your whole service area</h3>
				<p>Rankings change block by block. Driveby expands the radius where you show up in the top 3, not just the street your business is on.</p>
			</div>
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'bolt' ); // phpcs:ignore ?></span>
				<h3>Fast movement</h3>
				<p>Our optimization runs 30–45 days. One client moved from #13 to #5 for a key service in seven days.</p>
			</div>
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'grid' ); // phpcs:ignore ?></span>
				<h3>Proof on a grid</h3>
				<p>Every keyword gets a before-and-after geo-grid with average ranking position and share of local voice. You see exactly what changed.</p>
			</div>
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'eye' ); // phpcs:ignore ?></span>
				<h3>Total transparency</h3>
				<p>You’ll always know what we’re doing, why we’re doing it, and how it affects your bottom line.</p>
			</div>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<p class="eyebrow">The process</p>
		<h2 class="section-title">How PMC Driveby works</h2>
		<?php get_template_part( 'template-parts/steps' ); ?>
	</div>
</section>

<section class="section">
	<div class="container split">
		<div>
			<p class="eyebrow">Reading your report</p>
			<h2 class="section-title">More green means higher ranking.</h2>
		</div>
		<div class="prose">
			<p>We place a grid of points over your service area and check where your business ranks from each one. Each dot shows your position from that spot.</p>
			<ul class="legend">
				<li><span class="dot r1">1</span> Ranks 1–3: in the map pack</li>
				<li><span class="dot r2">5</span> Ranks 4–6: close</li>
				<li><span class="dot r3">9</span> Ranks 7–10: page one, below the fold</li>
				<li><span class="dot r4">20+</span> Rank 11+: invisible</li>
			</ul>
			<p><strong>ARP</strong> (average ranking position) is your average across every dot. Lower is better. <strong>SOLV</strong> (share of local voice) is the share of dots where you rank in the top 3.</p>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/faq' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>

<?php
get_footer();
