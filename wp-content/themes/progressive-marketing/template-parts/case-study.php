<?php
/**
 * Full case study.
 *
 * @package ProgressiveMarketing
 * @var array $args { slug, cs }
 */

defined( 'ABSPATH' ) || exit;
$slug = $args['slug'];
$cs   = $args['cs'];
?>
<article class="case-study" id="<?php echo esc_attr( $slug ); ?>">
	<header class="case-study-head">
		<p class="eyebrow"><?php echo esc_html( $cs['label'] ); ?> · <?php echo esc_html( $cs['location'] ); ?></p>
		<h2><?php echo esc_html( $cs['title'] ); ?></h2>
		<p class="case-study-headline"><?php echo esc_html( $cs['headline'] ); ?></p>
		<div class="case-study-meta">
			<p><strong>The client.</strong> <?php echo esc_html( $cs['summary'] ); ?></p>
			<p><strong>What we did.</strong> <?php echo esc_html( $cs['approach'] ); ?></p>
		</div>
	</header>
	<div class="case-study-results">
		<?php foreach ( $cs['results'] as $r ) : ?>
			<figure class="result">
				<figcaption>
					<span class="result-kw">“<?php echo esc_html( $r['keyword'] ); ?>”</span>
					<span class="result-row"><span class="tag tag-before">Before</span> <?php echo esc_html( $r['before'] ); ?></span>
					<span class="result-row"><span class="tag tag-after">After</span> <?php echo esc_html( $r['after'] ); ?></span>
				</figcaption>
				<a href="<?php echo esc_url( pmc_img( $r['image'] ) ); ?>" class="result-img" target="_blank" rel="noopener">
					<img src="<?php echo esc_url( pmc_img( $r['image'] ) ); ?>" width="657" height="356" loading="lazy" alt="<?php echo esc_attr( sprintf( 'Before and after Google Maps geo-grid for “%s”, %s. Before: %s. After: %s.', $r['keyword'], $cs['location'], $r['before'], $r['after'] ) ); ?>">
				</a>
			</figure>
		<?php endforeach; ?>
	</div>
</article>
