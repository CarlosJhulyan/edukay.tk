<?php
/**
 * Create options for posts.
 *
 * @since 1.0.0
 *
 * @package Guten Learn WordPress Theme
 */

function guten_learn_post_options(){  
    Guten_Learn_Customizer::set(array(
    	# Theme Options
    	'panel'   => 'panel',
    	# Theme Options > Page Options > Settings
    	'section' => array(
    		'id'    => 'post-options',
    		'title' => esc_html__( 'Post Options','guten-learn' ),
    	),
    	'fields' => array(
            array(
                'id'      => 'post-category',
                'label'   =>  esc_html__( 'Show Categories', 'guten-learn' ),
                'default' => 1,
                'type'    => 'guten-learn-toggle',
            ),
            array(
                'id'      => 'post-date',
                'label'   => esc_html__( 'Show Date', 'guten-learn' ),
                'default' => 1,
                'type'    => 'guten-learn-toggle',
            ),
            array(
                'id'      => 'post-author',
                'label'   =>  esc_html__( 'Show Author', 'guten-learn' ),
                'default' => 1,
                'type'    => 'guten-learn-toggle',
            ),
            array(
                'id'      => 'excerpt_length',
                'label'   => esc_html__( 'Excerpt Length', 'guten-learn' ),
                'description' => esc_html__( 'Defaults to 10.', 'guten-learn' ),
                'default' => 10,
                'type'    => 'number',
            ),
            array(
                'id'      => 'read-more-text',
                'label'   => esc_html__( 'Read More Text', 'guten-learn' ),
                'default' => esc_html__( 'Read More', 'guten-learn' ),
                'type'    => 'text'
            ),
            array(
                'id' => 'post-per-row',
                'label' => esc_html__( 'Post Per Row', 'guten-learn' ),
                'type' => 'guten-learn-buttonset',
                'default' => '1',
                'choices' => array(
                    '1' => esc_html__( '1', 'guten-learn' ),
                    '2' => esc_html__( '2', 'guten-learn' ),
                    '3' => esc_html__( '3', 'guten-learn' ),
                    '4' => esc_html__( '4', 'guten-learn' )
                )
            ),
     	),
    ) );
}
add_action( 'init', 'guten_learn_post_options' );