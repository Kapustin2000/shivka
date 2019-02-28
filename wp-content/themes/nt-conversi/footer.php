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
<section class="make-order">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-12">
                <div class="decorative yellow"></div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="form-wrap">
                    <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                    <p>Свяжитесь с нами удобным для вас способом:</p>
                    <div class="tabs-wrap yellow">
                        <button type="button" class="tab active">
                            <span>Написать</span>
                        </button>
                        <button type="button" class="tab">
                            <span>Заказать звонок</span>
                        </button>
                    </div>
                    <form action="#" id="order-form" class="order-form active">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="email" placeholder="E-mail*" required name="email">
                                <input type="number" placeholder="Телефон" name="phone">
                                <!-- <select name="" id="">
                                  <option value="0" selected class="hidden">Вид услуги</option>
                                </select> -->
                            </div>
                            <div class="col-lg-6 col-xs-12">
                      <textarea rows="5"
                                placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                <!-- <input type="file"> -->
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                    <form action="#" id="call-form" class="call-form">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="number" placeholder="Телефон*" required name="phone">
                            </div>
                            <div class="col-lg-6 col-xs-12">
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
                        <div class="row">
                            <div class="col-6">
                                <div class="contact">
                                    <a target="_blank" href="<?=$settings->display('wholesale_latitude')?>">
                                        <?=$settings->display('wholesale_city')?>
                                    </a> </br>
                                    <?=$settings->display('wholesale_number')?></br>
                                    email: <a href="mailto:<?=$settings->display('wholesale_emaal')?>"><?=$settings->display('wholesale_emaal')?></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="contact">
                                    <a target="_blank" href="<?=$settings->display('individually_latitude')?>">
                                        <?=$settings->display('individual_city')?>
                                    </a> </br>
                                    <?=$settings->display('individual_number')?></br>
                                    email: <a href="mailto:<?=$settings->display('individual_email')?>"><?=$settings->display('individual_email')?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="schedule">
                        <h4>График работы</h4>
                        <p><?=$settings->display('individual_working_hours')?></br>
                            <?=$settings->display('individual_working_days')?></p>
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
                            <a href="#"><i class="icon icon-facebook"></i></a>
                            <a href="#"><i class="icon icon-instagram"></i></a>
                            <a href="#"><i class="icon icon-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-nav">
                    <ul>
                        <li><a href="#">услуги</a></li>
                        <li><a href="/works">наши работы</a></li>
                        <li><a href="/about">о нас</a></li>
                        <li><a href="/prices">цены</a></li>
                        <li><a href="/stock">акции</a></li>
                        <li><a href="#">магазин</a></li>
                        <li><a href="/shipping">доставка и оплата</a></li>
                        <li><a href="/how-to-order">как заказать</a></li>
                        <li><a href="/blog">блог</a></li>
                        <li><a href="/faq">f.a.q.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-info">
                    <a href="#">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
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
<script src="<?php bloginfo('template_url'); ?>/assets/js/scripts.js"></script>
</body>
</html>
