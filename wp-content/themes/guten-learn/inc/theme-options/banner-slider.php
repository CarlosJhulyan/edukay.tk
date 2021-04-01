<?php

if( !function_exists( 'guten_learn_acb_type_cat' ) ):
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
	function guten_learn_acb_type_cat( $control ){
		$enable = $control->manager->get_setting( Guten_Learn_Helper::with_prefix( 'show-slider' ) )->value();
		$cat = $control->manager->get_setting( Guten_Learn_Helper::with_prefix( 'slider-type' ) )->value();
		$val = $enable && 'category' == $cat;
		return $val;
	}
endif;

if( !function_exists( 'guten_learn_acb_slider' ) ):
	/**
	* Active callback function of slider
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Guten Learn WordPress Theme
	*/
	function guten_learn_acb_slider( $control ){
		$val = $control->manager->get_setting( Guten_Learn_Helper::with_prefix( 'show-slider' ) )->value();
		return $val;
	}
endif;

/**
* Banner Slider Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_slider_options(){

	Guten_learn_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'slider',
		    'title' => esc_html__( 'Home Page Slider', 'guten-learn' ),
		    'priority' => 0
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
			    'id'	  => 'show-slider',
			    'label'   => esc_html__( 'Enable Slider', 'guten-learn' ),
			    'default' => true,
			    'type'    => 'guten-learn-toggle',
			),
			array(
				'id' => 'slider-more-text',
				'label' => esc_html__( 'Read More Text', 'guten-learn' ),
				'default' => esc_html__( 'Read More', 'guten-learn' ),
				'active_callback' => array(
					'fn_name' => 'guten_learn_acb_slider'
				),
				'type' => 'text'
			),
			array(
			    'id'      => 'slider-type',
			    'label'   => esc_html__( 'Get Content From', 'guten-learn' ),
			    'type'    => 'guten-learn-buttonset',
			    'default' => 'category',
			    'active_callback' => array(
			    	'fn_name' => 'guten_learn_acb_slider'
			    ),
			    'choices' => array(
			        'post' => esc_html__( 'Recent Post', 'guten-learn' ),
			        'category'  => esc_html__( 'Category', 'guten-learn' ),
			    )
			),
			array(
				'id' => 'cat-post',
				'label' => esc_html__( 'Select Category', 'guten-learn' ),
				'default' => 0,
				'type' => 'geten-learn-category-dropdown',
				'active_callback' => array(
					'fn_name' => 'guten_learn_acb_type_cat'
				),
			)
		)
	));
}
add_action( 'init', 'guten_learn_slider_options' );