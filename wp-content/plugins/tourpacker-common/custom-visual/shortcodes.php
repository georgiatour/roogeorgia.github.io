<?php

// tour_highlights
add_shortcode('tour_highlights', 'tour_highlights_func');
function tour_highlights_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_highlights_title'       => '',
        'tour_highlights_images'      => '',
        'tour_highlights_content'     => '',
    ), $atts));
    ob_start(); 

    $tour_highlights_img = wp_get_attachment_image_src($tour_highlights_images,'');
?>                          
  <div class="section-title text-left">
    <h4><?php echo esc_attr($tour_highlights_title); ?></h4>
  </div>
  
  <img src="<?php echo esc_url($tour_highlights_img[0]); ?>" alt="Map" class="map-route" />
  <?php echo htmlspecialchars_decode($tour_highlights_content); ?>

<?php  
    return ob_get_clean();
}

// tour_gallery
add_shortcode('tour_gallery', 'tour_gallery_func');
function tour_gallery_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_gallery_title'        =>    '',
        'tour_gallery_images'        =>    '',
    ), $atts));
    ob_start(); 
?>  
  <div class="section-title text-left">
    <h4><?php echo esc_attr($tour_gallery_title); ?></h4>
  </div>

  <div class="slick-gallery-slideshow">

    <div class="slider gallery-slideshow">
  <?php 
      $img_ids = explode(",",$tour_gallery_images);
      foreach( $img_ids AS $img_id ){
          $image_src = wp_get_attachment_image_src($img_id,'');
          $params = array( 'width' => 833, 'height' => 463 );
          $image = bfi_thumb( $image_src [0], $params ); 
      ?>
      <div><div class="image"><img src="<?php echo esc_url($image) ?>" alt="" /></div></div>
  <?php }?>
    </div>
    <div class="slider gallery-nav">
  <?php 
      $img_ids = explode(",",$tour_gallery_images);
      foreach( $img_ids AS $img_id ){
          $image_src = wp_get_attachment_image_src($img_id,'');
          $params = array( 'width' => 103, 'height' => 57 );
          $image = bfi_thumb( $image_src [0], $params ); 
      ?>  
      <div><div class="image"><img src="<?php echo esc_url($image) ?>" alt="" /></div></div>
  <?php }?>
    </div>
    
  </div>


<?php  return ob_get_clean();
} 

// tour_infomation
add_shortcode('tour_infomation', 'tour_infomation_func');
function tour_infomation_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_info_durations'       => '',
        'tour_info_countrys'      => '',
        'tour_info_experiencess'     => '',
        'tour_info_ages'       => '',
        'tour_info_starts'      => '',
        'tour_info_ends'     => '',
    ), $atts));
    ob_start(); 

$tour_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
$tour_info_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country', true );
$tour_info_experiences = get_post_meta( get_the_ID(), '_cmb_tour_info_experiences', true );
$tour_info_age = get_post_meta( get_the_ID(), '_cmb_tour_info_age', true );
$tour_info_start = get_post_meta( get_the_ID(), '_cmb_tour_info_start', true );
$tour_info_end = get_post_meta( get_the_ID(), '_cmb_tour_info_end', true );

?>                          
<ul class="list-info no-icon bb-dotted">
  <li><span class="font600"><?php echo esc_attr($tour_info_durations); ?> </span><?php echo esc_attr($tour_info_duration); ?></li>
  <li><span class="font600"><?php echo esc_attr($tour_info_countrys); ?></span> <?php echo esc_attr($tour_info_country); ?></li>
  <li><span class="font600"><?php echo esc_attr($tour_info_experiencess); ?></span> <?php echo esc_attr($tour_info_experiences); ?></li>
  <li><span class="font600"><?php echo esc_attr($tour_info_ages); ?></span> <?php echo esc_attr($tour_info_age); ?></li>
  <li><span class="font600"><?php echo esc_attr($tour_info_starts); ?></span> <?php echo esc_attr($tour_info_start); ?></li>
  <li><span class="font600"><?php echo esc_attr($tour_info_ends); ?></span> <?php echo esc_attr($tour_info_end); ?></li>
</ul>
<?php  
    return ob_get_clean();
}

// tour_infomation
add_shortcode('tour_introduction', 'tour_introduction_func');
function tour_introduction_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_introduction_title'       => '',
        'tour_introduction_content'      => '',
        'tour_info_experiencess'     => '',
    ), $atts));
    ob_start(); 

?>     
<div class="itinerary-item intro-item">
  <h5><?php echo esc_attr($tour_introduction_title); ?></h5>
<div class="intro-item-body">
  <p><?php echo esc_attr($tour_introduction_content); ?></p>
  
</div>
</div>

<div class="itinerary-day-label font600 uppercase"><span><?php echo esc_attr($tour_info_experiencess); ?></span></div>

<?php  
    return ob_get_clean();
}

// tour_itinerary_day
add_shortcode('tour_itinerary_day', 'tour_itinerary_day_func');
function tour_itinerary_day_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_itinerary_day_number'       => '',
        'tour_itinerary_day_title'      => '',
        'tour_itinerary_day_content'      => '',
        'tour_itinerary_day_address'      => '',
        'tour_itinerary_day_hotel'      => '',
        'tour_itinerary_day_time'      => '',

    ), $atts));
    ob_start(); 
    if($tour_itinerary_day_address == 'open'):
?>
<div class="itinerary-item-wrapper">
  <div class="panel-group bootstarp-toggle">
<?php 
    endif;
