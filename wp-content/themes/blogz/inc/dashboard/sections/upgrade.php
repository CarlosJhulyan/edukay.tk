<?php
/**
 * Upgrade notice
 *
 * @package Floral Lite
 */

?>
<div class="upgrade">
	<h3><span class="dashicons dashicons-awards"></span> <?php esc_html_e( 'Upgrade to PRO Version', 'blogz' ); ?></h3>
	<p><?php echo wp_kses_post( __( 'Please upgrade to the PRO plan to unlock more awesome features. You can check them out <a class="action-links" href="#pro">here</a>.', 'blogz' ) ); ?></p>
	<a class="button button-primary" target="_blank" href="<?php echo esc_url( "https://gretathemes.com/wordpress-themes/{$this->slug}/$this->utm" ); ?>">
		<?php
		// translators: theme name.
		echo esc_html( sprintf( __( 'Get %s Pro now', 'blogz' ), $this->pro_name ) );
		?>
	</a>
</div>
