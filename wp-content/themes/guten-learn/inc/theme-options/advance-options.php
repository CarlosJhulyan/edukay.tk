<?php
if( !function_exists( 'guten_learn_acb_custom_header_one' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Guten Learn WordPress Theme
	*/
	function guten_learn_acb_custom_header_one( $control ){
		$value = $control->manager->get_setting( Guten_Learn_Helper::with_prefix( 'container-width' ) )->value();
		return 'default' == $value;
	}
endif;

/**
* Register Advanced Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_advanced_options(){

	Guten_Learn_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'advance-options',
		    'title' => esc_html__( 'Advanced Options', 'guten-learn' ),
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'pre-loader',
				'label' => esc_html__( 'Show Preloader', 'guten-learn' ),
				'default' => false,
				'type'  => 'guten-learn-toggle',
			),
			array(
			    'id'      => 'assets-version',
			    'label'   => esc_html__( 'Assets Version', 'guten-learn' ),
			    'type'    => 'guten-learn-buttonset',
			    'default' => 'development',
			    'choices' => array(
			        'development' => esc_html__( 'Development', 'guten-learn' ),
			        'production'  => esc_html__( 'Production', 'guten-learn' ),
			    )
			),
			array(
			    'id'      =>  'container-width',
			    'label'   => esc_html__( 'Site Layout', 'guten-learn' ),
			    'type'    => 'guten-learn-buttonset',
			    'default' => 'default',
			    'choices' => array(
			        'default' => esc_html__( 'Default', 'guten-learn' ),
			        'box'	  => esc_html__( 'Boxed', 'guten-learn' ),
			    )
			),
		    array(
		        'id'          	  => 'container-custom-width',
		        'label'   	  	  => esc_html__( 'Container Width', 'guten-learn' ),
		        'active_callback' => array(
		        	'fn_name' => 'guten_learn_acb_custom_header_one'
		        ),
		        'type'        	  => 'guten-learn-range',
		        'default'     	  => '1140',
	    		'input_attrs' 	  =>  array(
	                'min'   => 400,
	                'max'   => 2000,
	                'step'  => 5,
	            ),
		    ),
		)
	));
}
add_action( 'init', 'guten_learn_advanced_options' );