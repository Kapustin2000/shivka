	<?php
	
		/*
		Template name: One page Template
		*/
		
		get_header();
		
		/* metabox or primary menu options */
		$nt_conversi_menu_item_name = 	rwmb_meta( 'nt_conversi_section_name' );
		$nt_conversi_menu_item_url 	= 	rwmb_meta( 'nt_conversi_section_url' );
		$nt_conversi_menutype 		= 	rwmb_meta( 'nt_conversi_menutype' );
		
		/* logo options */
		$nt_conversi_logo_option 	= ( ot_get_option( 'nt_conversi_logo_type' ) );
		$nt_conversi_img_whitelogo 	= ( ot_get_option( 'nt_conversi_whitelogoimg' ) );
		$nt_conversi_img_darklogo 	= ( ot_get_option( 'nt_conversi_darklogoimg' ) );
		$nt_conversi_text_logo 		= ( ot_get_option( 'nt_conversi_textlogo' ) );
		$nt_conversi_btn_display 	= ( ot_get_option( 'nt_conversi_menubtn_display' ) );
		$nt_conversi_menubtn 		= ( ot_get_option( 'nt_conversi_menubtn' ) );
		$nt_conversi_menubtnurl 	= ( ot_get_option( 'nt_conversi_menubtnurl' ) );
		$nt_conversi_menubtntarget 	= ( ot_get_option( 'nt_conversi_menubtntarget' ) );
		
		$nt_conversi_logo_target 	= ot_get_option( 'nt_conversi_logo_target' );
		$nt_conversi_logo_target 	= ( $nt_conversi_logo_target != '' ) ? ' target="'. esc_attr( $nt_conversi_logo_target ) .'"' : '';
		$nt_conversi_logo_link 		= ot_get_option( 'nt_conversi_logo_link' );
		$nt_conversi_logo_customlink= ( $nt_conversi_logo_link != '' ) ? $nt_conversi_logo_link : home_url( '/' );

	?>

	<nav id="navigation_affix" class="scrollspy">
		<div class="container">
			<div class="navbar-brand">
			
				<?php if ( ( $nt_conversi_logo_option ) == 'text' || ( $nt_conversi_logo_option ) == '') : ?>
					<?php if ( $nt_conversi_text_logo ) : ?>
					<a href="<?php echo esc_url( $nt_conversi_logo_customlink ); ?>" class="text-logo"<?php echo ( $nt_conversi_logo_target ); ?>><?php echo esc_html( $nt_conversi_text_logo ); ?></a> <!-- Your Logo -->
					<?php  else : ?>
						<a href="<?php echo esc_url( $nt_conversi_logo_customlink ); ?>" class="text-logo"<?php echo ( $nt_conversi_logo_target ); ?>><?php esc_html_e( 'CONVERSI', 'nt-conversi' ); ?></a> <!-- Your Logo -->
					<?php endif; ?>
				<?php endif; ?>
					
				<?php if (( $nt_conversi_logo_option ) == 'img' ) : ?>
					<?php if ( $nt_conversi_img_darklogo  ) : ?>
						<a href="<?php echo esc_url( $nt_conversi_logo_customlink ); ?>" class="img-logo"<?php echo ( $nt_conversi_logo_target ); ?>><img class="responsive-img" src="<?php echo esc_url( $nt_conversi_img_darklogo ); ?>" alt="<?php esc_html_e( 'Logo', 'nt-conversi' ); ?>"></a> <!-- Your Logo -->
						<?php  else : ?>
						<a href="<?php echo esc_url( $nt_conversi_logo_customlink ); ?>" class="text-logo"<?php echo ( $nt_conversi_logo_target ); ?>><?php esc_html_e( 'CONVERSI', 'nt-conversi' ); ?></a> <!-- Your Logo -->
					<?php endif; ?>
				<?php endif; ?>
				
			</div>
			<?php
			
				if( $nt_conversi_menutype  =='m' &&  $nt_conversi_menu_item_name !='' ){
				   echo '<ul class="nav navbar-nav">';				
						
						foreach (array_combine($nt_conversi_menu_item_name, $nt_conversi_menu_item_url) as $name => $url) { 
							echo ' 	<li><a class="smooth-scroll" href="'.esc_url($url).'">'.esc_html($name).'</a></li>';   
						}
						
						if( $nt_conversi_btn_display != 'off' ){
							if( $nt_conversi_menubtn != '' ){
								$menubtntarget = $nt_conversi_menubtntarget ? ' target="'.esc_attr( $nt_conversi_menubtntarget ).'"' : '';
								echo '<li class="menu-btn"><a href="'.esc_url( $nt_conversi_menubtnurl ).'" '.$menubtntarget.'>'.esc_html( $nt_conversi_menubtn ).'</a></li>';
							}
						}

					echo '</ul>';
				}
				
				if(  $nt_conversi_menutype  =='p' ){
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => '',
						'container_class'   => '',
						'menu_class'        => 'nav navbar-nav primary-menu',
						'menu_id'		    => 'primary-menu-affix',
						'echo' 				=> true,
						'fallback_cb'       => 'Nt_Conversi_Wp_Bootstrap_Navwalker::fallback',
						'walker'            => new Nt_Conversi_Wp_Bootstrap_Navwalker()
					));
				}
			?>
		</div>
	</nav>

	<nav id="navigation_mobile">
		<div class="nav-menu-links">
			<?php
				if( $nt_conversi_menutype  =='m' &&  $nt_conversi_menu_item_name !='' ){
				   echo '<ul class="mobile-nav">';				
					foreach (array_combine($nt_conversi_menu_item_name, $nt_conversi_menu_item_url) as $name => $url) { 

						echo ' 	<li><a class="smooth-scroll" href="'.esc_url($url).'">'.esc_html($name).'</a></li>';   }

						if( $nt_conversi_btn_display != 'off' ){
							if( $nt_conversi_menubtn != '' ){
								$menubtntarget = $nt_conversi_menubtntarget ? ' target="'.esc_attr( $nt_conversi_menubtntarget ).'"' : '';
								echo '<li class="menu-btn"><a href="'.esc_url( $nt_conversi_menubtnurl ).'" '.$menubtntarget.'>'.esc_html( $nt_conversi_menubtn ).'</a></li>';
							}
						}

					echo '</ul>';
					
					$nt_conversi_header_contact_display 	= ot_get_option( 'nt_conversi_header_contact_display' );
					$nt_conversi_header_social_display 	= ot_get_option( 'nt_conversi_header_social_display' );

					if( $nt_conversi_header_social_display  != 'off' || $nt_conversi_header_contact_display  != 'off' ){

						//header contact section
						$nt_conversi_mobile_contact_display 	= ot_get_option( 'nt_conversi_mobile_contact_display' );
						$nt_conversi_header_contact 			= ot_get_option( 'nt_conversi_header_contact', array() );
						$nt_conversi_header_contact_target 		= ot_get_option( 'nt_conversi_header_contact_target' );
						$nt_conversi_header_contact_target = ( $nt_conversi_header_contact_target != '' ) ? 'target="'. esc_attr( $nt_conversi_header_contact_target ) .'"' : '';
						
						if( $nt_conversi_header_contact_display  != 'off' ){
							if( $nt_conversi_mobile_contact_display  != 'off' ){
								if ( ! empty( $nt_conversi_header_contact ) ) { 
									echo '<div class="mobile-contact">';
										echo '<ul class="mobile-contact-list">';
											foreach( $nt_conversi_header_contact as $con ) {
												echo '<li class="header-contact">';

												$contacticon = ( !empty( $con['nt_conversi_header_contact_icon'] ) ) ? '<i class="'.esc_attr( $con['nt_conversi_header_contact_icon'] ).'"></i>' : '';
												if( !empty( $con['nt_conversi_header_contact_link'] ) ){
													echo '<a href="'.esc_url( $con['nt_conversi_header_contact_link'] ).'"'.$nt_conversi_header_contact_target.'>'.$contacticon.'  '.esc_attr( $con['nt_conversi_header_contact_text'] ).'</a>';
												}else{
													echo ''.$contacticon.'  '.esc_attr( $con['nt_conversi_header_contact_text'] ).'';
												}
												echo '</li>';
											}
										echo '</ul>';
									echo '</div>';
								}
							}
						}

						//header social section
						$nt_conversi_mobile_social_display 	= ot_get_option( 'nt_conversi_header_mobile_social_display' );
						$nt_conversi_header_social 			= ot_get_option( 'nt_conversi_header_social', array() );
						$nt_conversi_header_social_target 	= ot_get_option( 'nt_conversi_header_social_target' );
						$nt_conversi_header_social_target = ( $nt_conversi_header_social_target != '' ) ? 'target="'. esc_attr( $nt_conversi_header_social_target ) .'"' : '';

						if(  $nt_conversi_header_social_display  != 'off' ){
							if( $nt_conversi_mobile_social_display  != 'off' ){
								if ( ! empty( $nt_conversi_header_social ) ) { 
									echo '<ul class="mobile-nav-social">';
										foreach( $nt_conversi_header_social as $soc ) {
											echo '<li class="social-media"><a class="link-'.esc_attr( $soc['nt_conversi_header_social_name'] ).'"href="'.esc_url( $soc['nt_conversi_header_social_link'] ).'"'.$nt_conversi_header_social_target.'><i class="'.esc_attr( $soc['nt_conversi_header_social_text'] ).'"></i></a></li>';
										}
									echo '</ul>';
								}
							}
						}
					}
				}

				if(  $nt_conversi_menutype  =='p' ){
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => '',
						'container_class'   => '',
						'menu_class'        => 'primary-menu',
						'menu_id'		    => 'primary-menu-mobile-affix',
						'echo' 				=> true,
						'fallback_cb'       => 'Nt_Conversi_Wp_Bootstrap_Navwalker::fallback',
						'walker'            => new Nt_Conversi_Wp_Bootstrap_Navwalker()
					));
				}
			?>
		</div>
		<div class="nav-menu-button">
			<button class="nav-menu-toggle"><i class="fa fa-navicon"></i></button>
		</div>
	</nav>

	
	<?php  $nt_conversi_boxed 	= ( ot_get_option( 'nt_conversi_boxed' ) != '' ) ? ot_get_option( 'nt_conversi_boxed' ) : 'stretched'; ?>

	<?php if (( $nt_conversi_boxed ) == 'boxed' ) : ?>

		<div id="main-wrap">

	<?php endif; ?>

		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();  
					the_content(); 
				endwhile; 
			endif; 
		?>

		<?php get_footer(); ?>
	
	<?php if (( $nt_conversi_boxed ) == 'boxed' ) : ?>
	
		</div>

	<?php endif; ?>