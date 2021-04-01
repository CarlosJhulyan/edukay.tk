<?php
/**
 * The Header for our theme.
 *
 * @since 1.0.0 
 *
 * @package Guten Learn WordPress Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
 	<?php wp_head(); ?>
</head>
<body <?php Guten_Learn_Helper::schema_body( 'body' ); body_class(); ?> >
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} ?>
	<?php do_action( Guten_Learn_Helper::fn_prefix( 'after_body' ) ); 

	do_action( Guten_Learn_Helper::fn_prefix( 'before_header' ) ); 
	
	do_action( Guten_Learn_Helper::fn_prefix( 'header' ) ); 

	do_action( Guten_Learn_Helper::fn_prefix( 'after_header' ) );

	           
