<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_set_as_theme( $disable_updater = false ); 
vc_is_updater_disabled();


function nt_conversi_vc_remove_woocommerce() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        vc_remove_element( 'woocommerce_cart' );
        vc_remove_element( 'woocommerce_checkout' );
        vc_remove_element( 'woocommerce_order_tracking' );
        vc_remove_element( 'woocommerce_my_account' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
        vc_remove_element( 'related_products' );
    }
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'nt_conversi_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'nt_conversi_vc_remove_woocommerce', 11 );

vc_remove_element(  "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_flickr" );
vc_remove_element(  "vc_facebook" );
vc_remove_element(  "vc_tweetmeme" );
vc_remove_element(  "vc_googleplus" );
vc_remove_element(  "vc_pinterest" );

//FOR ROW EXTRA ATTR
$nt_conversi_background_one_attributes = array(

	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background position Y-X axis', 'nt-conversi' ),
		'param_name'  	=> 'nt_conversi_bg_position',
		'description' 	=> esc_html__('Change position Y-X axis for bg image.', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
		'value'       	=> array(
			esc_html__('Select Y-X position', 	'nt-conversi' )	=> '',
			esc_html__('Left-Top', 		'nt-conversi' )	=> 'left top',
			esc_html__('Left-Center', 	'nt-conversi' )	=> 'left center',
			esc_html__('Left-Bottom', 	'nt-conversi' )	=> 'left bottom',
			esc_html__('Right-Top', 	'nt-conversi' )	=> 'right top',
			esc_html__('Right-Center', 	'nt-conversi' )	=> 'right center',
			esc_html__('Right-Bottom', 	'nt-conversi' )	=> 'right bottom',
			esc_html__('Center-Top', 	'nt-conversi' )	=> 'center top',
			esc_html__('Center-Center', 'nt-conversi' )	=> 'center center',
			esc_html__('Center-Bottom', 'nt-conversi' )	=> 'center bottom',
			esc_html__('Custom', 		'nt-conversi' )	=> 'custom',
		),
	),

	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position Y axis', 'nt-conversi'),
		'param_name' 	=> 'nt_conversi_bg_positiony',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
		'dependency' 	=> array(
						'element' 	=> 'nt_conversi_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis', 'nt-conversi'),
		'param_name' 	=> 'nt_conversi_bg_positionx',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
		'dependency' 	=> array(
						'element' 	=> 'nt_conversi_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis offset', 'nt-conversi'),
		'param_name' 	=> 'nt_conversi_bg_xoffset',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: 40px or 25% ...etc', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
		'dependency' 	=> array(
						'element' 	=> 'nt_conversi_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background size', 'nt-conversi'),
		'param_name' 	=> 'nt_conversi_bg_size',
		'description' 	=> esc_html__('Change size for bg image.example: 100px or 100% or 100vh', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 992px )', 'nt-conversi' ),
		'param_name'  	=> 'nt_conversi_bg_ontablet',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option to hide the row background image below 992px', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 768px )', 'nt-conversi' ),
		'param_name'  	=> 'nt_conversi_bg_onmobile',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option to hide the row background image below 768px', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
	),
	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Background image display ( 480px )', 'nt-conversi' ),
		'param_name'  	=> 'nt_conversi_bg_onphone',
		'value'       	=> array(
			'Hide background image'=>'hide',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option to hide the row background image below 480px', 'nt-conversi'),
		'group' 		=> esc_html__('Design Options','nt-conversi'),
	),
);
vc_add_params( 'vc_row', $nt_conversi_background_one_attributes );


//FOR ROW 480 RESOLUTION
$nt_conversi_vc_row_responsive_attributes = array(

	array(
		'type'        	=> 'checkbox',
		'heading'     	=> esc_html__('Add container ?', 'nt-conversi'),
		'param_name'  	=> 'nt_conversi_container_display',
		'weight' 	  	=> 1,
		'value'       	=> array(
			'Add container'=>'true',
			), //value
		'std'         	=> '',
		'description' 	=> esc_html__('This option is only for Row stretch : Default and Row stretch : Stretch row.', 'nt-conversi')
	),

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_row_992_responsive',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_row_768_responsive',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_row_480_responsive',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),

);
vc_add_params( 'vc_row', $nt_conversi_vc_row_responsive_attributes );


