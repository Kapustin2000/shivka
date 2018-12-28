<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->

<head>
	<!-- Meta UTF8 charset -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

	<!-- BODY START=========== -->
	<body <?php body_class(); ?>>

	<?php if ( ot_get_option('nt_conversi_pre') != 'off' ) : ?>

		<?php

			$nt_conversi_tag_attribs = array(
				'id' 	=> array(),
				'class' => array(),
				'title' => array(),
				'style' => array(),
			);
			$nt_conversi_preloader_allowed_tags = array(
			'div' 	=> $nt_conversi_tag_attribs,
			'h1' 	=> $nt_conversi_tag_attribs,
			'h2' 	=> $nt_conversi_tag_attribs,
			'h3' 	=> $nt_conversi_tag_attribs,
			'h4' 	=> $nt_conversi_tag_attribs,
			'h5' 	=> $nt_conversi_tag_attribs,
			'h6' 	=> $nt_conversi_tag_attribs,
			'p' 	=> $nt_conversi_tag_attribs,
			'span' 	=> $nt_conversi_tag_attribs,
			'i' 	=> $nt_conversi_tag_attribs,
			'hr' 	=> $nt_conversi_tag_attribs,
			'img' 	=> array_merge( $nt_conversi_tag_attribs, array(
					'src' 	 => array(),
					'alt' 	 => array(),
				) ),
			);

		?>

		<?php // CUSTOM PRELOADER ?>
		<?php if ( ot_get_option( 'nt_conversi_preloader' ) == 'custom' ) : ?>

			<?php if ( ot_get_option( 'nt_conversi_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_conversi_custom_preloader' ) !='' ) : ?>
				<div class="nt-conversi-custom-preloader">
			<?php endif; ?>

					<?php echo wp_kses( ot_get_option( 'nt_conversi_custom_preloader' ), $nt_conversi_preloader_allowed_tags ); ?>

			<?php if ( ot_get_option( 'nt_conversi_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_conversi_custom_preloader' ) !='' ) : ?>
				</div>
			<?php endif; ?>

		<?php // END CUSTOM PRELOADER ?>

		<?php else : ?>

			<?php // DEFAULT PRELOADER ?>
			<div class="preloader-container">
				<div class="la-ball-triangle-path la-2x">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			
	<?php endif; ?>

	<?php endif; ?>
