<?php
/**
 * Resets all the value of customizer
 *
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */

if( !function_exists( 'guten_learn_get_setting_id' ) ):
	add_action( 
		Guten_Learn_Helper::fn_prefix( 'customize_register_start' ), 
		'guten_learn_get_setting_id', 30, 2 );
	/**
	* Get all the setting id to reset the data.
	*
	* @return array
	* @since 1.0.0
	*
	* @package Guten Learn WordPress Theme
	*/
	function guten_learn_get_setting_id( $instance, $wp_customize ) {
		
		Guten_Learn_Customizer::set(array(
			# Theme option
			'panel' => 'panel',
			# Theme Option > Reset options
			'section' => array(
			    'id'    => 'reset-section',
			    'title' => esc_html__( 'Reset Options' ,'guten-learn' ),
			),
			'fields' => array(
				array(
				    'id' 	      => 'reset-options',
				    'type'        => 'guten-learn-reset',
				    'settings'    => array_keys( $instance::$settings ),
				    'label'       => esc_html__( 'Reset', 'guten-learn' ),
				    'description' => esc_html__( 'Reseting will delete all the data. Once reset, you will not be able to get back those data.', 'guten-learn' ),
				),
			),
		) );
	}
endif;
