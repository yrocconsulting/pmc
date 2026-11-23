<?php
/**
 * Home page. About 85% the client's future, 15% the services.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="hero hero-dark" data-spotlight>
	<div class="hero-grain" aria-hidden="true"></div>
	<div class="container hero-split">
		<div class="hero-copy">
			<p class="eyebrow" data-reveal>For established local businesses</p>
			<h1 data-reveal>Ninety days from now, you’re <em>the obvious choice.</em></h1>
			<p class="lead" data-reveal>Your name at the top of the map. Reviews that sell for you. A website that books the appointment. AI assistants that recommend you by name. That’s the future we build for business owners, and it starts with seeing where you stand today.</p>
			<div class="hero-actions" data-reveal>
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<a class="btn btn-outline-light btn-lg" href="#proof">See real results</a>
			</div>
			<p class="hero-note" data-reveal><?php echo pmc_icon( 'check' ); // phpcs:ignore ?> Free 7-day trial <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> No sales presentation <?php echo pmc_icon( 'check' ); // phpcs:ignore ?> Results you can see on a map</p>
		</div>
		<div class="hero-visual">
			<?php get_template_part( 'template-parts/phone-feed' ); ?>
		</div>
	</div>
	<div class="container">
		<dl class="hero-stats" data-reveal>
			<div><dt>#8 → #1</dt><dd>“Chiropractor near me,” Mansfield, TX</dd></div>
			<div><dt data-count="97.53" data-suffix="%">97.53%</dt><dd>Share of local voice, animal hospital</dd></div>
			<div><dt data-count="100" data-suffix="%">100%</dt><dd>Grid coverage, weight loss clinic</dd></div>
			<div><dt data-count="7" data-suffix=" days">7 days</dt><dd>#13 → #5 for a key service</dd></div>
		</dl>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Picture this', 'A business customers *choose before they call.*', 'Most of your next customers will decide in under a minute, on a phone, from a short list. Here’s what that minute looks like when the short list is you.' ); ?>
		<div class="futures-row">
			<?php foreach ( pmc_futures() as $i => $f ) : ?>
				<article class="future-card" data-reveal style="--r:<?php echo (int) $i; ?>">
					<span class="future-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $f[0] ); ?></h3>
					<p><?php echo esc_html( $f[1] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-dark" id="proof">
	<div class="container">
		<div class="sec-head-row">
			<?php pmc_heading( 'The future, already real', 'Watch the map *turn green.*', 'These are real client reports. Each dot is a point in their market: red means invisible, green means top three. Drag the slider.' ); ?>
			<a class="link-arrow" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" data-reveal>All results <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
		<div class="case-grid">
			<?php foreach ( pmc_case_studies() as $slug => $cs ) : ?>
				<?php get_template_part( 'template-parts/case-card', null, array( 'slug' => $slug, 'cs' => $cs ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section-paper">
	<div class="container split split-center">
		<?php pmc_heading( 'The next front door', 'Tomorrow’s customers ask AI. *It should name you.*', 'More people now ask ChatGPT, Gemini, or Google’s AI Overview who to call. Those answers come from your map listing, your reviews, and your website. In your future, all three point to you.' ); ?>
		<?php get_template_part( 'template-parts/ai-answer' ); ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Your industry, your future', 'What *winning* looks like for you.' ); ?>
		<?php get_template_part( 'template-parts/industries-grid' ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/testimonial' ); ?>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'How we get you there', 'Three services. *One outcome.*' ); ?>
		<?php get_template_part( 'template-parts/services-grid' ); ?>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'The path', 'From today to *the obvious choice.*' ); ?>
		<?php get_template_part( 'template-parts/process' ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/faq' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>

<?php
get_footer();
