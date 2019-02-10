<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Interior Designs
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-interior-designs' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-interior-designs'); ?></a></div>

<div class="home-page-header">
	<?php get_template_part('template-parts/header/topbar'); ?>
	<div class="home-header">
		<?php get_template_part('template-parts/header/navigation'); ?>
	</div>
</div>