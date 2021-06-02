<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Township Lite
 */

get_header(); ?>

<main id="main" role="main">
    <div class="middle-align my-3">
    	<div class="container">
    		<?php
                $left_right = get_theme_mod( 'township_lite_theme_options','Right Sidebar');
                if($left_right == 'Left Sidebar'){ ?>
    	            <div class="row">
    					<div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
    					<div class="col-lg-8 col-md-8" id="content-aa">
    						<?php if ( have_posts() ) :
                              
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/single-content'); 
                              
                                endwhile;
                                wp_reset_postdata();
                                else :

                                    get_template_part( 'no-results' ); 

                                endif; 
                            ?>
    			       	</div>
    		        </div>
    	    <?php }else if($left_right == 'Right Sidebar'){ ?>
    	    	<div class="row">
    		       	<div class="col-lg-8 col-md-8" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    				<div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
    			</div>
    		<?php }else if($left_right == 'One Column'){ ?>
    			<div class="row">
    				<div class="col-lg-12" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    	        </div>
    	    <?php }else if($left_right == 'Three Columns'){ ?>
    		    <div class="row">
    		       	<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
    		       	<div class="col-lg-6 col-md-6" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    				<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
    			</div>
    		<?php }else if($left_right == 'Four Columns'){ ?>
    			<div class="row">
    				<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
    		       	<div class="col-lg-3 col-md-3" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    				<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
    				<div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
    			</div>
            <?php }else if($left_right == 'Grid Layout'){ ?>
            	<div class="row">
    				<div class="col-lg-8 col-md-8" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    				<div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
    			</div>
    		<?php } else {?>
    			<div class="row">
    				<div class="col-lg-8 col-md-8" id="content-aa">
    					<?php if ( have_posts() ) :
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/single-content'); 
                          
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
    		       	</div>
    				<div class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
    			</div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</main>
<?php get_footer(); ?>