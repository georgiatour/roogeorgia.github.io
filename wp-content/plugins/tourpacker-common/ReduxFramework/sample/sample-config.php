<?php


if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( defined('TEMPLATEPATH') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( TEMPLATEPATH ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );
            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'redux-framework-demo'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }


        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
            }

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
        }

        public function setSections() {

            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_html_e('Current theme preview', 'tourpacker'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_html_e('Current theme preview', 'tourpacker'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'tourpacker') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }
			
            // ACTUAL DECLARATION OF SECTIONS          


    $this->sections[] = array(
        'icon' => 'el-icon-folder-open',
        'title'      => esc_html__( 'Index Page', 'tourpacker' ),
        'id'         => 'page_option_index_page',
        'fields'     => array(
            
            array(
                'id'       => 'index_page_image_background',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Image header of index and base Page', 'trips' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => esc_html__( 'Image show in header', 'trips' ),
                'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'trips' ),
                'default'  => array( 'url' => get_template_directory_uri().'/images/hero-header/breadcrumb.jpg' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'index_page_text_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Text Title on Header', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Text Title on Header', 'tourpacker' ),
                'default'  => 'Blog',
            ),
            array(
                'id'       => 'index_page_excerpt',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of characters in excerpt', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Enter number character (1,2,3,..).', 'tourpacker' ),
                'default'  => '40',
            ),
            array(
                'id'       => 'index_page_text_read',
                'type'     => 'text',
                'title'    => esc_html__( 'Text Read All', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Text button more detail of post', 'tourpacker' ),
                'default'  => 'Read More',
            ),
            
        )
    ) ;

    $this->sections[] = array(
        'icon' => 'el-icon-usd',
        'title'      => esc_html__( 'Payment Setting', 'tourpacker' ),
        'id'         => 'page_option_payment_setting',
        'fields'     => array(
            
            array(
                'id'       => 'payment_setting_currency',
                'type'     => 'text',
                'title'    => esc_html__( 'Currency', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'ISO 4217 3 letters code (e.g. USD)', 'tourpacker' ),
                'default'  => 'USD',
            ),
            array(
                'id'       => 'sku_prfx',
                'type'     => 'text',
                'title'    => __( 'SKU prefix', 'tourpacker' ),
                'subtitle' => '',
                'desc'     => '',
                'default'  => 'DRVM'
            ),
            array(
                'id'      => 'payment_pp_sandbox',
                'type'    => 'switch',
                'title'   => __( 'Sandbox Mode', 'tourpacker' ),
                'default' => true
            ),
            array(
                'id'       => 'payment_pp_email',
                'type'     => 'text',
                'validate' => 'email',
                'title'    => __( 'PayPal Account Email', 'tourpacker' ),
                'default'  => 'hoangha1651991-facilitator@gmail.com'
            ),
            array(
                'id' => 'payments_img_credit',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Image Payments for Credit Cart.', 'tourpacker'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload Images.', 'tourpacker'),
                'default' => array('url' => get_template_directory_uri().'/images/payment-credit-cards.jpg'),
            ), 
            array(
                'id' => 'payments_img_paypal',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Image Payments for Paypal.', 'tourpacker'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload Images.', 'tourpacker'),
                'default' => array('url' => get_template_directory_uri().'/images/payment-paypal.jpg'),
            ), 
            
            
        )
    ) ;
    $this->sections[] = array(
        'icon' => 'el-icon-folder-open',
        'title'      => esc_html__( 'Payment Success Setting', 'tourpacker' ),
        'id'         => 'page_option_payment_success_setting',
        'fields'     => array(
            
            array(
                'id'       => 'payment_success_setting_payment_text',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Payment Text', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Payment Text', 'tourpacker' ),
                'default'  => '<p>Prepared do an dissuade be so whatever steepest. Yet her beyond looked either day wished nay. By doubtful disposed do juvenile an. Now curiosity you explained immediate why behaviour. An dispatched impossible of of melancholy favourable. Our quiet not heart along scale sense timed. Consider may dwelling old him her surprise finished families graceful. Gave led past poor met fine was new.</p>
                        <p>Talking chamber as shewing an it minutes. Trees fully of blind do. Exquisite favourite at do extensive listening. Improve up musical welcome he. Gay attended vicinity prepared now diverted. Esteems it ye sending reached as. Longer lively her design settle tastes advice mrs off who. </p>',
            ),
            array(
                'id'       => 'payment_success_setting_additional_text',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Additional Text', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Additional Text', 'tourpacker' ),
                'default'  => '<p>Abilities or he perfectly pretended so strangers be exquisite. Oh to another chamber pleased imagine do in. Went me rank at last loud shot an draw. Excellent so to no sincerity smallness. Removal request delight if on he we. Unaffected in we by apartments astonished to decisively themselves. Offended ten old consider speaking.</p>',
            ),
            array(
                'id'       => 'payment_success_setting_need_text',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Need Book Help Text', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Need Book Help Text', 'tourpacker' ),
                'default'  => 'Paid was hill sir high 24/7. For him precaution any advantages dissimilar.',
            ),
            array(
                'id'       => 'payment_success_setting_need_field',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Need Book Help Content', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Need Book Help Content', 'tourpacker' ),
                'default'  => '<li><span class="font600">Hotline</span>: +1900 12 213 21</li>
                                    <li><span class="font600">Email</span>: support@tourpacker.com</li>
                                    <li><span class="font600">Livechat</span>: tourpacker (Skype)</li>',
            ),
            array(
                'id'       => 'payment_success_setting_why',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Why booking Help Content', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Why booking Content', 'tourpacker' ),
                'default'  => '<li>
                                        <span class="icon"><i class="fa fa-thumbs-up"></i></span>
                                        <h6 class="heading mt-0">No Booking Charges</h6>
                                        We don\'t charge you an extra fee for booking a hotel room with us
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa fa-credit-card"></i></span>
                                        <h6 class="heading mt-0">No Cancellation Sees</h6>
                                        We don\'t charge you a cancellation or modification fee in case plans change
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa fa-inbox"></i></span>
                                        <h6 class="heading mt-0">Instant Confirmation</h6>
                                        Instant booking confirmation whether booking online or via the telephone
                                    </li>
                                    <li>
                                        <span class="icon"><i class="fa fa-calendar"></i></span>
                                        <h6 class="heading mt-0">Flexible Booking</h6>
                                        You can book up to a whole year in advance or right up until the moment of your stay
                                    </li>',
            ), 
            array(
                'id'       => 'payment_success_setting_link_print',
                'type'     => 'text',
                'title'    => esc_html__( 'Link for Print Button', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Link for Print Button', 'tourpacker' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'payment_success_setting_link_sent',
                'type'     => 'text',
                'title'    => esc_html__( 'Link for Sent Button', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Link for Sent Button', 'tourpacker' ),
                'default'  => '#',
            ),
            
        )
    ) ;
    
    $this->sections[] = array(
        'icon' => ' el-icon-picture',
        'title'      => esc_html__( 'Link Page For Result Search and Payments', 'tourpacker' ),
        'id'         => 'page_option_result_search',
        'fields'     => array(
            array(
                'id'       => 'result_search_list',
                'type'     => 'text',
                'title'    => esc_html__( 'Link page search for Result List Use for Single Tour Search', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : http://localhost/tourpacker/?page_id=60', 'tourpacker' ),
                'default'  => 'http://localhost/tourpacker/?page_id=60',
            ),
            array(
                'id'       => 'payment_page',
                'type'     => 'text',
                'title'    => esc_html__( 'Link page Payment use for Payment Tour', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : http://localhost/tourpacker/?page_id=91', 'tourpacker' ),
                'default'  => 'http://localhost/tourpacker/?page_id=91',
            ),
            array(
                'id'       => 'payment_page_paypal',
                'type'     => 'text',
                'title'    => esc_html__( 'Link page Payment Paypal use for Payment Paypal Tour', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Choose Page Name: Paypal Payments Ex : http://localhost/tourpacker/?page_id=97', 'tourpacker' ),
                'default'  => 'http://localhost/tourpacker/?page_id=97',
            ),

            array(
                'id'       => 'result_search_grid',
                'type'     => 'text',
                'title'    => esc_html__( 'Link page search for Result Grid Use for All The page Result', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : http://localhost/tourpacker/?page_id=67', 'tourpacker' ),
                'default'  => 'http://localhost/tourpacker/?page_id=67',
            ),
                       
        )
    );
    

        $this->sections[] = array(
            'icon' => ' el-icon-plus',
            'title' => esc_html__('Logo & Favicon Settings', 'tourpacker'),
            'fields' => array(
                array(
                    'id' => 'logo_image',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Logo for Header.', 'tourpacker'),
                    'compiler' => 'true',
                    //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc' => esc_html__('Upload Logo For Header.', 'tourpacker'),
                    'subtitle' => esc_html__('Recommended size: Height: 176px and Width: 30px', 'tourpacker'),
                    'default' => array('url' => get_template_directory_uri().'/images/logo-white.png'),
                ), 
                array(
                    'id'       => 'logo_height',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Logo Height. size proposal: 30px', 'tourpacker' ),
                    'desc'     => esc_html__( 'Ex : 30px', 'tourpacker' ),
                    'default'  => '30px',
                ), 
                array(
                    'id'       => 'logo_width',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Logo Width. size proposal: 176px', 'tourpacker' ),
                    'desc'     => esc_html__( 'Ex : 176px', 'tourpacker' ),
                    'default'  => '176px',
                ), 
                array(
                    'id' => 'favicon',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Custom Favicon', 'tourpacker'),
                    'compiler' => 'true',
                    //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc' => esc_html__('Upload your Favicon.', 'tourpacker'),
                    'subtitle' => esc_html__('', 'tourpacker'),
                    'default' => array('url' => get_template_directory_uri().'/images/ico/favicon.png'),
                ),                  
                array(
                    'id' => 'apple_icon',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Apple Touch Icon 57x57', 'tourpacker'),
                    'compiler' => 'true',
                    //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc' => esc_html__('Upload your Apple touch icon 57x57.', 'tourpacker'),
                    'subtitle' => esc_html__('', 'tourpacker'),
                    'default' => array('url' => get_template_directory_uri().'/images/ico/apple-touch-icon-57-precomposed.png'),
                ),                  
                array(
                    'id' => 'apple_icon_72',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Apple Touch Icon 72x72', 'tourpacker'),
                    'compiler' => 'true',
                    //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc' => esc_html__('Upload your Apple touch icon 72x72.', 'tourpacker'),
                    'subtitle' => esc_html__('', 'tourpacker'),
                    'default' => array('url' => get_template_directory_uri().'/images/ico/apple-touch-icon-72-precomposed.png'),
                ),
                array(
                    'id' => 'apple_icon_114',
                    'type' => 'media',
                    'url' => true,
                    'title' => esc_html__('Apple Touch Icon 114x114', 'tourpacker'),
                    'compiler' => 'true',
                    //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'desc' => esc_html__('Upload your Apple touch icon 114x114.', 'tourpacker'),
                    'subtitle' => esc_html__('', 'tourpacker'),
                    'default' => array('url' => get_template_directory_uri().'/images/ico/apple-touch-icon-114-precomposed.png'),
                ),                      
            )
        );

    $this->sections[] = array(
        'icon' => 'el-icon-th-list',
        'title'      => esc_html__( 'Header Top Right', 'tourpacker' ),
        'id'         => 'page_option_header',
        'fields'     => array(
            array(
                'id'       => 'header_top_currency',
                'type'     => 'text',
                'title'    => esc_html__( 'Currently currency of your Theme', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : Dollar', 'tourpacker' ),
                'default'  => 'Dollar',
            ),
            array(
                'id'       => 'header_top_currency_icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Icon currently currency of your Theme', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Search your icon at here: http://ionicons.com/cheatsheet.html. Ex : ion-social-usd', 'tourpacker' ),
                'default'  => 'ion-social-usd',
            ),
            array(
                'id'       => 'header_top_currency_multi',
                'type'     => 'multi_text',
                'title'    => __( 'Multi currency Text and Icon', 'tourpacker' ),
                'subtitle' => __( 'Search your icon at here: http://ionicons.com/cheatsheet.html. Enter Text and Icon of currency.Ex: Europe,ion-social-euro ', 'tourpacker' ),
                'desc'     => __( 'Europe,ion-social-euro', 'tourpacker' )
            ),
            array(
                'id'       => 'header_top_languages',
                'type'     => 'text',
                'title'    => esc_html__( 'Currently Languages of your Theme', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : English', 'tourpacker' ),
                'default'  => 'English',
            ),
            array(
                'id'       => 'header_top_languages_multi',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Languages Text', 'tourpacker' ),
                'subtitle' => __( 'Ex: France ', 'tourpacker' ),
                'desc'     => __( 'France', 'tourpacker' )
            ),
            array(
                'id'       => 'header_top_call',
                'type'     => 'text',
                'title'    => esc_html__( 'Info Call to us on Header', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : Call us: +66 28 878 5452', 'tourpacker' ),
                'default'  => 'Call us: +66 28 878 5452',
            ),
           
        )
    );
    $this->sections[] = array(
        'icon' => 'el-icon-lines',
        'title'      => esc_html__( 'Footer Column One', 'tourpacker' ),
        'id'         => 'page_option_footer_one',
        'fields'     => array(
            array(
                'id'       => 'footer_one_address',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Address', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : 324 Yarang Road, T.Chabangtigo, Muanng Pattani 9400', 'tourpacker' ),
                'default'  => '324 Yarang Road, T.Chabangtigo, Muanng Pattani 9400',
            ),
            array(
                'id'       => 'footer_one_phone_1',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Number Phone 1', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : +66 28 878 5452', 'tourpacker' ),
                'default'  => '+66 28 878 5452',
            ),
            array(
                'id'       => 'footer_one_phone_2',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Number Phone 2', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : +66 2 547 2223', 'tourpacker' ),
                'default'  => '+66 2 547 2223',
            ),
            array(
                'id'       => 'footer_one_support',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Support address Text', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : support@tourpacker.com', 'tourpacker' ),
                'default'  => 'support@tourpacker.com',
            ),
            array(
                'id'       => 'footer_one_support_link',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Support address Link', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : #', 'tourpacker' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'footer_one_social',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Icon and Link and Title of your social', 'tourpacker' ),
                'subtitle' => esc_html__( 'Search your icon at here: http://fontawesome.io/cheatsheet/. Ex : fa-facebook,#,Facebook ', 'tourpacker' ),
                'desc'     => esc_html__( 'Enter Arranged by order: Icon,Link,Title', 'tourpacker' )
            ),
            array(
                'id'       => 'footer_one_copyright',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Copyright', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : &#169; Copyright 2016 Tour Packer. All Rights Reserved', 'tourpacker' ),
                'default'  => '&#169; Copyright 2016 Tour Packer. All Rights Reserved',
            ),
            
        )
    );
    $this->sections[] = array(
        'icon' => 'el-icon-lines',
        'title'      => esc_html__( 'Footer Column Two', 'tourpacker' ),
        'id'         => 'page_option_footer_two',
        'fields'     => array(
            array(
                'id'       => 'footer_two_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Two columns Title', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : About Tour Packer', 'tourpacker' ),
                'default'  => 'About Tour Packer',
            ),
            
            array(
                'id'       => 'footer_two_text_link',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Text and link of you.', 'tourpacker' ),
                'subtitle' => esc_html__( 'Ex : WHO WE ARE,# ', 'tourpacker' ),
                'desc'     => esc_html__( 'Enter Arranged by order: Text,Link', 'tourpacker' )
            ),
            
            
        )
    );
    $this->sections[] = array(
        'icon' => 'el-icon-lines',
        'title'      => esc_html__( 'Footer Column Three', 'tourpacker' ),
        'id'         => 'page_option_footer_three',
        'fields'     => array(
            array(
                'id'       => 'footer_three_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Three columns Title', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : Customer service', 'tourpacker' ),
                'default'  => 'Customer service',
            ),
            
            array(
                'id'       => 'footer_three_text_link',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Text and link of you.', 'tourpacker' ),
                'subtitle' => esc_html__( 'Ex : Payment,# ', 'tourpacker' ),
                'desc'     => esc_html__( 'Enter Arranged by order: Text,Link', 'tourpacker' )
            ),
            
            
        )
    );
    $this->sections[] = array(
        'icon' => 'el-icon-lines',
        'title'      => esc_html__( 'Footer Column Four', 'tourpacker' ),
        'id'         => 'page_option_footer_four',
        'fields'     => array(
            array(
                'id'       => 'footer_four_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Four columns Title', 'tourpacker' ),
                'subtitle' => esc_html__( '', 'tourpacker' ),
                'desc'     => esc_html__( 'Ex : Others', 'tourpacker' ),
                'default'  => 'Others',
            ),
            
            array(
                'id'       => 'footer_four_text_link',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Text and link of you.', 'tourpacker' ),
                'subtitle' => esc_html__( 'Ex : DESTINATIONS,# ', 'tourpacker' ),
                'desc'     => esc_html__( 'Enter Arranged by order: Text,Link', 'tourpacker' )
            ),
            
            
        )
    );
    
    $this->sections[] = array(
        'icon' => 'el-icon-website',
        'title' => esc_html__('Styling Options', 'tourpacker'),
        'fields' => array(
            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color', 'tourpacker'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #df4a43).', 'tourpacker'),
                'default' => '#F56961',
                'validate' => 'color',
            ),
            array(
                'id' => 'body-font',
                'type' => 'typography',
                'output' => array('body'),
                'title' => esc_html__('Body Font', 'tourpacker'),
                'subtitle' => esc_html__('Specify the body font properties.', 'tourpacker'),
                'line-height'   => false,
                'google' => true,
                'default' => array(
                    'color' => '#666',
                    'font-size' => '13px',
                    'font-family' => "",
                ),
            ),
             array(
                'id' => 'custom-css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'tourpacker'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'tourpacker'),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                'default' => "#header{\nmargin: 0 auto;\n}"
            ),
        )
    );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'goddess'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'goddess'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'goddess')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'goddess'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'goddess')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'goddess');
        }

        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'theme_option', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Tourpacker Options', 'goddess'),
                'page' => __('Tourpacker Options', 'goddess'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBM9vxebWLN3bq4Urobnr6tEtn7zM06rEw', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => true, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
            $this->args['share_icons'][] = array(
                'url' => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon' => 'el-icon-github'
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );



            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'goddess'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'goddess');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'goddess');
        }

    }

    new Redux_Framework_sample_config();
}


if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
