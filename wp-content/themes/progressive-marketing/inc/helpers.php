<?php
/**
 * Template helpers.
 *
 * @package ProgressiveMarketing
 */

defined( 'ABSPATH' ) || exit;

/**
 * URL of an image bundled with the theme.
 *
 * @param string $file File name in assets/img.
 */
function pmc_img( $file ) {
	return PMC_URI . '/assets/img/' . $file;
}

/**
 * Site logo: the Customizer logo if set, otherwise the bundled one.
 *
 * @param string $class Extra class.
 */
function pmc_logo( $class = '' ) {
	$name = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'Progressive Marketing Concepts';
	echo '<a class="brand ' . esc_attr( $class ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home" aria-label="' . esc_attr( $name ) . ' home">';
	if ( has_custom_logo() ) {
		$id = get_theme_mod( 'custom_logo' );
		echo wp_get_attachment_image( $id, 'full', false, array( 'alt' => $name, 'class' => 'brand-img' ) );
	} else {
		printf( '<img class="brand-img" src="%s" width="227" height="48" alt="%s">', esc_url( pmc_img( 'logo.png' ) ), esc_attr( $name ) );
	}
	echo '</a>';
}

/**
 * Phone number as a tel: link.
 *
 * @param string $class Class.
 */
function pmc_phone_link( $class = '' ) {
	$phone = pmc_opt( 'phone' );
	if ( ! $phone ) {
		return '';
	}
	return sprintf( '<a class="%s" href="tel:%s">%s</a>', esc_attr( $class ), esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ), esc_html( $phone ) );
}

/**
 * Inline SVG icons (stroke icons, 24px grid).
 *
 * @param string $name Icon name.
 */
