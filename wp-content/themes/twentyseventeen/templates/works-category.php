<?php
/*
Template Name: Works Category
*/

?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-works-category">
    <section class="works-category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bordered">
                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <h1>
                                    <span>&nbsp;Этническая вышивка&nbsp;</span>
                                </h1>
                                <div class="text-wrap">
                                    <p>
                                        Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.
                                        Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.
                                    </p>
                                    <p>
                                        Современное промышленное японское (Toyota) и немецкое Современное промышленное японское (Toyota) и немецкоеСовременное промышленное японское (Toyota) и немецкое Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="service-img">
                                    <img src="" alt="Ethnic">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services extra-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>&nbsp;Наши работы&nbsp;</span>
                    </h1>
                    <div class="decorative yellow"></div>
                    <div class="decorative lavander"></div>
                    <div class="row">
<!--                        --><?php // while($data->fetch()){?>
<!--                            <div class="col-lg-4 col-12">-->
<!--                                <a href="--><?//=get_permalink($data->display('id'))?><!--" class="service-item">-->
<!--                                    <div class="service-img-wrap">-->
<!--                                        <div class="service-img" style="background-image: url( --><?//=$data->display('preview')?>/*);"></div>*/
/*                                    </div>*/
/*                                    <div class="service-title">*/<?//=$data->display('post_title')?><!--</div>-->
<!--                                    <button type="button" class="btn btn-primary">смотреть</button>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        --><?php //} ?>
                    </div>
                    <div class="see-more">
<!--                        TODO: Change link-->
                        <a href="/" class="underline">смотреть больше</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="/works" class="back">
        <span>
            <i class="icon icon-arrow"></i>
            назад к работам
        </span>
    </a>
</div>

<?php get_footer(); ?>


<?php // while($data->fetch()){?>
<!--    <div class="l6">-->
<!--        --><?//=$data->display('post_title')?>
<!--        --><?//=$data->display('post_content')?>
<!--        --><?//=$data->display('image')?>
<!--        --><?//=$data->display('blog_type')?>
<!--        --><?//=get_permalink($data->display('id'))?>
<!--    </div>-->
<?php //} ?>

