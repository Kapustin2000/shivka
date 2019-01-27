<?php
/**
 *
 * @package WordPress
 * @subpackage nt_conversi
 * @since nt_conversi 1.0
 *
 */


/*************************************************
## Google Font
*************************************************/
if ( ! function_exists( 'nt_conversi_fonts_url' ) ) :
function nt_conversi_fonts_url() {
	$fonts_url = '';

	$roboto 	= 	_x( 'on', 'Roboto font: on or off', 	'nt-conversi' );
	$poppins 	= 	_x( 'on', 'Poppins font: on or off', 	'nt-conversi' );

	if ( 'off' !== $roboto || 'off' !== $poppins  ) {
		$font_families = array();

		if ( 'off' !== $roboto )
			$font_families[] = 'Roboto:400,300,300italic,400italic,700';

		if ( 'off' !== $poppins )
			$font_families[] = 'Poppins:400,300,500,600,700';

		$query_args = array(
			'family'  => urlencode( implode( '|', $font_families ) ),
			'subset'  => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;

/*************************************************
## Styles and Scripts
*************************************************/

function nt_conversi_scripts() {

	//if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    // twitter Bootstrap framework
//	wp_enqueue_style( 'bootstrap',						get_template_directory_uri() . '/css/bootstrap.min.css', 			false, '1.0');
//	wp_enqueue_style( 'bootstrap',						get_template_directory_uri() . '/css/styles.css', 			false, '1.0');
	// font awesome icon library
	//wp_enqueue_style( 'font-awesome',					get_template_directory_uri() . '/css/font-awesome.min.css', 		false, '1.0');
	// timeline section styles
	//wp_enqueue_style( 'slick',							get_template_directory_uri() . '/css/slick.css', 					false, '1.0');
	// animated headline styles
	//wp_enqueue_style( 'nt-conversi-slick-theme',		get_template_directory_uri() . '/css/slick-theme.css', 				false, '1.0');
	// contact popup
	//wp_enqueue_style( 'jquery-fancybox',				get_template_directory_uri() . '/css/jquery.fancybox.css', 			false, '1.0');
	// general css file
	$nt_conversi_boxed 	= ( ot_get_option( 'nt_conversi_boxed' ) != '' ) ? ot_get_option( 'nt_conversi_boxed' ) : 'stretched';
	if ( $nt_conversi_boxed == 'boxed'){
//	wp_enqueue_style( 'nt-conversi-main-boxed-style',	get_template_directory_uri() . '/css/boxed-style.css', 				false, '1.0');
	}else{
//	wp_enqueue_style( 'nt-conversi-main-style',			get_template_directory_uri() . '/css/style.css', 					false, '1.0');
	}
	// extra css file
	//wp_enqueue_style( 'nt-conversi-theme-style',		get_template_directory_uri() . '/css/theme-style.css', 				false, '1.0');
	// ie older
	//wp_enqueue_style( 'nt-conversi-ie-older',			get_template_directory_uri() . '/css/ie-older.css', 				false, '1.0');

    //wp_style_add_data( 'nt-conversi-ie-older', 'conditional', 'lt IE 9' );

	// visual composer css for homepage
	//wp_enqueue_style( 'nt-conversi-vc', 				get_template_directory_uri() . '/css/blog/visual-composer.css', 	false, '1.0');
	// flexslider css file for blog post
	//wp_enqueue_style( 'nt-conversi-flexslider',  		get_template_directory_uri() . '/js/flexslider/flexslider.css', 	false, '1.0');
	// wordpress css file for blog post
//	wp_enqueue_style( 'nt-conversi-wordpress',  		get_template_directory_uri() . '/css/blog/wordpress.css', 			false, '1.0');
	// update css file
	//wp_enqueue_style( 'nt-conversi-update',  			get_template_directory_uri() . '/css/blog/update.css', 				false, '1.0');
	// theme default google webfont loader
	//wp_enqueue_style( 'nt-conversi-fonts-load',  		nt_conversi_fonts_url(), array(), '1.0.0' );

	// custom css
//	wp_enqueue_style( 'nt-conversi-custom-style', 		get_stylesheet_uri() );
//	wp_enqueue_style( 'style',							get_stylesheet_uri() );

	// JS plugins for this theme
//	wp_register_script('nt-conversi-particleground', 	get_template_directory_uri() .  '/js/jquery.particleground.min.js', 	array('jquery'), '1.0', true);
	wp_enqueue_script( 'bootstrap', 					get_template_directory_uri() .  '/js/bootstrap.min.js', 				array('jquery'), '1.0', true);
	//wp_enqueue_script( 'easing', 						get_template_directory_uri() .  '/js/jquery.easing.min.js', 			array('jquery'), '1.0', true);
	$nt_conversi_smoothscroll = ot_get_option( 'nt_conversi_smoothscroll' );
	if ( $nt_conversi_smoothscroll == 'on'){
	//wp_enqueue_script( 'smoothscroll', 					get_template_directory_uri() .  '/js/smoothscroll.js', 					array('jquery'), '1.0', true);
	}
	//wp_enqueue_script( 'response', 						get_template_directory_uri() .  '/js/response.min.js', 					array('jquery'), '1.0', true);
	//wp_enqueue_script( 'placeholder', 					get_template_directory_uri() .  '/js/jquery.placeholder.min.js', 		array('jquery'), '1.0', true);
	//wp_enqueue_script( 'imgpreload', 					get_template_directory_uri() .  '/js/jquery.imgpreload.min.js', 		array('jquery'), '1.0', true);
	//wp_enqueue_script( 'waypoints', 					get_template_directory_uri() .  '/js/waypoints.min.js', 				array('jquery'), '1.0', true);
//	wp_register_script( 'slick', 						get_template_directory_uri() .  '/js/slick.min.js', 					array('jquery'), '1.0', true);
//	wp_register_script( 'fancybox', 					get_template_directory_uri() .  '/js/jquery.fancybox.pack.js', 			array('jquery'), '1.0', true);
//	wp_register_script( 'fancybox-media', 				get_template_directory_uri() .  '/js/jquery.fancybox-media.js', 		array('jquery'), '1.0', true);
//	wp_register_script( 'counterup', 					get_template_directory_uri() .  '/js/jquery.counterup.min.js', 			array('jquery'), '1.0', true);
//	wp_register_script( 'parallax', 					get_template_directory_uri() .  '/js/parallax.min.js', 					array('jquery'), '1.0', true);

	// Google maps api & customization
	$nt_conversi_map_api_key 				= ot_get_option( 'nt_conversi_map_api_key' );
	$nt_conversi_map_api_key_out 			= ( $nt_conversi_map_api_key != '') ? '' .esc_html( $nt_conversi_map_api_key ).'' : '';
	wp_register_script( 'google-map-api', 	'https://maps.googleapis.com/maps/api/js?key='. $nt_conversi_map_api_key_out .'', '3.0.0', true);
	wp_register_script( 'gmaps', 						get_template_directory_uri() .  '/js/gmaps.js', 				array('jquery'), '1.0', true);

	// Settings plugin for one page shortcode
//	wp_register_script( 'nt-conversi-map-set', 			get_template_directory_uri() .  '/js/short/map-set.js', 		array('jquery'), '1.0', true);
//	wp_register_script( 'nt-conversi-slick-set', 		get_template_directory_uri() .  '/js/short/slick-set.js', 		array('jquery'), '1.0', true);
//	wp_register_script( 'nt-conversi-counterup-set', 	get_template_directory_uri() .  '/js/short/counterup-set.js', 	array('jquery'), '1.0', true);
//	wp_register_script( 'nt-conversi-fancybox-set', 	get_template_directory_uri() .  '/js/short/fancybox-set.js', 	array('jquery'), '1.0', true);
	//wp_enqueue_script( 'nt-conversi-script', 			get_template_directory_uri() .  '/js/main-script.js', 			array('jquery'), '1.0', true);

	// WP default scripts for theme
	//wp_enqueue_script('nt-conversi-custom-flexslider', 	get_template_directory_uri() .  '/js/flexslider/flexslider.js', array('jquery'), '1.0', true);
	//wp_enqueue_script('fitvids', 	 					get_template_directory_uri() .  '/js/blog/jquery.fitvids.js', 	array('jquery'), '1.0', true);
	//wp_enqueue_script('nt-conversi-blog-settings', 		get_template_directory_uri() .  '/js/blog/blog-settings.js', 	array('jquery'), '1.0', true);

	wp_enqueue_script('html5shiv', 						get_template_directory_uri() .  '/js/blog/html5shiv.js', 		array('jquery'), '3.7.2', false);
	wp_script_add_data('html5shiv', 					'conditional', 'lt IE 9' );
	wp_enqueue_script('respond', 						get_template_directory_uri()  .  '/js/blog/respond.min.js', 	array('jquery'), '1.4.2', false );
	wp_script_add_data('respond', 						'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'nt_conversi_scripts' );
function shapeSpace_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js#defer', array(), null, true);

}
function add_async_forscript($url)
{
	if (strpos($url, '#defer')===false)
		return $url;
	else if (is_admin())
		return str_replace('#defer', '', $url);
	else
		return str_replace('#defer', '', $url)."' defer='defer";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

function shivka_Subscribe_Save_AJAX( WP_REST_Request $request)
{
    return validate_pod_data('subscribers',$request);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'blog/v1', 'subscribe' , array(
        'methods' => 'post',
        'callback' => 'shivka_Subscribe_Save_AJAX',
    ) );
} );


function wp_corenavi() {
    global $wp_query;
    $pages = '';
    $max = 5;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '«'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '»'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="navigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

function shivka_Order_Save_AJAX( WP_REST_Request $request)
{
    return validate_pod_data('orders',$request);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'order/v1', 'save' , array(
        'methods' => 'post',
        'callback' => 'shivka_Order_Save_AJAX',
    ) );
} );

function shivka_SERVICESAjax()
{
    get_template_part('templates/services-block');
    exit;

}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_shivka_SERVICESAjax', 'shivka_SERVICESAjax');
add_action('wp_ajax_shivka_SERVICESAjax', 'shivka_SERVICESAjax');


function shivka_escapeParam($id){
    return addslashes_gpc($id);
}
function shivka_SetPodsSeo($postId, $isTaxonomy = false) {
    if (!empty($postId)) {
        if ($isTaxonomy) {
            if (($taxonomiesMeta = get_option('wpseo_taxonomy_meta')) && (!empty($taxonomiesMeta['industry'][$postId]))) {
                $seoTitle = $taxonomiesMeta['industry'][$postId]['wpseo_title'];
                $seoDesc = $taxonomiesMeta['industry'][$postId]['wpseo_desc'];
                $postUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $seoImage = $taxonomiesMeta['industry'][$postId]['wpseo_opengraph-image'];
            }
        } else {
            $seoTitle = get_post_meta($postId, '_yoast_wpseo_title', true);
            $seoDesc = get_post_meta($postId, '_yoast_wpseo_metadesc', true);
            $postUrl = get_post_permalink($postId);
            $seoImage = get_post_meta($postId, '_yoast_wpseo_opengraph-image', true);
        }
        if ($seoTitle) {
            add_filter('wpseo_opengraph_title', function () use ($seoTitle) {
                return $seoTitle;
            });
        }
        if ($seoDesc) {
            add_filter('wpseo_opengraph_desc', function () use ($seoDesc) {
                return $seoDesc;
            });
        }
        if ($postUrl) {
            add_filter('wpseo_opengraph_url', function () use ($postUrl) {
                return $postUrl;
            });
        }

        if ($seoImage) {
            add_action( 'wpseo_opengraph', function () use ($seoImage) {
                $GLOBALS['wpseo_og']->image($seoImage);
            }, 29 );
        }

    }
}



function validate_pod_data($pod_name,$data){
	if(isset($data['data'])){
		$request_data = array();
		foreach($data['data'] as $key=>$item){
			$request_data[$item['name']] = $item['value'];
		}
		$pod = pods( $pod_name);
		$fields = $pod->fields();
		$data = array();
		foreach($fields as $key=>$item){
			if(isset($request_data[$key]) && !empty($request_data[$key])){
				$param = shivka_escapeParam($request_data[$key]);
				if(trim($param) === "" || trim($param) === null){
					if((bool) $fields[$key]['options']['required']) {
						header("HTTP/1.0 " . $key . "  can't be empty");
						exit();
					}else{
						$param = "";
					}
				}
				$data[$key] = $param;
			}else if((bool) $fields[$key]['options']['required']){
				header("HTTP/1.0 ".$key." is required");
				exit();
			}
		}
		$data['post_title'] = date("Y/m/d");

		$new_id = $pod->add($data);

		return $new_id;

	}
	header("HTTP/1.0 No POST Data");
	exit();
}

add_action('admin_footer', function() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            //taxonomy
            var tx = ['business_solution','industry','technology','hr','vacancies_type'];
            var pods = {
				blog : {
					industry : 0,
					industry_max : 1
				},
				success_cases : {
					industry : 1,
					industry_max : 1
				},
				reference : {
					industry : 1,
					industry_max : 1
				},
				vacancies : {

				}
			};
            $('#publish').click(function(){
				$('.error').remove();
				var res = true;
				var min = 1;
				var max = 500;
				for (var key in pods) {
					if ($('body').hasClass('post-type-' + key)) {
						tx.forEach(function(element) {
							min = pods[key][element] >= 0 ? pods[key][element] : 1;
							max = pods[key][element+'_max'] ? pods[key][element+'_max'] : 500;
							var $scope = $('#' + element + '-all > ul');
							if(min != 0 && $scope.length &&  $scope.find('input:checked').length < min && $scope.find('input:checked').length <= max){
								$('<div class="error notice"> <p>You should choose '+element +'; Min '+min + ', max '+max+'</p></div>').insertAfter('.wp-header-end');
								res = false;
							}

						});
					}
				}
				return res;
            });
        });
    </script>
    <?php
});


