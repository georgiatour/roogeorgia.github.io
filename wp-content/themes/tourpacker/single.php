<?php 
    // Get header layout
    get_header();
    $theme_option = get_option('theme_option');
    
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
            $blog_style_sidebar = get_post_meta( get_the_ID(), '_cmb_blog_single_sidebar_style', true );
            
            
?>
<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">

  <!-- start end Page title -->
  <div class="page-title" <?php if(isset($image_background) && $image_background != ''){ ?>style="background-image:url('<?php echo esc_url($image_background); ?>');"<?php }else{} ?>>
    
    <div class="container">
    
      <div class="row">
      
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
        
          <h1 class="hero-title"><?php echo esc_attr($header_title); ?></h1>
          
          <?php tourpacker_breadcrumbs(); ?>
          
        </div>
        
      </div>

    </div>
    
  </div>
  <!-- end Page title -->
  
  <div class="content-wrapper">
  
    <div class="container">
    
      <div class="row">
      <?php if($blog_style_sidebar == 'blog_right' || $blog_style_sidebar == ''){ ?>
        <div class="col-sm-8 col-md-9">
        
          <div class="blog-wrapper">

            <div class="blog-item blog-single">
            
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
                <?php if( isset($image_thumbnail) && $image_thumbnail != ''){ ?><img src="<?php echo esc_url($image_thumbnail); ?>" alt="" /><?php }else{} ?>
              <?php } ?>
              </div>
                  
              <div class="blog-content">
                <h3><?php the_title(); ?></h3>
                <ul class="blog-meta clearfix">
                  <li>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></li>
                  <li>by <?php the_time('M d, Y'); ?></li>
                  <li>in <?php the_category(' , '); ?></li>
                  <li><?php comments_number( esc_html__('comments ( 0 )', 'tourpacker'), esc_html__('comments ( 1 )', 'tourpacker'), esc_html__('% comments', 'tourpacker') ); ?></li>
                </ul>
                <div class="blog-entry">  
                  <?php the_content(); 
                        wp_link_pages();?>                  
                </div>
              </div>
            
              <div class="blog-extra">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-7 xs-mb">
                    <div class="tag-cloud clearfix mt-0">
                      <span><i class="fa fa-tags"></i> tags: </span>
                      <?php
                        if(get_the_tag_list()) {
                            echo get_the_tag_list();
                        }
                      ?>                     
                    </div>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-5 xs-mb">
                    <ul class="social-share-sm mt-5 pull-right pull-left-xs mt-20-xs">
                                
                      <li><span><i class="fa fa-share-square"></i> share</span></li>
                      <li class="the-label"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">Facebook</a></li>
                      <li class="the-label"><a href="https://twitter.com/home?status=<?php the_permalink();?>">Twitter</a></li>
                      <li class="the-label"><a href="https://plus.google.com/share?url=<?php the_permalink();?>">Google Plus</a></li>
                      
                    </ul>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              
              <h4 class="uppercase">About author</h4>
              <div class="blog-author">
                <div class="author-label">
                  
                  <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </div>
                <div class="author-details">
                  <ul class="social-share-sm pull-right pull-left-xs">
                    <li class="the-label"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">Facebook</a></li>
                    <li class="the-label"><a href="https://twitter.com/home?status=<?php the_permalink();?>">Twitter</a></li>
                    <li class="the-label"><a href="https://plus.google.com/share?url=<?php the_permalink();?>">Google Plus</a></li>
                  </ul>
                  <div class="clear-xs"></div>
                  <h5 class="heading"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></h5>
                  <p><?php the_author_meta('description'); ?></p>
                </div>
              </div>
                            
              <?php comments_template(); ?> 

              <div class="clear"></div>
              
              
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
      <?php }elseif($blog_style_sidebar == 'blog_left'){ ?>
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
        <div class="col-sm-8 col-md-9">
        
          <div class="blog-wrapper">

            <div class="blog-item blog-single">
            
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
                <?php if( isset($image_thumbnail) && $image_thumbnail != ''){ ?><img src="<?php echo esc_url($image_thumbnail); ?>" alt="" /><?php }else{} ?>
              <?php } ?>
              </div>
                  
              <div class="blog-content">
                <h3><?php the_title(); ?></h3>
                <ul class="blog-meta clearfix">
                  <li>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></li>
                  <li>by <?php the_time('M d, Y'); ?></li>
                  <li>in <?php the_category(' , '); ?></li>
                  <li><?php comments_number( esc_html__('comments ( 0 )', 'tourpacker'), esc_html__('comments ( 1 )', 'tourpacker'), esc_html__('% comments', 'tourpacker') ); ?></li>
                </ul>
                <div class="blog-entry">  
                  <?php the_content(); 
                        wp_link_pages();?>                  
                </div>
              </div>
            
              <div class="blog-extra">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-7 xs-mb">
                    <div class="tag-cloud clearfix mt-0">
                      <span><i class="fa fa-tags"></i> tags: </span>
                      <?php
                        if(get_the_tag_list()) {
                            echo get_the_tag_list();
                        }
                      ?>                     
                    </div>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-5 xs-mb">
                    <ul class="social-share-sm mt-5 pull-right pull-left-xs mt-20-xs">
                                
                      <li><span><i class="fa fa-share-square"></i> share</span></li>
                      <li class="the-label"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">Facebook</a></li>
                      <li class="the-label"><a href="https://twitter.com/home?status=<?php the_permalink();?>">Twitter</a></li>
                      <li class="the-label"><a href="https://plus.google.com/share?url=<?php the_permalink();?>">Google Plus</a></li>
                      
                    </ul>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              
              <h4 class="uppercase">About author</h4>
              <div class="blog-author">
                <div class="author-label">
                  
                  <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </div>
                <div class="author-details">
                  <ul class="social-share-sm pull-right pull-left-xs">
                    <li class="the-label"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">Facebook</a></li>
                    <li class="the-label"><a href="https://twitter.com/home?status=<?php the_permalink();?>">Twitter</a></li>
                    <li class="the-label"><a href="https://plus.google.com/share?url=<?php the_permalink();?>">Google Plus</a></li>
                  </ul>
                  <div class="clear-xs"></div>
                  <h5 class="heading"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></h5>
                  <p><?php the_author_meta('description'); ?></p>
                </div>
              </div>
                            
              <?php comments_template(); ?> 

              <div class="clear"></div>
              
              
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