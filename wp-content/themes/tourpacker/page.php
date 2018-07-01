<?php
/**
 * The template for displaying all pages
 */
get_header(); 
$theme_option = get_option('theme_option');
?>
<!-- start end Page title -->
<div class="page-title" <?php if(isset($theme_option['index_page_image_background']['url']) && $theme_option['index_page_image_background']['url'] != '' ){ ?>style="background-image:url('<?php echo esc_url($theme_option['index_page_image_background']['url']); ?>');"<?php }else{} ?>>
  
  <div class="container">
  
    <div class="row">
    
      <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
      
        <h1 class="hero-title"><?php the_title(); ?></h1>
        
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
        
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <?php 
            if(have_posts()):
              while ( have_posts() ) : the_post();
                the_content();
                comments_template();
              endwhile; 
            endif;
          ?>
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
get_footer();
