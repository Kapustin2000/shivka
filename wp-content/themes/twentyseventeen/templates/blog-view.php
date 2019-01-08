<?php
/*
Template Name: Blog - view
*/
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('blog')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        shivka_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}

?>


<div class="smarthoop-wrap smarthoop-blog smarthoop-blog-post">

</div>


<?php if($found){ ?>


    <?=$data->display('post_title')?>
    <?=$data->display('post_content')?>
    <?=$data->display('image')?>
    <?=$data->display('description')?>
    <?=$data->display('blog_type')?>
<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>