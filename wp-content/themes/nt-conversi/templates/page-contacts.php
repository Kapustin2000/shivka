<?php
/*
Template Name: Contacts
*/

$settings  = pods('website_settings')->find();
?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-contacts">
    <section class="contacts">
        <div class="container">
            <div class="row">
                <div class="address-wrap">
                    <div class="bordered">
                        <h1>
                            <span>&nbsp;контакты&nbsp;</span>
                        </h1>
                        <div class="address active">
                            <h2>Оптовые заказы</h2>
                            <p>
                                <?=$settings->display('wholesale_city')?><br/>
                                <?=$settings->display('wholesale_street')?><br/>
                                <?=$settings->display('wholesale_working_hours')?><br/>
                                <?=$settings->display('wholesale_working_days')?><br/>
                                Тел: <a href="tel:+380<?=$settings->display('wholesale_number')?>"><?=$settings->display('wholesale_number')?></a> Viber/WhatsApp,<br> <a href="tel:+380<?=$settings->display('wholesale_number2')?>"><?=$settings->display('wholesale_number2')?></a><br/>
                                E-mail: <a href="maito:<?=$settings->display('wholesale_emaal')?>"><?=$settings->display('wholesale_email')?></a>
                            </p>
                        </div>
                        <div class="address">
                            <h2>Индивидуальные<br/>
                                заказы</h2>
                            <p>
                                <?=$settings->display('individual_city')?><br/>
                                <?=$settings->display('individually_street')?><br/>
                                <?=$settings->display('individually_working_hours')?><br/>
                                <?=$settings->display('individually_working_days')?><br/>
                                Тел: <a href="tel:+380<?=$settings->display('individually_number')?>"><?=$settings->display('individually_number')?></a> Viber/WhatsApp, <br><a href="tel:+380<?=$settings->display('individually_number2')?>"><?=$settings->display('individually_number2')?></a> <br/>
                                E-mail: <a href="maito: <?=$settings->display('individual_email')?>"> <?=$settings->display('individual_email')?></a>
                            </p>
                        </div>
                        <button id="js-address-next" class="next"></button>
                    </div>
                </div>
                <div class="map-wrap">
                    <iframe src="https://maps.google.com.ua/maps/ms?msa=0&amp;msid=206958626610732093873.0004bfb616afe71fccbd8&amp;gl=ua&amp;ie=UTF8&amp;t=m&amp;ll=50.185692,30.349731&amp;spn=0.879324,1.974792&amp;z=9&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="100%"></iframe><br /><small>Просмотреть <a style="color: #0000ff; text-align: left;" href="http://maps.google.com.ua/maps/ms?msa=0&amp;msid=206958626610732093873.0004bfb616afe71fccbd8&amp;gl=ua&amp;ie=UTF8&amp;t=m&amp;ll=50.185692,30.349731&amp;spn=0.879324,1.974792&amp;z=9&amp;source=embed">SmartHoop</a> на карте большего размера</small>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
