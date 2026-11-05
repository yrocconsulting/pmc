<?php
/**
 * FAQ list.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section">
	<div class="container narrow">
		<p class="eyebrow">FAQ</p>
		<h2 class="section-title">Questions we hear a lot</h2>
		<div class="faq">
			<?php foreach ( pmc_faqs() as $item ) : ?>
				<details>
					<summary><?php echo esc_html( $item[0] ); ?></summary>
					<p><?php echo esc_html( $item[1] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
