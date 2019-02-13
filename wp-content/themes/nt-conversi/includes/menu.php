<?php 

	/* logo options */
	$nt_conversi_logo_option 	= ( ot_get_option( 'nt_conversi_logo_type' ) );
	$nt_conversi_img_whitelogo 	= ( ot_get_option( 'nt_conversi_whitelogoimg' ) );
	$nt_conversi_img_darklogo 	= ( ot_get_option( 'nt_conversi_darklogoimg' ) );
	$nt_conversi_text_logo 		= ( ot_get_option( 'nt_conversi_textlogo' ) );

?>
<nav id="navigation_affix" class="scrollspy">
	<div class="container">
		<div class="navbar-brand">
			<?php if ( ( $nt_conversi_logo_option ) == 'text' || ( $nt_conversi_logo_option ) == '') : ?>
				<?php if ( $nt_conversi_text_logo ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo"><?php echo esc_html( $nt_conversi_text_logo ); ?></a> <!-- Your Logo -->
				<?php  else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo"><?php esc_html_e( 'CONVERSI', 'nt-conversi' ); ?></a> <!-- Your Logo -->
				<?php endif; ?>
			<?php endif; ?>
				
			<?php if (( $nt_conversi_logo_option ) == 'img' ) : ?>
				<?php if ( $nt_conversi_img_darklogo  ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="img-logo"><img class="responsive-img" src="<?php echo esc_url( $nt_conversi_img_darklogo ); ?>" alt="<?php esc_html_e( 'Logo', 'nt-conversi' ); ?>"></a> <!-- Your Logo -->
					<?php  else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-logo"><?php esc_html_e( 'CONVERSI', 'nt-conversi' ); ?></a> <!-- Your Logo -->
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php
			wp_nav_menu( array(
				'menu'              => 'primary',
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => '',
				'container_class'   => '',
				'menu_class'        => 'nav navbar-nav primary-menu',
				'menu_id'		    => 'primary-menu',
				'echo' 				=> true,
				'fallback_cb'       => 'Nt_Conversi_Wp_Bootstrap_Navwalker::fallback',
				'walker'            => new Nt_Conversi_Wp_Bootstrap_Navwalker()
			));
		?>
	</div>
</nav>