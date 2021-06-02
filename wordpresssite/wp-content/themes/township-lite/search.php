<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Township Lite
 */

get_header(); ?>

<main id="main" role="main" class="content-aa">
    <section class="middle-align my-3">
        <div class="container">
            <?php
                $left_right = get_theme_mod( 'township_lite_theme_options','Right Sidebar');
                if($left_right == 'Left Sidebar'){ ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                        <div class="col-lg-8 col-md-8">
                            <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                            <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', get_post_format() ); 
                              
                                endwhile;
                                wp_reset_postdata();
                                else :

                                    get_template_part( 'no-results' ); 

                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'township-lite' ),
                                        'next_text'          => __( 'Next page', 'township-lite' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                                    ) );
                                ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                              
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'township-lite' ),
                                    'next_text'          => __( 'Next page', 'township-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                </div>
            <?php }else if($left_right == 'One Column'){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                              
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'township-lite' ),
                                    'next_text'          => __( 'Next page', 'township-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            <?php }else if($left_right == 'Three Columns'){ ?>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-6 col-md-6">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', get_post_format() ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'township-lite' ),
                                'next_text'          => __( 'Next page', 'township-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
            <?php }else if($left_right == 'Four Columns'){ ?>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <div class="col-lg-3 col-md-3">
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', get_post_format() ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'township-lite' ),
                                'next_text'          => __( 'Next page', 'township-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
            <?php }else if($left_right == 'Grid Layout'){ ?> 
                <div class="row">
                    <div class="row col-lg-9 col-md-9">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                        <div class="row">
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                  
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/grid-layout' ); 
                                  
                                endwhile;
                                wp_reset_postdata();
                                else :

                                    get_template_part( 'no-results' ); 

                                endif; 
                            ?>
                        </div>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'township-lite' ),
                                    'next_text'          => __( 'Next page', 'township-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Results For: %s','township-lite'), esc_html( get_search_query() ) ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_format() ); 
                              
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'township-lite' ),
                                    'next_text'          => __( 'Next page', 'township-lite' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>',
                                ) );
                            ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>