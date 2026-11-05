<?php
/**
 * How Driveby works.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<ol class="steps">
	<?php foreach ( pmc_driveby_steps() as $i => $step ) : ?>
		<li class="step">
			<span class="step-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
			<h3><?php echo esc_html( $step[0] ); ?></h3>
			<p><?php echo esc_html( $step[1] ); ?></p>
		</li>
	<?php endforeach; ?>
</ol>
