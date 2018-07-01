<?php

$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $el_id = $div_wrapper = '';
extract(shortcode_atts(array(
    'el_id'           => '',
    'el_class'        => '',
    'bg_image_custom' => '',
    'div_wrapper'     => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'fullwidth'       => 'no',
    'overlay_div'     => 'no',
    'margin_bottom'   => '',
    'css'             => '',
    'el_html'         => '',
), $atts));

    wp_enqueue_style( 'js_composer_front' );
    wp_enqueue_script( 'wpb_composer_front_js' );
    wp_enqueue_style('js_composer_custom_css');
    

    $hand_sec = rand();


    $class_parallax = '';
    

    $el_class = $this->getExtraClass($el_class);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.'vg_fixed'. get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
    $bg_image_vc = 0;
    $bg_image_customs = wp_get_attachment_image_src($bg_image_custom,'');
    $style = $this->buildStyle($bg_image_vc, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
if($bg_image_customs[0] != ''){
$img_me = 'style="background-image: url('.esc_url($bg_image_customs[0]).')"';
}else{
    $img_me = '';
}

    $output .='<div ';
if($el_id != ''){
    $output .='id="'.$el_id.'"';
}else{}
    $output .=' class="'.esc_attr($css_class).' '.esc_attr($style).'" '.$img_me.' '.$el_html.'>';  
if($overlay_div == 'yes'){
    $output.='<div class="overlay"></div>';
}else{}
if($fullwidth == 'no'){
    $output .='<div class="container">';   
}
    $output .= wpb_js_remove_wpautop($content);
if($fullwidth == 'no'){
    $output .='</div>';
}
    $output .='</div>'.$this->endBlockComment('row');



echo $output;