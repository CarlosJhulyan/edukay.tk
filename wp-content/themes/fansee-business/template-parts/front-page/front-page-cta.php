<?php
	$page_id = fansee_business_get( 'cta-page' );
	if( $page_id ):
		$query = new WP_Query(array(
			'page_id' => $page_id
		));
		if( $query->have_posts() ){
			while( $query->have_posts() ){
				$query->the_post();
				$thumbnail = get_the_post_thumbnail_url();
				$btn_txt = fansee_business_get( 'cta-btn-text' );
				$btn_link = fansee_business_get( 'cta-btn-link' );
				?>
				<section class="fansee-business-cta-section" style="background: url('<?php echo esc_url( $thumbnail ); ?>">
					<div class="container">
						<div class="fansee-business-cta-text">
							<h2 class="fansee-business-section-title section-title-white"><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<a href="<?php echo esc_url( $btn_link ); ?>" class="fansee-business-btn-primary"> 
								<span> 
									<?php echo esc_html( $btn_txt ); ?> 
									<i class="fa fa-long-arrow-right"></i> 
								</span> 
							</a>	
						</div>
					</div>
				</section>
				<?php
			}
		}
		wp_reset_postdata();
?>
<?php endif; ?>