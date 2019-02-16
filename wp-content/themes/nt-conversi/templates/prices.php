<?php
/*
Template Name: Prices
*/

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
);
$prices = pods('prices')->find($params);



$prices_ui = pods('prices_ui')->find();


$stages_of_work = pods('stages_of_work')->find($params);
?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-prices">
    <section class="price-table">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><span>&nbsp;цены&nbsp;</span></h1>
                    <table>
                        <tr>
                            <th>количество, шт</th>
                            <th>цена, грн; размер 10х3см</th>
                            <th>цена, грн; размер 30х10см</th>
                            <th>сроки, дни</th>
                        </tr>
                        <?php  while($prices->fetch()){ ?>
                        <tr>
                            <td><?=$prices->display('count')?></td>
                            <td><?=$prices->display('price1')?></td>
                            <td><?=$prices->display('price2')?></td>
                            <td><?=$prices->display('term')?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <div class="extra-info">
                        <div class="content-editable">
                            <?=$prices_ui->display('block_text')?>
                        </div>
                        <img src="<?=$prices_ui->display('block_image')?>" alt="<?=$prices_ui->field('block_image')['post_title']?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>этапы работы</h2>
                    <div class="steps-wrap row">
                        <?php while($stages_of_work->fetch()){ ?>
                            <div class="step col-xl-3 col-sm-6 col-12">
                                <h3><?=$stages_of_work->display('post_title')?></h3>
                                <p><?=$stages_of_work->display('post_content')?></p>
                                <?=$stages_of_work->display('image')?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more">
                        <a href="/" class="underline">смотреть подробности</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
