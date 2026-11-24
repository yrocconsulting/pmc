<?php
/**
 * Industry tiles.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$tints = array( 'sky', 'peach', 'lilac', 'mint' );
$i     = 0;
?>
<div class="bento">
	<?php foreach ( pmc_featured_industries() as $slug => $ind ) : ?>
		<a class="bento-tile tint-<?php echo esc_attr( $tints[ $i % 4 ] ); ?>" href="<?php echo esc_url( pmc_industry_url( $slug ) ); ?>" data-reveal style="--r:<?php echo (int) $i++; ?>">
			<span class="bento-icon"><?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?></span>
			<p class="bento-name"><?php echo esc_html( $ind['name'] ); ?></p>
			<h3><?php echo esc_html( $ind['future'] ); ?></h3>
			<ul class="chips">
				<?php foreach ( pmc_category_searches( $slug, 3 ) as $q ) : ?>
					<li><?php echo esc_html( $q ); ?></li>
				<?php endforeach; ?>
			</ul>
			<span class="link-arrow">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></span>
		</a>
	<?php endforeach; ?>
</div>
<p class="bento-more"><a class="link-arrow" href="<?php echo esc_url( home_url( '/industries/' ) ); ?>">See all <?php echo (int) pmc_industry_count(); ?> industries we serve <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a></p>
