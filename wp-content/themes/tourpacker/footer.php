<?php $theme_option = get_option('theme_option'); ?>
</div>
<footer class="footer">
      
      <div class="container">
      
        <div class="main-footer">
        
          <div class="row">
        
            <div class="col-xs-12 col-sm-5 col-md-3">
            
              <div class="footer-logo">
              <?php if( isset($theme_option['logo_image']['url']) && $theme_option['logo_image']['url'] != ''){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($theme_option['logo_image']['url']) ?>" alt=""></a>
              <?php }else{} ?>
              </div>
              
              <p class="footer-address"><?php if(isset($theme_option['footer_one_address'])){echo esc_attr($theme_option['footer_one_address']);}else{} ?> <br/> 
                <?php  if(isset($theme_option['footer_one_phone_1'])){ ?><i class="fa fa-phone"></i> <?php echo esc_attr($theme_option['footer_one_phone_1']); ?> <br/><?php }else{} ?> 
                <?php  if(isset($theme_option['footer_one_phone_2'])){ ?><i class="fa fa-phone"></i> <?php echo esc_attr($theme_option['footer_one_phone_2']); ?> <br/><?php }else{} ?>                 
                <?php  if(isset($theme_option['footer_one_phone_2'])){ ?><i class="fa fa-envelope-o"></i> <a href="<?php echo esc_attr($theme_option['footer_one_support_link']); ?>"><?php echo esc_attr($theme_option['footer_one_support']); ?></a><?php }else{} ?>
              </p>
              
              <div class="footer-social">
              <?php 
                    if(isset($theme_option['footer_one_social'])){
                      $footer_social = $theme_option['footer_one_social'];
                    foreach ( $footer_social as $footer_socials ) { 
                    $footer_social_share = explode(",",$footer_socials);                    
              ?>
                <a href="<?php if(isset($footer_social_share)){ echo esc_attr($footer_social_share[1]);}else{} ?>" data-toggle="tooltip" data-placement="top" title="<?php if(isset($footer_social_share)){ echo esc_attr($footer_social_share[2]);}else{} ?>"><i class="fa <?php if(isset($footer_social_share)){ echo esc_attr($footer_social_share[0]);}else{} ?>"></i></a>
              <?php } } ?>
              
              </div>
              
              <p class="copy-right"><?php if(isset($theme_option['footer_one_copyright'])){echo esc_attr($theme_option['footer_one_copyright']);}else{} ?></p>
              
            </div>
            
            <div class="col-xs-12 col-sm-7 col-md-9">

              <div class="row gap-10">
              
                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-30-xs">
                <?php if(isset($theme_option['footer_two_title'])){ ?>
                  <h5 class="footer-title"><?php echo esc_attr($theme_option['footer_two_title']); ?></h5>
                <?php }else{} ?> 
                  <ul class="footer-menu">
                  <?php 
                  if(isset($theme_option['footer_two_text_link'])){
                    $footer_two_text_link = $theme_option['footer_two_text_link'];
                  }
                    if(isset($theme_option['footer_two_text_link'])){
                    foreach ( $footer_two_text_link as $footer_two_text_links ) { 
                    $footer_two_share = explode(",",$footer_two_text_links);                    
                  ?>
                    <li><a href="<?php if(isset($footer_two_share)){ echo esc_attr($footer_two_share[1]);}else{} ?>"><?php if(isset($footer_two_share)){ echo esc_attr($footer_two_share[0]);}else{} ?></a></li>
                  <?php } } ?>  
                  </ul>
                  
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

                  <?php if(isset($theme_option['footer_three_title'])){ ?>
                    <h5 class="footer-title"><?php echo esc_attr($theme_option['footer_three_title']); ?></h5>
                  <?php }else{} ?> 
                  
                  <ul class="footer-menu">
                  <?php 
                  if(isset($theme_option['footer_two_text_link'])){
                    $footer_three_text_link = $theme_option['footer_two_text_link'];
                  }
                    if(isset($theme_option['footer_three_text_link'])){
                    foreach ( $footer_three_text_link as $footer_three_text_links ) { 
                    $footer_three_share = explode(",",$footer_three_text_links);                    
                  ?>
                    <li><a href="<?php if(isset($footer_three_share)){ echo esc_attr($footer_three_share[1]);}else{} ?>"><?php if(isset($footer_three_share)){ echo esc_attr($footer_three_share[0]);}else{} ?></a></li>
                  <?php } } ?>  
                    
                  </ul>
                  
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">

                  <?php if(isset($theme_option['footer_four_title'])){ ?>
                    <h5 class="footer-title"><?php echo esc_attr($theme_option['footer_four_title']); ?></h5>
                  <?php }else{} ?> 
                  
                  <ul class="footer-menu">
                  <?php
                  
                  if(isset($theme_option['footer_four_text_link'])){
                    $footer_four_text_link = $theme_option['footer_four_text_link'];
                  }
                    if(isset($theme_option['footer_four_text_link'])){
                    foreach ( $footer_four_text_link as $footer_four_text_links ) { 
                    $footer_four_share = explode(",",$footer_four_text_links);                    
                  ?>
                    <li><a href="<?php if(isset($footer_four_share)){ echo esc_attr($footer_four_share[1]);}else{} ?>"><?php if(isset($footer_four_share)){ echo esc_attr($footer_four_share[0]);}else{} ?></a></li>
                  <?php } } ?>  
                    
                  </ul>
                  
                </div>
                
              </div>

            </div>
            
          </div>

        </div>
        
      </div>
      
    </footer>
    
  </div>  <!-- end Container Wrapper -->
 

 
  <!-- start Back To Top -->
  <div id="back-to-top">
     <a href="#"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- end Back To Top -->
<?php 
    //Get JS
    wp_footer();
?>

</body>
