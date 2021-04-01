<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0
 * @package Fansee Business WordPress theme
 */
$show_widget = true;
if( is_page() || is_single() || is_home() ){

	
	$id = fansee_business_get_page_id();
	
	if( 'on' == get_post_meta( $id, 'fansee-business-disable-footer-widget', true ) ){
		$show_widget = false;
	}
} 

$show_social_menu = fansee_business_get( 'footer-social-menu' );
$scroll = fansee_business_get( 'enable-scroll-to-top' );
$footer_text = fansee_business_get('footer-copyright-text');
?>
	<section <?php echo fansee_business_schema( 'footer' ); ?> class="fansee-business-footer-wrapper">
		<?php if( $show_widget ): ?>
			<div class="container-fluid px-md-5">
				<footer class="fansee-business-footer-wrapper-inner footer-widget">
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'fansee-business-footer-widget-1' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'fansee-business-footer-widget-2' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'fansee-business-footer-widget-3' ); ?></div>
					<div class="footer-widget-wrapper"><?php dynamic_sidebar( 'fansee-business-footer-widget-4' ); ?></div>
				</footer>
			</div>
		<?php endif; ?>
		
		<div class="fansee-business-copyright">
			<div class="container-fluid">
				<div class="fansee-business-copyright-inner">
					<div class="fansee-business-copy-right">
						<div class="pr-0">
							<?php echo esc_html( $footer_text ); ?>		
						</div> 
						<div class="fansee-business-credit-link">						
							<?php esc_html_e( 'Created By:' , 'fansee-business' ) ?>
							<a class="pl-1" href="<?php echo esc_url( '//www.fanseethemes.com' ); ?>" target="_blank">
								<?php esc_html_e( 'Fansee Themes', 'fansee-business' ); ?>	                     		
							</a>
						</div>
					</div>

					<?php if( $show_social_menu ): ?>
						<div class="fansee-business-social-menu">
							<?php 
								wp_nav_menu(array(
									'theme_location' => 'social-menu-footer',
									'menu_id'      => 'social-menu-footer',
									'menu_class'   => 'menu',
									'link_before'  => '<span>',
									'link_after'   => '</span>',
									'fallback_cb'  => 'fansee_business_default_social_menu',
									'depth'        => 1,
									'echo'         => true
								));
							?>
						</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</section>
	<?php if( $scroll ): ?>
		<div class="fansee-business-stt scroll-to-top">
			<i class="fa fa-arrow-up"></i>
		</div>
	<?php endif; ?>
	<?php wp_footer(); ?>
 </body>
 </html>