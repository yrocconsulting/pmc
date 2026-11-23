<?php
/**
 * From today to the future: numbered steps.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<ol class="process">
	<?php foreach ( pmc_process() as $i => $step ) : ?>
		<li class="process-step" data-reveal style="--r:<?php echo (int) $i; ?>">
			<span class="process-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
			<h3><?php echo esc_html( $step[0] ); ?></h3>
			<p><?php echo esc_html( $step[1] ); ?></p>
		</li>
	<?php endforeach; ?>
</ol>