//FOR ROW EXTRA 3 OVERLAY ATTR
$nt_conversi_row_overlay_attributes = array(

	//OVERLAY 1
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_html__('Overlay Color', 'nt-conversi'),
		'param_name'	=> 'overlaybg',
		'description'	=> esc_html__('Add color.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Width', 'nt-conversi'),
		'param_name'	=> 'overlaywidth',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Height', 'nt-conversi'),
		'param_name'	=> 'overlayheight',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Top offset', 'nt-conversi'),
		'param_name'	=> 'overlaytop',
		'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Left offset', 'nt-conversi'),
		'param_name'	=> 'overlayleft',
		'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Right offset', 'nt-conversi'),
		'param_name'	=> 'overlayright',
		'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Bottom offset', 'nt-conversi'),
		'param_name'	=> 'overlaybottom',
		'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 1','nt-conversi'),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 992px', 'nt-conversi' ),
		'param_name'	=> 'overlay992',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 992px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 1', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 768px', 'nt-conversi' ),
		'param_name'	=> 'overlay768',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 768px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 1', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 480px', 'nt-conversi' ),
		'param_name'	=> 'overlay480',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 480px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 1', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
	//OVERLAY 2 
	array(
		'type'			=> 'colorpicker',
		'heading'		=> esc_html__('Overlay Color', 'nt-conversi'),
		'param_name'	=> 'overlaybg2',
		'description'	=> esc_html__('Add color.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Width', 'nt-conversi'),
		'param_name'	=> 'overlaywidth2',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Height', 'nt-conversi'),
		'param_name'	=> 'overlayheight2',
		'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Top offset', 'nt-conversi'),
		'param_name'	=> 'overlaytop2',
		'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Left offset', 'nt-conversi'),
		'param_name'	=> 'overlayleft2',
		'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Right offset', 'nt-conversi'),
		'param_name'	=> 'overlayright2',
		'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_html__('Bottom offset', 'nt-conversi'),
		'param_name'	=> 'overlaybottom2',
		'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'nt-conversi'),
		'group' 		=> esc_html__('Overlay 2','nt-conversi'),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 992px', 'nt-conversi' ),
		'param_name'	=> 'overlay2_992',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 992px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 2', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 768px', 'nt-conversi' ),
		'param_name'	=> 'overlay2_768',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 768px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 2', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
	array(
		'type'			=> 'dropdown',
		'heading'		=> esc_html__('Display under 480px', 'nt-conversi' ),
		'param_name'	=> 'overlay2_480',
		'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 480px', 'nt-conversi' ),
		'group' 	  	=> esc_html__('Overlay 2', 'nt-conversi' ),
		'value'			=> array(
			esc_html__('Select position', 'nt-conversi' )	=> '',
			esc_html__('Show', 	'nt-conversi' )	=> 'show',
			esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
		),
	),
);
vc_add_params( 'vc_row', $nt_conversi_row_overlay_attributes );

//FOR COLUMN
$nt_conversi_vc_column_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_column_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_column_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_column_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),

);
vc_add_params( 'vc_column', $nt_conversi_vc_column_responsive_attributes );

//FOR COLUMN INNER
$nt_conversi_vc_column_inner_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_colinner_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_colinner_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-conversi' ),
		'param_name' 	=> 'nt_conversi_vc_colinner_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-conversi' ),
		'group' 		=> esc_html__('Responsive Extra','nt-conversi'),
	),
	
);
vc_add_params( 'vc_column_inner', $nt_conversi_vc_column_inner_responsive_attributes );



