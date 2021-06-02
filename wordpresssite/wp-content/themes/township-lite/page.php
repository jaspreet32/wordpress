<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Township Lite
 */

get_header(); ?>

<main id="main" role="main" class="content-aa">
    <?php do_action( 'township_lite_page_header' ); ?>

    <div class="container">
        <div id="content-aa" class="middle-align my-3"> 
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
            <div class="clearfix"></div>              
        </div>
    </div>

    <?php do_action( 'township_lite_page_footer' ); ?>
</main>

<?php get_footer(); ?>