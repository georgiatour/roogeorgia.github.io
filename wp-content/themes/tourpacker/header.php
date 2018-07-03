<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option=get_option('theme_option'); ?>
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Fav and Touch Icons -->
  <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
  <link rel="shortcut icon" href="<?php if(isset($theme_option['favicon']['url'])){ echo esc_url($theme_option['favicon']['url']);}else{} ?>" type="image/x-icon">
  <?php } ?>
  <link rel="apple-touch-icon-precomposed" href="<?php if(isset($theme_option['apple_icon']['url'])){ echo esc_url($theme_option['apple_icon']['url']);}else{} ?>">
  <link rel="apple-touch-icon-precomposed" href="<?php if(isset($theme_option['apple_icon_57']['url'])){ echo esc_url($theme_option['apple_icon_57']['url']);}else{} ?>">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php if(isset($theme_option['apple_icon_72']['url'])){ echo esc_url($theme_option['apple_icon_72']['url']);}else{} ?>">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php if(isset($theme_option['apple_icon_114']['url'])){ echo esc_url($theme_option['apple_icon_114']['url']);}else{} ?>">
  

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="introLoader" class="introLoading"></div>
  
  <!-- BEGIN # MODAL LOGIN -->
  <div class="modal fade modal-login modal-border-transparent" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        
        <div class="clear"></div>
        
        <!-- Begin # DIV Form -->
        <div id="modal-login-form-wrapper">
          
          <!-- Begin # Login Form -->
          <?php tour_form_login(); ?>
          <!-- End # Login Form -->

          <!-- Begin | Register Form -->
          <?php tour_register_form(); ?>       
          <!-- End | Register Form -->
                
        </div>
        <!-- End # DIV Form -->
                
      </div>
    </div>
  </div>
  <!-- END # MODAL LOGIN -->

  <!-- BEGIN Change Search Modal -->
  <div class="modal fade modal-login modal-border-transparent" id="changeSearchModal" tabindex="-1" role="dialog" aria-hidden="true">
                
    <div class="modal-dialog">
      <div class="modal-content">
      
        <button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        
        <div class="clear"></div>
        
        <div class="modal-body pb-5">
          
          <h4 class="heading mt-10 mb-20 text-primary uppercase"><?php echo esc_html__('Change Search','tourpacker'); ?></h4>
        
          <?php tour_search_form(); ?>
        
        </div>
        
      </div>
    </div>

  </div>
  
  <!-- END Change Search Modal -->
  <!-- start Container Wrapper -->
  <div class="container-wrapper">

    <!-- start Header -->
    <header id="header">
    
      <!-- start Navbar (Header) -->
      <nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">

        <div class="navbar-top">
        
          <div class="container">
            
            <div class="flex-row flex-align-middle">
              <div class="flex-shrink flex-columns">
                
                <?php if( isset($theme_option['logo_image']['url']) && $theme_option['logo_image']['url'] != ''){ ?>
                  <a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($theme_option['logo_image']['url']) ?>" alt=""></a>
                <?php }else{ ?>
                  <a class="navbar-logo logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">TOURPACKER</a>
                <?php } ?>
                
              </div>
              <div class="flex-columns">
                <div class="pull-right">
                
                  <div class="navbar-mini">
                    <ul class="clearfix">
                    
                      <li class="dropdown bt-dropdown-click hidden hidden-xs">
                      <?php if(isset($theme_option['header_top_currency'])){ ?>
                        <a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="<?php echo esc_attr($theme_option['header_top_currency_icon']); ?> hidden-xss"></i> <?php echo esc_attr($theme_option['header_top_currency']); ?>
                          <span class="caret"></span>
                        </a>
                      <?php }else{} ?>
                        <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                        <?php if(isset($theme_option['header_top_currency'])){ ?>
                          <li><a href="#"><i class="<?php echo esc_attr($theme_option['header_top_currency_icon']); ?>"></i> <?php echo esc_attr($theme_option['header_top_currency']); ?></a></li>
                        <?php }else{} ?>
                        <?php 
                        if(isset($theme_option['header_top_currency_multi'])){
                        $currency_multi = $theme_option['header_top_currency_multi'];
                        foreach ( $currency_multi as $currency_multis ) { 
                        $currency_share = explode(",",$currency_multis);                    
                         ?>
                          <li><a href="#"><i class="<?php if(isset($currency_share)){ echo esc_attr($currency_share[1]);}else{} ?>"></i> <?php if(isset($currency_share)){ echo esc_attr($currency_share[0]);}else{} ?></a></li>
                        <?php } } ?>
                        </ul>
                      </li>
                      
                      <li class="dropdown bt-dropdown-click hidden-xs">
                      <?php if(isset($theme_option['header_top_languages'])){ ?>
                        <a id="currncy-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="ion-android-globe hidden-xss"></i> <?php echo esc_attr($theme_option['header_top_languages']); ?>
                          <span class="caret"></span>
                        </a>
                      <?php }else{} ?>
                        <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                        <?php if(isset($theme_option['header_top_languages'])){ ?>
                          <li><a href="#"><?php echo esc_attr($theme_option['header_top_languages']); ?></a></li>
                        <?php }else{} ?>
                        <?php 
                        if(isset($theme_option['header_top_languages_multi'])){
                        $languages_multi = $theme_option['header_top_languages_multi'];
                        foreach ( $languages_multi as $languages_multis ) {                    
                         ?>
                          <li><a href="#"><?php echo esc_attr($languages_multis); ?></a></li>
                        <?php } } ?>
                        </ul>
                      </li>                                          
                      
                      <li class="user-action">
                      <?php if(is_user_logged_in()){ ?>
                        <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn"><?php echo esc_html__('Logout','tourpacker'); ?></a>                        
                      <?php }else{ ?>
                        <a data-toggle="modal" href="#loginModal" class="btn"><?php echo esc_html__('Sign up/in','tourpacker'); ?></a>
                      <?php } ?>
                      </li>

                    </ul>
                  </div>
            
                </div>
              </div>
            </div>

          </div>
          
        </div>
        
        <div class="navbar-bottom hidden-sm hidden-xs">
        
          <div class="container">
          
            <div class="row">
            
              <div class="col-sm-9">
                
                <div id="navbar" class="collapse navbar-collapse navbar-arrow">
                  <?php   
                    $primary = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'nav navbar-nav',
                        'menu_id'         => 'responsive-menu',
                        'echo'            => true,
                         'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                         'walker'            => new wp_bootstrap_navwalker(),
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        );
                    if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( $primary );
                        }
                        
                    ?>                  
                </div><!--/.nav-collapse -->
                
              </div>
              
              <div class="col-sm-3">
              <?php if(isset($theme_option['header_top_call'])){ ?>
                <div class="navbar-phone"><i class="fa fa-phone"></i> <?php echo esc_attr($theme_option['header_top_call']); ?></div>
              <?php }else{} ?>
              
              </div>

            </div>
            
          </div>
        
        </div>

        <div id="slicknav-mobile"></div>
        
      </nav>
      <!-- end Navbar (Header) -->

    </header>

    <div class="clear"></div>
    <!-- start Main Wrapper -->
    <div class="main-wrapper">