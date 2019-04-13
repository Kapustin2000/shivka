<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
$settings  = pods('website_settings')->find();
?>
<?php

$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'offset' => shivka_offset(9),
);
$services = pods('services')->find($params);

?>
<section class="make-order">
    <div class="container">
<!--        <div class="row justify-content-lg-center">-->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="decorative yellow"></div>
                <div class="decorative background">
<!--                    <img src="--><?php //bloginfo('template_url'); ?><!--/assets/img/broderie.jpg" alt="Broderie">-->
                </div>
            </div>
<!--            <div class="col-lg-8 col-12">-->
            <div class="col-12">
                <div class="form-wrap">
                    <div class="form-inner-wrap">
                        <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                        <p>Свяжитесь с нами удобным для вас способом:</p>
                    </div>
                    <div class="tabs-wrap yellow">
                        <button type="button" class="tab active">
                            <span>Написать</span>
                        </button>
                        <button type="button" class="tab">
                            <span>Заказать звонок</span>
                        </button>
                    </div>
                    <form action="#" id="order-form" class="order-form-js order-form active" enctype="multipart/form-data" method="post">
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
                                <div class="form-element">
                                    <label class="form-element-label" for="fileinput">Выбрать файлы</label>
                                    <div class="form-element-error">Невозможно загрузить файлы</div>
                                    <input class="fileinput" type="file" id="fileinput" name="files[]" data-label="Файлы" data-multiple-caption="{n} файлов выбрано" multiple />
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                    <form action="#" id="call-form" class="call-form">
                        <div class="row">
<!--                            <div class="col-lg-6 col-xs-12">-->
                            <div class="col-6">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="number" placeholder="Телефон*" required name="phone">
                            </div>
<!--                            <div class="col-lg-6 col-xs-12">-->
                            <div class="col-6">
                            <textarea rows="5"
                                      placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-wrap">
                    <div class="logo-wrap">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/smarthoop_logo_2.png" width="100" height="100" alt="Smarthoop">
                    </div>
                    <div class="contacts">
                        <h4>контакты</h4>
                        <div class="contact">
                            <a target="_blank" href="<?=$settings->display('wholesale_latitude')?>">
                                <?=$settings->display('wholesale_city')?>
                            </a> </br>
                            Тел: <a href="tel:+380<?=$settings->display('wholesale_number')?>"><?=$settings->display('wholesale_number')?></a>, <a href="tel:+380667734186">0667734186</a></br>
                            email: <a href="mailto:<?=$settings->display('wholesale_email')?>"><?=$settings->display('wholesale_email')?></a>
                        </div>
                    </div>
                    <div class="contacts">
                        <h4>&nbsp;</h4>
                        <div class="contact">
                            <a target="_blank" href="<?=$settings->display('individually_latitude')?>">
                                <?=$settings->display('individual_city')?>
                            </a> </br>
                            Тел: <a href="tel:+380<?=$settings->display('individually_number')?>"><?=$settings->display('individually_number')?></a></br>
                            <!--                                    --><?//=$settings->display('individually_number')?><!--</br>-->
                            email: <a href="mailto:<?=$settings->display('individual_email')?>"><?=$settings->display('individual_email')?></a>
                        </div>
                    </div>
                    <div class="schedule">
                        <h4>График работы</h4>
                        <div><?=$settings->display('individually_working_hours')?></br>
                            <?=$settings->display('individually_working_days')?></div>
                    </div>
                    <div class="subscribe">
                        <h4>подписаться на рассылку</h4>
                        <form action="#" id="subscribe-form" class="subscribe">
                            <div class="form-group">
                                <input type="email" placeholder="E-mail" name="email" required>
                                <button type="submit" class="btn btn-outline">Подписаться</button>
                            </div>
                        </form>
                    </div>
                    <div class="social-media">
                        <h4>Мы в социальных сетях</h4>
                        <div class="social-wrap">
                            <a href="<?=$settings->display('facebook')?>" target="_blank"><i class="icon icon-facebook"></i></a>
                            <a href="<?=$settings->display('instagram')?>" target="_blank"><i class="icon icon-instagram"></i></a>
                            <a href="<?=$settings->display('youtube')?>" target="_blank"><i class="icon icon-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-nav">
                    <ul>
                        <li><a href="/services">услуги</a></li>
                        <li><a href="/works">наши работы</a></li>
                        <li><a href="/about">о нас</a></li>
                        <li><a href="/prices">цены</a></li>
                        <li><a href="/stock">акции</a></li>
                        <li><a href="/shop">магазин</a></li>
                        <li><a href="/shipping">доставка и оплата</a></li>
                        <li><a href="/how-to-order">как заказать</a></li>
                        <li><a href="/blog">блог</a></li>
                        <li><a href="/faq">f.a.q.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-info">
                    <a href="/privacy-policy">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
                    <p>
                        ©2011 SmartHoop</br>
                        Все права защищены и охраняются действующим законодательством Украины.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/jquery/jquery-1.12.4.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/select2/select2.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/fileinput/fileinput.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/scripts.js"></script>
</body>
</html>
