<?php
if (!class_exists('Redux')) {
    return;
}

$opt_name = 'xooblog-themeoptions';
unset(Redux_Core::$server['REMOTE_ADDR']);

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'display_name'         => $theme->get('Name'),
    'display_version'      => $theme->get('Version'),
    'menu_title'           => esc_html__('Xooblog Options', 'xooblog'),
    'customizer'           => true,
    'dev_mode'             => false,
    'show_import_export'   => false,
);

Redux::setArgs($opt_name, $args);

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'xooblog'),
    'id'     => 'general',
    'desc'   => esc_html__('Theme Default Settings', 'xooblog'),
    'icon'   => 'el el-cogs',
    'fields' => array(
        
        array(
            'id'       => 'xooblog_sidebar_switch',
            'type'     => 'switch',
            'title'    => __('Sticky Sidebar', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_menu_switch',
            'type'     => 'switch',
            'title'    => __('Sticky Menu', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),

        array(
            'id'       => 'xooblog_loader_switch',
            'type'     => 'switch',
            'title'    => __('Preloader', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_preloader',
            'type'     => 'media',
            'url'      => false,
            'title'    => __('Media w/ URL', 'xooblog'),
            'desc'     => __('Basic media uploader with disabled URL input field.', 'xooblog'),
            'subtitle' => __('Upload any media using the WordPress native uploader', 'xooblog'),
            'default'  => array(
                'url' => ''
            ),
            'required' => array('xooblog_loader_switch', '=', 'true')
        ),
        array(
            'id'          => 'xooblog_typography',
            'type'        => 'typography',
            'title'       => __('Typography', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('h2.site-description'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => false,
            'font-size' => true,
            'font-family' => true,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#333',
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '33px',
                'line-height' => '40px'
            ),
        ),
        array(
            'id'       => 'xooblog_home_date',
            'type'     => 'switch',
            'title'    => __('Show Date and Time', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_home_view_count',
            'type'     => 'switch',
            'title'    => __('Show Post Count', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_home_author',
            'type'     => 'switch',
            'title'    => __('Show Author', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),

        array(
            'id'       => 'xooblog_readmore_switch',
            'type'     => 'switch',
            'title'    => __('Show Read More', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        

        array(
            'id'          => 'xooblog_typography',
            'type'        => 'typography',
            'title'       => __('Xooblog Default Typhography Options', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.post-content p'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => true,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '30px'
            ),
        ),
        array(
            'id'       => 'xooblog_body_clr',
            'type'     => 'background',
            'title'    => __('Body Background', 'xooblog'),
            'subtitle' => __('Body background with image, color, etc.', 'xooblog'),
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'default'  => array(
                'background-color' => '#ffffff',
            ),
            'output'    => array('body'), 
        ),
        array(
            'id'       => 'xooblog_link_clr',
            'type'     => 'link_color',
            'title'    => __('Links Color Option', 'xooblog'),
            'subtitle' => __('Only color validation can be done on this field type', 'xooblog'),
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'output'    => array('a,.xooblog_footer_top .xooblog_footer_widget ul li a,.xooblog_footer_top .xooblog_footer_widget ul li a,.xooblog_blog_widget ul li a,.xooblog_blog_widget.widget_categories a::before,.xooblog_blog_widget.widget_meta a::before,.xooblog_blog_widget.widget_archive a::before,.xooblog_blog_widget.widget_recent_entries a::before,.xooblog_recent_post_widget li .post_widget_content .recent_post_widget_title,.xooblog_footer_widget ul li.page_item a,#top_menu li a,.xooblog_navbar .navbar-nav li a'),
            'default'  => array(
                'regular'  => '#4c7cc3', // blue
                'hover'    => '#ffffff', // red
                'active'   => '#FB4E15',  // purple
                'visited'  => '#FB4E15',  // purple
            )
        )

    )
));

// Layout options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Layouts', 'xooblog'),
    'id'     => 'layouts',
    'desc'   => esc_html__('All layout Options', 'xooblog'),
    'icon'   => 'el el-th-large',
    'fields' => array(
        array(
            'id'       => 'xooblog_page_layouts',
            'type'     => 'image_select',
            'width' => '120px',
            'height' => '120px',
            'title'    => __('Select Page Layouts', 'xooblog'),
            'compiler' => true,

            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/layout-2.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/layout-1.png'),
            ),
            'default'  => '1',
        ),
        array(
            'id'       => 'xooblog_sidebar_layout',
            'type'     => 'image_select',
            'title'    => __('Select Sidebar Position', 'xooblog'),
            'compiler' => true,
            'height' => '120px',
            'width' => '120px',
            'subtitle' => __('No validation can be done on this field type', 'xooblog'),
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/sidebar-right.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/sidebar-left.png'),
            ),
            'default'  => '1',
        ),
        

    )
));
$url_to_img_1 = get_template_directory_uri() . '/images/1.png';
$url_to_img_2 = get_template_directory_uri() . '/images/2.png';

$categories = get_categories(array(
    'orderby' => 'name',
    'parent'  => 0
));

$cart = array();
foreach ($categories as $category) {
    $cart[$category->cat_ID] = $category->name;
}


// Blog options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header Options', 'xooblog'),
    'id'     => 'headeroptions',
    'desc'   => esc_html__('Header Details Options', 'xooblog'),
    'icon'   => 'el el-certificate',
    'fields' => array(
        array(
            'id'       => 'xooblog_menu_layout',
            'type'     => 'image_select',
            'title'    => __('Select Menu Layouts', 'xooblog'),
            'compiler' => true,
            'height' => '120px',
            'width' => '120px',
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/menu-1.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/menu-2.png'),
            ),
            'default'  => '1',
        ),
        array(
            'id'       => 'xooblog_toolbar_onoff',
            'type'     => 'switch',
            'title'    => __('Show Toolbar on Top', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => false,
        ),
        array(
            'id'       => 'xooblog_toolbar_topMenu',
            'type'     => 'switch',
            'title'    => __('Show Toolbar Menu', 'xooblog'),
            'desc'     => __('Use this for show hide toolbar left side menu', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => false,
        ),
        array(
            'id'       => 'xooblog_toolbar_clr_opt',
            'type'     => 'color',
            'title'    => __('Xooblog Toolbar color', 'xooblog'),

            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
            'default'  => '#FFFFFF',
            'output'    => array(
                'background-color' => '.xooblog_toolbar',
            )
        ),
        array(
            'id'          => 'xooblog_toolbar_typography',
            'type'        => 'typography',
            'title'       => __('Toolbar Menu Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.xooblog_toolbar__widget .xooblog_toolbar__nav li a'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => false,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'font-size'   => '12px',
                'line-height' => '40px'
            ),
        ),
        array(
            'id'          => 'xooblog_toolbar_icon',
            'type'        => 'typography',
            'title'       => __('Toolbar Social Icon Typography option', 'xooblog'),
            'google'      => false,
            'font-backup' => false,
            'output'      => array('.xooblog_toolbar__social_widget .xooblog_toolbar__social_widget__nav li a'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => false,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'font-size'   => '18px',
                'line-height' => '40px'
            ),
        ),
        array(
            'id'       => 'xooblog_navigation_clr_opt',
            'type'     => 'color',
            'title'    => __('Xooblog Navigation Background Color', 'xooblog'),
            'default'  => '#FFFFFF',
            'output'    => array(
                'background-color' => '.xooblog_navbar,.has-dropdown > ul li a',
            )
        ),
        // array(
        //     'id'       => 'xooblog_navigation_clr_opt',
        //     'type'     => 'color_gradient',
        //     'title'    => __('Header Gradient Color Option', 'xooblog'),
        //     'subtitle' => __('Only color validation can be done on this field type', 'xooblog'),
        //     'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
        //     'validate' => 'color',
        //     'default'  => array(
        //         'from' => '#ffffff',
        //         'to'   => '#ffffff',
        //     ),
        // ),
        array(
            'id'          => 'xooblog_navigation_typography',
            'type'        => 'typography',
            'title'       => __('Navigation Menu Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('#top_menu  li a,.search_field_inner'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => true,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'font-family' => 'Poppins',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '40px',
                'font-weight' => '600'
            ),
        ),

    )
));

// Featured  options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Featured Options', 'xooblog'),
    'id'     => 'featuredoptions',
    'desc'   => esc_html__('All Featured Options', 'xooblog'),
    'icon'   => 'el el-arrow-right',
    'fields' => array(
        array(
            'id'       => 'xooblog_featured_switch',
            'type'     => 'switch',
            'title'    => __('Show Featured Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_featuredbox_layouts',
            'type'     => 'image_select',
            'width' => '120px',
            'height' => '120px',
            'title'    => __('Select Featuredbox Layouts', 'xooblog'),
            'compiler' => true,

            'desc'     => __('Select Image to set Featured Box layouts', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/featured-box1.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/featured-box2.png'),
            ),
            'default'  => '1',
            'required' => array('xooblog_featured_switch', '=', 'true')
        ),
        array(
            'id'       => 'xooblog_featured_category_switch',
            'type'     => 'switch',
            'title'    => __('Show Featured Blog Category Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
            'required' => array('xooblog_featured_switch', '=', 'true')
        ),
        array(
            'id'       => 'xooblog_featured_categories',
            'type'     => 'select',
            'title'    => __('Select Category', 'xooblog'),
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            // Must provide key => value pairs for select options
            'options'  => $cart,
            'default'  => '',
            'required' => array('xooblog_featured_switch', '=', 'true')
        ),

        array(
            'id'        => 'xooblog_featured_post_number',
            'type'      => 'slider',
            'title'     => __('Featured Post Number', 'xooblog'),
            'subtitle'  => __('This slider displays the value as a lPoppins.', 'xooblog'),
            'desc'      => __('Slider description. Min: 1, max: 500, step: 1, default value: 250', 'xooblog'),
            "default"   => 3,
            "min"       => 0,
            "step"      => 1,
            "max"       => 15,
            'display_value' => 'lPoppins',
            'required' => array('xooblog_featured_switch', '=', 'true')
        ),
        array(
            'id'       => 'xooblog_topbox_clr_opt',
            'type'     => 'color',
            'title'    => __('Xooblog Fetured Post Background Color', 'xooblog'),

            'subtitle' => __('Pick a background color for Featured Box', 'xooblog'),
            'default'  => '#FFFFFF',
            'output'    => array(
                'background-color' => '.xooblog_single_featured_item',
            )
        ),
        array(
            'id'          => 'xooblog_topbox_title_typography',
            'type'        => 'typography',
            'title'       => __('Topbox Title Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.xooblog_featured_box .xooblog_single_featured_item .post-title h2'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#ffffff',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '30px'
            ),
        ),
        array(
            'id'          => 'xooblog_topbox_meta_typography',
            'type'        => 'typography',
            'title'       => __('Featured Blog Meta Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.xooblog_featured_box .xooblog_single_featured_item .post-meta a'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#ffffff',
                'google'      => true,
                'font-size'   => '12px',
                'line-height' => '20px'
            ),
        ),
    )
));

// Single Blog options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Single Page', 'xooblog'),
    'id'     => 'singleblog',
    'desc'   => esc_html__('All Single Page Options', 'xooblog'),
    'icon'   => 'el el-indent-left',
    'fields' => array(
        array(
            'id'       => 'xooblog_singleblog_layouts',
            'type'     => 'image_select',
            'title'    => __('Select Single Page Layouts', 'xooblog'),
            'compiler' => true,
            'height' => '120px',
            'width' => '120px',
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/single-blog1.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/single-blog2.png'),
            ),
            'default'  => '1',
        ),
        array(
            'id'          => 'xooblog_singleblog_title_typography',
            'type'        => 'typography',
            'title'       => __('Single Blog Title Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.post-item.tecxoo-post-details .post-title,.single-post .post-title'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'font-size'   => '24px',
                'line-height' => '40px'
            ),
        ),
        array(
            'id'       => 'xooblog_singleblog_date',
            'type'     => 'switch',
            'title'    => __('Show Date on Single BLog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_singleblog_author',
            'type'     => 'switch',
            'title'    => __('Show Author on Single Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_singleblog_post_count',
            'type'     => 'switch',
            'title'    => __('Show Post Count On Single Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_singleblog_comments',
            'type'     => 'switch',
            'title'    => __('Show Post Comments Count On Single Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_singleblog_category',
            'type'     => 'switch',
            'title'    => __('Show Category On Single Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_singleblog_tags',
            'type'     => 'switch',
            'title'    => __('Show Tags On Single Blog', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        )



    )
));

// Add Settings
// Redux::setSection($opt_name, array(
//     'title'  => esc_html__('Add Options', 'xooblog'),
//     'id'     => 'addoptions',
//     'desc'   => esc_html__('Add Options', 'xooblog'),
//     'icon'   => 'el el-credit-card',
//     'fields' => array(
//         array(
//             'id'       => 'xooblog_header_top_ad',
//             'type'     => 'ace_editor',
//             'title'    => __('Header Add', 'xooblog'),
//             'subtitle' => __('Paste your CSS code here.', 'xooblog'),
//             'mode'     => 'css',
//             'theme'    => 'monokai',
//             'desc'     => 'Possible modes can be found at http://ace.c9.io/.',
//             'default'  => ""
//         ),
//         array(
//             'id'       => 'xooblog_sidebar_top_ad',
//             'type'     => 'ace_editor',
//             'title'    => __('Sidebar Add', 'xooblog'),
//             'subtitle' => __('Paste your CSS code here.', 'xooblog'),
//             'mode'     => 'css',
//             'theme'    => 'monokai',
//             'desc'     => 'Possible modes can be found at http://ace.c9.io/.',
//             'default'  => ""
//         ),
//         array(
//             'id'       => 'xooblog_featured_bottom_ad',
//             'type'     => 'ace_editor',
//             'title'    => __('Featured Box Bottom Add', 'xooblog'),
//             'subtitle' => __('Paste your CSS code here.', 'xooblog'),
//             'mode'     => 'css',
//             'theme'    => 'monokai',
//             'desc'     => 'Possible modes can be found at http://ace.c9.io/.',
//             'default'  => ""
//         ),

//     )
// ));

// Style Settings
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Style Options', 'xooblog'),
    'id'     => 'styleoptions',
    'desc'   => esc_html__('Add Options', 'xooblog'),
    'icon'   => 'el el-brush',
    'fields' => array(

        array(
            'id'       => 'xooblog_blogpost_opt',
            'type'     => 'color',
            'title'    => __('Xooblog post Background color', 'xooblog'),

            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
            'default'  => '#ffffff',
            'output'    => array(
                'background-color' => '.post-item',
            )
        ),
        array(
            'id'          => 'xooblog_post_title',
            'type'        => 'typography',
            'title'       => __('Post Title Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.post-item h2'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'google'      => true,
                'font-size'   => '24px',
                'line-height' => '35px'
            ),
        ),
        array(
            'id'          => 'xooblog_post_meta',
            'type'        => 'typography',
            'title'       => __('Post Meta Typography Option', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.post-item .post-meta a,.post-item .post-meta span'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '40px'
            ),
        ),
        

        // array(
        //     'id'       => 'xooblog_ftr_bg',
        //     'type'     => 'color',
        //     'title'    => __('Footer Background Color', 'xooblog'),
        //     'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
        //     'default'  => '#FFFFFF',
        //     'validate' => 'color',
        //     'output'    => array('footer'), 
        // ),
        array(
            'id'       => 'xooblog_pagination_bg',
            'type'     => 'color',
            'title'    => __('Pagination Color', 'xooblog'),
            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
            'default'  => '#FFFFFF',
            'validate' => 'color',
            'output'    => array(
                'background-color' => '.xooblog_pagination_contaier .nav-links .page-numbers',
            )
        ),
        array(
            'id'          => 'xooblog_pagination_typho',
            'type'        => 'typography',
            'title'       => __('Xooblog Pagination Typography Options', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.xooblog_pagination_contaier .nav-links .page-numbers'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => false,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555555',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '40px'
            ),
        ),

        array(
            'id'          => 'xooblog_readmore_typho',
            'type'        => 'typography',
            'title'       => __('Xooblog Readmore Typography Options', 'xooblog'),
            'google'      => true,
            'font-backup' => false,
            'output'      => array('.more-post.btn'),
            'units'       => 'px',

            'font-style' => false,
            'font-weight' => true,
            'font-size' => true,
            'font-family' => false,
            'subsets' => false,
            'line-height' => true,
            'word-spacing' => false,
            'letter-spacing' => false,
            'text-align' => false,
            'text-transform' => false,
            'subtitle'    => __('Typography option with each property can be called individually.', 'xooblog'),
            'default'     => array(
                'color'       => '#555',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '40px'
            ),
        ),
    )
));


// Blog options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer Options', 'xooblog'),
    'id'     => 'footeroptions',
    'desc'   => esc_html__('Footer Details Options', 'xooblog'),
    'icon'   => 'el el-th',
    'fields' => array(
        array(
            'id'       => 'xooblog_footer_layout',
            'type'     => 'image_select',
            'title'    => __('Select Footer Layouts', 'xooblog'),
            'compiler' => true,
            'height' => '120px',
            'width' => '120px',
            'desc'     => __('This is the description field, again good for additional info.', 'xooblog'),
            'options'  => array(
                '1' => array(
                    'alt' => 'Full Width',
                    'img' => get_template_directory_uri() . '/assets/images/footer-1.png'
                ),
                '2' => array('alt' => 'Box Width', 'img' => get_template_directory_uri() . '/assets/images/footer-2.png'),
            ),
            'default'  => '1',
        ),
        array(
            'id'       => 'xooblog_footer_bg',
            'type'     => 'color',
            'title'    => __('Footer Background  color', 'xooblog'),

            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
            'default'  => '#333333',
            'output'    => array(
                'background-color' => '.tecxoo-footer-type-3,.tecxoo-footer-bottom',
            )
        ),

    )
));

// Blog options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Options', 'xooblog'),
    'id'     => 'socialoptions',
    'desc'   => esc_html__('Footer Details Options', 'xooblog'),
    'icon'   => 'el el-credit-card',
    'fields' => array(
        array(
            'id' => 'xooblog_facebook',
            'title'    => __('Facebook Link', 'xooblog'),
            'type' => 'text',
        ),
        array(
            'id' => 'xooblog_twitter',
            'title'    => __('Twitter Link', 'xooblog'),
            'type' => 'text',
        ),
        array(
            'id' => 'xooblog_linkdin',
            'title'    => __('Linkdin Link', 'xooblog'),
            'type' => 'text',
        ),
        array(
            'id' => 'xooblog_pinterest',
            'title'    => __('Pinterest Link', 'xooblog'),
            'type' => 'text',
        ),

    )
));



// Single Blog options
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Miscellaneous', 'xooblog'),
    'id'     => 'miscellaneous ',
    'desc'   => esc_html__('All Aditional Options', 'xooblog'),
    'icon'   => 'el el-puzzle',
    'fields' => array(

        array(
            'id'       => 'xooblog_miscellaneous_totop',
            'type'     => 'switch',
            'title'    => __('Show Scroll Top', 'xooblog'),
            'subtitle' => __('Look, it\'s on!', 'xooblog'),
            'default'  => true,
        ),
        array(
            'id'       => 'xooblog_miscellaneous_widgetbg',
            'type'     => 'color',
            'title'    => __('Xooblog Widget Background color', 'xooblog'),

            'subtitle' => __('Pick a background color for the theme (default: #fff).', 'xooblog'),
            'default'  => '#ffffff',
            'output'    => array(
                'background-color' => '.sidebar .xooblog_blog_widget',
            )
        ),

    )
));


