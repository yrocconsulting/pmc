<?php
/**
 * Header.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0b2341">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>

<?php if ( pmc_opt( 'topbar_text' ) ) : ?>
<div class="topbar">
	<div class="container topbar-inner">
		<p><?php echo esc_html( pmc_opt( 'topbar_text' ) ); ?> <a href="<?php echo esc_url( pmc_trial_url() ); ?>">Start free <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></a></p>
		<?php echo wp_kses_post( pmc_phone_link( 'topbar-phone' ) ); ?>
	</div>
</div>
<?php endif; ?>

<header class="site-header" data-header>
	<div class="container header-inner">
		<?php pmc_logo(); ?>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" data-nav-toggle>
			<span class="nav-toggle-bars" aria-hidden="true"></span>
			<span class="screen-reader-text">Menu</span>
		</button>
		<nav class="site-nav" id="site-nav" aria-label="Primary">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'depth'          => 2,
					'fallback_cb'    => 'pmc_fallback_menu',
				)
			);
			?>
			<a class="btn btn-primary nav-cta" href="<?php echo esc_url( pmc_trial_url() ); ?>">Free 7-day trial</a>
		</nav>
	</div>
</header>

<main id="main" class="site-main">
