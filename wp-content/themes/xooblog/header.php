<?php


//toolbar
$xooblog_toolbar_onoff =  get_redux_opt_val('xooblog_toolbar_onoff', '');
$xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
$xooblog_menu_layout = get_redux_opt_val('xooblog_menu_layout', 1);
$xooblog_loader_switch = get_redux_opt_val('xooblog_loader_switch', '');
$xooblog_preloader = get_redux_opt_val('xooblog_preloader', '');
$xooblog_navigation_clr_opt = get_redux_opt_val('xooblog_navigation_clr_opt', '');
$xooblog_typography = get_redux_opt_val('xooblog_typography', '');
$xooblog_menu_switch = get_redux_opt_val('xooblog_menu_switch', '');
$xooblog_toolbar_topMenu = get_redux_opt_val('xooblog_toolbar_topMenu', '');


$xooblog_menu_switch_class = '';
if ($xooblog_menu_switch) {
    $xooblog_menu_switch_class = 'make_me_sticky';
}


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <?php wp_head(); ?>
</head>



<body <?php body_class();  ?> style="color: <?php echo esc_attr($xooblog_typography['color']); ?>;font-family:<?php echo esc_attr($xooblog_typography['font-family']); ?>;font-size:<?php echo esc_attr($xooblog_typography['font-size']); ?>;line-height: <?php echo esc_attr($xooblog_typography['line-height']); ?>">
    <?php wp_body_open();


    if ($xooblog_toolbar_onoff) :
    ?>
        <div class="xooblog_toolbar xooblog_toolbar_type4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-sm-none d-md-none d-lg-block ">
                        <?php

                        if ($xooblog_toolbar_topMenu && has_nav_menu('top_menu')) :
                        ?>

                            <div class="xooblog_toolbar__widget">

                                <?php

                                wp_nav_menu(array(
                                    'theme_location' => 'top_menu',
                                    'menu_id' => 'toolbar_menu',
                                    'container'            => 'ul',
                                    'container_class' => 'toolbar_container',
                                    'menu_class' => 'xooblog_toolbar__nav',
                                ))
                                ?>
                            </div>
                        <?php
                        endif;


                        ?>

                    </div>
                    <div class="col-lg-6  ">
                        <div class="xooblog_toolbar__social_widget">
                            <ul class="xooblog_toolbar__social_widget__nav">

                                <?php
                                //social facebook
                                $xooblog_facebook =  get_redux_opt_val('xooblog_facebook', 'https://demo.com');
                                //Social twitter
                                $xooblog_twitter =  get_redux_opt_val('xooblog_twitter', 'https://demo.com');
                                // Social LInkdin
                                $xooblog_linkdin =  get_redux_opt_val('xooblog_linkdin', 'https://demo.com');
                                // Social Pinterest
                                $xooblog_pinterest =  get_redux_opt_val('xooblog_pinterest', 'https://demo.com');



                                if ($xooblog_facebook) :
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($xooblog_facebook); ?>">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                <?php
                                endif;
                                if ($xooblog_twitter) :
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($xooblog_twitter); ?>">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                <?php
                                endif;
                                if ($xooblog_linkdin) :
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($xooblog_linkdin); ?>">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                <?php
                                endif;
                                if ($xooblog_pinterest) :
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($xooblog_pinterest); ?>">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                <?php
                                endif;


                                ?>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    endif;

    ?>


    <?php

    if ($xooblog_loader_switch) :
    ?>

        <div class="preloader-bg">
            <?php

            if (!$xooblog_preloader['url']) :
            ?>
                <div class="preloader"><?php _e('Loading....', 'xooblog') ?></div>

            <?php
            else :
            ?>
                <img src="<?php echo esc_attr($xooblog_preloader['url']); ?>" alt="logo">
            <?php

            endif;
            ?>

        </div>
    <?php

    endif;

    ?>



    <!-- Start Navigation -->


    <?php



    if ($xooblog_menu_layout == 1) :
    ?>
        
        <nav class="navbar navbar-expand-lg xooblog_navbar <?php echo esc_attr($xooblog_menu_switch_class); ?>">
            <div class="container">

                <?php

                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<a class="navbar-brand logo" href=' . esc_url(home_url('/')) . '><img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
                } else {
                    echo '<a href=' . esc_url(home_url('/')) . ' class="navbar-brand"><div class="logo">' . esc_html(get_bloginfo('name')) . '</div></a>';
                }

                ?>

                <?php
                if (has_nav_menu('xoo_main_menu')) : ?>
                      
                    <button class="navbar-toggler" id="mobileButton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'xooblog'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php

                        wp_nav_menu(array(
                            'theme_location' => 'xoo_main_menu',
                            'menu_id' => 'top_menu',
                            'container'            => 'nav',
                            'container_class' => 'advance_navs',
                            'menu_class' => 'navbar-nav ml-auto'
                        ))
                        ?>
                    </div>

                <?php endif; ?>

            </div>
        </nav>

    <?php
    elseif ($xooblog_menu_layout == 2) :

    ?>
        <nav class="navbar navbar-expand-lg xooblog_navbar xooblog_header_type4 xooblog_header_type2 <?php echo esc_attr($xooblog_menu_switch_class); ?>">
            <div class="container">
                <?php

                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<a class="navbar-brand logo" href=' . esc_url(home_url('/')) . '><img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
                } else {
                    echo '<a href=' . esc_url(home_url('/')) . ' class="navbar-brand"><div class="logo">' . esc_html(get_bloginfo('name')) . '</div></a>';
                }

                ?>

                <?php
                if (has_nav_menu('xoo_main_menu')) : ?>

                    <button class="navbar-toggler" id="mobileButton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'xooblog'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <nav class="advance_navs">
                            <?php

                            wp_nav_menu(array(
                                'theme_location' => 'xoo_main_menu',
                                'menu_id' => 'top_menu',
                                // 'container'            => 'nav',
                                // 'container_class' => '',
                                'menu_class' => 'navbar-nav ml-auto'
                            ))
                            ?>
                            <?php

                            ?>
                            <div class="search_field">
                                <button type="button" class="search_field_inner btn " data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>

                        </nav>
                    </div>

                <?php endif; ?>

            </div>
        </nav>
    <?php
    else :
    ?>
        <nav class="navbar navbar-expand-lg xooblog_navbar">
            <div class="container">

                <?php

                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<a class="navbar-brand logo" href=' . esc_url(home_url('/')) . '><img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
                } else {
                    echo '<a href=' . esc_url(home_url('/')) . ' class="navbar-brand"><div class="logo">' . esc_html(get_bloginfo('name')) . '</div></a>';
                }

                ?>

                <?php
                if (has_nav_menu('xoo_main_menu')) : ?>

                    <button class="navbar-toggler" id="mobileButton" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'xooblog'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php

                        wp_nav_menu(array(
                            'theme_location' => 'xoo_main_menu',
                            'menu_id' => 'top_menu',
                            'container'            => 'nav',
                            'container_class' => 'advance_navs',
                            'menu_class' => 'navbar-nav ml-auto'
                        ))
                        ?>
                    </div>

                <?php endif; ?>

            </div>
        </nav>
    <?php
    endif;


    ?>

    <!-- Navigattion  -->