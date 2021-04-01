<?php
/**
 * The template for displaying archive pages
 * @package Blog Nano
 * @version 1.0.0
 */

 $column = 'col-sm-12';
 $class  ="list";
 $row    = "";
$sidebar_class  = web_log_get_option( 'web_log_sidebar' );
get_header(); ?>

<div id="content" class="site-content">
	<div class="container">
        <div class="row">
          <div <?php if(get_theme_mod('archive_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8 <?php echo esc_attr($sidebar_class); ?>" <?php endif; ?> >
			          <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
            			  	<!--  <div class="web-log-post-grid row" > -->
                      <div class="web-log-post-<?php echo esc_attr( $class );  echo esc_attr( $row );   ?>" >
                          <div class="row">
                            <div class="<?php echo esc_attr( $column ); ?>">
                                 <?php
                              
                                 if ( have_posts() ) :
                                  
                                  /* Start the Loop */
                                  while ( have_posts() ) : the_post();
                                    
                                   get_template_part( 'template-parts/post/content');
                                   
                                 endwhile;
                                 
                               else :
                                
                                get_template_part( 'template-parts/post/content', 'none' );
                                
                              endif;
                              ?>
                            </div>
                          </div>   
                    </div>
						
                    <div class="pagination-wrap">
                      
                       <?php the_posts_pagination(); ?>
				
                    </div>
                
                  </main><!-- #main -->
              </div><!-- #primary -->
        </div>
	<?php if(get_theme_mod('archive_sidebar')==false) : ?> 
			
             <div class="col-md-4">    
             
               <?php get_sidebar(); ?>
             
             </div>
	
    <?php endif; ?> 
        </div><!-- .row -->
	</div>
</div>
<?php get_footer();
