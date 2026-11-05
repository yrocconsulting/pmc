<?php
/**
 * Closing call-to-action band.
 *
 * @package ProgressiveMarketing
 * @var array $args { title, text }
 */

defined( 'ABSPATH' ) || exit;
$title = isset( $args['title'] ) ? $args['title'] : 'See where you rank, then watch it change.';
$text  = isset( $args['text'] ) ? $args['text'] : 'Start a free 7-day PMC Driveby trial. All we need is your business name as it appears on Google.';
?>
<section class="cta-band">
	<div class="container cta-inner">
		<div>
			<h2><?php echo esc_html( $title ); ?></h2>
			<p><?php echo esc_html( $text ); ?></p>
		</div>
		<div class="cta-actions">
			<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">Start my free trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			<?php if ( pmc_opt( 'phone' ) ) : ?>
				<p class="cta-phone">or call <?php echo wp_kses_post( pmc_phone_link() ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
