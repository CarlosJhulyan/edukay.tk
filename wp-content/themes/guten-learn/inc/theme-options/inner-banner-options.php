<?php
/**
 * Inner banner options in customizer
 *
 * @return void
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */

function guten_learn_inner_banner_options(){ 
	Guten_Learn_Customizer::set(array(
		# Theme Option > color options
		'section' => array(
		    'id'       => 'header_image',
		    'priority' => 27,
		    'prefix' => false,
		),
		'fields'  => array(
			array(
				'id'      	  => 'ib-blog-title',
				'label'   	  => esc_html__( 'Title' , 'guten-learn' ),
				'description' => esc_html__( 'It is displayed when home page is latest posts.' , 'guten-learn' ),
				'default' 	  => esc_html__( 'Latest Blog' , 'guten-learn' ),
				'type'	  	  => 'text',
				'priority'    => 10,
			),
		    array(
		        'id'	  	  => 'ib-title-size',
		        'label'   	  => esc_html__( 'Font Size', 'guten-learn' ),
		        'description' => esc_html__( 'The value is in px. Defaults to 40px.' , 'guten-learn' ),
		        'default' => array(
		    		'desktop' => 40,
		    		'tablet'  => 32,
		    		'mobile'  => 32,
		    	),
				'input_attrs' =>  array(
		            'min'   => 1,
		            'max'   => 60,
		            'step'  => 1,
		        ),
		        'type' => 'guten-learn-slider',
		        'priority' => 20
		    ),
		    array(
		        'id'      => 'ib-title-color',
		        'label'   => esc_html__( 'Text Color' , 'guten-learn' ),
		        'type'    => 'guten-learn-color-picker',
		        'default' => '#ffffff',
		        'priority' => 30
		    ),
		    array(
		    	'id' 	   => 'ib-background-color',
		    	'label'    => esc_html__( 'Overlay Color', 'guten-learn' ),
		    	'default'  => 'rgba(0, 0, 0, 0.49)',
		    	'type' 	   => 'guten-learn-color-picker',
		    	'priority' => 40,
		    ),
		    array(
		        'id'      => 'ib-text-align',
		        'label'   => esc_html__( 'Alignment' , 'guten-learn' ),
		        'type'    => 'guten-learn-buttonset',
		        'default' => 'banner-content-center',
		        'choices' => array(
		        	'banner-content-left'   => esc_html__( 'Left' , 'guten-learn'   ),
		        	'banner-content-center' => esc_html__( 'Center' , 'guten-learn' ),
		        	'banner-content-right'  => esc_html__( 'Right' , 'guten-learn'  ),
		         ),
		        'priority' => 50
		    ),
			array(
			    'id'      => 'ib-image-attachment', 
			    'label'   => esc_html__( 'Image Attachment' , 'guten-learn' ),
			    'type'    => 'guten-learn-buttonset',
			    'default' => 'banner-background-scroll',
			    'choices' => array(
			    	'banner-background-scroll'           => esc_html__( 'Scroll' , 'guten-learn' ),
			    	'banner-background-attachment-fixed' => esc_html__( 'Fixed' , 'guten-learn' ),
			    ),
		        'priority' => 60
			),
			array(
			    'id'      	=> 'ib-height',
			    'label'   	=> esc_html__( 'Height (px)', 'guten-learn' ),
			    'type'    	=> 'guten-learn-slider',
	            'description' => esc_html__( 'The value is in px. Defaults to 420px.' , 'guten-learn' ),
	            'default' => array(
	        		'desktop' => 300,
	        		'tablet'  => 300,
	        		'mobile'  => 300,
	        	),
	    		'input_attrs' =>  array(
	                'min'   => 1,
	                'max'   => 1000,
	                'step'  => 1,
	            ),
			),
		    'priority' => 70
		),
	) );
}
add_action( 'init', 'guten_learn_inner_banner_options' );