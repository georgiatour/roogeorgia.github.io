<?php
/**
* Plugin Name: tourpacker-common
* Plugin URI: themetrademark.com
* Description: A plugin to create custom post type, metabox,...
* Version:  1.0
* Author: Themes Trademark
* Author URI: themetrademark.com
* License:  GPL2
*/


include dirname( __FILE__ ) . '/custom-post-type/tourpacker_post_type.php';
include dirname( __FILE__ ) . '/cmb2/example-functions.php';
include dirname( __FILE__ ) . '/custom-visual/shortcodes.php';
include dirname( __FILE__ ) . '/custom-visual/vc-shortcode.php';
include dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php';
include dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php';
include dirname( __FILE__ ) . '/paypal/payment_list.php';

return true;