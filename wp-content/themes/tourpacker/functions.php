<?php
require_once get_template_directory() . '/framework/BFI_Thumb.php';
require_once get_template_directory() . '/framework/recent_post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

//Theme Set up:
function tourpacker_theme_setup() {

    add_theme_support( 'custom-header' ); 
    add_theme_support( 'custom-background' );
    add_theme_support ('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    add_theme_support( 'post-formats', 
    array( 
        'video' ,
        'gallery',
    ));
    register_nav_menus( array(
        'primary' => esc_html__('Primary Navigation Menu (Use For All Page)','tourpacker'),   
    ) );
    add_filter( 'use_default_gallery_style', '__return_false' );

}
add_action( 'after_setup_theme', 'tourpacker_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
/* Load Theme Textdomain */
function tourpacker_load_theme_textdomain() {
load_theme_textdomain( 'tourpacker', get_template_directory_uri() . '/languages/' );
}
add_action( 'after_setup_theme', 'tourpacker_load_theme_textdomain' );
/*
Register Fonts
*/
function tourpacker_family_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'tourpacker' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Material Icons' ), "https://fonts.googleapis.com/icon" );
    }
    return $font_url;
}
function tourpacker_lato_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'tourpacker' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lato:400,400italic,700,700italic,300italic,300' ), "https://fonts.googleapis.com/css" );
    }
    return $font_url;
}
function tourpacker_open_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'tourpacker' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open Sans:400,400italic,300italic,300,600,600italic,700,700italic' ), "https://fonts.googleapis.com/css" );
    }
    return $font_url;
}
function tourpacker_theme_scripts_styles(){
     
    /**** Theme Specific CSS ****/
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri() .'/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'animate.css', get_template_directory_uri() .'/css/animate.css');
    wp_enqueue_style( 'main.css', get_template_directory_uri() .'/css/main.css');
    wp_enqueue_style( 'component.css', get_template_directory_uri() .'/css/component.css');
    wp_enqueue_style( 'ionicons.css', get_template_directory_uri() .'/icons/ionicons/css/ionicons.css');
    wp_enqueue_style( 'font-awesome.min.css', get_template_directory_uri() .'/icons/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'pe-icon-7-stroke.css', get_template_directory_uri() .'/icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css');
    wp_enqueue_style( 'simple-line-icons.css', get_template_directory_uri() .'/icons/simple-line-icons/css/simple-line-icons.css');
    wp_enqueue_style( 'themify-icons.css', get_template_directory_uri() .'/icons/themify-icons/themify-icons.css');
    wp_enqueue_style( 'rivolicons-style.css', get_template_directory_uri() .'/icons/rivolicons/style.css');
    wp_enqueue_style( 'family-fonts', tourpacker_family_fonts_url(), array(), null );
    wp_enqueue_style( 'tourpacker-lato-fonts', tourpacker_lato_fonts_url(), array(), null );
    wp_enqueue_style( 'tourpacker-open-fonts', tourpacker_open_fonts_url(), array(), null );
    wp_enqueue_style( 'tourpacker-style.css', get_template_directory_uri() .'/css/style.css');
    wp_enqueue_style( 'style' , get_stylesheet_uri(), array(),'2016-01-04');
    

    echo '<!--[if lt IE 9]>'.wp_enqueue_script("html5shiv-ie", "$protocol://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js",array(),true,false).'<![endif]-->
    <!--[if lt IE 9]>'.wp_enqueue_script("respond-ie", "$protocol://oss.maxcdn.com/respond/1.4.2/respond.min.js",array(),true,false).'<![endif]-->';

    /**** Start Jquery ****/ 
    wp_enqueue_script( 'jquery', plugins_url( '/js/jquery.js' , __FILE__ ), array( 'jquery' ) );
    
    wp_enqueue_script("jquery-migrate-1.2.1.min.js", get_template_directory_uri()."/js/jquery-migrate-1.2.1.min.js",array(),false,true);
    wp_enqueue_script("bootstrap.min.js", get_template_directory_uri()."/bootstrap/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("jquery.waypoints.min.js", get_template_directory_uri()."/js/jquery.waypoints.min.js",array(),false,true);
    wp_enqueue_script("jquery.easing.1.3.js", get_template_directory_uri()."/js/jquery.easing.1.3.js",array(),false,true);
    wp_enqueue_script("SmoothScroll.min.js", get_template_directory_uri()."/js/SmoothScroll.min.js",array(),false,true);
    wp_enqueue_script("jquery.slicknav.min.js", get_template_directory_uri()."/js/jquery.slicknav.min.js",array(),false,true);
    wp_enqueue_script("jquery.placeholder.min.js", get_template_directory_uri()."/js/jquery.placeholder.min.js",array(),false,true);
    wp_enqueue_script("instagram.min.js", get_template_directory_uri()."/js/instagram.min.js",array(),false,true);
    wp_enqueue_script("spin.min.js", get_template_directory_uri()."/js/spin.min.js",array(),false,true);
    wp_enqueue_script("jquery.introLoader.min.js", get_template_directory_uri()."/js/jquery.introLoader.min.js",array(),false,true);
    wp_enqueue_script("select2.full.js", get_template_directory_uri()."/js/select2.full.js",array(),false,true);
    wp_enqueue_script("jquery.responsivegrid.js", get_template_directory_uri()."/js/jquery.responsivegrid.js",array(),false,true);
    wp_enqueue_script("ion.rangeSlider.min.js", get_template_directory_uri()."/js/ion.rangeSlider.min.js",array(),false,true);
    wp_enqueue_script("readmore.min.js", get_template_directory_uri()."/js/readmore.min.js",array(),false,true);
    wp_enqueue_script("slick.min.js", get_template_directory_uri()."/js/slick.min.js",array(),false,true);
    wp_enqueue_script("validator.min.js", get_template_directory_uri()."/js/validator.min.js",array(),false,true);
    wp_enqueue_script("jquery.raty.js", get_template_directory_uri()."/js/jquery.raty.js",array(),false,true);
    wp_enqueue_script("customs.js", get_template_directory_uri()."/js/customs.js",'','1.2',true);
if(is_singular('tour')){
    wp_enqueue_script("customs-scrollpy.js", get_template_directory_uri()."/js/customs-scrollpy.js",array(),false,true);
}
if( is_page_template('template/canvas_page.php') ){
    wp_enqueue_script("jquery-flexslider.js", get_template_directory_uri()."/js/jquery.flexslider-min.js",array(),false,true);
    
}
if( is_page_template('template/video_page.php') ){
    wp_enqueue_script("youtube.js", "http://www.youtube.com/player_api",array(),false,true);    
    wp_enqueue_script("ytbgnav.js", get_template_directory_uri()."/js/ytbgnav.js",array(),false,true);
}
if( is_page_template('template/contact_page.php') ){
    wp_enqueue_script("maps-js", "$protocol://maps.googleapis.com/maps/api/js?key=AIzaSyDEm44WXMpUR3J4k9SjXmYmv-vQ97YRkZc",array(),false,true);  
    wp_enqueue_script("MarkerClusterer.js", get_template_directory_uri()."/js/MarkerClusterer.js",array(),false,true);
    wp_enqueue_script("infobox.js", get_template_directory_uri()."/js/infobox.js",array(),false,true);
    wp_enqueue_script("jquery.mosne.map-for-category.js", get_template_directory_uri()."/js/jquery.mosne.map-for-category.js",array(),false,true);
}

}
add_action( 'wp_enqueue_scripts', 'tourpacker_theme_scripts_styles' );



// Comment Form
function tourpacker_theme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>
    <li class="comment-<?php comment_ID() ?>">
        <div class="comment-avatar">
            <?php echo get_avatar($comment,$size='100'); ?>
        </div>
        <div class="comment-header">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            <h6 class="heading mt-0"><?php printf(__('%s','tourpacker'), get_comment_author_link()) ?></h6>
            <span class="comment-time"><?php $d = "M, d, Y"; printf(get_comment_date($d)) ?></span>
        </div>
        <div class="comment-content">
            <?php if ($comment->comment_approved == '0') : ?>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em><?php esc_html_e('Your comment is awaiting moderation.','tourpacker') ?></em>
            <br />
            <?php endif; ?>
            <p><?php comment_text() ?></p>
        </div>
    </li>
<?php
}
if(!function_exists('tourpacker_custom_frontend_style')){
function tourpacker_search_form() {
    $form = '<div class="sidebar-module-inner">
                <div class="sidebar-mini-search">
                    <div class="input-group">
                    <form class="search-form" method="get" id="searchform" action="' . home_url( '/' ) . '" >
                        <input type="text" value="' . get_search_query() . '" class="sss form-control" name="s" id="s" placeholder="'.esc_html__('Search for...','tourpacker').'">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                    </div>
                </div>
            </div>';
    return $form;
}
}
add_filter( 'get_search_form', 'tourpacker_search_form' );

function tourpacker_custom_styles() {
    $theme_option = get_option('theme_option');    
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom-style.css' );
    if(isset($theme_option['main-color'])){
        $bold_headlines = $theme_option['main-color']; 
    }else{
        $bold_headlines = '#F56961';
    }

    if(isset($theme_option['logo_height'])){
        $logo_height = $theme_option['logo_height']; 
    }else{
        $logo_height = '30px';
    }  
    if(isset($theme_option['logo_width'])){
        $logo_width = $theme_option['logo_width']; 
    }else{
        $logo_width = '176px';
    }   

    if(isset($theme_option['custom-css'])){
        $bold_custom_css = $theme_option['custom-css']; 
    }else{
        $bold_custom_css = '';
    }   
    $custom_inline_style = '
    .navbar-logo img {
        height: '.$logo_height.' !important;
        width: '.$logo_width.' !important;
    }
    .navbar-primary, ul.sort-by li.active a:after, .package-grid-item .absolute-in-image .duration span, .package-list-item .absolute-in-image .duration span, 
    ul.list-info li .icon, .itinerary-item.intro-item:before, .itinerary-item-wrapper .panel-heading .absolute-day-number,
    .newsletter-text .icon, .about-us-grid-block-item, .payment-header .number, ul.price-summary-list li.total-price, .boxed-social a,

    .btn-primary, .btn-primary.btn-inverse:hover, 

    .progress-primary .progress-bar, .irs-bar, .irs-bar-edge { background: '. $bold_headlines .'; }



    .bg-primary { background: '. $bold_headlines .' !important; }

    .boxed-social a:hover, .comment-item a.comment-reply:hover, .comment-item a.comment-reply:hover, .tag-cloud a:hover,

    .btn-primary:hover, .btn-primary:focus, .btn-primary.focus { background: '. $bold_headlines .'; }


    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus { background-color: '. $bold_headlines .'; }


    /** Color */

    ul.availabily-list li.availabily-content > div.date-from:after, ul.sort-by li.active a, ul.sort-by li a:hover, .btn-sorting.active,
    .btn-sorting:hover, .featured-item .content .icon, ul.featured-list-sm li .icon, .absolute-in-content .price, .alt-smaller .price, 
    .package-list-item .content .price, .itinerary-item-wrapper .panel-heading.active .absolute-day-number,
    .review-overall-point span, .faq-alt-2-wrapper .bootstarp-accordion .panel-heading a:before, ul.static-page-menu li a:hover,
    ul.static-page-menu li.active a, .breadcrumb-wrapper ol.breadcrumb-list li a,

    a, h1, h2, h3, h4, h5, h6, .btn-link,

    .scrollspy-sidebar .nav > li > a:hover, .irs-from, .irs-to, .irs-single { color: '. $bold_headlines .'; }

    .text-primary { color: '. $bold_headlines .' !important; }

    ul.social-share-sm li a:hover, .blog-content h3 a:hover, .blog-author h5 a:hover, .navbar-nav li ul li:hover > a, .navbar-nav > li.mega-menu:hover > a,
    .navbar-nav > li.mega-menu > a:hover, .navbar-nav > li.dropdown:hover > a, .navbar-nav > li.dropdown > a:hover, .navbar-nav > li.dropdown.active > a,
    .navbar-nav > li.dropdown.active > a:hover, .navbar-nav > li:hover > a, .navbar-nav > li.active > a, .breadcrumb-wrapper ol.breadcrumb-list li a:hover, .navbar-nav > li.mega-menu ul li a:hover, .navbar-sticky .navbar-nav > li > a:hover, .navbar-sticky .navbar-nav > li > a:focus, .breadcrumb-wrapper ol.breadcrumb-list li a:hover, .sidebar-inner.for-blog a:hover, ul.sidebar-post li a:hover h6, .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus, .team-item ul.social li a:hover , ul.social-share-sm li a:hover, .blog-content h3 a:hover, .blog-author h5 a:hover,

    a:hover,

    input[type=\'radio\'] + label:hover::before,
    input[type=\'checkbox\'] + label:hover::before,
    input[type=\'radio\']:checked + label:before,
    input[type=\'checkbox\']:checked + label:before
     { color: '. $bold_headlines .'; }


    /** Border Color */
    ul.featured-list-sm li .icon, .itinerary-item-wrapper .panel-heading .absolute-day-number, .itinerary-item-wrapper .panel-heading.active .absolute-day-number, .comment-item a.comment-reply,

    .btn-primary,  

    .progress-primary .progress-bar, .scrollspy-sidebar .nav > li > a:hover, .irs-slider { border-color: '. $bold_headlines .'; }

    .comment-item a.comment-reply:hover, .tag-cloud a:hover, .comment-item a.comment-reply:hover,

    .btn-primary:hover, .btn-primary:focus, .btn-primary.focus,  .form-control:focus, .form-control:active { border-color: '. $bold_headlines .'; }



    /** Border Top Color */
    .navbar-nav li ul { border-top-color: '. $bold_headlines .'; }



    /** Border Right Color */
    .for-faq-page.scrollspy-sidebar .nav > li > a:hover, .for-faq-page.scrollspy-sidebar .nav > .active > a,
    .for-faq-page.scrollspy-sidebar .nav > .active:hover > a, .for-faq-page.scrollspy-sidebar .nav > .active:focus > a, ul.static-page-menu li a:hover,
    ul.static-page-menu li.active a { border-right-color: '. $bold_headlines .' !important; }


    .btn-primary.btn-inverse { color: '. $bold_headlines .' !important; border-color: '. $bold_headlines .' !important; }

    .scrollspy-sidebar .nav > .active > a,
    .scrollspy-sidebar .nav > .active:hover > a,
    .scrollspy-sidebar .nav > .active:focus > a { color: '. $bold_headlines .' !important; border-color: '. $bold_headlines .' !important; }

    #back-to-top a:hover { background-color: '. $bold_headlines .'; border-color: '. $bold_headlines .'; }
        
    '.$bold_custom_css.'
    ';
    wp_add_inline_style( 'custom-style', $custom_inline_style );
}
add_action( 'wp_enqueue_scripts', 'tourpacker_custom_styles' );

// Fuction register widgets
function tourpacker_widgets_init() {
    // sidebar in single blog
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'tourpacker' ),
        'id'            => 'sidebar-1',
        'class'         => 'widget',
        'description'   => esc_html__( 'Main sidebar that appears on the single blog.', 'tourpacker' ),
        'before_widget' => '<div class="sidebar-module %2$s">',
        'after_widget'  => '</div><div class="clear"></div>',
        'before_title'  => '<h4 class="sidebar-title">',
        'after_title'   => '</h4>',
    ) );
    
}
add_action( 'widgets_init', 'tourpacker_widgets_init' );

function add_menu_icons_styles(){
?>
<style>
#adminmenu .menu-icon-tour div.wp-menu-image:before {
    content: "\f527";
}
#adminmenu .menu-icon-lesson div.wp-menu-image:before {
    content: "\f331";
}
#adminmenu .menu-icon-team div.wp-menu-image:before {
    content: "\f307";
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );
// This theme uses its own gallery styles.


