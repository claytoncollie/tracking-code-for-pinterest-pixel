<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Pinterest_Pixel
 */

namespace Tracking_Code_For_Pinterest_Pixel;

use function Tracking_Code_For_Pinterest_Pixel\get_the_id;

add_action( 'wp_head', __NAMESPACE__ . '\tracking_script', 1 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_script() : void {
	$tag_id = get_the_id();

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
