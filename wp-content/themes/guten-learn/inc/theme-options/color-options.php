<?php
/**
* Register breadcrumb Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_color_options(){	
	Guten_Learn_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > color options
		'section' => array(
		    'id'       => 'color-section',
		    'title'    => esc_html__( 'Color Options' ,'guten-learn' ),
		    'priority' => 5
		),
		'fields'  =>array(
			array(
				'id'      => 'primary-color',
				'label'   => esc_html__( 'Primary Color', 'guten-learn' ),
				'default' => '#e74d57',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'body-paragraph-color',
				'label'   => esc_html__( 'Body Text Color', 'guten-learn' ),
				'default' => '#5f5f5f',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'   => 'line-1',
				'type' => 'guten-learn-horizontal-line',
			),
			array(
				'id'      => 'link-color',
				'label'   => esc_html__( 'Link Color', 'guten-learn' ),
				'default' => '#145fa0',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'link-hover-color',
				'label'   => esc_html__( 'Link Hover Color', 'guten-learn' ),
				'default' => '#737373',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'   => 'line-2',
				'type' => 'guten-learn-horizontal-line',
			),
			array(
				'id'      => 'sb-widget-title-color',
				'label'   => esc_html__( 'Sidebar Widget Title Color', 'guten-learn' ),
				'default' => '#000000',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'sb-widget-content-color',
				'label'   => esc_html__( 'Sidebar Widget Content Color', 'guten-learn' ),
				'default' => '#282835',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'   => 'line-3',
				'type' => 'guten-learn-horizontal-line',
			),
			array(
				'id'      => 'footer-title-color',
				'label'   => esc_html__( 'Footer Widget Title Color', 'guten-learn' ),
				'default' => '#fff',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'footer-content-color',
				'label'   => esc_html__( 'Footer Widget Content Color', 'guten-learn' ),
				'default' => '#a8a8a8',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'   => 'line-4',
				'type' => 'guten-learn-horizontal-line',
			),
			array(
				'id'      => 'footer-top-background-color',
				'label'   => esc_html__( 'Footer Background Color', 'guten-learn' ),
				'default' => '#28292a',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'footer-copyright-background-color',
				'label'   => esc_html__( 'Footer Copyright Background Color', 'guten-learn' ),
				'default' => '#0c0808',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'footer-copyright-text-color',
				'label'   => esc_html__( 'Footer Copyright Text Color', 'guten-learn' ),
				'default' => '#ffffff',
				'type'    => 'guten-learn-color-picker',
			),
		),			
	));
}
add_action( 'init', 'guten_learn_color_options' );