<?php
/**
 * HighLevel (GHL) embeds. HighLevel handles forms, calendars and payments;
 * WordPress shows them.
 *
 * Shortcodes for use in any page or post:
 *   [ghl_form id="FORM_ID"]           a HighLevel form or survey
 *   [ghl_calendar id="CALENDAR_ID"]   a HighLevel booking calendar
 * Either accepts the full link HighLevel gives you instead of the ID.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Pull the ID out of a HighLevel form/calendar link, or return the ID as given.
 *
 * @param string $value ID or URL.
 */
function pmc_ghl_id( $value ) {
	$value = trim( (string) $value );
	if ( preg_match( '#/widget/(?:form|survey|booking)/([A-Za-z0-9_-]+)#', $value, $m ) ) {
		return $m[1];
	}
	return preg_replace( '/[^A-Za-z0-9_-]/', '', $value );
}

/**
 * HighLevel inline embed.
 *
 * @param string $id     Form or calendar ID (or link).
 * @param string $type   'form', 'survey' or 'booking'.
 * @param string $title  Accessible title.
 * @param int    $height Starting height in px (HighLevel's script resizes it).
 */
function pmc_ghl_embed( $id, $type = 'form', $title = 'Form', $height = 900 ) {
	$id = pmc_ghl_id( $id );
	if ( ! $id ) {
		return '';
	}
	if ( ! in_array( $type, array( 'form', 'survey', 'booking' ), true ) ) {
		$type = 'form';
	}
	wp_enqueue_script( 'ghl-form-embed', 'https://link.msgsndr.com/js/form_embed.js', array(), null, true );

	$src = 'https://api.leadconnectorhq.com/widget/' . $type . '/' . $id;
	if ( 'booking' === $type ) {
		return sprintf(
			'<div class="ghl-embed"><iframe src="%1$s" style="width:100%%;border:none;overflow:hidden;" scrolling="no" id="%2$s_%3$d" title="%4$s"></iframe></div>',
			esc_url( $src ),
			esc_attr( $id ),
			wp_rand( 1000, 9999 ),
			esc_attr( $title )
		);
	}
	return sprintf(
		'<div class="ghl-embed"><iframe src="%1$s" style="width:100%%;height:%2$dpx;border:none;" id="inline-%3$s" data-layout="{\'id\':\'INLINE\'}" data-trigger-type="alwaysShow" data-trigger-value="" data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate" data-deactivation-value="" data-form-name="%4$s" data-height="%2$d" data-layout-iframe-id="inline-%3$s" data-form-id="%3$s" title="%4$s"></iframe></div>',
		esc_url( $src ),
		(int) $height,
		esc_attr( $id ),
		esc_attr( $title )
	);
}

/**
 * [ghl_form id="..." title="..." height="..."]
 *
 * @param array $atts Attributes.
 */
function pmc_ghl_form_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => '', 'title' => 'Form', 'height' => 900 ), $atts, 'ghl_form' );
	return pmc_ghl_embed( $atts['id'], 'form', $atts['title'], (int) $atts['height'] );
}
add_shortcode( 'ghl_form', 'pmc_ghl_form_shortcode' );

/**
 * [ghl_calendar id="..." title="..."]
 *
 * @param array $atts Attributes.
 */
function pmc_ghl_calendar_shortcode( $atts ) {
	$atts = shortcode_atts( array( 'id' => '', 'title' => 'Book a time' ), $atts, 'ghl_calendar' );
	return pmc_ghl_embed( $atts['id'], 'booking', $atts['title'] );
}
add_shortcode( 'ghl_calendar', 'pmc_ghl_calendar_shortcode' );
