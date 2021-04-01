<?php
/**
 * Toggle Control
 *
 * @since Fansee Business 1.0
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Fansee_Business_Toggle_Control extends WP_Customize_Control {

	   /**
	    * The control type.
	    *
	    * @since Fansee Business 1.0
	    * @access public
	    * @var    string
	    */
		public $type = 'fansee-business-toggle';

	   /**
	    * Refresh the parameters passed to the JavaScript via JSON.
	    * @see WP_Customize_Control::to_json()
	    *
	    * @since Fansee Business 1.0
	    * @access public
	    *
	    */
		public function to_json() {
			parent::to_json();
			// The setting value.
			$this->json['id']           = $this->id;
			$this->json['value']        = $this->value();
			$this->json['link']         = $this->get_link();
			$this->json['defaultValue'] = $this->setting->default;
		}

	   /**
		* Don't render the content via PHP.  This control is handled with a JS template.
		*
		* @access public
		* @since Fansee Business 1.0
		* @return void
		*
		*/
		public function render_content() {}

	   /**
		* An Underscore (JS) template for this control's content.
		*
		* Class variables for this control class are available in the `data` JS object;
		* export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		*
		* @see    WP_Customize_Control::print_template()
		*
		* @access protected
		* @since  Fansee Business 1.0
		* @return void
		*
		*/
		protected function content_template() {
			?>
			<label class="toggle">
				<div class="toggle--wrapper">

					<# if ( data.label ) { #>
						<span class="customize-control-title">{{ data.label }}</span>
					<# } #>

					<input id="toggle-{{ data.id }}" type="checkbox" class="toggle--input" value="{{ data.value }}" {{{ data.link }}} <# if ( data.value ) { #> checked="checked" <# } #> />
					<label for="toggle-{{ data.id }}" class="toggle--label"></label>
				</div>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{ data.description }}</span>
				<# } #>
			</label>
			<?php
		}
	}
}

function fansee_business_toggle_control_register( $wp_customize ){
	$wp_customize->register_control_type( 'Fansee_Business_Toggle_Control' );
}
add_action( 'customize_register', 'fansee_business_toggle_control_register' );
