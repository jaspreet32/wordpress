<?php
/**
 * Township Lite functions and definitions
 *
 * @package Township Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'township_lite_setup' ) ) :
 
/* Theme Setup */
function township_lite_setup() {

	$GLOBALS['content_width'] = apply_filters( 'township_lite_content_width', 640 );

	load_theme_textdomain( 'township-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('township-lite-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'township-lite' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			'sidebar-2' => array(
				'text_business_info',
			),
			'sidebar-3' => array(
				'text_about',
				'search',
			),
			'footer-1' => array(
				'text_about',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'text_business_info',
			),
			'footer-4' => array(
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
		),

		'theme_mods' => array(
			'township_lite_contact' => __('9874563210', 'township-lite' ),
			'township_lite_email' => __('example@gmail.com', 'township-lite' ),
			'township_lite_facebook_url' => 'www.facebook.com',
			'township_lite_twitter_url' => 'www.twitter.com',
			'township_lite_rss_url' => 'www.rss.com',
			'township_lite_youtube_url' => 'www.youtube.com',
			'township_lite_footer_copy' => __('By ThemesCaliber', 'township-lite' )
		),

		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'township-lite' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
    ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', township_lite_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'township_lite_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'township_lite_setup' );

// Dashboard Theme Notification
function township_lite_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dismissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'township-lite' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our Township theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'township-lite' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=township_lite_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'township-lite' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function township_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'township-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'township-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0 pb-2 mb-3">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'township-lite' ),
		'description'   => __( 'Appears on page sidebar', 'township-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0 pb-2 mb-3">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'township-lite' ),
		'description'   => __( 'Appears on page sidebar', 'township-lite' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title pt-0 pb-2 mb-3">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('township_lite_footer_widget_layout', '4');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'township-lite' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'township_lite_widgets_init' );

/* Theme Font URL */
function township_lite_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Caveat:400,700';	
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans:300i,400,400i,600,600i,700,700i,800,800i';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/* Theme enqueue scripts */
function township_lite_scripts() {
	wp_enqueue_style( 'township-lite-font', township_lite_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
	wp_enqueue_style( 'township-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
	wp_enqueue_style( 'township-lite-block-style', esc_url(get_template_directory_uri()).'/css/block-style.css' );	

	// Paragraph
    $township_lite_paragraph_color = get_theme_mod('township_lite_paragraph_color', '');
    $township_lite_paragraph_font_family = get_theme_mod('township_lite_paragraph_font_family', '');
    $township_lite_paragraph_font_size = get_theme_mod('township_lite_paragraph_font_size', '');
	// "a" tag
	$township_lite_atag_color = get_theme_mod('township_lite_atag_color', '');
    $township_lite_atag_font_family = get_theme_mod('township_lite_atag_font_family', '');
	// "li" tag
	$township_lite_li_color = get_theme_mod('township_lite_li_color', '');
    $township_lite_li_font_family = get_theme_mod('township_lite_li_font_family', '');
	// H1
	$township_lite_h1_color = get_theme_mod('township_lite_h1_color', '');
    $township_lite_h1_font_family = get_theme_mod('township_lite_h1_font_family', '');
    $township_lite_h1_font_size = get_theme_mod('township_lite_h1_font_size', '');
	// H2
	$township_lite_h2_color = get_theme_mod('township_lite_h2_color', '');
    $township_lite_h2_font_family = get_theme_mod('township_lite_h2_font_family', '');
    $township_lite_h2_font_size = get_theme_mod('township_lite_h2_font_size', '');
	// H3
	$township_lite_h3_color = get_theme_mod('township_lite_h3_color', '');
    $township_lite_h3_font_family = get_theme_mod('township_lite_h3_font_family', '');
    $township_lite_h3_font_size = get_theme_mod('township_lite_h3_font_size', '');
	// H4
	$township_lite_h4_color = get_theme_mod('township_lite_h4_color', '');
    $township_lite_h4_font_family = get_theme_mod('township_lite_h4_font_family', '');
    $township_lite_h4_font_size = get_theme_mod('township_lite_h4_font_size', '');
	// H5
	$township_lite_h5_color = get_theme_mod('township_lite_h5_color', '');
    $township_lite_h5_font_family = get_theme_mod('township_lite_h5_font_family', '');
    $township_lite_h5_font_size = get_theme_mod('township_lite_h5_font_size', '');
	// H6
	$township_lite_h6_color = get_theme_mod('township_lite_h6_color', '');
    $township_lite_h6_font_family = get_theme_mod('township_lite_h6_font_family', '');
    $township_lite_h6_font_size = get_theme_mod('township_lite_h6_font_size', '');
    $township_lite_theme_color_first = get_theme_mod('township_lite_theme_color_first', '');
    $township_lite_theme_color_second = get_theme_mod('township_lite_theme_color_second', '');

	$township_lite_custom_css ='
		p,span{
		    color:'.esc_html($township_lite_paragraph_color).'!important;
		    font-family: '.esc_html($township_lite_paragraph_font_family).';
		    font-size: '.esc_html($township_lite_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($township_lite_atag_color).'!important;
		    font-family: '.esc_html($township_lite_atag_font_family).';
		}
		li{
		    color:'.esc_html($township_lite_li_color).'!important;
		    font-family: '.esc_html($township_lite_li_font_family).';
		}
		h1{
		    color:'.esc_html($township_lite_h1_color).'!important;
		    font-family: '.esc_html($township_lite_h1_font_family).'!important;
		    font-size: '.esc_html($township_lite_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($township_lite_h2_color).'!important;
		    font-family: '.esc_html($township_lite_h2_font_family).'!important;
		    font-size: '.esc_html($township_lite_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($township_lite_h3_color).'!important;
		    font-family: '.esc_html($township_lite_h3_font_family).'!important;
		    font-size: '.esc_html($township_lite_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($township_lite_h4_color).'!important;
		    font-family: '.esc_html($township_lite_h4_font_family).'!important;
		    font-size: '.esc_html($township_lite_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($township_lite_h5_color).'!important;
		    font-family: '.esc_html($township_lite_h5_font_family).'!important;
		    font-size: '.esc_html($township_lite_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($township_lite_h6_color).'!important;
		    font-family: '.esc_html($township_lite_h6_font_family).'!important;
		    font-size: '.esc_html($township_lite_h6_font_size).'!important;
		}
		.hvr-sweep-to-right:before, .menubox.nav, .footertown, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .pagination a:hover,.page-links a:hover, .pagination .current,.page-links .current, .primary-navigation ul ul a,.woocommerce-product-search button[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
		    background-color:'.esc_html($township_lite_theme_color_first).';
		}
		#sidebar ul li::before{
		    background-color:'.esc_html($township_lite_theme_color_first).'!important;
		}
		a.button{
		    color:'.esc_html($township_lite_theme_color_first).';
		}
		a.button, .social-media i{
		    border-color:'.esc_html($township_lite_theme_color_first).'!important;
		}
		aside.widget.widget_calendar td#today, #comments input[type="submit"].submit, #sidebar .tagcloud a:hover, .pagination span,.pagination a, .page-links span, #header .nav ul li:hover > ul,.search-submit, #footer{
		    background-color:'.esc_html($township_lite_theme_color_second).'!important;
		}
		 .social-media i, span.call i,.top-contact i, a {
		    color:'.esc_html($township_lite_theme_color_second).';
		}
		@media screen and (max-width: 1000px){
			.sidebar{
				background-color:'.esc_html($township_lite_theme_color_first).';
			}
		}
	';

	wp_add_inline_style( 'township-lite-basic-style',$township_lite_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'township-lite-basic-style',$township_lite_custom_css );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') );	
	wp_enqueue_script( 'township-lite-customscripts', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'township_lite_scripts' );

/*radio button sanitization*/

function township_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function township_lite_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function township_lite_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'township_lite_loop_columns');
if (!function_exists('township_lite_loop_columns')) {
	function township_lite_loop_columns() {
		$columns = get_theme_mod( 'township_lite_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'township_lite_shop_per_page', 9 );
function township_lite_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'township_lite_product_per_page', 9 );
	return $cols;
}

/* Excerpt Limit Begin */
function township_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// URL DEFINES

define('TOWNSHIPLITE_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-tc-township/','township-lite'));
define('TOWNSHIPLITE_SUPPORT',__('https://wordpress.org/support/theme/township-lite','township-lite'));
define('TOWNSHIPLITE_REVIEW',__('https://wordpress.org/support/theme/township-lite/reviews/','township-lite'));
define('TOWNSHIPLITE_BUY_NOW',__('https://www.themescaliber.com/themes/wp-township-construction-wordpress-theme','township-lite'));
define('TOWNSHIPLITE_LIVE_DEMO',__('https://www.themescaliber.com/township-theme','township-lite'));
define('TOWNSHIPLITE_PRO_DOC',__('https://themescaliber.com/demo/doc/tc-township-pro/','township-lite'));
define('TOWNSHIPLITE_SITE_URL',__('https://www.themescaliber.com/themes/township-construction-wordpress-theme','township-lite'));

function township_lite_credit_link() {
    echo "<a href=".esc_url(TOWNSHIPLITE_SITE_URL)." target='_blank'>". esc_html__('Township WordPress Theme','township-lite')."</a>";
}

function township_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function township_lite_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';