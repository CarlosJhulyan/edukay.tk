<?php
/**
 * Add scripts and styles
 * @since Fansee Business 1.0
 */
function fansee_business_scripts(){

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'fansee-business-style', get_stylesheet_uri(), array(), $theme_version );

	$type = WP_DEBUG ? 'min.' : ''; //min.
	$scripts = array( 
		'slick' => array(
			'version' => '1.8.0'
		),
		'fst-mmenu' => array(
			'version' => '1.0.0'
		),
		'fst-popup-search' => array(
			'version' => '1.0.0'
		)
	);
	# vendors style and scripts
	foreach( $scripts as $h => $script ){
		$v = $script[ 'version' ];
		$path = "assets/vendors/{$h}/css/{$h}.{$type}css";
		wp_enqueue_style( $h, get_theme_file_uri( $path ), array(), $v );

		$path = "assets/vendors/{$h}/js/{$h}.{$type}js";
		wp_enqueue_script( $h, get_theme_file_uri( $path ), array( 'jquery' ), $v );
	}

	$scripts = array( 
		'bootstrap' => array(
			'version' => '4.3.1'
		), 
		'font-awesome' => array(
			'version' => '4.7.0'
		) 
	);

	# vendors style
	foreach( $scripts as $h => $script ){
		$v = $script[ 'version' ];
		$path = "assets/vendors/{$h}/css/{$h}.{$type}css";
		wp_enqueue_style( $h, get_theme_file_uri( $path ), array(), $v );
	}

	$scripts = array( 'blocks' => array() );
	# blocks style
	foreach( $scripts as $h => $script ){
		$path = "assets/css/{$h}.{$type}css";
		wp_enqueue_style( 'fansee-business-'.$h.'-style', get_theme_file_uri( $path ), array(), $theme_version );
	}

	$scripts = array( 'main' => array() );
	# blocks style
	foreach( $scripts as $h => $script ){
		$path = "assets/css/{$h}.{$type}css";
		wp_enqueue_style( 'fansee-business-'.$h.'-style', get_theme_file_uri( $path ), array(), $theme_version );
		
		$path = "assets/js/{$h}.{$type}js";
		wp_enqueue_script( 'fansee-business-'.$h.'-script', get_theme_file_uri( $path ), array( 'jquery' ), $theme_version );
	}

	wp_localize_script( 'fansee-business-main-script', 'FANSEE', array(
		'search_label' => esc_html__( 'What are you looking for?', 'fansee-business' ),
		'home_url'     => esc_url( home_url( '/' ) )
	));

	#fonts
	wp_enqueue_style( 'fansee-business-fonts', fansee_business_generate_font_url() );
	# enqueue comment-reply.js in single page only
	if( ( is_single() || is_page() ) && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}

	# load rtl.css if site is RTL
	if( is_rtl() ){	
		wp_enqueue_style( 'fansee-business-rtl', get_theme_file_uri( 'rtl.css' ), array(), $theme_version );
	}
}
add_action( 'wp_enqueue_scripts', 'fansee_business_scripts' ); 

/**
 * Add block assets
 * @since Fansee Business 1.0
 */
function fansee_business_editor_assets(){
	$theme_version = wp_get_theme()->get( 'Version' );
	$type = WP_DEBUG ? 'min.' : ''; //min.
	wp_enqueue_style( 'fansee-business-editor-style', get_theme_file_uri( "assets/css/block-editor-styles.{$type}css" ), array(), $theme_version );
}
add_action( 'enqueue_block_editor_assets', 'fansee_business_editor_assets' );

/**
 * Add css for backend
 * @since Fansee Business 1.0
 */
function fansee_business_admin_scripts(){
	$theme_version = wp_get_theme()->get( 'Version' );
	$type = WP_DEBUG ? 'min.' : ''; //min.
	wp_enqueue_style( 'fansee-business-admin-style', get_theme_file_uri( "assets/css/admin.{$type}css" ), array(), $theme_version );
}
add_action( 'admin_enqueue_scripts', 'fansee_business_admin_scripts' );