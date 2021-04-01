<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package xooblog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xooblog_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'xooblog_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function xooblog_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'xooblog_pingback_header');


function xooblog_get_the_user_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return apply_filters('wpb_get_ip', $ip);
    
}
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
  }
  return $count;
}
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $ip_key = 'post_ip';
  $count = get_post_meta($postID, $count_key, true);
  $ip = get_post_meta($postID, $ip_key, true);
  $current_ip = xooblog_get_the_user_ip();
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      delete_post_meta($postID, $ip);
      add_post_meta($postID, $count_key, '0');
      add_post_meta($postID, $ip_key, '');
  }else{
      $ip_check = get_post_meta($postID, $ip_key, true );
      if(!empty($ip_check)){
          return false;
      }else{
          $wp_error = '';
          $count++;
          update_post_meta($postID, $count_key, $count);
          update_post_meta($postID, $ip_key, $current_ip);
          if(!$wp_error){
              return true;
          }
      }
      
  }
}


if ( ! function_exists( 'xooblog_uri_to_author_archive' ) )
{
    add_filter( 'get_comment_author_url', 'xooblog_uri_to_author_archive' );

    function xooblog_uri_to_author_archive( $uri )
    {
        global $comment;

        // We do not get the real comment with this filter.
        if ( empty ( $comment )
            or ! is_object( $comment )
            or empty ( $comment->comment_author_email )
            or ! $user = get_user_by( 'email', $comment->comment_author_email )
        )
        {
            return $uri;
        }

        return get_author_posts_url( $user->ID );
    }
}


