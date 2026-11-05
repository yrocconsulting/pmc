<?php
/**
 * Contact and trial signup (/contact-us/).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero page-hero-center">
	<div class="container narrow">
		<p class="eyebrow">Contact</p>
		<h1>Let’s get you on the map.</h1>
		<p class="lead">Call us, email us, or sign up for a free 7-day PMC Driveby trial below.</p>
	</div>
</section>

<section class="section section-tight">
	<div class="container contact-layout">
		<aside class="contact-cards">
			<div class="contact-card">
				<span class="feature-check"><?php echo pmc_icon( 'phone' ); // phpcs:ignore ?></span>
				<h2>Call us</h2>
				<p>For immediate help or to speak directly with one of our experts.</p>
				<?php echo wp_kses_post( pmc_phone_link( 'contact-big' ) ); ?>
			</div>
			<?php if ( pmc_opt( 'email' ) ) : ?>
			<div class="contact-card">
				<span class="feature-check"><?php echo pmc_icon( 'mail' ); // phpcs:ignore ?></span>
				<h2>Email us</h2>
				<p>Have a question? Send us an email and we’ll get back to you promptly.</p>
				<a class="contact-big" href="mailto:<?php echo esc_attr( antispambot( pmc_opt( 'email' ) ) ); ?>"><?php echo esc_html( antispambot( pmc_opt( 'email' ) ) ); ?></a>
			</div>
			<?php endif; ?>
			<?php if ( pmc_opt( 'rep_name' ) ) : ?>
			<div class="contact-card rep">
				<img src="<?php echo esc_url( pmc_img( 'dan-mikals.jpg' ) ); ?>" width="120" height="160" alt="<?php echo esc_attr( pmc_opt( 'rep_name' ) ); ?>" loading="lazy">
				<div>
					<p class="eyebrow">Your representative</p>
					<p class="rep-name"><?php echo esc_html( pmc_opt( 'rep_name' ) ); ?></p>
					<p><?php echo esc_html( pmc_opt( 'location' ) ); ?></p>
				</div>
			</div>
			<?php endif; ?>
		</aside>
		<div class="form-card" id="trial">
			<p class="eyebrow">Free 7-day trial</p>
			<h2>Start your PMC Driveby trial</h2>
			<p>We’ll run a baseline scan of where you rank today and start your Driveby campaign.</p>
			<?php pmc_render_form(); ?>
		</div>
	</div>
</section>
<?php
get_footer();
