<?php
/**
 * Content for footer widget
 *
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */
 if( !apply_filters( Guten_Learn_Helper::fn_prefix( 'disable_footer_widget' ), false ) ): ?>
    <footer <?php Guten_Learn_Helper::schema_body( 'footer' ); ?> class="footer-top-section">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                 	<?php if( is_active_sidebar( 'gutenlearn_footer_sidebar_1' ) || is_active_sidebar( 'gutenlearn_footer_sidebar_2' ) ||
                            is_active_sidebar( 'gutenlearn_footer_sidebar_3' ) || is_active_sidebar( 'gutenlearn_footer_sidebar_4' ) ){

             	        $num_footer = guten_learn_get( 'layout-footer' );
                 		for( $i = 1; $i <= $num_footer ; $i++ ){ ?>
                 			<?php if ( is_active_sidebar( Guten_Learn_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ) ) : ?>
		                 		<aside class="col footer-widget-wrapper py-5">
		                 	    	<?php dynamic_sidebar( Guten_Learn_Helper::fn_prefix( 'footer_sidebar' ) . '_' . $i ); ?>
		                 		</aside>
	                 		<?php endif; ?>
                 	    <?php }
                    }else{ ?>
                        <aside class="col footer-widget-wrapper py-5">
                            <?php Guten_Learn_Theme::the_default_search(); ?>
                        </aside>
                        <aside class="col footer-widget-wrapper py-5">
                            <?php Guten_Learn_Theme::the_default_recent_post(); ?>
                        </aside>
                        <aside class="col footer-widget-wrapper py-5">
                            <?php Guten_Learn_Theme::the_default_archive(); ?>
                        </aside>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif;
