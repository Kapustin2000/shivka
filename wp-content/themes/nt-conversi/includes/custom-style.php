<?php 

function nt_conversi_custom_preloader_script() { ?>

<?php  if ( function_exists( 'ot_get_option' ) ) : ?>

	<?php //CUSTOM PRELOADER AND CUSTOM JAVASCRIPT  ?>
	<?php if ( ot_get_option( 'nt_conversi_custom_preloader_js' ) !='off' && ot_get_option( 'nt_conversi_preloaderjs' ) !='' ) : ?>

		<script id="nt-conversi-custom-preloader-and-custom-script" type="text/javascript">

		<?php if(ot_get_option('nt_conversi_preloaderjs')) { echo  ot_get_option( 'nt_conversi_preloaderjs' ) ; }  ?>

		</script>

	<?php endif; ?>

	<?php //CUSTOM PRELOADER AND DEFAULT JAVASCRIPT ?>
	<?php if ( ot_get_option( 'nt_conversi_custom_preloader_js' ) =='off' && ot_get_option( 'nt_conversi_custom_preloader' ) !='' ) : ?>

		<script id="nt-conversi-custom-preloader-and-default-script" type="text/javascript">

			jQuery(document).ready(function($) {
				"use strict";

				jQuery(window).load(function() {
					// Animate loader off screen
					jQuery(".nt-conversi-custom-preloader").fadeOut("slow");;
				});

			})(jQuery);

		</script>

	<?php endif;?>
<?php endif; ?>
<?php }

add_action('wp_footer', 'nt_conversi_custom_preloader_script');


