<?php
/**
 * Get the tracking ID.
 *
 * @package Tracking_Code_For_Pinterest_Pixel
 */

namespace Tracking_Code_For_Pinterest_Pixel;

use const Tracking_Code_For_Pinterest_Pixel\CONFIG_NAME;
use const Tracking_Code_For_Pinterest_Pixel\FILTER_NAME;
use const Tracking_Code_For_Pinterest_Pixel\OPTION_NAME;

/**
 * Get the tracking ID.
 *
 * @return string
 * @since 2.0.0
 */
function get_the_id() : string {
	/**
	 * Define the tracking ID in your wp-config file.
	 *
	 * @see https://www.wpbeginner.com/glossary/wp-config-php/
	 *
	 * @since 2.0.0
	 */
	if ( defined( CONFIG_NAME ) ) {
		return \TRACKING_CODE_FOR_PINTEREST_PIXEL_ID;
	}

	/**
	 * Define the tracking ID with a filter.
	 *
	 * @param string $tag_id The Pinterest Pixel tag ID.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	if ( has_filter( FILTER_NAME ) ) {
		// @phpstan-ignore-next-line -- WordPress apply_filters returns mixed, but we expect string
		return apply_filters( FILTER_NAME, '' );
	}

	/**
	 * If we are not defining the tracking ID with a definition in our wp-config file,
	 * and we are not defining the tracking ID with a PHP filter,
	 * then we will query the tracking ID from the database.
	 *
	 * @since 1.0.0
	 */
	// @phpstan-ignore-next-line -- WordPress get_option returns mixed, but we expect string
	return get_option( OPTION_NAME, '' );
}
