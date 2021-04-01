<?php
/**
* Register Go to pro button
*
* @since 1.0.3
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_go_to_pro(){
	Guten_learn_Customizer::set(array(
		'section' => array(
			'id'       => 'go-to-pro', 
			'type'     => 'guten-learn-anchor',
			'title'    => esc_html__( 'Guten Learn Pro', 'guten-learn' ),
			'url'      => esc_url( 'https://risethemes.com/downloads/guten-learn-pro-unlock-features/' ),
			'priority' => 0
		)
	));
}
add_action( 'init', 'guten_learn_go_to_pro' );