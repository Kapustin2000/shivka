<?php
/*
Template Name: Stock
*/

?>
<?php

$params = array(
    'where' => "end_date.meta_value >= '".date("Y-m-d")."'",
    'orderby'=>"start_date,order_weight.meta_value DESC,id DESC"
);
$data = pods('stock')->find();


?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-stock">

</div>


<div class="row">
<?php  while($data->fetch()){?>
     <div class="l6">
        <?=$data->display('post_title')?>
        <?=$data->display('patch')?>
        <?=$data->display('post_content')?>
        <?=get_permalink($data->display('id'))?>
     </div>
<?php } ?>
</div>

 
 <?php get_footer(); ?>
