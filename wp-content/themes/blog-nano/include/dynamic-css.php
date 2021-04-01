<?php

/**

 * Dynamic css

 * @subpackage blog nano

 * @return void

 
 */

if ( !function_exists('blog_nano_dynamic_css') ):

    function blog_nano_dynamic_css(){

    
    $custom_css = '';

  
  /*====================Basic Color=====================*/

    $blog_nano_primary_color  = esc_attr(web_log_get_option('primary_color'));
    
    
  /*====================Primary Color =====================*/


  $custom_css .= " .site-title, .site-title a, .pagination-wrap .nav-links a, body a:hover, body a:active, .post .entry-title a:hover, .post .entry-title a:focus, .post .entry-title a:active, .main-navigation a:hover,
    li.current-menu-item a,.entry-footer .tag-list i
                  {

                      color: " . $blog_nano_primary_color . ";

                   }

                  ";


  $custom_css .= " .back-to-top > i, .web-log-post-grid .meta-category a, .header-breadcrumb, button:hover, button:focus, input[type='button']:hover, input[type='button']:focus, input[type='submit']:hover, input[type='submit']:focus, .widget .widget-title:before, .header-wrapper .header-top, button, input[type='button'], input[type='submit'], .read-more .link, h4.ct_post_area-title span:after, .page-header .page-title,.web-log-post-list .meta-category a,.entry-footer .edit-link a.post-edit-link,.comment-reply-link,.main-navigation li li:hover,.menu-primary-container ul li:hover,.menu-primary-container ul li.current-menu-item,
  .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt

                  {

                      background: " . $blog_nano_primary_color . ";

                   }

                  ";    



  $custom_css .= " #search-popup.popup-box-on #search input[type='search'], .header-wrapper .header-top

                  {

                      border-bottom:  1px solid " . $blog_nano_primary_color . ";

                   }

                  ";
  
  $custom_css .= " .entry-content blockquote

                  {

                      border-left:  5px solid " . $blog_nano_primary_color . ";

                   }

                  ";


    /*------------------------------------------------------------------------------------------------- */

    /*custom css*/

    wp_add_inline_style('blog-nano', $custom_css);

}

endif;

add_action('wp_enqueue_scripts', 'blog_nano_dynamic_css', 99);