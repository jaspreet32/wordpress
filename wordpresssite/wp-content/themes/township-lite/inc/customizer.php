<?php
/**
 * Township Lite Theme Customizer
 *
 * @package Township Lite
 */

/**
 * Add post Message support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function township_lite_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'township_lite_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'township_lite_customize_partial_blogdescription',
		)
	);

	/* Custom panel type - used for multiple levels of panels */
	if ( class_exists( 'WP_Customize_Panel' ) ) {

		/**
		 * Class Township_Lite_WP_Customize_Panel
		 */
		class Township_Lite_WP_Customize_Panel extends WP_Customize_Panel {

			/**
			 * Panel
			 *
			 * @var $panel string Panel
			 */
			public $panel;

			/**
			 * Panel type
			 *
			 * @var $type string Panel type.
			 */
			public $type = 'township_lite_panel';

			/**
			 * Form the json
			 */
			public function json() {

				$array                   = wp_array_slice_assoc(
					(array) $this, array(
						'id',
						'description',
						'priority',
						'type',
						'panel',
					)
				);
				$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
				$array['content']        = $this->get_content();
				$array['active']         = $this->active();
				$array['instanceNumber'] = $this->instance_number;

				return $array;

			}

		}

	}

	$wp_customize->register_panel_type( 'Township_Lite_WP_Customize_Panel' );

	/**
	 * Upsells
	 */
	load_template( trailingslashit( get_template_directory() ) . 'inc/class-customizer-theme-info-control.php' );

	$wp_customize->add_section(
		'township_lite_theme_info_main_section', array(
			'title'    => __( 'View PRO version', 'township-lite' ),
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'township_lite_theme_info_main_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);
	$wp_customize->add_control(
		new Township_Lite_Theme_Info(
			$wp_customize, 'township_lite_theme_info_main_control', array(
				'section'     => 'township_lite_theme_info_main_section',
				'priority'    => 100,
				'options'     => array(
					esc_html__( 'Enable-Disable options on every section', 'township-lite' ),
					esc_html__( 'Background Color & Image Option', 'township-lite' ),
					esc_html__( '100+ Font Family Options', 'township-lite' ),
					esc_html__( 'Advanced Color options', 'township-lite' ),
					esc_html__( 'Translation ready', 'township-lite' ),
					esc_html__( 'Gallery, Banner, Post Type Plugin Functionality', 'township-lite' ),
					esc_html__( 'Integrated Google map', 'township-lite' ),
					esc_html__( '1 Year Free Support', 'township-lite' ),
				),
				'button_url'  => esc_url( 'https://www.themescaliber.com/themes/wp-township-construction-wordpress-theme' ),
				'button_text' => esc_html__( 'View PRO version', 'township-lite' ),
			)
		)
	);

    $font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Poppins' => 'Poppins',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );
    
	//add home page setting pannel
	$wp_customize->add_panel( 'township_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'township-lite' ),
	    'description' => __( 'Description of what this panel does.', 'township-lite' )
	) );

	//Color / Font Pallete
	$wp_customize->add_section( 'township_lite_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'township-lite' ),
		'priority'   => 30,
		'panel' => 'township_lite_panel_id'
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'township_lite_theme_color_first', array(
	    'default' => '#92bb46 ',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_theme_color_first', array(
  		'label' => 'Theme Color Option',
	    'section' => 'township_lite_typography',
	    'settings' => 'township_lite_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'township_lite_theme_color_second', array(
	    'default' => '#719430',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_theme_color_second', array(
  		'label' => 'Theme Color Option',
	    'section' => 'township_lite_typography',
	    'settings' => 'township_lite_theme_color_second',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'township_lite_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_paragraph_color', array(
		'label' => __('Paragraph Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('township_lite_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_paragraph_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'Paragraph Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('township_lite_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'township_lite_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_atag_color', array(
		'label' => __('"a" Tag Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('township_lite_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_atag_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( '"a" Tag Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'township_lite_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_li_color', array(
		'label' => __('"li" Tag Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('township_lite_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_li_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( '"li" Tag Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'township_lite_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h1_color', array(
		'label' => __('H1 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h1_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'H1 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('township_lite_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h1_font_size',array(
		'label'	=> __('H1 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'township_lite_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h2_color', array(
		'label' => __('h2 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h2_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'h2 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('township_lite_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h2_font_size',array(
		'label'	=> __('h2 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'township_lite_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h3_color', array(
		'label' => __('h3 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h3_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'h3 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('township_lite_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h3_font_size',array(
		'label'	=> __('h3 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'township_lite_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h4_color', array(
		'label' => __('h4 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h4_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'h4 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('township_lite_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h4_font_size',array(
		'label'	=> __('h4 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'township_lite_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h5_color', array(
		'label' => __('h5 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h5_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'h5 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('township_lite_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h5_font_size',array(
		'label'	=> __('h5 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'township_lite_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'township_lite_h6_color', array(
		'label' => __('h6 Color', 'township-lite'),
		'section' => 'township_lite_typography',
		'settings' => 'township_lite_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('township_lite_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control(
	    'township_lite_h6_font_family', array(
	    'section'  => 'township_lite_typography',
	    'label'    => __( 'h6 Fonts','township-lite'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('township_lite_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('township_lite_h6_font_size',array(
		'label'	=> __('h6 Font Size','township-lite'),
		'section'	=> 'township_lite_typography',
		'setting'	=> 'township_lite_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'township_lite_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'township-lite' ),
		'priority'   => 30,
		'panel' => 'township_lite_panel_id'
	) );

	$wp_customize->add_setting('township_lite_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control('township_lite_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','township-lite'),
        'section' => 'township_lite_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','township-lite'),
            'Contained Layout' => __('Contained Layout','township-lite'),
            'Boxed Layout' => __('Boxed Layout','township-lite'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('township_lite_theme_options',array(
	        'default' => 'Right Sidebar',
	        'sanitize_callback' => 'township_lite_sanitize_choices'
	) );
	$wp_customize->add_control('township_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','township-lite'),
	        'section' => 'township_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','township-lite'),
	            'Right Sidebar' => __('Right Sidebar','township-lite'),
	            'One Column' => __('One Column','township-lite'),
	            'Three Columns' => __('Three Columns','township-lite'),
	            'Four Columns' => __('Four Columns','township-lite'),
	            'Grid Layout' => __('Grid Layout','township-lite')
	        ),
	) );

	//Topbar section
	$wp_customize->add_section('township_lite_topbar_icon',array(
		'title'	=> __('Topbar Section','township-lite'),
		'description'	=> __('Add Header Content here','township-lite'),
		'priority'	=> null,
		'panel' => 'township_lite_panel_id',
	) );

	//Sticky Header
	$wp_customize->add_setting( 'township_lite_sticky_header',array(
        'default' => 'false',
      	'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ) );
    $wp_customize->add_control('township_lite_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','township-lite' ),
        'section' => 'township_lite_topbar_icon'
    ));

    $wp_customize->selective_refresh->add_partial(
		'township_lite_contact',
		array(
			'selector'        => '#header .top-contact',
			'render_callback' => 'township_lite_customize_partial_township_lite_contact',
		)
	);

	$wp_customize->add_setting('township_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'township_lite_sanitize_phone_number'
	));
	$wp_customize->add_control('township_lite_contact',array(
		'label'	=> __('Add Phone Number','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('township_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('township_lite_email',array(
		'label'	=> __('Add Email','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_email',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial(
		'township_lite_youtube_url',
		array(
			'selector'        => '#header .social-media',
			'render_callback' => 'township_lite_customize_partial_township_lite_youtube_url',
		)
	);

	$wp_customize->add_setting('township_lite_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('township_lite_youtube_url',array(
		'label'	=> __('Add Youtube link','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('township_lite_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('township_lite_facebook_url',array(
		'label'	=> __('Add Facebook link','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('township_lite_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('township_lite_twitter_url',array(
		'label'	=> __('Add Twitter link','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('township_lite_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('township_lite_rss_url',array(
		'label'	=> __('Add RSS link','township-lite'),
		'section'	=> 'township_lite_topbar_icon',
		'setting'	=> 'township_lite_rss_url',
		'type'	=> 'url'
	));	

	$wp_customize->add_setting('township_lite_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control('township_lite_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','township-lite'),
        'section' => 'township_lite_topbar_icon',
        'choices' => array(
            'uppercase' => __('Uppercase','township-lite'),
            'capitalize' => __('Capitalize','township-lite'),
        ),
	) );

	$wp_customize->add_setting( 'township_lite_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'township_lite_sanitize_float',
	) );
	$wp_customize->add_control( 'township_lite_nav_font_size', array(
		'label' => __( 'Navigation Font Size','township-lite' ),
		'section'     => 'township_lite_topbar_icon',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	//Slider Section
	$wp_customize->add_section( 'township_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'township-lite' ),
		'priority'   => null,
		'panel' => 'township_lite_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'township_lite_slider_arrows',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'township_lite_customize_partial_township_lite_slider_arrows',
		)
	);

	$wp_customize->add_setting('township_lite_slider_arrows',array(
      'default' => 'false',
      'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('township_lite_slider_arrows',array(
	      'type' => 'checkbox',
	      'label' => __('Show / Hide slider','township-lite'),
	      'section' => 'township_lite_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'township_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'township_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'township_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'township-lite' ),
			'section'  => 'township_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('township_lite_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('township_lite_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','township-lite'),
	   'section' => 'township_lite_slidersettings',
	));

	$wp_customize->add_setting('township_lite_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('township_lite_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','township-lite'),
	   'section' => 'township_lite_slidersettings',
	));

	$wp_customize->add_setting('township_lite_slider_button',array(
       'default' => 'true',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('township_lite_slider_button',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Button','township-lite'),
	   'section' => 'township_lite_slidersettings',
	));

    //Slider excerpt
	$wp_customize->add_setting( 'township_lite_slider_excerpt', array(
		'default'              => 15,
		'sanitize_callback'    => 'township_lite_sanitize_float',
	) );
	$wp_customize->add_control( 'township_lite_slider_excerpt', array(
		'label' => esc_html__( 'Slider Excerpt length','township-lite' ),
		'section'     => 'township_lite_slidersettings',
		'type'        => 'number',
		'settings'    => 'township_lite_slider_excerpt',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting( 'township_lite_slider_button_text', array(
		'default'   => __('GET IN TOUCH','township-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'township_lite_slider_button_text', array(
		'label'       => esc_html__( 'Slider Button text','township-lite' ),
		'section'     => 'township_lite_slidersettings',
		'type'        => 'text',
		'settings'    => 'township_lite_slider_button_text'
	) );

	//Opacity
	$wp_customize->add_setting('township_lite_slider_opacity',array(
        'default'   => 0.7,
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control( 'township_lite_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','township-lite' ),
		'section'    => 'township_lite_slidersettings',
		'type'        => 'select',
		'settings'   => 'township_lite_slider_opacity',
		'choices' => array(
	      '0' =>  esc_attr('0','township-lite'),
	      '0.1' =>  esc_attr('0.1','township-lite'),
	      '0.2' =>  esc_attr('0.2','township-lite'),
	      '0.3' =>  esc_attr('0.3','township-lite'),
	      '0.4' =>  esc_attr('0.4','township-lite'),
	      '0.5' =>  esc_attr('0.5','township-lite'),
	      '0.6' =>  esc_attr('0.6','township-lite'),
	      '0.7' =>  esc_attr('0.7','township-lite'),
	      '0.8' =>  esc_attr('0.8','township-lite'),
	      '0.9' =>  esc_attr('0.9','township-lite')
	  ),
	));

	//content Alignment
    $wp_customize->add_setting('township_lite_slider_content_option',array(
    	'default' => 'Center',
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control('township_lite_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','township-lite'),
        'section' => 'township_lite_slidersettings',
        'choices' => array(
            'Center' => __('Center','township-lite'),
            'Left' => __('Left','township-lite'),
            'Right' => __('Right','township-lite'),
        ),
	) );

	$wp_customize->add_setting('township_lite_content_spacing',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('township_lite_content_spacing',array(
		'label'	=> esc_html__('Slider Content Spacing','township-lite'),
		'section'=> 'township_lite_slidersettings',
	));

	$wp_customize->add_setting( 'township_lite_slider_top_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_slider_top_spacing', array(
		'label' => esc_html__( 'Top','township-lite' ),
		'section' => 'township_lite_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'township_lite_slider_bottom_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_slider_bottom_spacing', array(
		'label' => esc_html__( 'Bottom','township-lite' ),
		'section' => 'township_lite_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'township_lite_slider_left_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_slider_left_spacing', array(
		'label' => esc_html__( 'Left','township-lite'),
		'section' => 'township_lite_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'township_lite_slider_right_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_slider_right_spacing', array(
		'label' => esc_html__('Right','township-lite'),
		'section' => 'township_lite_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'township_lite_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_slider_speed', array(
		'label' => esc_html__('Slider Speed','township-lite'),
		'section' => 'township_lite_slidersettings',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 500,
			'min' => 500,
			'max' => 5000,
		),
	) );

	//Our Amenities
	$wp_customize->add_section('township_lite_amenities_section',array(
		'title'	=> __('Our Amenties','township-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'township_lite_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'township_lite_main_title',
		array(
			'selector'        => '.heading-line h2',
			'render_callback' => 'township_lite_customize_partial_township_lite_main_title',
		)
	);
	
	$wp_customize->add_setting('township_lite_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('township_lite_main_title',array(
		'label'	=> __('Title','township-lite'),
		'section'	=> 'township_lite_amenities_section',
		'type'	=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('township_lite_blogcategory_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'township_lite_sanitize_choices',
	));
	$wp_customize->add_control('township_lite_blogcategory_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','township-lite'),
		'section' => 'township_lite_amenities_section',
	));

	//Blog Post
	$wp_customize->add_section('township_lite_blog_post',array(
		'title'	=> __('Post Settings','township-lite'),
		'panel' => 'township_lite_panel_id',
	));	

	$wp_customize->add_setting('township_lite_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','township-lite'),
       'section' => 'township_lite_blog_post'
    ));

    $wp_customize->add_setting('township_lite_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','township-lite'),
       'section' => 'township_lite_blog_post'
    ));

    $wp_customize->add_setting('township_lite_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','township-lite'),
       'section' => 'township_lite_blog_post'
    ));

    $wp_customize->add_setting('township_lite_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control('township_lite_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','township-lite'),
        'section' => 'township_lite_blog_post',
        'choices' => array(
            'No Content' => __('No Content','township-lite'),
            'Full Content' => __('Full Content','township-lite'),
            'Excerpt Content' => __('Excerpt Content','township-lite'),
        ),
	) );

    $wp_customize->add_setting( 'township_lite_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','township-lite' ),
		'section'  => 'township_lite_blog_post',
		'type'  => 'number',
		'settings' => 'township_lite_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'township_lite_button_excerpt_suffix', array(
		'default'   => '[...]',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'township_lite_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','township-lite' ),
		'section'     => 'township_lite_blog_post',
		'type'        => 'text',
		'settings' => 'township_lite_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'township_lite_post_button_text', array(
		'default'   => esc_html__('Read Full','township-lite' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'township_lite_post_button_text', array(
		'label' => esc_html__('Post Button Text','township-lite' ),
		'section'     => 'township_lite_blog_post',
		'type'        => 'text',
		'settings'    => 'township_lite_post_button_text'
	) );

	$wp_customize->add_setting('township_lite_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','township-lite'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'township_lite_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('township_lite_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','township-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'township_lite_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'township_lite_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control('township_lite_button_border_radius', array(
        'label'  => __('Button Border Radius','township-lite'),
        'type'=> 'number',
        'section'  => 'township_lite_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    //Single Post Settings
	$wp_customize->add_section('township_lite_single_post',array(
		'title'	=> __('Single Post Settings','township-lite'),
		'panel' => 'township_lite_panel_id',
	));	

	$wp_customize->add_setting('township_lite_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Feature Image','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comment','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting('township_lite_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','township-lite'),
       'section' => 'township_lite_single_post'
    ));

    $wp_customize->add_setting( 'township_lite_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	) );
	$wp_customize->add_control( 'township_lite_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','township-lite' ),
		'section' => 'township_lite_single_post',
		'type' => 'number',
		'settings' => 'township_lite_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'township_lite_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'township_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'township_lite_post_order', array(
        'section' => 'township_lite_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'township-lite' ),
        'choices' => array(
            'categories'  => __('Categories', 'township-lite'),
            'tags' => __( 'Tags', 'township-lite' ),
    )));

    //404 page settings
	$wp_customize->add_section('township_lite_404_page',array(
		'title'	=> __('404 Page Settings','township-lite'),
		'priority'	=> null,
		'panel' => 'township_lite_panel_id',
	));

	$wp_customize->add_setting('township_lite_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','township-lite'),
       'section' => 'township_lite_404_page'
    ));

    $wp_customize->add_setting('township_lite_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','township-lite'),
       'section' => 'township_lite_404_page'
    ));

    $wp_customize->add_setting('township_lite_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('township_lite_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','township-lite'),
       'section' => 'township_lite_404_page'
    ));

	//Footer
	$wp_customize->add_section('township_lite_copyright',array(
		'title'	=> __('Footer Section','township-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'township_lite_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'township_lite_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'township_lite_customize_partial_township_lite_show_back_to_top',
		)
	);

	$wp_customize->add_setting('township_lite_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('township_lite_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','township-lite'),
      	'section' => 'township_lite_copyright',
	));

	$wp_customize->add_setting('township_lite_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'township_lite_sanitize_choices'
	));
	$wp_customize->add_control('township_lite_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','township-lite'),
        'section' => 'township_lite_copyright',
        'choices' => array(
            'Left' => __('Left','township-lite'),
            'Right' => __('Right','township-lite'),
            'Center' => __('Center','township-lite'),
        ),
	) );

	$wp_customize->add_setting('township_lite_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'township_lite_sanitize_choices',
    ));
    $wp_customize->add_control('township_lite_footer_widget_layout',array(
        'type'        => 'radio',
        'label'       => __('Footer widget layout', 'township-lite'),
        'section'     => 'township_lite_copyright',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'township-lite'),
        'choices' => array(
            '1'     => __('One', 'township-lite'),
            '2'     => __('Two', 'township-lite'),
            '3'     => __('Three', 'township-lite'),
            '4'     => __('Four', 'township-lite')
        ),
    ));

    $wp_customize->selective_refresh->add_partial(
		'township_lite_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'township_lite_customize_partial_township_lite_footer_copy',
		)
	);
	
	$wp_customize->add_setting('township_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('township_lite_footer_copy',array(
		'label'	=> __('Text','township-lite'),
		'section'	=> 'township_lite_copyright',
		'type'	=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'township_lite_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'township-lite' ),
		'priority'   => null,
		'panel' => 'township_lite_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'township_lite_products_per_row' , array(
		'default'           => '3',
		'transport'         => 'refresh',
		'sanitize_callback' => 'township_lite_sanitize_choices',
	) );

	$wp_customize->add_control('township_lite_products_per_row', array(
		'label' => __( 'Product per row', 'township-lite' ),
		'section'  => 'township_lite_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('township_lite_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'township_lite_sanitize_float'
	));	
	$wp_customize->add_control('township_lite_product_per_page',array(
		'label'	=> __('Product per page','township-lite'),
		'section'	=> 'township_lite_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('township_lite_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','township-lite'),
       'section' => 'township_lite_woocommerce_options',
    ));

    $wp_customize->add_setting('township_lite_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','township-lite'),
       'section' => 'township_lite_woocommerce_options',
    ));

    $wp_customize->add_setting('township_lite_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','township-lite'),
       'section' => 'township_lite_woocommerce_options',
    ));

	$wp_customize->add_setting( 'township_lite_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control( 'township_lite_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'township_lite_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'township_lite_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('township_lite_woocommerce_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'township_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('township_lite_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','township-lite'),
       'section' => 'township_lite_woocommerce_options',
    ));

	$wp_customize->add_setting( 'township_lite_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'township_lite_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'township_lite_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control('township_lite_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'township_lite_woocommerce_product_box_shadow',array(
		'default' => 5,
		'sanitize_callback' => 'township_lite_sanitize_float'
	));
	$wp_customize->add_control( 'township_lite_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','township-lite' ),
		'type' => 'number',
		'section' => 'township_lite_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

}
add_action( 'customize_register', 'township_lite_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Township_Lite_Customizer_Upsell {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager Customizer manager.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . 'inc/township-customize-theme-info-main.php' );
		load_template( trailingslashit( get_template_directory() ) . 'inc/township-customize-upsell-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'township_lite_Customizer_Theme_Info_Main' );

		// Main Documentation Link In Customizer Root.
		$manager->add_section(
			new Township_Lite_Customizer_Theme_Info_Main(
				$manager, 'township-lite-theme-info', array(
					'theme_info_title' => __( 'Township Docs', 'township-lite' ),
					'label_url'        => esc_url( 'https://themescaliber.com/demo/doc/free-tc-township/' ),
					'label_text'       => __( 'Documentation', 'township-lite' ),
				)
			)
		);

		// Frontpage Sections Upsell.
		$manager->add_section(
			new Township_Lite_Customizer_Upsell_Section(
				$manager, 'township-lite-upsell-frontpage-sections', array(
					'panel'       => 'township_lite_panel_id',
					'priority'    => 500,
					'options'     => array(
						esc_html__( 'About us Section', 'township-lite' ),
						esc_html__( 'Best architect Design section', 'township-lite' ),
						esc_html__( 'Gallery section', 'township-lite' ),
						esc_html__( 'Contact Section', 'township-lite' ),
					),
					'button_url'  => esc_url( 'https://www.themescaliber.com/themes/wp-township-construction-wordpress-theme' ),
					'button_text' => esc_html__( 'View PRO version', 'township-lite' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'township-lite-upsell-js', trailingslashit( esc_url(get_template_directory_uri()) ) . 'inc/js/township-customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'township-lite-theme-info-style', trailingslashit( esc_url(get_template_directory_uri()) ) . 'inc/css/township-style.css' );
	}
}

Township_Lite_Customizer_Upsell::get_instance();