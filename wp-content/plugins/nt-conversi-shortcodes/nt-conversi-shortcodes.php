<?php

/*
Plugin Name: NT Conversi Shortcodes
Plugin URI: http://themeforest.net/user/Ninetheme
Description: Shortcodes for Ninetheme WordPress Themes - nt-conversi Version
Version: 1.1.4
Author: Ninetheme
Author URI: http://themeforest.net/user/Ninetheme
*/

/*************************************************
## Word Limiter
*************************************************/
function nt_conversi_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

if ( ! function_exists( 'conversi_sanitize_data' ) ) {
    function conversi_sanitize_data( $conversidata ) {

            $conversidata = wp_kses( $conversidata, array(
                    'a'         => array(
                        'href'  => array(),
                        'title' => array()
                    ),
                    'br'        => array(),
                    'em'        => array(),
                    'strong'    => array(),
            ) );

        return $conversidata;
    }
}

if ( ! function_exists( 'nt_conversi_static_menu' ) ) {
    function nt_conversi_static_menu() {

			/* metabox or primary menu options */
			$nt_conversi_menu_item_name = 	rwmb_meta( 'nt_conversi_section_name' );
			$nt_conversi_menu_item_url 	= 	rwmb_meta( 'nt_conversi_section_url' );
			$nt_conversi_menutype 		= 	rwmb_meta( 'nt_conversi_menutype' );

			/* logo options */
			$nt_conversi_logo_option 	= ( ot_get_option( 'nt_conversi_logo_type' ) );
			$nt_conversi_img_whitelogo 	= ( ot_get_option( 'nt_conversi_whitelogoimg' ) );
			$nt_conversi_text_logo 		= ( ot_get_option( 'nt_conversi_textlogo' ) );
			$nt_conversi_btn_display 	= ( ot_get_option( 'nt_conversi_menubtn_display' ) );
			$nt_conversi_menubtn 		= ( ot_get_option( 'nt_conversi_menubtn' ) );
			$nt_conversi_menubtnurl 	= ( ot_get_option( 'nt_conversi_menubtnurl' ) );
			$nt_conversi_menubtntarget 	= ( ot_get_option( 'nt_conversi_menubtntarget' ) );

			$nt_conversi_header_social_display 	= ot_get_option( 'nt_conversi_header_social_display' );
			$nt_conversi_header_contact_display 	= ot_get_option( 'nt_conversi_header_contact_display' );
			if(  $nt_conversi_header_contact_display  != 'off' || $nt_conversi_header_social_display  != 'off' ){
				$out .= '<div class="top-header hidden-xs">';
					$out .= '<div class="container">';

						$nt_conversi_header_contact 			= ot_get_option( 'nt_conversi_header_contact', array() );
						$nt_conversi_header_contact_target 		= ot_get_option( 'nt_conversi_header_contact_target' );
						$nt_conversi_header_contact_target = ( $nt_conversi_header_contact_target != '' ) ? 'target="'. esc_attr( $nt_conversi_header_contact_target ) .'"' : '';

						//header contact media
						if(  $nt_conversi_header_contact_display  != 'off' ){
							if ( ! empty( $nt_conversi_header_contact ) ) {
							$out .= '<div class="contact-list">';
								$out .= '<ul>';
									foreach( $nt_conversi_header_contact as $con ) {
										$out .= '<li class="header-contact">';

										$contacticon = ( !empty( $con['nt_conversi_header_contact_icon'] ) ) ? '<i class="'.esc_attr( $con['nt_conversi_header_contact_icon'] ).'"></i>' : '';
										if( !empty( $con['nt_conversi_header_contact_link'] ) ){
											$out .= '<a href="'.esc_url( $con['nt_conversi_header_contact_link'] ).'"'.$nt_conversi_header_contact_target.'>'.$contacticon.'  '.esc_attr( $con['nt_conversi_header_contact_text'] ).'</a>';
										}else{
											$out .= ''.$contacticon.'  '.esc_attr( $con['nt_conversi_header_contact_text'] ).'';
										}
										$out .= '</li>';
									}
								$out .= '</ul>';
							$out .= '</div>';
							}
						}

						//header social media
						$nt_conversi_header_social 			= ot_get_option( 'nt_conversi_header_social', array() );
						$nt_conversi_header_social_target 	= ot_get_option( 'nt_conversi_header_social_target' );
						$nt_conversi_header_social_target = ( $nt_conversi_header_social_target != '' ) ? 'target="'. esc_attr( $nt_conversi_header_social_target ) .'"' : '';

						if(  $nt_conversi_header_social_display  != 'off' ){
							if ( ! empty( $nt_conversi_header_social ) ) {
							$out .= '<div class="social-list">';
								$out .= '<ul>';
									foreach( $nt_conversi_header_social as $soc ) {
										$out .= '<li class="social-media"><a class="link-'.esc_attr( $soc['nt_conversi_header_social_name'] ).'"href="'.esc_url( $soc['nt_conversi_header_social_link'] ).'"'.$nt_conversi_header_social_target.'><i class="'.esc_attr( $soc['nt_conversi_header_social_text'] ).'"></i></a></li>';
									}
								$out .= '</ul>';
							$out .= '</div>';
							}
						}

					$out .= '</div>';
				$out .= '</div>';
			}

			$nt_conversi_logo_target 	= ot_get_option( 'nt_conversi_logo_target' );
			$nt_conversi_logo_target 	= ( $nt_conversi_logo_target != '' ) ? 'target="'. esc_attr( $nt_conversi_logo_target ) .'"' : '';
			$nt_conversi_logo_link 		= ot_get_option( 'nt_conversi_logo_link' );
			$nt_conversi_logo_customlink= ( $nt_conversi_logo_link != '' ) ? esc_url( $nt_conversi_logo_link ) : esc_url( home_url( '/' ) );

			$out .= '<nav id="navigation" class="navbar scrollspy">';
				$out .= '<div class="container">';
					$out .= '<div class="navbar-brand">';
						if ( $nt_conversi_logo_option == 'text' || $nt_conversi_logo_option == '' ) :
							if ( $nt_conversi_text_logo ) :
							$out .= '<a href="'.$nt_conversi_logo_customlink.'" class="text-logo" '.$nt_conversi_logo_target .'>'.esc_html( $nt_conversi_text_logo ).'</a>';
							else :
								$out .= '<a href="'.$nt_conversi_logo_customlink.'" class="text-logo" '.$nt_conversi_logo_target .'>'.esc_html__( 'CONVERSI', 'nt-conversi' ).'</a>';
							endif;
						endif;

						if ( $nt_conversi_logo_option == 'img' ) :
							if ( $nt_conversi_img_whitelogo  ) :
								$out .= '<a href="'.$nt_conversi_logo_customlink.'" class="img-logo" '.$nt_conversi_logo_target .'><img class="responsive-img" src="'.esc_url( $nt_conversi_img_whitelogo ).'" alt="'.esc_html__( 'Logo', 'nt-conversi' ).'"></a>';
								else :
								$out .= '<a href="'.$nt_conversi_logo_customlink.'" class="text-logo" '.$nt_conversi_logo_target .'>'.esc_html__( 'CONVERSI', 'nt-conversi' ).'</a>';
							endif;
						endif;
					$out .= '</div>';

						if( $nt_conversi_menutype  =='m' &&  $nt_conversi_menu_item_name !='' ){
						   $out .= '<ul class="nav navbar-nav">';
							foreach (array_combine( $nt_conversi_menu_item_name, $nt_conversi_menu_item_url) as $title => $url ) {
								$out .= '<li><a class="smooth-scroll" href="'.esc_url($url).'">'.esc_html( $title ).'</a></li>';
							}
							if( $nt_conversi_btn_display != 'off' ){
								if( $nt_conversi_menubtn != '' ){
									$menubtntarget = $nt_conversi_menubtntarget ? ' target="'.esc_attr( $nt_conversi_menubtntarget ).'"' : '';
									$out .= '<li class="menu-btn"><a href="'.esc_url( $nt_conversi_menubtnurl ).'"'.$menubtntarget.'>'.esc_html( $nt_conversi_menubtn ).'</a></li>';
								}
							}

					$out .= '</ul>';
						}
						if(  $nt_conversi_menutype  =='p' ){
							wp_nav_menu( array(
								'menu'              => 'primary',
								'theme_location'    => 'primary',
								'items_wrap'      	=> '<ul data-offcanvass="yes" id="%1$s" class="%2$s">%3$s</ul>',
								'depth'             => 2,
								'container'         => '',
								'container_class'   => '',
								'menu_class'        => 'nav navbar-nav primary-menu',
								'menu_id'		    => 'primary-menu',
								'echo' 				=> true,
								'fallback_cb'       => 'Nt_Conversi_Wp_Bootstrap_Navwalker::fallback',
								'walker'            => new Nt_Conversi_Wp_Bootstrap_Navwalker()
							));
						}
				$out .= '</div>';
			$out .= '</nav>';
			return $out;
    }
}


