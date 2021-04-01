<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * slider control for customizer
 * @since Fansee Business 1.0
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Fansee_Business_Customizer_Slider_Control extends WP_Customize_Control {

		public $type = 'fansee-business-slider';

		/**
		 * Renders the control wrapper and calls $this->render_content() for the internals.
		 *
		 * @see WP_Customize_Control::render()
		 * @since Fansee Business 1.0
		 *
		 */
		protected function render() {
			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control has-switchers customize-control-' . $this->type;

			?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
				<?php $this->render_content(); ?>
			</li><?php
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 * @since Fansee Business 1.0
		 */
		public function to_json() {
			parent::to_json();

			$this->json['id'] = $this->id;

			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}

			$this->json['desktop'] = array();
		    $this->json['tablet']  = array();
		    $this->json['mobile']  = array();

		    foreach ( $this->settings as $setting_key => $setting ) {
		        $this->json[ $setting_key ] = array(
		            'id'      => $setting->id,
		            'default' => $setting->default,
		            'link'    => $this->get_link( $setting_key ),
		            'value'   => $this->value( $setting_key ),
		        );
		    }

		}

		protected function content_template() {
			?>
			<# if ( data.label ) { #>
				<span class="customize-control-title">
					<span>{{{ data.label }}}</span>

					<ul class="responsive-switchers">
						<li class="desktop">
							<button type="button" class="preview-desktop active" data-device="desktop">
								<i class="dashicons dashicons-desktop"></i>
							</button>
						</li>
						<li class="tablet">
							<button type="button" class="preview-tablet" data-device="tablet">
								<i class="dashicons dashicons-tablet"></i>
							</button>
						</li>
						<li class="mobile">
							<button type="button" class="preview-mobile" data-device="mobile">
								<i class="dashicons dashicons-smartphone"></i>
							</button>
						</li>
					</ul>

				</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<# if ( data.desktop ) { #>
				<div class="desktop control-wrap active">
					<div class="slider desktop-slider"></div>
					<div class="slider-input">
						<input {{{ data.inputAttrs }}} type="number" class="slider-input desktop-input" value="{{ data.desktop.value }}" {{{ data.desktop.link }}} />
					</div>
		    	</div>
		    <# } #>

			<# if ( data.tablet ) { #>
				<div class="tablet control-wrap">
					<div class="slider tablet-slider"></div>
					<div class="slider-input">
						<input {{{ data.inputAttrs }}} type="number" class="slider-input tablet-input" value="{{ data.tablet.value }}" {{{ data.tablet.link }}} />
					</div>
		    	</div>
		    <# } #>

			<# if ( data.mobile ) { #>
				<div class="mobile control-wrap">
					<div class="slider mobile-slider"></div>
					<div class="slider-input">
						<input {{{ data.inputAttrs }}} type="number" class="slider-input mobile-input" value="{{ data.mobile.value }}" {{{ data.mobile.link }}} />
					</div>
		    	</div>
		    <# } #>

		<?php
		}
	}
}

function fansee_business_slider_control_register( $wp_customize ){
	$wp_customize->register_control_type( 'Fansee_Business_Customizer_Slider_Control' );
}
add_action( 'customize_register', 'fansee_business_slider_control_register' );