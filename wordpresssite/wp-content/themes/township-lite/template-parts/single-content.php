<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Township Lite
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article>
	<h1><?php esc_html(the_title()); ?></h1>
	<?php if( get_theme_mod( 'township_lite_date_hide',true) != '' || get_theme_mod( 'township_lite_comment_hide',true) != '' || get_theme_mod( 'township_lite_author_hide',true) != '') { ?>
        <div class="metabox py-2">
            <?php if( get_theme_mod( 'township_lite_date_hide',true) != '') { ?>
              <span class="entry-date"><i class="far fa-calendar-alt mr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php }?>
            <?php if( get_theme_mod( 'township_lite_author_hide',true) != '') { ?>
              <span class="entry-author px-3"><i class="fa fa-user mr-2" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a></span>
            <?php }?>
            <?php if( get_theme_mod( 'township_lite_comment_hide',true) != '') { ?>
              <span class="entry-comments"><i class="fa fa-comments mr-2" aria-hidden="true"></i><?php comments_number( __('0 Comments','township-lite'), __('0 Comments','township-lite'), __('% Comments','township-lite') ); ?></span>
            <?php }?>
        </div>
    <?php }?>
    <?php if( get_theme_mod( 'township_lite_feature_image',true) != '') { ?>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box">	
				<?php the_post_thumbnail(); ?>
			</div>
			<hr>
		<?php }?>
	<?php }?>
	<div class="entry-content"><?php the_content(); ?></div>
	<?php if( get_theme_mod( 'township_lite_tags',true) != '') { ?>
		<div class="tags py-2"><?php the_tags(); ?></div>
	<?php }?>
	<div class="clearfix"></div> 
				             
	<?php
	 wp_link_pages( array(
	    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'township-lite' ) . '</span>',
	    'after'       => '</div>',
	    'link_before' => '<span>',
	    'link_after'  => '</span>',
	    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'township-lite' ) . ' </span>%',
	    'separator'   => '<span class="screen-reader-text">, </span>',
	) );
	 
	if( get_theme_mod( 'township_lite_comment',true) != '') {
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
	}

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'township-lite' ),
		) );
	} elseif ( is_singular( 'post' ) ) {
		if( get_theme_mod( 'township_lite_nav_links',true) != '') {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('township_lite_next_text',__( 'Next Post', 'township-lite' ))) . '<i class="fas fa-chevron-right ml-1"></i></span> ' .
					'<span class="screen-reader-text">' . __( 'Next Post', 'township-lite' ) . '</span> ' .
					'',
				'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left mr-1"></i>' . esc_html(get_theme_mod('township_lite_prev_text',__( 'Previous Post', 'township-lite' ))) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous Post', 'township-lite' ) . '</span> ' .
					'',
			) );
		}
	} ?>
</article>

<?php if (get_theme_mod('township_lite_related_posts',true) != '') {
	get_template_part( 'template-parts/related-posts' );
}