/*-----------------------------------------------------------------------------------*/
/*	HERO 1 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero1( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_subtitle'=> '',
	'f_heading'	=> '',
	'f_desc'	=> '',
	'fb_desc'	=> '',
	'bg_img'	=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'h1loop'	=> '',
	'i_icon'	=> '',
	'i_title'	=> '',
	'i_desc'	=> ''

	), $atts) );

	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$h1_loop = (array) vc_param_group_parse_atts($h1loop);

	$out = '';
	if ( isset( $bg_img ) !='' ){
	wp_enqueue_script( 'parallax' );
		$bgimg = wp_get_attachment_url( $bg_img,'full' );
		$bgprallax = ' class="header1 hero-parallax" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="'.esc_url( $bgimg ).'"';
	}
	else{
	$sec_bgcolor = $secbgcolor ? $secbgcolor : '#ff7469';
	$bgprallax = ' class="header1" style="background-color:'.$sec_bgcolor.'"'; }

	if ( $o_display != 'hide' ){
		if ( $o_color != '' ){ $color = '" style="background-color:'.$o_color.'"';} else{ $color = '"'; }
		$overlay = ' class="header-overlay'.$color.'';
	}
	else{ $overlay = ' class="hide-overlay"'; }
    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header"'.$bgprallax.'>';
        $out .= '<div'.$overlay.'>';
		$menu = $m_display ? $m_display : 'show';
		if ( $menu != 'hide' ){
				$out .= ''.nt_conversi_static_menu().'';
		}
            $out .= '<div class="header-content">';
                $out .= '<div class="container">';
				$headingdisplay = $h_display ? $h_display : 'show';
				if ( $headingdisplay !='hide' ) {
                    $out .= '<div class="header-heading-title">';
                        if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
                        if ( $s_subtitle !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_subtitle ).'</h4>'; }
                    $out .= '</div>';
				}
                    $out .= '<div class="row">';
                        $out .= '<div class="col-sm-5 col-md-4">';
                            $out .= '<div class="header-form">';
                            	$out .= '<div class="header-form-heading background-color">';
                                    if ( $f_heading !='' ) { $out .= '<h4><i class="fa fa-pencil"></i> '.conversi_sanitize_data( $f_heading ).'</h4>'; }
                                    if ( $f_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $f_desc ).'</p>'; }
                                $out .= '</div>';
                                $out .= '<div class="header-form-body">';
                                	$out .= '<div class="submit-status"></div>';
										$out .= ''.do_shortcode( $content ).'';
                                    if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
                                $out .= '</div>';
                            $out .= '</div>';
                        $out .= '</div>';
                        $out .= '<div class="col-sm-7 col-md-8 col-lg-7 col-lg-offset-1">';
                        	$out .= '<ul class="header-txt-list">';
							foreach ( $h1_loop as $h1 ) {
                            	$out .= '<li>';
                                	if ( isset( $h1['i_icon'] ) !='' ){ $out .= '<i class="'.$h1['i_icon'].'"></i>'; }
                                    if ( isset( $h1['i_title'] ) !='' ){ $out .= '<h4>'.$h1['i_title'].'</h4>'; }
                                    if ( isset( $h1['i_desc'] ) !='' ){ $out .= '<p>'.$h1['i_desc'].'</p>'; }
                                $out .= '</li>';
							}
                            $out .= '</ul>';
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero1', 'theme_nt_conversi_section_hero1');

/*-----------------------------------------------------------------------------------*/
/*	HERO 2 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero2( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'v_url'		=> '',
	'bg_img'	=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'h2loop'	=> '',
	'i_icon'	=> '',
	'i_desc'	=> '',
	'fb_desc'	=> '',
	'bg_color'	=> ''

	), $atts) );

	if ( $v_url !='' ) {
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'fancybox-media' );
		wp_enqueue_script( 'nt-conversi-fancybox-set' );
	}
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$h2_loop = (array) vc_param_group_parse_atts($h2loop);

	if ( isset( $bg_img ) !='' ){
		wp_enqueue_script( 'parallax' );
		$bgimg = wp_get_attachment_url( $bg_img,'full' );
		$bgprallax = ' class="header2 hero-parallax" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="'.esc_url( $bgimg ).'"';
	}
	else{
	$sec_bgcolor = $secbgcolor ? $secbgcolor : '#ff7469';
	$bgprallax = ' class="header2" style="background-color:'.$sec_bgcolor.'"'; }

	if ( $o_display != 'hide' ){
		if ( $o_color != '' ){ $color = '" style="background-color:'.$o_color.'"';} else{ $color = '"'; }
		$overlay = ' class="header-overlay'.$color.'';
	}
	else{ $overlay = ' class="hide-overlay"'; }

	$out = '';

    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header"'.$bgprallax.'>';
        $out .= '<div'.$overlay.'>';
		$menu = $m_display ? $m_display : 'show';
		if ( $menu != 'hide' ){
			$out .= ''.nt_conversi_static_menu().'';
		}
            $out .= '<div class="header-content">';
                $out .= '<div class="container">';
                    $out .= '<div class="row">';
                        $out .= '<div class="col-sm-6 col-md-7 col-lg-6">';
                        	$out .= '<div class="header-txt">';
							$headingdisplay = $h_display ? $h_display : 'show';
							if ( $headingdisplay !='hide' ) {
								if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
								if ( $s_subtitle !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_desc ).'</h4>'; }
							}
							if ( $v_url !='' ) {
                                $out .= '<div class="header-txt-btn">';
                                	$out .= '<a href="'.esc_url( $v_url ).'" class="btn-play fancybox-media" title="Play Video"><i class="fa fa-play"></i></a>';
                                $out .= '</div>';
							}
                            $out .= '</div>';
                        $out .= '</div>';

                        $out .= '<div class="col-sm-6 col-md-5 col-lg-offset-1">';

							if ( $bg_color != '' ){ $bgcolor = ' style="background-color:'.esc_attr( $bg_color ).'"';}
							else{ $bgcolor = ''; }
                            $out .= '<div class="header-form"'.$bgcolor.'>';
                            	$out .= '<div class="submit-status"></div>';
                                $out .= '<ul class="header-form-heading">';
								foreach ( $h2_loop as $h2 ) {
                                    $out .= '<li>';
                                	if ( isset( $h2['i_icon'] ) !='' ){ $out .= '<i class="'.$h2['i_icon'].'"></i>'; }
                                    if ( isset( $h2['i_desc'] ) !='' ){ $out .= '<p>'.$h2['i_desc'].'</p>'; }
                                    $out .= '</li>';
								}
                                $out .= '</ul>';
                                $out .= ''.do_shortcode( $content ).'';
                                if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
                            $out .= '</div>';
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero2', 'theme_nt_conversi_section_hero2');

/*-----------------------------------------------------------------------------------*/
/*	HERO 3 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero3( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'vbg_img'	=> '',
	'v_url'		=> '',
	'bg_img'	=> '',
	'secbgcolor'=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'h3loop'	=> '',
	'i_icon'	=> '',
	'i_desc'	=> '',
	'fb_desc'	=> '',
	'bg_color'	=> ''

	), $atts) );

	if ( $v_url !='' ) {
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'fancybox-media' );
		wp_enqueue_script( 'nt-conversi-fancybox-set' );
	}
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$h3_loop = (array) vc_param_group_parse_atts($h3loop);

	if ( isset( $bg_img ) !='' ){
	wp_enqueue_script( 'parallax' );
		$bgimg = wp_get_attachment_url( $bg_img,'full' );
		$bgprallax = ' class="header3 hero-parallax" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="'.esc_url( $bgimg ).'"';
	}
	else{
	$sec_bgcolor = $secbgcolor ? $secbgcolor : '#ff7469';
	$bgprallax = ' class="header3" style="background-color:'.$sec_bgcolor.'"'; }

	if ( $o_display != 'hide' ){
		if ( $o_color != '' ){ $color = '" style="background-color:'.$o_color.'"';} else{ $color = '"'; }
		$overlay = ' class="header-overlay'.$color.'';
	}
	else{ $overlay = ' class="hide-overlay"'; }

	$out = '';

    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header"'.$bgprallax.'>';
        $out .= '<div'.$overlay.'>';
		$menu = $m_display ? $m_display : 'show';
		if ( $menu != 'hide' ){
			$out .= ''.nt_conversi_static_menu().'';
		}
            $out .= '<div class="header-content">';
                $out .= '<div class="container">';
					$out .= '<div class="header-heading-title">';
						$headingdisplay = $h_display ? $h_display : 'show';
						if ( $headingdisplay !='hide' ) {
							if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
							if ( $s_desc !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_desc ).'</h4>'; }
						}
					$out .= '</div>';
                    $out .= '<div class="row header-row">';
                        $out .= '<div class="col-sm-7 col-md-8 header-video">';
							if ( isset( $vbg_img ) !='' ){
							wp_enqueue_script( 'parallax' );
								$vbgimg = wp_get_attachment_url( $vbg_img,'full' );
								$vbgimage = ' style="background-image:url('.esc_url( $vbgimg ).'"';
							}
							else { $vbgimage = ''; }
                        	$out .= '<div class="header-video-bg"'.$vbgimage .'>';
							if ( $v_url !='' ) {
                                $out .= '<div class="header-video-btn">';
                                	$out .= '<a href="'.esc_url( $v_url ).'" class="btn-play fancybox-media" title="Play Video"><i class="fa fa-play"></i></a>';
                                $out .= '</div>';
							}
                            $out .= '</div>';
                        $out .= '</div>';

                        $out .= '<div class="col-sm-5 col-md-4 col-sm-offset-7 col-md-offset-8">';
							if ( $bg_color != '' ){ $bgcolor = ' style="background-color:'.esc_attr( $bg_color ).'"';}
							else{ $bgcolor = ''; }
                            $out .= '<div class="header-form"'.$bgcolor.'>';
                            	$out .= '<div class="submit-status"></div>';
                                $out .= '<ul class="header-form-heading">';
								foreach ( $h3_loop as $h3 ) {
                                    $out .= '<li>';
                                	if ( isset( $h3['i_icon'] ) !='' ){ $out .= '<i class="'.$h3['i_icon'].'"></i>'; }
                                    if ( isset( $h3['i_desc'] ) !='' ){ $out .= '<p>'.$h3['i_desc'].'</p>'; }
                                    $out .= '</li>';
								}
                                $out .= '</ul>';
                                $out .= ''.do_shortcode( $content ).'';
                                if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
                            $out .= '</div>';
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero3', 'theme_nt_conversi_section_hero3');

/*-----------------------------------------------------------------------------------*/
/*	HERO 4 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero4( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'v_url'		=> '',
	'bg_img'	=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'f_heading'	=> '',
	'fb_desc'	=> ''

	), $atts) );

	if ( $v_url !='' ) {
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'fancybox-media' );
		wp_enqueue_script( 'nt-conversi-fancybox-set' );
	}
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';

	if ( isset( $bg_img ) !='' ){
	wp_enqueue_script( 'parallax' );
		$bgimg = wp_get_attachment_url( $bg_img,'full' );
		$bgprallax = ' class="header4 hero-parallax" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="'.esc_url( $bgimg ).'"';
	}
	else{
	$sec_bgcolor = $secbgcolor ? $secbgcolor : '#ff7469';
	$bgprallax = ' class="header4" style="background-color:'.$sec_bgcolor.'"'; }

	if ( $o_display != 'hide' ){
		if ( $o_color != '' ){ $color = '" style="background-color:'.$o_color.'"';} else{ $color = '"'; }
		$overlay = ' class="header-overlay'.$color.'';
	}
	else{ $overlay = ' class="hide-overlay"'; }

	$out = '';

    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header"'.$bgprallax.'>';
        $out .= '<div'.$overlay.'>';
			$menu = $m_display ? $m_display : 'show';
			if ( $menu != 'hide' ){
				$out .= ''.nt_conversi_static_menu().'';
			}

			$out .= '<div class="header-content">';
				$out .= '<div class="container">';
					$out .= '<div class="header-heading-title">';
						$headingdisplay = $h_display ? $h_display : 'show';
						if ( $headingdisplay !='hide' ) {
							if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
							if ( $s_desc !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_desc ).'</h4>'; }
						}
					$out .= '</div>';

					if ( $v_url !='' ) {
						$out .= '<div class="header-video-btn">';
							$out .= '<a href="'.esc_url( $v_url ).'" class="btn-play fancybox-media" title="Play Video"><i class="fa fa-play"></i></a>';
						$out .= '</div>';
					}

					$out .= '<div class="header-form">';
						if ( $f_heading !='' ) { $out .= '<h4 class="header-form-heading">'.conversi_sanitize_data( $f_heading ).'</h4>'; }
						$out .= ''.do_shortcode( $content ).'';
						if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero4', 'theme_nt_conversi_section_hero4');


/*-----------------------------------------------------------------------------------*/
/*	HERO 5 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero5( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_subtitle'=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'btnlink1'	=> '',
	'btnlink2'	=> '',
	'f_heading'	=> '',
	'f_desc'	=> '',
	'fb_desc'	=> '',
	'bg_color'	=> '',
	'bgcss'		=> ''

	), $atts) );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';

	$btnlink1 		= ( $btnlink1 == '||' ) ? '' : $btnlink1;
	$btnlink1 		= vc_build_link( $btnlink1 );
	$btn_href1 		= $btnlink1['url'];
	$btn_title1 	= $btnlink1['title'];
	$btn_target1	= $btnlink1['target'];

	$btnlink2 		= ( $btnlink2 == '||' ) ? '' : $btnlink2;
	$btnlink2 		= vc_build_link( $btnlink2 );
	$btn_href2 		= $btnlink2['url'];
	$btn_title2 	= $btnlink2['title'];
	$btn_target2	= $btnlink2['target'];

	$out = '';

    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header" class="header5'.esc_attr( $bg_css ).'">';

		$menu = $m_display ? $m_display : 'show';
		if ( $menu != 'hide' ){
			$out .= ''.nt_conversi_static_menu().'';
		}

        $out .= '<div class="header-content">';
            $out .= '<div class="container">';
                $out .= '<div class="row">';
                    $out .= '<div class="col-sm-6 col-md-7 col-lg-6">';
                    	$out .= '<div class="header-txt">';
						$headingdisplay = $h_display ? $h_display : 'show';
						if ( $headingdisplay !='hide' ) {
                        	$out .= '<div class="header-txt-heading">';
							if ( $s_subtitle !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_subtitle ).'</h4>'; }
							if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
                            $out .= '</div>';
                            if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }
						}
                            $out .= '<div class="header-txt-btn">';
								if ( $btn_title1 !='' ) {
									$out .= '<a href="'.esc_attr( $btn_href1 ).'" '; if ( $btn_target1 != '' ) { $out .= ' target="'.$btn_target1.'"';}$out .= 'class="btn-custom smooth-scroll">'.esc_html( $btn_title1 ).'</a>';
								}
								if ( $btn_title2 !='' ) {
									$out .= '<a href="'.esc_attr( $btn_href2 ).'" '; if ( $btn_target2 != '' ) { $out .= ' target="'.$btn_target2.'"';}$out .= 'class="btn-link">'.esc_html( $btn_title2 ).'</a>';
								}
                            $out .= '</div>';
                        $out .= '</div>';
                    $out .= '</div>';

                    $out .= '<div class="col-sm-6 col-md-5 col-lg-offset-1">';
						if ( $bg_color != '' ){ $bgcolor = ' style="background-color:'.esc_attr( $bg_color ).'"';}
						else{ $bgcolor = ''; }
						$out .= '<div class="header-form"'.$bgcolor.'>';
                            $out .= '<div class="header-form-heading">';
                                if ( $f_heading !='' ) { $out .= '<h4><i class="fa fa-pencil"></i> '.conversi_sanitize_data( $f_heading ).'</h4>'; }
                                if ( $f_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $f_desc ).'</p>'; }
                            $out .= '</div>';
                            $out .= '<div class="header-form-body">';
                            	$out .= '<div class="submit-status"></div>';
								$out .= ''.do_shortcode( $content ).'';
								if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
                            $out .= '</div>';
						$out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
        $out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero5', 'theme_nt_conversi_section_hero5');

/*-----------------------------------------------------------------------------------*/
/*	HERO 6 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_hero6( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'm_display'	=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'vbg_img'	=> '',
	'v_url'		=> '',
	'bg_img'	=> '',
	'secbgcolor'=> '',
	'f_heading'	=> '',
	'f_desc'	=> '',
	'fb_desc'	=> '',
	'bg_color'	=> ''

	), $atts) );

	if ( $v_url !='' ) {
		wp_enqueue_script( 'fancybox' );
		wp_enqueue_script( 'fancybox-media' );
		wp_enqueue_script( 'nt-conversi-fancybox-set' );
	}
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';

	$sec_bgcolor = $secbgcolor ? $secbgcolor : 'rgb(255, 116, 105)';
	if ( isset( $bg_img ) !='' ){
		$bgimg = wp_get_attachment_url( $bg_img,'full' );
		$bgprallax = ' class="header6" style="background: '.$sec_bgcolor.' url('.esc_url( $bgimg ).') no-repeat top left;"';
	}
	else{
		$bgprallax = ' class="header6" style="background-color:'.$sec_bgcolor.'"';
	}

	$out = '';

    $out .= '<div '.$id.'></div>';
    $out .= '<header id="header"'.$bgprallax.'>';

		$menu = $m_display ? $m_display : 'show';
		if ( $menu != 'hide' ){
			$out .= ''.nt_conversi_static_menu().'';
		}
		$out .= '<div class="header-content">';
			$out .= '<div class="container">';
				$out .= '<div class="header-heading-title">';
					$headingdisplay = $h_display ? $h_display : 'show';
					if ( $headingdisplay !='hide' ) {
						if ( $s_heading !='' ) { $out .= '<h1>'.conversi_sanitize_data( $s_heading ).'</h1>'; }
						if ( $s_desc !='' ) { $out .= '<h4>'.conversi_sanitize_data( $s_desc ).'</h4>'; }
					}
				$out .= '</div>';
				$out .= '<div class="row header-row">';
					$out .= '<div class="col-sm-7 col-md-8 header-video">';
						if ( isset( $vbg_img ) !='' ){
						wp_enqueue_script( 'parallax' );
							$vbgimg = wp_get_attachment_url( $vbg_img,'full' );
							$vbgimage = ' style="background-image:url('.esc_url( $vbgimg ).'"';
						}
						else { $vbgimage = ''; }
						$out .= '<div class="header-video-bg"'.$vbgimage .'>';
						if ( $v_url !='' ) {
							$out .= '<div class="header-video-btn">';
								$out .= '<a href="'.esc_url( $v_url ).'" class="btn-play fancybox-media" title="Play Video"><i class="fa fa-play"></i></a>';
							$out .= '</div>';
						}
						$out .= '</div>';
					$out .= '</div>';

					$out .= '<div class="col-sm-5 col-md-4 col-sm-offset-7 col-md-offset-8">';
						if ( $bg_color != '' ){ $bgcolor = ' style="background-color:'.esc_attr( $bg_color ).'"';}
						else{ $bgcolor = ''; }
						$out .= '<div class="header-form"'.$bgcolor.'>';
							$out .= '<div class="submit-status"></div>';
							$out .= '<div class="header-form-heading">';
								if ( $f_heading !='' ) { $out .= '<h4><i class="fa fa-pencil"></i> '.conversi_sanitize_data( $f_heading ).'</h4>'; }
								if ( $f_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $f_desc ).'</p>'; }
							$out .= '</div>';
							$out .= ''.do_shortcode( $content ).'';
							if ( $fb_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $fb_desc ).'</p>'; }
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
    $out .= '</header>';

	return $out;
}
add_shortcode('nt_conversi_section_hero6', 'theme_nt_conversi_section_hero6');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES 1 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_features1( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'i_col'		=> '',
	'lg_col'	=> '',
	'md_col'	=> '',
	'sm_col'	=> '',
	'xs_col'	=> '',
	'f1loop'	=> '',
	'i_img'		=> '',
	'i_title'	=> '',
	'i_desc'	=> '',
	'bgcss'		=> ''

	), $atts) );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$f1_loop = (array) vc_param_group_parse_atts($f1loop);

	$out = '';

		$out .= '<div '.$id.' class="features-1 padding-top80'.esc_attr( $bg_css ).'">';
			$out .= '<div class="container">';
			$headingdisplay = $h_display ? $h_display : 'show';
			if ( $headingdisplay !='hide' ) {
				$out .= '<div class="post-heading-center">';
					if ( $s_heading !='' ) { $out .= '<h2>'.conversi_sanitize_data( $s_heading ).'</h2>'; }
					if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }
				$out .= '</div>';
			}
				$out .= '<div class="row padding-bottom20">';

				if ( $i_col != 'custom' ) {
					$itemcolumntotal = $i_col ? $i_col : 'col-sm-4';
				}
				if ( $i_col == 'custom' ) {
					$lgcol = $lg_col ? $lg_col : '';
					$mdcol 	= $md_col ? $md_col : '';
					$smcol = $sm_col? $sm_col : 'col-sm-4';
					$xscol = $xs_col ? $xs_col : '';
					$itemcol =  ''.esc_attr( $lgcol ).' '.esc_attr( $mdcol ).' '.esc_attr( $smcol ).' '.esc_attr( $xscol ).'';
					$itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcol);
				}
				foreach ( $f1_loop as $f1 ) {
					$out .= '<div class="'.$itemcolumntotal.'">';
						$out .= '<div class="affa-feature-img">';
						if ( isset( $f1['i_img'] ) !='' ){
							$itemimg = wp_get_attachment_url( $f1['i_img'], 'full' );
                            $out .= '<img src="'.esc_url( $itemimg ).'" alt="Image">';
						}
						if ( isset( $f1['i_title'] ) !='' ){ $out .= '<h4>'.$f1['i_title'].'</h4>'; }
						if ( isset( $f1['i_desc'] ) !='' ){ $out .= '<p>'.$f1['i_desc'].'</p>'; }
						$out .= '</div>';
					$out .= '</div>';
				}
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_features1', 'theme_nt_conversi_section_features1');


/*-----------------------------------------------------------------------------------*/
/*	FEATURES 2 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_features2( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'l_img'		=> '',
	'h_display'	=> '',
	's_subtitle'=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'f2loop'	=> '',
	'i_desc'	=> '',
	'bgcss'		=> ''

	), $atts) );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$f2_loop = (array) vc_param_group_parse_atts($f2loop);

	$out = '';

    $out .= '<div '.$id.' class="features-2'.esc_attr( $bg_css ).'">';
        $out .= '<div class="container">';
            $out .= '<div class="row padding-bottom20">';

                $out .= '<div class="col-sm-6 col-md-5 margin-bottom40">';
				if ( $l_img !='' ) {
					$image = wp_get_attachment_url( $l_img, 'full' );
					$out .= '<figure><img src="'.esc_url( $image ).'" alt="Image"></figure>';
				}
                $out .= '</div>';

                $out .= '<div class="col-sm-6 col-md-7 col-lg-6 col-lg-offset-1 margin-bottom20">';
                	$out .= '<div class="col-txt100">';

                        $out .= '<div class="post-heading-left post-heading-top-desc margin-bottom20">';
                            if ( $s_subtitle !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_subtitle ).'</p>'; }
                            if ( $s_heading !='' ) { $out .= '<h2>'.conversi_sanitize_data( $s_heading ).'</h2>'; }
                        $out .= '</div>';

                        if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }

                        $out .= '<div class="list-icon">';
                            $out .= '<ul>';
							foreach ( $f2_loop as $f2 ) {
                                if ( isset( $f2['i_desc'] ) !='' ){ $out .= '<li><i class="fa fa-check-square-o"></i> '.$f2['i_desc'].'</li>'; }
							}
                           $out .= '</ul>';
                        $out .= '</div>';

                    $out .= '</div>';
                $out .= '</div>';

            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_features2', 'theme_nt_conversi_section_features2');


/*-----------------------------------------------------------------------------------*/
/*	FEATURES 3 conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_features3( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_subtitle'=> '',
	's_desc'	=> '',
	'f3loop'	=> '',
	'i_title'	=> '',
	'i_desc'	=> '',
	'r_img'		=> '',
	'bgcss'		=> ''

	), $atts) );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$f3_loop = (array) vc_param_group_parse_atts($f3loop);

	$out = '';

    $out .= '<div class="features-3'.esc_attr( $bg_css ).'" '. $id .'>';
        $out .= '<div class="container">';
            $out .= '<div class="row">';

                $out .= '<div class="col-md-6 margin-bottom20">';
                	$out .= '<div class="col-txt120">';

                        $out .= '<div class="post-heading-left text-center-sm">';
                        	if ( $s_heading !='' ) { $out .= '<h2>'.conversi_sanitize_data( $s_heading ).'</h2>'; }
                            if ( $s_subtitle !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_subtitle ).'</p>'; }
                        $out .= '</div>';

                        if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }

                        $out .= '<div class="row">';
						foreach ( $f3_loop as $f3 ) {
                        	$out .= '<div class="col-sm-6">';
                            	$out .= '<div class="affa-col-txt">';
                                    if ( isset( $f3['i_title'] ) !='' ){ $out .= '<h4>'.$f3['i_title'].'</h4>'; }
                                    if ( isset( $f3['i_desc'] ) !='' ){ $out .= '<p>'.$f3['i_desc'].'</p>'; }
                                $out .= '</div>';
                            $out .= '</div>';
						}
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';

                $out .= '<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-0">';
				if ( $r_img !='' ) {
					$image = wp_get_attachment_url( $r_img, 'full' );
					$out .= '<figure><img src="'.esc_url( $image ).'" alt="Image"></figure>';
				}
                $out .= '</div>';

            $out .= '</div>';
        $out .= '</div>';
    $out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_features3', 'theme_nt_conversi_section_features3');

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_testimonial( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	't_loop'	=> '',
	't_img'		=> '',
	't_quote'	=> '',
	't_name'	=> '',
	't_job'		=> '',
	'bgcss'		=> ''

	), $atts) );
	wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'nt-conversi-slick-set' );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$tloop = (array) vc_param_group_parse_atts($t_loop);

	$out = '';

    $out .= '<div '.$id.' class="bg-grey wrap-container80'.esc_attr( $bg_css ).'">';
        $out .= '<div class="container">';
            $out .= '<i class="fa fa-quote-left affa-testimonial-icon"></i>';
		$out .= '</div>';

        $out .= '<div class="carousel-slider affa-testimonials-carousel">';
		foreach ( $tloop as $t ) {
            $out .= '<div class="slick-slide">';
                $out .= '<div class="container">';
                	$out .= '<div class="affa-testimonial">';
                        $out .= '<div class="testimonial-txt">';
                            if ( isset( $t['t_quote'] ) !='' ){ $out .= '<p>'.$t['t_quote'].'</p>'; }
                        $out .= '</div>';
                        $out .= '<div class="testimonial-name">';
						if ( isset( $t['t_img'] ) !='' ){
							$testiimg = wp_get_attachment_url( $t['t_img'],'full' );
                            $out .= '<img src="'.esc_url( $testiimg ).'" alt="Avatar">';
						}
                            if ( isset( $t['t_name'] ) !='' ){ $out .= '<h4>'.$t['t_name'].'</h4>'; }
                            if ( isset( $t['t_job'] ) !='' ){ $out .= '<p>'.$t['t_job'].'</p>'; }
                        $out .= '</div>';
                    $out .= '</div>';
                $out .= '</div>';
            $out .= '</div>';
		}
        $out .= '</div>';
    $out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_testimonial', 'theme_nt_conversi_section_testimonial');

/*-----------------------------------------------------------------------------------*/
/*	COUNTERUP conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_counter( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'i_col'		=> '',
	'lg_col'	=> '',
	'md_col'	=> '',
	'sm_col'	=> '',
	'xs_col'	=> '',
	'c_loop'	=> '',
	'i_icon'	=> '',
	'i_title'	=> '',
	'i_number'	=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'bgcss'		=> ''

	), $atts) );
	wp_enqueue_script( 'jquery-counterup' );
	wp_enqueue_script( 'nt-conversi-counter-settigs' );
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';
	$cloop = (array) vc_param_group_parse_atts($c_loop);

	if ( $o_display != 'hide' ){
		if ( $o_color != '' ){ $color = '" style="background-color:'.$o_color.'"';} else{ $color = '"'; }
		$overlay = ' class="bg-overlay wrap-container8040'.$color.'';
	}
	else{ $overlay = ' class="hide-overlay wrap-container8040"'; }

	$out = '';

		$out .= '<!-- #counter -->';
		$out .= '<div '.$id.' class="bg-img'.esc_attr( $bg_css ).'">';
			$out .= '<!-- .bg-overlay -->';
			$out .= '<div'.$overlay.'>';
				$out .= '<!-- .container -->';
				$out .= '<div class="container">';
					$out .= '<!-- .row -->';
					$out .= '<div class="row">';
					if ( $i_col !='custom' ) {
						$itemcolumntotal = $i_col ? $i_col : 'col-sm-3';
					}
					if ( $i_col =='custom' ) {
						$lgcol = $lg_col ? $lg_col : '';
						$mdcol 	= $md_col ? $md_col : '';
						$smcol = $sm_col? $sm_col : 'col-sm-3';
						$xscol = $xs_col ? $xs_col : '';
						$itemcol =  ''.esc_attr( $lgcol ).' '.esc_attr( $mdcol ).' '.esc_attr( $smcol ).' '.esc_attr( $xscol ).'';
						$itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcol);
					}
					foreach ( $cloop as $c ) {
						$out .= '<div class="'.$itemcolumntotal.'">';
							$out .= '<div class="affa-counter-txt">';
								if ( isset( $c['i_icon'] ) !='' ){ $out .= '<i class="'.$c['i_icon'].'"></i>'; }
								if ( isset( $c['i_number'] ) !='' ){ $out .= '<h4>'.$c['i_number'].'</h4>'; }
								if ( isset( $c['i_title'] ) !='' ){ $out .= '<p>'.$c['i_title'].'</p>'; }
							$out .= '</div>';
						$out .= '</div>';
					}
					$out .= '</div><!-- .row end -->';
				$out .= '</div><!-- .container end -->';
			$out .= '</div><!-- .bg-overlay end -->';
			if ( $bg_img !='' ) {
				if ( $bg_img !='' ) { $bgimage = wp_get_attachment_url( $bg_img,'full' ); $bgimg = ' in" style="background-image:url('.esc_url( $logoimg ).');"'; }
				else { $bgimg = '"'; }
				$out .= '<div class="bg-img-base'.$bgimg.'></div> <!-- background image -->';
			}
		$out .= '</div>';
		$out .= '<!-- #counter end -->';

	return $out;
}
add_shortcode('nt_conversi_section_counter', 'theme_nt_conversi_section_counter');

/*-----------------------------------------------------------------------------------*/
/*	PRICE TABLE
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_pricing($atts){
	extract(shortcode_atts(array(
	's_id'		=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'btnlink'	=> '',
	'bgcss'	=> '',
	'orderby'	=> 'date',
	'order'		=> 'DESC',
	'p_number'	=> '4',
	'p_cat'		=> 'all'

	), $atts));

	global $post;
	$args = array( 'post_type' => 'price',
		'posts_per_page' => $p_number,
		'order' 		 => $order,
		'orderby' 		 => $orderby,
		'post_status' 	 => 'publish'
	);
	if($p_cat != 'all'){
		$str = $p_cat;
		$arr = explode(',', $str);
		$args['tax_query'][] = array( 'taxonomy' => 'price_category', 'field' => 'slug', 'terms' => $arr );
	}
	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );
	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : '';

	$btnlink 	= ( $btnlink == '||' ) ? '' : $btnlink;
	$btnlink 	= vc_build_link( $btnlink );
	$btn_href 	= $btnlink['url'];
	$btn_title 	= $btnlink['title'];
	$btn_target	= $btnlink['target'];

    $out = '';

		$out .= '<div '.$id.' class="wrap-container8040'.esc_attr( $bg_css ).'">';
			$out .= '<div class="container">';
			$headingdisplay = $h_display ? $h_display : 'show';
			if ( $headingdisplay !='hide' ) {
				$out .= '<div class="post-heading-center">';
					if ( $s_heading !='' ) { $out .= '<h2>'.conversi_sanitize_data( $s_heading ).'</h2>'; }
					if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }
				$out .= '</div>';
			}
				$out .= '<div class="affa-tbl-prc tbl-prc-recommended">';
					$out .= '<div class="row">';
				$nt_conversi_price_query = new WP_Query($args);
				if( $nt_conversi_price_query->have_posts() ) :
					while ($nt_conversi_price_query->have_posts()) : $nt_conversi_price_query->the_post();

						$featured	= get_post_meta( get_the_ID(), 'nt_conversi_featured', true );
						$f_title	= get_post_meta( get_the_ID(), 'nt_conversi_f_title', true );
						$price		= get_post_meta( get_the_ID(), 'nt_conversi_price', true );
						$currency	= get_post_meta( get_the_ID(), 'nt_conversi_currency', true );
						$period		= get_post_meta( get_the_ID(), 'nt_conversi_period', true );
						$features	= get_post_meta( get_the_ID(), 'nt_conversi_features_list', true );

						$lg_col	= get_post_meta( get_the_ID(), 'nt_conversi_lg_col', true );
						$md_col	= get_post_meta( get_the_ID(), 'nt_conversi_md_col', true );
						$md_off	= get_post_meta( get_the_ID(), 'nt_conversi_md_off', true );
						$sm_col	= get_post_meta( get_the_ID(), 'nt_conversi_sm_col', true );
						$xs_col	= get_post_meta( get_the_ID(), 'nt_conversi_xs_col', true );

						$lgcol = $lg_col ? $lg_col : '';
						$mdcol = $md_col ? $md_col : '';
						$mdoff = $md_off ? $md_off : '';
						$smcol = $sm_col ? $sm_col : 'col-sm-4';
						$xscol = $xs_col ? $xs_col : '';

						if ( $featured == 'featured' ) { $feature = ' tbl-prc-col-recommended';} else{ $feature = ''; }
						$itemcol =  ''.esc_attr( $lgcol ).' '.esc_attr( $mdcol ).' '.esc_attr( $mdoff ).' '.esc_attr( $smcol ).' '.esc_attr( $xscol ).'';
						$itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcol);
						$out .= '<div class="'.$itemcolumntotal.'">';
							$out .= '<div class="tbl-prc-col'.$feature.'">';
							if ( $featured == 'featured' ) { $out .= '<div class="tbl-prc-badge">'.esc_html( $f_title ).'</div>'; }
								$out .= '<div class="tbl-prc-heading">';
									if ( get_the_title() !='' ) { $out .= '<h4>'.get_the_title().'</h4>'; }
									$out .= '<div class="tbl-prc-price">';
										if ( $price !='' ) { $out .= '<h5><span>'.esc_html( $currency ).'</span>'.esc_html( $price ).'</h5>'; }
										if ( $period !='' ) { $out .= '<p>'.esc_html( $period ).'</p>'; }
									$out .= '</div>';
								$out .= '</div>';
								if ( !empty( $features ) ) {
									$out .= '<ul class="tbl-prc-list">';
									foreach ( $features as $list ) {
										$out .= '<li>'.esc_html( $list ).'</li>';
									}
									$out .= '</ul>';
								}
							if ( $btn_title !='' ) {
							$out .= '<div class="tbl-prc-footer">';
								$out .= '<a href="'.esc_attr( $btn_href ).'" '; if ( $btn_target != '' ) { $out .= ' target="'.$btn_target.'"';}$out .= 'class="btn-custom btn-small">'.esc_html( $btn_title ).'</a>';
							$out .= '</div>';
							}
							$out .= '</div>';
						$out .= '</div>';
					endwhile;
				endif;
				wp_reset_postdata();

					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_pricing', 'theme_nt_conversi_section_pricing');

/*-----------------------------------------------------------------------------------*/
/*	MAP conversi
/*-----------------------------------------------------------------------------------*/
function theme_nt_conversi_section_map( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'			=> '',
	'over_title'	=> '',
	'over_desc'		=> '',
	'o_color'		=> '',
	'lat'			=> '-12.0411925',
	'lng'			=> '-77.0282043',
	'marker_title'	=> 'Company Name'

	), $atts) );
	if ( $lat !='' && $lng !='' ) {

		$mapmarkerimg 	= wp_get_attachment_url( $marker_img, 'full' );
		$mapmarker_img 	= ''.$mapmarkerimg.'' ;

		wp_enqueue_script('gmaps');
      wp_enqueue_script('google-map-api');
		wp_enqueue_script('nt-conversi-map-set');
		wp_localize_script('nt-conversi-map-set', 'prefix' ,
		array(
			'lat' 				=> $lat,
			'lng' 				=> $lng,
			'markertitle' 		=> $marker_title
		));

		$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : 'id="map"';

		$out = '';

			$out .= '<div '. $id .' class="affa-map">';
				$out .= '<a href="#" class="btn-collapse"><i class="fa fa-map-marker"></i></a>';
			if ( $o_color !='' ) { $bg_overlay = ' style="background-color:'.esc_attr( $o_color ).';"'; } else { $bg_overlay = ''; }
			$out .= '<div class="map-overlay"'.$bg_overlay.'>';
					$out .= '<div class="container">';
						$out .= '<div class="map-heading">';
							if ( $over_title !='' ) { $out .= '<h2>'.esc_html( $over_title ).'</h2>'; }
							if ( $over_desc !='' ) { $out .= '<p>'.esc_html( $over_desc ).'</p>'; }
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
				$out .= '<div id="companyMap" class="map-frame"></div>';
			$out .= '</div>';

	}
	return $out;
}
add_shortcode('nt_conversi_section_map', 'theme_nt_conversi_section_map');