/*-----------------------------------------------------------------------------------*/
/*	HERO 1 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero1_integrateWithVC' );
function NT_Conversi_hero1_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form 1", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_hero1",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG Parallax image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your BG Parallax image", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('BG color', 'nt-conversi' ),
				'param_name'    => 'secbgcolor',
				'description'   => esc_html__("Select color for background", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg image', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_subtitle',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//Form heading
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form heading', 'nt-conversi' ),
				'param_name'    => 'f_heading',
				'description'   => esc_html__("Add heading for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form description', 'nt-conversi' ),
				'param_name'    => 'f_desc',
				'description'   => esc_html__("Add description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			//Hero features loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features item', 'nt-conversi' ),
				'param_name'  	=> 'h1loop',
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Icon", "nt-conversi"),
						"param_name" 	  => "i_icon",
						"description" 	  => esc_html__("Add icon name for hero list item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Title", "nt-conversi"),
						"param_name" 	  => "i_title",
						"description" 	  => esc_html__("Add title for hero list item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for hero list item.", "nt-conversi"),
					)
				)
			)
		)
   ));
} class NT_Conversi_section_hero1 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO 2 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero2_integrateWithVC' );
function NT_Conversi_hero2_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form 2", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_hero2",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG Parallax image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your BG Parallax image", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('BG color', 'nt-conversi' ),
				'param_name'    => 'secbgcolor',
				'description'   => esc_html__("Select color for background", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg image', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Video URL', 'nt-conversi' ),
				'param_name'    => 'v_url',
				'description'   => esc_html__("Add youtube video url. example: https://www.youtube.com/embed/4ZawV1mXlS8?autoplay=1", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			//Form features loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features item', 'nt-conversi' ),
				'param_name'  	=> 'h2loop',
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Icon", "nt-conversi"),
						"param_name" 	  => "i_icon",
						"description" 	  => esc_html__("Add icon name for hero list item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for hero list item.", "nt-conversi"),
					)
				)
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_hero2 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO 3 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero3_integrateWithVC' );
function NT_Conversi_hero3_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form 3", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_hero3",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG Parallax image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your BG Parallax image", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('BG color', 'nt-conversi' ),
				'param_name'    => 'secbgcolor',
				'description'   => esc_html__("Select color for background", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg image', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Video background image", "nt-conversi"),
				"param_name"  	=> "vbg_img",
				"description" 	=> esc_html__("Add video background  image", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Video URL', 'nt-conversi' ),
				'param_name'    => 'v_url',
				'description'   => esc_html__("Add youtube video url. example: https://www.youtube.com/embed/4ZawV1mXlS8?autoplay=1", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			//Form features loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features item', 'nt-conversi' ),
				'param_name'  	=> 'h3loop',
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Icon", "nt-conversi"),
						"param_name" 	  => "i_icon",
						"description" 	  => esc_html__("Add icon name for hero list item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for hero list item.", "nt-conversi"),
					)
				)
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_hero3 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO 4 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero4_integrateWithVC' );
function NT_Conversi_hero4_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form 4", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_hero4",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG Parallax image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your BG Parallax image", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('BG color', 'nt-conversi' ),
				'param_name'    => 'secbgcolor',
				'description'   => esc_html__("Select color for background", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg image', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Video URL', 'nt-conversi' ),
				'param_name'    => 'v_url',
				'description'   => esc_html__("Add youtube video url. example: https://www.youtube.com/embed/4ZawV1mXlS8?autoplay=1", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			//Form 4
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form heading', 'nt-conversi' ),
				'param_name'    => 'f_heading',
				'description'   => esc_html__("Add heading for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_hero4 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO 5 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero5_integrateWithVC' );
function NT_Conversi_hero5_integrateWithVC() {
   vc_map( array(
		"name" 	   	=> esc_html__( "Hero Form 5", "nt-conversi" ),
		"base" 	   	=> "nt_conversi_section_hero5",
		"category"  => esc_html__( "NT Conversi", "nt-conversi"),
		"params"    => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_subtitle',
				'description'   => esc_html__("Add subtitle for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button 1(Link)', 'nt-conversi' ),
				'param_name'    => 'btnlink1',
				'group'       	=> esc_html__('Heading', 'nt-conversi'),
				'description'   => esc_html__('Add custom button title and link', 'nt-conversi' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button 1(Link)', 'nt-conversi' ),
				'param_name'    => 'btnlink2',
				'group'       	=> esc_html__('Heading', 'nt-conversi'),
				'description'   => esc_html__('Add custom button title and link', 'nt-conversi' ),
			),
			//Form features loop
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form heading', 'nt-conversi' ),
				'param_name'    => 'f_heading',
				'description'   => esc_html__("Add heading for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form description', 'nt-conversi' ),
				'param_name'    => 'f_desc',
				'description'   => esc_html__("Add description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			//Background CSS
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			),
		)
   ));
} class NT_Conversi_section_hero5 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO 6 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_hero6_integrateWithVC' );
function NT_Conversi_hero6_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form 6", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_hero6",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Top menu display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'm_display',
				'description' 	=> esc_html__('You can select hide or show top header static menu', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG Parallax image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your BG Parallax image", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'secbgcolor',
				'description'   => esc_html__("Select color for overlay bg image", "nt-conversi"),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle/slogan', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Video background image", "nt-conversi"),
				"param_name"  	=> "vbg_img",
				"description" 	=> esc_html__("Add video background  image", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Video URL', 'nt-conversi' ),
				'param_name'    => 'v_url',
				'description'   => esc_html__("Add youtube video url. example: https://www.youtube.com/embed/4ZawV1mXlS8?autoplay=1", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
			),
			//Form
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form heading', 'nt-conversi' ),
				'param_name'    => 'f_heading',
				'description'   => esc_html__("Add heading for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form description', 'nt-conversi' ),
				'param_name'    => 'f_desc',
				'description'   => esc_html__("Add description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Contact form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact 7 form shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form bottom description', 'nt-conversi' ),
				'param_name'    => 'fb_desc',
				'description'   => esc_html__("Add bottom description for form", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Form BG color', 'nt-conversi' ),
				'param_name'    => 'bg_color',
				'description'   => esc_html__("Select color for Form background", "nt-conversi"),
				'group' 	  	=> esc_html__('Form', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_hero6 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES 1 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_features1_integrateWithVC' );
function NT_Conversi_features1_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Features Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_features1",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//Features 1 item column
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Item column size', 'nt-conversi' ),
				'param_name'  	=> 'i_col',
				'description' 	=> esc_html__('You can select detail item column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select column for all item', 	'nt-conversi' )	=> '',
					esc_html__('1 Column', 	'nt-conversi' )	=> 'col-md-4 col-sm-12 col-xs-12',
					esc_html__('2 Column', 	'nt-conversi' )	=> 'col-md-6 col-sm-6 col-xs-12',
					esc_html__('3 Column', 	'nt-conversi' )	=> 'col-md-4 col-sm-6 col-xs-12',
					esc_html__('4 Column', 	'nt-conversi' )	=> 'col-md-3 col-sm-6 col-xs-12',
					esc_html__('6 Column', 	'nt-conversi' )	=> 'col-md-2 col-sm-6 col-xs-12',
					esc_html__('Custom Column', 'nt-conversi' )	=> 'custom',
				),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Desktop device column', 'nt-conversi' ),
				'param_name'  	=> 'lg_col',
				'description' 	=> esc_html__('You can select desktop column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select desktop column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-lg-1', 	'nt-conversi' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-conversi' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-conversi' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-conversi' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-conversi' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-conversi' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-conversi' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-conversi' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-conversi' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-conversi' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-conversi' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-conversi' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Desktop device column', 'nt-conversi' ),
				'param_name'  	=> 'md_col',
				'description' 	=> esc_html__('You can select desktop column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select desktop column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-md-1', 	'nt-conversi' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-conversi' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-conversi' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-conversi' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-conversi' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-conversi' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-conversi' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-conversi' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-conversi' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-conversi' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-conversi' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-conversi' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Tablet device column', 'nt-conversi' ),
				'param_name'  	=> 'sm_col',
				'description' 	=> esc_html__('You can select tablet device column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select tablet column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-sm-1', 	'nt-conversi' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-conversi' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-conversi' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-conversi' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-conversi' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-conversi' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-conversi' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-conversi' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-conversi' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-conversi' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-conversi' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-conversi' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Phone device column', 'nt-conversi' ),
				'param_name'  	=> 'xs_col',
				'description' 	=> esc_html__('You can select phone device column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select phone column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-xs-1', 	'nt-conversi' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-conversi' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-conversi' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-conversi' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-conversi' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-conversi' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-conversi' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-conversi' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-conversi' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-conversi' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-conversi' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-conversi' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			//Features 1 loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features item', 'nt-conversi' ),
				'param_name'  	=> 'f1loop',
				'group' 	  	=> esc_html__('Features', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 		  	=> "attach_image",
						"heading" 	  	=> esc_html__("Item image", "nt-conversi"),
						"param_name"  	=> "i_img",
						"description" 	=> esc_html__("Add your features image", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Title", "nt-conversi"),
						"param_name" 	  => "i_title",
						"description" 	  => esc_html__("Add title for item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for item.", "nt-conversi"),
					),
				)
			),
			//Background CSS
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			),
		),
   ));
} class NT_Conversi_section_features1 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES 2 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_features2_integrateWithVC' );
function NT_Conversi_features2_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Features 2 Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_features2",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			//Left image
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Left image", "nt-conversi"),
				"param_name"  	=> "l_img",
				"description" 	=> esc_html__("Add your features left image", "nt-conversi"),
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle', 'nt-conversi' ),
				'param_name'    => 's_subtitle',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//Features 1 loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features list item', 'nt-conversi' ),
				'param_name'  	=> 'f2loop',
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for item.", "nt-conversi"),
					),
				)
			),
			//Background CSS
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			),
		),
   ));
} class NT_Conversi_section_features2 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES 3 conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_features3_integrateWithVC' );
function NT_Conversi_features3_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Features 3 Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_features3",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			//Section ID for scroll menu
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle', 'nt-conversi' ),
				'param_name'    => 's_subtitle',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//Features 1 loop
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Features list item', 'nt-conversi' ),
				'param_name'  	=> 'f3loop',
				'group' 	  	=> esc_html__('Left section', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Title", "nt-conversi"),
						"param_name" 	  => "i_title",
						"description" 	  => esc_html__("Add title for item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Detail", "nt-conversi"),
						"param_name" 	  => "i_desc",
						"description" 	  => esc_html__("Add detail for item.", "nt-conversi"),
					),
				)
			),
			//Right image
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Right image", "nt-conversi"),
				"param_name"  	=> "r_img",
				"description" 	=> esc_html__("Add your features left image", "nt-conversi"),
				'group' 	  	=> esc_html__('Right section', 'nt-conversi' ),
			),
			//Background CSS
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_features3 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_testimonial_integrateWithVC' );
function NT_Conversi_testimonial_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Testimonial Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_testimonial",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			//TESTIMONIAL LOOP
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Testimonial items', 'nt-conversi' ),
				'param_name'  	=> 't_loop',
				'group' 	  	=> esc_html__('Testimonial', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 		  	=> "attach_image",
						"heading" 	  	=> esc_html__("Testimonial image", "nt-conversi"),
						"param_name"  	=> "t_img",
						"description" 	=> esc_html__("Add your client image", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Testimonial name", "nt-conversi"),
						"param_name" 	  => "t_name",
						"description" 	  => esc_html__("Add your testimonial name", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Testimonial job", "nt-conversi"),
						"param_name" 	  => "t_job",
						"description" 	  => esc_html__("Add your testimonial job or detail", "nt-conversi"),
					),
					array(
						"type" 			  => "textarea",
						"heading" 		  => esc_html__("Testimonial quote", "nt-conversi"),
						"param_name" 	  => "t_quote",
						"description" 	  => esc_html__("Add your testimonial quote text", "nt-conversi"),
					)
				)
			),
			//BACKGROUND CSS
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_testimonial extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	COUNTER conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_counter_integrateWithVC' );
function NT_Conversi_counter_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Counterup Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_counter",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your bg image", "nt-conversi"),
			),
			//counter loop
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Item column size', 'nt-conversi' ),
				'param_name'  	=> 'i_col',
				'description' 	=> esc_html__('You can select item column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select column for all item', 	'nt-conversi' )	=> '',
					esc_html__('1 Column', 	'nt-conversi' )	=> 'col-sm-12 col-xs-12',
					esc_html__('2 Column', 	'nt-conversi' )	=> 'col-sm-6 col-xs-12',
					esc_html__('3 Column', 	'nt-conversi' )	=> 'col-sm-4 col-xs-12',
					esc_html__('4 Column', 	'nt-conversi' )	=> 'col-sm-3 col-xs-12',
					esc_html__('6 Column', 	'nt-conversi' )	=> 'col-sm-2 col-xs-12',
					esc_html__('Custom Column', 'nt-conversi' )	=> 'custom',
				),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Large device', 'nt-conversi' ),
				'param_name'  	=> 'lg_col',
				'description' 	=> esc_html__('You can select large device column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select desktop column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-lg-1', 	'nt-conversi' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-conversi' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-conversi' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-conversi' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-conversi' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-conversi' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-conversi' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-conversi' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-conversi' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-conversi' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-conversi' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-conversi' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Desktop device', 'nt-conversi' ),
				'param_name'  	=> 'md_col',
				'description' 	=> esc_html__('You can select desktop column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select desktop column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-md-1', 	'nt-conversi' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-conversi' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-conversi' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-conversi' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-conversi' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-conversi' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-conversi' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-conversi' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-conversi' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-conversi' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-conversi' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-conversi' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Tablet device', 'nt-conversi' ),
				'param_name'  	=> 'sm_col',
				'description' 	=> esc_html__('You can select tablet device column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select mobile column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-sm-1', 	'nt-conversi' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-conversi' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-conversi' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-conversi' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-conversi' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-conversi' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-conversi' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-conversi' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-conversi' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-conversi' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-conversi' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-conversi' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Phone device', 'nt-conversi' ),
				'param_name'  	=> 'xs_col',
				'description' 	=> esc_html__('You can select phone device column size', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Select mobile column for all item', 	'nt-conversi' )	=> '',
					esc_html__('col-xs-1', 	'nt-conversi' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-conversi' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-conversi' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-conversi' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-conversi' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-conversi' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-conversi' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-conversi' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-conversi' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-conversi' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-conversi' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-conversi' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'i_col',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        	=> 'param_group',
				'heading'     	=> esc_html__('Counterup items', 'nt-conversi' ),
				'param_name'  	=> 'c_loop',
				'group' 	  	=> esc_html__('Counterup', 'nt-conversi' ),			
				'params' 	  	=> array(
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Fonticon name", "nt-conversi"),
						"param_name" 	  => "i_icon",
						"description" 	  => esc_html__("Add icon name(fonticon class name). example : icon-layers", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Number", "nt-conversi"),
						"param_name" 	  => "i_number",
						"description" 	  => esc_html__("Add number for item.", "nt-conversi"),
					),
					array(
						"type" 			  => "textfield",
						"heading" 		  => esc_html__("Title", "nt-conversi"),
						"param_name" 	  => "i_title",
						"description" 	  => esc_html__("Add title for item.", "nt-conversi"),
					)
				)
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg image', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Background options', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			)
		)
   ));
} class NT_Conversi_section_counter extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	PRICING conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_section_pricing_integrateWithVC' );
function NT_Conversi_section_pricing_integrateWithVC() {
   vc_map( array(
      "name"     => esc_html__("Pricing ( Plugin )", "nt-conversi"),
      "base"     => "nt_conversi_section_pricing",
	  "icon"     => "icon-wpb-row",
	  "category" => esc_html__("NT Conversi", "nt-conversi"),
      "params"   => array(
			 array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Section ID', 'nt-conversi'),
				'param_name'  	=> 's_id',
				'description' 	=> esc_html__('Add your Section ID for scroll', 'nt-conversi'),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//post options
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-conversi' ),
				'param_name'    => 'btnlink',
				'group'       	=> esc_html__('Post Options', 'nt-conversi'),
				'description'   => esc_html__('Add custom button title and link for pricing pack', 'nt-conversi' ),
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Price Table Count', 'nt-conversi' ),
				'param_name'  	=> 'p_number',
				'group'       	=> esc_html__('Post Options', 'nt-conversi'),
				'description' 	=> esc_html__('You can control with number your price tables.Please enter a number', 'nt-conversi'),
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Order', 'nt-conversi' ),
				'param_name'  	=> 'order',
				'group'       	=> esc_html__('Post Options', 'nt-conversi'),
				'description' 	=> esc_html__('Enter Price table order. DESC or ASC', 'nt-conversi'),
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Orderby', 'nt-conversi' ),
				'param_name'  	=> 'orderby',
				'group'       	=> esc_html__('Post Options', 'nt-conversi'),
				'description' 	=> esc_html__('Enter Price table orderby. Default is : date', 'nt-conversi'),
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Category', 'nt-conversi' ),
				'param_name'  	=> 'p_cat',
				'group'       	=> esc_html__('Post Options', 'nt-conversi'),
				'description' 	=> esc_html__('Enter Price table category or write all', 'nt-conversi'),
			),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-conversi' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-conversi' ),
			)
		),
   ));
}
class NT_Conversi_section_pricing extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	MAP  meder
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_map_integrateWithVC' );
function NT_Conversi_map_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Custom Map", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_map",
		"category" => esc_html__( "NT Conversi", "nt-conversi"),
		"params"   => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Coordinate 1 ( lat ) Required!', 'nt-conversi' ),
				'param_name'    => 'lat',
				'description'   => esc_html__("Add your location coordinate 1 ( lat ). example:-12.042", "nt-conversi"),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Coordinate 2 ( lng ) Required!', 'nt-conversi' ),
				'param_name'    => 'lng',
				'description'   => esc_html__("Add your location coordinate 2 ( lng ). example:-77.028333", "nt-conversi"),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Zoom', 'nt-conversi' ),
				'param_name'    => 'zoom',
				'description'   => esc_html__("Default value : 8", "nt-conversi"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Over title', 'nt-conversi' ),
				'param_name'    => 'over_title',
				'description'   => esc_html__("Add your title for over map", "nt-conversi"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Map over description', 'nt-conversi' ),
				'param_name'    => 'over_desc',
				'description'   => esc_html__("Add your description for over map", "nt-conversi"),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Map overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color for overlay", "nt-conversi"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('marker title', 'nt-conversi' ),
				'param_name'    => 'marker_title',
				'description'   => esc_html__("Add your title for marker icon. example: Your Company Name", "nt-conversi"),
			)
		)
   ));
} class NT_Conversi_section_map extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE  conversi
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Conversi_subscribe_integrateWithVC' );
function NT_Conversi_subscribe_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Subscribe Section", "nt-conversi" ),
		"base" 	   => "nt_conversi_section_subscribe",
		"category"   => esc_html__( "NT Conversi", "nt-conversi"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-conversi' ),
				'param_name'    => 's_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-conversi"),
			),
			//Section heading
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Heading display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'h_display',
				'description' 	=> esc_html__('You can select hide or show section heading all text', 'nt-conversi' ),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-conversi' ),
				'param_name'    => 's_heading',
				'description'   => esc_html__("Add heading for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-conversi' ),
				'param_name'    => 's_desc',
				'description'   => esc_html__("Add description for this section", "nt-conversi"),
				'group' 	  	=> esc_html__('Heading', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'h_display',
						'value'   	=> 'show'
					)
			),
			//BG image
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG image", "nt-conversi"),
				"param_name"  	=> "bg_img",
				"description" 	=> esc_html__("Add your bg image", "nt-conversi"),
				'group' 	  	=> esc_html__('BG Image', 'nt-conversi' ),
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__('Overlay color display ( hide or show )', 'nt-conversi' ),
				'param_name'  	=> 'o_display',
				'description' 	=> esc_html__('You can select hide or show overlay color on bg parallax image', 'nt-conversi' ),
				'group' 	  	=> esc_html__('BG Image', 'nt-conversi' ),
				'value'       	=> array(
					esc_html__('Show', 	'nt-conversi' )	=> 'show',
					esc_html__('Hide', 	'nt-conversi' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-conversi' ),
				'param_name'    => 'o_color',
				'description'   => esc_html__("Select color", "nt-conversi"),
				'group' 	  	=> esc_html__('BG Image', 'nt-conversi' ),
				'dependency' 	=> array(
						'element' 	=> 'o_display',
						'value'   	=> 'show'
					)				
			),
			//Subscribe Form
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Subscribe Form shortcode', 'nt-conversi' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact form 7 shortcode here", "nt-conversi"),
				'group' 	  	=> esc_html__('Subscribe Form', 'nt-conversi' ),	
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Form description', 'nt-conversi' ),
				'param_name'    => 'form_desc',
				'description'   => esc_html__("Add description for subscribe form", "nt-conversi"),
				'group' 	  	=> esc_html__('Subscribe Form', 'nt-conversi' ),
			)
		),
   ));
} class NT_Conversi_section_subscribe extends WPBakeryShortCode {}

// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'nt_conversi_custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function nt_conversi_custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if (  $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'container bootstrap', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}