function tourpacker_breadcrumbs() {
       // / === OPTIONS === /
    $text['home']     = esc_html__('Home','tourpacker'); // text for the 'Home' link
    $text['category'] = esc_html__('Archive by Category "%s"','tourpacker'); // text for a category page
    $text['tax']      = esc_html__('Archive for "%s"','tourpacker'); // text for a taxonomy page
    $text['search']   = esc_html__('Search Results for "%s" Query','tourpacker'); // text for a search results page
    $text['tag']      = esc_html__('Posts Tagged "%s"','tourpacker'); // text for a tag page
    $text['author']   = esc_html__('Articles Posted by %s','tourpacker'); // text for an author page
    $text['404']      = esc_html__('Error 404','tourpacker'); // text for the 404 page
 
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    // / === END OF OPTIONS === /
 
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
    if (is_home() || is_front_page()) { 
 
        if ($showOnHome == 1) echo '<ol class="breadcrumb-list"><li><a href="' . $homeLink . '" class="pathway">' . $text['home'] . '</a></li></ol>';
 
    } else {
 
        echo '<ol class="breadcrumb-list">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
 
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
        
        }elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</ol>';
 
    }
}
// Change address Comment Field
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
// Custom Excerpt
function tourpacker_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'.';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}


function tourpacker_pagination() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    if ( $paged == 1 && $max > 2 )
         $links[] = $paged + 2 ;
    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
        // $links[] = $paged - 2;
    }

    if ( ( $paged + 1 ) <= $max ) {
        // $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    if ( $paged == $max && $max > 2 )
        $links[] = $paged - 2 ;

    /** Previous Post Link */
    $url_template = get_template_directory_uri();
    if ( get_previous_posts_link() )
        printf( '
            <li>%s</li>' . "\n", get_previous_posts_link('<span aria-hidden="true">&laquo;</span>') );

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('<span aria-hidden="true">&raquo;</span>') );


}
// Tour Search Form
function tour_search_form(){ 
    $theme_option=get_option('theme_option');
?>
    <form action="<?php if(isset($theme_option['result_search_list'])){echo esc_attr($theme_option['result_search_list']);}else{} ?>" method="POST" enctype="multipart/form-data">
          
            <div class="form-group">
                
              <select name="tour_destination" id="destination_cus" class="select2-multi-in-modal form-control" data-placeholder="<?php echo esc_html__('Choose a Destination','tourpacker'); ?>" multiple >
                <option value=""><?php echo esc_html__('Choose a Destination','tourpacker'); ?></option>
                <option value="00"><?php echo esc_html__('Any Destination','tourpacker'); ?></option>
              <?php 
              $i = 0;
              $args = array(
                'post_type' => 'tour',
                'posts_per_page'  => -1,
              );
              $locations = array(); 
              $the_query = new WP_Query( $args );
              if ($the_query->have_posts()) :                                         
              while ( $the_query->have_posts() ) : $the_query->the_post();
              $tour_single_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country',true);
                if (!in_array($tour_single_country, $locations) && $tour_single_country != '') {
                  $locations[$i] = $tour_single_country;
              ?>
                <option value="<?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_country',true); ?>"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_country',true); ?></option>
              <?php } endwhile;wp_reset_postdata();
              endif; ?>
              </select>
              <input type="hidden" name="destination_hidden" id="destination_hidden"/>
              <script>
            jQuery(function($){
                $(document).ready(function(){
                  $("button.destination_cus").on("click",function(){
                    document.getElementById("destination_hidden").value = $('#destination_cus').val();
                  });
                });
            });
            </script>
            </div>
          
            <div class="form-group">
                
              <select name="tour_month" id="month_cus_search" class="select2-multi-in-modal form-control" data-placeholder="<?php echo esc_html__('Choose a Departure Month','tourpacker'); ?>" multiple >
                <option value=""><?php echo esc_html__('Choose a Departure Month','tourpacker'); ?></option>
                <option value="00"><?php echo esc_html__('Any Departure Month','tourpacker'); ?></option>
                <option value="01"><?php echo esc_html__('January','tourpacker'); ?></option>
                <option value="02"><?php echo esc_html__('February','tourpacker'); ?></option>
                <option value="03"><?php echo esc_html__('March','tourpacker'); ?></option>
                <option value="04"><?php echo esc_html__('April','tourpacker'); ?></option>
                <option value="05"><?php echo esc_html__('May','tourpacker'); ?></option>
                <option value="06"><?php echo esc_html__('June','tourpacker'); ?></option>
                <option value="07"><?php echo esc_html__('July','tourpacker'); ?></option>
                <option value="08"><?php echo esc_html__('August','tourpacker'); ?></option>
                <option value="09"><?php echo esc_html__('September','tourpacker'); ?></option>
                <option value="10"><?php echo esc_html__('October','tourpacker'); ?></option>
                <option value="11"><?php echo esc_html__('November','tourpacker'); ?></option>
                <option value="12"><?php echo esc_html__('December','tourpacker'); ?></option>
              </select>
              <input type="hidden" name="month_hidden" id="month_hidden"/>
              <script>
            jQuery(function($){
                $(document).ready(function(){
                  $("button.destination_cus").on("click",function(){
                    document.getElementById("month_hidden").value = $('#month_cus_search').val();
                  });
                });
            });
              </script>
            </div>
            
            <div class="form-group">

              <select name="tour_year" id="year_cus" class="select2-multi-in-modal form-control" data-placeholder="<?php echo esc_html__('Choose a Departure Year','tourpacker'); ?>" multiple >
                <option value=""><?php echo esc_html__('Choose a Departure Year','tourpacker'); ?></option>
                <option value="00"><?php echo esc_html__('Any Departure Year','tourpacker'); ?></option>
                <option value="2016"><?php echo esc_html__('2016','tourpacker'); ?></option>
                <option value="2017"><?php echo esc_html__('2017','tourpacker'); ?></option>
                <option value="2018"><?php echo esc_html__('2018','tourpacker'); ?></option>
              </select>
              <input type="hidden" name="year_hidden" id="year_hidden"/>
              <script>
            jQuery(function($){
                $(document).ready(function(){
                  $("button.destination_cus").on("click",function(){
                    document.getElementById("year_hidden").value = $('#year_cus').val();
                  });
                });
            });
              </script>
            </div>
            
            <div class="form-group">
                
              <button type="submit" class="btn btn-primary btn-block destination_cus"><?php echo esc_html__('Search','tourpacker'); ?></button>
              
            </div>
          
          </form>
<?php
}

