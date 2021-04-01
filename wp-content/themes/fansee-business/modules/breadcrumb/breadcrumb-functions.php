<?php
/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  Fansee Business 1.0
 */
if( !function_exists( 'fansee_business_breadcrumb_trail') ){
	function fansee_business_breadcrumb_trail( $args = array() ) {

		$breadcrumb = apply_filters( 'fansee_business_breadcrumb_trail_object', null, $args );

		if ( !is_object( $breadcrumb ) ) 
			$breadcrumb = new Fansee_Business_Breadcrumb_Trail( $args );

		return $breadcrumb->trail();
	}
}

/**
 *  Lists of files to be loaded for theme options module
 *
 * @since Fansee Business 1.0
 */
function fansee_business_breadcrumb_files( $files ){

    $new_files = array( 'class-breadcrumb.php' );

    return array_merge( $files, $new_files );
}
add_filter( 'fansee_business_modules_breadcrumb', 'fansee_business_breadcrumb_files' );