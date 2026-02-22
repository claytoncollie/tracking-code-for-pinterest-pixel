<?php
/**
 * Plugin Name:     Tracking Code For Pinterest Pixel
 * Plugin URI:      https://github.com/claytoncollie/tracking-code-for-pinterest-pixel
 * Description:     Simple, lightweight solution for inserting your Pinterest Pixel.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     tracking-code-for-pinterest-pixel
 * Version:         2.0.0
 *
 * @package         Tracking_Code_For_Pinterest_Pixel
 */

namespace Tracking_Code_For_Pinterest_Pixel;

const OPTION_NAME = 'tracking_code_for_pinterest_pixel';
const FILTER_NAME = 'tracking_code_for_pinterest_pixel_id';
const CONFIG_NAME = 'TRACKING_CODE_FOR_PINTEREST_PIXEL_ID';

require_once __DIR__ . '/inc/tracking-id.php';
require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
