<?php
/**
 * Wrapper for making customizer options
 * @since Fansee Business 1.0
 */
if( !class_exists( 'Fansee_Business_Customizer' ) ){
	class Fansee_Business_Customizer{

		public static $defaults = array();

		public static $default_sections = array( 'header_image' );

		public static function get( $id ){

			$id = self::get_id( $id );
			$default = '';
			if( isset( self::$defaults[ $id ] ) ){
				$default = self::$defaults[ $id ];
			}

			return get_theme_mod( $id, $default );
		}

		public static function get_id( $id ){
			return 'fansee-business-' . $id;
		}

		/**
		* Sanitization function for color.
		* @since Fansee Business 1.0
		*/
		public static function sanitize_hex_color( $input, $setting ){    	
			# Ensure input is a slug.
			$input = sanitize_hex_color( $input );
			
			# If $input is a valid hex value, return it; otherwise, return the default.
			$return = !is_null( $input ) ? $input : $setting->default;
			
			return $return;
		}

		/**
		* Sanitization function for checkbox.
		* @since Fansee Business 1.0
		*/
	    public static function sanitize_checkbox( $checked ) {
	    	return ( ( isset( $checked ) && true === $checked ) ? true : false );
	    }

	    /**
	    * Sanitization function for select.
	    * @since Fansee Business 1.0
	    *
	    */
	    public static function sanitize_choice( $input, $setting ){
	    	# Ensure input is a slug.
	    	$input = sanitize_key( $input );
	    	# Get list of choices from the control associated with the setting.
	    	$choices = $setting->manager->get_control( $setting->id )->choices;

	    	# If the input is a valid key, return it; otherwise, return the default.
	    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }  

	    /**
	    * Sanitization function for page repeater.
	    * @since Fansee Business 1.0
	    */
	    public static function sanitize_page_repeater( $val ){

	    	$decoded = json_decode($val);
	    	if( $decoded != null && is_array( $decoded ) ){
	    		$clean_array = array();
	    		foreach( $decoded as $to_clean ){
	    			$clean_array[] = absint( $to_clean );
	    		}
	    		return json_encode( $clean_array );
	    	}

	    	return '';
	    }	    

	    /**
	    * Sanitization function for slider.
	    * @since Fansee Business 1.0
	    */
	    public static function sanitize_number( $val ){
	    	return is_numeric( $val ) ? $val : '';
	    }

	    /**
		* Returns Sanitization function
		* @since Fansee Business 1.0
		*/
		public static function get_sanitizer( $type ){

			$fn = '';
			switch ( $type ) {
				case 'text':
					$fn = 'sanitize_text_field';
				break;

				case 'url':
					$fn = 'esc_url_raw';
				break;

				case 'email':
					$fn = 'sanitize_email';
				break;

				case 'number':
				case 'slider':
					$fn = array( __CLASS__ , 'sanitize_number' );
				break;

				case 'checkbox':
				case 'toggle':
					$fn = array( __CLASS__ , 'sanitize_checkbox' );
				break;

				case 'select':
				case 'radio':
					$fn = array( __CLASS__ , 'sanitize_choice' );
				break;

				case 'textarea':
					$fn = 'esc_textarea';
				break;

				case 'color':
					$fn = array( __CLASS__ , 'sanitize_hex_color' );
				break;

				case 'page-repeater':
					$fn = array( __CLASS__, 'sanitize_page_repeater' );
				break;

				case 'dropdown-pages':
					$fn = 'absint';
				break;

			}

			return $fn;
		}

		public function register( $wp_customize ){

			$panel = false;
			if( is_array( $this->panel ) ){
				$wp_customize->add_panel( $this->panel['id'], $this->panel[ 'args' ] );
				$panel = $this->panel['id'];
			}

			foreach ( $this->fields as  $section ) {

				if(! in_array( $section[ 'id' ], self::$default_sections ) ){
					$section_id = self::get_id( $section[ 'id' ] );

					$section_args = array(
						'title' => $section[ 'title' ],
						'panel' => $panel
					);

					if( isset( $section[ 'priority' ] ) ){
						$section_args[ 'priority' ] = $section[ 'priority' ];
					}

					if( isset( $section[ 'url' ] ) ){
						$section_args[ 'url' ] = $section[ 'url' ];
					}
					
					if( isset( $section[ 'type' ] ) && $section[ 'type' ] == 'link' ){
						$wp_customize->add_section( new Fansee_Business_Customizer_Link_Control( $wp_customize, $section_id, $section_args ) );
					}else{
						$wp_customize->add_section( $section_id, $section_args );
					}
				}else{
					$section_id = $section[ 'id' ];
				}

				$settings_control = array();
				if( isset( $section[ 'fields' ] ) ){
					foreach( $section[ 'fields' ] as $field ){

						$id = self::get_id( $field[ 'id' ] );

					    if( $field[ 'type' ] == 'slider' ){
					    	foreach( array( 'mobile', 'tablet', 'desktop' ) as $device ){
					    		
					    		$nid = $id . '-' . $device;

					    		$wp_customize->add_setting( $nid, array(
					    	        'default'           => self::$defaults[ $nid ],
					    	        'sanitize_callback' => self::get_sanitizer( $field[ 'type' ] ),
					    	        'transport'         => 'refresh'
					    	    ));
					    		
					    		$settings_control[ $device ] = $nid;
					    	}
					    }else{

							$wp_customize->add_setting( $id, array(
				    	        'default'           => self::$defaults[ $id ],
				    	        'sanitize_callback' => self::get_sanitizer( $field[ 'type' ] ),
				    	        'transport'         => 'refresh'
				    	    ));
					    }

						$control = array(
					        'label'   => $field[ 'label' ],
					        'type'    => $field[ 'type' ],
					        'section' => $section_id
					    );

						if( isset( $field[ 'active_callback' ] ) ){
							$control[ 'active_callback' ] = $field[ 'active_callback' ];
						}

						if( isset( $field[ 'description' ] ) ){
							$control[ 'description' ] = $field[ 'description' ];
						}

						if( isset( $field[ 'limit' ] ) ){
							$control[ 'limit' ] = $field[ 'limit' ];
						}

						if( isset( $field[ 'choices' ] ) ){
							$control[ 'choices' ] = $field[ 'choices' ];
						}

						if( isset( $field[ 'input_attrs' ] ) ){
							$control[ 'input_attrs' ] =  $field['input_attrs'];
						}

						switch( $control[ 'type' ] ){

							case 'toggle':
								$control[ 'type' ] = self::get_id( $control[ 'type' ] );
								$wp_customize->add_control( new Fansee_Business_Toggle_Control( $wp_customize, $id, $control ) );
							break;

							case 'page-repeater':
								$control[ 'type' ] = self::get_id( $control[ 'type' ] );
								$wp_customize->add_control( new Fansee_Business_Page_Repeater( $wp_customize, $id, $control ) );
							break;

							case 'slider':
								$control[ 'type' ] = self::get_id( $control[ 'type' ] );
								if( !isset( $control[ 'input_attrs' ] ) ){
									$control[ 'input_attrs' ] =  array(
						                'min'   => 0,
						                'max'   => 100,
						                'step'  => 1,
						            );
								}
								$control[ 'settings' ] = $settings_control;
								$wp_customize->add_control( new Fansee_Business_Customizer_Slider_Control( $wp_customize, $id, $control ) );
							break;

							case 'link':
								$control[ 'type' ] = self::get_id( $control[ 'type' ] );
								$wp_customize->add_control( new Fansee_Businiess_Customizer_Link_Control( $wp_customize, $id, $control ) );
							break;

							default:
					    		$wp_customize->add_control( $id, $control );	
							break;
						}
					}
				}

			}
		}

		public function add( $panel = false ){
			$this->panel = $panel;
			add_action( 'customize_register', array( $this, 'register' ) );
			foreach ( $this->fields as  $section ) {

				if( isset( $section[ 'fields' ] ) ){
					foreach( $section[ 'fields' ] as $field ){
						$id = self::get_id( $field[ 'id' ] );
					    if( $field[ 'type' ] == 'slider' ){
					    	foreach( array( 'mobile', 'tablet', 'desktop' ) as $device ){
					    		
					    		$nid = $id . '-' . $device;

					    		if( isset( $field[ 'default' ] ) ){
					    			self::$defaults[ $nid ] = $field[ 'default' ][ $device ];
					    		}
					    	}
					    }else{
							self::$defaults[ $id ] = isset( $field[ 'default' ] ) ? $field[ 'default' ] : false;
					    }
					}
				}
			}
		}

	}
}
