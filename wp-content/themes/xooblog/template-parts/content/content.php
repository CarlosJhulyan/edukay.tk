        <?php

        $xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
        $xooblog_singleblog_layouts = get_redux_opt_val('xooblog_singleblog_layouts', 1);
        $xooblog_singleblog_layouts = get_redux_opt_val('xooblog_singleblog_layouts', 1);
        $xooblog_singleblog_date = get_redux_opt_val('xooblog_singleblog_date', 1);
        $xooblog_singleblog_author = get_redux_opt_val('xooblog_singleblog_author', 1);
        $xooblog_singleblog_post_count = get_redux_opt_val('xooblog_singleblog_post_count', 1);
        $xooblog_singleblog_comments = get_redux_opt_val('xooblog_singleblog_comments', 1);
        $xooblog_singleblog_category = get_redux_opt_val('xooblog_singleblog_category', 1);
        $xooblog_singleblog_tags = get_redux_opt_val('xooblog_singleblog_tags', 1);
        $xooblog_singleblog_prevnext = get_redux_opt_val('xooblog_singleblog_prevnext', 1);



        switch ($xooblog_page_layouts) {
            case 1:
            $page_layout_class = 'layout_style_1';
              break;
            case 2:
                $page_layout_class = 'layout_style_2';
              break;
            case 3:
                $page_layout_class = 'layout_style_3';
              break;
            case 4:
                $page_layout_class = 'layout_style_4';
              break;
            default:
            $page_layout_class = 'layout_style_1';
          }
        ?>
        <div clss="single_blog_page <?php echo esc_attr( $page_layout_class);?>">
            <?php

            if ($xooblog_singleblog_layouts == 2) :
            ?>

                <div class="post-header single_blog">
                    <h1 class="post-title">
                        <?php the_title(); ?>
                    </h1>

                    <?php 
                    if($xooblog_singleblog_date || $xooblog_singleblog_post_count || $xooblog_singleblog_author || $xooblog_singleblog_comments):
                    ?>
                        <!-- post meta function -->
                    <div class="post-meta">
                        <div class="tecxoo-post-date-author">
                            <?php
                            $archive_year  = get_the_time('Y');
                            $archive_month = get_the_time('m');
                            $archive_day   = get_the_time('d');
                            ?>

                            <?php

                            if ($xooblog_singleblog_date) :
                            ?>

                                <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                                    <span class="dashicons dashicons-clock"></span>
                                    <?php echo get_the_date(); ?>
                                </a>
                            <?php
                            endif;

                            ?>

                            <?php


                            if ($xooblog_singleblog_post_count) :
                            ?>

                                <span>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;
                                    <?php echo getPostViews(get_the_ID()); ?>
                                </span>
                            <?php
                            endif;

                            ?>

                            <?php

                            if ($xooblog_singleblog_author) :
                            ?>

                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
                                    <span class="dashicons dashicons-admin-users"></span>
                                    &nbsp;
                                    <?php the_author(); ?>
                                </a>
                            <?php
                            endif;

                            ?>


                        </div>

                        <?php

                        if ($xooblog_singleblog_comments) :
                        ?>

                            <div class="tecxoo-comments-like">
                                <a href="<?php echo esc_url(get_comments_link($post->ID)); ?>" class="total-comments">
                                    <span class="dashicons dashicons-admin-comments"></span>
                                    <?php
                                    $xooblog_comment_num = get_comments_number();
                                    echo esc_html($xooblog_comment_num);
                                    ?>
                                </a>
                            </div>
                        <?php
                        endif;
                        ?>

                    </div>


                    <?php
                    endif;
                    ?>


                </div>

            <?php
            endif;


            ?>

            <figure class="post-image">
                <?php the_post_thumbnail(); ?>
            </figure>

            <article class="post-item tecxoo-post-details">
                <?php

                if ($xooblog_singleblog_layouts == 1) :
                ?>

                    <div class="post-header single_blog">
                        <h1 class="post-title">
                            <?php the_title(); ?>
                        </h1>

                        <!-- post meta function -->
                        <?php 
                    if($xooblog_singleblog_date || $xooblog_singleblog_post_count || $xooblog_singleblog_author || $xooblog_singleblog_comments):
                    ?>
                        <!-- post meta function -->
                    <div class="post-meta">
                        <div class="tecxoo-post-date-author">
                            <?php
                            $archive_year  = get_the_time('Y');
                            $archive_month = get_the_time('m');
                            $archive_day   = get_the_time('d');
                            ?>

                            <?php

                            if ($xooblog_singleblog_date) :
                            ?>

                                <a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="posted-on">
                                    <span class="dashicons dashicons-clock"></span>
                                    <?php echo get_the_date(); ?>
                                </a>
                            <?php
                            endif;

                            ?>

                            <?php


                            if ($xooblog_singleblog_post_count) :
                            ?>

                                <span>
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    &nbsp;
                                    <?php echo getPostViews(get_the_ID()); ?>
                                </span>
                            <?php
                            endif;

                            ?>

                            <?php

                            if ($xooblog_singleblog_author) :
                            ?>

                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
                                    <span class="dashicons dashicons-admin-users"></span>
                                    &nbsp;
                                    <?php the_author(); ?>
                                </a>
                            <?php
                            endif;

                            ?>

                        </div>

                        <?php

                        if ($xooblog_singleblog_comments) :
                        ?>

                            <div class="tecxoo-comments-like">
                                <a href="<?php echo esc_url(get_comments_link($post->ID)); ?>" class="total-comments">
                                    <span class="dashicons dashicons-admin-comments"></span>
                                    <?php
                                    $xooblog_comment_num = get_comments_number();
                                    echo esc_html($xooblog_comment_num);
                                    ?>
                                </a>
                            </div>
                        <?php
                        endif;
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
                    <?php
                    the_content();
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links xooblog_page_links">' . __('Pages:', 'xooblog'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
                <!--  -->
                <div class="tecxoo-post-share">

                    <?php

                    if ($xooblog_singleblog_category) :
                    ?>

                        <div class="post-category">
                            <span>
                                <?php

                                $categories = get_the_category();
                                $separator = ' ';
                                $output = '';
                                if (!empty($categories)) :
                                    _e('Category: ', 'xooblog');
                                endif;

                                ?>
                            </span>
                            <?php


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

                    <?php

                    if ($xooblog_singleblog_tags) :
                    ?>


                        <div class="post-tags">
                            <span>

                                <?php
                                $post_tags = get_the_tags();

                                


                                if (!empty($post_tags)) :
                                    _e('Tags: ', 'xooblog');
                                endif;

                                ?>
                            </span>
                            <?php
                            $tagseparator = ' | ';
                            $tagoutput = '';
                            if (!empty($post_tags)) {
                                foreach ($post_tags as $tag) {
                                    $tagoutput .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $tagseparator;
                                }
                                echo  trim($tagoutput, $tagseparator);
                            }

                            ?>
                        </div>
                    <?php
                    endif;

                    ?>



                </div>

                <!--  -->
                <!--  -->
            </article>
        </div>

        <?php if (!is_singular('attachment')) : ?>
            <?php get_template_part('template-parts/post-formats/author', 'bio'); ?>
        <?php endif; ?>