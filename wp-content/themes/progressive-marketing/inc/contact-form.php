<?php
/**
 * Free trial signup form.
 *
 * Each submission is:
 *  1. saved in WordPress (Dashboard → Trial Signups), so nothing is lost if email fails,
 *  2. emailed to the notification address,
 *  3. optionally POSTed as JSON to a webhook (HighLevel, Jumper Media onboarding, Zapier).
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Form fields: key => [label, type, required, autocomplete].
 */
function pmc_form_fields() {
	return array(
		'first_name' => array( 'First name', 'text', true, 'given-name' ),
		'last_name'  => array( 'Last name', 'text', true, 'family-name' ),
		'email'      => array( 'Email', 'email', true, 'email' ),
		'phone'      => array( 'Phone', 'tel', true, 'tel' ),
		'business'   => array( 'Business name (as listed on Google)', 'text', true, 'organization' ),
		'industry'   => array( 'Industry', 'select', true, 'off' ),
		'address'    => array( 'Street address', 'text', true, 'street-address' ),
		'city'       => array( 'City', 'text', true, 'address-level2' ),
		'state'      => array( 'State', 'text', true, 'address-level1' ),
		'postal'     => array( 'ZIP code', 'text', true, 'postal-code' ),
		'website'    => array( 'Website (optional)', 'url', false, 'url' ),
		'message'    => array( 'Anything we should know? (optional)', 'textarea', false, 'off' ),
	);
}

/**
 * Private post type that stores signups.
 */
function pmc_register_lead_type() {
	register_post_type(
		'pmc_lead',
		array(
			'labels'          => array(
				'name'          => 'Trial Signups',
				'singular_name' => 'Trial Signup',
				'menu_name'     => 'Trial Signups',
			),
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'menu_icon'       => 'dashicons-groups',
			'menu_position'   => 25,
			'supports'        => array( 'title', 'editor' ),
			'capability_type' => 'post',
			'capabilities'    => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'    => true,
		)
	);
}
add_action( 'init', 'pmc_register_lead_type' );

/**
 * Render the form.
 */
