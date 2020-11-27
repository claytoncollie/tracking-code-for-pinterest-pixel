<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Pinterest_Pixel
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_head', 'tracking_code_for_pinterest_pixel_do_the_script', 1, 0 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_pinterest_pixel_do_the_script() {
	/**
	 * Filter the tag_id variable to support other methods of setting this value.
	 *
	 * @param string $tag_id The Pinterest Pixel tag ID.
	 * @return string
	 * @since 1.0.0
	 */
	$tag_id = apply_filters( 'tracking_code_for_pinterest_pixel_id', get_option( 'tracking_code_for_pinterest_pixel', '' ) );

	if ( '' === $tag_id ) {
		return;
	}

	printf(
		// phpcs:disable
		'
		<!-- Pinterest Tag -->
		<script>
		!function(e){if(!window.pintrk){window.pintrk = function () {
		window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
		n=window.pintrk;n.queue=[],n.version="3.0";var
		t=document.createElement("script");t.async=!0,t.src=e;var
		r=document.getElementsByTagName("script")[0];
		r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
		pintrk(\'load\', \'%1$s\');
		pintrk(\'page\');
		</script>
		<noscript>
		<img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=%1$s&noscript=1" />
		</noscript>
		<!-- end Pinterest Tag -->
		',
		// phpcs:enable
		esc_attr( $tag_id )
	);
}
