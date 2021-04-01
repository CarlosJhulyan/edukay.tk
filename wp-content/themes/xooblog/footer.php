<!--  -->

<?php

$xooblog_footer_layout = get_redux_opt_val('xooblog_footer_layout', 1);
$xooblog_miscellaneous_totop = get_redux_opt_val('xooblog_miscellaneous_totop', 1);

?>
<footer class="tecxoo-footer-type-3">

  <?php

  if ($xooblog_footer_layout == 2) :
  ?>

    <div class="xooblog_footer_top">
      <div class="container">
        <div class="row">
          <!--  -->
          <div class="col-md-6 col-lg-3 col-sm-6">

            <?php

            if (is_active_sidebar('footer-1')) :
              dynamic_sidebar('footer-1');
            endif;
            ?>
          </div>
          <!--  -->
          <!--  -->
          <div class="col-md-6 col-lg-3 col-sm-6">

            <?php

            if (is_active_sidebar('footer-2')) :
              dynamic_sidebar('footer-2');
            endif;
            ?>
          </div>
          <!--  -->
          <!--  -->
          <div class="col-md-6 col-lg-3 col-sm-6">

            <?php

            if (is_active_sidebar('footer-3')) :
              dynamic_sidebar('footer-3');
            endif;
            ?>
          </div>
          <!--  -->
          <!--  -->
          <div class="col-md-6 col-lg-3 col-sm-6">

            <?php

            if (is_active_sidebar('footer-4')) :
              dynamic_sidebar('footer-4');
            endif;
            ?>
          </div>
          <!--  -->
        </div>
      </div>
    </div>

  <?php
  endif;

  ?>
  <!--  -->
  <div class="tecxoo-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="tecxoo-social-icon text-left">

            <?php
            if (has_nav_menu('footer_menu')) {
              wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'menu_id' => 'footer_menu',
                'menu_class' => 'list-style-none d-inline-flex pl-0'
              ));
            }
            ?>
            <!-- /.ul -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="tecxoo-copyright-text float-right">
            <p>
              <?php if (get_theme_mod('footer_text_block') != "") :
                echo esc_html(get_theme_mod('footer_text_block'));
              endif;
              ?>
              <?php

              if (is_home()) :
                _e('Powered By', 'xooblog');
              ?>
                <a href="<?php echo esc_url('https://tecxoo.com/themes/'); ?>" rel="nofollow" target="_blank">  <b><?php _e('TecXoo', 'xooblog'); ?></b></a>
              <?php
              else:
                _e('Powered By', 'xooblog');
                _e('TecXoo', 'xooblog');
              endif;

              ?>


            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->
</footer>
<!--  -->

<!--  -->

<?php

if ($xooblog_miscellaneous_totop) :
?>

  <div class="tecxoo-to-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
    <span>
      <?php
      _e('Top', 'xooblog');
      ?>
    </span>
  </div>

<?php
endif;


?>

<!--  -->

<!-- footer -->
<?php wp_footer(); ?>


<!-- Modal -->
<div class="modal fade xooblog_search_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php

          _e('Search Anything', 'xooblog');
          ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal"  aria-label="<?php esc_attr_e('Close', 'xooblog'); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form role="search" method="get" class="xooblog_navbar_search" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="search_field_parent">
            <input type="search" class="searach_field" placeholder="<?php esc_attr_e('Search …','xooblog') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e('Search for:', 'xooblog') ?>" />
            <button class="search_field_icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>

        </form>


      </div>

    </div>
  </div>
</div>


</body>

</html>