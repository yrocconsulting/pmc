<?php
/**
 * Closing call to action.
 *
 * @package ProgressiveMarketing
 * @var array $args { title, text }
 */

defined( 'ABSPATH' ) || exit;
$title = isset( $args['title'] ) ? $args['title'] : 'See your future *before you commit.*';
$text  = isset( $args['text'] ) ? $args['text'] : 'Start with a free 7-day PMC Driveby trial. We map where you stand today, then show you what changes. No sales presentation.';
$url   = isset( $args['url'] ) ? $args['url'] : pmc_trial_url();
$label = isset( $args['label'] ) ? $args['label'] : 'Start my free trial';
$title = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $title ) );
?>
<section class="cta-final">
	<div class="cta-glow" aria-hidden="true"></div>
	<div class="container cta-inner" data-reveal>
		<h2><?php echo $title; // phpcs:ignore -- escaped above. ?></h2>
		<p><?php echo esc_html( $text ); ?></p>
		<div class="cta-actions">
			<a class="btn btn-primary btn-lg" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?> <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			<a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Talk to us</a>
		</div>
		<?php if ( pmc_opt( 'phone' ) ) : ?>
			<p class="cta-phone">Prefer to talk? <?php echo wp_kses_post( pmc_phone_link() ); ?></p>
		<?php endif; ?>
	</div>
</section>
