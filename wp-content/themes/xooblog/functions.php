<?php


if (!function_exists('xooblog_setup_theme')) :
    function xooblog_setup_theme()
    {
        load_theme_textdomain('xooblog', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        // Custom background color.
        add_theme_support('custom-background', apply_filters('xooblog_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');
        // Gutenberg Support
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'top_menu' => esc_html__('Header Menu', 'xooblog'),
        ));
        // Top toolbar Menu
        register_nav_menus(array(
            'xoo_main_menu' => esc_html__('Main Menu', 'xooblog'),
        ));
        register_nav_menus(array(
            'footer_menu' => esc_html__('Footer Menu', 'xooblog'),
        ));
        /*main-menu
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        add_image_size('xooblog_banner_image', 730, 315, true);
        add_image_size('xooblog_post_image', 350, 245, true);
        add_image_size('xooblog_sidebar_thumbnail', 100, 100);
        add_image_size('xooblog_blog_page_image', 795, 419, true);
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 100,
            'width'       => 100,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        $args = array(
            'default-image'      => '',
            'width'              => 1000,
            'height'             => 125,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        //add_theme_support('custom-header', $args);
        // Add support for full and wide align images.
        add_theme_support('align-wide');
    }
endif;
add_action('after_setup_theme', 'xooblog_setup_theme');

function xooblog_classic_editor_style()
{

    $classic_editor_styles = array(
        'style-editor.css',
    );

    add_editor_style($classic_editor_styles);
}

add_action('admin_init', 'xooblog_classic_editor_style');

function xooblog_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('xooblog_content_width', 800);
}
add_action('after_setup_theme', 'xooblog_content_width', 0);

// xooblog sidebar widget
function xooblog_widget_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'xooblog'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'xooblog'),
        'before_widget' => '<div id="%1$s" class="xooblog_blog_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class=" title-line">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'xooblog_widget_init');


// xooblog sidebar widget
function xooblog_footer_widget1()
{
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 1', 'xooblog'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'xooblog'),
        'before_widget' => '<div id="%1$s" class="xooblog_footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class=" widget_title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'xooblog_footer_widget1');

// xooblog sidebar widget
function xooblog_footer_widget2()
{
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 2', 'xooblog'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'xooblog'),
        'before_widget' => '<div id="%1$s" class="xooblog_footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class=" widget_title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'xooblog_footer_widget2');

// xooblog sidebar widget
function xooblog_footer_widget3()
{
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 3', 'xooblog'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'xooblog'),
        'before_widget' => '<div id="%1$s" class="xooblog_footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class=" widget_title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'xooblog_footer_widget3');

// xooblog sidebar widget
function xooblog_footer_widget4()
{
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget 4', 'xooblog'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here.', 'xooblog'),
        'before_widget' => '<div id="%1$s" class="xooblog_footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class=" widget_title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'xooblog_footer_widget4');


/**
 * Enqueue scripts and styles.
 */
function xooblog_script()
{
    wp_enqueue_style( 'xooblog-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap', false );
   
    wp_enqueue_style('xooblog-bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), null, '1.0');
    wp_enqueue_style('xooblog-fontawesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), null, '4.7');
    wp_enqueue_style('xooblog-style', get_stylesheet_uri());

    wp_enqueue_script('xooblog-bootstra-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.00', true);
    wp_enqueue_script('xooblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.00', true);
    wp_enqueue_script('sticky-kit', get_template_directory_uri() . '/assets/js/jquery.sticky-kit.js', array('jquery'), '1.00', true);

    wp_enqueue_script('xooblog-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.00', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'xooblog_script');
/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function xooblog_skip_link()
{
    echo '<a class="skip-link " href="#site-content">' . __('Skip to the content', 'xooblog') . '</a>';
}

add_action('wp_body_open', 'xooblog_skip_link', 5);

function xooblog_midsize($size)
{
    return 5;
}
add_filter('xooblog_midsize', 'xooblog_midsize');


function xooblog_add_class_on_li($items)
{
    $parents = array();

    // Collect menu items with parents.
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }

    // Add class.
    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'has-dropdown'; //here attach the class
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'xooblog_add_class_on_li');

// Load Dash Icon 
add_action('wp_enqueue_scripts', 'xooblog_load_dashicon');
function xooblog_load_dashicon()
{
    wp_enqueue_style('dashicons');
}


function xooblog_searchform($form)
{
    $xooblog_typography = get_redux_opt_val('xooblog_typography','');
    $home_url = home_url('/');
    $label = __('Search for:', 'xooblog');
    $button_name = __('Search', 'xooblog');
    $newform = '<form role="search" method="get" class="xooblog_search" action="'. esc_attr($home_url).'">
        <label>
            <input type="'. esc_attr($button_name).'"  class="search-field" placeholder="'.esc_attr__('Type Text','xooblog').'" value="" name="s"  autocomplete="off">
        </label>
        <input type="hidden" name="post_type" value="post">
        <input type="submit"  class="search-submit" value="' . esc_attr($button_name).'">
    </form>';

    return $newform;
}
add_action('get_search_form', 'xooblog_searchform');




function xooblog_sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
  }
  
  add_action('navigation_markup_template', 'xooblog_sanitize_pagination');

/**
 * Custom template tags for this theme.
 */

/*	Xooblog Template Tags
==================================*/
if(file_exists(get_template_directory().'/inc/template-tags.php')){
	require_once(get_template_directory().'/inc/template-tags.php');
}

/*	Xooblog Function
==================================*/
if(file_exists(get_template_directory().'/inc/template-functions.php')){
	require_once(get_template_directory().'/inc/template-functions.php');
}

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/*	Xooblog Customizer
==================================*/
if(file_exists(get_template_directory().'/classes/class-xooblog-customizer.php')){
	require_once(get_template_directory().'/classes/class-xooblog-customizer.php');
}

/*	Xooblog Tgm Plugin
==================================*/
if(file_exists(get_template_directory().'/inc/class-tgm-plugin-activation.php')){
	require_once(get_template_directory().'/inc/class-tgm-plugin-activation.php');
}

/*	Xooblog Plugin Activation
==================================*/
if(file_exists(get_template_directory().'/inc/plugin-activation.php')){
	require_once(get_template_directory().'/inc/plugin-activation.php');
}

/* Xooblog Recent post Thumbnail
==================================*/
if(file_exists(get_template_directory().'/widgets/xooblog-recent-post-widget-thumbnail.php')){
	require_once(get_template_directory().'/widgets/xooblog-recent-post-widget-thumbnail.php');
}

/* Xooblog Author Bio Widget check and Require
==================================*/
if(file_exists(get_template_directory().'/widgets/xooblog-author-bio-widget.php')){
	require_once(get_template_directory().'/widgets/xooblog-author-bio-widget.php');
}

/* Options Panel
==================================*/
if(file_exists(get_template_directory().'/inc/options-panel.php')){
	require_once(get_template_directory().'/inc/options-panel.php');
}


// get redux option value
function get_redux_opt_val($key,$default = ''){
    if(class_exists('Redux')){
        return Redux::get_option('xooblog-themeoptions',$key,$default);
    }else{
        return $default;
    }
}

// Dynamic Body class
add_filter( 'body_class','xooblog_my_body_classes' );
function xooblog_my_body_classes( $classes ) {
    $xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
    switch ($xooblog_page_layouts) {
        case 1:
            $classes[] = 'layout_style_1';
            return $classes;
          break;
        case 2:
            $classes[] = 'layout_style_2';
            return $classes;
          break;
        case 3:
            $classes[] = 'layout_style_3';
            return $classes;
          break;
        case 4:
            $classes[] = 'layout_style_4';
            return $classes;
          break;
        default:
        $classes[] = 'layout_style_1';
        return $classes;
      }
     
}