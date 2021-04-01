<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Error 404-Page NOT Found', 'catch-responsive' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Listo para publicar su primer post? <a href="%1$s"> Empiece aquí </a>.', 'catch-responsive' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Lo siento, pero nada coincide con los términos de búsqueda. Vuelva a intentarlo con algunas palabras clave diferentes.', 'catch-responsive' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'Parece que no podemos encontrar lo que estás buscando. Quizás la búsqueda pueda ayudar.', 'catch-responsive' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->