// Form Login
add_action( 'wp_login_form', 'tour_form_login' );
function tour_form_login( $args = array() ) {
    $theme_option = get_option('theme_option');
    $linkpage=home_url();
$defaults = array(
        'echo' => true,
        'redirect' => $linkpage, 
        'form_id' => 'login-form',
        'label_username' => esc_html__( 'Username','tourpacker' ),
        'label_password' => esc_html__( 'Password','tourpacker' ),
        'label_remember' => esc_html__( 'Remember Me','tourpacker' ),
        'label_log_in' => esc_html__( 'Sign in','tourpacker' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_email'    => 'user_email',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => '',
        'value_remember' => false,
);
$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );
$form = '

        <form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
                ' . apply_filters( 'login_form_top', '', $args ) . '                
                <div class="modal-body pb-5">
          
                  <h4 class="text-center heading mt-10 mb-20">Sign-in</h4>                   
              
                  <div class="form-group">
                    <input type="text" class="form-control" name="log" placeholder="'.esc_html__('username','tourpacker').'" id="login_username" value="' . esc_attr( $args['value_username'] ) . '" required="required"/>                      
                  </div>
                  <div class="form-group"> 
                    <input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . ' login_password" class="form-control" placeholder="'.esc_html__('password','tourpacker').'" value="" required="required"/>                    
                  </div>
          
                  <div class="form-group">
                    <div class="row gap-5">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="checkbox-block fa-checkbox"> 
                        ' . apply_filters( 'login_form_middle', '', $args ) . '
                        ' . ( $args['remember'] ? '
                            <input id="' . esc_attr( $args['id_remember'] ) . ' remember_me_checkbox" name="rememberme" class="checkbox" value="' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . '" type="checkbox"> ' . esc_html( $args['label_remember'] ) . '' : '' ) . '
                          <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="'.esc_html__('First Choice','tourpacker').'" type="checkbox"> 
                          <label class="" for="remember_me_checkbox">'.esc_html__('remember','tourpacker').'</label>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
                        <button id="login_lost_btn" type="button" class="btn btn-link"></button>
                      </div>
                    </div>
                  </div>
                
                </div>
                <div class="modal-footer">
            
                  <div class="row gap-10">
                    <div class="col-xs-6 col-sm-6 mb-10">
                      <input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="btn btn-primary btn-block" placeholder="'.esc_html__('Sign-in','tourpacker').'" value="' . esc_attr( $args['label_log_in'] ) . '" />
                      <input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />                      
                    </div>
                    <div class="col-xs-6 col-sm-6 mb-10">
                      <button type="submit" class="btn btn-primary btn-block btn-inverse" data-dismiss="modal" aria-label="Close">'.esc_html__('Cancel','tourpacker').'</button>
                    </div>
                  </div>
                  <div class="text-left">
                    '.esc_html__('No account?','tourpacker').' 
                    <button id="login_register_btn" type="button" class="btn btn-link">'.esc_html__('Register','tourpacker').'</button>
                  </div>
                  
                </div>
                ' . apply_filters( 'login_form_bottom', '', $args ) . '
        </form>';

if ( $args['echo'] )
        echo $form;
else
        return $form;
}
function tour_register_form(){

        if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>
        <div id="register-custom">
            <div class="modal-body pb-5">
                <?php echo esc_html__('You have login with user','tourpacker'); ?>: <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> <?php echo esc_html__('Do you want','tourpacker'); ?> <a href="<?php echo wp_logout_url(home_url()); ?>"><?php echo esc_html__('Logout','tourpacker'); ?></a> ?
            </div>
        </div>
        <?php } else { ?>
            <?php $err = ''; $success = ''; global $wpdb, $PasswordHash, $current_user, $user_ID; if(isset($_POST['task']) && $_POST['task'] == 'register' ) { $pwd1 = esc_sql(trim($_POST['pwd1']));
                $pwd2 = esc_sql(trim($_POST['pwd2']));
                $email = esc_sql(trim($_POST['email']));
                $username = esc_sql(trim($_POST['username']));
         
                if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
                    $err = esc_html__('Please do not vacate the required information!','tourpacker');
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $err = esc_html__('Email address is not valid!.','tourpacker');
                } else if(email_exists($email) ) {
                    $err = esc_html__('Email already exists!.','tourpacker');
                } else if($pwd1 <> $pwd2 ){
                    $err = esc_html__('Two Password is not the same!.','tourpacker');
                } else {
                    $user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
                    if( is_wp_error($user_id) ) {
                        $err = esc_html__('Error on user creation.','tourpacker');
                    } else {
                        do_action('user_register', $user_id);
                        $success = esc_html__('You have successfully registered !','tourpacker');
                    }
                }
            }
            ?>
            <!--display error/success message-->
            <div>
                <?php
                    if(! empty($err) ) :
                        echo ''.$err.'';
                    endif;
                ?>
                <?php
                    if(! empty($success) ) :
                        $login_page  = home_url();
                        echo ''.$success. '<a href='.$login_page.'> '.esc_html__('Login','tourpacker').' </a>'.'';
                    endif;
                ?>
            </div>
            <form id="register-form" method="post" style="display:none;" role="form">
                    
                <div class="modal-body pb-5">
                
                    <h3 class="text-center heading mt-10 mb-20"><?php echo esc_html__('Register','tourpacker'); ?></h3>
                    <div class="form-group"> 
                        <input id="username" name="username" class="form-control" type="text" placeholder="<?php echo esc_html__('Username','tourpacker'); ?>"> 
                    </div>                            
                    <div class="form-group"> 
                        <input id="email" name="email" class="form-control" type="email" placeholder="<?php echo esc_html__('Email','tourpacker'); ?>">
                    </div>
                    <div class="form-group"> 
                        <input name="pwd1" id="pwd1" class="form-control" type="password" placeholder="<?php echo esc_html__('Password','tourpacker'); ?>">
                    </div>
                    
                    <div class="form-group"> 
                        <input name="pwd2" id="pwd2" class="form-control" type="password" placeholder="<?php echo esc_html__('Confirm Password','tourpacker'); ?>">
                    </div>
                </div>

                <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
                <div class="modal-footer mt-10">
                        
                    <div class="row gap-10">
                        <div class="col-xs-6 col-sm-6 mb-10">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo esc_html__('Register','tourpacker'); ?></button>
                            <input type="hidden" name="task" value="register" />
                        </div>
                        <div class="col-xs-6 col-sm-6 mb-10">
                            <button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close"><?php echo esc_html__('Cancel','tourpacker'); ?></button>
                        </div>
                    </div>
                    
                    <div class="text-left">
                            <?php echo esc_html__('Already have account?','tourpacker'); ?> <button id="register_login_btn" type="button" class="btn btn-link"><?php echo esc_html__('Sign-in','tourpacker'); ?></button>
                    </div>
                    
                </div>                
            </form>
                
            <div class="notification-login">
                <?php
                    $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                    if ( $login === "failed" ) {
                            echo '<strong>ERROR:</strong> Username or Password is error!';
                    } elseif ( $login === "empty" ) {
                            echo '<strong>ERROR:</strong> Username and Password can not empty';
                    } elseif ( $login === "false" ) {
                            echo '<strong>ERROR:</strong> You have Logout.';
                    }
                ?>
            </div>
