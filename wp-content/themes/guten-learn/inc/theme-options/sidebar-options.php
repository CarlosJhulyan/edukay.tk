<?php
/**
* Register sidebar Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_sidebar_options(){
	Guten_Learn_Customizer::set(array(
		# Theme Options
		'panel'   => 'panel',
		# Theme Options >Sidebar Layout > Settings
		'section' => array(
			'id'     => 'sidebar-options',
			'title'  => esc_html__( 'Sidebar Options','guten-learn' ),
		),
		'fields' => array(
			# sb - Sidebar
			array(
			    'id'      => 'sidebar-position',
			    'label'   => esc_html__( 'Sidebar Position' , 'guten-learn' ),
			    'type'    => 'guten-learn-buttonset',
			    'default' => 'right-sidebar',
			    'choices' => array(
			        'left-sidebar'  => esc_html__( 'Left' , 'guten-learn' ),
			        'right-sidebar' => esc_html__( 'Right' , 'guten-learn' ),
			        'no-sidebar'    => esc_html__( 'None', 'guten-learn' ),
			     )
			),
		),
	) );
}
add_action( 'init', 'guten_learn_sidebar_options' );