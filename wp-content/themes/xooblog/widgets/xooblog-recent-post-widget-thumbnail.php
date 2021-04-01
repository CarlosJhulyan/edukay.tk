<?php 

function xooblog_recent_widget_thumbnail(){
    register_widget('xooblog_Recent_Post_Thumbnail');
}

class xooblog_Recent_Post_Thumbnail extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'xooblog_Recent_Post_Thumbnail_Widget', // Base ID
            'xooblog Recent Post Thumbnail Widget', // Name
            array( 'description' => __( 'Recent Post Thumbnail Widget', 'xooblog' ), ) // Args
        );
    }
    public function widget( $args, $instance )
    {
       
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $post_number =  !empty($instance['post_number']) ? $instance['post_number'] : 5;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;
        
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        $the_query = new WP_Query( array( 
            'posts_per_page'      => $post_number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
        ) );
        if($the_query->have_posts()):
          
                echo '<ul class="xooblog_recent_post_widget">';
                   
                    while ( $the_query->have_posts() ) : $the_query->the_post();

                        echo '<li>';
                        
                        if(has_post_thumbnail()){
                            echo "<div class='recent_post_widget_image'>";
                            echo '<a href="';the_permalink(); echo '">';
                            the_post_thumbnail('xooblog_sidebar_thumbnail');
                            echo '</a>';
                            echo "</div>";
                        }
                        
                        echo '<div class="post_widget_content">';
                       
                           echo '<a class="recent_post_widget_title" href="';the_permalink(); echo '">';
                                    the_title();
                                echo '</a>';
                                
                                
                        
                            if($show_date){
                                echo '<span class="recent_post_widget_date">'.get_the_date().'</span>';
                            }
                       echo " </li>";
                endwhile;
                wp_reset_postdata();
         
              echo "  </ul>";
           
        endif;
        echo $after_widget;
    }
    public function form( $instance ) 
    {
       
        $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : _e('Widget Title','xooblog');
        $post_number = isset($instance[ 'post_number' ]) ? $instance[ 'post_number' ] : 5;
        $show_date = isset($instance[ 'show_date' ]) ? (bool) $instance['show_date'] : false;
 
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
         <p>
             <label for="<?php echo $this->get_field_name('post_number');?>"><?php _e('Number Of Post','xooblog'); ?></label>
             <input class="" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="number" value="<?php echo esc_attr( $post_number ); ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" />
         </p>
         <p>
             <label for="<?php echo $this->get_field_name('show_date');?>"><?php _e('Show Post Date','xooblog'); ?></label>
             <input type="checkbox" class="checkbox"   id="<?php echo $this->get_field_id( 'show_date' ); ?>" <?php checked( $show_date ); ?> name="<?php echo $this->get_field_name( 'show_date' ); ?>"  />
         </p>
         <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = isset($new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['post_number'] = isset($new_instance['post_number'] ) ? (int)$new_instance['post_number'] : 5;
        $instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }
    
}


add_action('widgets_init','xooblog_recent_widget_thumbnail');













?>