function smarthoop_scripts() {
    //sticky-kit plugin
    wp_enqueue_script( 'sticky', 					get_template_directory_uri() . '/js/sticky-kit/sticky-kit.min.js', 				array('jquery'), '1.0', true);
    //bootstrap-multiselect plugin
    wp_enqueue_style( 'select2',						get_template_directory_uri() . '/js/bootstrap-multiselect/bootstrap-multiselect.css', 			false, '1.0');
    wp_enqueue_script( 'select2js', 					get_template_directory_uri() . '/js/bootstrap-multiselect/bootstrap-multiselect.js', 				array('jquery'), '1.0', true);
    // hwr fonts
//    wp_enqueue_style( 'hwr-fonts',						get_template_directory_uri() . '/css/fonts.css', 			false, '1.0');
    // hwr theme
//    wp_enqueue_style( 'hwr-theme',						get_template_directory_uri() . '/css/hwr-theme.css', 			false, '1.0');
    // hwr animation libs
//    wp_enqueue_script( 'gsap-tweenmax', 					get_template_directory_uri() .  '/js/greensock-js/src/minified/TweenMax.min.js', 				array('jquery'), '1.0', true);
//    wp_enqueue_script( 'scrollmagic', 					get_template_directory_uri() .  '/js/scrollmagic/scrollmagic/minified/ScrollMagic.min.js', 				array('jquery'), '1.0', true);
//    wp_enqueue_script( 'scrollmagic-gsap', 					get_template_directory_uri() .  '/js/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js', 				array('jquery'), '1.0', true);
//    wp_enqueue_script( 'scrollmagic-debug', 					get_template_directory_uri() .  '/js/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js', 				array('jquery'), '1.0', true);
    // hwr scripts
//    wp_enqueue_script( 'hwr-themejs', 					get_template_directory_uri() .  '/js/hwr-theme.js', 				array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'smarthoop_scripts' );
 

/*************************************************
## Admin style and scripts
*************************************************/

function nt_conversi_admin_style() {

	// Update CSS within in Admin
	wp_enqueue_style('nt-conversi-custom-admin', 		get_template_directory_uri().'/css/admin.css');
	wp_enqueue_script('nt-conversi-custom-admin', 		get_template_directory_uri() . '/js/blog/jquery.custom.admin.js');

}
add_action('admin_enqueue_scripts', 'nt_conversi_admin_style');

/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/

	// theme homepage visual composer shortcodes settings
	if(function_exists('vc_set_as_theme')) {
		require_once get_template_directory() . '/includes/visual-shortcodes.php';
	}

	// Metabox plugin check
	if ( ! function_exists( 'rwmb_meta' ) ) {
		function rwmb_meta( $key, $args = '', $post_id = null ) {
			return false;
		}
	}
	// Theme post and page meta plugin for customization and more features
	require_once get_template_directory() . '/includes/page-metaboxes.php';

	// Theme css setting file
	require_once get_template_directory() . '/includes/custom-style.php';

	// Theme navigation and pagination options
	require_once get_template_directory() . '/includes/template-tags.php';

	// Oneclick
	require_once get_template_directory() . '/includes/easy_installer/init.php';

	// image resizer
	require_once get_template_directory() . '/includes/aq_resizer.php';

	// Option tree controllers
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( ! is_plugin_active( 'option-tree/ot-loader.php' ) ) {

		function get_option_tree() {
			return false;
		}

		function ot_get_option() {
			return false;
		}

	}

	if ( is_plugin_active( 'option-tree/ot-loader.php' ) ) {

		// add filter for  options panel loader
		add_filter( 'ot_show_pages', 		'__return_false' );
		add_filter( 'ot_show_new_layout', 	'__return_false' );

		// Theme options admin panel setings file
		include_once get_template_directory() . '/includes/theme-options.php';

		// Theme customize css setting file
		require_once get_template_directory() . '/includes/custom-style.php';

	}

	/*************************************************
	## Custom body class
	*************************************************/
	function nt_conversi_body_classes( $classes ) {
		$nt_conversi_boxed = ot_get_option( 'nt_conversi_boxed' );
		if ( $nt_conversi_boxed == 'boxed' ){
			$classes[] = 'body-wrap';
		} else {
			$classes[] = '';
		}
		return $classes;
	}
	add_filter( 'body_class', 'nt_conversi_body_classes' );

/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function nt_conversi_theme_setup() {

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	add_editor_style ( 'custom-editor-style.css' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	// Theme customizer and tag support
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio'));
	// add_post_type_support( 'portfolio', 'post-formats' );
	add_image_size( 'nt_conversi_member_thumb', 650, 650, true);

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'nt-conversi', get_template_directory() . '/languages' );

	register_nav_menus( array(
		'primary' 			 => 	esc_html__( 'Primary Menu', 'nt-conversi' ),
	) );

}
add_action( 'after_setup_theme', 'nt_conversi_theme_setup' );


/*************************************************
## Widget columns
*************************************************/

function nt_conversi_widgets_init() {
	register_sidebar( array(
		'name' 			 => esc_html__( 'Main page', 'nt-conversi' ),
		'id' 			 => 'sidebar-1',
		'description'    => esc_html__( 'These are widgets for the Main page.','nt-conversi' ),
		'class'=> '',
		'before_widget'  => '',
		'after_widget'   => '',
		'before_title'   => '',
		'after_title'    => ''
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Success cases page', 'nt-conversi' ),
		'id' 			 => 'success-cases-page',
		'description'    => esc_html__( 'Success cases page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Success cases view page', 'nt-conversi' ),
		'id' 			 => 'success-cases-view-page',
		'description'    => esc_html__( 'Success cases view page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Success cases search page', 'nt-conversi' ),
		'id' 			 => 'success-cases-search-page',
		'description'    => esc_html__( 'Success cases search page','nt-conversi' ),
	) );


	register_sidebar( array(
		'name' 			 => esc_html__( 'Blog page', 'nt-conversi' ),
		'id' 			 => 'blog-page',
		'description'    => esc_html__( 'Blog page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Blog view page', 'nt-conversi' ),
		'id' 			 => 'blog-view-page',
		'description'    => esc_html__( 'Blog view page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Blog search page', 'nt-conversi' ),
		'id' 			 => 'blog-search-page',
		'description'    => esc_html__( 'Blog search page','nt-conversi' ),
	) );



	register_sidebar( array(
		'name' 			 => esc_html__( 'References page', 'nt-conversi' ),
		'id' 			 => 'references-page',
		'description'    => esc_html__( 'References page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'References view page', 'nt-conversi' ),
		'id' 			 => 'references-view-page',
		'description'    => esc_html__( 'References view page','nt-conversi' ),
	) );



	register_sidebar( array(
		'name' 			 => esc_html__( 'Services page', 'nt-conversi' ),
		'id' 			 => 'services-page',
		'description'    => esc_html__( 'Services page','nt-conversi' ),
	) );




	register_sidebar( array(
		'name' 			 => esc_html__( 'Events page', 'nt-conversi' ),
		'id' 			 => 'events-page',
		'description'    => esc_html__( 'Events page','nt-conversi' ),
	) );
	register_sidebar( array(
		'name' 			 => esc_html__( 'Events view page', 'nt-conversi' ),
		'id' 			 => 'events-view-page',
		'description'    => esc_html__( 'Events view page','nt-conversi' ),
	) );
}
add_action( 'widgets_init', 'nt_conversi_widgets_init' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nt_conversi_register_required_plugins' );

function nt_conversi_register_required_plugins() {

    $plugins = array(
		array(
            'name'          => esc_html__('Breadcrumb NavXT', "nt-conversi"),
            'slug'          => 'breadcrumb-navxt',
        ),
        array(
            'name'          => esc_html__('Contact Form 7', "nt-conversi"),
            'slug'          => 'contact-form-7',
        ),
        array(
            'name'          => esc_html__('Meta Box', "nt-conversi"),
            'slug'          => 'meta-box',
			'required'      => true,
        ),
		array(
            'name'          => esc_html__('Portfolio Post Type', "nt-conversi"),
            'slug'          => 'portfolio-post-type',
        ),
		array(
            'name'          => esc_html__('Option Tree', "nt-conversi"),
            'slug'          => 'option-tree',
			'required'      => true,
        ),
		array(
            'name'         => esc_html__('Metabox Show/Hide', "nt-conversi"),
            'slug'         => 'meta-box-show-hide',
			'source'       	=> get_template_directory() . '/plugins/meta-box-show-hide.zip',
            'required'     => true,
        ),
		array(
			'name'		   	=> esc_html__('Envato Auto Update Theme', "nt-conversi"),
			'slug'		   	=> 'envato-market-update-theme',
			'source'       	=> get_template_directory() . '/plugins/envato-market-update-theme.zip',
			'required'	   	=> true,
		),
		array(
			'name'         	=> esc_html__('Visual Composer', "nt-conversi"),
			'slug'         	=> 'visual_composer',
			'source'        => get_template_directory() . '/plugins/visual_composer.zip',
			'required'     	=> true,
		),
		array(
			'name'         	=> esc_html__('Revolution Slider', "nt-conversi"),
			'slug'         	=> 'revolution_slider',
			'source'        => get_template_directory() . '/plugins/revolution_slider.zip',
			'required'     	=> false,
		),
		array(
            'name'          => esc_html__('Price Table', 'nt-conversi'),
            'slug'          => 'price-table-type',
			'source'        => get_template_directory() . '/plugins/price-table-type.zip',
            'required'      => false,
        ),
		array(
            'name'          => esc_html__('NT Conversi Shortcodes', "nt-conversi"),
            'slug'          => 'nt-conversi-shortcodes',
            'source'        => get_template_directory() . '/plugins/nt-conversi-shortcodes.zip',
            'required'      => true,
            'version'       => '1.1.4',
        ),
    );

	$config = array(
		'id'           	    => 'tgmpa',
		'default_path' 	    => '',
		'menu'         	    => 'tgmpa-install-plugins',
		'has_notices'  	    => true,
		'dismissable'  	    => true,
		'dismiss_msg'  	    => '',
		'is_automatic' 	    => true,
		'message'      	    => '',
	);

	tgmpa( $plugins, $config );
}



/*************************************************
## Register Menu
*************************************************/

class Nt_Conversi_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header item-has-children">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= 'sub item-has-children';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= $item->url;
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr  => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 **/
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 **/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 **/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">'. esc_html_e( 'Add a menu','nt-conversi' ) .'</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo ($fb_output);
		}
	}
}

/*************************************************
## nt_conversi Comment
*************************************************/

	if ( ! function_exists( 'nt_conversi_comment' ) ) :
	function nt_conversi_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
	?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'nt-conversi' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'nt-conversi' ), ' ' ); ?></p>
	<?php
	break;
	default :
	?>
        <div class="comments">
            <ul>
				<li class="comment">
					<span class="who">
						<?php echo get_avatar( $comment, 80 ); ?>
					</span>
					<div class="who-comment">
					<p class="name"><?php comment_author(); ?></p>
					<?php comment_text(); ?>
                    <?php edit_comment_link( esc_html__( 'Edit', 'nt-conversi' ), ' ' ); ?>
                    <?php comment_reply_link( array_merge( $args, array( 'depth'  => $depth, 'max_depth'  => $args['max_depth'] ) ) ); ?>
                    <span class="meta-data"><time class="comment-date" pubdate datetime="<?php comment_time( 'c' ); ?>"><?php comment_date(); ?> <?php esc_html_e( 'at', 'nt-conversi' ); ?> <?php comment_time(); ?></time></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'nt-conversi' ); ?></em>
					<?php endif; ?>
					</div>
				</li>
            </ul>
		</div>
	<?php
	break;
	endswitch;
	}
	endif;
