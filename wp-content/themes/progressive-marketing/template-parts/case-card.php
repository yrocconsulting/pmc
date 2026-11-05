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
$img  = $cs['results'][0]['image'];
?>
<article class="case-card">
	<a class="case-card-media" href="<?php echo esc_url( pmc_case_url( $slug ) ); ?>" tabindex="-1" aria-hidden="true">
		<img src="<?php echo esc_url( pmc_img( $img ) ); ?>" width="657" height="356" loading="lazy" alt="">
	</a>
	<div class="case-card-body">
		<p class="eyebrow"><?php echo esc_html( $cs['label'] ); ?> · <?php echo esc_html( $cs['location'] ); ?></p>
		<p class="case-card-stat"><?php echo esc_html( $cs['highlight']['value'] ); ?> <span><?php echo esc_html( $cs['highlight']['label'] ); ?></span></p>
		<h3><a href="<?php echo esc_url( pmc_case_url( $slug ) ); ?>"><?php echo esc_html( $cs['title'] ); ?></a></h3>
		<p><?php echo esc_html( $cs['headline'] ); ?></p>
	</div>
</article>
