<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Township Lite
 */

get_header(); ?>

<main id="main" role="main" class="content-aa">
	<?php do_action( 'township_lite_above_slider' ); ?>

	<?php if( get_theme_mod('township_lite_slider_arrows') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'township_lite_slider_speed',3000)) ?>"> 
			    <?php $slider_pages = array();
			      	for ( $count = 1; $count <= 4; $count++ ) {
				        $mod = intval( get_theme_mod( 'township_lite_slider_page' . $count ));
				        if ( 'page-none-selected' != $mod ) {
				          $slider_pages[] = $mod;
				        }
			      	}
			      	if( !empty($slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
			          	<a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a>
			          	<div class="carousel-caption">
				            <div class="inner_carousel">
				            	<?php if( get_theme_mod('township_lite_slider_title',true) != ''){ ?>
				              		<h1><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h1>
				              	<?php }?>
				              	<?php if( get_theme_mod('township_lite_slider_content',true) != ''){ ?>
				                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( township_lite_string_limit_words( $excerpt,esc_attr(get_theme_mod('township_lite_slider_excerpt','15')) ) ); ?></p>
				                <?php }?>
				                <?php if ( get_theme_mod('township_lite_slider_button_text','GET IN TOUCH') != '' && get_theme_mod('township_lite_slider_button',true) != '') {?>
				              		<a class="getin-btn" href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html( get_theme_mod('township_lite_slider_button_text',__('GET IN TOUCH', 'township-lite')) ); ?><span class="screen-reader-text"><?php esc_html_e( 'GET IN TOUCH', 'township-lite' );?></span></a>
				              	<?php }?>
				            </div>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
			      <?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      <span class="carousel-control-prev-icon py-md-3 px-md-4 py-2 px-3" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'township-lite' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      <span class="carousel-control-next-icon py-md-3 px-md-4 py-2 px-3" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next', 'township-lite' );?></span>
			    </a>
		  	</div>  
		  	<div class="clearfix"></div>
		</section> 
	<?php }?>

	<?php do_action( 'township_lite_below_slider' ); ?>

	<?php if( get_theme_mod('township_lite_main_title') != ''){ ?>	
		<section id="about" class="darkbox pb-4">
			<?php if( get_theme_mod('township_lite_main_title') != ''){ ?>
			    <div class="heading-line">
			      <h2 class="py-5 mb-5"><?php echo esc_html(get_theme_mod('township_lite_main_title','')); ?> </h2>
			    </div>
		    <?php } ?>
			<div class="container">
				<div class="row">
					<?php
						$catData=  get_theme_mod('township_lite_blogcategory_setting');
			            if($catData){
				         	$page_query = new WP_Query(array( 'category_name' => esc_html($catData,'township-lite')));?>
					  	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
					  		<div class="col-lg-4 col-md-4"> 
					  			<div class="row">
							    	<div class="col-lg-3 col-md-3">
							    		<div class="abt-img-box"><?php the_post_thumbnail(); ?></div>
							    	</div>
							    	<div class="col-lg-9 col-md-9">
							    		<h3 class="pt-0"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h3>
							    		<p><?php $excerpt = get_the_excerpt(); echo esc_html( township_lite_string_limit_words( $excerpt,20 ) ); ?></p>
							    	</div>
							    </div>
						    </div>
						    <?php endwhile;
						    wp_reset_postdata();
					} 	?>
				</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action( 'township_lite_below_about' ); ?>

	<div id="content-ma">
		<div class="container">
		  	<?php while ( have_posts() ) : the_post(); ?>
		    	<?php the_content(); ?>
		    <?php endwhile; // end of the loop. ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>