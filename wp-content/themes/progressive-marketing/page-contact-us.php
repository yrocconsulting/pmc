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
			<?php if ( pmc_opt( 'ghl_form' ) ) : ?>
				<p class="eyebrow">Send us a message</p>
				<h2>Tell us about your business</h2>
				<p>We’ll check where you rank today and get back to you within one business day. Ready now? <a href="<?php echo esc_url( pmc_trial_url() ); ?>">Start your free 7-day trial</a>.</p>
				<?php echo pmc_ghl_embed( pmc_opt( 'ghl_form' ), 'form', 'Contact Progressive Marketing Concepts' ); // phpcs:ignore ?>
			<?php elseif ( pmc_opt( 'trial_url' ) ) : ?>
				<p class="eyebrow">Free 7-day trial</p>
				<h2>Start your PMC Driveby trial</h2>
				<p>We’ll run a baseline scan of where you rank today and start your Driveby campaign. All we need is your business name as it appears on Google.</p>
				<ul class="checklist checklist-compact">
					<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div>Free for 7 days</div></li>
					<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div>Before-and-after ranking grid for your top keywords</div></li>
					<li><?php echo pmc_icon( 'check' ); // phpcs:ignore ?><div>Your address must be public on your Google Business Profile</div></li>
				</ul>
				<a class="btn btn-primary btn-lg btn-block" href="<?php echo esc_url( pmc_trial_url() ); ?>">Start my free 7-day trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			<?php else : ?>
				<p class="eyebrow">Free 7-day trial</p>
				<h2>Start your PMC Driveby trial</h2>
				<p>We’ll run a baseline scan of where you rank today and start your Driveby campaign.</p>
				<?php pmc_render_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
