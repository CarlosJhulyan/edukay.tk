<?php
/**
 * front page theme options
 * @since Fansee Business 1.0
 */
if( !class_exists( 'Fansee_Business_Frontpage_Customizer' ) ){
	class Fansee_Business_Frontpage_Customizer extends Fansee_Business_Customizer{

		public $fields = array();

		public function __construct( $panel ){

			$this->fields = array(
				array(
					'id'    => 'general-frontpage-section',
					'title' => esc_html__( 'General', 'fansee-business' ),
					'fields' => $this->general_options()
				),
				array(
					'id'     => 'slider-frontpage-section',
					'title'  => esc_html__( 'Slider', 'fansee-business' ),
					'fields' => $this->slider_options()
				),
				array(
				    'id'     => 'about-section',
				    'title'  => esc_html__( 'About', 'fansee-business' ),
				    'fields' => $this->about_options()
				),
				array(
				    'id'     => 'service-section',
				    'title'  => esc_html__( 'Service', 'fansee-business' ),
				    'fields' => $this->service_options()
				),
				array(
				    'id'     => 'team-section',
				    'title'  => esc_html__( 'Team', 'fansee-business' ),
				    'fields' => $this->team_options()
				),
				array(
				    'id'     => 'cta-section',
				    'title'  => esc_html__( 'Call to action', 'fansee-business' ),
				    'fields' => $this->cta_options()
				),
				array(
				    'id'     => 'testimonial-section',
				    'title'  => esc_html__( 'Testimonial', 'fansee-business' ),
				    'fields' => $this->testimonial_options()
				),
				array(
				    'id'     => 'blog-section',
				    'title'  => esc_html__( 'Blog', 'fansee-business' ),
				    'fields' => $this->blog_options()
				)
			);

			$this->add( $panel );
		}

		public function general_options(){
			return array(
				array(
					'id'      => 'svg-bg-color',
					'label'   => esc_html__( 'SVG Shape Color', 'fansee-business' ),
					'type'    => 'color',
					'default' => '#bfe5fc',
				),
				array(
				    'id'      => 'show-content',
				    'label'   => esc_html__( 'Show Front Page Content', 'fansee-business' ),
				    'type'    => 'toggle',
				    'default' => true
				),
				array(
				    'id'      => 'show-content-above',
				    'label'   => esc_html__( 'Show Content Above', 'fansee-business' ),
				    'type'    => 'toggle',
				    'default' => false,
				    'active_callback' => array( __CLASS__, 'show_frontpage_content_above' )
				)
			);
		}

	    public function slider_options(){
			return array(
				array(
					'id'      => 'enable-slider',
					'label'   => esc_html__( 'Enable Slider', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => true
				),
				array(
					'id'    => 'slider-pages',
					'label' => esc_html__( 'Pages', 'fansee-business' ),
					'type'  => 'page-repeater',
					'limit' => 3,
					'default' => '',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'slider-autoplay',
					'label' => esc_html__( 'Auto Play', 'fansee-business' ),
					'type'  => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),			
				array(
					'id'    => 'slider-dots',
					'label' => esc_html__( 'Dots', 'fansee-business' ),
					'type'  => 'toggle',
					'default' => true,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),			
				array(
					'id'    => 'slider-infinite',
					'label' => esc_html__( 'Infinite Scroll', 'fansee-business' ),
					'type'  => 'toggle',
					'default' => true,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-slider-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'slider-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'default' => '',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function about_options(){
			return array(
				array(
					'id'      => 'enable-about',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'about-page',
					'label' => esc_html__( 'Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'about-btn-text',
					'label' => esc_html__( 'Button Text', 'fansee-business' ),
					'type'  => 'text',
					'default' => esc_html__( 'Know More' ,'fansee-business' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-about-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'about-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function service_options(){
			return array(
				array(
					'id'      => 'enable-service',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'service-shape',
					'label'   => esc_html__( 'Enable Shape', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-page',
					'label' => esc_html__( 'Content Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-btn-text',
					'label' => esc_html__( 'Button Text', 'fansee-business' ),
					'type'  => 'text',
					'default' => esc_html__( 'More Services' ,'fansee-business' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'service-pages',
					'label' => esc_html__( 'Sub Pages', 'fansee-business' ),
					'type'  => 'page-repeater',
					'limit' => 6,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-service-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'service-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback'  )
				)
			);
		}

		public function team_options(){
			return array(
				array(
					'id'      => 'enable-team',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'team-shape',
					'label'   => esc_html__( 'Enable Shape', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-page',
					'label' => esc_html__( 'Content Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-btn-text',
					'label' => esc_html__( 'Button Text', 'fansee-business' ),
					'type'  => 'text',
					'default' => esc_html__( 'View All Member' ,'fansee-business' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-pages',
					'label' => esc_html__( 'Sub Pages', 'fansee-business' ),
					'type'  => 'page-repeater',
					'description' => esc_html__( 'Recommended Title: Team Member Name', 'fansee-business' ) . ' <span>' . esc_html__( 'Designation', 'fansee-business' ) . '</span>',
					'limit' => 5,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-posts-per-page',
					'label' => esc_html__( 'Total team to show', 'fansee-business' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'team-col',
					'label' => esc_html__( 'Total column per row', 'fansee-business' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),		
				array(
					'id'    => 'team-archive-page',
					'label' => esc_html__( 'Select a Team Archive Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => 0,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				
				array(
					'id'      => 'enable-team-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'team-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function cta_options(){
			return array(
				array(
					'id'      => 'enable-cta',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'cta-page',
					'label' => esc_html__( 'Content Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-btn-link',
					'label' => esc_html__( 'Button Link', 'fansee-business' ),
					'type'  => 'text',
					'default' => '#',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'cta-btn-text',
					'label' => esc_html__( 'Button Text', 'fansee-business' ),
					'type'  => 'text',
					'default' => esc_html__( 'GET IN TOUCH' ,'fansee-business' ),
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-cta-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'cta-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function testimonial_options(){
			return array(
				array(
					'id'      => 'enable-testimonial',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'testimonial-shape',
					'label'   => esc_html__( 'Enable Shape', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'testimonial-page',
					'label' => esc_html__( 'Content Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'testimonial-pages',
					'label' => esc_html__( 'Sub Pages', 'fansee-business' ),
					'type'  => 'page-repeater',
					'limit' => 3,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-testimonial-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'testimonial-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public function blog_options(){
			return array(
				array(
					'id'      => 'enable-blog',
					'label'   => esc_html__( 'Enable', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'      => 'blog-shape',
					'label'   => esc_html__( 'Enable Shape', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-page',
					'label' => esc_html__( 'Content Page', 'fansee-business' ),
					'type'  => 'dropdown-pages',
					'default' => '0',
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-posts-per-page',
					'label' => esc_html__( 'Total posts to show', 'fansee-business' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 4,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'    => 'blog-col',
					'label' => esc_html__( 'Total column per row', 'fansee-business' ),
					'type'  => 'number',
					'input_attrs' => array( 'max' => 4, 'min' => 1 ),
					'default' => 4,
					'active_callback' => array( __CLASS__, 'module_callback' )
				),
				array(
					'id'      => 'enable-blog-shortcode',
					'label'   => esc_html__( 'Enable Shortcode', 'fansee-business' ),
					'type'    => 'toggle',
					'default' => false
				),
				array(
					'id'    => 'blog-shortcode',
					'label' => esc_html__( 'Shortcode', 'fansee-business' ),
					'type'  => 'text',
					'active_callback' => array( __CLASS__, 'module_shortcode_callback' )
				)
			);
		}

		public static function show_frontpage_content_above(){
	        return self::get( 'show-content' );
	    }

	    public static function get_module_name( $control ){
	    	$id = str_replace( 'fansee-business-', '', $control->id );
	    	$arr = explode( '-', $id );
	    	if( is_array( $arr ) && isset( $arr[0] ) ){
	    		return $arr[0];
	    	}

	    	return false;
	    }
	    
	    public static function module_callback( $control ){
	    	$name = self::get_module_name( $control );
	    	if( $name ){
	    		return self::get( "enable-{$name}" );
	    	}

	    	return true;
	    }

	    public static function module_shortcode_callback( $control ){
	    	$name = self::get_module_name( $control );
	    	if( $name ){
	    		return self::get( "enable-{$name}-shortcode" );
	    	}
	    	return true;
	    }
	}
}
