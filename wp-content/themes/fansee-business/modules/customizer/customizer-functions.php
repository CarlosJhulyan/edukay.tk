<?php
/**
 * include customizer classes
 * @since Fansee Business 1.0
 */
function fansee_business_customizer_files( $files ){

	$new_files = array(
		'class-customizer.php',
		# custom controls for customizer
		'controls/toggle/class-toggle.php',
		'controls/page-repeater/class-page-repeater.php',
		'controls/slider/class-slider.php',
		'controls/link/class-link.php',

		# theme options
		'sections/class-frontpage.php',
		'sections/class-theme-options.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'fansee_business_modules_customizer', 'fansee_business_customizer_files' );

/**
 * Get theme mod
 * @since Fansee Business 1.0
 */
function fansee_business_get( $id ){
	return Fansee_Business_Customizer::get( $id );
}

/**
 * Register customizer options
 * @since Fansee Business 1.0
 */
function fansee_business_customizer_register( $wp_customize ){

	$cus = new Fansee_Business_Customizer();
	$cus->fields = array(
		array(
			'id'       => 'go-to-pro',
			'title'    => esc_html__( 'Need More Features ? - Buy Pro', 'fansee-business' ),
			'type'     => 'link',
			'url'      => esc_url( 'fanseethemes.com/downloads/fansee-business-pro/' ),
			'priority' => 0
		)
	);
	
	$cus->add();

	$panel = array(
		'id' => Fansee_Business_Customizer::get_id( 'frontpage' ),
		'args' => array(
			'title'    => esc_html__( 'Front Page Options', 'fansee-business' ),
			'priority' => 10,
		)
	);
	new Fansee_Business_Frontpage_Customizer( $panel );

	$panel = array(
		'id' => Fansee_Business_Customizer::get_id( 'theme-options' ),
		'args' => array(
			'title'    => esc_html__( 'Theme Options', 'fansee-business' ),
			'priority' => 10,
		)
	);
	new Fansee_Business_Theme_Options_Customizer( $panel );



	
}
add_action( 'init', 'fansee_business_customizer_register' );

/**
 * enqueue scripts and styles for customizer 
 * @since Fansee Business 1.0
 */
function fansee_business_custom_controls_script(){

	$script = get_theme_file_uri( 'assets/js/customizer.js' );
	$deps   = array( 'jquery', 'customize-base', 'jquery-ui-slider', 'jquery-ui-button' );
	$style  = get_theme_file_uri( 'assets/css/customizer.css' );

	wp_enqueue_script( 'fansee-business-customizer-js', $script, $deps, '1.0', true );
	wp_enqueue_style( 'fansee-business-customizer-css', $style );
}
add_action( 'customize_controls_enqueue_scripts', 'fansee_business_custom_controls_script', 99	);

/**
 * Modify default customizer placement
 * @since Fansee Business 1.0
 */
function fansee_business_customize_register( $wp_customize ){
	$color_section = 'fansee-business-color-section';
	$wp_customize->get_control( 'header_textcolor' )->section = $color_section;
	$wp_customize->get_control( 'background_color' )->section = $color_section;		

	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header', 'fansee-business' );
	$wp_customize->get_section( 'header_image' )->panel = 'fansee-business-theme-options';
}
add_action( 'customize_register', 'fansee_business_customize_register' );