<?php 
// Tour HIGHLIGHTS
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Highlights", 'tourpacker'),
    "base"     => "tour_highlights",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Title of Section", 'tourpacker'),
            "param_name"  => "tour_highlights_title",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Images Background', 'js_composer' ),
            'param_name'  => 'tour_highlights_images',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library. ( 417 x 260 px )', 'js_composer' )
        ), 
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Content of Section.", 'tourpacker'),
            "param_name"  => "tour_highlights_content",
            "value"       => "",
            "description" => esc_html__("Content of Section.", 'tourpacker')
        ), 
        
    )));
}
// Tour Gallery
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Gallery", 'tourpacker'),
    "base"     => "tour_gallery",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Title of Section", 'tourpacker'),
            "param_name"  => "tour_gallery_title",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
        array(
            'type'        => 'attach_images',
            'heading'     => esc_html__( 'Images For Gallery in Single Tour', 'js_composer' ),
            'param_name'  => 'tour_gallery_images',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
    )));
}

// Tour Infomation
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Infomation", 'tourpacker'),
    "base"     => "tour_infomation",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Duration", 'tourpacker'),
            "param_name"  => "tour_info_durations",
            "value"       => "",
            "description" => esc_html__("Ex: Duration:", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Countries", 'tourpacker'),
            "param_name"  => "tour_info_countrys",
            "value"       => "",
            "description" => esc_html__("Ex: Countries: (1)", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Experiences", 'tourpacker'),
            "param_name"  => "tour_info_experiencess",
            "value"       => "",
            "description" => esc_html__("Ex: Experiences:", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Ages", 'tourpacker'),
            "param_name"  => "tour_info_ages",
            "value"       => "",
            "description" => esc_html__("Ex: Ages:", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Starting Point", 'tourpacker'),
            "param_name"  => "tour_info_starts",
            "value"       => "",
            "description" => esc_html__("Ex: Starting Point:", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Ending Point", 'tourpacker'),
            "param_name"  => "tour_info_ends",
            "value"       => "",
            "description" => esc_html__("Ex: Ending Point:", 'tourpacker')
        ),
    )));
}

// Tour Introduction
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Introduction", 'tourpacker'),
    "base"     => "tour_introduction",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Introduction", 'tourpacker'),
            "param_name"  => "tour_introduction_title",
            "value"       => "",
            "description" => esc_html__("Ex: Introduction", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Content", 'tourpacker'),
            "param_name"  => "tour_introduction_content",
            "value"       => "",
            "description" => esc_html__("Ex: She literature discovered increasing how diminution understood. Though and highly the enough county for man. Of it up he still court alone widow seems. Suspected he remainder rapturous my sweetness. All vanity regard sudden nor simple can. World mrs and vexed china since after often.", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Day", 'tourpacker'),
            "param_name"  => "tour_info_experiencess",
            "value"       => "",
            "description" => esc_html__("Ex: Day", 'tourpacker')
        ),
    )));
}
// Tour Itinerary Day
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Itinerary Day ", 'tourpacker'),
    "base"     => "tour_itinerary_day",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Open or Close item.', 'js_composer' ),
            'param_name' => 'tour_itinerary_day_address',
            'value' => array(
            esc_html__( '', 'js_composer' )   => '',
            esc_html__( 'Open', 'js_composer' )   => 'open',
            esc_html__( 'Center', 'js_composer' ) => 'center',
            esc_html__( 'Close', 'js_composer' )  => 'close',
            ),
            'description' => esc_html__( 'Select field do you want Show.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Number of Day", 'tourpacker'),
            "param_name"  => "tour_itinerary_day_number",
            "value"       => "",
            "description" => esc_html__("Ex: 1", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title", 'tourpacker'),
            "param_name"  => "tour_itinerary_day_title",
            "value"       => "",
            "description" => esc_html__("Ex: Visit: Dubrovnik", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Content", 'tourpacker'),
            "param_name"  => "tour_itinerary_day_content",
            "value"       => "",
            "description" => esc_html__("Ex: Ecstatic advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages so impression. Almost unable put piqued talked likely houses her met. Met any nor may through resolve entered. An mr cause tried oh do shade happy.", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Name Hotel", 'tourpacker'),
            "param_name"  => "tour_itinerary_day_hotel",
            "value"       => "",
            "description" => esc_html__("Ex: stay at Hilton Hotel", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Time Stay", 'tourpacker'),
            "param_name"  => "tour_itinerary_day_time",
            "value"       => "",
            "description" => esc_html__("Ex: trip time: 8am - 4.30pm", 'tourpacker')
        ),
    )));
}
// TOUR ACCOMMODATION
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Accommodation", 'tourpacker'),
    "base"     => "tour_accommodation",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Images Accommodation of Hotel ', 'js_composer' ),
            'param_name'  => 'tour_accommodation_img',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library. ( 277 x 184 px )', 'js_composer' )
        ), 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title.", 'tourpacker'),
            "param_name"  => "tour_accommodation_title",
            "value"       => "",
            "description" => esc_html__("EX: Beach Hilton Hotel.", 'tourpacker')
        ),  
    )));
}

