<?php
/**
 * Used in empty archives and no search results page to display some possible post, pages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

    global $wp_query, $post, $posterity_a13;
?>

<p><span class="info-404"><?php
        /* translators: "Go back" link */
        printf( esc_html__('%s o puedes navegar por:', 'posterity' ), '<a href="javascript:history.go(-1)">'.esc_html__('Ir atrás', 'posterity').'</a>' ); ?></span></p>

<div class="left50">
    <?php
    if ( has_nav_menu( 'header-menu' ) ){
        echo '<h3>'.esc_html__( 'Menú Principal', 'posterity' ).'</h3>';
        wp_nav_menu( array(
                'container'       => false,
                'link_before'     => '',
                'link_after'      => '',
                'menu_class'      => 'styled in-site-map',
                'theme_location'  => 'header-menu' )
        );
    }
    ?>

    <h3><?php esc_html_e( 'Categorias', 'posterity' ); ?></h3>
    <ul class="styled">
        <?php wp_list_categories('title_li='); ?>
    </ul>
</div>

<div class="right50">
    <h3><?php esc_html_e( 'Páginas', 'posterity' ); ?></h3>
    <ul class="styled">
        <?php wp_list_pages('title_li='); ?>
    </ul>
</div>

<div class="clear"></div>