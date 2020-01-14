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
    <link href="<?php bloginfo('template_url'); ?>/assets/css/styles.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/site.webmanifest">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php wp_head(); ?>  
    <style>
    .captcha-fake-field {
  background: transparent;
  bottom: 0;
  border: none;
  display: block;
  height: 1px;
  left: 12px;
  width: 1px;
  position: absolute;
  z-index: -1;
}
        
        .g-recaptcha > div{
            margin: 0;
        }
        #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122764804-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-122764804-1');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '313884522408948');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=313884522408948&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<?php

$params = array(
    'orderby'=>"order_weight.meta_value + 0 DESC,term_id DESC",
    'limit' => 12,
);
$services = pods('services')->find($params);

$works = pods('works')->find($params);
?>
<body <?php body_class(); ?> ontouchstart="">
<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar">
                    <a class="navbar-brand" href="/">
                        <img class="desktop-logo" src="<?php bloginfo('template_url'); ?>/assets/img/smarthoop_logo_3@2x.png" alt="Smarthoop Logo">
                        <img class="mobile-logo" src="<?php bloginfo('template_url'); ?>/assets/img/smarthoop_logo_2.png" alt="Smarthoop Logo">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/uslugi">услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/nashi-raboti">наши работы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/how-to-order">как заказать</a>
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
                                <a href="/uslugi">
                                    услуги
                                    <span></span>
                                </a>
                                <?php if($services->total_found()){ ?>
                                <ul class="submenu">
                                    <?php while($services->fetch()) {?>
                                    <li>
                                        <a href="/uslugi/<?=$services->display('slug')?>">
                                            <?=$services->display('name')?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <li class="has-submenu">
                                <a href="/nashi-raboti">
                                    наши работы
                                    <span></span>
                                </a>
                                <?php if($works->total_found()){ ?>
                                    <ul class="submenu">
                                        <?php while($works->fetch()) {?>
                                            <li>
                                                <a href="/nashi-raboti/<?=$works->display('slug')?>">
                                                    <?=$works->display('name')?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li>
                                <a href="/about">о нас</a>
                            </li>
                            <li>
                                <a href="/prices">цены</a>
                            </li>
                            <li>
                                <a href="/stock">акции</a>
                            </li>
                            <li>
                                <a href="/shipping">доставка и оплата</a>
                            </li>
                            <li>
                                <a href="/how-to-order">Как заказать</a>
                            </li>
                            <li>
                                <a href="/contacts">контакты</a>
                            </li>
                            <li>
                                <a href="/faq">вопросы и ответы</a>
                            </li>
                            <li>
                                <a href="/blog">блог</a>
                            </li>
                            <li>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#callModal">
                                    Заказать звонок
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div id="mobile-navbar-toggler" class="mobile-navbar-toggler navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                    <div id="mobile-menu-toggle" class="mobile-menu-toggle">
                        <ul>
                            <li class="js-submenu">
                                <span>
                                    услуги
                                    <span></span>
                                </span>
                                <?php if($services->total_found()){ ?>
                                    <ul class="submenu">
                                        <?php $services->reset(); while($services->fetch()) {?>
                                            <li>
                                                <a href="/uslugi/<?=$services->display('slug')?>">
                                                    <?=$services->display('name')?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li class="js-submenu">
                                <span>
                                    наши работы
                                    <span></span>
                                </span>
                                <?php $works->reset(); if($works->total_found()){ ?>
                                    <ul class="submenu">
                                        <?php while($works->fetch()) {?>
                                            <li>
                                                <a href="/nashi-raboti/<?=$works->display('slug')?>">
                                                    <?=$works->display('name')?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li>
                                <a href="/about">о нас</a>
                            </li>
                            <li>
                                <a href="/prices">цены</a>
                            </li>
                            <li>
                                <a href="/stock">акции</a>
                            </li>
                            <li>
                                <a href="/shipping">доставка и оплата</a>
                            </li>
                            <li>
                                <a href="/how-to-order">Как заказать</a>
                            </li>
                            <li>
                                <a href="/contacts">контакты</a>
                            </li>
                            <li>
                                <a href="/faq">вопросы и ответы</a>
                            </li>
                            <li>
                                <a href="/blog">блог</a>
                            </li>
                            <li>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#callModal">
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
                        <span aria-hidden="true"></span>
                    </button>
                    <div class="form-inner-wrap">
                        <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                        <p>Напишите нам! Наш менеджер свяжется с вами в ближайшее время и проконсультирует по всем вопросам.</p>
                    </div>
                    <form action="?form=success" class="order-form-js order-form active submit-info-form" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="email" placeholder="E-mail*" required name="email">
                                <input type="text" id="phone" placeholder="Телефон" name="phone">
                                <select id="service-select" class="service-select" name="service_name">
                                    <option value="0" selected>Вид услуги</option>
                                    <?php $services->reset(); while($services->fetch()){ ?>
                                        <option value="<?=$services->display('name')?>"><?=$services->display('name')?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <button type="submit" class="btn btn-primary custom-submit">Отправить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="box-wrap">
                        <form action="/wp-json/cv/v1/save" method="post" action="" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload submit-file-form">
                            <div class="box__input">
                                <span class="d-xl-block d-lg-none d-md-none d-sm-none d-none">Добавьте ваш файл, картинки или фотографии</span>
                                <span class="d-xl-none">Добавьте ваш файл или картинки</span>
                                <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
                                <label class="files-names files_names"></label>
                                <label for="file" class="btn-span btn-outline">Выбрать файл</label>
                            </div>
                            <div class="box__uploading">Uploading…</div>
                            <div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Upload more?</a></div>
                            <div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Try again!</a></div>
                            <input type="hidden" name="ajax" value="1"></form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="callModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <section class="make-order">
                <div class="form-wrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                    <div class="form-inner-wrap">
                        <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                        <p>Напишите нам! Наш менеджер свяжется с вами в ближайшее время и проконсультирует по всем вопросам.</p>
                    </div>
                    <form action="?form=success" class="order-form-js call-form order-form active" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="text" id="phone" placeholder="Телефон*" required name="phone">
                            </div>
                            <div class="col-sm-6 col-12">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <button style="" type="submit" class="btn btn-primary custom-submit">Отправить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $alerts = pods('alerts')->find(); ?>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                <h2><?=$alerts->display('form_title')?></h2>
                 <?=$alerts->display('form_description')?>
                <a href="/" class="btn btn-span btn-primary">на главную</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successSubscribeModal" tabindex="-1" role="dialog" aria-labelledby="successSubscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                <h2><?=$alerts->display('form_title_2')?></h2>
                 <?=$alerts->display('form_description_2')?> 
                <a href="/" class="btn btn-span btn-primary">на главную</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                <h2 class="error">что-то пошло не так!</h2>
                <p>Проверьте подлючение к интернету или перезагрузите страницу
                    и попобуйте отправить заявку снова.</p>
                <a href="/" class="btn btn-span btn-outline">на главную</a>
            </div>
        </div>
    </div>
</div>
