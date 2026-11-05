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
		<figure class="testimonial">
			<blockquote><p>“<?php echo esc_html( $t['quote'] ); ?>”</p></blockquote>
			<figcaption><strong><?php echo esc_html( $t['name'] ); ?></strong>, <?php echo esc_html( $t['company'] ); ?></figcaption>
		</figure>
	</div>
</section>
