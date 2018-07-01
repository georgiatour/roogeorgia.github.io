<?php 

    // Get header layout
    get_header();
    // Define variable
    $theme_option = get_option('theme_option');
?>
<!-- start end Page title -->
<div class="page-title" style="background-image:url('images/hero-header/breadcrumb.jpg');">
  
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
              <div class="widget widget-search">
              <h1>
                <?php echo esc_html__('No result that you want access.','tourpacker'); ?>
              </h1>
                  <?php get_search_form(); ?>
              </div><!-- /.widget-search -->
              <p>OR</p>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-besmart"><?php echo esc_html__('Go To Home','tourpacker'); ?></a>
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