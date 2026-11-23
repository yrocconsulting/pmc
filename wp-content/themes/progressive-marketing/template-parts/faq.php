<?php
/**
 * FAQ (also output as FAQPage structured data).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$GLOBALS['pmc_faq_shown'] = true;
?>
<section class="section">
	<div class="container faq-layout">
		<?php pmc_heading( 'Questions', 'Straight *answers.*', 'The questions business owners ask us most, answered plainly.' ); ?>
		<div class="faq" data-reveal>
			<?php foreach ( pmc_faqs() as $item ) : ?>
				<details>
					<summary><?php echo esc_html( $item[0] ); ?></summary>
					<p><?php echo esc_html( $item[1] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
