
<?php
// Must be inside a loop.
$classes = array(
    'xooblog_single_featured_item',
    'xooblog_has_no_image',
);
if (has_post_thumbnail()) {
    $classes = array(
        'xooblog_single_featured_item',
        '',
    );
}
$xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
$xooblog_featuredbox_layouts = get_redux_opt_val('xooblog_featuredbox_layouts', 1);
$xooblog_readmore_switch = get_redux_opt_val('xooblog_readmore_switch', true);
$xooblog_featured_category_switch = get_redux_opt_val('xooblog_featured_category_switch', true);

if (is_sticky()) {
?>
    <article <?php post_class($classes); ?> id="post-<?php the_ID(); ?>">

        <?php
        if (has_post_thumbnail()) :
        ?>
            <div class="post-header">
                <figure class="post-image">
                    <a href="<?php the_permalink(); ?>">
                        <!-- <img src="assets/images/img_3.jpg" alt=""> -->
                        <?php the_post_thumbnail('xooblog_banner_image'); ?>
                    </a>
                </figure>

            </div>
        <?php
        endif;

        ?>

        <div class="post-content">

            <?php

            if ($xooblog_featuredbox_layouts != 2 && $xooblog_featured_category_switch) :
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

            <a href="<?php the_permalink(); ?>" class="post-title">
                <h2>
                    <?php the_title(); ?>
                </h2>
            </a>
            <div class="post-meta">

                <a class="post-author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">

                    <?php the_author(); ?>
                </a>

                <?php
                $archive_year  = get_the_time('Y');
                $archive_month = get_the_time('m');
                $archive_day   = get_the_time('d');

                ?>

                <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                    <?php echo get_the_date(); ?>
                </a>

            </div>

        </div>
    </article>

<?php

} else { ?>

    <article <?php post_class($classes); ?> id="post-<?php the_ID(); ?>">

        <?php
        if (has_post_thumbnail()) :
        ?>
            <div class="post-header">
                <figure class="post-image">
                    <a href="<?php the_permalink(); ?>">
                        <!-- <img src="assets/images/img_3.jpg" alt=""> -->
                        <?php the_post_thumbnail(); ?>
                    </a>
                </figure>

            </div>

        <?php
        endif;

        ?>

        <div class="post-content">
            <?php

            if ($xooblog_featuredbox_layouts != 2 && $xooblog_featured_category_switch) :
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
            <a href="<?php the_permalink(); ?>" class="post-title">
                <h2>
                    <?php the_title(); ?>
                </h2>
            </a>
            <div class="post-meta">

                <a class="post-author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">

                    <?php the_author(); ?>
                </a>

                <?php
                $archive_year  = get_the_time('Y');
                $archive_month = get_the_time('m');
                $archive_day   = get_the_time('d');

                ?>

                <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                    <?php echo get_the_date(); ?>
                </a>

            </div>

        </div>
    </article>

<?php
}


?>