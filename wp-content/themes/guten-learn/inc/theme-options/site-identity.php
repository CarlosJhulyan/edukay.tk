<?php
/**
 * Register font size and choice to display logo or title.
 *
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */

/**
* Register Site Identity Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_site_identity(){
	Guten_Learn_Customizer::set(array(
		# Site Identity > title size || title or logo
		'section' => array(
			'id' => 'title_tagline',
			'prefix' => false,
		),
		'fields'  => array(
		    array(
		        'id'	  	  => 'title-size',
		        'label'   	  => esc_html__( 'Title Size', 'guten-learn' ),
		        'description' => esc_html__( 'The value is in px.' , 'guten-learn' ),
		        'default' => array(
		    		'desktop' => 28,
		    		'tablet'  => 22,
		    		'mobile'  => 22,
		    	),
				'input_attrs' =>  array(
		            'min'   => 1,
		            'max'   => 60,
		            'step'  => 1,
		        ),
		        'type'    => 'guten-learn-slider',
		    ),
	        array(
	            'id'	  	  => 'tagline-size',
	            'label'   	  => esc_html__( 'Tagline Size', 'guten-learn' ),
	            'description' => esc_html__( 'The value is in px.' , 'guten-learn' ),
	            'default' => array(
	        		'desktop' => 14,
	        		'tablet'  => 14,
	        		'mobile'  => 14,
	        	),
	    		'input_attrs' =>  array(
	                'min'   => 1,
	                'max'   => 35,
	                'step'  => 1,
	            ),
	            'type'    => 'guten-learn-slider',
	        ),
            array(
    	        'id'	  	  => 'logo-size',
    	        'label'   	  => esc_html__( 'Logo Size', 'guten-learn' ),
    	        'description' => esc_html__( 'The value is in px.' , 'guten-learn' ),
    	        'default' => array(
    	    		'desktop' => 200,
    	    		'tablet'  => 200,
    	    		'mobile'  => 200,
    	    	),
    			'input_attrs' =>  array(
    	            'min'   => 1,
    	            'max'   => 500,
    	            'step'  => 1,
    	        ),
    	        'type'    => 'guten-learn-slider',
    	    )
		)	
	));
}
add_action( 'init', 'guten_learn_site_identity' );