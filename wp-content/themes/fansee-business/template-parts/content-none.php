<?php
/**
 * Template if no post are found
 *
 * @since Fansee Business 1.0
 */
?>
<section class="no-results not-found">	

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fansee-business' ); ?></h1>
	</header><!-- .page-header -->

	<?php if( current_user_can( 'publish_posts' ) ): ?>
		<div class="page-content">
			<?php get_search_form(); ?>
			<?php
				printf(
					'<p>%1$s</p><a href="%2$s">%3$s</a>',
					esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords or you can add post.', 'fansee-business' ),
					esc_url( admin_url( 'post-new.php' ) ),
					esc_html__( 'Get Started Here', 'fansee-business' )
				)
			?>
		</div><!-- .page-content -->
	<?php else: ?>
		<div class="page-content">
			<?php get_search_form();
				printf(
					'<p>%1$s</p> ',
					esc_html__( 'We can\'t seem to find any result that match your search key.', 'fansee-business' ),
					esc_url( admin_url( 'post-new.php' ) )
				)
			?>
		</div><!-- .page-content -->
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="fansee-business-btn-primary">
				<span><?php echo esc_html__( 'Go To Homepage', 'fansee-business' ) ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
			</a>
		</div>
	<?php endif; ?>
</section>