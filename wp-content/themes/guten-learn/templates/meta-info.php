<?php
/**
 * Displays the meta information
 *
 * @since 1.0.0
 *
 * @package Guternbiz WordPress Theme
 */?>

<?php if ( 'post' === get_post_type() ) : ?>
	<?php 
		$category = guten_learn_get( 'post-category' );
		$author   = guten_learn_get( 'post-author' );
		$date     = guten_learn_get( 'post-date' );
	if( $category || $author || $date ) : ?>
		<div class="entry-meta 
			<?php 
				if( is_single() ){
					echo esc_attr( 'single' );
				} 
			?>"
		>
			<?php Guten_Learn_Helper::get_author_image(); ?>
			<?php if( $author || $date ) : ?>
				<div class="author-info">
					<?php
						Guten_Learn_Helper::the_date();			
						Guten_Learn_Helper::posted_by();
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php Guten_Learn_Helper::the_category(); ?>	
	<?php endif; ?>
<?php endif; ?>