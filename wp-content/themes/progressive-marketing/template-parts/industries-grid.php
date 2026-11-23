<?php
/**
 * Industry "futures" switcher.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
$industries = pmc_industries();
$first      = true;
?>
<div class="futures" data-tabs data-reveal>
	<div class="futures-tabs" role="tablist" aria-label="Industries">
		<?php foreach ( $industries as $slug => $ind ) : ?>
			<button type="button" role="tab" id="tab-<?php echo esc_attr( $slug ); ?>" aria-controls="panel-<?php echo esc_attr( $slug ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>" tabindex="<?php echo $first ? '0' : '-1'; ?>">
				<?php echo pmc_icon( $ind['icon'] ); // phpcs:ignore ?> <?php echo esc_html( $ind['name'] ); ?>
			</button>
			<?php $first = false; ?>
		<?php endforeach; ?>
	</div>
	<?php $first = true; ?>
	<?php foreach ( $industries as $slug => $ind ) : ?>
		<div class="futures-panel" role="tabpanel" id="panel-<?php echo esc_attr( $slug ); ?>" aria-labelledby="tab-<?php echo esc_attr( $slug ); ?>"<?php echo $first ? '' : ' hidden'; ?>>
			<div>
				<p class="futures-kicker">Your future</p>
				<h3><?php echo esc_html( $ind['hero'] ); ?></h3>
				<p><?php echo esc_html( $ind['lead'] ); ?></p>
				<a class="btn btn-light" href="<?php echo esc_url( home_url( '/industries/' . $slug . '/' ) ); ?>">See the future for <?php echo esc_html( strtolower( $ind['name'] ) ); ?> <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
			</div>
			<div class="futures-searches">
				<p class="futures-kicker">Where <?php echo esc_html( $ind['customers'] ); ?> find you first</p>
				<ul>
					<?php foreach ( $ind['searches'] as $q ) : ?>
						<li><span class="rank-pill">#1</span><?php echo esc_html( $q ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php $first = false; ?>
	<?php endforeach; ?>
</div>
