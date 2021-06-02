<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<main id="main" role="main" class="content-aa">
    <?php do_action( 'township_lite_pageright_header' ); ?>

    <div class="container">
        <div class="middle-align my-3 row">       
    		<div class="col-lg-8 col-md-8" id="content-aa" >
    			<?php while ( have_posts() ) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                    <h1><?php esc_html(the_title()); ?></h1>
                    <div class="entry-content"><?php the_content(); ?></div>
                    <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'township-lite' ),
                        'after'  => '</div>',
                    ) );
                    
                    //If comments are open or we have at least one comment, load up the comment template
                    	if ( comments_open() || '0' != get_comments_number() )
                        	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>             
            </div>
            <div class="col-lg-4 col-md-4" id="sidebar">
    			<?php dynamic_sidebar('sidebar-2'); ?>
    		</div>                
            <div class="clearfix"></div>
        </div>
    </div>

    <?php do_action( 'township_lite_pageright_footer' ); ?>
</main>

<?php get_footer(); ?>