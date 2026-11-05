<?php
/**
 * Industry cards.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="industry-grid">
	<?php foreach ( pmc_industries() as $slug => $ind ) : ?>
		<a class="industry-card" href="<?php echo esc_url( home_url( '/industries/' . $slug . '/' ) ); ?>">
			<span class="industry-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span>
			<h3><?php echo esc_html( $ind['name'] ); ?></h3>
			<p><?php echo esc_html( $ind['short'] ); ?></p>
			<span class="link-arrow">See how it works <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
		</a>
	<?php endforeach; ?>
</div>