<?php  
    }

}

/* Visual Composer */

//if(class_exists('WPBakeryVisualComposerSetup')){
function tourpacker_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'tourpacker_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 

if(function_exists('vc_add_param')){

  vc_add_param('vc_row',array(
          "type" => "textfield",
          "heading" => esc_html__('Section HTML', 'tourpacker'),
          "param_name" => "el_html",
          "value" => "",
          "description" => esc_html__("Set HTML section", 'tourpacker'),   
    ));   
  vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => esc_html__('Fullwidth', 'tourpacker'),
        "param_name" => "fullwidth",
        "value" => array(   
                esc_html__('No', 'tourpacker') => 'no',  
                esc_html__('Yes', 'tourpacker') => 'yes',                                                                                
                ),
        "description" => esc_html__("Select Fullwidth or not", 'tourpacker'),      
      ) 
    );
  vc_add_param('vc_row',array(
        "type" => "dropdown",
        "heading" => esc_html__('Show or not Show Div Overlay', 'tourpacker'),
        "param_name" => "overlay_div",
        "value" => array(   
                esc_html__('Not Show', 'tourpacker') => 'no',  
                esc_html__('Show', 'tourpacker') => 'yes',                                                                                
                ),
        "description" => esc_html__("Select Show Div Overlay or not", 'tourpacker'),      
      ) 
    );
  vc_add_param('vc_row',array(
        "type" => "attach_image",
        "heading" => esc_html__('Background Image', 'tourpacker'),
        "param_name" => "bg_image_custom",
        "description" => esc_html__("Select Fullwidth or not", 'tourpacker'),      
      ) 
    );
}




