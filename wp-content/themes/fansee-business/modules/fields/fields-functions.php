<?php
/**
* Add custom fileds
* @since Fansee Business 1.0
*/
function fansee_business_register_metabox(){
	add_meta_box( 
		'fansee-business-meta-box', 
		esc_html__( 'Fansee Business Settings', 'fansee-business' ), 
		'fansee_business_render_metabox', 
		'post',
		'side'
	);

	add_meta_box( 
		'fansee-business-meta-box', 
		esc_html__( 'Fansee Business Settings', 'fansee-business' ), 
		'fansee_business_render_metabox', 
		'page',
		'side'
	);
}
add_action( 'add_meta_boxes', 'fansee_business_register_metabox' );

function fansee_business_render_metabox( $post ){
	wp_nonce_field( 'fansee_business_meta_nonce', 'fansee_business_name_meta_nonce' );

	$sidebar_position = get_post_meta( $post->ID, 'fansee-business-sidebar-position', true );
	$customizer_image = get_post_meta( $post->ID, 'fansee-business-use-customizer-image-for-banner', true );

	$disable_banner   = get_post_meta( $post->ID, 'fansee-business-disable-inner-banner', true );
	$disable_footer   = get_post_meta( $post->ID, 'fansee-business-disable-footer-widget', true );
	?>
	<div class="fansee-business-metabox-wrapper">

		<div class="fansee-business-metabox-select">
			<label><?php echo esc_html__( 'Sidebar', 'fansee-business' ); ?></label>
			<select name="fansee-business-sidebar-position">
				<option value="show" <?php selected( 'show', $sidebar_position, true ); ?>>
					<?php esc_html_e( 'Show', 'fansee-business' ); ?>
				</option>
				<option value="hide" <?php selected( 'hide', $sidebar_position, true ); ?>>
					<?php esc_html_e( 'Hide', 'fansee-business' ); ?>
				</option>
			</select>
		</div>

		<div class="fansee-business-metabox-checkbox">
			<label for="fansee-business-use-customizer-image-for-banner">
				<?php esc_html_e( 'Use banner from customizer', 'fansee-business' ); ?>
			</label>
			<input id="fansee-business-use-customizer-image-for-banner" 
				type="checkbox" name="fansee-business-use-customizer-image-for-banner" <?php checked( $customizer_image, 'on', true ); ?> 
			/>
		</div>

		<div class="fansee-business-metabox-checkbox">
			<label for="fansee-business-disable-inner-banner"><?php esc_html_e( 'Disable Banner', 'fansee-business' ); ?></label>
			<input id="fansee-business-disable-inner-banner" 
				type="checkbox" name="fansee-business-disable-inner-banner" <?php checked( $disable_banner, 'on', true ); ?> 
			/>
		</div>

		<div class="fansee-business-metabox-checkbox">
			<label for="fansee-business-disable-footer-widget"><?php esc_html_e( 'Disable Footer Widget', 'fansee-business' ); ?></label>
			<input id="fansee-business-disable-footer-widget" 
				type="checkbox" name="fansee-business-disable-footer-widget" <?php checked( $disable_footer, 'on', true ); ?> 
			/>
		</div>
	</div>
	<?php
}

function fansee_business_save_metabox( $post_id ){
	      	
  	$p = wp_unslash( $_POST );
  	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	if ( $is_autosave || $is_revision || empty( $p ) || ! isset(  $p[ 'fansee_business_name_meta_nonce' ] ) || ! wp_verify_nonce( $p[ 'fansee_business_name_meta_nonce' ], 'fansee_business_meta_nonce' )) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	//Don't update on Quick Edit
	if (defined('DOING_AJAX') ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	update_post_meta( $post_id, 'fansee-business-sidebar-position', sanitize_key( $p[ 'fansee-business-sidebar-position' ] ) );
	update_post_meta( $post_id, 'fansee-business-use-customizer-image-for-banner', sanitize_key( $p[ 'fansee-business-use-customizer-image-for-banner' ] ) );
	update_post_meta( $post_id, 'fansee-business-disable-inner-banner', sanitize_key( $p[ 'fansee-business-disable-inner-banner' ] ) );
	update_post_meta( $post_id, 'fansee-business-disable-footer-widget', sanitize_key( $p[ 'fansee-business-disable-footer-widget' ] ) );

}
add_action( 'save_post', 'fansee_business_save_metabox' );