?>
<div class="panel itinerary-item">
  <div class="panel-heading">
    <h5 class="panel-title">
      <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-<?php echo esc_attr($tour_itinerary_day_number); ?>"><span class="absolute-day-number"><?php echo esc_attr($tour_itinerary_day_number); ?></span> <?php echo esc_attr($tour_itinerary_day_title); ?></a>
    </h5>
  </div>
  <div id="bootstarp-toggle-<?php echo esc_attr($tour_itinerary_day_number); ?>" class="panel-collapse collapse">
    <div class="panel-body">
    
      <p><?php echo esc_attr($tour_itinerary_day_content); ?></p>
      
      <ul class="itinerary-meta clearfix">
        <li><i class="fa fa-building-o"></i> <?php echo esc_attr($tour_itinerary_day_hotel); ?></li>
        <li><i class="fa fa-clock-o"></i> <?php echo esc_attr($tour_itinerary_day_time); ?></li>
      </ul>
      
    </div>
  </div>

</div>
<!-- end of panel -->
<?php
    if($tour_itinerary_day_address == 'close'):
?>
  </div>
</div>
<?php 
    endif;
?>
<?php  
    return ob_get_clean();
}
//tour_accommodation
add_shortcode('tour_accommodation', 'tour_accommodation_func');
function tour_accommodation_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_accommodation_img'       => '',
        'tour_accommodation_title'      => '',
    ), $atts));
    ob_start(); 

    $tour_accommodation_img = wp_get_attachment_image_src($tour_accommodation_img,'');
?>       
<div class="hotel-item mb-1">
  <a href="#">
    <div class="image">
      <img src="<?php echo esc_url($tour_accommodation_img[0]); ?>" alt="Hotel" />
    </div>
    <div class="content">
      <h6><?php echo esc_attr($tour_accommodation_title); ?></h6>
    </div>
  </a>
</div>
<?php  
    return ob_get_clean();
}
//tour_included
add_shortcode('tour_included', 'tour_included_func');
function tour_included_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_included_title'       => '',
        'tour_included_subtitle'      => '',
        'tour_included_section'      => '',
        'tour_included_style'       => '',
    ), $atts));
    ob_start(); 
    if($tour_included_section == 'open'):
      if($tour_included_style == 'full'){
?>
<ul class="list-with-icon with-heading">
<?php 
}elseif($tour_included_style == 'third'){ ?>
<ul class="list-with-icon col-3 clearfix">
<?php }
    endif;
?>
  <li>
    <i class="fa fa-check-circle text-primary"></i>
    <?php if($tour_included_title != ''){ ?>
    <h6 class="heading mt-0"><?php echo esc_attr($tour_included_title); ?></h6>
    <?php }else{} ?>
    <p><?php 
    $tour_included_subtitle_tag = array(
          'br'      => array(),
          'a'       => array(
            'href'  => array(),
            ),
          );
         echo wp_kses($tour_included_subtitle , $tour_included_subtitle_tag );
    ?></p>
  </li>
<?php
    if($tour_included_section == 'close'):
?>
</ul>
<?php 
    endif;
?>
<?php  
    return ob_get_clean();
}
//tour_departures
add_shortcode('tour_departures', 'tour_departures_func');
function tour_departures_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_departures_title'       => '',
        'tour_departures_start'       => '',
        'tour_departures_end'       => '',
        'tour_departures_status'       => '',
        'tour_departures_price'       => '',
    ), $atts));
    ob_start(); 
    $theme_option = get_option('theme_option');
?>
<div class="section-title text-left">
  <h4><?php echo esc_attr($tour_departures_title); ?></h4>
</div>

<div class="row mb-20">
  <div class="col-sm-6">
    <div class="form-group form-icon">
      <i class="fa fa-calendar"></i>
      <select id="month_cus" name="month" class="select2-multi form-control" data-placeholder="Choose a Departure Month" multiple>
        <option value="">Choose a Departure Month</option>
        <option value="0">Any Departure Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      
    </div>
    <button class="btn month-search"><?php echo esc_html__('Search','tourpacker'); ?></button>
  </div>
</div>
<input type="hidden" id="tour_single_id" value="<?php echo get_the_ID(); ?>" />
<script>
jQuery(function($){
    $(document).ready(function(){
      var $content = $("body #div1");
        $("button.month-search").click(function(){
            var before_month = $('#month_cus').val();
            var tour_id = $('#tour_single_id').val();
            $( "#div1" ).empty();
            $.ajax({
              type:"GET",
              url: ajaxurl,
              data: {
                  'action':'result_single_tour',
                  'ajax_months' : before_month, 
                  'tour_ajax_id' : tour_id, 
              },
              dataType: "html",
              beforeSend: function(){
                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
                },                          
              success: function(data){
                $data = $(data);
                $content.append($data);
                $data.fadeIn( 7000,'linear', function(){
                            $(".ajax-loading-wrapper").remove();                            
                            loading = true;
                        });                
                $("#div1").html(data);
            }});
        });
    });
    });
