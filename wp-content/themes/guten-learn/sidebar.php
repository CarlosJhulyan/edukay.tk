<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */

if ( is_active_sidebar( 'gutenlearn_sidebar' ) ) { ?>	
	<aside id="secondary" class="widget-area">
		<?php 
			$sidebar = apply_filters( Guten_Learn_Theme::fn_prefix( 'sidebar' ), 'gutenlearn_sidebar' );
			dynamic_sidebar( $sidebar ); ?>
	</aside><!-- #secondary -->
<?php } else { ?>
    <aside id="secondary" class="widget-area">	    	
       <?php 
	       Guten_Learn_Theme::the_default_search();
	       Guten_Learn_Theme::the_default_recent_post();
	       Guten_Learn_Theme::the_default_archive();
       ?>
    </aside>
<?php }
?>
