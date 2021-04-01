<?php get_header();

$xooblog_layout_class = 'col-md-10 offset-md-1';
if (is_active_sidebar('sidebar-1')) {
    $xooblog_layout_class = 'col-lg-8 col-md-12';
}
$xooblog_page_layouts = get_redux_opt_val('xooblog_page_layouts', 1);
$xooblog_sidebar_layout = get_redux_opt_val('xooblog_sidebar_layout',1);
$xooblog_featuredbox_layouts = get_redux_opt_val('xooblog_featuredbox_layouts', 1);
$sidbear_class = '';

if($xooblog_sidebar_layout == 1){   
    $sidbear_class = 'order-last';
}else{
    $sidbear_class = 'order-first';
}


$page_layout_class = 'layout_style_1';
$featuredbox_layout_class = 'featured_box_type1';
// if ($xooblog_page_layouts == 2) {
//     $page_layout_class = 'layout_style_2';
// } else if ($xooblog_page_layouts == 3) {
//     $page_layout_class = 'layout_style_3';
// } else if ($xooblog_page_layouts == 4) {
//     $page_layout_class = 'layout_style_4';
// } else {
//     $page_layout_class = 'layout_style_1';
// }

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

  switch ($xooblog_featuredbox_layouts) {
    case 1:
    $featuredbox_layout_class = 'featured_box_type1';
      break;
    case 2:
        $featuredbox_layout_class = 'featured_box_type2';
      break;
    case 3:
        $featuredbox_layout_class = 'featured_box_type3';
      break;
    case 4:
        $featuredbox_layout_class = 'featured_box_type4';
      break;
    default:
    $featuredbox_layout_class = 'featured_box_type1';
  }

?>
<?php
$xooblog_featured_switch = get_redux_opt_val('xooblog_featured_switch', '');
$featured_cat_id = get_redux_opt_val('xooblog_featured_categories', '');
$xooblog_featured_post_number = get_redux_opt_val('xooblog_featured_post_number', 5);


if ($xooblog_featured_switch  && is_home()) :

    $args = array(
        'cat' =>  $featured_cat_id ? $featured_cat_id : '',
        'posts_per_page' => $xooblog_featured_post_number
    );


    // Custom query.
    $query_with_featured_cat = new WP_Query($args);
    if ($xooblog_featured_switch) :
?>

        <div class="xooblog_featured_box <?php echo esc_attr($featuredbox_layout_class);?> mt-5 <?php echo esc_attr($page_layout_class); ?>">
            <div class="container">
                <div class="xooblog_featured_box_container">
                    <?php

                    // Check that we have query results.

                    if ($query_with_featured_cat->have_posts()) :

                        // Start looping over the query results.
                        while ($query_with_featured_cat->have_posts()) :
                            $query_with_featured_cat->the_post();
                            get_template_part('template-parts/post-formats/featured-post', get_post_type());

                        endwhile;

                    endif;

                    ?>
                </div>
            </div>
        </div>
<?php
    endif;

    // Restore original post data.
    wp_reset_postdata();
endif;
?>

<!--  -->

<?php


?>


<div class="home-page xooblog_post_layout  <?php echo esc_attr($page_layout_class); ?>">
    <div class="container section-padding">
        <div class="row">
           
            <div class="col-lg-8   <?php echo esc_attr($xooblog_sidebar_layout); ?>" id="site-content">
                <div class="post-area">
                    <div class="row">
                        <?php
                        $first = true;
                        if (have_posts()) :

                            // Start looping over the query results.
                            while (have_posts()) :
                                the_post();
                                if ($first && !is_sticky()) :
                                    get_template_part('template-parts/post-formats/first-post', get_post_type());
                                    $first = false;
                                else :
                                    get_template_part('template-parts/post-formats/post', get_post_type());
                                endif;

                            endwhile;
                        else :
                            get_template_part('template-parts/post-formats/post', 'none');
                        endif;
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="xooblog_pagination_contaier <?php echo esc_attr($page_layout_class);?>">
                                <?php xooblog_the_posts_pagination(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <?php 
            
            get_sidebar();
            ?>
            <!--  -->
        </div>
    </div>
</div>
<?php
wp_reset_postdata();
?>



<?php get_footer(); ?>