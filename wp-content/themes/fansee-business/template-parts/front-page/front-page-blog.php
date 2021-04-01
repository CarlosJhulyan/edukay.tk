<section class="fansee-business-news-section">
	<?php if( fansee_business_get( 'blog-shape' ) ): ?>
		<svg class="fansee-business-frontpage-shape"
		 xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="743px" height="744px">							
		<path fill-rule="evenodd"  fill="#bde4fb"
		 d="M615.219,653.320 L344.787,743.081 L90.091,615.327 L0.329,344.894 L128.083,90.198 L398.516,0.437 L653.212,128.191 L742.973,398.624 L615.219,653.320 Z"/>
		</svg>
	<?php endif; ?>
	<div class="container">
		<?php fansee_business_frontpage_title( 'blog' ); ?>
		<?php
			$query = new WP_Query(array(
				'posts_per_page' => fansee_business_get( 'blog-posts-per-page' ),
				'ignore_sticky_posts' => true
			));
			if( $query->have_posts() ){
				$cls = "fansee-business-blog-col-" . fansee_business_get( 'blog-col' );
				?>
				<div class="row <?php echo esc_attr( $cls ); ?>">
				<?php
					while( $query->have_posts() ){
						$query->the_post();
						?>
						<div class="fansee-business-blog-col-inner">
							<div class="fansee-business-news-box">
								<a href="<?php the_permalink(); ?>" class="fansee-business-news-img">
									<?php the_post_thumbnail(); ?>									
								</a>
								<div class="fansee-business-news-content">
									<h3> 
										<a href="<?php the_permalink(); ?>"> 
											<?php the_title(); ?> 
										</a> 
									</h3>
									<?php the_excerpt(); ?>

									<div class="fansee-business-news-box-meta">
										<h4><?php esc_html_e( 'Categories', 'fansee-business' ); ?></h4>
										<?php the_category(); ?>
									</div>
								</div>
								<div class="fansee-business-news-date">
									<?php 
										$date = get_the_date( 'M j Y' ); 
										$date = explode( ' ', $date );
									?>
									<a href="<?php echo esc_url( fansee_business_get_day_link() ); ?>">
										<span class="news-post-day"><?php echo esc_html( $date[0] ); ?></span>
										<span class="news-post-month"><?php echo esc_html( $date[1] ); ?></span>
										<span class="news-post-year"><?php echo esc_html( $date[2] ); ?></span>
									</a>
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
		?>

		<div class="fansee-business-news-more-btn">
			<a href="<?php echo esc_url( fansee_business_get_blog_page_url() ); ?>" class="fansee-business-btn-primary"> 
				<span> <?php esc_html_e( 'View All News', 'fansee-business' ); ?> <i class="fa fa-long-arrow-right"></i> </span> 
			</a>	
		</div>
	</div><!-- container -->
</section> <!-- news section -->