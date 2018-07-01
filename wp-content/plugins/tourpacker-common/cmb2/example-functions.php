<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */
if ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/framework/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/framework/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'yourprefix_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_demo_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		 // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		 // 'context'    => 'normal',
		 // 'priority'   => 'high',
		 // 'show_names' => true, // Show field names on the left
		 // 'cmb_styles' => false, // false to disable the CMB stylesheet
		 // 'closed'     => true, // true to keep the metabox closed by default
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Style Of Single Post', 'tourpacker' ),
		'desc'             => __( 'Left or Right Sidebar', 'tourpacker' ),
		'id'               => $prefix . 'blog_single_sidebar_style',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'blog_right' => __( 'Right Sidebar', 'tourpacker' ),
			'blog_left'   => __( 'Left Sidebar', 'tourpacker' ),
		),
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Header Title', 'tourpacker'), 
        'desc'    => esc_html__('Ex: BLOG', 'tourpacker' ),
        'id'      => $prefix . 'blog_single_title',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'  => esc_html__('Image For show Background Header Of Post', 'tourpacker'),
        'desc'  => esc_html__('Select image background for header. 1660px x 662px', 'tourpacker'),
        'id'    => $prefix . 'blog_single_images',
        'type'  => 'file',
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Using chanel video', 'tourpacker'), 
        'desc'    => esc_html__('Check option and fill text field. Option active with Format Video', 'tourpacker' ),
        'id'      => $prefix . 'blog_single_chosen_channel',
        'type'    => 'radio_inline',
        'options' => array(
            'youtube' => esc_html__( 'Youtube', 'tourpacker' ),
            'vimeo'   => esc_html__( 'Vimeo', 'tourpacker' ),
        ),	
	) );
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'ID Video Youtube :', 'tourpacker'),
        'desc' => esc_html__( 'Ex: rU1vi9h3YUU,GEmuEWjHr5c.', 'tourpacker' ),
        'id'   => $prefix . 'blog_single_url_youtube',
        'type' => 'text',
	) );
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'ID Video Vimeo :', 'tourpacker'),
        'desc' => esc_html__( 'Ex: 71716158, 152753665', 'tourpacker' ),
        'id'   => $prefix . 'blog_single_url_vimeo',
        'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_tour_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function yourprefix_register_tour_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_tour',
		'title'         => __( 'Tour Detail', 'cmb2' ),
		'object_types'  => array( 'tour', ), // Post type
		 // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		 // 'context'    => 'normal',
		 // 'priority'   => 'high',
		 // 'show_names' => true, // Show field names on the left
		 // 'cmb_styles' => false, // false to disable the CMB stylesheet
		 // 'closed'     => true, // true to keep the metabox closed by default
	) );
	$cmb_demo->add_field( array(
		'name'       => __( 'Time of Tour', 'cmb2' ),
		'id'         => $prefix . 'tour_single_time',
		'type'       => 'text_date',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Style Of Single Tour', 'tourpacker' ),
		'desc'             => __( 'Left or Right Sidebar', 'tourpacker' ),
		'id'               => $prefix . 'tour_single_sidebar_style',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'tour_right' => __( 'Right Sidebar', 'tourpacker' ),
			'tour_left'   => __( 'Left Sidebar', 'tourpacker' ),
		),
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Header Subtitle', 'tourpacker'), 
        'desc'    => esc_html__('Ex: He do subjects prepared bachelor juvenile ye oh. He feelings removing informed he as ignorant we prepared.', 'tourpacker' ),
        'id'      => $prefix . 'tour_single_subtitle',
        'type'    => 'textarea',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'  => esc_html__('Image For show Background Header Of Tour', 'tourpacker'),
        'desc'  => esc_html__('Select image background for header. 1663px x 370px', 'tourpacker'),
        'id'    => $prefix . 'tour_single_images_bg',
        'type'  => 'file',
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number Days', 'tourpacker'), 
        'desc'    => esc_html__('Ex: <span class="block">4</span>Days', 'tourpacker' ),
        'id'      => $prefix . 'tour_single_number_days',
        'type'    => 'textarea_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number Nights', 'tourpacker'), 
        'desc'    => esc_html__('Ex: <span class="block">3</span>Nights', 'tourpacker' ),
        'id'      => $prefix . 'tour_single_number_nights',
        'type'    => 'textarea_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number Price starting from', 'tourpacker'), 
        'desc'    => esc_html__('Ex: $1422', 'tourpacker' ),
        'id'      => $prefix . 'tour_single_number_price',
        'type'    => 'text_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number Favorites', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 98 Favorites', 'tourpacker' ),
        'id'      => $prefix . 'tour_single_number_favorites',
        'type'    => 'text_small',
        'default' => '',
	) );

}

add_action( 'cmb2_admin_init', 'tour_info_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tour_info_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_tour_info',
		'title'         => __( 'Tour Infomation', 'cmb2' ),
		'object_types'  => array( 'tour', ), // Post type
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Tour Duration Subtitle', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 4 days &amp; 3 nights.', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_duration',
        'type'    => 'text',
        'default' => '',
	) );
	
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Tour Countries', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Croatia', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_country',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Experiences', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 5', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_experiences',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Ages', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 10 - 45+', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_age',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Starting Point', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Dubrovnik', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_start',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Ending Point', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Hvar', 'tourpacker' ),
        'id'      => $prefix . 'tour_info_end',
        'type'    => 'text',
        'default' => '',
	) );
	
}

