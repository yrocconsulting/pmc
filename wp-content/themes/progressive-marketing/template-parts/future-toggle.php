<?php
/**
 * Hero switch: the business today vs. 90 days from now.
 * Qualitative illustration only (no invented numbers).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

$tiles = array(
	array( 'pin', 'Google Maps', 'Page two, if you show up at all', 'Top 3 across your whole market', 18, 94, 'sky' ),
	array( 'shield', 'Reviews', 'One fake review from a bad month', 'Fake reviews reported within 30 minutes', 40, 90, 'mint' ),
	array( 'ripple', 'Word of mouth', 'Whoever happens to remember you', 'Customers sharing your offer with friends', 22, 86, 'peach' ),
	array( 'browser', 'Your website', 'An online brochure', 'Booking appointments while you sleep', 30, 88, 'lilac' ),
	array( 'ai', 'AI assistants', 'Don’t mention you', 'Recommend you by name', 8, 82, 'sky' ),
);
?>
<div class="ft" data-future-toggle>
	<div class="ft-switch" role="group" aria-label="Compare today with 90 days from now">
		<button type="button" data-ft="today" aria-pressed="true">Today</button>
		<button type="button" data-ft="future" aria-pressed="false">90 days from now</button>
		<span class="ft-thumb" aria-hidden="true"></span>
	</div>
	<div class="ft-grid" aria-live="polite">
		<?php foreach ( $tiles as $i => $t ) : ?>
			<div class="ft-tile tint-<?php echo esc_attr( $t[6] ); ?>" style="--today:<?php echo (int) $t[4]; ?>%;--future:<?php echo (int) $t[5]; ?>%;--i:<?php echo (int) $i; ?>">
				<span class="ft-icon"><?php echo pmc_icon( $t[0] ); // phpcs:ignore ?></span>
				<p class="ft-label"><?php echo esc_html( $t[1] ); ?></p>
				<p class="ft-value"><span class="ft-today"><?php echo esc_html( $t[2] ); ?></span><span class="ft-future"><?php echo esc_html( $t[3] ); ?></span></p>
				<span class="ft-meter" aria-hidden="true"><span></span></span>
			</div>
		<?php endforeach; ?>
	</div>
	<p class="ft-caption">An illustration of the change our clients work toward.</p>
</div>
