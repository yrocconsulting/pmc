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
	<div class="container page-hero-split">
		<div class="page-hero-copy" data-reveal>
			<p class="eyebrow">About Progressive Marketing Concepts</p>
			<h1>Great businesses deserve <em>to be found.</em></h1>
			<p class="lead">We help established local businesses get the attention they’ve earned: found first, trusted on sight, and chosen by the customers they want most.</p>
		</div>
		<?php pmc_page_media( 'about-us' ); ?>
	</div>
</section>
<section class="section">
	<div class="container split">
		<?php pmc_heading( 'What we believe', 'Your future shouldn’t *depend on luck.*' ); ?>
		<div class="prose" data-reveal>
			<p>Most local businesses are better than their online presence suggests. Customers can’t see the care, the expertise, or the years of reputation. They see a map, a star rating, and a website, and they decide in seconds.</p>
			<p>We close that gap. Our work raises your presence across Google Maps and local search so the right customers find you first, and our reporting shows you exactly what changed and why.</p>
		</div>
	</div>
</section>
<section class="section section-tint">
	<div class="container">
		<?php pmc_heading( 'Our promise', 'Clarity *without pressure.*' ); ?>
		<ul class="promise-list" data-reveal>
			<li><strong>We obsess over performance</strong> and watch your rankings closely.</li>
			<li><strong>You see everything:</strong> what we do, why, and how it affects your bottom line.</li>
			<li><strong>Value before a pitch.</strong> Start with a free trial or evaluation.</li>
			<li><strong>No pressure</strong> to become a client. Ever.</li>
		</ul>
	</div>
</section>
<section class="section">
	<div class="container split split-center">
		<div class="rep-feature" data-reveal>
			<img src="<?php echo esc_url( pmc_img( 'dan-mikals.jpg' ) ); ?>" width="600" height="800" alt="<?php echo esc_attr( pmc_opt( 'rep_name' ) ); ?>" loading="lazy">
		</div>
		<div data-reveal>
			<p class="eyebrow">Your partner</p>
			<h2 class="sec-title"><?php echo esc_html( pmc_opt( 'rep_name' ) ); ?></h2>
			<p class="sec-lead">Based in <?php echo esc_html( pmc_opt( 'location' ) ); ?>. You work with a real person who knows your market and answers the phone.</p>
			<p class="rep-lines"><?php echo pmc_icon( 'phone' ); // phpcs:ignore ?> <?php echo wp_kses_post( pmc_phone_link() ); ?></p>
			<?php if ( pmc_opt( 'email' ) ) : ?>
				<p class="rep-lines"><?php echo pmc_icon( 'mail' ); // phpcs:ignore ?> <a href="mailto:<?php echo esc_attr( antispambot( pmc_opt( 'email' ) ) ); ?>"><?php echo esc_html( antispambot( pmc_opt( 'email' ) ) ); ?></a></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/testimonial' ); ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php
get_footer();
