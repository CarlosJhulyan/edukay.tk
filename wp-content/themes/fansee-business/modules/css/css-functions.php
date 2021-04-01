<?php
/**
 * Prints dynamic styles
 * @since Fansee Business 1.0
 */
function fansee_business_dynamic_styles(){

	#dynamic fonts
	$fonts         = fansee_business_get_fonts();
	$info_fonts    = fansee_business_get( 'site-info-font' );
	$body_fonts    = fansee_business_get( 'body-font' );
	$heading_fonts = fansee_business_get( 'heading-font' );

	#dynamic colors
	$primary_color     = fansee_business_get( 'primary-color' );
	$paragraph_color   = fansee_business_get( 'body-paragraph-color' );
	$link_color        = fansee_business_get( 'link-color' );
	$link_hover_color  = fansee_business_get( 'link-hover-color' );
	$header_text_color = get_header_textcolor();
	$svg_color         = fansee_business_get( 'svg-bg-color' );

	#banner options
	$banner_title_color = fansee_business_get( 'banner-title-color' );
	$banner_bg_color    = fansee_business_get( 'banner-bg-color' );
	$banner_overlay     = fansee_business_get( 'banner-bg-overlay' );

	#banner height
	$banner_height_mobile  = fansee_business_get( 'banner-height-mobile' );
	$banner_height_tablet  = fansee_business_get( 'banner-height-tablet' );
	$banner_height_desktop = fansee_business_get( 'banner-height-desktop' );
	?>
	<style type="text/css">
		<?php if(! display_header_text() ): ?>
			.site-title, .site-description{
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php endif; ?>

		.site-title, .site-title a, .site-description{
			font-family: "<?php echo esc_html( $fonts[ $info_fonts ][ 'family' ] ); ?>";
			color: #<?php echo esc_html( $header_text_color ); ?>;
		}

		body{
			font-family: "<?php echo esc_html( $fonts[ $body_fonts ][ 'family' ] ); ?>";
		}

		h1,h2,h3,h4,h5,h6, .h1, .h2, .h3, .h4, .h5, .h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
			font-family: "<?php echo esc_html( $fonts[ $heading_fonts ][ 'family' ] ); ?>";
		}

		body, body p{
			color: <?php echo esc_html( $paragraph_color ); ?>;;
		
		}

		a{
			color: <?php echo esc_html( $link_color ); ?>;;
		}

		a:hover{
			color: <?php echo esc_html( $link_hover_color ); ?>;;
		}

		.fansee-business-btn-primary, 
		.comment-respond .comment-form input[type="submit"], 
		.no-results.not-found a,
		.fansee-business-stt,
		.fansee-business-cta-section:after,
		.fansee-business-news-section .fansee-business-news-box .fansee-business-news-content .fansee-business-news-box-meta .post-categories a:hover,
		#secondary .widget:not(.widget_search) .widget-title::before,
		.woocommerce ul.products li.product .button, .woocommerce ul.products li.product .added_to_cart.wc-forward,
		.woocommerce-cart .woocommerce form.woocommerce-cart-form table button.button,
		.woocommerce-cart .woocommerce .cart-collaterals .cart_totals a.checkout-button.button.alt.wc-forward,
		form.woocommerce-checkout div#order_review #payment button#place_order,
		.widget_tag_cloud .tagcloud a,
		.footer-widget .widget-title:before,
		.post-categories li a:hover,
		.fansee-businsess-tags-wrapper ul li a:hover,
		input[type=submit], 
		button[type="submit"]{
			background: <?php echo esc_html( $primary_color ); ?>;
		}		

		.fansee-business-news-section .fansee-business-news-box .fansee-business-news-date span.news-post-day,
		.slick-slide:not(.slick-center) .fansee-business-testimonials-box i,
		.fansee-business-testimonials-section .fansee-business-testimonials-box h3,
		.header-navigation-wrapper .primary-menu-wrapper > ul > li.current-menu-item > a, 
		.header-navigation-wrapper .primary-menu-wrapper > div > ul > li.current-menu-item > a,
		.header-navigation-wrapper .primary-menu-wrapper > ul > li:hover > a, 
		.header-navigation-wrapper .primary-menu-wrapper > div > ul > li:hover > a,
		.fansee-business-team-section .fansee-business-team-box:hover h3,
		.fansee-business-news-section .fansee-business-news-box:hover h3 a,
		.fansee-business-post .fansee-business-date .day{
			color: <?php echo esc_html( $primary_color ); ?>;
		}

		.fansee-business-news-section .fansee-business-news-box .fansee-business-news-content .fansee-business-news-box-meta .post-categories a,
		.post-categories li a, .fansee-businsess-tags-wrapper ul li a{
			border-color: <?php echo esc_html( $primary_color ); ?>;
		
		}

		.fansee-business-loader-wrapper .fansee-business-loader circle{
			stroke: <?php echo esc_html( $primary_color ); ?>;
		
		}
		.fansee-business-arrow svg:hover{
			fill: <?php echo esc_html( $primary_color ); ?>;
		
		}

		#secondary .widget:not(.widget_search) .widget-title::before,
		.footer-widget .widget-title:before{
			box-shadow: -3px 0 0 0 #fff, -6px 0 0 0 <?php echo esc_html( $primary_color ); ?>, -9px 0 0 0 #fff, -12px 0 0 0 <?php echo esc_html( $primary_color ); ?>;
		}

		.fansee-business-inner-banner-wrapper .entry-title, .fansee-business-inner-banner-wrapper .breadcrumb-wrapper ul li a,  .fansee-business-inner-banner-wrapper .breadcrumb-wrapper ul li{
			color: <?php echo esc_html( $banner_title_color ); ?>;
		}

		.fansee-business-inner-banner-wrapper{
			min-height: <?php echo esc_html( $banner_height_desktop ); ?>px;
		}

		.fansee-business-inner-banner-wrapper:after{
			background-color: <?php echo esc_html( $banner_bg_color ); ?>;
			opacity: <?php echo esc_html( $banner_overlay / 10 ); ?>;
		}

		.fansee-business-frontpage-shape path{
			fill: <?php echo esc_html( $svg_color ); ?>;
		}

		/* responsive style for tablet */

		@media (max-width: 1024px) {
		  	.fansee-business-inner-banner-wrapper{
				min-height: <?php echo esc_html( $banner_height_tablet ); ?>px;
			}
		}

		/* responsive style for mobile */

		@media (max-width: 767px) {
		  	.fansee-business-inner-banner-wrapper{
				min-height: <?php echo esc_html( $banner_height_mobile ); ?>px;
			}
		}

	</style>
	<?php
}
add_action( 'wp_head', 'fansee_business_dynamic_styles' );