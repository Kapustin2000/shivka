<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/libs/bootstrap/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/slick.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/styles.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar">
                    <a class="navbar-brand" href="/">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/smarthoop_logo_3@2x.png" alt="Smarthoop Logo">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/services">услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/works">наши работы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/shop">магазин</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts">контакты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">о нас</a>
                        </li>
                    </ul>
                    <button class="btn btn-outline" type="button">
                        написать нам
                    </button>
                    <button id="navbar-toggler" class="navbar-toggler" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="menu-toggle" class="menu-toggle">
<!--                        <nav>-->
<!--                            <a href="#">услуги</a>-->
<!--                            <a href="#">наши работы</a>-->
<!--                            <a href="#">магазин</a>-->
<!--                            <a href="#">контакты</a>-->
<!--                            <a href="#">о нас</a>-->
<!--                        </nav>-->
<!--                        <button class="btn btn-outline" type="button">-->
<!--                            написать нам-->
<!--                        </button>-->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>