</script>
<div class="availabily-wrapper">
  <ul class="availabily-list">    
    <li class="availabily-heading clearfix">    
      <div class="date-from">
        <?php echo esc_attr($tour_departures_start); ?>
      </div>      
      <div class="date-to">
        <?php echo esc_attr($tour_departures_end); ?>
      </div>      
      <div class="status">
        <?php echo esc_attr($tour_departures_status); ?>
      </div>      
      <div class="price">
        <?php echo esc_attr($tour_departures_price); ?>
      </div>      
      <div class="action">
        &nbsp;
      </div>
    
    </li>
    <div id="div1">
    <?php 
      $entries = get_post_meta( get_the_ID(), '_cmb_tour_departures_group', true );
      if(isset($entries) && $entries != ''){

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
          $month_departures = substr($entry['tour_departures_start'],0,2); 
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
      
      <div class="price">
        <span class="availabily-heading-label">price:</span>
        <span><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_departures_price); ?></span>
      </div>
      
      <div class="action">
        <button type="submit" class="btn btn-primary btn-sm btn-inverse"><?php echo esc_attr($tour_departures_book); ?></button>
        <input type="hidden" name="book_price" value="<?php echo esc_attr($tour_departures_price); ?>" />
        <input type="hidden" name="book_currency" value="<?php echo esc_attr($theme_option['payment_setting_currency']); ?>" />
        <input type="hidden" name="book_start_day" value="<?php echo esc_attr($tour_departures_start); ?>" />
        <input type="hidden" name="book_end_day" value="<?php echo esc_attr($tour_departures_end); ?>" />
        <input type="hidden" name="book_title_tour" value="<?php the_title(); ?>" />
        <input type="hidden" name="book_id_tour" value="<?php echo uniqid(); ?>" />
        <input type="hidden" name="book_duration" value="<?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true ); ?>" />
        <input type="hidden" name="book_start_address" value="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>" />
        <input type="hidden" name="book_end_address" value="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>" />
      </div>    
    </li>
  </form>
    <?php } 
  }
  ?>
    
    </div>    
  </ul>
  
</div>

<div class="text-center mt-30">

  <button class="btn btn-primary"><?php echo esc_html__('Show more departures','tourpacker');?></button>
</div>
<?php  
    return ob_get_clean();
}
add_shortcode('similar_packages', 'similar_packages_func');
function similar_packages_func($atts, $content = null){
  extract(shortcode_atts(array(
    'similar_packages_order_by'         => '',
    'similar_packages_order'            => '',
    'similar_packages_number'           => '',
  ), $atts));
  ob_start(); 
  $theme_option = get_option('theme_option');
  ?>                
  <div class="section-title text-left">
    <h4>Similar Packages</h4>
  </div>
  
  <div class="GridLex-gap-20-wrappper package-grid-item-wrapper on-page-result-page alt-smaller">
    <div class="GridLex-grid-noGutter-equalHeight">
     <?php 
      $custom_taxterms = wp_get_object_terms( get_the_id(), 'skills', array('fields' => 'ids') );
      $args = array(
        'post_type' => 'tour',
        'order'     =>  $similar_packages_order,
        'posts_per_page' => $similar_packages_number,
        'orderby'   => $similar_packages_order_by,
        'tax_query' => array(
            array(
                'taxonomy' => 'skills',
                'field' => 'id',
                'terms' => $custom_taxterms
            )
        ),
        'post__not_in' => array (get_the_id()),
      );
      $related_items = new WP_Query( $args );
      if ($related_items->have_posts()) :                                         
      while ( $related_items->have_posts() ) : $related_items->the_post();
        $params = array( 'width' => 264, 'height' => 176 );
        $images_related = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
        $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );
        $tour_related_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );

        $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
        $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
        $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
        $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
        $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);
        $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
    $tour_medium_round = round ( $tour_medium, 2 );

      ?>     
    
      <div class="GridLex-col-4_sm-4_xs-12 mb-20">
        <div class="package-grid-item"> 
          <a href="<?php the_permalink(); ?>">
            <div class="image">
              <img src="<?php echo esc_url($images_related); ?>" alt="<?php the_title(); ?>" />
              <div class="absolute-in-image">
                <div class="duration"><span><?php echo esc_attr($tour_related_duration); ?></span></div>
              </div>
            </div>
            <div class="content clearfix">
              <h6><?php the_title(); ?></h6>
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> review</span>
                </div>
              </div>
              <div class="absolute-in-content">
                <span class="btn"><i class="fa fa-heart-o"></i></span>
                <div class="price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?><?php echo esc_attr($tour_related_number_price);?></div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <?php endwhile; endif;wp_reset_postdata(); ?>
    </div>

  </div>
               
   
<?php  return ob_get_clean();
}
// Tour Heading Information
add_shortcode('tour_heading_info', 'tour_heading_info_func');
function tour_heading_info_func($atts, $content = null){
  extract(shortcode_atts(array(
    'tour_heading_info_title'         => '',
    'tour_heading_info_content'            => '',
  ), $atts));
  ob_start(); 
  ?>                
  <div class="read-more-div" data-collapsed-height="107">
  
    <div class="read-more-div-inner">
    
      <h5 class="heading mt-0"><?php echo esc_attr($tour_heading_info_title); ?></h5>
      <?php echo htmlspecialchars_decode($tour_heading_info_content); ?>
    </div>
    
  </div>
<?php  return ob_get_clean();
}
// Tour FAQ
add_shortcode('tour_faq', 'tour_faq_func');
function tour_faq_func($atts, $content = null){
    extract(shortcode_atts(array(
        'tour_faq_address'       => '',
        'tour_faq_title'      => '',
        'tour_faq_content'      => '',
        'tour_faq_id'      => '',
    ), $atts));
    ob_start(); 
    if($tour_faq_address == 'open'):
?>
<div class="panel-group bootstarp-accordion" id="accordion" role="tablist" aria-multiselectable="true">
<?php 
    endif;
?>
<div class="panel">
  <div class="panel-heading" role="tab" id="heading<?php echo esc_attr($tour_faq_id); ?>">
    <h6 class="panel-title">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo esc_attr($tour_faq_id); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr($tour_faq_id); ?>"> <?php echo esc_attr($tour_faq_title); ?></a>
    </h6>
  </div>
  <div id="collapse<?php echo esc_attr($tour_faq_id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo esc_attr($tour_faq_id); ?>">
    <div class="panel-body">
      <div class="faq-thread">
        <?php echo htmlspecialchars_decode($tour_faq_content); ?>
      </div>
    </div>
  </div>
</div>
<?php
    if($tour_faq_address == 'close'):
?>
</div>
<?php 
    endif;
?>
<?php  
    return ob_get_clean();
}

