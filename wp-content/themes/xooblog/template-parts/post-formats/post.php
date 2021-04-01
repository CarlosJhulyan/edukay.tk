<?php
// Must be inside a loop.
$no_post_style = 'no_thumbnail';
if (has_post_thumbnail()) {
    $no_post_style = '';
}

$xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
$xooblog_home_view_count = get_redux_opt_val('xooblog_home_view_count', true);
$xooblog_home_date = get_redux_opt_val('xooblog_home_date', true);
$xooblog_home_author = get_redux_opt_val('xooblog_home_author', true);
$xooblog_readmore_switch = get_redux_opt_val('xooblog_readmore_switch', true);


$page_layout_class = 'col-md-6';
switch ($xooblog_page_layouts) {
    case 1:
        $page_layout_class = 'col-md-6';
        break;
    case 2:
        $page_layout_class = 'col-md-12';
        break;
    case 3:
        $page_layout_class = 'col-md-6';
        break;
    case 4:
        $page_layout_class = 'col-md-12';
        break;
    default:
        $page_layout_class = 'col-md-6';
}

if (is_sticky()) {
?>

    <!--  -->
    <div class=" <?php echo esc_attr($page_layout_class); ?> " id="post-<?php the_ID(); ?>">
        <article class="post-item <?php echo esc_attr($no_post_style); ?>">

            <?php

            if (has_post_thumbnail()) :
            ?>

                <div class="post-header">
                    <figure class="post-image">
                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('xooblog_banner_image'); ?> </a>
                    </figure>
                    <?php

                    if ($xooblog_page_layouts != 2) :
                    ?>
                        <div class="post-category">
                            <?php

                            $categories = get_the_category();
                            $separator = ' ';
                            $output = '';
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'xooblog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                }
                                echo trim($output, $separator);
                            }

                            ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>

            <?php
            endif;

            ?>

            <div class="post-content">
                <a href="<?php the_permalink(); ?>" class="post-title">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </a>
                <?php

                if ($xooblog_home_author || $xooblog_home_view_count || $xooblog_home_date) :

                ?>
                    <div class="post-meta">
                        <?php
                        $archive_year  = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day   = get_the_time('d');
                        ?>

                        <?php

                        if ($xooblog_home_author) :
                        ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
                                <span class="dashicons dashicons-admin-users"></span>
                                <?php the_author(); ?>
                            </a>

                        <?php

                        endif;

                        ?>

                        <?php

                        if ($xooblog_home_view_count) :
                        ?>
                            <span>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <?php echo getPostViews(get_the_ID()); ?>
                            </span>

                        <?php
                        endif;


                        ?>
                        <?php

                        if ($xooblog_home_date) :
                        ?>

                            <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                                <span class="dashicons dashicons-clock"></span>
                                <?php echo get_the_date(); ?>
                            </a>
                        <?php
                        endif;

                        ?>

                    </div>
                <?php
                endif;
                if (is_search() || !is_singular() || is_home()) {
                    the_excerpt();
                } else {
                    the_content();
                }

                ?>

                <?php

                if ($xooblog_readmore_switch && has_excerpt()) :
                ?>

                    <a href="<?php the_permalink(); ?>" class="more-post btn">
                        <?php _e('Read More..', 'xooblog') ?>
                    </a>

                <?php
                endif;


                ?>

            </div>
        </article>
        <!--  -->
    </div>


<?php

} else { ?>


    <!-- article -->
    <div class="  <?php echo esc_attr($page_layout_class); ?>" id="post-<?php the_ID(); ?>">
        <article class="post-item <?php echo esc_attr($no_post_style); ?>">


            <?php

            if (has_post_thumbnail()) :
            ?>

                <div class="post-header">
                    <figure class="post-image">
                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('xooblog_post_image'); ?></a>
                    </figure>
                    <?php

                    if ($xooblog_page_layouts != 2) :
                    ?>
                        <div class="post-category">
                            <?php

                            $categories = get_the_category();
                            $separator = ' ';
                            $output = '';
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'xooblog'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                }
                                echo trim($output, $separator);
                            }

                            ?>
                        </div>
                    <?php
                    endif;
                    ?>

                </div>

            <?php
            endif

            ?>


            <div class="post-content">
                <a href="<?php the_permalink(); ?>" class="post-title">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </a>
                <?php

                if ($xooblog_home_author || $xooblog_home_view_count || $xooblog_home_date) :

                ?>
                    <div class="post-meta">
                        <?php

                        if ($xooblog_home_author) :
                        ?>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
                                <span class="dashicons dashicons-admin-users"></span>
                                <?php the_author(); ?>
                            </a>

                        <?php

                        endif;

                        ?>

                        <?php

                        if ($xooblog_home_view_count) :
                        ?>
                            <span>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <?php echo getPostViews(get_the_ID()); ?>
                            </span>

                        <?php
                        endif;


                        ?>
                        <?php

                        if ($xooblog_home_date) :
                        ?>

                            <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                                <span class="dashicons dashicons-clock"></span>
                                <?php echo get_the_date(); ?>
                            </a>
                        <?php
                        endif;

                        ?>
                    </div>
                <?php

                endif;
                if (is_search() || !is_singular() || is_home()) {
                    the_excerpt();
                } else {
                    the_content();
                }

                ?>



                <?php

                if ($xooblog_readmore_switch && has_excerpt()) :
                ?>

                    <a href="<?php the_permalink(); ?>" class="more-post btn">
                        <?php _e('Read More..', 'xooblog') ?>
                    </a>

                <?php
                endif;


                ?>


            </div>
        </article>
        <!-- article -->
    </div>

<?php
}


?>