/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE conversi
/*-----------------------------------------------------------------------------------*/

function theme_nt_conversi_section_subscribe( $atts, $content = null ) {
    extract( shortcode_atts(array(
	's_id'		=> '',
	'h_display'	=> '',
	's_heading'	=> '',
	's_desc'	=> '',
	'o_display'	=> '',
	'o_color'	=> '',
	'bg_img'	=> '',
	'form_desc'	=> ''
	), $atts) );

	$id = ($s_id != '') ? 'id="'. esc_attr($s_id) . '"' : 'id="bottom"';

	$out = '';

		$out .= '<div  '. $id .' class="bg-img">';
		$overlaydisplay = $o_display ? $o_display : 'show';
		if ( $overlaydisplay !='hide' ) {
			if ( $o_color !='' ) { $bg_overlay = ' style="background-color:'.esc_attr( $o_color ).';"'; } else { $bg_overlay = ''; }
			$out .= '<div class="bg-overlay"'.$bg_overlay.'>';
		}
				$out .= '<div class="container">';
				$headingdisplay = $h_display ? $h_display : 'show';
				if ( $headingdisplay !='hide' ) {
					$out .= '<div class="post-heading-center">';
					if ( $s_heading !='' ) { $out .= '<h2>'.conversi_sanitize_data( $s_heading ).'</h2>'; }
					if ( $s_desc !='' ) { $out .= '<p>'.conversi_sanitize_data( $s_desc ).'</p>'; }
					$out .= '</div>';
				}
						$out .= ''.do_shortcode( $content ).'';

					if ( $form_desc !='' ) { $out .= '<p class="txt-desc">'.conversi_sanitize_data( $form_desc ).'</p>'; }

				$out .= '</div>';
			$out .= '</div>';
			if ( $bg_img !='' ) {
				if ( $bg_img !='' ) { $bgimage = wp_get_attachment_url( $bg_img,'full' ); $bgimg = ' in" style="background-image:url('.esc_url( $bgimage ).');"'; }
				else { $bgimg = '"'; }
				$out .= '<div class="bg-img-base'.$bgimg.'></div> <!-- background image -->';
			}
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_conversi_section_subscribe', 'theme_nt_conversi_section_subscribe');