function nt_conversi_css_options() {

    /* CSS to output */
    $theCSS = '';
	
	// admin bar
	if( is_admin_bar_showing() && ! is_customize_preview() ) {
		$theCSS .= '

		 #customize { top: 92px; }
		 #navigation_affix.show { top: 32px !important;}
		 @media (max-width: 992px){
			#navigation_affix.show { top: 32px !important;}
		}
		@media (max-width: 768px){
			#navigation_affix.show{ top: 46px!important;}
		}
		@media (max-width: 480px){
			#navigation_affix.show{ top: 46px!important;}
		}';

	}
	function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb; // returns an array with the rgb values
	}

	
	function colourBrightness($hex, $percent) {
		// Work out if hash given
		$hash = '';
		if (stristr($hex,'#')) {
			$hex = str_replace('#','',$hex);
			$hash = '#';
		}
		/// HEX TO RGB
		$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
		//// CALCULATE 
		for ($i=0; $i<3; $i++) {
			// See if brighter or darker
			if ($percent > 0) {
				// Lighter
				$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
			} else {
				// Darker
				$positivePercent = $percent - ($percent*2);
				$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
			}
			// In case rounding up causes us to go to 256
			if ($rgb[$i] > 255) {
				$rgb[$i] = 255;
			}
		}
		//// RBG to Hex
		$hex = '';
		for($i=0; $i < 3; $i++) {
			// Convert the decimal digit to hex
			$hexDigit = dechex($rgb[$i]);
			// Add a leading zero if necessary
			if(strlen($hexDigit) == 1) {
			$hexDigit = "0" . $hexDigit;
			}
			// Append to the hex string
			$hex .= $hexDigit;
		}
		return $hash.$hex;
	}

	
	// color options
	$body_bgcolor 	= esc_attr( ot_get_option( 'nt_conversi_theme_body_bgcolor' ) );
	$one_color 		= esc_attr( ot_get_option( 'nt_conversi_theme_color_one' ) );
    $two_color 		= esc_attr( ot_get_option( 'nt_conversi_theme_color_two' ) );
	// body background options
	if ( ot_get_option( 'nt_conversi_boxed' ) == 'boxed' ) {
		$background = ot_get_option( 'nt_conversi_theme_body_bg', array() );
		if ( !empty( $background ) ) {
			$background_color       = ( $background['background-color'] != '' ) ? $background['background-color'] . ' ' : '';
			$background_image       = ( $background['background-image'] != '' ) ? 'url('.$background['background-image'].') ' : '';
			$background_repeat      = ( $background['background-repeat'] != '' ) ? $background['background-repeat']. ' ' : '';
			$background_positon     = ( $background['background-position'] != '' ) ? $background['background-position']. ' ' : '';
			$background_attachment  = ( $background['background-attachment'] != '' ) ? $background['background-attachment']. ' ' : '';
			$background_size        = ( $background['background-size'] != '' ) ? 'background-size: '. $background['background-size']. ';' : '';
		}
		$theCSS .= 'body.body-wrap { background: '.$background_color.$background_image.$background_repeat.$background_attachment.$background_positon.';'."\n". $background_size .'}';
	}
	if ( ( ot_get_option( 'nt_conversi_boxed' ) == 'stretched' ) && ( $body_bgcolor != '' ) ) {
		$theCSS .= 'body { background: '.$body_bgcolor.'}';
	}
	
	// frontpage custom color
	$nt_conversi_theme_color = ot_get_option( 'nt_conversi_theme_color' ) ;
	$custom_color = ot_get_option( 'nt_conversi_custom_color' ) ;

	list($r, $g, $b) = sscanf($one_color, "#%02x%02x%02x");

	if( $nt_conversi_theme_color == 'custom' ){

	$one_color = $custom_color;

	}else{ 

		$one_color = $nt_conversi_theme_color; 

	}

	$Hex_color = $one_color;
	$RGB_color = hex2rgb($Hex_color);
	$Final_Rgb_color = implode(", ", $RGB_color);
	
	$theCSS .= 'body.error404 .index .searchform input[type="submit"], body.search article .searchform input[type="submit"], #widget-area #searchform #searchsubmit, .pager li > span, .pager li > a, .error404 .index .searchform input[type="submit"], .bg-color, .btn-custom, input[type="button"], input[type="submit"], input[type="reset"], button, .carousel-slider .slick-prev:hover, .carousel-slider .slick-next:hover, #navigation_mobile .dropdown-menu, #navigation_mobile .nav-menu-links, #header .header-content .btn-play, #header .header-content .header-form .background-color, #sub-header, .bg-color .affa-tbl-prc .btn-custom, .bg-color .affa-tbl-prc .btn-custom.btn-blue, .affa-tbl-prc .tbl-prc-col .tbl-prc-badge, .affa-tbl-prc .tbl-prc-col .tbl-prc-heading .tbl-prc-price, .affa-map .btn-collapse { background-color:'.$one_color.'; }

	input[type="color"]:focus, input[type="date"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, .ie input[type="range"]:focus, .ie9 input[type="range"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, select:focus, textarea:focus { border-color:'.$one_color.'; }

	.carousel-slider .slick-dots li button:hover, .carousel-slider .slick-dots li.slick-active button { background:'.$one_color.'; }
	.affa-map .map-overlay { background-color: rgba('.$Final_Rgb_color.', 0.8); }

	#header .nav > li.menu-btn > a, #navigation_affix .nav > li.menu-btn > a { background:'.$one_color.' !important; }

	#navigation_affix .nav > li.active > a { color:'.$one_color.'; border-top-color:'.$one_color.';}
	
	body.error404 .index .searchform input[type="submit"]:hover, body.search article .searchform input[type="submit"]:hover, .btn-custom:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:hover, #navigation_mobile .nav-menu-button, .bg-dark .btn-custom:hover, .bg-img .btn-custom:hover, .affa-map .btn-collapse:hover { background-color: '.colourBrightness($one_color,-0.9).';}
	
	#header .nav > li.menu-btn > a:hover, #navigation_affix .nav > li.menu-btn > a:hover, #header .nav > li.menu-btn.active > a, #navigation_affix .nav > li.menu-btn.active > a { background: '.colourBrightness($one_color,-0.9).' !important;}

	.affa-map .map-overlay
	
	.breadcrubms, .breadcrubms span a span { color: '.colourBrightness($one_color,0.7).';}
	.breadcrubms span { color: '.colourBrightness($one_color,-0.6).';}
	.breadcrubms span a span:hover, .text-logo:hover { color: '.colourBrightness($one_color,-0.8).';}';

	
	// nav
	$theme_logo_type		= esc_attr( ot_get_option( 'nt_conversi_logo_type' ) );
	$nav_bg 				= esc_attr( ot_get_option( 'nt_conversi_nav_bg' ) );
	$nav_fixed_bg 			= esc_attr( ot_get_option( 'nt_conversi_nav_fixed_bg' ) );
    $navitem 				= esc_attr( ot_get_option( 'nt_conversi_navitem' ) );
    $navitemhover 			= esc_attr( ot_get_option( 'nt_conversi_navitemhover' ) );
	$dropdown_bg 			= esc_attr( ot_get_option( 'nt_conversi_dropdown_bg' ) );
    $dropdown_item 			= esc_attr( ot_get_option( 'nt_conversi_dropdown_item' ) );
    $dropdown_i_h 			= esc_attr( ot_get_option( 'nt_conversi_dropdown_itemhover' ) );

	if ( $theme_logo_type == 'text' ){

		//variable for text logo custom style
		$textlogo_fs 			= esc_attr( ot_get_option( 'nt_conversi_textlogo_fs' ) );
		$textlogo_fw 			= esc_attr( ot_get_option( 'nt_conversi_textlogo_fw' ) );
		$textlogo_fstyle		= esc_attr( ot_get_option( 'nt_conversi_textlogo_fstyle' ) );
		$textlogo_ltsp			= esc_attr( ot_get_option( 'nt_conversi_textlogo_lettersp' ) );
		$staticlogo_color		= esc_attr( ot_get_option( 'nt_conversi_staticlogo_color' ) );
		$stickylogo_color		= esc_attr( ot_get_option( 'nt_conversi_stickylogo_color' ) );

		//static menu text logo
		$theCSS .= '#navigation .navbar-brand { padding:10px 0px;'; 
		if ( $textlogo_fw 		!= '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
		if ( $textlogo_ltsp 	!= '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
		if ( $textlogo_fs 		!= '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
		if ( $textlogo_fstyle 	!= '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
		$theCSS .= '}';
		if ( $staticlogo_color 	!= '' ){ $theCSS .= '#navigation .navbar-brand a {color:'.$staticlogo_color.'!important;}';}

		//sticky menu text logo
		$theCSS .= '#navigation_affix .navbar-brand { padding:20px 0px;'; 
		if ( $textlogo_fw 		!= '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
		if ( $textlogo_ltsp 	!= '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
		if ( $textlogo_fs 		!= '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
		if ( $textlogo_fstyle 	!= '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
		$theCSS .= '}';
		if ( $stickylogo_color 	!= '' ){ $theCSS .= '#navigation_affix .navbar-brand a {color:'.$stickylogo_color.'!important;}';}
	}

	if ( $nav_bg !='' ) 		{ $theCSS .= '.primary-menu{background-color:' . $nav_bg . '!important;}'; }
	if ( $navitem !='' ) 		{ $theCSS .= '.primary-menu  > li > a{color:' . $navitem . ';}'; }
	if ( $navitem !='' ) 		{ $theCSS .= '.primary-menu  > li > a:hover{color:' . $navitemhover . ' !important;}'; }
	if ( $dropdown_bg !='' ) 	{ $theCSS .= '.primary-menu  > li .dropdown-menu{background-color:' . $dropdown_bg . '!important;}'; }
	if ( $dropdown_item !='' ) 	{ $theCSS .= '.primary-menu  > li .dropdown-menu > li > a{color:' . $dropdown_item . '!important;}'; }
	if ( $dropdown_i_h !='' ) 	{ $theCSS .= '.primary-menu  > li .dropdown-menu> li > a:hover{color:' . $dropdown_i_h . ' !important;}'; }
	

	// logo dimension var
	$logo 					= ( ot_get_option( 'nt_conversi_logo_dimension', array() ) );
	$logo_m 				= ( ot_get_option( 'nt_conversi_margin_logo', array() ) );
	$logo_p 				= ( ot_get_option( 'nt_conversi_padding_logo', array() ) );

	// logo img width and height
	if(isset($logo['unit']))   { $logounit = $logo['unit'];}else{ $logounit = 'px'; }
	if(isset($logo['width']))   { $theCSS .= '.navbar-brand img{ width:' .  $logo['width'] .''. $logo['unit'] . ' !important; }'; }
	if(isset($logo['height']))  { $theCSS .= '.navbar-brand img{ height:' . $logo['height'] .''. $logo['unit'] . ' !important; }'; }

	//logo  margin
	if(isset($logo_m['unit']))   { $logomarunit = $logo_m['unit'];}else{ $logomarunit = 'px'; }
	if(isset($logo_m['top']))    { $theCSS .= '.navbar-brand { margin-top:' .  $logo_m['top'] .''. $logo_m['unit'] . ' !important; }'; }
	if(isset($logo_m['bottom'])) { $theCSS .= '.navbar-brand { margin-bottom:' . $logo_m['bottom'] .''. $logo_m['unit'] . ' !important; }'; }
	if(isset($logo_m['right']))  { $theCSS .= '.navbar-brand { margin-right:' . $logo_m['right'] .''. $logo_m['unit'] . ' !important; }'; }
	if(isset($logo_m['left']))   { $theCSS .= '.navbar-brand { margin-left:' . $logo_m['left'] .''. $logo_m['unit'] . ' !important; }'; }

	//logo padding
	if(isset($logo_p['unit']))   { $logopadunit = $logo_p['unit'];}else{ $logopadunit = 'px'; }
	if(isset($logo_p['top']))    { $theCSS .= '.navbar-brand { padding-top:' .  $logo_p['top'] .''. $logo_p['unit'] . ' !important; }'; }
	if(isset($logo_p['bottom'])) { $theCSS .= '.navbar-brand { padding-bottom:' . $logo_p['bottom'] .''. $logo_p['unit'] . ' !important; }'; }
	if(isset($logo_p['right']))  { $theCSS .= '.navbar-brand { padding-right:' . $logo_p['right'] .''. $logo_p['unit'] . ' !important; }'; }
	if(isset($logo_p['left']))   { $theCSS .= '.navbar-brand { padding-left:' . $logo_p['left'] .''. $logo_p['unit'] . ' !important; }'; }
	
	// logo dimension var
	$logo_s 			= ( ot_get_option( 'nt_conversi_logo_dimension_sticky', array() ) );
	$logo_m_s 			= ( ot_get_option( 'nt_conversi_margin_logo_sticky', array() ) );
	$logo_p_s 			= ( ot_get_option( 'nt_conversi_padding_logo_sticky', array() ) );
	
	// logo img width and height
	if(isset($logo_s['unit']))   { $logounit_s = $logo_s['unit'];}else{ $logounit_s = 'px'; }
	if(isset($logo_s['width']))   { $theCSS .= '.show .navbar-brand img{ width:' .  $logo_s['width'] .''. $logounit_s . ' !important; }'; }
	if(isset($logo_s['height']))  { $theCSS .= '.show .navbar-brand img{ height:' . $logo_s['height'] .''. $logounit_s . ' !important; }'; }
	
	//logo  margin
	if(isset($logo_m_s['unit']))   { $logomarunit_s = $logo_m_s['unit'];}else{ $logomarunit_s = 'px'; }
	if(isset($logo_m_s['top']))    { $theCSS .= '.show .navbar-brand { margin-top:' .  $logo_m_s['top'] .''. $logomarunit_s . ' !important; }'; }
	if(isset($logo_m_s['bottom'])) { $theCSS .= '.show .navbar-brand { margin-bottom:' . $logo_m_s['bottom'] .''. $logomarunit_s . ' !important; }'; }
	if(isset($logo_m_s['right']))  { $theCSS .= '.show .navbar-brand { margin-right:' . $logo_m_s['right'] .''. $logomarunit_s . ' !important; }'; }
	if(isset($logo_m_s['left']))   { $theCSS .= '.show .navbar-brand { margin-left:' . $logo_m_s['left'] .''. $logomarunit_s . ' !important; }'; }
	
	//logo padding
	if(isset($logo_p_s['unit']))   { $logopadunit_s = $logo_p_s['unit'];}else{ $logopadunit_s = 'px'; }
	if(isset($logo_p_s['top']))    { $theCSS .= '.show .navbar-brand { padding-top:' .  $logo_p_s['top'] .''. $logopadunit_s . ' !important; }'; }
	if(isset($logo_p_s['bottom'])) { $theCSS .= '.show .navbar-brand { padding-bottom:' . $logo_p_s['bottom'] .''. $logopadunit_s . ' !important; }'; }
	if(isset($logo_p_s['right']))  { $theCSS .= '.show .navbar-brand { padding-right:' . $logo_p_s['right'] .''. $logopadunit_s . ' !important; }'; }
	if(isset($logo_p_s['left']))   { $theCSS .= '.show .navbar-brand { padding-left:' . $logo_p_s['left'] .''. $logopadunit_s . ' !important; }'; }

	//variable for top header contact
	$top_header_bgcolor	= esc_attr( ot_get_option( 'nt_conversi_top_header_bgcolor' ) );
	$top_header_pad_top = esc_attr( ot_get_option( 'nt_conversi_top_header_pad_top' ) );
	$top_header_pad_bot	= esc_attr( ot_get_option( 'nt_conversi_top_header_pad_bot' ) );

	if ( $top_header_bgcolor !='' ){ $theCSS .= '.top-header {background-color:' . $top_header_bgcolor . ';}'; }
	if ( $top_header_pad_top !='' ){ $theCSS .= '.top-header {padding-top:'.$top_header_pad_top.'px;}'; }
	if ( $top_header_pad_bot !='' ){ $theCSS .= '.top-header {padding-bottom:'.$top_header_pad_bot.'px;}'; }


	//variable for top header contact
	$top_header_textcolor 		= esc_attr( ot_get_option( 'nt_conversi_top_header_textcolor' ) );
	$top_header_iconcolor 		= esc_attr( ot_get_option( 'nt_conversi_top_header_iconcolor' ) );
	$top_header_linkcolor 		= esc_attr( ot_get_option( 'nt_conversi_top_header_linkcolor' ) );
	$top_header_linkhovercolor	= esc_attr( ot_get_option( 'nt_conversi_top_header_linkhovercolor' ) );
	
	if ( $top_header_textcolor !='' ){ $theCSS .= '.top-header .contact-list .header-contact, #navigation_mobile .mobile-contact .header-contact{color:' . $top_header_textcolor . ';}'; }
	if ( $top_header_iconcolor !='' ){ $theCSS .= '.top-header .contact-list .header-contact i, #navigation_mobile .mobile-contact .header-contact i{color:' . $top_header_iconcolor . ';}'; }
	if ( $top_header_linkcolor !='' ){ $theCSS .= '.top-header .contact-list .header-contact a, #navigation_mobile .mobile-contact .header-contact a{color:' . $top_header_linkcolor . ';}'; }
	if ( $top_header_linkhovercolor !='' ){ $theCSS .= '.top-header .contact-list .header-contact a:hover, .top-header .contact-list .header-contact a:hover i, #navigation_mobile .mobile-contact .header-contact a:hover, #navigation_mobile .mobile-contact .header-contact a:hover i{color:' . $top_header_linkhovercolor . ';}'; }

	//variable for top header social
	$top_header_socialcolor 		= esc_attr( ot_get_option( 'nt_conversi_top_header_socialcolor' ) );
	$top_header_socialhovercolor 	= esc_attr( ot_get_option( 'nt_conversi_top_header_socialhovercolor' ) );
	$top_header_socialbgcolor 		= esc_attr( ot_get_option( 'nt_conversi_top_header_socialbgcolor' ) );
	$top_header_socialbghovercolor	= esc_attr( ot_get_option( 'nt_conversi_top_header_socialbghovercolor' ) );
	
	if ( $top_header_socialcolor !='' ){ $theCSS .= '#header .social-list ul .social-media a, #navigation_mobile .mobile-nav-social .social-media a{color:' . $top_header_socialcolor . '!important;}'; }
	if ( $top_header_socialhovercolor !='' ){ $theCSS .= '#header .social-list ul .social-media a:hover, #navigation_mobile .mobile-nav-social .social-media a:hover{color:' . $top_header_socialhovercolor . '!important;}'; }
	if ( $top_header_socialbgcolor !='' ){ $theCSS .= '#header .social-list ul .social-media a, #navigation_mobile .mobile-nav-social .social-media a{background-color:' . $top_header_socialbgcolor . '!important;}'; }
	if ( $top_header_socialbghovercolor !='' ){ $theCSS .= '#header .social-list ul .social-media a:hover, #navigation_mobile .mobile-nav-social .social-media a:hover{background-color:' . $top_header_socialbghovercolor . '!important;}'; }
	
	
	// sidebar
    $sb_bg 					= esc_attr( ot_get_option( 'nt_conversi_sb_bg' ) );
    $sb_t_c 				= esc_attr( ot_get_option( 'nt_conversi_sb_t_c' ) );
    $sb_c 					= esc_attr( ot_get_option( 'nt_conversi_sb_c' ) );
    $sb_l_c 				= esc_attr( ot_get_option( 'nt_conversi_sb_l_c' ) );
    $sb_l_c_h 				= esc_attr( ot_get_option( 'nt_conversi_sb_l_c_h' ) );
    $sb_s_t 				= esc_attr( ot_get_option( 'nt_conversi_sb_s_t' ) );
    $sb_s_bg 				= esc_attr( ot_get_option( 'nt_conversi_sb_s_bg' ) );
	
	if ( $sb_bg !='' ) 		{ $theCSS .= '#widget-area{ background-color:' . $sb_bg . '!important;}'; }
	if ( $sb_t_c !='' ) 	{ $theCSS .= '.widget-title{ color:' . $sb_t_c . '!important;}'; }
	if ( $sb_c !='' ) 		{ $theCSS .= '.widget ul{ color:' . $sb_c . '!important;}'; }
	if ( $sb_l_c !='' ) 	{ $theCSS .= '.widget ul li a{ color:' . $sb_l_c . '!important;}'; }
	if ( $sb_l_c_h !='' ) 	{ $theCSS .= '.widget ul li a:hover{ color:' . $sb_l_c_h . '!important;}'; }
	if ( $sb_s_t !='' ) 	{ $theCSS .= '#widget-area #searchform input#searchsubmit{ color:' . $sb_s_t . '!important;}'; }
	if ( $sb_s_bg !='' ) 	{ $theCSS .= '#widget-area #searchform input#searchsubmit{ background-color:' . $sb_s_bg . '!important;}'; }
	
	// ALL PAGE OVERLAY MASK COLOR
	$blog_mask_v 			= esc_attr( ot_get_option( 'nt_conversi_blog_mask_v' ) );
	$blog_mask_c 			= esc_attr( ot_get_option( 'nt_conversi_blog_mask_c' ) );
	$single_mask_v 			= esc_attr( ot_get_option( 'nt_conversi_single_mask_v' ) );
	$single_mask_c 			= esc_attr( ot_get_option( 'nt_conversi_single_mask_c' ) );
	$archive_mask_v 		= esc_attr( ot_get_option( 'nt_conversi_archive_mask_v' ) );
	$archive_mask_c 		= esc_attr( ot_get_option( 'nt_conversi_archive_mask_c' ) );
	$error_mask_v 			= esc_attr( ot_get_option( 'nt_conversi_error_mask_v' ) );
	$error_mask_c 			= esc_attr( ot_get_option( 'nt_conversi_error_mask_c' ) );
	$search_mask_v 			= esc_attr( ot_get_option( 'nt_conversi_search_mask_v' ) );
	$search_mask_c 			= esc_attr( ot_get_option( 'nt_conversi_search_mask_c' ) );
	
	// BLOG HEADER
	$blog_h_bg 				= esc_attr( ot_get_option( 'nt_conversi_blog_h_bg' ) );
	$blog_bg_c 				= esc_attr( ot_get_option( 'nt_conversi_blog_h_bg_c' ) );
	$blog_h_h 				= esc_attr( ot_get_option( 'nt_conversi_blog_h_h' ) );
	$blog_h_c 				= esc_attr( ot_get_option( 'nt_conversi_blogheadingcolor' ) );
	$blog_h_fs 				= esc_attr( ot_get_option( 'nt_conversi_blogheadingfontsize' ) );
	$blog_sub_h_c 			= esc_attr( ot_get_option( 'nt_conversi_blogsubtitlecolor' ) );
	$blog_sub_fs 			= esc_attr( ot_get_option( 'nt_conversi_blogsubheadingfontsize' ) );
	$blog_h_p 				= ( ot_get_option( 'nt_conversi_blog_h_p', array() ) );

	if ( $blog_bg_c =='' ) 	{ 
		if ( $blog_h_bg !='' ) 	{ 
			$theCSS .= '.index-header {background: transparent url( ' . $blog_h_bg .')no-repeat fixed center top / cover!important; }'; 
		} else {
			$theCSS .= '.index-header{ background-image: url('. get_template_directory_uri() . '/images/full_1.jpg'.');}';
		}
	}

	if ( $blog_mask_v =='off' ){  $theCSS .= '.blog .index-header .template-overlay{display: none !important; }'; }
	if (( $blog_mask_c !='' ) && ( $blog_mask_v !='off' )){  $theCSS .= '.blog .index-header .template-overlay{background: '.$blog_mask_c.';!important; }'; }
	if ( $blog_bg_c !='' ) 			{ $theCSS .= '.blog .index-header { background-color: ' . $blog_bg_c .'!important; }';  }
	if ( $blog_h_h !='' ) 			{ $theCSS .= '.blog .index-header { min-height: ' . $blog_h_h .'vh !important; max-height: 100%; }';  }
	if ( $blog_h_c !='' ) 			{ $theCSS .= '.blog .index-header .template-cover-text .uppercase{color: ' . $blog_h_c .' !important; }';  }
	if ( $blog_h_fs !='' ) 			{ $theCSS .= '.blog .index-header .template-cover-text .uppercase{font-size:'.$blog_h_fs.'px !important; }';  }
	if ( $blog_sub_h_c !='' ) 		{ $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{color: '.$blog_sub_h_c .' !important; }'; }
	if ( $blog_sub_fs !='' ) 		{ $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{font-size: '.$blog_sub_fs.'px !important; }'; }
	
	if(isset($blog_h_p['top']))    	{ $theCSS .= '.blog .index-header { padding-top:' .  $blog_h_p['top'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['bottom'])) 	{ $theCSS .= '.blog .index-header { padding-bottom:' . $blog_h_p['bottom'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['right']))  	{ $theCSS .= '.blog .index-header { padding-right:' . $blog_h_p['right'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['left']))   	{ $theCSS .= '.blog .index-header { padding-left:' . $blog_h_p['left'] .''. $blog_h_p['unit'] . ' !important; }'; }
	

	// PAGE.PHP AND FULLWIDTH-PAGE.PHP HEADER - CUSTOM PAGE METABOX OPTIONS
	$nt_conversi_page_bg 			= 	wp_get_attachment_url( get_post_meta(get_the_ID(), 'nt_conversi_page_bg_image', true ),'full' );
	$nt_conversi_page_bg_color 		= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_page_bg_color', true ) );
	$nt_conversi_disable_page_mask 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_disable_page_mask', true ) );
	$nt_conversi_page_mask_color 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_page_mask_color', true ) );
	$nt_conversi_page_mask_opacity 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_page_mask_opacity', true ) );
	$nt_conversi_page_text_color 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_page_text_color', true ) );
	$nt_conversi_page_subtitle_color= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_page_subtitle_color', true ) );
	$nt_conversi_header_p_top 		= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_header_p_top', true ) );
	$nt_conversi_header_p_bottom 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_conversi_header_p_bottom', true ) );

	$page_mask_color = $nt_conversi_page_mask_color;
	$mask_rgb_color = hex2rgb($page_mask_color);
	$final_page_mask_color = implode(", ", $mask_rgb_color);
	
	if ( $nt_conversi_page_bg !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: url(' . esc_url( $nt_conversi_page_bg ) .') !important; }';
	}
	if ( $nt_conversi_page_bg_color !='' && $nt_conversi_page_bg =='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: none !important; }';
	}
	if ( $nt_conversi_disable_page_mask == true ){  
		$theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay .template-overlay{ display: none !important; }'; 
	}
	if ( ( $nt_conversi_disable_page_mask != true ) && ( $nt_conversi_page_mask_color != '' ) ){
		$theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay{background: rgba('.$final_page_mask_color.', '.$nt_conversi_page_mask_opacity .');!important; }'; 
	}
	if ( $nt_conversi_page_bg_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-color: ' . $nt_conversi_page_bg_color .' !important; }';
	}
	if ( $nt_conversi_page_text_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header h2.lead-heading { color: ' . $nt_conversi_page_text_color .' !important; }';
	}
	if ( $nt_conversi_page_subtitle_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header h2.cover-text-sublead, .page-id-' . get_the_ID().'.index-header h2.cover-text-sublead p { color: ' . $nt_conversi_page_subtitle_color .' !important; }';
	}
	if ( $nt_conversi_header_p_top !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-bottom : ' . $nt_conversi_header_p_top .'px !important; }';
	}
	if ( $nt_conversi_header_p_bottom !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-top : ' . $nt_conversi_header_p_bottom .'px !important; }';
	}


	// SINGLE POST
	if  ( ot_get_option( 'nt_conversi_singlepageheadbg' ) !='' ){
    $theCSS .= '.single .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_conversi_singlepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if ( $single_mask_v =='off' ){  $theCSS .= '.single .index-header .template-overlay{display: none !important; }'; }
	if (( $single_mask_c !='' ) && ( $single_mask_v !='off' )){  $theCSS .= '.single .index-header .template-overlay{background: '.$single_mask_c.';!important; }'; }
	if  ( ot_get_option( 'nt_conversi_singleheaderbgcolor' ) !='' ){
    $theCSS .= '.single .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_conversi_singleheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_singleheadingcolor' ) !='' ){
    $theCSS .= '.single .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_conversi_singleheadingcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_single_heading_fontsize' ) !='' ){
    $theCSS .= '.single .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_conversi_single_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_singleheaderbgheight' ) !='' ){
    $theCSS .= '.single .index-header {min-height: '.  esc_attr( ot_get_option( 'nt_conversi_singleheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_conversi_singleheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_conversi_singleheaderpaddingbottom' ) !='' )){
		$theCSS .= '@media (min-width: 768px){
			.single .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_conversi_singleheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_conversi_singleheaderpaddingbottom' ) ) .'px !important; 
			}
		}';
    }

	// ARCHIVE PAGES
	if  ( ot_get_option( 'nt_conversi_archivepageheadbg' ) !='' ){
     $theCSS .= '.archive .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_conversi_archivepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if ( $archive_mask_v =='off' ){  $theCSS .= '.archive .index-header .template-overlay{display: none !important; }'; }
	if (( $archive_mask_c !='' ) && ( $archive_mask_v !='off' )){  $theCSS .= '.archive .index-header .template-overlay{background: '.$archive_mask_c.';!important; }'; }
	if  ( ot_get_option( 'nt_conversi_archiveheaderbgcolor' ) !='' ){
     $theCSS .= '.archive .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_archiveheadingcolor' ) !='' ){
     $theCSS .= '.archive .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_archive_heading_fontsize' ) !='' ){
     $theCSS .= '.archive .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_conversi_archive_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_archiveheaderparagraphcolor' ) !='' ){
     $theCSS .= '.archive .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_archiveheaderbgheight' ) !='' ){
     $theCSS .= '.archive .index-header {min-height: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_conversi_archiveheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_conversi_archiveheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.archive .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_conversi_archiveheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}

	// 404 PAGE
	if  ( ot_get_option( 'nt_conversi_errorpageheadbg' ) !='' ){
     $theCSS .= '.error404 .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_conversi_errorpageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if ( $error_mask_v =='off' ){  $theCSS .= '.error404 .index-header .template-overlay{display: none !important; }'; }
	if (( $error_mask_c !='' ) && ( $error_mask_v !='off' )){  $theCSS .= '.error404 .index-header .template-overlay{background: '.$error_mask_c.';!important; }'; }
	if  ( ot_get_option( 'nt_conversi_errorheaderbgcolor' ) !='' ){
     $theCSS .= '.error404 .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_conversi_errorheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_errorheadingcolor' ) !='' ){
     $theCSS .= '.error404 .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_conversi_errorheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_error_heading_fontsize' ) !='' ){
     $theCSS .= '.error404 .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_conversi_error_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_errorheaderparagraphcolor' ) !='' ){
     $theCSS .= '.error404 .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_conversi_errorheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_errorheaderbgheight' ) !='' ){
     $theCSS .= '.error404 .index-header {min-height: '.  esc_attr( ot_get_option( 'nt_conversi_errorheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_conversi_errorheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_conversi_errorheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.error404 .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_conversi_errorheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_conversi_errorheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}

	// SEARCH PAGE
	if  ( ot_get_option( 'nt_conversi_searchpageheadbg' ) !='' ){
     $theCSS .= '.search .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_conversi_searchpageheadbg' ) ) .')no-repeat scroll center top / cover!important; }'; 
    }
	if ( $search_mask_v =='off' ){  $theCSS .= '.search .index-header .template-overlay{display: none !important; }'; }
	if (( $search_mask_c !='' ) && ( $search_mask_v !='off' )){  $theCSS .= '.search .index-header .template-overlay{background: '.$search_mask_c.';!important; }'; }
	if  ( ot_get_option( 'nt_conversi_searchheaderbgcolor' ) !='' ){
     $theCSS .= '.search .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_conversi_searchheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_searchheadingcolor' ) !='' ){
     $theCSS .= '.search .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_conversi_searchheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_search_heading_fontsize' ) !='' ){
     $theCSS .= '.search .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_conversi_search_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_searchheaderparagraphcolor' ) !='' ){
     $theCSS .= '.search .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_conversi_searchheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_searchheaderbgheight' ) !='' ){
     $theCSS .= '.search .index-header {min-height: '.  esc_attr( ot_get_option( 'nt_conversi_searchheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_conversi_searchheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_conversi_searchheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.search .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_conversi_searchheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_conversi_searchheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}

	// SIDEBAR COLOR
	if  ( ot_get_option( 'nt_conversi_sidebarwidgetareabgcolor' ) !='' ){
     $theCSS .= '#widget-area{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarwidgetareabgcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarwidgetgeneralcolor' ) !='' ){
     $theCSS .= '#widget-area{color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarwidgetgeneralcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarwidgettitlecolor' ) !='' ){
     $theCSS .= '#widget-area .widget-title{color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarwidgettitlecolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarlinkcolor' ) !='' ){
     $theCSS .= '#widget-area .widget ul li a{color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarlinkcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarlinkhovercolor' ) !='' ){
     $theCSS .= '#widget-area .widget ul li a:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarlinkhovercolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarsearchsubmittextcolor' ) !='' ){
     $theCSS .= '#widget-area #searchform input[type="submit"]{color: '.esc_attr( ot_get_option( 'nt_conversi_sidebarsearchsubmittextcolor' ) ).'!important; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_sidebarsearchsubmitbgcolor' ) !='' ){
     $theCSS .= '#widget-area #searchform input#searchsubmit{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_sidebarsearchsubmitbgcolor' ) ) .'; }'; 
	}

	
	// BREADCRUBMS
	if  ( ot_get_option( 'nt_conversi_blogbreadcrubmscolor' ) !='' ){
     $theCSS .= '.breadcrubms, .breadcrubms span a span{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogbreadcrubmscolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogbreadcrubmshovercolor' ) !='' ){
     $theCSS .= '.breadcrubms span a span:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogbreadcrubmshovercolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogbreadcrubmscurrentcolor' ) !='' ){
     $theCSS .= '.breadcrubms span {color: '.  esc_attr( ot_get_option( 'nt_conversi_blogbreadcrubmscurrentcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_bread_f_s' ) !='' ){
     $theCSS .= '.breadcrubms{font-size: '.  esc_attr( ot_get_option( 'nt_conversi_bread_f_s' ) ) .'px; }'; 
	}

	// POSTS
	if  ( ot_get_option( 'nt_conversi_blogposttitlecolor' ) !='' ){
     $theCSS .= '.entry-title a{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogposttitlecolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogposttitlhoverecolor' ) !='' ){
     $theCSS .= '.entry-title a:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogposttitlhoverecolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetacolor' ) !='' ){
     $theCSS .= '.entry-meta li{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetacolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) !='' ){
     $theCSS .= '.entry-meta li a{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= '.entry-meta li a:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= '.entry-meta li a{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= '.entry-meta li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_blogpostparagraphcolor' ) !='' ){	
     $theCSS .= '.entry-content p{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogpostparagraphcolor' ) ) .'; }'; 
	 $theCSS .= '.entry-content p{color:#000;}'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogpostbuttonbgcolor' ) !='' ){	
     $theCSS .= 'a.margin_30{background-color:'.  esc_attr( ot_get_option( 'nt_conversi_blogpostbuttonbgcolor' ) ) .';}'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogpostbuttonbghovercolor' ) !='' ){	
     $theCSS .= 'a.margin_30:hover{background-color:'.  esc_attr( ot_get_option( 'nt_conversi_blogpostbuttonbghovercolor' ) ) .';}'; 	
    }
	if  ( ot_get_option( 'nt_conversi_blogpostbuttontitlecolor' ) !='' ){	
     $theCSS .= 'a.margin_30{color:'.  esc_attr( ot_get_option( 'nt_conversi_blogpostbuttontitlecolor' ) ) .';}'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogpostbuttontitlehovercolor' ) !='' ){	
     $theCSS .= 'a.margin_30:hover{color:'.  esc_attr( ot_get_option( 'nt_conversi_blogpostbuttontitlehovercolor' ) ) .';}'; 	
    }

	// SHARE BUTTONS
	if  ( ot_get_option( 'nt_conversi_blogsharebgcolor' ) !='' ){	
     $theCSS .= '#share-buttons i{ background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogsharebgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_blogsharebghovercolor' ) !='' ){	
    $theCSS .= ' #share-buttons i:hover{ background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogsharebghovercolor' ) ) .'; }'; 
    }		
	if  ( ot_get_option( 'nt_conversi_blogsharecolor' ) !='' ){	
     $theCSS .= '#share-buttons i{ color: '.  esc_attr( ot_get_option( 'nt_conversi_blogsharecolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_blogsharehovercolor' ) !='' ){	
     $theCSS .= '#share-buttons i:hover{ color: '.  esc_attr( ot_get_option( 'nt_conversi_blogsharehovercolor' ) ) .'; }'; 
    }

	// COMMENTS
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link,a.comment-reply-link{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinkhovercolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link,a.comment-reply-link{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogcommentformsubmitcolor' ) !='' ){
     $theCSS .= '.comment-form .submit{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogcommentformsubmitcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_blogcommentformsubmithovercolor' ) !='' ){
     $theCSS .= '.comment-form .submit:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_blogcommentformsubmithovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogcommentformsubmitbgcolor' ) !='' ){
     $theCSS .= '.comment-form .submit{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogcommentformsubmitbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_blogcommentformsubmitbghovercolor' ) !='' ){
     $theCSS .= '.comment-form .submit:hover{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_blogcommentformsubmitbghovercolor' ) ) .'; }'; 
	}

	// PAGER
	if  ( ot_get_option( 'nt_conversi_pagertitlecolor' ) !='' ){
     $theCSS .= '.pager li a{color: '.  esc_attr( ot_get_option( 'nt_conversi_pagertitlecolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_conversi_pagertitlehovercolor' ) !='' ){
     $theCSS .= '.pager li a:hover{color: '.  esc_attr( ot_get_option( 'nt_conversi_pagertitlehovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_pagerbgcolor' ) !='' ){
     $theCSS .= '.pager li a{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_pagerbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_conversi_pagerbghovercolor' ) !='' ){
     $theCSS .= '.pager li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_conversi_pagerbghovercolor' ) ) .'; }'; 
	}

	// FOOTER WIDGETIZE OPTIONS
	$nt_conversi_f_v_bg		= 	esc_attr( ot_get_option( 'nt_conversi_footerwidgetizebgcolor' ) );
	$nt_conversi_f_v_pad	= 	esc_attr( ot_get_option( 'nt_conversi_footerwidgetizepadding' ) );
	$nt_conversi_f_h_c		= 	esc_attr( ot_get_option( 'nt_conversi_footer_h_c' ) );
	$nt_conversi_f_t_c		= 	esc_attr( ot_get_option( 'nt_conversi_footer_t_c' ) );
	$nt_conversi_f_a_c		= 	esc_attr( ot_get_option( 'nt_conversi_footer_a_c' ) );

	// WIDGETIZE FOOTER
	if  ( $nt_conversi_f_v_bg !='' ){	
    $theCSS .= '.footer-top.footer-widgetize{ background-color: '. $nt_conversi_f_v_bg .'; }'; 
    }
	if  ( $nt_conversi_f_v_pad !='' ){	
    $theCSS .= '.footer-top.footer-widgetize{ padding-top: '.$nt_conversi_f_v_pad.'px 0!important; padding-bottom: '.$nt_conversi_f_v_pad.'px 0!important; }'; 
    }
	if  ( $nt_conversi_f_h_c !='' ){
     $theCSS .= '.footer-top.footer-widgetize .widget .widget-head{color: '. $nt_conversi_f_h_c	.'; }'; 
	}
	if  ( $nt_conversi_f_a_c ){
     $theCSS .= '.footer-top.footer-widgetize .widget ul li a{ color: '. $nt_conversi_f_a_c .'; }'; 
	}
	if  ( $nt_conversi_f_t_c !='' ){
     $theCSS .= '.footer-top.footer-widgetize .widget .textwidget{color: '. esc_attr( ot_get_option( 'nt_conversi_footer_t_c' ) ) .'; }'; 
	}

	// FOOTER COPYRIGHT OPTIONS
	$nt_conversi_f_c_bg		= 	esc_attr( ot_get_option( 'nt_conversi_footerbgcolor' ) );
	$nt_conversi_f_c_c		= 	esc_attr( ot_get_option( 'nt_conversi_footer_p_c' ) );
	$nt_conversi_f_c_pad	= 	esc_attr( ot_get_option( 'nt_conversi_footercopyrightpadding' ) );

	// COPYRIGHT
	if  ( $nt_conversi_f_c_bg !='' ){	
    $theCSS .= 'footer.default-footer{ background-color: '.  $nt_conversi_f_c_bg .'; }'; 
    }
	if  ( $nt_conversi_f_c_pad !='' ){	
    $theCSS .= 'footer.default-footer{ padding-top: '.$nt_conversi_f_c_pad.'px 0!important; padding-bottom: '.$nt_conversi_f_c_pad.'px 0!important; }'; 
    }
	if  ( $nt_conversi_f_c_c !='' ){
     $theCSS .= 'footer.default-footer, footer.default-footer p{ color: '. $nt_conversi_f_c_c .'; }'; 
	}

	// FOOTER COPYRIGHT CONTROL OPTIONS
	$nt_conversi_f_c_v		= 	esc_attr( ot_get_option( 'nt_conversi_copyright_visibility' ) );
	$nt_conversi_f_c_soc	= 	esc_attr( ot_get_option( 'nt_conversi_social_section' ) );

	// If the copyright section is disabled, the footer's social icon is centered
	if ( $nt_conversi_f_c_v == 'off' ) { $theCSS .= '#footer .socials{float: none;}#footer .socials a{float: none;display: block;margin: 0 auto; }'; }
	
	// If the social icon section is disabled, the footer's copyright is centered
	if ( $nt_conversi_f_c_soc == 'off' ) { $theCSS .= '.default-footer p{text-align: center;}'; }


