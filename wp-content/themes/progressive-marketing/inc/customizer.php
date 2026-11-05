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
		'trial_url'      => 'https://vet.progressivemarketing.pro/trial-form',
		'ghl_form'       => '',
		'vet_eval_url'   => 'https://vet.progressivemarketing.pro/trial-form',
		'vet_video_url'  => 'https://assets.cdn.filesafe.space/0bvlnDHyDCoHlrLzW8oG/media/6aecc9b342ff25478cd79f59.mp4',
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
 * URL for every "start free trial" button: the HighLevel order form.
 * If it is cleared, buttons fall back to the on-site form on the Contact page.
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
		'trial_url'     => array( 'Free trial button URL (HighLevel order form for the PMC Driveby trial)', 'url', 'esc_url_raw' ),
		'ghl_form'      => array( 'HighLevel form ID or form link for the Contact page (Sites → Forms → Integrate)', 'text', 'sanitize_text_field' ),
		'vet_eval_url'  => array( 'Growth360 "Start my Executive Evaluation" button URL (HighLevel)', 'url', 'esc_url_raw' ),
		'vet_video_url' => array( 'Growth360 overview video URL (.mp4)', 'url', 'esc_url_raw' ),
		'topbar_text'   => array( 'Top bar announcement (blank hides it)', 'text', 'sanitize_text_field' ),
		'notify_email'  => array( 'Backup form only: send submissions to (blank = public email)', 'email', 'sanitize_email' ),
		'webhook_url'   => array( 'Backup form only: forward submissions to webhook URL (HighLevel inbound webhook)', 'url', 'esc_url_raw' ),
		'thankyou_text' => array( 'Backup form only: message shown after sending', 'textarea', 'sanitize_textarea_field' ),
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
