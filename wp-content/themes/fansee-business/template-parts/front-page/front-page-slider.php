<?php
/**
*  Template for slider section
* @since Fansee Business 1.0
*/
$pages = fansee_business_get( 'slider-pages' );

if( $pages ){
	$args = apply_filters( 'fansee_business_slider_args', array(
		'post_type' => 'page',
		'post__in'  => json_decode( $pages )
	));
	$query = new WP_Query( $args );
	$settings = apply_filters( 'fansee_business_slick_slider_args', array(
		"slidesToShow"   => 1,
		"slidesToScroll" => 1,
		"autoplaySpeed"  => 4000,
		"autoplay"       => fansee_business_get( 'slider-autoplay' ),
		"infinite"       => fansee_business_get( 'slider-infinite' ),
		"dots"           => fansee_business_get( 'slider-dots' ) 
	));
	?>
	<section class="fansee-business-feature-slider">
		<div class="fansee-business-feature-slider-init" data-slick='<?php echo esc_attr( json_encode( $settings ) ); ?>'>
			<?php if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();
					$thumb = get_the_post_thumbnail_url();
					?>
					<div class="fansee-business-feature-slider-inner" style="background: url(<?php echo esc_url( $thumb ); ?>)">
						<div class="fansee-business-feature-slider-inner-content">
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
							</h2>
						</div>
					</div>
					<?php
				}
			} 
			wp_reset_postdata();
			?>
		</div> <!-- slider init -->		
	</section> <!-- section -->
<?php }
?>