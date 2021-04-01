<?php 

function xooblog_widget_author_bio(){
    register_widget('xooblog_author_bio');
}

class xooblog_author_bio extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'xooblog_author_bio_Widget', // Base ID
            'xooblog Author Bio Widget', // Name
            array( 'description' => __( 'Author Bio Widget', 'xooblog' ), ) // Args
        );
    }
    public function widget( $args, $instance )
    {
       
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $name =  !empty($instance['name']) ? $instance['name'] : '';
        $image_url =  !empty($instance['image_url']) ? $instance['image_url'] : '';
        $picture_size =  !empty($instance['picture_size']) ? $instance['picture_size'] : '';
        $about =  !empty($instance['about']) ? $instance['about'] : '';
        $button_title =  !empty($instance['button_title']) ? $instance['button_title'] : '';
        $button_link =  !empty($instance['button_link']) ? $instance['button_link'] : '';
       
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
      
     
          
                echo '<div class="author_bio">';
                if($image_url){
                    echo "<div class='author_image'>";
                    echo '<img src="'.esc_url($image_url).'" style="width:'.esc_attr($picture_size).'px;height:'.esc_attr($picture_size).'px;" alt="">';
                    echo "</div>";
                }
                echo '<div class="post_widget_content">';
                echo '<h4 class="xooblog_author__name">';
                echo esc_html($name);
                echo '</h4>';
                if ($about) { echo "<div class=\"content\"><p>".$about."</p></div>"; }
                echo '<a href="'.esc_url($button_link).'">'; 
                echo esc_html($button_title);
                echo "</a>"; 
                echo "  </div>";
              
              echo "  </div>";
           
     
        echo $after_widget;
    }
    public function form( $instance ) 
    {
       
        $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : _e('Widget Title','xooblog');
        $name = isset($instance[ 'name' ]) ? $instance[ 'name' ] : _e('Name','xooblog');
        $image_url = isset($instance[ 'image_url' ]) ? $instance[ 'image_url' ] : _e('Gravatar image_url','xooblog');
        $picture_size = isset($instance[ 'picture_size' ]) ? $instance[ 'picture_size' ] : _e('Profile Picture Size','xooblog');
        $about = isset($instance[ 'about' ]) ? $instance[ 'about' ] : _e('About','xooblog');
        $button_title = isset($instance[ 'button_title' ]) ? $instance[ 'button_title' ] : _e('Button Title','xooblog');
        $button_link = isset($instance[ 'button_link' ]) ? $instance[ 'button_link' ] : _e('Button Link','xooblog');
        
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Widget Title:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'name' ); ?>"><?php _e( 'Name:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'image_url' ); ?>"><?php _e( 'Profile Image Url:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr( $image_url ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'picture_size' ); ?>"><?php _e( 'Profile Picture Size:','xooblog' ); ?></label>
            <input class="widefat" type="number" min="96" max="365" id="<?php echo $this->get_field_id( 'picture_size' ); ?>" name="<?php echo $this->get_field_name( 'picture_size' ); ?>" type="text" value="<?php echo esc_attr( $picture_size ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'about' ); ?>"><?php _e( 'About:','xooblog' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'about' ); ?>" name="<?php echo $this->get_field_name( 'about' ); ?>" rows="5" ><?php echo esc_html( $about ); ?></textarea>
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'button_title' ); ?>"><?php _e( 'Button Title:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_title' ); ?>" name="<?php echo $this->get_field_name( 'button_title' ); ?>" type="text" value="<?php echo esc_attr( $button_title ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'button_link' ); ?>"><?php _e( 'Button Link:','xooblog' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
         </p>
        
         <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = isset($new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['name'] = isset($new_instance['name'] ) ? strip_tags( $new_instance['name'] ) : '';
        $instance['image_url'] = isset($new_instance['image_url'] ) ? strip_tags( $new_instance['image_url'] ) : '';
        $instance['picture_size'] = isset($new_instance['picture_size'] ) ? strip_tags( $new_instance['picture_size'] ) : '';
        $instance['about'] = isset($new_instance['about'] ) ? $new_instance['about'] : '';
        $instance['button_title'] = isset($new_instance['button_title'] ) ? strip_tags( $new_instance['button_title'] ) : '';
        $instance['button_link'] = isset($new_instance['button_link'] ) ? strip_tags( $new_instance['button_link'] ) : '';
       
        return $instance;
    }
    
}


add_action('widgets_init','xooblog_widget_author_bio');













?>