<?php
/**
* ------------------------------------------------------
*  Template for service section
* ------------------------------------------------------
*
* @since 1.0
* @package Fansee Business WordPress Theme
*/
?>
<section class="fansee-business-team-section">

	<?php if( fansee_business_get( 'team-shape' ) ): ?>
		<svg class="fansee-business-frontpage-shape"
		 xmlns="http://www.w3.org/2000/svg"
		 xmlns:xlink="http://www.w3.org/1999/xlink"
		 width="501px" height="501px">							
			<path fill-rule="evenodd"  fill="#bde4fb"
			 d="M427.562,427.686 L250.754,500.923 L73.945,427.686 L0.709,250.878 L73.945,74.069 L250.754,0.833 L427.562,74.069 L500.799,250.878 L427.562,427.686 Z"/>
		</svg>
	<?php endif; ?>
	<div class="container">
	<?php fansee_business_frontpage_title( 'team' ); ?>
	<?php 
		$pages = fansee_business_get( 'team-pages' ); 
		if( $pages ){
			$args = apply_filters( 'fansee_business_team_args', array(
				'post_type'      => 'page',
				'posts_per_page' => fansee_business_get( 'team-posts-per-page' ),
				'post__in'       => json_decode( $pages ),
				'orderby'        => 'post__in'
			));
			$query = new WP_Query( $args );
			if( $query->have_posts() ){
				$cls = "fansee-business-team-col-" . fansee_business_get( 'team-col' );
				?>
				<div class="row <?php echo esc_attr( $cls ); ?>">
			<?php
				while( $query->have_posts() ){
					$query->the_post();
					$heading = fansee_business_get_piped_title();
			?>
					<div class="fansee-business-team-col-inner">
						<div class="fansee-business-team-box">
							<div class="fansee-business-team-image">
								<?php the_post_thumbnail(); ?>								
							</div>
							<div class="fansee-business-team-description">
								<h3><?php echo esc_html( $heading[ 0 ] ); ?></h3>
								<h4><?php echo esc_html( $heading[ 1 ] ); ?></h4>
							</div>
							<a href="<?php the_permalink(); ?>"></a>
						</div>
					</div>
			<?php }  ?>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
	?>
	</div>
	<?php
		$btn_txt = fansee_business_get( 'team-btn-text' );
		$team_archive_id = fansee_business_get( 'team-archive-page' );
		if( $team_archive_id > 0 ):
	?>
			<div class="fansee-business-team-btn">
				<a href="<?php echo esc_attr( get_permalink( $team_archive_id ) ) ?>" class="fansee-business-btn-primary"> 
					<span> <?php echo esc_html( $btn_txt ); ?> <i class="fa fa-long-arrow-right"></i> </span> 
				</a>	
			</div>
		<?php endif; ?>	
</section> <!-- team section -->