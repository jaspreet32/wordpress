<?php
/**
 * The template part for displaying slider
 *
 * @package Township Lite
 * @subpackage township_lite
 * @since Township Lite 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="postbox p-3 mb-4">
    <?php
       if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <div class="new-text">
      <div class="box-content">
        <h2 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>
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
        <?php if(get_theme_mod('township_lite_post_content') == 'Full Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if(get_theme_mod('township_lite_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <p><?php $excerpt = get_the_excerpt(); echo esc_html( township_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('township_lite_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('township_lite_button_excerpt_suffix','[...]') ); ?></p>
          <?php }?>
        <?php }?>
        <?php if ( get_theme_mod('township_lite_post_button_text','Read More') != '' ) {?>
          <a href="<?php esc_url(the_permalink()); ?>" class="blogbutton-small hvr-sweep-to-right mt-2" title="<?php esc_attr_e( 'Read Full', 'township-lite' ); ?>"><?php esc_html_e('Read Full','township-lite'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read Full', 'township-lite' );?></span></a>
        <?php }?>
      </div>
    </div>
    <div class="clearfix"></div> 
  </div>
</article>