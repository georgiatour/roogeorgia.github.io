<?php 
    // Get header layout
    get_header();
    $theme_option = get_option('theme_option');
?>
<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

  <!-- start end Page title -->
  <div class="page-title" <?php if(isset($theme_option['index_page_image_background']['url']) && $theme_option['index_page_image_background']['url'] != '' ){ ?>style="background-image:url('<?php echo esc_url($theme_option['index_page_image_background']['url']); ?>');"<?php }else{} ?>>
    
    <div class="container">
    
      <div class="row">
      
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
        
          <h1 class="hero-title"><?php
              $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
              $search_keyword = esc_html( $s);
              $search_count = $search_query->post_count;
              printf( esc_html__('Search results for: %s', 'tourpacker'), $search_keyword,$search_count);
          ?></h1>
          
          <?php tourpacker_breadcrumbs(); ?>
          
        </div>
        
      </div>

    </div>
    
  </div>
  <!-- end Page title -->
  
  <div class="content-wrapper">
  
    <div class="container">
    
      <div class="row">
      
        <div class="col-sm-8 col-md-9">
        
          <div class="blog-wrapper">
          <?php 
          if(have_posts()):
            while ( have_posts() ) : the_post();
                $format_of_post = get_post_format();
                $params = array( 'width' => 833, 'height' => 315 );
                $image_thumbnail = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );

                $image_background = get_post_meta( get_the_ID(), '_cmb_blog_single_images', true );
                $header_title = get_post_meta( get_the_ID(), '_cmb_blog_single_title', true );
                $video_style = get_post_meta( get_the_ID(), '_cmb_blog_single_chosen_channel', true );
                $url_youtube = get_post_meta( get_the_ID(), '_cmb_blog_single_url_youtube', true );
                $url_vimeo = get_post_meta( get_the_ID(), '_cmb_blog_single_url_vimeo', true );
          ?>
            <div class="blog-item">
            
              <div class="blog-media">
              <?php if( $format_of_post == 'gallery' ){ ?>
                <div id="bootstrap-carousel-slider" class="carousel slide" data-ride="carousel" data-interval="5000">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <?php
                        $gallery = get_post_gallery( get_the_ID(), false );
                        if(isset($gallery['ids'])){  
                            $gallery_ids = $gallery['ids'];
                            $img_ids = explode(",",$gallery_ids);
                            $i=1;
                            foreach( $img_ids AS $img_id ){
                                $image_src = wp_get_attachment_image_src($img_id,'');
                                $meta = wp_prepare_attachment_for_js($img_id);
                                $tes_caption=$meta['caption'];
                    ?>
                    <!-- First slide -->
                    <div class="item <?php if($i==1){echo 'active';}else{} ?>">
                      <div class="image">
                        <img src="<?php echo esc_url($image_src[0]) ?>" alt="Image" />
                      </div>
                      <div class="carousel-caption">
                        <p><?php echo esc_attr($tes_caption); ?></p>
                      </div>
                    </div> <!-- /.item -->                    
                    <?php
                            $i++; }
                        }

                    ?>
                  </div><!-- /.carousel-inner -->

                  <!-- Controls -->
                  <a class="left carousel-control" href="#bootstrap-carousel-slider" role="button" data-slide="prev">
                    <span class="carousel-control-left"><i class="pe-7s-angle-left" aria-hidden="true"></i></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#bootstrap-carousel-slider" role="button" data-slide="next">
                    <span class="carousel-control-right"><i class="pe-7s-angle-right" aria-hidden="true"></i></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!-- /.carousel -->
              <?php }elseif( $format_of_post == 'video' ){ 
                      if($video_style == 'vimeo'){
                ?>
                  <div class="flex-video vimeo"> 
                    <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($url_vimeo); ?>" allowfullscreen></iframe> 
                  </div>
                <?php }elseif( $video_style == 'youtube'){ ?>
                  <div class="flex-video youtube"> 
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr($url_youtube); ?>" allowfullscreen></iframe>
                  </div>
                <?php } ?>
              <?php }else{ ?>
              
              <div class="overlay-box">
                <a class="blog-image" href="<?php the_permalink(); ?>">
                  <?php if( isset($image_thumbnail) && $image_thumbnail != ''){ ?>
                    <img src="<?php echo esc_url($image_thumbnail); ?>" alt="" />
                  <?php }else{} ?>
                  <div class="image-overlay">
                    <div class="overlay-content">
                      <div class="overlay-icon"><i class="pe-7s-link"></i></div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>
                
              </div>
                  
              <div class="blog-content">
                <h3><a href="<?php the_permalink(); ?>" class="inverse"><?php the_title(); ?></a></h3>
                <ul class="blog-meta clearfix">
                  <li>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></li>
                  <li>by <?php the_time('M d, Y'); ?></li>
                  <li>in <?php the_category(' , '); ?></li>
                  <li><?php comments_number( esc_html__('comments ( 0 )', 'tourpacker'), esc_html__('comments ( 1 )', 'tourpacker'), esc_html__('% comments', 'tourpacker') ); ?></li>
                </ul>
                <div class="blog-entry">
                <?php if( isset($theme_option['index_page_excerpt']) && $theme_option['index_page_excerpt'] != ''){ echo tourpacker_excerpt($theme_option['index_page_excerpt']); }else{ echo tourpacker_excerpt(40); } ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn-blog"><?php if(isset($theme_option['index_page_text_read']) && $theme_option['index_page_text_read'] != ''){ echo esc_attr($theme_option['index_page_text_read']);}else{} ?> <i class="fa fa-long-arrow-right"></i></a>
              </div>
            
            </div>
            <?php 
              endwhile;
            else:
                '<p>'. esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tourpacker' ).'</p></br></br>';
                get_search_form(); 
            
            endif; ?>
            <div class="clear"></div>
            
            <div class="pager-wrappper mt-0 clearfix">
  
              <div class="pager-innner">
              
                <div class="flex-row flex-align-middle">
                    
                  <div class="flex-column flex-sm-12">
                  <?php 
                    $count_posts = wp_count_posts();
                    $published_posts = $count_posts->publish;?>
                  Showing reslut 1 to <?php echo get_option('posts_per_page '); ?> from <?php echo esc_attr($published_posts); ?> 
                  </div>
                  
                  <div class="flex-column flex-sm-12">
                    <nav class="pager-right">
                      <ul class="pagination">
                        <?php tourpacker_pagination(); ?>
                      </ul>
                    </nav>
                  </div>
                
                </div>
                
              </div>
              
            </div>
            
          </div>
        
        </div>
        
        <div class="col-sm-4 col-md-3 mt-50-xs">
        
          <aside class="sidebar">
        
            <div class="sidebar-inner no-border for-blog">
            
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : 
                    dynamic_sidebar('sidebar-1');
                    endif;
                ?>

            </div>
          
          </aside>
          
        </div>
      
      </div>
      
    </div>
    
  </div>
  

</div>
<!-- end Main Wrapper -->

<?php 
    // Get footer layout
    get_footer();
?>