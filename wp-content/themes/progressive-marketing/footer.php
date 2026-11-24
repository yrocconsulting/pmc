<?php
/**
 * Footer.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?>
</main>

<footer class="site-footer">
	<div class="container footer-top">
		<p class="footer-statement">Become <em>the obvious choice.</em></p>
		<a class="btn btn-primary btn-lg" href="<?php echo esc_url( pmc_trial_url() ); ?>">See your future <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a>
	</div>
	<div class="container footer-grid">
		<div class="footer-brand">
			<?php pmc_logo(); ?>
			<p>Progressive Marketing Concepts helps established local businesses get found first, trusted on sight, and chosen.</p>
		</div>
		<div>
			<h2 class="footer-title">Services</h2>
			<ul class="footer-links">
				<?php foreach ( pmc_services() as $slug => $s ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/services/' . $slug . '/' ) ); ?>"><?php echo esc_html( $s['name'] ); ?></a></li>
				<?php endforeach; ?>
				<li><a href="<?php echo esc_url( home_url( '/growth360/' ) ); ?>">Growth360™</a></li>
			</ul>
		</div>
		<div>
			<h2 class="footer-title">Industries</h2>
			<ul class="footer-links">
				<?php foreach ( pmc_industries() as $slug => $ind ) : ?>
					<li><a href="<?php echo esc_url( home_url( '/industries/' . $slug . '/' ) ); ?>"><?php echo esc_html( $ind['name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div>
			<h2 class="footer-title">Company</h2>
			<ul class="footer-links">
				<li><a href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">Results</a></li>
				<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About</a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact</a></li>
			</ul>
		</div>
		<div>
			<h2 class="footer-title">Talk to us</h2>
			<ul class="footer-contact">
				<?php if ( pmc_opt( 'phone' ) ) : ?>
					<li><?php echo pmc_icon( 'phone' ); // phpcs:ignore ?> <?php echo wp_kses_post( pmc_phone_link() ); ?></li>
				<?php endif; ?>
				<?php if ( pmc_opt( 'email' ) ) : ?>
					<li><?php echo pmc_icon( 'mail' ); // phpcs:ignore ?> <a href="mailto:<?php echo esc_attr( antispambot( pmc_opt( 'email' ) ) ); ?>"><?php echo esc_html( antispambot( pmc_opt( 'email' ) ) ); ?></a></li>
				<?php endif; ?>
				<?php if ( pmc_opt( 'location' ) ) : ?>
					<li><?php echo pmc_icon( 'pin' ); // phpcs:ignore ?> <?php echo esc_html( pmc_opt( 'location' ) ); ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<div class="container footer-bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Progressive Marketing Concepts. All rights reserved.</p>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'footer-legal',
				'depth'          => 1,
				'fallback_cb'    => false,
			)
		);
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
