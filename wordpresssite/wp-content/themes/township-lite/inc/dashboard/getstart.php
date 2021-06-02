<?php
//about theme info
add_action( 'admin_menu', 'township_lite_gettingstarted' );
function township_lite_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'township-lite'), esc_html__('Get Started', 'township-lite'), 'edit_theme_options', 'township_lite_guide', 'township_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function township_lite_admin_theme_style() {
   wp_enqueue_style('township-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'township_lite_admin_theme_style');

//guidline for about theme
function township_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'township-lite' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button class="tablinks home" onclick="township_lite_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'township-lite' ); ?></button>
		  	<button class="tablinks" onclick="township_lite_openCity(event, 'tc_pro')"><?php esc_html_e( 'Click to Premium Theme', 'township-lite' ); ?></button>
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Township Theme', 'township-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( TOWNSHIPLITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'township-lite' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'township-lite'); ?></a>
				<a href="<?php echo esc_url( TOWNSHIPLITE_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'township-lite' ); ?></a>
				<a class="get-pro" href="<?php echo esc_url( TOWNSHIPLITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'township-lite'); ?></a>
			</div>
			<div class="col-tc-6">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screen.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Township is a Multipurpose construction WordPress Theme for for business, freelancers and private use, clean and unique with a great elegant multipurpose responsive design for your website. a lightweight and fully responsive theme, is an attractive, modern, easy to use and responsive WordPress theme with colorful design and stunning flexibility. This theme can be used for real estate, blog, news, landing page, travel, store, food, restaurant, photography, hotel, school, education, fitness, fashion store or any business. Township have customizer by this you can easily customize theme in just few clicks. This theme gives you awesome looking website, The theme is SEO friendly with optimized codes, which make it easy for your site to rank on Google and other search engines. This theme is SEO friendly.', 'township-lite' ); ?></P>
			</div>
			<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'township-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'township-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'township-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'township-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'township-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'township-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'township-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'township-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'township-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'township-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'township-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'township-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'township-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>							
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'township-lite'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/right-arrow.png" alt="" /></td>
							</tr>					
						</tbody>
					</table>
					<div class="info-link">
						<a href="<?php echo esc_url( TOWNSHIPLITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'township-lite' ); ?></a>
					</div>
				</div>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'TC Ecommerce Theme Information', 'township-lite' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( TOWNSHIPLITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'township-lite' ); ?></a></p>
				<p><a href="<?php echo esc_url( TOWNSHIPLITE_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'township-lite' ); ?></a></p>
				<p><a href="<?php echo esc_url( TOWNSHIPLITE_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'township-lite' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Township Pro Theme', 'township-lite' ); ?></h4>
				<P><?php esc_html_e( 'Township Construction is a multipurpose and highly responsive Premium Construction WordPress Theme for people who are looking to establish their construction and real estate website. This Best Construction WordPress Theme offers ample of features such as detailed demo, pricing plans, some shortcodes, cross browser compatibility, etc. to build an awesome website. It comes well packed with customization settings and beautiful layouts for you to display your constructional skills in the best way. The easy to use admin panel offers easy and quick customization of almost everything including the typography and colors. It offers excellent loading speeds which give amazing user experience. This user-friendly theme has useful sections such as blogs, gallery, and testimonial section. It is very flexible as it is built on a dynamic Bootstrap framework. It has an integrated Google map that helps clients in easily locating your firm. Even you can set up your online store due to the feature of WooCommerce. Furthermore, its SEO friendly which makes your site appear on top in search engines. This is the Top Construction WordPress Theme for you if you are looking to build the best construction website.', 'township-lite' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Product Description', 'township-lite' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'township-lite' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Simple and Mega Menu Option', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with multiple effects and control options', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Parallax Image-Background Section', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'township-lite' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'township-lite' ); ?></li>
				</ul>				
			</div>
		</div>
	</div>
</div>
<?php } ?>