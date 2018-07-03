<?php 
    // Get header layout
    get_header();
    $theme_option = get_option('theme_option');
if(have_posts()):
  while ( have_posts() ) : the_post();
    $tour_single_subtitle = get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true );
    $tour_single_bg = get_post_meta( get_the_ID(), '_cmb_tour_single_images_bg', true );
    $tour_single_number_days = get_post_meta( get_the_ID(), '_cmb_tour_single_number_days', true );
    $tour_single_number_nights = get_post_meta( get_the_ID(), '_cmb_tour_single_number_nights', true );
    $tour_single_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

    $tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
    $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
    $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
    $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
    $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

    $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
    $tour_medium_round = round ( $tour_medium, 2 );

    $tour_style_sidebar = get_post_meta( get_the_ID(), '_cmb_tour_single_sidebar_style', true );
?>
<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

  <!-- start end Page title -->
  <div class="page-title detail-page-title" <?php if(isset($tour_single_bg) && $tour_single_bg != ''){ ?>style="background-image:url('<?php echo esc_url($tour_single_bg); ?>');"<?php }else{} ?>>
    
    <div class="container">
    
      <div class="flex-row">
        
        <div class="flex-column flex-md-8 flex-sm-12">
          
          <h1 class="hero-title"><?php the_title(); ?></h1>
          <p class="line18"><?php echo esc_attr($tour_single_subtitle); ?></p>
          
          <ul class="list-col clearfix">
            <li class="rating-box">
              <div class="rating-wrapper">
                <div class="raty-wrapper">
                  <div class="star-rating-white" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> 
                  <span style="display: block;"> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
                </div>
              </div>
            </li>
            
            <li class="fav-box">
              <div class="meta">
                <span class="block"><button class="btn btn-fav"><i class="fa fa-heart-o"></i></button></span>
                <?php echo get_post_meta(get_the_ID(),'_cmb_tour_single_number_favorites',true); ?> 
              </div>
            </li>
            
            <li class="duration-box">
              <div class="meta">
              <?php
              $content_1 = array(
                'span'      => array(
                  'class' => array(),
                ),
                );
               echo wp_kses($tour_single_number_days , $content_1 ); ?>
              </div>
              <div class="meta">
                &amp;
              </div>
              <div class="meta">
                <?php
                $content_2 = array(
                  'span'      => array(
                  'class' => array(),
                  ),
                  );
                 echo wp_kses($tour_single_number_nights , $content_2 ); ?>
              </div>
            </li>
            
            <li class="hidden price-box">
              <div class="meta">
                <span class="block"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_single_number_price);?></span>
                <?php echo esc_html__( 'starting from', 'tourpacker' ); ?>
              </div>
            </li>
            
          </ul>
          
        </div>
        
        <div class="flex-column flex-md-4 flex-align-bottom flex-sm-12 mt-20-sm">
          <div class="text-right text-left-sm">
            <a href="#section-5" class="anchor btn btn-primary"><?php echo esc_html__('See dates &amp; Book Now','tourpacker'); ?></a>
          </div>
        </div>
      
      </div>

    </div>
    
  </div>
  <!-- end Page title -->
  
  <div class="breadcrumb-wrapper bg-light-2">
    
    <div class="container">
    
      <?php tourpacker_breadcrumbs(); ?>
      
    </div>
    
  </div>
  
  <div class="content-wrapper">
  
    <div class="container">
  
      <div class="row">
      <?php if($tour_style_sidebar == 'tour_right' || $tour_style_sidebar == ''){ ?>
        <div class="col-md-9" role="main">

          <div class="detail-content-wrapper">
            
              <?php the_content(); ?>             
              
              <div id="section-7" class="detail-content">
              
                <div class="section-title text-left">
                  <h4><?php echo esc_html__('Reviews','tourpacker'); ?></h4>
                </div>
                
                <div class="review-wrapper">
        
                  <div class="review-header">
                    <div class="row">
                    
                      <div class="col-sm-4 col-md-3">
                      
                        <div class="review-overall">
                        
                          <h5><?php echo esc_html__('Excellent','tourpacker'); ?></h5>
                          <p class="review-overall-point"><span><?php echo esc_attr($tour_medium_round); ?></span> / 5.0</p>
                          <p class="review-overall-recommend"><?php echo round ( $tour_medium*100/5, 0 ); ?><?php echo esc_html__('% recommend this package','tourpacker'); ?></p>
                        </div>
                      
                      </div>
                      
                      <div class="col-sm-8 col-md-9">
                        
                        <div class="review-overall-breakdown">

                          <div class="row gap-20">
                          
                            <div class="col-xss-12 col-xs-12 col-sm-7">
      
                              <h6><?php echo esc_html__('Score Breakdown','tourpacker'); ?></h6>
                              <ul class="breakdown-list">
                              
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="5.0"></div> <span>(<?php echo esc_html__('5','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_5); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="4.0"></div> <span>(<?php echo esc_html__('4','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_4); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="3.0"></div> <span>(<?php echo esc_html__('3','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_3); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="2.0"></div> <span>(<?php echo esc_html__('2','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_2); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="1.0"></div> <span>(<?php echo esc_html__('1','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_1); ?>)</div>
                                </li>
                                
                              </ul>

                            </div>
                            
                            <div class="col-xss-12 col-xs-7 col-sm-5 col-md-4 mt-30-xs">
                            
                              <h6><?php echo esc_html__('Average Rating For','tourpacker'); ?></h6>
                              <ul class="breakdown-list for-avg clearfix">
                                          
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_cleanliness',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_cleanliness_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_service',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_service_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_comfort',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_comfort_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_condition',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_condition_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_neighbourhood',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_neighbourhood_num',true); ?></span>
                                </li>
                              
                              </ul>
                              
                            </div>
                            
                          </div>
                          
                        
                        </div>
                      
                      </div>
                      
                    </div>
                  </div>
                  
                  <div class="hidden review-content">
                  
                    <div class="row gap-20">
                    
                      <div class="col-sm-6">
                        <h5><?php echo esc_html__('There are','tourpacker'); ?> <?php echo (($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1)); ?> <?php echo esc_html__('reviews','tourpacker'); ?></h5>
                      </div>
                      
                      <div class="col-sm-6 text-right text-left-xs">
                        <a href="#leave-comment" class="anchor btn btn-primary btn-inverse btn-sm"><?php echo esc_html__('Leave comments','tourpacker'); ?></a>
                      </div>
                    
                    </div>
                    
                    <?php comments_template('' , true); ?>                  
                    
                  </div>
                  
                </div>

              </div>
 
              
              <div class="call-to-action">
              
                <?php echo esc_html__('Question?','tourpacker'); ?> <a href="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_make_an_link',true); ?>" class="btn btn-primary btn-sm btn-inverse"><?php echo esc_html__('Make an inquiry','tourpacker'); ?></a> <?php echo esc_html__('or call','tourpacker'); ?> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_make_an',true); ?>
              
              </div>
                
            </div>
          
        </div>

        <div class="col-sm-3 hidden-sm hidden-xs">
        
          <div class="scrollspy-sidebar sidebar-detail" role="complementary">
          
            <ul class="scrollspy-sidenav">
            
              <li>
                <ul class="nav">
                <?php 
                $entries = get_post_meta( get_the_ID(), '_cmb_tour_right_section_group', true );
      
                foreach ( (array) $entries as $key => $entry ) {

                    $tour_right_section_text = $tour_right_section_link = '';

                    if ( isset( $entry['tour_right_section_text'] ) )
                        $tour_right_section_text = esc_html( $entry['tour_right_section_text'] );

                    if ( isset( $entry['tour_right_section_link'] ) )
                        $tour_right_section_link = esc_html( $entry['tour_right_section_link'] );
                    
                ?>
                  <li><a href="<?php echo esc_attr($tour_right_section_link); ?>" class="anchor"><?php echo esc_attr($tour_right_section_text) ?></a></li>
                <?php } ?>                  
                </ul>
              </li>

            </ul>
            
            <a data-toggle="modal" href="#changeSearchModal" class="btn btn-primary"><?php echo esc_html__('Change Search','tourpacker'); ?></a>

          </div>

        </div>
      <?php }elseif($tour_style_sidebar == 'tour_left'){ ?>
        <div class="col-sm-3 hidden-sm hidden-xs">
        
          <div class="scrollspy-sidebar sidebar-detail" role="complementary">
          
            <ul class="scrollspy-sidenav">
            
              <li>
                <ul class="nav">
                <?php 
                $entries = get_post_meta( get_the_ID(), '_cmb_tour_right_section_group', true );
      
                foreach ( (array) $entries as $key => $entry ) {

                    $tour_right_section_text = $tour_right_section_link = '';

                    if ( isset( $entry['tour_right_section_text'] ) )
                        $tour_right_section_text = esc_html( $entry['tour_right_section_text'] );

                    if ( isset( $entry['tour_right_section_link'] ) )
                        $tour_right_section_link = esc_html( $entry['tour_right_section_link'] );
                    
                ?>
                  <li><a href="<?php echo esc_attr($tour_right_section_link); ?>" class="anchor"><?php echo esc_attr($tour_right_section_text) ?></a></li>
                <?php } ?>                  
                </ul>
              </li>

            </ul>
            
            <a data-toggle="modal" href="#changeSearchModal" class="btn btn-primary"><?php echo esc_html__('Change Search','tourpacker'); ?></a>

          </div>

        </div>

        <div class="col-md-9" role="main">

          <div class="detail-content-wrapper">
            
              <?php the_content(); ?>             
              
              <div id="section-7" class="detail-content">
              
                <div class="section-title text-left">
                  <h4><?php echo esc_html__('Reviews','tourpacker'); ?></h4>
                </div>
                
                <div class="review-wrapper">
        
                  <div class="review-header">
                    <div class="row">
                    
                      <div class="col-sm-4 col-md-3">
                      
                        <div class="review-overall">
                        
                          <h5><?php echo esc_html__('Excellent','tourpacker'); ?></h5>
                          <p class="review-overall-point"><span><?php echo esc_attr($tour_medium_round); ?></span> / 5.0</p>
                          <p class="review-overall-recommend"><?php echo round ( $tour_medium*100/5, 0 ); ?><?php echo esc_html__('% recommend this package','tourpacker'); ?></p>
                        </div>
                      
                      </div>
                      
                      <div class="col-sm-8 col-md-9">
                        
                        <div class="review-overall-breakdown">

                          <div class="row gap-20">
                          
                            <div class="col-xss-12 col-xs-12 col-sm-7">
      
                              <h6><?php echo esc_html__('Score Breakdown','tourpacker'); ?></h6>
                              <ul class="breakdown-list">
                              
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="5.0"></div> <span>(<?php echo esc_html__('5','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_5); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="4.0"></div> <span>(<?php echo esc_html__('4','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_4); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="3.0"></div> <span>(<?php echo esc_html__('3','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_3); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="2.0"></div> <span>(<?php echo esc_html__('2','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_2); ?>)</div>
                                </li>
                                
                                <li class="clearfix">
                                  <div class="rating-wrapper">
                                    <div class="raty-wrapper">
                                      <div class="star-rating-12px" data-rating-score="1.0"></div> <span>(<?php echo esc_html__('1','tourpacker'); ?>)</span>
                                    </div>
                                  </div>
                                  <div class="progress progress-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                  </div>
                                  <div class="breakdown-count"> (<?php echo esc_attr($tour_review_1); ?>)</div>
                                </li>
                                
                              </ul>

                            </div>
                            
                            <div class="col-xss-12 col-xs-7 col-sm-5 col-md-4 mt-30-xs">
                            
                              <h6><?php echo esc_html__('Average Rating For','tourpacker'); ?></h6>
                              <ul class="breakdown-list for-avg clearfix">
                                          
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_cleanliness',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_cleanliness_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_service',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_service_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_comfort',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_comfort_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_condition',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_condition_num',true); ?></span>
                                </li>
                                
                                <li>
                                  <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_neighbourhood',true); ?> <span class="pull-right"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_neighbourhood_num',true); ?></span>
                                </li>
                              
                              </ul>
                              
                            </div>
                            
                          </div>
                          
                        
                        </div>
                      
                      </div>
                      
                    </div>
                  </div>
                  
                  <div class="review-content">
                  
                    <div class="row gap-20">
                    
                      <div class="col-sm-6">
                        <h5><?php echo esc_html__('There are','tourpacker'); ?> <?php echo (($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1)); ?> <?php echo esc_html__('reviews','tourpacker'); ?></h5>
                      </div>
                      
                      <div class="col-sm-6 text-right text-left-xs">
                        <a href="#leave-comment" class="anchor btn btn-primary btn-inverse btn-sm"><?php echo esc_html__('Leave comments','tourpacker'); ?></a>
                      </div>
                    
                    </div>
                    
                    <?php comments_template('' , true); ?>                  
                    
                  </div>
                  
                </div>

              </div>
 
              
              <div class="call-to-action">
              
                <?php echo esc_html__('Question?','tourpacker'); ?> <a href="<?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_make_an_link',true); ?>" class="btn btn-primary btn-sm btn-inverse"><?php echo esc_html__('Make an inquiry','tourpacker'); ?></a> <?php echo esc_html__('or call','tourpacker'); ?> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_review_make_an',true); ?>
              
              </div>
                
            </div>
          
        </div>
      <?php } ?> 
      </div>
    
    </div>
      
  </div>

</div>
<!-- end Main Wrapper -->
<?php 
  endwhile;
endif;
    // Get footer layout
    get_footer();
?>