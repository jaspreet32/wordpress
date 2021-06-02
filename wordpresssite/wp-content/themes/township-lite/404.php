<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Township Lite
 */

get_header(); ?>

<main id="main" role="main" class="content-aa">
	<div id="content-aa">
		<div class="container">
	        <div class="page-content py-3">		
				<?php if(get_theme_mod('township_lite_404_title','404 Not Found')){ ?>	
					<h1><?php echo esc_html( get_theme_mod('township_lite_404_title',__('404 Not Found', 'township-lite' )) ); ?></h1>
				<?php }?>
				<?php if(get_theme_mod('township_lite_404_text','Looks like you have taken a wrong turn. Dont worry it happens to the best of us.')){ ?>
					<p class="text-404"><?php echo esc_html( get_theme_mod('township_lite_404_text',__('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.', 'township-lite' )) ); ?></p>
				<?php }?>
				<?php if(get_theme_mod('township_lite_404_button_text','Back to Home Page')){ ?>
					<div class="read-moresec">
		           		<a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right py-2 px-4"><?php echo esc_html( get_theme_mod('township_lite_404_button_text',__('Back to Home Page', 'township-lite' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('township_lite_404_button_text',__('Back to Home Page', 'township-lite' )) ); ?></span></a>
					</div>
					<div class="clearfix"></div>
				<?php }?>				
	        </div>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>