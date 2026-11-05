<?php
/**
 * Customizer settings: Appearance → Customize → Progressive Marketing.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Defaults for every theme option.
 */
function pmc_defaults() {
	return array(
		'phone'          => '(817) 703-3689',
		'email'          => 'dan@progressivemarketing.pro',
		'location'       => 'Dallas–Fort Worth, Texas',
		'rep_name'       => 'Dan Mikals',
		'trial_url'      => '',
		'topbar_text'    => 'Rank in the top 3 on Google Maps. Start a free 7-day PMC Driveby trial.',
		'notify_email'   => '',
		'webhook_url'    => '',
		'thankyou_text'  => 'Thanks! Your PMC Driveby trial request is in. We’ll check your Google Business Profile and get back to you within one business day.',
	);
}

/**
 * Get a theme option.
 *
 * @param string $key Option key.
 * @return string
 */
function pmc_opt( $key ) {
	$defaults = pmc_defaults();
	return get_theme_mod( 'pmc_' . $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

/**
 * URL for the main "start trial" button. Defaults to the on-site signup form.
 */
function pmc_trial_url() {
	$url = pmc_opt( 'trial_url' );
	return $url ? $url : home_url( '/contact-us/#trial' );
}

/**
 * Register Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Manager.
 */
function pmc_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'pmc_options',
		array(
			'title'    => __( 'Progressive Marketing', 'pmc' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'phone'         => array( 'Phone number', 'text', 'sanitize_text_field' ),
		'email'         => array( 'Public email address', 'email', 'sanitize_email' ),
		'location'      => array( 'Service area shown in footer', 'text', 'sanitize_text_field' ),
		'rep_name'      => array( 'Representative name (Contact page)', 'text', 'sanitize_text_field' ),
		'trial_url'     => array( 'Free trial button URL (leave blank to use the on-site signup form)', 'url', 'esc_url_raw' ),
		'topbar_text'   => array( 'Top bar announcement (blank hides it)', 'text', 'sanitize_text_field' ),
		'notify_email'  => array( 'Send signup form submissions to (blank = public email)', 'email', 'sanitize_email' ),
		'webhook_url'   => array( 'Forward signups to webhook URL (HighLevel / Jumper Media / Zapier)', 'url', 'esc_url_raw' ),
		'thankyou_text' => array( 'Message shown after the signup form is sent', 'textarea', 'sanitize_textarea_field' ),
	);

	$defaults = pmc_defaults();
	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'pmc_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $field[2],
			)
		);
		$wp_customize->add_control(
			'pmc_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'pmc_options',
				'type'    => $field[1],
			)
		);
	}
}
add_action( 'customize_register', 'pmc_customize_register' );
