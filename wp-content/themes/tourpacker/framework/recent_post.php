<?php
// class widget
class recent_post extends WP_Widget {
        
        // declere widget
        // config: ID , Description
        function recent_post() {
                $wget_options = array(
                        'classname' => 'latest-widget', // ID and class name of widget
                        'description' => 'Widget show Latest Posts.' // DES show in dashboard
                );
                parent::__construct('recent_post', 'Latest Posts', $wget_options);
        }

        // Widget Backend - anything show in widget
        function form( $instance ) {
                $default = array(
                        'title'   => 'Latest Posts',
                        'number'  => 5
                );
                $instance         = wp_parse_args( (array) $instance, $default );
                $title            = esc_attr($instance['title']);
                $number_course    = esc_attr($instance['number']);
                echo '<p>Title <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
                echo '<p>Number Recent Post show <input type="text" class="widefat" name="'.$this->get_field_name('number').'" value="'.$number_course.'"/></p>';
        }

        // Updating widget replacing old instances with new
        function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['number'] = strip_tags($new_instance['number']);
                return $instance;
        }
        
        // Creating widget front-end
        function widget( $args, $instance ) {
                extract($args);
                $title         = apply_filters( 'widget_title', $instance['title'] );
                $number_course = apply_filters( 'widget_title', $instance['number'] );

                echo $before_widget;
                echo $before_title.$title.$after_title;
                $args = array(
                        'post_type'      => 'post',
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'posts_per_page' => $number_course,
                    );
                $query = new WP_Query( $args );

                if($query->have_posts()):
                ?>
            <div class="sidebar-module-inner">
                                        
                <ul class="sidebar-post">
                <?php
                    while ( $query->have_posts()) : $query->the_post();
                    $params = array( 'width' => 80, 'height' => 80 );
                    $image_thumbnail = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );
                ?>
                    <li class="clearfix">
                        <a href="<?php the_permalink(); ?>">
                            <div class="image">
                                <img src="<?php echo esc_url($image_thumbnail);?>" alt="Popular Post" />
                            </div>
                            <div class="content">
                                <h6><?php the_title(); ?></h6>
                                <p class="recent-post-sm-meta"><i class="fa fa-clock-o mr-5"></i><?php the_time('M d, Y'); ?></p>
                            </div>
                        </a>
                    </li>
                    <?php
                    endwhile;?>
                </ul>
            
            </div>
            
                <?php endif;
                echo $after_widget;
        }
 
}
 
add_action( 'widgets_init', 'create_latest_course_widget' );
function create_latest_course_widget() {
        register_widget('recent_post');
}