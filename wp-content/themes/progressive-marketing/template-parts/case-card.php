<?php
/**
 * Case study summary card.
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, cs }
 */

defined( 'ABSPATH' ) || exit;
$slug = $args['slug'];
$cs   = $args['cs'];
?>
<article class="case-card" data-reveal>
	<?php echo pmc_compare( $cs['results'][0], $cs['location'] ); // phpcs:ignore ?>
	<div class="case-card-body">
		<p class="case-meta"><?php echo esc_html( $cs['label'] ); ?> · <?php echo esc_html( $cs['location'] ); ?></p>
		<p class="case-stat"><?php echo esc_html( $cs['highlight']['value'] ); ?></p>
		<p class="case-stat-label"><?php echo esc_html( $cs['highlight']['label'] ); ?></p>
		<h3><a href="<?php echo esc_url( pmc_case_url( $slug ) ); ?>"><?php echo esc_html( $cs['headline'] ); ?></a></h3>
	</div>
</article>
