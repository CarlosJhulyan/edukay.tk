<?php
/**
 * The Header for our theme.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Fansee Business 1.0 
 */
$preloader = fansee_business_get( 'pre-loader' );
$search = fansee_business_get( 'enable-search' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	 	<meta charset="<?php bloginfo( 'charset' ); ?>">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
	 	<?php wp_head(); ?>
	</head>
	<body <?php echo fansee_business_schema( 'body' ); body_class(); ?> >

	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#site-content">
		<?php esc_html_e( 'Skip to content', 'fansee-business' ); ?>
	</a>

	<?php if( $preloader ): ?>
		<div id="loader-wrapper" class="fansee-business-loader-wrapper">
			<svg id="loaded" class="fansee-business-loader"><circle cx="70" cy="70" r="30" fill="#ddd" style=""></circle></svg>
		</div>
	<?php endif; ?>
	<header id="site-header" <?php echo fansee_business_schema( 'header' ); ?> class="site-header">
		<div class="container">
			<div class="row header-wrapper">
				<div class="col-6 col-sm-4">
					<div class="header-titles">
						<?php the_custom_logo(); ?>
						<div class="site-branding">
							<?php if ( is_front_page() || is_archive() ) :
								?>
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</h1>
								<?php
							else :
								?>
								<p class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								</p>
								<?php
							endif;
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-sm-8">
					<div class="header-navigation-wrapper">
						<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'fansee-business' ); ?>" role="navigation">
							<?php 
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'echo'           => true,
									'container'      => false,
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'navigation clearfix'
								)); 
							?>
						</nav><!-- .primary-menu-wrapper -->

						<?php if( $search ): ?>
							<div class="fansee-business-header-icons">
								<a href="#" class="fansee-business-search-icon fansee-business-toggle-search">
									<i class="fa fa-search"></i>
								</a>
							</div>
						<?php endif; ?>
						<a href="#" class="fst-mmenu-toggler" id="menu-toggler">
							<span></span>
						  	<span></span>
						  	<span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
