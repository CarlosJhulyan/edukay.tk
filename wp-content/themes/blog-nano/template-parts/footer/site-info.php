<?php
/**
 * Displays footer site info
 *
 * @package Blog Nano
 * @version 1.0.0
 */

?>
<div class="mini-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="copyright-text">
            		    <p>
							<?php 
							    
						    $copyright_text = web_log_get_option( 'copyright_text' ); 
			    
					        if ( ! empty( $copyright_text ) ) : ?>
					    
					           <?php echo wp_kses_post( $copyright_text ); ?>
					    
					        <?php endif; ?>

					         <a href="<?php echo esc_url( __( 'https://www.wordpress.org/', 'blog-nano' ) ); ?>">  <?php printf( esc_html__( ' Proudly powered by %s ', 'blog-nano' ), 'WordPress ' ); ?>
						    </a>
							<span class="sep"> <?php esc_html_e('|','blog-nano') ?>  </span>
							<?php printf( esc_html__( ' Theme: %1$s by %2$s.', 'blog-nano' ), 'Blog Nano', '<a href="https://www.thememiles.com/" target="_blank">ThemeMiles</a>' ); ?>
		                        
		                        
						</p> 
		        </div>
             
            </div>
        </div>
    </div>
</div>
