<?php
/**
 * Template part for displaying inner banner in pages
 * @since Fansee Business 1.0
 */

if( ( is_archive() || is_home() ) && fansee_business_get( 'hide-in-archive-page' ) ){
	return;
}

if( is_singular( 'post' ) || is_page() || is_home() ){ 

	if( is_front_page() ){
		$src = get_header_image();
		
	}else{
		$id = fansee_business_get_page_id();
		
		$meta_id = 'fansee-business-disable-inner-banner';
		if( "on" == get_post_meta( $id, $meta_id, true ) ){
			return;
		}

		$meta_id = 'fansee-business-use-customizer-image-for-banner';
		if( 'on' == get_post_meta( $id, $meta_id, true ) ){
			$src = get_header_image();
		}else{
			$src = get_the_post_thumbnail_url( $id, 'full' );
		}
	}
}else{
	$src = get_header_image();
}

if( isset( $src ) ){
	$src = 'background: url( '. esc_url( $src ) .' )';
}else{
	$src = '';
}

$breadcrumb = fansee_business_get( 'show-breadcrumb' );		
?>
<div class="fansee-business-inner-banner-wrapper" style="<?php echo esc_attr( $src ); ?>"> 
	<div class="container">
		<div class="fansee-business-inner-banner">
			<header class="entry-header">
				<?php 
					if( is_singular() ){
						the_title( '<h1 class="entry-title">', '</h1>' );
					}elseif(  is_archive() ){
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					}elseif( is_home() ){
						# when home page is latest posts the custom title.
						$blog_title = fansee_business_get( 'banner-title' );
						?>
						<h2 class="entry-title"><?php echo esc_html( $blog_title ) ?></h2>
						<?php
					}elseif(  is_search() ){
						get_search_form();
						/* translators: %s: search page result */ 
						?>
						<h2 class="entry-title">
							<?php 
								printf( 
									esc_html__( 'Search Results for: %s', 'fansee-business' ), 
									'<span>' . get_search_query() . '</span>' 
								);
							?>
						</h2>
						<?php
					}
				?>
			</header><!-- .entry-header -->
		</div>

		<?php if( $breadcrumb ): ?>
		    <div class="breadcrumb-wrapper">
		    	<?php 
		    		$breadcrumb_args = array(
		    		    'container'   => 'div',
		    		    'show_browse' => false,
		    		);
		    		fansee_business_breadcrumb_trail( $breadcrumb_args ); 
		    	?>
			</div>
		<?php endif; ?>
	</div>
</div>