// Title and Subtitle
add_shortcode('title_and_subtitle', 'title_and_subtitle_func');
function title_and_subtitle_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title_and_subtitle_title'     =>  '',
        'title_and_subtitle_subtitle'    => '',
    ), $atts));
    ob_start(); 
?>
<h1 class="hero-title"><?php echo esc_attr($title_and_subtitle_title); ?></h1>
<p class="lead"><?php echo esc_attr($title_and_subtitle_subtitle); ?></p>
<?php  
    return ob_get_clean();
}

//form_search_tour
add_shortcode('form_search_tour', 'form_search_tour_func');
function form_search_tour_func($atts, $content = null){
    extract(shortcode_atts(array(
        'form_search_tour_text_button'     =>  '',
        'form_search_tour_link_search'    => '',
        'special_tour_location_bg'    => '',        
    ), $atts));
    ob_start(); 
if( $special_tour_location_bg == 'center'){    
?>
<div class="main-search-wrapper full-width">
          
  <div class="inner">
  <form class="paypal" action="<?php echo esc_attr($form_search_tour_link_search); ?>" method="post" target="_blank">
    <div class="column-item">
    
      <div class="form-group">
      
        <select name="tour_destination" id="destination_cus3" class="select2-multi form-control" data-placeholder="Choose a Destination" multiple >
          <option value="">Choose a Destination</option>
          <option value="00">Any Destination</option>
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
        <input type="hidden" name="destination_hidden3" id="destination_hidden3"/>
        <script>
        jQuery(function($){
          $(document).ready(function(){
            $("button.destination_home1").click(function(){
              document.getElementById("destination_hidden3").value = $('#destination_cus3').val();
              
            });
          });
          });
      </script>

      </div>
    
    </div>
    
    <div class="column-item">
    
      <div class="form-group">
      
        <select name="tour_month" id="month_cus_search3" class="select2-multi form-control" data-placeholder="Choose a Departure Month" multiple >
          <option value="">Choose a Departure Month</option>
          <option value="00">Any Departure Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <input type="hidden" name="month_hidden" id="month_hidden3"/>
        <script>jQuery(function($){
          $(document).ready(function(){
            $("button.destination_home1").click(function(){
              document.getElementById("month_hidden3").value = $('#month_cus_search3').val();
            });
          });
          });
        </script>
        
      </div>
    
    </div>
    
    <div class="column-item">
    
      <div class="form-group">

        <select name="tour_year" id="year_cus3" class="select2-multi form-control" data-placeholder="Choose a Departure Year" multiple >
          <option value="">Choose a Departure Year</option>
          <option value="00">Any Departure Year</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
        </select>
        <input type="hidden" name="year_hidden" id="year_hidden3"/>
        <script>
        jQuery(function($){
          $(document).ready(function(){
            $("button.destination_home1").click(function(){
              document.getElementById("year_hidden3").value = $('#year_cus3').val();
            });
          });
          });
        </script>
        
      </div>
    
    </div>
    
    <div class="column-item for-btn">
    
      <div class="form-group">
      
        <button type="submit" class="btn btn-primary btn-block destination_home1"><?php echo esc_attr($form_search_tour_text_button); ?></button>
        
      </div>
    
    </div>
    </form>    
  </div>
  
</div>
<?php }elseif( $special_tour_location_bg == 'right' || $special_tour_location_bg == 'left'){ ?>
<div class="flex-columns">
            
  <div class="main-search-wrapper <?php if($special_tour_location_bg == 'right'){?>at-right<?php }elseif($special_tour_location_bg == 'left'){ ?>at-left<?php } ?>">
    <div class="inner">
      <form class="paypal" action="<?php echo esc_attr($form_search_tour_link_search); ?>" method="post" target="_blank">
      <div class="column-item">
      
        <div class="form-group">
        
          <select name="tour_destination" id="destination_cus3" class="select2-single form-control" data-placeholder="Choose a Destination" multiple >
            <option value="">Choose a Destination</option>
            <option value="00">Any Destination</option>
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
          <input type="hidden" name="destination_hidden3" id="destination_hidden3"/>
          <script>
          jQuery(function($){
            $(document).ready(function(){
              $("button.destination_home1").click(function(){
                document.getElementById("destination_hidden3").value = $('#destination_cus3').val();
                
              });
            });
            });
        </script>

        </div>
      
      </div>
      
      <div class="column-item">
      
        <div class="form-group">
        
          <select name="tour_month" id="month_cus_search3" class="select2-single form-control" data-placeholder="Choose a Departure Month" multiple >
            <option value="">Choose a Departure Month</option>
            <option value="00">Any Departure Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
          <input type="hidden" name="month_hidden" id="month_hidden3"/>
          <script>jQuery(function($){
            $(document).ready(function(){
              $("button.destination_home1").click(function(){
                document.getElementById("month_hidden3").value = $('#month_cus_search3').val();
              });
            });
            });
          </script>
          
        </div>
      
      </div>
      
      <div class="column-item">
      
        <div class="form-group">

          <select name="tour_year" id="year_cus3" class="select2-single form-control" data-placeholder="Choose a Departure Year" multiple >
            <option value="">Choose a Departure Year</option>
            <option value="00">Any Departure Year</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
          </select>
          <input type="hidden" name="year_hidden" id="year_hidden3"/>
          <script>jQuery(function($){
            $(document).ready(function(){
              $("button.destination_home1").click(function(){
                document.getElementById("year_hidden3").value = $('#year_cus3').val();
              });
            });
            });
          </script>
          
        </div>
      
      </div>
      
      <div class="column-item for-btn">
      
        <div class="form-group">
        
          <button type="submit" class="btn btn-primary btn-block destination_home1"><?php echo esc_attr($form_search_tour_text_button); ?></button>
          
        </div>
      
      </div>
      </form> 
    </div>
  </div>

</div>
<?php } ?>
<?php  
    return ob_get_clean();
}

