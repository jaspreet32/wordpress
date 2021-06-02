<?php 
	$township_lite_custom_css ='';

	/*---------------------------Width Layout -------------------*/
	$theme_lay = get_theme_mod( 'township_lite_width_options','Full Layout');
    if($theme_lay == 'Full Layout'){
		$township_lite_custom_css .='body{';
			$township_lite_custom_css .='max-width: 100%;';
		$township_lite_custom_css .='}';
	}else if($theme_lay == 'Contained Layout'){
		$township_lite_custom_css .='body{';
			$township_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$township_lite_custom_css .='}';
	}else if($theme_lay == 'Boxed Layout'){
		$township_lite_custom_css .='body{';
			$township_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$township_lite_custom_css .='}';
	}

	/*------------- Slider Opacity -------------------*/
	$slider_layout = get_theme_mod( 'township_lite_slider_opacity','0.7');
	if($slider_layout == '0'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.1'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.1';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.2'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.2';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.3'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.3';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.4'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.4';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.5'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.5';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.6'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.6';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.7'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.7';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.8'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.8';
		$township_lite_custom_css .='}';
	}else if($slider_layout == '0.9'){
		$township_lite_custom_css .='#slider img{';
			$township_lite_custom_css .='opacity:0.9';
		$township_lite_custom_css .='}';
	}

	/*-------------Slider Content Layout ------------*/
	$slider_layout = get_theme_mod( 'township_lite_slider_content_option','Center');
    if($slider_layout == 'Left'){
		$township_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$township_lite_custom_css .='text-align:left;';
		$township_lite_custom_css .='}';
		$township_lite_custom_css .='#slider .carousel-caption{';
		$township_lite_custom_css .='left:15%; right:35%;';
		$township_lite_custom_css .='}';
	}else if($slider_layout == 'Center'){
		$township_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$township_lite_custom_css .='text-align:center;';
		$township_lite_custom_css .='}';
		$township_lite_custom_css .='#slider .carousel-caption{';
		$township_lite_custom_css .='left:25%; right:25%;';
		$township_lite_custom_css .='}';
	}else if($slider_layout == 'Right'){
		$township_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$township_lite_custom_css .='text-align:right;';
		$township_lite_custom_css .='}';
		$township_lite_custom_css .='#slider .carousel-caption{';
		$township_lite_custom_css .='left:35%; right:15%;';
		$township_lite_custom_css .='}';
	}

	/* Slider content spacing */
	$top_spacing = get_theme_mod('township_lite_slider_top_spacing');
	$bottom_spacing = get_theme_mod('township_lite_slider_bottom_spacing');
	$left_spacing = get_theme_mod('township_lite_slider_left_spacing');
	$right_spacing = get_theme_mod('township_lite_slider_right_spacing');
	if($top_spacing != false || $bottom_spacing != false || $left_spacing != false || $right_spacing != false){
		$township_lite_custom_css .='#slider .carousel-caption{';
			$township_lite_custom_css .='top: '.esc_html($top_spacing).'%; bottom: '.esc_html($bottom_spacing).'%; left: '.esc_html($left_spacing).'%; right: '.esc_html($right_spacing).'%;';
		$township_lite_custom_css .='}';
	}

	/*------ Button Style -------*/
	$top_buttom_padding = get_theme_mod('township_lite_top_button_padding');
	$left_right_padding = get_theme_mod('township_lite_left_button_padding');
	if($top_buttom_padding != false || $left_right_padding != false ){
		$township_lite_custom_css .='.blogbutton-small, #slider .inner_carousel a.getin-btn, #comments input[type="submit"].submit{';
			$township_lite_custom_css .='padding-top: '.esc_html($top_buttom_padding).'px; padding-bottom: '.esc_html($top_buttom_padding).'px; padding-left: '.esc_html($left_right_padding).'px; padding-right: '.esc_html($left_right_padding).'px;';
		$township_lite_custom_css .='}';
	}

	$button_border_radius = get_theme_mod('township_lite_button_border_radius');
	$township_lite_custom_css .='.read-btn a.blogbutton-small, #slider .read-btn a.blogbutton-small, #slider .inner_carousel a.getin-btn, #comments input[type="submit"].submit{';
		$township_lite_custom_css .='border-radius: '.esc_html($button_border_radius).'px;';
	$township_lite_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$township_lite_woocommerce_button_padding_top = get_theme_mod('township_lite_woocommerce_button_padding_top');
	if($township_lite_woocommerce_button_padding_top != false){
		$township_lite_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$township_lite_custom_css .='padding-top: '.esc_html($township_lite_woocommerce_button_padding_top).'px; padding-bottom: '.esc_html($township_lite_woocommerce_button_padding_top).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_button_padding_right = get_theme_mod('township_lite_woocommerce_button_padding_right');
	if($township_lite_woocommerce_button_padding_right != false){
		$township_lite_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$township_lite_custom_css .='padding-left: '.esc_html($township_lite_woocommerce_button_padding_right).'px; padding-right: '.esc_html($township_lite_woocommerce_button_padding_right).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_button_border_radius = get_theme_mod('township_lite_woocommerce_button_border_radius');
	if($township_lite_woocommerce_button_border_radius != false){
		$township_lite_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$township_lite_custom_css .='border-radius: '.esc_html($township_lite_woocommerce_button_border_radius).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_related_product = get_theme_mod('township_lite_related_product',true);

	if($township_lite_related_product == false){
		$township_lite_custom_css .='.related.products{';
			$township_lite_custom_css .='display: none;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_product_border = get_theme_mod('township_lite_woocommerce_product_border',true);

	if($township_lite_woocommerce_product_border == true){
		$township_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$township_lite_custom_css .='border: 1px solid #dcdcdc;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_product_padding_top = get_theme_mod('township_lite_woocommerce_product_padding_top',10);
	if($township_lite_woocommerce_product_padding_top != false){
		$township_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$township_lite_custom_css .='padding-top: '.esc_html($township_lite_woocommerce_product_padding_top).'px; padding-bottom: '.esc_html($township_lite_woocommerce_product_padding_top).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_product_padding_right = get_theme_mod('township_lite_woocommerce_product_padding_right',10);
	if($township_lite_woocommerce_product_padding_right != false){
		$township_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$township_lite_custom_css .='padding-left: '.esc_html($township_lite_woocommerce_product_padding_right).'px; padding-right: '.esc_html($township_lite_woocommerce_product_padding_right).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_product_border_radius = get_theme_mod('township_lite_woocommerce_product_border_radius');
	if($township_lite_woocommerce_product_border_radius != false){
		$township_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$township_lite_custom_css .='border-radius: '.esc_html($township_lite_woocommerce_product_border_radius).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_woocommerce_product_box_shadow = get_theme_mod('township_lite_woocommerce_product_box_shadow', 5);
	if($township_lite_woocommerce_product_box_shadow != false){
		$township_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$township_lite_custom_css .='box-shadow: '.esc_html($township_lite_woocommerce_product_box_shadow).'px '.esc_html($township_lite_woocommerce_product_box_shadow).'px '.esc_html($township_lite_woocommerce_product_box_shadow).'px #aaa;';
		$township_lite_custom_css .='}';
	}

	// Navigation Font Size 
	$township_lite_nav_font_size = get_theme_mod('township_lite_nav_font_size');
	if($township_lite_nav_font_size != false){
		$township_lite_custom_css .='.primary-navigation ul li a{';
			$township_lite_custom_css .='font-size: '.esc_attr($township_lite_nav_font_size).'px;';
		$township_lite_custom_css .='}';
	}

	$township_lite_navigation_case = get_theme_mod('township_lite_navigation_case', 'capitalize');
	if($township_lite_navigation_case == 'uppercase' ){
		$township_lite_custom_css .='.primary-navigation ul li a{';
			$township_lite_custom_css .=' text-transform: uppercase;';
		$township_lite_custom_css .='}';
	}elseif($township_lite_navigation_case == 'capitalize' ){
		$township_lite_custom_css .='.primary-navigation ul li a{';
			$township_lite_custom_css .=' text-transform: capitalize;';
		$township_lite_custom_css .='}';
	}

	//Site title Font size
	$township_lite_site_title_fontsize = get_theme_mod('township_lite_site_title_fontsize');
	$township_lite_custom_css .='#header .logo h1, #header .logo p.site-title{';
		$township_lite_custom_css .='font-size: '.esc_attr($township_lite_site_title_fontsize).'px;';
	$township_lite_custom_css .='}';

	$township_lite_site_description_fontsize = get_theme_mod('township_lite_site_description_fontsize');
	$township_lite_custom_css .='#header .logo p.site-description{';
		$township_lite_custom_css .='font-size: '.esc_attr($township_lite_site_description_fontsize).'px;';
	$township_lite_custom_css .='}';