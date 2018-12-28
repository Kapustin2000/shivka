
				<div class="col-md-7 col-sm-7">
				
					<?php 
						$nt_conversi_services_list	= 	rwmb_meta( 'nt_conversi_services_list');
						$nt_conversi_images			=   rwmb_meta( 'nt_conversi_images' );
					?>
					
					<?php 
					if ( $nt_conversi_images !='' ) { 
					foreach ( $nt_conversi_images as $image ) { 
					?>
					   <p><img src="<?php	echo esc_url( $image['full_url'] ); ?>" class="img-responsive"></p>
					<?php } ?>
					<?php } ?>
					
					<?php 
						$nt_conversi_embed = rwmb_meta( 'nt_conversi_video_embed' ); 
						if( $nt_conversi_embed!='' ) : 
					?>
					
					<div class="media-element video-responsive"><?php echo ($nt_conversi_embed); ?></div>
					
					<?php else : ?>

					<?php
						$nt_conversi_m4v 			=	rwmb_meta( 'nt_conversi_video_m4v' );
						$nt_conversi_ogv 			=	rwmb_meta( 'nt_conversi_video_ogv' );
						$nt_conversi_webm 		=	rwmb_meta( 'nt_conversi_video_webm' );
						$nt_conversi_image_id 	=	get_post_thumbnail_id();
						$nt_conversi_image_url	=	wp_get_attachment_image_src($nt_conversi_image_id, true);
						$nt_conversi_wp_video 	=	'[video poster="'.$nt_conversi_image_url[0].'" mp4="'.$nt_conversi_m4v.'"  webm="'.$nt_conversi_webm.'"]';
					?>
					
					<div class="post-thumb"><?php echo do_shortcode ($nt_conversi_wp_video); ?></div>
					<?php endif; ?>
					
						<?php
							$nt_conversi_sc_color = rwmb_meta( 'nt_conversi_audio_sc_color' );
							$nt_conversi_sc_url 	= rwmb_meta( 'nt_conversi_audio_sc' );
							$nt_conversi_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode( $nt_conversi_sc_url ).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_conversi_sc_color.'"></iframe>';
						?>

						<?php if($nt_conversi_sc_url!='') : ?>
							<div class="post-thumb blog-bg"><?php echo ( $nt_conversi_soundcloud_audio ); ?></div>
						<?php endif; ?>
					
				</div>
               <div class="col-md-4 col-md-push-1 col-sm-4 col-sm-push-1">
					<h2 class="fh5co-heading"><?php the_title(); ?></h2>
				 
					<ul class="entry-meta portfolio">
						<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
						<li><?php the_author(); ?></li>
					</ul>
					
					<?php the_content(); ?>
					<div class="p-b"></div>
					<?php if( $nt_conversi_services_list ) :  ?>
					<div class="fh5co-checklist">
						<h3><?php esc_html_e( 'Services' , 'nt-conversi' ); ?></h3>
						<ul>
							<?php if ( $nt_conversi_services_list !='' ) { ?>
								<?php foreach ( $nt_conversi_services_list as $item ) { ?>
									<li><?php echo esc_html( $item ); ?> </li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
					<?php endif; ?>
					
                  <div class="fh5co-share">
                     <h3><?php esc_html_e( 'Share' , 'nt-conversi' ); ?></h3>
                     <ul>
						 <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Facebook' , 'nt-conversi' ); ?></a></li>
						 <li><a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Twitter' , 'nt-conversi' ); ?></a></li>
						 <li><a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Google Plus' , 'nt-conversi' ); ?></a></li>
						 <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><?php esc_html_e( 'Pinterest' , 'nt-conversi' ); ?></a></li>
                     </ul>
                  </div>

               </div>

			
        