// TOUR included
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Included", 'tourpacker'),
    "base"     => "tour_included",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title.", 'tourpacker'),
            "param_name"  => "tour_included_title",
            "value"       => "",
            "description" => esc_html__("EX: Guide.", 'tourpacker')
        ), 
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Subtitle Of Element", 'tourpacker'),
            "param_name"  => "tour_included_subtitle",
            "value"       => "",
            "description" => esc_html__("Subtitle Of Element", 'tourpacker')
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Open or Close item.', 'js_composer' ),
            'param_name' => 'tour_included_section',
            'value' => array(
            esc_html__( '', 'js_composer' )   => '',
            esc_html__( 'Open', 'js_composer' )   => 'open',
            esc_html__( 'Center', 'js_composer' ) => 'center',
            esc_html__( 'Close', 'js_composer' )  => 'close',
            ),
            'description' => esc_html__( 'Select field do you want Show.', 'js_composer' )
        ), 
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style of Included.', 'js_composer' ),
            'param_name' => 'tour_included_style',
            'value' => array(
            esc_html__( '', 'js_composer' )   => '',
            esc_html__( 'Full', 'js_composer' )   => 'full',
            esc_html__( '3 Column', 'js_composer' ) => 'third',
            ),
            'description' => esc_html__( 'Select field do you want Show.Just use for Open Element.', 'js_composer' )
        ), 
    )));
}
// Tour Departures
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Departures", 'tourpacker'),
    "base"     => "tour_departures",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title.", 'tourpacker'),
            "param_name"  => "tour_departures_title",
            "value"       => "",
            "description" => esc_html__("EX: AVAILABILITY.", 'tourpacker')
        ), 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text start.", 'tourpacker'),
            "param_name"  => "tour_departures_start",
            "value"       => "",
            "description" => esc_html__("EX: start.", 'tourpacker')
        ), 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text end.", 'tourpacker'),
            "param_name"  => "tour_departures_end",
            "value"       => "",
            "description" => esc_html__("EX: end.", 'tourpacker')
        ), 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text status.", 'tourpacker'),
            "param_name"  => "tour_departures_status",
            "value"       => "",
            "description" => esc_html__("EX: status.", 'tourpacker')
        ), 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text price.", 'tourpacker'),
            "param_name"  => "tour_departures_price",
            "value"       => "",
            "description" => esc_html__("EX: price.", 'tourpacker')
        ), 
    )));
}
//Portfolio Style
if(function_exists('vc_map')){
   vc_map( array(
   "name" => esc_html__("VG Similar Packages ", 'tourpacker'),
   "base" => "similar_packages",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array( 
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Number Tour Releated you want show.", 'tourpacker'),
            "param_name"  => "similar_packages_number",
            "value"       => "",
            "description" => esc_html__("EX: 3.", 'tourpacker')
        ),    
        array(
         'type' => 'dropdown',
         'heading' => __( 'Sort Order by', 'js_composer' ),
         'param_name' => 'similar_packages_order_by',
         'value' => array(
            esc_html__( 'None  ', 'js_composer' ) => '',
            esc_html__( 'Random : Random order.', 'js_composer' ) => 'rand',
            esc_html__( 'Title : Order by title', 'js_composer' ) => 'title',
            esc_html__( 'Name: Post name', 'js_composer' ) => 'name',
            esc_html__( 'Author : Order by author', 'js_composer' ) => 'author',
            esc_html__( 'Date: Order by date', 'js_composer' ) => 'date',
         ),
         'description' => esc_html__( 'Select field do you want Order by.', 'js_composer' )
      ),

        array(
         'type' => 'dropdown',
         'heading' => __( 'Sort Order', 'js_composer' ),
         'param_name' => 'similar_packages_order',
         'value' => array(
            esc_html__( 'None  ', 'js_composer' ) => '',
            esc_html__( 'ASC : lowest to highest', 'js_composer' ) => 'ASC',
            esc_html__( 'DESC : highest to lowest', 'js_composer' ) => 'DESC',
         ),
         'description' => esc_html__( 'Select field do you want Order.', 'js_composer' )
      ),
      
    )));
}
// Tour Heading Information
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour Heading Information", 'tourpacker'),
    "base"     => "tour_heading_info",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title.", 'tourpacker'),
            "param_name"  => "tour_heading_info_title",
            "value"       => "",
            "description" => esc_html__("EX: Heading Information 1.", 'tourpacker')
        ), 
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Content.", 'tourpacker'),
            "param_name"  => "tour_heading_info_content",
            "value"       => "",
            "description" => esc_html__("EX: <p>No in he real went find mr. Wandered or strictly raillery stanhill as. Jennings appetite disposed me an at subjects an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now how nay cold real case.</p>.", 'tourpacker')
        ), 
         
    )));
}
// Tour FAQ
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Tour FAQ ", 'tourpacker'),
    "base"     => "tour_faq",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Open or Close item.', 'js_composer' ),
            'param_name' => 'tour_faq_address',
            'value' => array(
            esc_html__( '', 'js_composer' )   => '',
            esc_html__( 'Open', 'js_composer' )   => 'open',
            esc_html__( 'Center', 'js_composer' ) => 'center',
            esc_html__( 'Close', 'js_composer' )  => 'close',
            ),
            'description' => esc_html__( 'Select field do you want Show.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title", 'tourpacker'),
            "param_name"  => "tour_faq_title",
            "value"       => "",
            "description" => esc_html__("Ex: Visit: Dubrovnik", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Content", 'tourpacker'),
            "param_name"  => "tour_faq_content",
            "value"       => "",
            "description" => esc_html__("Ex: Ecstatic advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages so impression. Almost unable put piqued talked likely houses her met. Met any nor may through resolve entered. An mr cause tried oh do shade happy.", 'tourpacker')
        ),
        
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Number ID of Tab", 'tourpacker'),
            "param_name"  => "tour_faq_id",
            "value"       => "",
            "description" => esc_html__("Ex: one. Another section must diffirent", 'tourpacker')
        ),
    )));
}
// Title and Subtitle
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Title and Subtitle ", 'tourpacker'),
    "base"     => "title_and_subtitle",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Title", 'tourpacker'),
            "param_name"  => "title_and_subtitle_title",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Subtitle.", 'tourpacker'),
            "param_name"  => "title_and_subtitle_subtitle",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
    )));
}