add_action( 'cmb2_admin_init', 'tour_departures_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function tour_departures_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox_tour_departures',
		'title'        => __( 'Tour Departures', 'cmb2' ),
		'object_types' => array( 'tour', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'tour_departures_group',
		'type'        => 'group',
		'description' => __( 'Generates Tour Departures', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Tour Departures {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Time Start', 'cmb2' ),
		'id'         => 'tour_departures_start',
		'type'       => 'text_date',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Time End', 'cmb2' ),
		'id'         => 'tour_departures_end',
		'type'       => 'text_date',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );


	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Location and sequence number', 'cmb2' ),
		'description' => __( 'Ex: seats left<span>15</span>', 'cmb2' ),
		'id'          => 'tour_departures_location',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Price of Tour Departures', 'cmb2' ),
		'desc' => __( 'Ex: 1458', 'cmb2' ),
		'id'   => 'tour_departures_price',
		'type' => 'text_small',
		// 'repeatable' => true,
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Text Book Now', 'cmb2' ),
		'desc' => __( 'Ex: Book Now', 'cmb2' ),
		'id'   => 'tour_departures_book',
		'type' => 'text_small',
		// 'repeatable' => true,
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'             => __( 'Sold Out or No', 'cmb2' ),
		'desc'             => __( 'Sold Out Or No', 'cmb2' ),
		'id'               => 'tour_departures_sold_out',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'available' => __( 'Still available', 'cmb2' ),
			'sold'   => __( 'Sold Out', 'cmb2' ),
		),
	) );
	
}
add_action( 'cmb2_admin_init', 'tour_review_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function tour_review_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_tour_review',
		'title'         => __( 'Tour Review', 'cmb2' ),
		'object_types'  => array( 'tour', ), // Post type
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Rate 5*', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 50.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_rate_5',
        'type'    => 'text_small',
        'default' => '',
	) );
	
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Rate 4*', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 45.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_rate_4',
        'type'    => 'text_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Rate 3*', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 35.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_rate_3',
        'type'    => 'text_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Rate 2*', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 20.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_rate_2',
        'type'    => 'text_small',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Rate 1*', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 5.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_rate_1',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Text Cleanliness', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Cleanliness.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_cleanliness',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Cleanliness', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 4.5.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_cleanliness_num',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Text Service', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Service.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_service',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Service', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 4.5.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_service_num',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Text Comfort', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Comfort.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_comfort',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Comfort', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 4.2.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_comfort_num',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Text Condition', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Condition.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_condition',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Condition', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 3.8.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_condition_num',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Text Neighbourhood', 'tourpacker'), 
        'desc'    => esc_html__('Ex: Neighbourhood.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_neighbourhood',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number of Neighbourhood', 'tourpacker'), 
        'desc'    => esc_html__('Ex: 4.4.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_neighbourhood_num',
        'type'    => 'text_small',
        'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__('Number Phone of Make An Inquiry', 'tourpacker'), 
        'desc'    => esc_html__('Ex: +66 28 878 5452.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_make_an',
        'type'    => 'text',
        'default' => '',
	) );
	$cmb_demo->add_field( array(
		'name'    => esc_html__('Link Make An Inquiry', 'tourpacker'), 
        'desc'    => esc_html__('Ex: #.', 'tourpacker' ),
        'id'      => $prefix . 'tour_review_make_an_link',
        'type'    => 'text',
        'default' => '',
	) );
}

add_action( 'cmb2_admin_init', 'tour_right_setion_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function tour_right_setion_metabox() {
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox_tour_right_setion',
		'title'        => __( 'Tour Right Section Scroll', 'cmb2' ),
		'object_types' => array( 'tour', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'tour_right_section_group',
		'type'        => 'group',
		'description' => __( 'Generates Tour Right Section Scroll', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Tour Right Section {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Text Show on Right Section', 'cmb2' ),
		'description' => __( 'Ex: Highlights', 'cmb2' ),
		'id'          => 'tour_right_section_text',
		'type'        => 'text_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Link Section for Scroll', 'cmb2' ),
		'desc' => __( 'Ex: #section-0', 'cmb2' ),
		'id'   => 'tour_right_section_link',
		'type' => 'text_small',
		// 'repeatable' => true,
	) );
	
	
}

add_action( 'cmb2_admin_init', 'yourprefix_register_about_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function yourprefix_register_about_page_metabox() {
	$prefix = 'yourprefix_about_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'About Page Metabox', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_about_page->add_field( array(
		'name' => __( 'Test Text', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function yourprefix_register_repeatable_group_field_metabox() {
	$prefix = 'yourprefix_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Repeating Field Group', 'cmb2' ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb2' ),
			'remove_button' => __( 'Remove Entry', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Entry Title', 'cmb2' ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'cmb2' ),
		'description' => __( 'Write a short description for this entry', 'cmb2' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Entry Image', 'cmb2' ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image Caption', 'cmb2' ),
		'id'   => 'image_caption',
		'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function yourprefix_register_user_profile_metabox() {
	$prefix = 'yourprefix_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', 'cmb2' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function yourprefix_register_taxonomy_metabox() {
	$prefix = 'yourprefix_term_';

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'category', 'post_tag' ), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field( array(
		'name'     => __( 'Extra Info', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_term->add_field( array(
		'name' => __( 'Term Image', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'avatar',
		'type' => 'file',
	) );

	$cmb_term->add_field( array(
		'name' => __( 'Arbitrary Term Field', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'term_text_field',
		'type' => 'text',
	) );

}

add_action( 'cmb2_admin_init', 'yourprefix_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function yourprefix_register_theme_options_metabox() {

	$option_key = 'yourprefix_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => __( 'Theme Options Metabox', 'cmb2' ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 */
	$cmb_options->add_field( array(
		'name'    => __( 'Site Background Color', 'cmb2' ),
		'desc'    => __( 'field description (optional)', 'cmb2' ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}
