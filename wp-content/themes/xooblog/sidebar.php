<?php 

$xooblog_sidebar_layout = get_redux_opt_val('xooblog_sidebar_layout',1);
$xooblog_sidebar_switch = get_redux_opt_val('xooblog_sidebar_switch',1);

$sidbear_class = '';

if($xooblog_sidebar_layout == 1){   
    $sidbear_class = 'order-last';
}else{
    $sidbear_class = 'order-first';
}


?>

<div class="col-lg-4 col-md-12  <?php echo esc_attr($sidbear_class);?> ">
    <!-- sidebar Here -->
    <div class="tecxoo-sidebar sidebar <?php echo esc_attr($xooblog_sidebar_switch ? 'sticky_sidebar' : '');?>  ">
        <?php

        if (is_active_sidebar('sidebar-1')) :
            dynamic_sidebar('sidebar-1');
        endif;
        ?>
    </div>
    <!-- sidebar Here -->
</div>