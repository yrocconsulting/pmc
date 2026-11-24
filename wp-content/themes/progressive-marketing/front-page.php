<?php
/**
 * Home page. About 85% the client's future, 15% the services.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();

$marquee = array();
foreach ( pmc_industries() as $ind ) {
	$marquee = array_merge( $marquee, array_slice( $ind['searches'], 0, 3 ) );
}
?>

<section class="hero">
	<div class="hero-sun" aria-hidden="true"></div>
	<div class="container hero-photo-split">
		<div class="hero-copy">
			<p class="pill" data-reveal><span class="pill-dot"></span> For established local businesses</p>
			<h1 data-reveal>Ninety days from now, you’re <em>the obvious choice.</em></h1>
			<p class="lead" data-reveal>Your name at the top of the map. Reviews that sell for you. Customers spreading the word. And a website that books the appointment while you sleep.</p>
			<div class="hero-actions" data-reveal>
				<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
				<a class="btn btn-ghost btn-lg" href="#proof">See real results</a>
			</div>
		</div>
		<figure class="hero-photo" data-reveal>
			<div class="hero-photo-frame">
				<img src="<?php echo esc_url( pmc_hero_image() ); ?>" width="960" height="1200" alt="<?php echo esc_attr( pmc_opt( 'hero_image_alt' ) ); ?>" fetchpriority="high">
			</div>
			<div class="hero-chip chip-rank" aria-hidden="true">
				<span class="chip-icon"><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?></span>
				<span><strong>#1 on Google Maps</strong><small>“animal hospital near me”</small></span>
			</div>
			<div class="hero-chip chip-review" aria-hidden="true">
				<span class="chip-stars"><?php echo str_repeat( pmc_icon( 'star' ), 5 ); // phpcs:ignore ?></span>
				<span><strong>New 5-star review</strong><small>“Booked in two minutes.”</small></span>
			</div>
			<div class="hero-chip chip-share" aria-hidden="true">
				<span class="chip-icon"><?php echo pmc_icon( 'ripple' ); // phpcs:ignore ?></span>
				<span><strong>Shared by a customer</strong><small>“Sent this to my sister!”</small></span>
			</div>
		</figure>
	</div>
	<div class="container">
		<?php get_template_part( 'template-parts/future-toggle' ); ?>
	</div>
</section>

<div class="marquee" aria-hidden="true">
	<div class="marquee-track">
		<?php for ( $k = 0; $k < 2; $k++ ) : ?>
			<?php foreach ( $marquee as $q ) : ?>
				<span><b>#1</b> <?php echo esc_html( $q ); ?></span>
			<?php endforeach; ?>
		<?php endfor; ?>
	</div>
</div>

<section class="section section-tight">
	<div class="container">
		<dl class="stat-row" data-reveal>
			<div class="tint-sky"><dt>#8 → #1</dt><dd>“Chiropractor near me,” Mansfield, TX</dd></div>
			<div class="tint-mint"><dt data-count="97.53" data-suffix="%">97.53%</dt><dd>Share of local voice for an animal hospital</dd></div>
			<div class="tint-peach"><dt data-count="100" data-suffix="%">100%</dt><dd>Map coverage for a weight loss clinic</dd></div>
			<div class="tint-lilac"><dt data-count="7" data-suffix=" days">7 days</dt><dd>From #13 to #5 for a key service</dd></div>
		</dl>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php pmc_heading( 'Picture this', 'A day in your business, *ninety days from now.*', 'Swipe through it. This is what “the obvious choice” feels like from the inside.' ); ?>
		<?php get_template_part( 'template-parts/day-timeline' ); ?>
	</div>
</section>

<section class="section section-paper">
	<div class="container">
		<?php pmc_heading( 'What changes', 'Customers choose you *before they call.*', 'Most of your next customers will decide in under a minute, on a phone, from a short list. In your future, the short list is you.' ); ?>
		<div class="futures-row">
			<?php foreach ( pmc_futures() as $i => $f ) : ?>
				<article class="future-card" data-reveal style="--r:<?php echo (int) $i; ?>">
					<span class="future-num"><?php echo esc_html( $i + 1 ); ?></span>
					<h3><?php echo esc_html( $f[0] ); ?></h3>
					<p><?php echo esc_html( $f[1] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section" id="proof">
	<div class="container">
		<div class="sec-head-row">
			<?php pmc_heading( 'The future, already real', 'Watch the map *turn green.*', 'Real client reports. Each dot is a spot in their market: red means invisible, green means top three. Drag the slider.' ); ?>
			<a class="link-arrow" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>" data-reveal>All results <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
		</div>
		<div class="case-grid">
			<?php foreach ( pmc_case_studies() as $slug => $cs ) : ?>
				<?php get_template_part( 'template-parts/case-card', null, array( 'slug' => $slug, 'cs' => $cs ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>


<section class="section">
	<div class="container">
		<?php pmc_heading( 'Your industry, your future', 'What *winning* looks like for you.' ); ?>
		<?php get_template_part( 'template-parts/industries-bento' ); ?>
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
		<?php pmc_heading( 'The path', 'From today to *the obvious choice.*' ); ?>
		<?php get_template_part( 'template-parts/process' ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/faq' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>

<?php
get_footer();
