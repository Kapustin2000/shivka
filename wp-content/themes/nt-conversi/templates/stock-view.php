<?php
/*
Template Name: Stock - view
*/
if(isset($_GET['id'])) {
    $id = shivka_escapeParam(trim($_GET['id'], '/'));
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('stock')->find($params);

    $found = false;
    if (!empty($data->total_found())) {
        while ($data->fetch()) {
            shivka_SetPodsSeo($data->display('id'));
            $found = true;
            break;
        }
    }
}else{
    $found = false;
}

?>

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-stock smarthoop-stock-item">
        <section class="stock-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="stock-item bordered">
                            <div class="content-editable">
                                <h1>
                                    <span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span>
                                </h1>
                                <h2>
                                    С <?=date("d.m.Y", strtotime($data->display('start_date')));?> по <?=date("d.m.Y", strtotime($data->display('end_date')));?>
                                </h2>
                                <?=$data->display('post_content')?>
                            </div>
                            <img src="<?=$data->display('patch')?>" alt="<?=$data->display('post_title')?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="stock-more">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="stock-more-img" style="background-image: url(<?=$data->display('image')?>);"></div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="content-editable">
                            <p>Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.</p>
                            <p>Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.</p>
                            <p>Современное промышленное японское (Toyota) и немецкое (ZSK)оборудование, качественные расходные материалы и нитки (Gunold, Madeira, Durak и др.), профессиональное программирование и наш опыт позволяют осуществлять каждый заказ максимально быстро, качественно и по приемлемым ценам.</p>
                            <?=$data->display('description')?>
                            <button type="button" class="btn btn-primary">связаться с нами</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php  }else{ ?>

    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>



<?php get_footer(); ?>
