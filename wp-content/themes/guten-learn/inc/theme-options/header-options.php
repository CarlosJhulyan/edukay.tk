<?php
/**
* Register sidebar Options
*
* @return void
* @since 1.0.0
*
* @package Guten Learn WordPress Theme
*/
function guten_learn_header_options(){
	Guten_Learn_Customizer::set(array(
		# Theme Options
		'panel'   => 'panel',
		# Theme Options >Sidebar Layout > Settings
		'section' => array(
			'id'     => 'header-options',
			'title'  => esc_html__( 'Header Options','guten-learn' ),
			'priority' => 0
		),
		'fields' => array(
			array(
			    'id'      	  => 'layout-header',
			    'label'   	  => esc_html__( 'Header Layout', 'guten-learn' ),
			    'type'    	  => 'guten-learn-radio-image',
			    'default' 	  => '2',
			    'choices' 	  => array(
			        '1' => array(
			            'label' => esc_html__( 'Header left', 'guten-learn' ),
						'url'   => false,
						'svg' => '
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWAgMAAABDdZAYAAAACVBMVEVsrrrq6ur///9uMR70AAAAV0lEQVRYw+3YIQ6AMAwF0J5np5nB7HTIZafEbI4EUUgIvK+aiqd+KhpbPjVuQdpIBwKBQCAQCOTDyB4rBfI40ufqavoToid5xGWDQCAQCAQCOUNe86M+AILt9aRr0ixjAAAAAElFTkSuQmCC"/></svg>'
			        ),
			        '2' => array(
			            'label' => esc_html__( 'Header center', 'guten-learn' ),
						'url'   => false,
						'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWAgMAAABDdZAYAAAADFBMVEVsrrq2193q6ur///+zG1jiAAAAWElEQVRYw+3YIQ6AMBAEwHM8g6/0qWgML2xa0VQSRJsUwqw6NWqz4uIczxFTkKsMBwKBQCCrkBw9GwQC+SRi2SAQCGQqktow70/XnxA9gUAgEMgd8pofdQU21isgaTepogAAAABJRU5ErkJggg=="/></svg>'
			        ),
			        '3' => array(
			            'label' => esc_html__( 'Header right', 'guten-learn' ),
						'url'   => false,
						'svg' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWAgMAAABDdZAYAAAACVBMVEVsrrrq6ur///9uMR70AAAAVUlEQVRYw+3YIQ7AIAxA0WYnnMHsNDvKNKdEkAXHBBMkfV81iKeaCqKsd8YvyFWXg0AgEAgEAoGM7niDzJCnPxxfUybEnuyCuGwQCAQCgUBSINv8UTetgvqEGXmt+wAAAABJRU5ErkJggg=="/></svg>'
			        )
			    )
			),
			array(
				'id'      => 'header-bg-color',
				'label'   => esc_html__( 'Header Background Color', 'guten-learn' ),
				'default' => '#ffffff',
				'type'    => 'guten-learn-color-picker',
			),
			array(
				'id'      => 'primary-menu-item-color',
				'label'   => esc_html__( 'Primary Menu Item color', 'guten-learn' ),
				'default' => '#737373',
				'type'    => 'guten-learn-color-picker',
			),
		) 
	) );
}
add_action( 'init', 'guten_learn_header_options' );







