<?php
/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0.0
 * 
 * @package Guten Learn WordPress Theme
 */
?>
<div class="<?php echo esc_attr( Guten_Learn_Helper::get_inner_banner_class() ); ?>" <?php Guten_Learn_Helper::the_header_image(); ?>> 
	<div class="container">
		<?php
			Guten_Learn_Helper::the_inner_banner();
			Guten_Learn_Helper::the_breadcrumb();
		?>
	</div>
</div>