/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'tourpacker_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function tourpacker_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(   
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(            'name'               => esc_html__('WPBakery Visual Composer','tourpacker'), // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
    array(
            'name'               => esc_html__('tourpacker Common','tourpacker'),// The plugin name.
            'slug'               => 'tourpacker-common', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/tourpacker-common.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
    array(
            'name'      => esc_html__('One Click Demo Import', 'tourpacker'),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ),

    array(
            'name'               => esc_html__('Wp Full Stripe Free','tourpacker'), // The plugin name.
            'slug'               => 'wp-full-stripe-free', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/wp-full-stripe-free.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
    array(
        'name'      => esc_html__('Contact Form 7','tourpacker'),
        'slug'      => 'contact-form-7',
        'required'  => true,
    ),
    
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'tourpacker' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'tourpacker' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'tourpacker' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'tourpacker' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tourpacker' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tourpacker' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tourpacker' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tourpacker' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'tourpacker' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'tourpacker' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'tourpacker' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}

function tourpacker_import_files() {
    return array(
        array(
            'import_file_name'           => 'Demo Import Tourpacker',
            'import_file_url'            => 'http://themetrademark.com/import/tourpacker/tourpacker_sample_data.xml',
            'import_widget_file_url'     => 'http://themetrademark.com/import/tourpacker/widgets.json',
            'import_notice'              => esc_html__( 'Import data example Tourpacker', 'tourpacker' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'tourpacker_import_files' );



function tourpacker_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Menu All Page', 'primary' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home 01' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'tourpacker_after_import_setup' );

/* add admin-ajax */
function tourpacker_custom_head(){
    echo '<script type="text/javascript">var ajaxurl = \'' . admin_url('admin-ajax.php') . '\';</script>';
}
add_action('wp_head', 'tourpacker_custom_head');

// Ajax Search
add_action( 'wp_ajax_nopriv_result_list_word_ajax', 'result_list_word_ajax' );
add_action( 'wp_ajax_result_list_word_ajax', 'result_list_word_ajax' );
function result_list_word_ajax() { 
    $theme_option = get_option('theme_option');
    $ajax_word = (isset($_GET['ajax_search_for'])) ? $_GET['ajax_search_for'] : 0;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;     
    $args = array (
      'post_type'      => 'tour',
      'post_status'    => 'publish',
      's'              => $ajax_word,
      'paged'      => $paged,
      'posts_per_page'  =>  -1,
    );
    $wp_query = new WP_Query( $args );
    $i=0;
    if($wp_query->have_posts()):
      while ( $wp_query->have_posts()) : $wp_query->the_post();


      $params = array( 'width' => 297, 'height' => 198 );
          $images_tour_search = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
          $tour_single_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
          $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

      $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
        $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
        $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
        $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
        $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

        $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
        $tour_medium_round = round ( $tour_medium, 2 );

    ?>
      <div class="package-list-item clearfix">
        <div class="image">
          <img src="<?php echo esc_url($images_tour_search); ?>" alt="<?php the_title(); ?>" />
          <div class="absolute-in-image">
            <div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
          </div>
        </div>
        
        <div class="content">
          <h5><?php the_title(); ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
          <div class="row gap-10">
            <div class="col-sm-12 col-md-9">
              
              <p class="line18"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true ); ?></p>
              
              <ul class="list-info">
                <li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600"><?php echo esc_html__( 'Countries:', 'tourpacker' ); ?> </span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Starting Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Ending Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?></li>
              </ul>
              
            </div>
            <div class="col-sm-12 col-md-3 text-right text-left-sm">
              
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
                </div>
              </div>
              
              <div class="hidden price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
              
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'view', 'tourpacker' ); ?></a>
              
            </div>
          </div>
        </div>
        
      </div>
    <?php $i++;
    endwhile;endif;wp_reset_postdata();
    if($i==0){
    ?>
    <div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Query That You Want Search', 'tourpacker'); ?></div>
    <?php 
    }   
 // IMPORTANT: don't forget to "exit"
 exit();
}

// result ajax search
add_action( 'wp_ajax_nopriv_result_result_list_ajax', 'result_list_ajax' );
add_action( 'wp_ajax_result_list_ajax', 'result_list_ajax' );
function result_list_ajax() { 
    $theme_option = get_option('theme_option');

    $destination_hidden = (isset($_GET['ajax_destination'])) ? $_GET['ajax_destination'] : 0;
    $filter_month_search = (isset($_GET['ajax_month'])) ? $_GET['ajax_month'] : 0;
    $filter_year_search = (isset($_GET['ajax_year'])) ? $_GET['ajax_year'] : 0;


    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;     
    $args = array (
      'post_type'      => 'tour',
      'post_status'    => 'publish',
      'paged'      => $paged,
      'posts_per_page'  =>  -1,
    );
    $wp_query = new WP_Query( $args );
    $i=0;
    if($wp_query->have_posts()):
      while ( $wp_query->have_posts()) : $wp_query->the_post();


      $params = array( 'width' => 297, 'height' => 198 );
          $images_tour_search = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
          $tour_single_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
          $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

      $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
        $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
        $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
        $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
        $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

        $tour_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country',true);

        $month_time = get_post_meta( get_the_ID(), '_cmb_tour_single_time',true);
        $months_time = substr($month_time,0,2);
        $year_time = substr($month_time,6,4);

        $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
        $tour_medium_round = round ( $tour_medium, 2 );


    if( ( strpos( $filter_month_search , $months_time) !== false && strpos( $filter_year_search , $year_time) !== false ) || strpos( $filter_month_search , '00') !== false || strpos( $filter_year_search , '00') !== false
      || (strpos( $filter_month_search , $months_time) !== false && $filter_year_search == '' ) 
      || (strpos( $filter_year_search , $year_time) !== false && $filter_month_search == '' ) || strpos( $destination_hidden , $tour_country) !== false || strpos( $destination_hidden , '00') !== false
      ){ 
    ?>
      <div class="package-list-item clearfix">
        <div class="image">
          <img src="<?php echo esc_url($images_tour_search); ?>" alt="<?php the_title(); ?>" />
          <div class="absolute-in-image">
            <div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
          </div>
        </div>
        
        <div class="content">
          <h5><?php the_title(); ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
          <div class="row gap-10">
            <div class="col-sm-12 col-md-9">
              
              <p class="line18"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true ); ?></p>
              
              <ul class="list-info">
                <li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600"><?php echo esc_html__( 'Countries:', 'tourpacker' ); ?> </span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Starting Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Ending Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?></li>
              </ul>
              
            </div>
            <div class="col-sm-12 col-md-3 text-right text-left-sm">
              
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
                </div>
              </div>
              
              <div class="hidden price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
              
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'view', 'tourpacker' ); ?></a>
              
            </div>
          </div>
        </div>
        
      </div>
    <?php 
     $i++;}

    endwhile;endif;wp_reset_postdata();
    if($i==0){
    ?>
    <div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Query That You Want Search', 'tourpacker'); ?></div>
    <?php 
    }   
 // IMPORTANT: don't forget to "exit"
 exit();
}



