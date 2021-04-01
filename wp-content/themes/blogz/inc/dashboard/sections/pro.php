<?php
/**
 * Free vs. Pro section.
 *
 * @package Floral Lite
 */

?>
<div id="pro" class="gt-tab-pane">
	<table class="form-table">
		<thead>
			<tr>
				<th></th>
				<th><?php esc_html_e( 'Lite', 'blogz' ); ?></th>
				<th><?php esc_html_e( 'PRO', 'blogz' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Responsive Design', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Works in any browsers on desktops, tablets and mobile devices and optimized for speed.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Featured Content', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Show your most important posts in a slider on the front page. Install Jetpack to use this feature.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Sticky header', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Always show the main navigation when scroll down pages.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( '1-Click Demo Import', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Save time setting up the theme and get exactly what you see in the demo.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( '3 search box styles', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'There are search popup, search toggle and search dropdown.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Post Details', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'You can hide or show some information of the post.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Custom Colors', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Customize colors of any element on your website.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Custom Google Fonts', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'Integrated all Google Fonts with various options to customize for a beautiful typography.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Setup advertisement', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'You can place advertisement with link after some post', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
					<h3><?php esc_html_e( 'Priority Support', 'blogz' ); ?></h3>
					<p><?php esc_html_e( 'You will benefit of our full support for any issues you have with the theme.', 'blogz' ); ?></p>
				</td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">
					<a href="<?php echo esc_url( "https://gretathemes.com/wordpress-themes/{$this->slug}/{$this->utm}" ); ?>" target="_blank" class="button button-primary button-hero">
						<?php
						/* translators: pro theme name. */
						echo esc_html( sprintf( __( 'Get %s PRO now', 'blogz' ), $this->pro_name ) );
						?>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
