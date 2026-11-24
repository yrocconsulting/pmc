<?php
/**
 * Grid of industries inside a category.
 *
 * @package ProgressiveMarketing
 * @var array $args { cat, ind, exclude }
 */

defined( 'ABSPATH' ) || exit;
$cat     = $args['cat'];
$exclude = isset( $args['exclude'] ) ? $args['exclude'] : '';
?>
<div class="ind-list">
	<?php foreach ( $args['ind']['industries'] as $sl => $r ) : ?>
		<?php
		if ( $sl === $exclude ) {
			continue;
		}
		?>
		<a class="ind-item" href="<?php echo esc_url( pmc_industry_url( $cat, $sl ) ); ?>">
			<span class="ind-item-name"><?php echo esc_html( $r[0] ); ?></span>
			<span class="ind-item-line"><?php echo esc_html( $r[3] ); ?></span>
			<?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?>
		</a>
	<?php endforeach; ?>
</div>
