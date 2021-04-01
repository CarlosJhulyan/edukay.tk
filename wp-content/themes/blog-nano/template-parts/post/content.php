<?php
/**
 * Template part for displaying posts
 * @package Blog Nano
 * @version 1.0.0
 */

$image_size = "blog-nano-thumbnail-3";
 
$readmore       = web_log_get_option( 'readmore_text' );


 ?>
  
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrapper">
     
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($image_size); ?></a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

		<div class="post-content-wrapper">

            <?php
            $the_cat = get_the_category();
            if(!empty($the_cat))
            {
                $category_name = $the_cat[0]->cat_name;
                $category_description = $the_cat[0]->category_description;
                $category_link = get_category_link( $the_cat[0]->cat_ID );
            ?>

               <span class="meta-category"><a href="<?php echo $category_link; ?>"><?php
                echo esc_html($category_name);?></a>
                </span> 
      <?php } ?>
                <header class="entry-header">
                    
                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                
                    <ul class="entry-meta list-inline">
                        
                        <?php if ( 'post' === get_post_type() ): web_log_posted_on(); endif; ?>
                       
                    </ul>
                
                </header><!-- .entry-header -->
                        
                <div class="entry-content">
                   
                    <?php the_excerpt(); ?>
                    
                    <?php
                      if(!empty($readmore)) {
                    ?>
                      <div class="read-more"><a href="<?php the_permalink(); ?>" class="link"><?php echo esc_html($readmore); ?><i class="fa fa-angle-right"></i></a></div>
                    <?php  } ?>

                       
                </div><!-- .entry-content -->
        
    	</div>
    </div>
</article><!-- #post-## -->