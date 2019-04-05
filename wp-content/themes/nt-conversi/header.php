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
    <link href="<?php bloginfo('template_url'); ?>/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/libs/select2/select2.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url'); ?>/assets/libs/fileinput/fileinput.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url'); ?>/assets/css/styles.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php wp_head(); ?>
</head>
<?php

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'limit' => 3
);
$services = pods('services')->find();

?>
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
                    <button class="btn btn-outline" type="button" data-toggle="modal" data-target="#contactModal">
                        написать нам
                    </button>
                    <div id="navbar-toggler" class="navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                    <div id="menu-toggle" class="menu-toggle">
                        <ul>
                            <li class="has-submenu">
                                <a href="/services">услуги</a>
                                <?php if($services->total_found()){ ?>
                                <ul class="submenu">
                                    <?php while($services->fetch()) {?>
                                    <li>
                                        <a href="/services/category/?id=<?=$services->field('service_category')['slug']?>">
                                            <?=$services->display('post_title')?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <li class="has-submenu">
                                <a href="/works">наши работы</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#">
                                            работа
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/about">о нас</a>
                            </li>
                            <li>
                                <a href="/prices">цены</a>
                            </li>
                            <li>
                                <a href="/shop">магазин</a>
                            </li>
                            <li>
                                <a href="/stock">акции</a>
                            </li>
                            <li>
                                <a href="/contacts">доставка и оплата</a>
                            </li>
                            <li>
                                <a href="/contacts">контакты</a>
                            </li>
                            <li>
                                <a href="/faq">faq</a>
                            </li>
                            <li>
                                <a href="/blog">блог</a>
                            </li>
                            <li>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#contactModal">
                                    Заказать звонок
                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <section class="make-order">
                <div class="form-wrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-inner-wrap">
                        <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                        <p>Напишите нам! Наш менеджер свяжется с вами в ближайшее время и проконсультирует по всем вопросам.</p>
                    </div>
                    <form action="#" id="order-form" class="order-form active" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <!--                            <div class="col-lg-6 col-xs-12">-->
                            <div class="col-6">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="email" placeholder="E-mail*" required name="email">
                                <input type="number" id="phone" placeholder="Телефон" name="phone">
                                <select class="service-select" name="service_name">
                                    <option value="0" selected>Вид услуги</option>
                                    <?php while($services->fetch()){ ?>
                                        <option value="<?=$services->display('post_title')?>"><?=$services->display('post_title')?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!--                            <div class="col-lg-6 col-xs-12">-->
                            <div class="col-6">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                <input id="file" type="file" style="opacity: 0;">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                    <form action="#" class="order-form file-form active">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-element">
                                    <label class="form-element-label" for="input-file">Выбрать файлы</label>
                                    <div class="form-element-error">Невозможно загрузить файлы</div>
                                    <input type="file" id="fileinput" name="files[]" data-label="Файлы" data-multiple-caption="{n} файлов выбрано" multiple />
                                </div>
                                <!--                            <input id="fileinput" name="files[]" type="file" multiple>-->
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
