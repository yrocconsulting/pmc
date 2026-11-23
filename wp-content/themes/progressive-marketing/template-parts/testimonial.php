<?php
/**
 * Testimonial.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$t = pmc_testimonials()[0];
?>
<section class="section testimonial-section">
	<div class="container narrow">
		<figure class="testimonial" data-reveal>
			<div class="stars" aria-label="5 stars"><?php echo str_repeat( pmc_icon( 'star' ), 5 ); // phpcs:ignore ?></div>
			<blockquote><p>“<?php echo esc_html( $t['quote'] ); ?>”</p></blockquote>
			<figcaption><strong><?php echo esc_html( $t['name'] ); ?></strong> · <?php echo esc_html( $t['company'] ); ?></figcaption>
		</figure>
	</div>
</section>
