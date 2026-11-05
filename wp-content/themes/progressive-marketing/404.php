<?php
/**
 * 404.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section class="page-hero page-hero-center">
	<div class="container narrow">
		<p class="eyebrow">404</p>
		<h1>This page isn’t on the map.</h1>
		<p class="lead">The page you’re looking for has moved or doesn’t exist.</p>
		<div class="hero-actions hero-actions-center">
			<a class="btn btn-primary btn-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go home</a>
			<a class="btn btn-ghost btn-lg" href="<?php echo esc_url( home_url( '/case-studies/' ) ); ?>">See case studies</a>
		</div>
	</div>
</section>
<?php
get_footer();
