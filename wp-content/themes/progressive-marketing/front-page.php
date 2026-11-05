<?php
/**
 * Home page.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
$cases = pmc_case_studies();
?>

<section class="hero">
	<div class="container hero-split">
		<div class="hero-copy">
			<p class="eyebrow eyebrow-light">PMC Driveby · Google Maps ranking</p>
			<h1>Own the top 3 on Google Maps in your market.</h1>
			<p class="lead">Local customers pick from the first few businesses Google shows them on the map. PMC Driveby moves your Google Business Profile into those spots for the searches that bring in patients, buyers, guests, and pet owners.</p>
			<div class="hero-actions">
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">Start my free 7-day trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<a class="btn btn-ghost-light btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See client results</a>
			</div>
			<p class="hero-note"><?php echo pmc_icon( 'check' ); // phpcs:ignore ?> Free 7-day trial <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> Results in 30–45 days <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No sales presentation</p>
		</div>
		<div class="hero-visual">
			<div class="grid-card" data-grid-card>
				<div class="grid-card-head">
					<span class="grid-card-kw"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?> “animal hospital near me”</span>
					<span class="grid-card-state" data-grid-label>Before Driveby</span>
				</div>
				<?php echo pmc_rank_grid( 7 ); // phpcs:ignore ?>
				<div class="grid-card-foot">
					<div><span class="k">Rank</span><span class="v" data-grid-rank>8</span></div>
					<div><span class="k">Share of local voice</span><span class="v" data-grid-solv>1.23%</span></div>
				</div>
				<button class="grid-toggle" type="button" data-grid-toggle aria-pressed="false">Show after</button>
			</div>
			<p class="grid-caption">Illustration based on our Grapevine, TX animal hospital client: rank 8 → rank 1, 1.23% → 97.53% share of local voice.</p>
		</div>
	</div>
</section>

<section class="stats-strip" aria-label="Client results">
	<div class="container stats">
		<div class="stat"><span class="stat-v">#8 → #1</span><span class="stat-k">“Chiropractor near me”<br>Mansfield, TX</span></div>
		<div class="stat"><span class="stat-v">97.53%</span><span class="stat-k">Share of local voice<br>Animal hospital, Grapevine, TX</span></div>
		<div class="stat"><span class="stat-v">100%</span><span class="stat-k">Grid coverage<br>Weight loss clinic, Gilbert, AZ</span></div>
		<div class="stat"><span class="stat-v">7 days</span><span class="stat-k">#13 → #5 for “Immune Booster IV”<br>Rockwall, TX</span></div>
	</div>
</section>

<section class="section">
	<div class="container split">
		<div>
			<p class="eyebrow">Why the map pack</p>
			<h2 class="section-title">If you’re not in the top 3, most customers never see you.</h2>
		</div>
		<div class="prose">
			<p>When someone searches “near me” on their phone, Google shows a map with three businesses above everything else. That’s where people compare reviews, check hours, and tap to call.</p>
			<p>Where you show up depends on where the customer is standing. You might rank #2 next to your office and #15 two miles away. PMC Driveby builds your visibility across your <em>whole</em> service area, and we prove it with a before-and-after geo-grid for every keyword.</p>
			<a class="link-arrow" href="<?php echo esc_url( home_url( '/driveby/' ) ); ?>">How PMC Driveby works <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
	</div>
</section>

<section class="section section-soft">
	<div class="container">
		<p class="eyebrow">How it works</p>
		<h2 class="section-title">Four steps to the top of the map</h2>
		<?php get_template_part( 'template-parts/steps' ); ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow">Who we work with</p>
				<h2 class="section-title">Built for businesses where the map decides</h2>
			</div>
		</div>
		<?php get_template_part( 'template-parts/industries-grid' ); ?>
	</div>
</section>

<section class="section section-navy">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow eyebrow-light">Case studies</p>
				<h2 class="section-title">Real grids. Real rankings.</h2>
			</div>
			<a class="link-arrow link-light" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">All case studies <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
		<div class="case-grid">
			<?php foreach ( $cases as $slug => $cs ) : ?>
				<?php get_template_part( 'template-parts/case-card', null, array( 'slug' => $slug, 'cs' => $cs ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>

<section class="section section-soft">
	<div class="container program">
		<div>
			<p class="eyebrow">For veterinary clinics</p>
			<h2 class="section-title">Growth360™ for Veterinary Clinics</h2>
			<p class="lead-sm">Our veterinary program combines PMC Driveby, PMC Reputation Shield™, and monthly executive reporting. It starts with a complimentary seven-day Executive Evaluation™, with no consultation call and no sales presentation.</p>
		</div>
		<a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/growth360/' ) ); ?>">Explore Growth360™ <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>
</section>

<?php get_template_part( 'template-parts/faq' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>

<?php
get_footer();