// result ajax search for Price
add_action( 'wp_ajax_nopriv_result_list_filter_ajax', 'result_list_filter_ajax' );
add_action( 'wp_ajax_result_list_filter_ajax', 'result_list_filter_ajax' );
function result_list_filter_ajax() { 
    $theme_option = get_option('theme_option');
    
    $ajax_price = (isset($_GET['ajax_search_for_price'])) ? $_GET['ajax_search_for_price'] : 0;
    $ajax_price_array = explode(';', $ajax_price);
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;     
    $args = array (
      'post_type'      => 'tour',
      'post_status'    => 'publish',
      'paged'      => $paged,
      'posts_per_page'  =>  -1,
    );
    $wp_query = new WP_Query( $args );
    $i=0;
    if($wp_query->have_posts()):
      while ( $wp_query->have_posts()) : $wp_query->the_post();


      $params = array( 'width' => 297, 'height' => 198 );
          $images_tour_search = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
          $tour_single_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
          $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

      $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
        $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
        $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
        $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
        $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

        $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
        $tour_medium_round = round ( $tour_medium, 2 );
    if( ( $tour_related_number_price >= $ajax_price_array[0] ) && ( $tour_related_number_price <= $ajax_price_array[1] )  ){
     
    ?>
      <div class="package-list-item clearfix">
        <div class="image">
          <img src="<?php echo esc_url($images_tour_search); ?>" alt="<?php the_title(); ?>" />
          <div class="absolute-in-image">
            <div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
          </div>
        </div>
        
        <div class="content">
          <h5><?php the_title(); ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
          <div class="row gap-10">
            <div class="col-sm-12 col-md-9">
              
              <p class="line18"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true ); ?></p>
              
              <ul class="list-info">
                <li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600"><?php echo esc_html__( 'Countries:', 'tourpacker' ); ?> </span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Starting Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Ending Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?></li>
              </ul>
              
            </div>
            <div class="col-sm-12 col-md-3 text-right text-left-sm">
              
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
                </div>
              </div>
              
              <div class="hidden price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
              
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'view', 'tourpacker' ); ?></a>
              
            </div>
          </div>
        </div>
        
      </div>
    <?php $i++;
    }endwhile;endif;wp_reset_postdata();
    if($i==0){
    ?>
    <div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Query That You Want Search', 'tourpacker'); ?></div>
    <?php 
    }   
 // IMPORTANT: don't forget to "exit"
 exit();
}

