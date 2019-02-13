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

?>
<section class="make-order">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="decorative yellow"></div>
            </div>
            <div class="form-wrap col-md-8 col-12">
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
                <form action="#" class="order-form active">
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <input type="text" placeholder="Имя*" required>
                            <input type="email" placeholder="E-mail*" required>
                            <input type="number" placeholder="Телефон">
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
                <form action="#" class="call-form">
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <input type="text" placeholder="Имя*" required>
                            <input type="number" placeholder="Телефон">
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
                                    <a target="_blank" href="https://www.google.com.ua/maps/place/%D1%83%D0%BB.+%D0%92%D1%8B%D0%B1%D0%BE%D1%80%D0%B3%D1%81%D0%BA%D0%B0%D1%8F,+94,+%D0%9A%D0%B8%D0%B5%D0%B2,+02000/@50.4518438,30.4219243,17z/data=!3m1!4b1!4m5!3m4!1s0x40d4cc3f6c0fa761:0xeef8be2517cf5608!8m2!3d50.4518438!4d30.424113">
                                        г.Киев, ул.Выборгская, 94
                                    </a> </br>
                                    Тел: <a href="tel:+380677516622">067 751 66 22</a>, <a href="tel:+380667734186">066 773 41 86</a> </br>
                                    email: <a href="mailto:smarthoop@gmail.com">smarthoop@gmail.com</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="contact">
                                    <a target="_blank" href="https://www.google.com.ua/maps/place/%D0%92%D0%BE%D0%BA%D0%B7%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F+%D1%83%D0%BB.,+4,+%D0%91%D0%B5%D0%BB%D0%B0%D1%8F+%D0%A6%D0%B5%D1%80%D0%BA%D0%BE%D0%B2%D1%8C,+%D0%9A%D0%B8%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+09100/@49.8078275,30.1015346,17z/data=!3m1!4b1!4m5!3m4!1s0x40d342308bddfaed:0x68874bc858a0a886!8m2!3d49.8078275!4d30.1037233">
                                        г.Белая Церквь, ул.Вокзальная, 4
                                    </a> </br>
                                    Тел: <a href="tel:+380968809206">096 880 92 06</a></br>
                                    email: <a href="mailto:smarthoop3@gmail.com">smarthoop3@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="schedule">
                        <h4>График работы</h4>
                        <p>С 10:00 до 19:00</br>
                            Понедельник - Пятница</p>
                    </div>
                    <div class="subscribe">
                        <h4>подписаться на рассылку</h4>
                        <form action="#" class="subscribe">
                            <div class="form-group">
                                <input type="email" placeholder="E-mail" required>
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

<script src="<?php bloginfo('template_url'); ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/scripts.js"></script>
</body>
</html>
