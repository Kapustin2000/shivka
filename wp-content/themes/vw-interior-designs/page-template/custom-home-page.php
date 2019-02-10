<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_interior_designs_before_slider' ); ?>

<?php if( get_theme_mod( 'vw_interior_designs_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_interior_designs_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">
                <i class="fas fa-home"></i><a href="<?php the_permalink(); ?>"><?php esc_html_e('VIEW MORE','vw-interior-designs'); ?></a>
              </div>
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
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section>

<?php } ?>

<div class="home-header1">
  <?php get_template_part('template-parts/header/navigation'); ?>
</div>

<?php do_action( 'vw_interior_designs_after_slider' ); ?>

<?php if( get_theme_mod( 'vw_interior_designs_video_section') != '') { ?>

<section id="vedio-section">
  <div class="container">
    <?php $args = array( 'name' => get_theme_mod('vw_interior_designs_video_section',''));
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="row">
          <div class="col-md-5 col-sm-5">
            <div class="vedio-content">
              <h3><?php the_title(); ?></h3>
              <hr>
              <p><?php the_excerpt(); ?></p>
              <div class ="video-btn">
                <i class="fas fa-home"></i><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html_e('View More','vw-interior-designs'); ?></a>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-sm-7">
            <div class="vedio-box">
              <?php
                  $content = apply_filters( 'the_content', get_the_content() );
                  $video = false;

                  // Only get video from the content if a playlist isn't present.
                  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                }
              ?>
              <?php
                if ( ! is_single() ) {
                  // If not a single post, highlight the video file.
                  if ( ! empty( $video ) ) {
                    foreach ( $video as $video_html ) {
                      echo '<div class="entry-video">';
                        echo $video_html;
                      echo '</div>';
                    }
                  }
                  elseif(has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                  }
                }; 
              ?>
            </div>
          </div>
        </div>
      <?php endwhile; 
      wp_reset_postdata();?>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php
    endif; ?>
  </div>
</section>

<?php }?>

<?php do_action( 'vw_interior_designs_after_articles' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>




