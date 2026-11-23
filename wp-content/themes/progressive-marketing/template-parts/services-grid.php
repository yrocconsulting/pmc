<?php
/**
 * The three services as cards.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$i = 0;
?>
<div class="svc-grid">
	<?php foreach ( pmc_services() as $slug => $s ) : ?>
		<a class="svc-card" href="<?php echo esc_url( home_url( '/services/' . $slug . '/' ) ); ?>" data-reveal style="--r:<?php echo (int) $i++; ?>">
			<span class="svc-num">0<?php echo (int) $i; ?></span>
			<span class="svc-icon"><?php echo pmc_icon( $s['icon'] ); // phpcs:ignore ?></span>
			<h3><?php echo esc_html( $s['name'] ); ?> <?php echo pmc_draft_badge( $s ); // phpcs:ignore ?></h3>
			<p class="svc-tagline"><?php echo esc_html( $s['tagline'] ); ?></p>
			<p><?php echo esc_html( $s['future'] ); ?></p>
			<span class="link-arrow">Explore <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
		</a>
	<?php endforeach; ?>
</div>