// Search Tour
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Form Search Tour ", 'tourpacker'),
    "base"     => "form_search_tour",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Button Search.", 'tourpacker'),
            "param_name"  => "form_search_tour_text_button",
            "value"       => "",
            "description" => esc_html__("Ex: Search", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link Page Search.", 'tourpacker'),
            "param_name"  => "form_search_tour_link_search",
            "value"       => "",
            "description" => esc_html__("Choose page search With Name: Result List Search Home.Ex: http://localhost/tourpacker/?page_id=115", 'tourpacker')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Show Right Left Or Center Home Background.', 'js_composer' ),
            'param_name' => 'special_tour_location_bg',
            'value' => array(
                esc_html__( 'None  ', 'js_composer' ) => '',
                esc_html__( 'Center', 'js_composer' ) => 'center',
                esc_html__( 'Right', 'js_composer' ) => 'right',
                esc_html__( 'Left', 'js_composer' ) => 'left',
             ),
            'description' => esc_html__( 'Select field do you want Order.', 'js_composer' )
          ),
    )));
}
//featured_count
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Featured Count ", 'tourpacker'),
    "base"     => "featured_count",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "featured_count_title",
            "value"       => "",
            "description" => esc_html__("Ex: 300+ Destinations", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Subtitle of section.", 'tourpacker'),
            "param_name"  => "featured_count_subtitle",
            "value"       => "",
            "description" => esc_html__("Ex: Tastes giving in passed direct me valley supply.", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Class Icon.", 'tourpacker'),
            "param_name"  => "featured_count_icon",
            "value"       => "",
            "description" => esc_html__("View Class at here: http://themes-pixeden.com/font-demos/7-stroke/index.html.Ex: pe-7s-map-marker", 'tourpacker')
        ),
    )));
}
//top_destinations
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Top Destinations ", 'tourpacker'),
    "base"     => "top_destinations",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("The ID of The Tour That You want Show.", 'tourpacker'),
            "param_name"  => "top_destinations_id",
            "value"       => "",
            "description" => esc_html__("Ex: 29,57,71,73", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "top_destinations_title",
            "value"       => "",
            "description" => esc_html__("Ex: TOP DESTINATIONS.", 'tourpacker')
        ),
    )));
}