//featured_count
add_shortcode('featured_count', 'featured_count_func');
function featured_count_func($atts, $content = null){
    extract(shortcode_atts(array(
        'featured_count_title'     =>  '',
        'featured_count_subtitle'    => '',
        'featured_count_icon'    => '',
    ), $atts));
    ob_start(); 
?>
<div class="featured-count clearfix">
  <div class="icon"><i class="<?php echo esc_attr($featured_count_icon); ?>"></i></div>
  <div class="content">
    <h6><?php echo esc_attr($featured_count_title); ?></h6>
    <span><?php echo esc_attr($featured_count_subtitle); ?></span>
  </div>
</div>
<?php  
    return ob_get_clean();
}
//top_destinations
add_shortcode('top_destinations', 'top_destinations_func');
function top_destinations_func($atts, $content = null){
    extract(shortcode_atts(array(
        'top_destinations_id'     =>  '',
        'top_destinations_title'    => '',
    ), $atts));
    ob_start(); 
    $arr_id = explode(',' ,$top_destinations_id);
?>
<div class="row">
            
  <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    
    <div class="section-title">
    
      <h3><?php echo esc_attr($top_destinations_title); ?></h3>
      
    </div>
    
  </div>

</div>

<div class="grid destination-grid-wrapper">
<?php 
  $show_post = array(
    'post_type' => 'tour',
    'post__in'  => $arr_id,
    );
  $all_post = new WP_Query($show_post);
  $i=1;
  if($all_post->have_posts()) : while ( $all_post->have_posts() ) : $all_post->the_post();
  $params        = array( 'width' => 350, 'height' => 350 );
  $paintings_thumb         = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
  $tour_top_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );
  $theme_option = get_option('theme_option');
  if($i==1){
    $count_col = 10;
    $count_row = 10;
  }elseif($i==2){
    $count_col = 10;
    $count_row = 4;
  }elseif($i==3){
    $count_col = 5;
    $count_row = 6;
  }elseif($i==4){
    $count_col = 5;
    $count_row = 6;
  }
  
?>
  <div class="grid-item" data-colspan="<?php echo esc_attr($count_col);?>" data-rowspan="<?php echo esc_attr($count_row);?>">
    <a href="<?php the_permalink(); ?>" class="top-destination-image-bg" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');">
      <div class="relative">
        <h4><?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></h4>
        <span>Starting from <?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_top_number_price); ?></span>
      </div>
    </a>
  </div>
<?php $i++;
endwhile; endif;?>
</div>

<?php  
    return ob_get_clean();
}

//special_tour
add_shortcode('special_tour', 'special_tour_func');
function special_tour_func($atts, $content = null){
    extract(shortcode_atts(array(
        'special_tour_id'     =>  '',
        'special_tour_title'    => '',
        'special_tour_subtitle'    => '',
        'special_tour_oderby'    => '',
        'special_tour_order'    => '',
        'special_tour_column'   =>  '',
    ), $atts));
    ob_start(); 
    $special_id = explode(',' ,$special_tour_id);
?>
<div class="row">
            
  <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    
    <div class="section-title">
    
      <h3><?php echo esc_attr($special_tour_title); ?></h3>
      <p><?php echo esc_attr($special_tour_subtitle); ?></p>
      
    </div>
    
  </div>

</div>

<div class="GridLex-gap-30-wrappper package-grid-item-wrapper">
  
  <div class="GridLex-grid-noGutter-equalHeight">
  <?php 
    $show_post = array(
      'post_type' => 'tour',
      'post__in'  => $special_id,
      'posts_per_page'  => -1,
      'order' => $special_tour_order,
      'orderby' => $special_tour_oderby,
      );
    $all_post = new WP_Query($show_post);
    if($all_post->have_posts()) : while ( $all_post->have_posts() ) : $all_post->the_post();
    $params        = array( 'width' => 360, 'height' => 240 );
    $special_tour_thumb = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
    $tour_top_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );
    $theme_option = get_option('theme_option'); 

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
    <div class="<?php if( $special_tour_column == '' || $special_tour_column == 'three_column'){ ?>GridLex-col-4_sm-6_xs-12 mb-30<?php }elseif($special_tour_column == 'four_column' ){ ?> GridLex-col-3_sm-4_xs-6_xss-12 mb-20<?php } ?>">
      <div class="package-grid-item"> 
        <a href="<?php the_permalink(); ?>">
          <div class="image">
            <img src="<?php echo esc_url($special_tour_thumb); ?>" alt="<?php the_title(); ?>" />
            <div class="absolute-in-image">
              <div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
            </div>
          </div>
          <div class="content clearfix">
            <h5><?php the_title(); ?></h5>
            <div class="rating-wrapper">
              <div class="raty-wrapper">
                <div class="star-rating-read-only" data-rating-score="<?php echo round( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
              </div>
            </div>
            <div class="absolute-in-content">
              <span class="btn"><i class="fa fa-heart-o"></i></span>
              <div class="price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
            </div>
          </div>
        </a>
      </div>
    </div>    
  <?php endwhile; endif;?>
  </div>