// tipigrof
	$nt_conversi_typgrph = ot_get_option( 'nt_conversi_tipigrof', array() );
	if ( !empty($nt_conversi_typgrph) ) :
	$theCSS .= 'body{';
	if ( !empty($nt_conversi_typgrph['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $nt_conversi_typgrph['font-family'] ).'"!important;'; }
	if ( !empty($nt_conversi_typgrph['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph1 = ot_get_option( 'nt_conversi_tipigrof1', array() );
	if ( !empty($nt_conversi_typgrph1) ) :
	$theCSS .= 'body h1{';
	if ( !empty($nt_conversi_typgrph1['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph1['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $nt_conversi_typgrph1['font-family'] ).'"!important;'; }
	if ( !empty($nt_conversi_typgrph1['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph1['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph1['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph1['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph1['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph1['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph1['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph1['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph1['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph1['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph2 = ot_get_option( 'nt_conversi_tipigrof2', array() );
	if ( !empty($nt_conversi_typgrph2) ) :
	$theCSS .= 'body h2{';
	if ( !empty($nt_conversi_typgrph2['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph2['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_conversi_typgrph2['font-family'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph2['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph2['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph2['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph2['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph2['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph2['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph2['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph2['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph2['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph3 = ot_get_option( 'nt_conversi_tipigrof3', array() );
	if ( !empty($nt_conversi_typgrph3) ) :
	$theCSS .= 'body h3{';
	if ( !empty($nt_conversi_typgrph3['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph3['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_conversi_typgrph3['font-family'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph3['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph3['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph3['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph3['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph3['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph3['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph3['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph3['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph3['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph4 = ot_get_option( 'nt_conversi_tipigrof4', array() );
	if ( !empty($nt_conversi_typgrph4) ) :
	$theCSS .= 'body h4{';
	if ( !empty($nt_conversi_typgrph4['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph4['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_conversi_typgrph4['font-family'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph4['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph4['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph4['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph4['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph4['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph4['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph4['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph4['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph4['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph5 = ot_get_option( 'nt_conversi_tipigrof5', array() );
	if ( !empty($nt_conversi_typgrph5) ) :
	$theCSS .= 'body h5{';
	if ( !empty($nt_conversi_typgrph5['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph5['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_conversi_typgrph5['font-family'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph5['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph5['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph5['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph5['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph5['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph5['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph5['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph5['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph5['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	//
	$nt_conversi_typgrph6 = ot_get_option( 'nt_conversi_tipigrof6', array() );
	if ( !empty($nt_conversi_typgrph6) ) :
	$theCSS .= 'body h6{';
	if ( !empty($nt_conversi_typgrph6['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_conversi_typgrph6['font-color'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_conversi_typgrph6['font-family'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_conversi_typgrph6['font-size'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_conversi_typgrph6['font-style'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_conversi_typgrph6['font-variant'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_conversi_typgrph6['font-weight'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_conversi_typgrph6['letter-spacing'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_conversi_typgrph6['line-height'] ).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['text-decoration'])){$theCSS .= 'text-decoration:'.esc_attr($nt_conversi_typgrph6['text-decoration']).'!important;'; }
	if ( !empty($nt_conversi_typgrph6['text-transform'])){$theCSS .= 'text-transform:'.esc_attr($nt_conversi_typgrph6['text-transform']).'!important;'; }
	$theCSS .= '}';
	endif;
	
	
	
	// CUSTOM PRELOADER CSS
	if  ( ot_get_option('nt_conversi_preloadercss')  !='' ) { $theCSS .= ''.ot_get_option( 'nt_conversi_preloadercss' ).''; }


    /* Add CSS to style.css */
    wp_add_inline_style( 'nt-conversi-custom-style', $theCSS );
	}

add_action( 'wp_enqueue_scripts', 'nt_conversi_css_options' );