//SPECIAL PACKAGES
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Special Tour Packer ", 'tourpacker'),
    "base"     => "special_tour",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("The ID of The Tour That You want Show.", 'tourpacker'),
            "param_name"  => "special_tour_id",
            "value"       => "",
            "description" => esc_html__("Ex: 29,57,71,73", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "special_tour_title",
            "value"       => "",
            "description" => esc_html__("Ex: Special Packages.", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Subtitle of section.", 'tourpacker'),
            "param_name"  => "special_tour_subtitle",
            "value"       => "",
            "description" => esc_html__("Ex: Of distrusts immediate enjoyment curiosity do. Marianne numerous saw thoughts the humoured..", 'tourpacker')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Sort Order by', 'js_composer' ),
            'param_name' => 'special_tour_oderby',
            'value' => array(
                esc_html__( 'None  ', 'js_composer' ) => '',
                esc_html__( 'Random : Random order.', 'js_composer' ) => 'rand',
                esc_html__( 'Title : Order by title', 'js_composer' ) => 'title',
                esc_html__( 'Name: Post name', 'js_composer' ) => 'name',
                esc_html__( 'Author : Order by author', 'js_composer' ) => 'author',
                esc_html__( 'Date: Order by date', 'js_composer' ) => 'date',
             ),
            'description' => esc_html__( 'Select field do you want Order by.', 'js_composer' )
          ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Sort Order', 'js_composer' ),
            'param_name' => 'special_tour_order',
            'value' => array(
                esc_html__( 'None  ', 'js_composer' ) => '',
                esc_html__( 'ASC : lowest to highest', 'js_composer' ) => 'ASC',
                esc_html__( 'DESC : highest to lowest', 'js_composer' ) => 'DESC',
             ),
            'description' => esc_html__( 'Select field do you want Order.', 'js_composer' )
          ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Show Number Column That You want.', 'js_composer' ),
            'param_name' => 'special_tour_column',
            'value' => array(
                esc_html__( 'None  ', 'js_composer' ) => '',
                esc_html__( '3 Columns', 'js_composer' ) => 'three_column',
                esc_html__( '4 Columns', 'js_composer' ) => 'four_column',
             ),
            'description' => esc_html__( 'Select field do you want Order.', 'js_composer' )
          ),
    )));
}
//featured_item
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Featured Item ", 'tourpacker'),
    "base"     => "featured_item",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "featured_item_title",
            "value"       => "",
            "description" => esc_html__("Ex: Experts On Tour", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Subtitle of section.", 'tourpacker'),
            "param_name"  => "featured_item_subtitle",
            "value"       => "",
            "description" => esc_html__("Ex: Blind would equal while oh mr lain led and fact none. One preferred sportsmen resolving the happiness continued. High at of in loud rich true.", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Class Icon.", 'tourpacker'),
            "param_name"  => "featured_item_icon",
            "value"       => "",
            "description" => esc_html__("View Class at here: http://themes-pixeden.com/font-demos/7-stroke/index.html.Ex: pe-7s-users ", 'tourpacker')
        ),
    )));
}
//Testimonials
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Testimonials", 'tourpacker'),
    "base"     => "testimonials",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(       
        
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Images Testimonial', 'js_composer' ),
            'param_name'  => 'images_testimonial',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Name", 'tourpacker'),
            "param_name"  => "name_testimonial",
            "value"       => "",
            "description" => esc_html__("Name Testimonial", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Country of Testimonial", 'tourpacker'),
            "param_name"  => "country_testimonial",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Content", 'tourpacker'),
            "param_name"  => "content_testimonial",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
    )));
}
// instagram
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Instagram", 'tourpacker'),
    "base"     => "instagram",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(       
        array(
         'type' => 'textfield',
         'heading' => __( 'AccessToken Instagram', 'js_composer' ),
         'param_name' => 'access_instagram',
         'value' => "",
         'description' => esc_html__( 'Enter AccessToken Instagram  ex: 735306460.4814dd1.03c1d131c1df4bfea491b3d7006be5e0  Get in http://instagram.pixelunion.net/', 'js_composer' ),
      ),
        
        array(
         'type' => 'textfield',
         'heading' => __( 'UserID Instagram', 'js_composer' ),
         'param_name' => 'userid_instagram',
         'value' => "",
         'description' => esc_html__( 'Enter UserID Instagram  ex: 302604202  Get in http://jelled.com/instagram/lookup-user-id ', 'js_composer' ),
         
      ),
         array(
         'type' => 'textfield',
         'heading' => __( 'Number show', 'js_composer' ),
         'param_name' => 'number_instagram',
         'value' => '',
         'description' => esc_html__( 'Choose number show. Ex: 20', 'js_composer' )
      ),
    )));
}
//singup_newsletter
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Singup Newsletter ", 'tourpacker'),
    "base"     => "singup_newsletter",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "singup_newsletter_title",
            "value"       => "",
            "description" => esc_html__("Ex: Signup for Newsletter", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Subtitle of section.", 'tourpacker'),
            "param_name"  => "singup_newsletter_subtitle",
            "value"       => "",
            "description" => esc_html__("Ex: Affronting everything discretion men now own did. Still round match we to. Frankness pronounce daughters remainder extensive has but.", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Class Icon.", 'tourpacker'),
            "param_name"  => "singup_newsletter_icon",
            "value"       => "",
            "description" => esc_html__("View Class at here: http://themes-pixeden.com/font-demos/7-stroke/index.html.Ex: pe-7s-users ", 'tourpacker')
        ),
    )));
}
// Background Slider
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Background Slider", 'tourpacker'),
    "base"     => "background_slider",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            'type'        => 'attach_images',
            'heading'     => esc_html__( 'Images', 'js_composer' ),
            'param_name'  => 'background_slider_img',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
    )));
}
// Videos 
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Video Background ", 'tourpacker'),
    "base"     => "video_background",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link your Video on localhost.", 'tourpacker'),
            "param_name"  => "video_link",
            "value"       => "",
            "description" => esc_html__("Ex: https://www.youtube.com/embed/L2g33QQoFOw", 'tourpacker')
        ),
    )));
}
//element_breadcrumb
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Element Breadcrumb ", 'tourpacker'),
    "base"     => "element_breadcrumb",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title of section.", 'tourpacker'),
            "param_name"  => "element_breadcrumb_title",
            "value"       => "",
            "description" => esc_html__("Ex: About Us", 'tourpacker')
        ),
        
    )));
}
// Team Item
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Team Item", 'tourpacker'),
    "base"     => "team_item",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(       
        
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Images Team', 'js_composer' ),
            'param_name'  => 'images_team_item',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Name", 'tourpacker'),
            "param_name"  => "name_team_item",
            "value"       => "",
            "description" => esc_html__("Name Testimonial", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Job of Team", 'tourpacker'),
            "param_name"  => "job_team_item",
            "value"       => "",
            "description" => esc_html__("", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link Social Facebook", 'tourpacker'),
            "param_name"  => "team_item_fb",
            "value"       => "",
            "description" => esc_html__("EX: #", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link Social twitter", 'tourpacker'),
            "param_name"  => "team_item_tw",
            "value"       => "",
            "description" => esc_html__("EX: #", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link Social google-plus", 'tourpacker'),
            "param_name"  => "team_item_gg",
            "value"       => "",
            "description" => esc_html__("EX: #", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Link Social instagram", 'tourpacker'),
            "param_name"  => "team_item_ig",
            "value"       => "",
            "description" => esc_html__("EX: #", 'tourpacker')
        ),
    )));
}

// Logo Images
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Images For Logo", 'tourpacker'),
    "base"     => "logo_images",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            'type'        => 'attach_images',
            'heading'     => esc_html__( 'Images', 'js_composer' ),
            'param_name'  => 'images_logo',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
    )));
}
//GMap
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Custom Map", 'tourpacker'),
    "base"     => "custom_map",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image Place 1 for Gmap', 'js_composer' ),
            'param_name'  => 'image_gmap_place1',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image Place 2 for Gmap', 'js_composer' ),
            'param_name'  => 'image_gmap_place2',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image Place 3 for Gmap', 'js_composer' ),
            'param_name'  => 'image_gmap_place3',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Adrees Center.Check it here: http://www.latlong.net/", 'tourpacker'),
            "param_name"  => "address_gmap_center",
            "value"       => "",
            "description" => esc_html__("Ex: 25.2048, 55.2708 ", 'tourpacker')
        ),
          

    )));
}
// List Gmap
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG List Map", 'tourpacker'),
    "base"     => "list_gmap",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Number Place on List Gmap. Begin from 1.", 'tourpacker'),
            "param_name"  => "place_gmap",
            "value"       => "",
            "description" => esc_html__("Ex: 1", 'tourpacker')
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image map Marker for List Gmap', 'js_composer' ),
            'param_name'  => 'image_marker_list_gmap',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image Thumbnail for List Gmap', 'js_composer' ),
            'param_name'  => 'image_thumbnail_list_gmap',
            'value'       => '',
            'description' => esc_html__( 'Select images from media library.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Latitude on List Gmap", 'tourpacker'),
            "param_name"  => "latitude_gmap",
            "value"       => "",
            "description" => esc_html__("Check at here: http://www.latlong.net/.Ex: 25.276987", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Longitude on List Gmap", 'tourpacker'),
            "param_name"  => "longitude_gmap",
            "value"       => "",
            "description" => esc_html__("Check at here: http://www.latlong.net/.Ex: 55.2708", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Adrees on List Gmap", 'tourpacker'),
            "param_name"  => "address_gmap",
            "value"       => "",
            "description" => esc_html__("Ex: Dubai, UAE ", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Text Title On List Gmap and Map", 'tourpacker'),
            "param_name"  => "title_gmap",
            "value"       => "",
            "description" => esc_html__("Ex:Headquarter @ Dubai, UAE ", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Specific Adrees of you.", 'tourpacker'),
            "param_name"  => "specific_gmap",
            "value"       => "",
            "description" => esc_html__("Ex: 545, Marina Rd., Mohammed Bin Rashid Boulevard, Dubai 123234,", 'tourpacker')
        ),
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Number Phone of your Country", 'tourpacker'),
            "param_name"  => "phone_gmap",
            "value"       => "",
            "description" => esc_html__("Ex: + 971 4 436 4784", 'tourpacker')
        ),   
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Email Of Your Country", 'tourpacker'),
            "param_name"  => "email_gmap",
            "value"       => "",
            "description" => esc_html__("Ex: dubai-support@tourpacker.com", 'tourpacker')
        ), 
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Open or Close item.', 'js_composer' ),
            'param_name' => 'list_gmap_location',
            'value' => array(
            esc_html__( '', 'js_composer' )   => '',
            esc_html__( 'Open', 'js_composer' )   => 'open',
            esc_html__( 'Center', 'js_composer' ) => 'center',
            esc_html__( 'Close', 'js_composer' )  => 'close',
            ),
            'description' => esc_html__( 'Select field do you want Show.', 'js_composer' )
        ),         

    )));
}
// Let Social
if(function_exists('vc_map')){
    vc_map( array(
    "name"     => esc_html__("VG Let Social", 'tourpacker'),
    "base"     => "let_social",
    "class"    => "",
    "icon"     => "icon-st",
    "category" => 'Content',
    "params"   => array(
        
        array(
            "type"        => "textfield",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Let's Social Title", 'tourpacker'),
            "param_name"  => "let_social_title",
            "value"       => "",
            "description" => esc_html__("Ex: Let's Social", 'tourpacker')
        ),
        array(
            "type"        => "textarea",
            "holder"      => "div",
            "class"       => "",
            "heading"     => esc_html__("Let's Social Subtitle", 'tourpacker'),
            "param_name"  => "let_social_subtitle",
            "value"       => "",
            "description" => esc_html__("Ex: May indulgence difficulty ham can put especially. Bringing remember for supplied her why was confined. Middleton principle did she procuring extensive believing add. Weather adapted prepare oh is calling.", 'tourpacker')
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'let_social_group',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter Class of your Social',
                    'param_name' => 'let_social_class',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter Text When hover Social',
                    'param_name' => 'let_social_hover',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter Link of your Social',
                    'param_name' => 'let_social_link',
                )
            )
        )

    )));
}
