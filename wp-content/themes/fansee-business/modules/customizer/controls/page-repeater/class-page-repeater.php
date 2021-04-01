<?php
/**
 * page repeater control for customizer
 * @since Fansee Business 1.0
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Fansee_Business_Page_Repeater extends WP_Customize_Control {

		public $type = 'fansee-business-page-repeater';

		public $limit = 1000;

		public $pro_link = '';

		public $pro_text = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 * @since Fansee Business 1.0
		 */
		public function to_json() {

			parent::to_json();

			$this->json[ 'value' ] = ( '' == $this->value() ) ? json_encode( [ 0 ] ) : $this->value(); 

			$args = array( 'post_type' => 'page', 'posts_per_page' => -1 ); 
			$pages = get_posts( $args ); 
			$this->json[ 'pages' ] = array( 'Please Select a Page' ); 

			if( $pages && is_array( $pages ) ){
				foreach( $pages as $p ) { 
				   $this->json[ 'pages' ][ $p->ID ] = $p->post_title; 
				} 
			}

			$this->json[ 'link' ]  = $this->get_link();
			$this->json[ 'id' ]    = $this->id;
			$this->json[ 'limit' ] = $this->limit;		
			$this->json[ 'pro_link' ] = $this->pro_link;		
			$this->json[ 'pro_text' ] = $this->pro_text;		
			$this->json[ 'description' ] = $this->description;		
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @since Fansee Business 1.0
		 */
		protected function content_template() {
			?>
			<div class="page-repeater-template hidden">
				<div>
					<select>
						<# _.each( data.pages, function( label, choice ) { #>
							<option value="{{ choice }}">{{ label }}</option>
						<# } ) #>
					</select>
					<button data-index="{#index}" data-limit="{{ data.limit }}" class="page-repeater-remove"> 
						<span class="dashicons dashicons-trash"></span> 
					</button>
				</div>
			</div>

			<label for="repeater_{{ data.id }}" class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>

			<div id="repeater_{{ data.id }}">
				<div class="page-repeater-selectors">
					<# var val = JSON.parse( data.value ); #>
					<#  _.each( val, function(l, c){ #>
						<div>
							<select>
								<# _.each( data.pages, function( label, choice ) { #>
									<option value="{{ choice }}" <# if ( l == choice ) { #> selected<# } #>> {{ label }}</option>
								<# }) #>
							</select>
							<button data-index="{{c}}" data-limit="{{ data.limit }}" class="page-repeater-remove">
								<span class="dashicons dashicons-trash"></span> 
							</button>
						</div>
					<# }) #>
				</div>

				<button data-pro-link="{{ data.pro_link }}" 
					data-pro-text="{{ data.pro_text }}" 
					data-limit="{{ data.limit }}" 
					class="page-repeater-add"
					style="display:<# if( val.length == data.limit ){ #>none<# }else{ #>block<# } #>;"
				>
					Add new
					<span class="dashicons dashicons-plus"></span> 
				</button>

				<input type="hidden" value="{{ data.value }}" {{{ data.link }}} />
			</div>
			<?php
		}
	}
}

function fansee_business_page_repeater_control_register( $wp_customize ){
	$wp_customize->register_control_type( 'Fansee_Business_Page_Repeater' );
}
add_action( 'customize_register', 'fansee_business_page_repeater_control_register' );