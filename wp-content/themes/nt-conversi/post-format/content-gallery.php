	
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-bg">
				<?php
					wp_enqueue_style( 'nt-conversi-custom-flexslider');
					wp_enqueue_script( 'nt-conversi-custom-flexslider');
					wp_enqueue_script( 'fitvids');
					wp_enqueue_script( 'nt-conversi-blog-settings');
					$nt_conversi_images = rwmb_meta( 'nt_conversi_gallery_image', 'type=image_advanced' );
					if( $nt_conversi_images != '' ) : 
				?>
					<div class="flexslider">
						<ul class="slides">
							<?php
								foreach ( $nt_conversi_images as $image ) {
									echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
								}
							?>
						</ul>
					</div>
				<?php endif; ?>
		</div><!-- Ends Post Media -->

		<div class="post-container">
			<div class="content-container">
				<div class="entry-header">
					<?php
						if ( ! is_single() ) :
							the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
					?>
				</div><!-- .entry-header -->

				<ul class="entry-meta">
					<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
					<li><?php esc_html_e('in', 'nt-conversi'); ?>  <?php the_category(', '); ?></li>
					<li><?php the_author(); ?></li>
						<?php the_tags( '<li>', ',', '</li> '); ?>
				</ul>

			</div>
		
			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						esc_html__( 'Continue reading %s', 'nt-conversi' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-conversi' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-conversi' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->
		
			<?php if ( ! is_single() ) : ?>
				<a class="margin_30 btn" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Read More', 'nt-conversi' ); ?></a>
			<?php endif; // is_single() ?>
			
			<?php if (  is_single() ) : ?>
				<div id="share-buttons">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
					<a href="http://www.digg.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-digg"></i></a>
					<a href="http://reddit.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-reddit"></i></a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
					<a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
				</div>
			<?php endif; // is_single() ?>
		</div>
	</article><!-- #post-## -->