function pmc_icon( $name ) {
	$paths = array(
		'medical' => '<path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6z"/>',
		'auto'    => '<path d="M5 17h14M3 13l2-6a2 2 0 0 1 2-1.4h10A2 2 0 0 1 19 7l2 6v4a1 1 0 0 1-1 1h-1a2 2 0 0 1-4 0H9a2 2 0 0 1-4 0H4a1 1 0 0 1-1-1z"/><circle cx="7" cy="18" r="0.5"/><circle cx="17" cy="18" r="0.5"/><path d="M3 13h18"/>',
		'hotel'   => '<path d="M3 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16M15 9h4a2 2 0 0 1 2 2v10M2 21h20M7 7h4M7 11h4M7 15h4"/>',
		'vet'     => '<circle cx="5.5" cy="10" r="2"/><circle cx="9" cy="5.5" r="2"/><circle cx="15" cy="5.5" r="2"/><circle cx="18.5" cy="10" r="2"/><path d="M12 12c-3 0-5.5 3.5-5.5 6a2.5 2.5 0 0 0 3.5 2.2c1.3-.6 2.7-.6 4 0A2.5 2.5 0 0 0 17.5 18c0-2.5-2.5-6-5.5-6z"/>',
		'pin'     => '<path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/>',
		'phone'   => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2z"/>',
		'mail'    => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
		'check'   => '<path d="m5 12 5 5L20 7"/>',
		'arrow'   => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'chart'   => '<path d="M3 3v18h18"/><path d="m7 15 4-4 3 3 6-7"/>',
		'grid'    => '<circle cx="6" cy="6" r="1.5"/><circle cx="12" cy="6" r="1.5"/><circle cx="18" cy="6" r="1.5"/><circle cx="6" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="18" r="1.5"/><circle cx="12" cy="18" r="1.5"/><circle cx="18" cy="18" r="1.5"/>',
		'bolt'    => '<path d="M13 2 4 14h7l-1 8 9-12h-7z"/>',
		'eye'     => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
		'shield'  => '<path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6z"/><path d="m9 12 2 2 4-4"/>',
		'ripple'  => '<circle cx="12" cy="12" r="2"/><path d="M7.5 7.5a6.4 6.4 0 0 0 0 9M16.5 7.5a6.4 6.4 0 0 1 0 9M4.6 4.6a10.5 10.5 0 0 0 0 14.8M19.4 4.6a10.5 10.5 0 0 1 0 14.8"/>',
		'browser' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.01M10 6.5h.01"/><path d="M7 13h6M7 16h10"/>',
		'call'    => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2z"/>',
		'star'    => '<path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9z"/>',
		'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4M8 14h3v3H8z"/>',
		'ai'      => '<path d="M12 3l1.6 4.4L18 9l-4.4 1.6L12 15l-1.6-4.4L6 9l4.4-1.6z"/><path d="M18.5 14.5l.8 2.2 2.2.8-2.2.8-.8 2.2-.8-2.2-2.2-.8 2.2-.8z"/>',
		'play'    => '<circle cx="12" cy="12" r="9"/><path d="m10 8.5 5 3.5-5 3.5z"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg class="icon" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * Color band for a map-pack rank.
 *
 * @param int $rank Rank.
 */
function pmc_rank_band( $rank ) {
	if ( $rank <= 3 ) {
		return 'r1';
	}
	if ( $rank <= 6 ) {
		return 'r2';
	}
	if ( $rank <= 10 ) {
		return 'r3';
	}
	return 'r4';
}

/**
 * Illustrative geo-grid that animates from "before" to "after" ranks.
 * Ranks are generated, not client data; the caption says so.
 *
 * @param int $size Grid size (odd number).
 */
function pmc_rank_grid( $size = 7 ) {
	$c   = ( $size - 1 ) / 2;
	$out = '<div class="rank-grid" style="--n:' . (int) $size . '" data-rank-grid aria-hidden="true">';
	$i   = 0;
	for ( $y = 0; $y < $size; $y++ ) {
		for ( $x = 0; $x < $size; $x++ ) {
			$d      = sqrt( ( $x - $c ) ** 2 + ( $y - $c ) ** 2 );
			$noise  = ( ( $x * 7 + $y * 13 ) % 5 ) - 2;
			$before = max( 4, (int) round( 7 + $d * 2.4 + $noise ) );
			$after  = max( 1, (int) round( 1 + $d * 0.55 + $noise * 0.4 ) );
			$out   .= sprintf(
				'<span class="dot %1$s" data-before="%2$s" data-after="%3$s" data-a="%4$s" style="--i:%5$d">%2$s</span>',
				pmc_rank_band( $before ),
				$before > 20 ? '20+' : $before,
				$after,
				pmc_rank_band( $after ),
				$i++
			);
		}
	}
	return $out . '</div>';
}

/**
 * Case studies for one industry.
 *
 * @param string $industry Industry key.
 */
function pmc_case_studies_for( $industry ) {
	return array_filter(
		pmc_case_studies(),
		function ( $cs ) use ( $industry ) {
			return $cs['industry'] === $industry;
		}
	);
}

/**
 * Permalink to a case study on the Case Studies page.
 *
 * @param string $slug Case study key.
 */
function pmc_case_url( $slug ) {
	return home_url( '/case-studies/#' . $slug );
}

/**
 * Drag-to-compare slider for a before/after geo-grid image.
 * The source image holds "before" on its left half and "after" on its right half.
 *
 * @param array  $r        Result row (keyword, before, after, image).
 * @param string $location Location label.
 */
function pmc_compare( $r, $location ) {
	$base = substr( $r['image'], 0, -5 );
	$alt  = sprintf( 'Google Maps geo-grid for “%s”, %s. Before: %s. After: %s.', $r['keyword'], $location, $r['before'], $r['after'] );
	ob_start();
	?>
	<div class="compare-slider" data-compare style="--pos:50%">
		<img class="cs-img cs-before" src="<?php echo esc_url( pmc_img( $base . '-before.webp' ) ); ?>" width="285" height="356" loading="lazy" alt="<?php echo esc_attr( $alt ); ?>">
		<img class="cs-img cs-after" src="<?php echo esc_url( pmc_img( $base . '-after.webp' ) ); ?>" width="285" height="356" loading="lazy" alt="">
		<span class="cs-tag cs-tag-before">Before</span>
		<span class="cs-tag cs-tag-after">After</span>
		<input class="cs-range" type="range" min="0" max="100" value="50" aria-label="<?php echo esc_attr( 'Compare before and after for ' . $r['keyword'] ); ?>">
		<span class="cs-handle" aria-hidden="true"><span class="cs-knob"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6-6 6 6 6M15 6l6 6-6 6"/></svg></span></span>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Small "draft" badge for copy still waiting on details. Visible to editors only.
 *
 * @param array $item Content item with a 'draft' key.
 */
function pmc_draft_badge( $item ) {
	if ( ! empty( $item['draft'] ) && current_user_can( 'edit_pages' ) ) {
		return '<span class="draft-badge" title="Only editors see this">Draft copy</span>';
	}
	return '';
}

/**
 * Strip "[Draft …]" notes from copy for public visitors; editors still see them.
 *
 * @param string $text Copy.
 */
function pmc_copy( $text ) {
	if ( current_user_can( 'edit_pages' ) ) {
		return $text;
	}
	return trim( preg_replace( '/\s*\[Draft[^\]]*\]/', '', $text ) );
}

/**
 * Section heading block.
 *
 * @param string $eyebrow Eyebrow.
 * @param string $title   Title. Wrap words in *asterisks* for the italic serif accent.
 * @param string $lead    Optional lead.
 * @param string $class   Extra class.
 */
function pmc_heading( $eyebrow, $title, $lead = '', $class = '' ) {
	$title = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $title ) );
	echo '<header class="sec-head ' . esc_attr( $class ) . '" data-reveal>';
	if ( $eyebrow ) {
		echo '<p class="eyebrow">' . esc_html( $eyebrow ) . '</p>';
	}
	echo '<h2 class="sec-title">' . $title . '</h2>'; // phpcs:ignore -- escaped above.
	if ( $lead ) {
		echo '<p class="sec-lead">' . esc_html( $lead ) . '</p>';
	}
	echo '</header>';
}

/**
 * Hero photo for the current page. Uses the page's Featured Image if set,
 * otherwise the bundled photo for $key.
 *
 * @param string $key     Key in pmc_page_images().
 * @param string $overlay Optional HTML to float over the photo (already escaped).
 */
function pmc_page_media( $key, $overlay = '' ) {
	$images = pmc_page_images();
	$id     = is_singular() ? get_queried_object_id() : 0;
	$src    = '';
	$alt    = '';
	if ( $id && has_post_thumbnail( $id ) ) {
		$thumb = get_post_thumbnail_id( $id );
		$src   = wp_get_attachment_image_url( $thumb, 'large' );
		$alt   = get_post_meta( $thumb, '_wp_attachment_image_alt', true );
	} elseif ( isset( $images[ $key ] ) ) {
		$src = pmc_img( $images[ $key ][0] );
		$alt = $images[ $key ][1];
	}
	if ( ! $src ) {
		return;
	}
	printf(
		'<figure class="page-media%s" data-reveal><div class="page-media-frame"><img src="%s" width="1000" height="1000" alt="%s" fetchpriority="high"></div>%s</figure>',
		$overlay ? ' has-overlay' : '',
		esc_url( $src ),
		esc_attr( $alt ),
		$overlay // phpcs:ignore -- built from escaped template output.
	);
}
