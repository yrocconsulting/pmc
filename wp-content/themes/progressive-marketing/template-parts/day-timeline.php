<?php
/**
 * "A day in your future": horizontally scrolling timeline (illustrative).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$tints = array( 'sky', 'peach', 'mint', 'lilac', 'mint', 'peach' );
?>
<div class="day" data-day>
	<div class="day-controls">
		<button type="button" class="day-btn" data-day-prev aria-label="Earlier"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg></button>
		<button type="button" class="day-btn" data-day-next aria-label="Later"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
	</div>
	<ol class="day-track" data-day-track tabindex="0" aria-label="Illustration: a day in your business, 90 days from now">
		<?php foreach ( pmc_future_day() as $i => $m ) : ?>
			<li class="day-card tint-<?php echo esc_attr( $tints[ $i % count( $tints ) ] ); ?>">
				<time><?php echo esc_html( $m[0] ); ?></time>
				<span class="day-icon"><?php echo pmc_icon( $m[1] ); // phpcs:ignore ?></span>
				<h3><?php echo esc_html( $m[2] ); ?></h3>
				<p><?php echo esc_html( $m[3] ); ?></p>
			</li>
		<?php endforeach; ?>
	</ol>
	<div class="day-sun" aria-hidden="true"><span data-day-progress></span></div>
	<p class="fine-print">Illustration of a typical day for a client business.</p>
</div>