// result ajax search checkbox
add_action( 'wp_ajax_nopriv_result_list_checkbox_ajax', 'result_list_checkbox_ajax' );
add_action( 'wp_ajax_result_list_checkbox_ajax', 'result_list_checkbox_ajax' );
function result_list_checkbox_ajax() { 
    $theme_option = get_option('theme_option');
    
    $ajax_search_for_start = (isset($_GET['ajax_search_for_start'])) ? $_GET['ajax_search_for_start'] : 0;
    $ajax_search_for_end = (isset($_GET['ajax_search_for_end'])) ? $_GET['ajax_search_for_end'] : 0;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;     
    $args = array (
      'post_type'      => 'tour',
      'post_status'    => 'publish',
      'paged'      => $paged,
      'posts_per_page'  =>  -1,
    );
    $wp_query = new WP_Query( $args );
    $i=0;
    if($wp_query->have_posts()):
      while ( $wp_query->have_posts()) : $wp_query->the_post();


      $params = array( 'width' => 297, 'height' => 198 );
          $images_tour_search = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
          $tour_single_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
          $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

          $info_start = get_post_meta(get_the_ID(),'_cmb_tour_info_start',true);
          $info_end = get_post_meta(get_the_ID(),'_cmb_tour_info_end',true);

      $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
        $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
        $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
        $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
        $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

        $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
        $tour_medium_round = round ( $tour_medium, 2 );
    if( strpos( $ajax_search_for_start , $info_start) !== false || strpos( $ajax_search_for_end , $info_end) !== false ){

    ?>
      <div class="package-list-item clearfix">
        <div class="image">
          <img src="<?php echo esc_url($images_tour_search); ?>" alt="<?php the_title(); ?>" />
          <div class="absolute-in-image">
            <div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
          </div>
        </div>
        
        <div class="content">
          <h5><?php the_title(); ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
          <div class="row gap-10">
            <div class="col-sm-12 col-md-9">
              
              <p class="line18"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true ); ?></p>
              
              <ul class="list-info">
                <li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600"><?php echo esc_html__( 'Countries:', 'tourpacker' ); ?> </span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Starting Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?></li>
                <li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Ending Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?></li>
              </ul>
              
            </div>
            <div class="col-sm-12 col-md-3 text-right text-left-sm">
              
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
                </div>
              </div>
              
              <div class="hidden price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
              
              <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'view', 'tourpacker' ); ?></a>
              
            </div>
          </div>
        </div>
        
      </div>

    <?php $i++;
    }
    endwhile;endif;wp_reset_postdata();
    if($i==0){
    ?>
    <div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Query That You Want Search', 'tourpacker'); ?></div>
    <?php 
    }  
 // IMPORTANT: don't forget to "exit"
 exit();
}