</div>

<?php  
    return ob_get_clean();
}

//featured_item
add_shortcode('featured_item', 'featured_item_func');
function featured_item_func($atts, $content = null){
    extract(shortcode_atts(array(
        'featured_item_title'     =>  '',
        'featured_item_subtitle'    => '',
        'featured_item_icon'    => '',
    ), $atts));
    ob_start(); 
?>
<div class="featured-item">
              
  <h4><?php echo esc_attr($featured_item_title); ?></h4>
  
  <div class="content clearfix">
  
    <div class="icon">
      <i class="<?php echo esc_attr($featured_item_icon); ?>"></i>
    </div>
    
    <p><?php echo esc_attr($featured_item_subtitle); ?></p>
    
  </div>
</div>
<?php  
    return ob_get_clean();
}
//Testimonials
add_shortcode('testimonials', 'testimonials_func');
function testimonials_func($atts, $content = null){
    extract(shortcode_atts(array(
        'content_testimonial'   => '',
        'images_testimonial'    => '',
        'name_testimonial'      => '',
        'country_testimonial'       => '',
    ), $atts));
    ob_start(); 

    $photo_tes = wp_get_attachment_image_src($images_testimonial,'');

?>
<div class="testimonial-item clearfix">
  <div class="image">
    <img src="<?php echo esc_url($photo_tes[0]) ?>" />
  </div>
  <div class="content">
    <h4><?php echo esc_attr($name_testimonial); ?></h4>
    <h6><?php echo esc_attr($country_testimonial); ?></h6>
    <p><?php echo esc_attr($content_testimonial); ?></p>
  </div>
</div>

<?php  
    return ob_get_clean();
}
//instagram
add_shortcode('instagram', 'instagram_func');
function instagram_func($atts, $content = null){
    extract(shortcode_atts(array(
         'access_instagram'  =>  '',
         'userid_instagram'  => '',
         'number_instagram'  => '',
    ), $atts));
    ob_start(); 

?>
<div class="instagram-wrapper">
  <div id="instagram" class="instagram">
    <script type="text/javascript">
    jQuery(function($){
    function createPhotoElement(photo) {
      var innerHtml = $('<img>')
      .addClass('instagram-image')
      .attr('src', photo.images.thumbnail.url);

      innerHtml = $('<a>')
      .attr('target', '_blank')
      .attr('href', photo.link)
      .append(innerHtml);

      return $('<div>')
      .addClass('instagram-placeholder')
      .attr('id', photo.id)
      .append(innerHtml);
    }

    function didLoadInstagram(event, response) {
      var that = this;
      $.each(response.data, function(i, photo) {
      $(that).append(createPhotoElement(photo));
      });
    }

    $(document).ready(function() {
      
      $('#instagram').on('didLoadInstagram', didLoadInstagram);
      $('#instagram').instagram({
      count: <?php echo esc_attr($number_instagram);?>,
      userId: <?php echo esc_attr($userid_instagram);?>,
      accessToken: '<?php echo esc_attr($access_instagram);?>'
      });

    });
    });
    </script>
  </div>
</div>

<?php  
    return ob_get_clean();
}
//singup_newsletter
add_shortcode('singup_newsletter', 'singup_newsletter_func');
function singup_newsletter_func($atts, $content = null){
    extract(shortcode_atts(array(
        'singup_newsletter_title'     =>  '',
        'singup_newsletter_subtitle'    => '',
        'singup_newsletter_icon'    => '',
    ), $atts));
    ob_start(); 
?>
<div class="newsletter-text clearfix">
  <div class="icon">
    <i class="<?php echo esc_attr($singup_newsletter_icon); ?>"></i>
  </div>
  <div class="content">
    <h3><?php echo esc_attr($singup_newsletter_title); ?></h3>
    <p><?php echo esc_attr($singup_newsletter_subtitle); ?></p>
  </div>
</div>

<?php  
    return ob_get_clean();
}
//background_slider
add_shortcode('background_slider', 'background_slider_func');
function background_slider_func($atts, $content = null){
    extract(shortcode_atts(array(
        'background_slider_img'        =>    '',
    ), $atts));
    ob_start(); 
?>  
<div id="mainFlexSlider">
  <div class="flexslider">
    <ul class="slides">
    <?php 
      $img_ids = explode(",",$background_slider_img);
      foreach( $img_ids AS $img_id ){
          $image_src = wp_get_attachment_image_src($img_id,'');
    ?>
      <li class="slide">
        <div class="flexslider-image-bg" style="background: url(<?php echo esc_url($image_src[0]) ?>) center center no-repeat; background-size:cover"></div>
      </li><!-- slide1 end -->
    <?php }?>
    </ul><!-- slides end -->

    <div class="flexslider-overlay"></div>
    
  </div><!-- flexslider end -->
</div>
<script type="text/javascript">
jQuery(function($){
  $(document).ready(function(){

  $('#mainFlexSlider').flexslider(
    {
      animation: 'fade',
      slideshow: true,
      pauseOnHover: false,  
      controlNav: false,
      directionNav: false,
      slideshowSpeed: 4000, 
    }
  );

});
});
</script>
<?php  return ob_get_clean();
} 
// video_background
add_shortcode('video_background', 'video_background_func');
function video_background_func($atts, $content = null){
    extract(shortcode_atts(array(
        'video_link'        =>    '',
    ), $atts));
    ob_start(); 
?>  
<div class="youtube-overlay"></div>
        
<div class="top_box">
  <div id="player"></div>
</div>

<script type="text/javascript">
// YouTube ID
var bgID = ["hWo-43ObCP8","TnnV2_QTYl4","m3GXE8Hp8xk","nPOO1Coe2DI","Oo6iAxf4si0"];
</script>
<?php  return ob_get_clean();
} 
//element_breadcrumb
add_shortcode('element_breadcrumb', 'element_breadcrumb_func');
function element_breadcrumb_func($atts, $content = null){
    extract(shortcode_atts(array(
        'element_breadcrumb_title'     =>  '',
    ), $atts));
    ob_start(); 
?>
<div class="row">
          
  <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
  
    <h1 class="hero-title"><?php echo esc_attr($element_breadcrumb_title); ?></h1>
    
    <?php tourpacker_breadcrumbs(); ?>
    
  </div>
  
</div>

<?php  
    return ob_get_clean();
}
//team_item_func
add_shortcode('team_item', 'team_item_func');
function team_item_func($atts, $content = null){
    extract(shortcode_atts(array(
        'images_team_item'   => '',
        'name_team_item'    => '',
        'job_team_item'      => '',
        'team_item_fb'       => '',
        'team_item_tw'       => '',
        'team_item_gg'       => '',
        'team_item_ig'       => '',
    ), $atts));
    ob_start(); 

    $photo_team = wp_get_attachment_image_src($images_team_item,'');

?>
<div class="team-item">
                    
  <div class="image">
    <img src="<?php echo esc_url($photo_team[0]) ?>" alt="" class="img-circle" />
  </div>
  
  <div class="content">
  
    <h5 class="uppercase"><?php echo esc_attr($name_team_item); ?></h5>
    <p><?php echo esc_attr($job_team_item); ?></p>
    <ul class="social">
    <?php if( $team_item_fb != ''){ ?>
      <li><a href="<?php echo esc_url($team_item_fb); ?>"><i class="fa fa-facebook"></i></a></li>
    <?php }else{} ?>
    <?php if( $team_item_tw != ''){ ?>
      <li><a href="<?php echo esc_url($team_item_tw); ?>"><i class="fa fa-twitter"></i></a></li>
    <?php }else{} ?>
    <?php if( $team_item_gg != ''){ ?>
      <li><a href="<?php echo esc_url($team_item_gg); ?>"><i class="fa fa-google-plus"></i></a></li>
    <?php }else{} ?>
    <?php if( $team_item_ig != ''){ ?>
      <li><a href="<?php echo esc_url($team_item_ig); ?>"><i class="fa fa-instagram"></i></a></li>
    <?php }else{} ?>
    </ul>
    
  </div>
  
</div>

<?php  
    return ob_get_clean();
}
// Logo Images
add_shortcode('logo_images', 'logo_images_func');
function logo_images_func($atts, $content = null){
    extract(shortcode_atts(array(
        'images_logo'        =>    '',
    ), $atts));
    ob_start(); 
?>  
<div class="partner-image-item">
<?php 
    $img_ids = explode(",",$images_logo);
    foreach( $img_ids AS $img_id ){
        $image_src = wp_get_attachment_image_src($img_id,'');
        $params = array( 'width' => 162, 'height' => 70 );
        $image = bfi_thumb( $image_src [0], $params ); 
    ?>
    <img src="<?php echo esc_url($image) ?>" alt="" />
<?php }?>
</div>

<?php  return ob_get_clean();
} 
// Gmap 
add_shortcode('custom_map', 'custom_map_func');
function custom_map_func($atts, $content = null){
    extract(shortcode_atts(array(
        'image_gmap_place1'    => '',
        'image_gmap_place2'     => '',
        'image_gmap_place3'     => '',
        'address_gmap_center'     => '',

    ), $atts));
    ob_start(); 
    $photo_place1 = wp_get_attachment_image_src($image_gmap_place1,'');
    $photo_place2 = wp_get_attachment_image_src($image_gmap_place2,'');
    $photo_place3 = wp_get_attachment_image_src($image_gmap_place3,'');
?>
<div id="map_5" class="mapbox"></div>
<script type="text/javascript">
jQuery(function ($) {
      var mycolor = "#ff0066";
      var mycolor2 = "#966E7E";
      var mybg_color = "#F7F7F7";

      var cluster_styles = [{
          url: '<?php echo get_template_directory_uri(); ?>/images/m3.png',
          height: 30,
          width: 30,
          opt_textSize: 14,
          anchor: [3, 0],
          textColor: '#222222'
      }, {
          url: '<?php echo get_template_directory_uri(); ?>/images/m4.png',
          height: 40,
          width: 40,
          opt_textSize: 17,
          opt_anchor: [6, 0],
          opt_textColor: '#222222'
      }, {
          url: '<?php echo get_template_directory_uri(); ?>/images/m5.png',
          width: 50,
          height: 50,
          opt_textSize: 21,
          opt_anchor: [8, 0],
          opt_textColor: '#222222'
      }, {
          url: '<?php echo get_template_directory_uri(); ?>/images/m5.png',
          width: 50,
          height: 50,
          opt_textSize: 21,
          opt_anchor: [8, 0],
          opt_textColor: '#222222'
      }];

      var my_cat_style ={
      <?php if($image_gmap_place1 != ''){ ?>
        place1: { icon: '<?php echo esc_url($photo_place1[0]); ?>'},
      <?php }else{} ?>
      <?php if($image_gmap_place2 != ''){ ?>
        place2: { icon: '<?php echo esc_url($photo_place2[0]); ?>'},
      <?php }else{} ?>
      <?php if($image_gmap_place3 != ''){ ?>
        place3: { icon: '<?php echo esc_url($photo_place3[0]); ?>'},
      <?php }else{} ?>
      };
         
      var mapOptions = {
          zoom: 2,
          center: new google.maps.LatLng(<?php echo esc_attr($address_gmap_center); ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          panControl: false,
          rotateControl: false,
          streetViewControl: false,
          scrollwheel: false,
      };
      
      $("#map_5").mosne_map({
          elements: '#map_5_list .maplocation',
          cluster_styles: {
              zoomOnClick: true,
              maxZoom: 5,
              styles: cluster_styles,
          },
          cat_style: my_cat_style ,
          zoom: 2,
          clickedzoom: 2,   
          infowindows: false,   
          infobox: true,        
          map_opt: mapOptions,                
        
      }); 

});
</script>  

<?php  
    return ob_get_clean();
}
//list_gmap
add_shortcode('list_gmap', 'list_gmap_func');
function list_gmap_func($atts, $content = null){
    extract(shortcode_atts(array(
        'place_gmap'    => '',
        'image_marker_list_gmap'    => '',
        'image_thumbnail_list_gmap'     => '',
        'latitude_gmap'     => '',
        'longitude_gmap'     => '',
        'address_gmap'     => '',
        'title_gmap'     => '',
        'specific_gmap'     => '',
        'phone_gmap'     => '',
        'email_gmap'     => '',
        'list_gmap_location'     => '',

    ), $atts));
    ob_start(); 
    $photo_marker = wp_get_attachment_image_src($image_marker_list_gmap,'');
    $photo_thumbnail = wp_get_attachment_image_src($image_thumbnail_list_gmap,'');
    if($list_gmap_location == 'open'){
?>
<div class="container">
  <div class="map-contact">
                
    <div class="top-place-inner">
    
      <div id="map_5_list" class="list row gap-0">
  <?php }else{} ?>
        <div class="col-sm-4">
          <div class="maplocation map-top-destination-item" 
            data-name="<?php echo esc_attr($address_gmap) ?>"  
            data-lat="<?php echo esc_attr($latitude_gmap) ?>"
            data-cat="place<?php echo esc_attr($place_gmap) ?>"
            data-lng="<?php echo esc_attr($longitude_gmap) ?>">
            
            <div class="top-place-item mb-30 maplink">
              <div class="icon"><img src="<?php echo esc_url($photo_marker[0]); ?>" alt="" /></div>
              <div class="content">
                <h5 class="heading mt-0"><?php echo esc_attr($title_gmap) ?></h5>
                <ul class="address-list">
                  <li><i class="fa fa-map-marker"></i> <?php echo esc_attr($specific_gmap) ?></li>
                  <li><i class="fa fa-phone"></i> <?php echo esc_attr($phone_gmap) ?></li>
                  <li><i class="fa fa-envelope"></i> <?php echo esc_attr($email_gmap) ?></li>
                </ul>
              </div>
            </div>
            <div class="infobox">
              <div class="infobox-inner">
                <div class="image">
                  <img src="<?php echo esc_url($photo_thumbnail[0]); ?>" alt="" />
                </div>
                <div class="content">
                  <h6 class="heading"><?php echo esc_attr($title_gmap) ?></h6>
                  <ul class="address-list">
                  <li><i class="fa fa-map-marker"></i> <?php echo esc_attr($specific_gmap) ?></li>
                    <li><i class="fa fa-phone"></i> <?php echo esc_attr($phone_gmap) ?></li>
                    <li><i class="fa fa-envelope"></i> <?php echo esc_attr($email_gmap) ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php if($list_gmap_location == 'close'){ ?>
      </div>
    </div>
  </div>
</div>
<?php }else{} ?>
<?php  
    return ob_get_clean();
}
//let_social
add_shortcode('let_social', 'let_social_func');
function let_social_func($atts, $content = null){
    extract(shortcode_atts(array(
        'let_social_title'    => '',
        'let_social_subtitle'    => '',
        'let_social_group'     => '',
    ), $atts));
    ob_start(); 
    $let_social_groups = vc_param_group_parse_atts( $atts['let_social_group'] );
?>
<h5 class="heading mt-5"><?php echo esc_attr($let_social_title); ?></h5>
<p><?php echo esc_attr($let_social_subtitle); ?></p>

<div class="boxed-social mb-30-xs clearfix">
  <?php foreach ($let_social_groups as $let_key ) { ?>
  <a href="<?php echo esc_attr($let_key['let_social_link']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($let_key['let_social_hover']); ?>"><i class="fa <?php echo esc_attr($let_key['let_social_class']); ?>"></i></a>
  <?php } ?>
</div>
<?php  
    return ob_get_clean();
}

