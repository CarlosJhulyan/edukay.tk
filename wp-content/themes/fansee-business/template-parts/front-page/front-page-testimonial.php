<?php
/**
* ------------------------------------------------------
*  Template for about section
* ------------------------------------------------------
*
* @since 1.0
* @package Fansee Business WordPress Theme
*/
?>
<section class="fansee-business-testimonials-section">
	<?php if( fansee_business_get( 'testimonial-shape' ) ): ?>
		<svg class="fansee-business-frontpage-shape"
		 xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="501px" height="501px">							
			<path fill-rule="evenodd"  fill="#bde4fb"
			 d="M427.562,427.686 L250.754,500.923 L73.945,427.686 L0.709,250.878 L73.945,74.069 L250.754,0.833 L427.562,74.069 L500.798,250.878 L427.562,427.686 Z"/>
		</svg>
	<?php endif; ?>
	<div class="container">
		<?php fansee_business_frontpage_title( 'testimonial' ); ?>
		<?php
			$pages = fansee_business_get( 'testimonial-pages' );
			if( $pages ){
				$args = apply_filters( 'fansee_business_testimonial_args', array(
					'post_type' => 'page',
					'post__in'  => json_decode( $pages )
				));
				$query = new WP_Query( $args );
				if( $query->have_posts() ){
					$settings = apply_filters( 'fansee_business_testimonial_slick_args', array(
						"centerMode" => true,
						"centerPadding" => '15px',
						"slidesToShow" => 3,
						"autoplay"  => false,
						"dots"   => false,
						"arrows" => false,
						"responsive" => array(
							array(
								"breakpoint" => 767,
								"settings"   => "unslick"
							),							
						)
					));
		?>
				<div class="fansee-business-testimonial" data-slick="<?php echo esc_attr( json_encode( $settings ) ); ?>">
					<?php 
						while( $query->have_posts() ){
							$query->the_post();
							$heading = fansee_business_get_piped_title();
					?>
							<div class="fansee-business-testimonials-box-wrapper">
								<div class="fansee-business-testimonials-box">									
									<i class="fa fa-quote-left"></i>
									<?php the_content(); ?>
									<div class="fansee-business-testimonials-client-info">
										<div class="fansee-business-testimonials-image">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="fansee-business-testimonials-name">
											<h3><?php echo esc_html( $heading[0] ); ?></h3>
											<span><?php echo esc_html( $heading[1] ); ?></span>
										</div>
									</div>
								</div>
							</div>
					<?php  
						} 
					?>
				</div>
		<?php 
				}
				wp_reset_postdata(); 
			}
		?>							
	</div><!-- container -->
</section><!-- section -->