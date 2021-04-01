<?php
/* Register widget areas.
 */
function blog_nano_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'WooCommerce section', 'blog-nano' ),
        'id'            => 'woocommerce-section',
        'description'   => __( 'Add widgets here to appear in your Home page.', 'blog-nano' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

        register_sidebar( array(
        'name'          => __( 'Footer 1', 'blog-nano' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'blog-nano' ),
        'before_widget' => '<section id="%1$s" class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'blog-nano' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'blog-nano' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s footer-big">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="footer-widget-title text--white ">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'blog-nano' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'blog-nano' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="footer-widget-title text--white">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'blog_nano_widgets_init' );

if ( ! function_exists( 'blog_nano_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function blog_nano_setup() {
      
      add_theme_support( 'woocommerce' );

      }
      
      // woocommerce images popup code
      add_theme_support( 'wc-product-gallery-zoom' );
      add_theme_support( 'wc-product-gallery-lightbox' );
      add_image_size( 'blog-nano-thumbnail-3', 320, 240, true );
    
endif;
add_action( 'after_setup_theme', 'blog_nano_setup' );

/**
 * Loads parent and child themes' style.css
 */
function blog_nano_theme_enqueue_styles() {

	$parent_style = 'web-log';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'blog-nano',get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),wp_get_theme()->get('Version')	);
}

add_action( 'wp_enqueue_scripts', 'blog_nano_theme_enqueue_styles' );

if(class_exists( 'WooCommerce' ) ) {
   
   require get_stylesheet_directory() . '/widget/blog-nano-ecommerce-shop-widget.php';

}

/**
 * Load Dynamic css.
 */
require get_stylesheet_directory() . '/include/dynamic-css.php';


function blog_nano_excerpt_more( $excerpt ) {

     if (!is_admin()) {

           return '...';

        }
 
}
add_filter( 'excerpt_more', 'blog_nano_excerpt_more' );