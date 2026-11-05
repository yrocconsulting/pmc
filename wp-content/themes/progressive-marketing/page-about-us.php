<?php
/**
 * About (/about-us/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero">
	<div class="container hero-split">
		<div>
			<p class="eyebrow">About Progressive Marketing Concepts</p>
			<h1>Your partner in local visibility and Google Maps domination.</h1>
			<p class="lead">We help great businesses get the attention they deserve. Our team specializes in precision Google Business Profile optimization that raises your visibility, attracts better customers, and puts your brand in front of local buyers.</p>
		</div>
		<div class="hero-visual">
			<figure class="shot">
				<img src="<?php echo esc_url( pmc_img( 'grapevine-animal-hospital-near-me.webp' ) ); ?>" width="657" height="356" alt="Geo-grid for “animal hospital near me” in Grapevine, TX. Before: rank 8, 1.23% share of local voice. After: rank 1, 97.53% share of local voice.">
				<figcaption>“Animal hospital near me,” Grapevine, TX. Rank 8 → rank 1.</figcaption>
			</figure>
		</div>
	</div>
</section>

<section class="section">
	<div class="container split">
		<div>
			<p class="eyebrow">What we do</p>
			<h2 class="section-title">Found first, everywhere customers search.</h2>
		</div>
		<div class="prose">
			<p>Our 30–45 day optimization process, PMC Driveby, raises your presence across Google Maps, local search, and AI platforms so customers find you first.</p>
			<p>We focus on the businesses where the map decides who gets the call: <a href="<?php echo esc_url( home_url( '/industries/medical-clinics/' ) ); ?>">medical clinics</a>, <a href="<?php echo esc_url( home_url( '/industries/auto-dealerships/' ) ); ?>">auto dealerships</a>, <a href="<?php echo esc_url( home_url( '/industries/hotels/' ) ); ?>">hotels</a>, and <a href="<?php echo esc_url( home_url( '/industries/veterinary-clinics/' ) ); ?>">veterinary clinics</a>.</p>
		</div>
	</div>
</section>

<section class="section section-navy">
	<div class="container">
		<p class="eyebrow eyebrow-light">Our promise</p>
		<h2 class="section-title">We obsess over your performance.</h2>
		<div class="feature-grid feature-grid-3">
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'chart' ); // phpcs:ignore ?></span>
				<h3>We watch your rankings</h3>
				<p>We monitor your rankings closely and use proven strategies to push your business into the top results.</p>
			</div>
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'eye' ); // phpcs:ignore ?></span>
				<h3>You see everything</h3>
				<p>You’ll always know what we’re doing, why we’re doing it, and how it affects your bottom line.</p>
			</div>
			<div class="feature">
				<span class="feature-check"><?php echo pmc_icon( 'shield' ); // phpcs:ignore ?></span>
				<h3>Value before a pitch</h3>
				<p>Start with a free trial or evaluation. No pressure to become a client.</p>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
