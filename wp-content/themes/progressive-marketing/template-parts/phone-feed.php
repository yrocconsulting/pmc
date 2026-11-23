<?php
/**
 * Hero visual: a phone showing an illustrative day in the client's future.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="phone-stage" data-phone>
	<div class="phone">
		<div class="phone-notch" aria-hidden="true"></div>
		<div class="phone-screen">
			<p class="phone-date"><span data-clock>Tuesday</span><strong>Your business, 90 days from now</strong></p>
			<ul class="feed" aria-label="Illustration: a day in your future">
				<?php foreach ( pmc_future_day() as $i => $m ) : ?>
					<li class="feed-item feed-<?php echo esc_attr( $m[1] ); ?>" style="--d:<?php echo (int) $i; ?>">
						<span class="feed-icon"><?php echo pmc_icon( 'call' === $m[1] ? 'call' : $m[1] ); // phpcs:ignore ?></span>
						<span class="feed-body">
							<span class="feed-top"><strong><?php echo esc_html( $m[2] ); ?></strong><time><?php echo esc_html( $m[0] ); ?></time></span>
							<span class="feed-text"><?php echo esc_html( $m[3] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="phone-orbit orbit-1" aria-hidden="true"><span class="orb-dot"></span>Top 3 on the map</div>
	<div class="phone-orbit orbit-2" aria-hidden="true"><?php echo pmc_icon( 'star' ); // phpcs:ignore ?> 4.9 average rating</div>
	<p class="phone-caption">Illustration of a typical day for a client business.</p>
</div>
