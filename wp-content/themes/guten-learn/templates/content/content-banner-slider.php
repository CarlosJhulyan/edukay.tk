<?php 
/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0.0
 * 
 * @package Guten Learn WordPress Theme
 */

$pst = Guten_Learn_Theme::get_posts_by_type( guten_learn_get( 'slider-type' ), guten_learn_get( 'cat-post' ) );
if( !empty( $pst ) ):?>
	<div class="gutenlearn-banner-slider-wrapper"> 
		<div class="gutenlearn-banner-slider-init">
			<?php 
			foreach( $pst as $p ):
				$slider_excerpt = apply_filters( 'smile_slider_excerpt_length', 20 ); 
				if( has_post_thumbnail( $p ) ){
					$img = get_the_post_thumbnail_url( $p, 'full' );
				}else{
					$img = get_template_directory_uri() . '/assets/img/default-slider.jpg';
				}?>
				<div class="gutenlearn-banner-slider-inner" style="background-image: url( <?php echo esc_url( $img ) ?>)">
					<div class="banner-slider-content">
						<h2>
							<a href="<?php echo esc_url( get_the_permalink( $p ) ); ?>">								
								<?php echo esc_html( get_the_title( $p ) ); ?>
							</a>
						</h2>
						<p class="feature-news-content"><?php echo esc_html( guten_learn_excerpt( $slider_excerpt, false, '...', $p ) ); ?></p>
						<?php if( '' != guten_learn_get( 'slider-more-text' ) ){ ?>
							<div class="inner-banner-btn">
								<a href="<?php echo esc_url( get_the_permalink( $p ) ); ?>">
									<?php echo esc_html( guten_learn_get( 'slider-more-text' ) ); ?>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