// result Single tour
add_action( 'wp_ajax_nopriv_result_single_tour', 'result_single_tour' );
add_action( 'wp_ajax_result_single_tour', 'result_single_tour' );
function result_single_tour() { 
    $theme_option = get_option('theme_option');
    
    $num_id = (isset($_GET['tour_ajax_id'])) ? $_GET['tour_ajax_id'] : 0;
    $args = array( 
        'post_type'      => 'tour',
      'p'  => $num_id,
    );
    $numMonth = (isset($_GET['ajax_months'])) ? $_GET['ajax_months'] : 0;

    if( $numMonth != '' ){
    $filter_month = implode(', ',$numMonth);
    }else{
      $filter_month = 0;
    }
    $wp_query = new WP_Query( $args );
    $i=0;
    if($wp_query->have_posts()):
        while ( $wp_query->have_posts()) : $wp_query->the_post();
          $entries = get_post_meta( get_the_ID(), '_cmb_tour_departures_group', true );
          
          foreach ( (array) $entries as $key => $entry ) {

              $tour_departures_sold_out = $tour_departures_book = $tour_departures_start = $tour_departures_end = $tour_departures_location = $tour_departures_price = '';

              if ( isset( $entry['tour_departures_start'] ) )
                  $tour_departures_start = esc_html( $entry['tour_departures_start'] );

              if ( isset( $entry['tour_departures_end'] ) )
                  $tour_departures_end = esc_html( $entry['tour_departures_end'] );

              if ( isset( $entry['tour_departures_location'] ) )
                  $tour_departures_location = esc_html( $entry['tour_departures_location'] );

              if ( isset( $entry['tour_departures_price'] ) )
                  $tour_departures_price = esc_html( $entry['tour_departures_price'] );

              if ( isset( $entry['tour_departures_book'] ) )
                  $tour_departures_book = esc_html( $entry['tour_departures_book'] );

              if ( isset( $entry['tour_departures_sold_out'] ) )
                  $tour_departures_sold_out = esc_html( $entry['tour_departures_sold_out'] );
              // Do something with the data      
              $month_departures = substr($tour_departures_start,0,2);
              $month_departures_end = substr($tour_departures_end,0,2);
              if(strpos( $filter_month , $month_departures) !== false || strpos( $filter_month , $month_departures_end) !== false || $filter_month == 0 ){ 
        ?>    
      <form action="<?php echo esc_attr($theme_option['payment_page']); ?>" method="POST">
        <li class="availabily-content <?php if($tour_departures_sold_out == 'sold'){echo 'sold-out';}else{} ?> clearfix">
          
          <div class="date-from">
            <span class="availabily-heading-label">start:</span>
            <?php echo date("l", strtotime($tour_departures_start)); ?>
            <span><?php echo esc_attr($tour_departures_start); ?></span>
          </div>
          
          <div class="date-to">
            <span class="availabily-heading-label">end:</span>
            <?php echo date("l", strtotime($tour_departures_end)); ?>
            <span><?php echo esc_attr($tour_departures_end); ?></span>
          </div>
          
          <div class="status">
            <span class="availabily-heading-label">status:</span>
            <?php echo htmlspecialchars_decode($tour_departures_location); ?>
          </div>
          
          <div class="hidden price">
            <span class="availabily-heading-label">price:</span>
            <span>$<?php echo esc_attr($tour_departures_price); ?></span>
          </div>
          
          <div class="action">
            <button type="submit" class="btn btn-primary btn-sm btn-inverse"><?php echo esc_attr($tour_departures_book); ?></button>
            <input type="hidden" name="book_price" value="<?php echo esc_attr($tour_departures_price); ?>" />
            <input type="hidden" name="book_currency" value="<?php echo esc_attr($theme_option['payment_setting_currency']); ?>" />
            <input type="hidden" name="book_start_day" value="<?php echo esc_attr($tour_departures_start); ?>" />
            <input type="hidden" name="book_end_day" value="<?php echo esc_attr($tour_departures_end); ?>" />
            <input type="hidden" name="book_title_tour" value="<?php the_title(); ?>" />
            <input type="hidden" name="book_id_tour" value="<?php echo get_queried_object_id(); ?>" />
            <input type="hidden" name="book_duration" value="<?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true ); ?>" />
            <input type="hidden" name="book_start_address" value="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>" />
            <input type="hidden" name="book_end_address" value="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>" />
          </div>   
        </li>
      </form>
        <?php $i++; 
         }wp_reset_postdata(); ?>
         
        <?php 
      
    }

        endwhile;
    endif;
    if($i == 0) {
    ?>
    <div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Month That You Want Search', 'tourpacker'); ?></div>
    <?php
    }
 // IMPORTANT: don't forget to "exit"
 exit();
}


function ajax_action_stuff() {
  $ajax_order_title     = $_GET['ajax_order_title'];
  $ajax_order_duration     = $_GET['ajax_order_duration'];
  $ajax_order_buyer_first_name = $_GET['ajax_order_buyer_first_name'];
  $ajax_order_buyer_last_name = $_GET['ajax_order_buyer_last_name'];
  $ajax_order_departure_date = $_GET['ajax_order_departure_date'];
  $ajax_order_start_in = $_GET['ajax_order_start_in'];
  $ajax_order_end_in = $_GET['ajax_order_end_in'];
  $ajax_order_price = $_GET['ajax_order_price'];
  $ajax_order_currency = $_GET['ajax_order_currency'];
  $ajax_order_id = $_GET['ajax_order_id'];

  //$userinfo    = $data['userinfo'];  
  //$orderid = $data['orderid'];
 var_dump($data);
  global $wpdb;

  $wpdb->query('CREATE TABLE IF NOT EXISTS `tour_payments` (
            `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `buyer_name` TEXT NOT NULL,
            `buyer_email` TEXT NOT NULL,
            `departure_date` TEXT NOT NULL, 
            `start_in` TEXT NOT NULL, 
            `end_in` TEXT NOT NULL, 
            `price` TEXT NOT NULL,
            `currency` TEXT NOT NULL,
            `status` TEXT NOT NULL,                    
            `order_id` TEXT NOT NULL,
            `transaction_id` TEXT NOT NULL,
            `sumary` TEXT NOT NULL,
            
            `created` INT( 4 ) UNSIGNED NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;');

$price_plan_information = array(
    'buyer_name' => esc_attr($ajax_order_buyer_first_name) ." ". esc_attr($ajax_order_buyer_last_name),
    'buyer_email' => '',
    'departure_date' => esc_attr($ajax_order_departure_date),
    'start_in' => esc_attr($ajax_order_start_in),
    'end_in' => esc_attr($ajax_order_end_in),
    'price'       => esc_attr($ajax_order_price),
    'currency'    => esc_attr($ajax_order_currency),
    'status'      => 'Pending',    
    'order_id'    => esc_attr($ajax_order_id),
    'transaction_id'  => '',
    'sumary'      => esc_attr($ajax_order_title) ." ". esc_attr($ajax_order_duration),
    
    'created'     => time()
    );

  $insert_format = array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s','%s');
  $wpdb->insert('tour_payments', $price_plan_information, $insert_format);


  //echo 'true';
  die(); // stop executing script
}
add_action( 'wp_ajax_ajax_action_stuff', 'ajax_action_stuff' ); // ajax for logged in users
add_action( 'wp_ajax_nopriv_ajax_action_stuff', 'ajax_action_stuff' );

?>