function pmc_render_form() {
	$status = isset( $_GET['signup'] ) ? sanitize_key( wp_unslash( $_GET['signup'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( 'sent' === $status ) {
		echo '<div class="form-notice is-success" role="status"><strong>You’re in.</strong> ' . esc_html( pmc_opt( 'thankyou_text' ) ) . '</div>';
		return;
	}
	if ( 'error' === $status ) {
		echo '<div class="form-notice is-error" role="alert">Something went wrong. Please check the required fields and try again, or call ' . wp_kses_post( pmc_phone_link() ) . '.</div>';
	}

	$industries = pmc_industries();
	?>
	<form class="signup-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="action" value="pmc_signup">
		<input type="hidden" name="pmc_ts" value="<?php echo esc_attr( time() ); ?>">
		<input type="hidden" name="pmc_source" value="<?php echo esc_url( get_permalink() ); ?>">
		<?php wp_nonce_field( 'pmc_signup', 'pmc_nonce' ); ?>
		<div class="hp" aria-hidden="true"><label>Leave this empty <input type="text" name="pmc_company_url" tabindex="-1" autocomplete="off"></label></div>
		<div class="form-grid">
			<?php foreach ( pmc_form_fields() as $key => $f ) : ?>
				<?php
				list( $label, $type, $required, $auto ) = $f;
				$id   = 'pmc-' . $key;
				$wide = in_array( $key, array( 'business', 'address', 'message', 'industry' ), true ) ? ' is-wide' : '';
				$req  = $required ? ' required' : '';
				?>
				<div class="field<?php echo esc_attr( $wide ); ?>">
					<label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?><?php echo $required ? ' <span class="req" aria-hidden="true">*</span>' : ''; ?></label>
					<?php if ( 'select' === $type ) : ?>
						<select id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $key ); ?>"<?php echo $req; // phpcs:ignore ?>>
							<option value="">Choose one</option>
							<?php foreach ( $industries as $ind ) : ?>
								<option><?php echo esc_html( $ind['name'] ); ?></option>
							<?php endforeach; ?>
							<option>Other local business</option>
						</select>
					<?php elseif ( 'textarea' === $type ) : ?>
						<textarea id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $key ); ?>" rows="3"></textarea>
					<?php else : ?>
						<input id="<?php echo esc_attr( $id ); ?>" type="<?php echo esc_attr( $type ); ?>" name="<?php echo esc_attr( $key ); ?>" autocomplete="<?php echo esc_attr( $auto ); ?>"<?php echo $req; // phpcs:ignore ?>>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="form-help">Your address must be public on your Google Business Profile for Driveby to work. Not sure? Submit anyway and we’ll check.</p>
		<button class="btn btn-primary btn-lg" type="submit">Start my free 7-day trial <?php echo pmc_icon( 'arrow' ); // phpcs:ignore ?></button>
	</form>
	<?php
}

/**
 * Handle a submission.
 */
function pmc_handle_signup() {
	$back = isset( $_POST['pmc_source'] ) ? esc_url_raw( wp_unslash( $_POST['pmc_source'] ) ) : home_url( '/contact-us/' );
	$back = wp_validate_redirect( $back, home_url( '/contact-us/' ) );
	$fail = add_query_arg( 'signup', 'error', $back ) . '#trial';

	if ( ! isset( $_POST['pmc_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['pmc_nonce'] ) ), 'pmc_signup' ) ) {
		wp_safe_redirect( $fail );
		exit;
	}

	// Spam traps: honeypot filled, or submitted faster than a human could type.
	$ts = isset( $_POST['pmc_ts'] ) ? (int) $_POST['pmc_ts'] : 0;
	if ( ! empty( $_POST['pmc_company_url'] ) || ( time() - $ts ) < 3 ) {
		wp_safe_redirect( add_query_arg( 'signup', 'sent', $back ) . '#trial' );
		exit;
	}

	$data = array();
	foreach ( pmc_form_fields() as $key => $f ) {
		$raw = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		switch ( $f[1] ) {
			case 'email':
				$val = sanitize_email( $raw );
				break;
			case 'url':
				$val = esc_url_raw( $raw );
				break;
			case 'textarea':
				$val = sanitize_textarea_field( $raw );
				break;
			default:
				$val = sanitize_text_field( $raw );
		}
		if ( $f[2] && '' === $val ) {
			wp_safe_redirect( $fail );
			exit;
		}
		$data[ $key ] = $val;
	}
	if ( ! is_email( $data['email'] ) ) {
		wp_safe_redirect( $fail );
		exit;
	}

	$labels = wp_list_pluck( pmc_form_fields(), 0 );
	$lines  = array();
	foreach ( $data as $key => $val ) {
		$lines[] = $labels[ $key ] . ': ' . $val;
	}
	$lines[] = 'Submitted from: ' . $back;
	$body    = implode( "\n", $lines );
	$title   = sprintf( '%s (%s %s)', $data['business'], $data['first_name'], $data['last_name'] );

	// 1. Save.
	$lead_id = wp_insert_post(
		array(
			'post_type'    => 'pmc_lead',
			'post_status'  => 'private',
			'post_title'   => $title,
			'post_content' => $body,
		)
	);
	if ( $lead_id && ! is_wp_error( $lead_id ) ) {
		foreach ( $data as $key => $val ) {
			update_post_meta( $lead_id, 'pmc_' . $key, $val );
		}
	}

	// 2. Email.
	$to = pmc_opt( 'notify_email' ) ? pmc_opt( 'notify_email' ) : pmc_opt( 'email' );
	if ( $to ) {
		wp_mail(
			$to,
			'New PMC Driveby trial signup: ' . $data['business'],
			$body,
			array( 'Reply-To: ' . $data['first_name'] . ' ' . $data['last_name'] . ' <' . $data['email'] . '>' )
		);
	}

	// 3. Webhook.
	$hook = pmc_opt( 'webhook_url' );
	if ( $hook ) {
		$payload           = $data;
		$payload['source'] = $back;
		$payload['type']   = 'pmc_driveby_trial';
		wp_remote_post(
			$hook,
			array(
				'timeout'  => 8,
				'blocking' => false,
				'headers'  => array( 'Content-Type' => 'application/json' ),
				'body'     => wp_json_encode( $payload ),
			)
		);
	}

	wp_safe_redirect( add_query_arg( 'signup', 'sent', $back ) . '#trial' );
	exit;
}
add_action( 'admin_post_nopriv_pmc_signup', 'pmc_handle_signup' );
add_action( 'admin_post_pmc_signup', 'pmc_handle_signup' );
