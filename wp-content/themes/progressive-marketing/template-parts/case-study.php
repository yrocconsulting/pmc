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
<article class="case-study" id="<?php echo esc_attr( $slug ); ?>" data-reveal>
	<header class="case-study-head">
		<div>
			<p class="case-meta"><?php echo esc_html( $cs['label'] ); ?> · <?php echo esc_html( $cs['location'] ); ?></p>
			<h2><?php echo esc_html( $cs['title'] ); ?></h2>
			<p class="case-study-headline"><?php echo esc_html( $cs['headline'] ); ?></p>
		</div>
		<div class="case-study-stat">
			<span><?php echo esc_html( $cs['highlight']['value'] ); ?></span>
			<?php echo esc_html( $cs['highlight']['label'] ); ?>
		</div>
	</header>
	<div class="case-study-meta">
		<p><strong>The client.</strong> <?php echo esc_html( $cs['summary'] ); ?></p>
		<p><strong>What we did.</strong> <?php echo esc_html( $cs['approach'] ); ?></p>
	</div>
	<div class="case-study-results">
		<?php foreach ( $cs['results'] as $r ) : ?>
			<figure class="result">
				<?php echo pmc_compare( $r, $cs['location'] ); // phpcs:ignore ?>
				<figcaption>
					<span class="result-kw">“<?php echo esc_html( $r['keyword'] ); ?>”</span>
					<span class="result-row"><span class="tag tag-before">Before</span> <?php echo esc_html( $r['before'] ); ?></span>
					<span class="result-row"><span class="tag tag-after">After</span> <?php echo esc_html( $r['after'] ); ?></span>
				</figcaption>
			</figure>
		<?php endforeach; ?>
	</div>
</article>
