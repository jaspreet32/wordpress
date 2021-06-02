<?php
/**
 * @package Township Lite
 * @subpackage township-lite
 * @since township-lite 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses township_lite_header_style()
*/

function township_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'township_lite_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1600,
		'height'             => 200,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'township_lite_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'township_lite_custom_header_setup' );

if ( ! function_exists( 'township_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see township_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'township_lite_header_style' );
function township_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$township_lite_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'township-lite-basic-style', $township_lite_custom_css );
	endif;
}
endif; // township_lite_header_style
