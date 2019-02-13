<?php
/*
Template Name: Works - view
*/
if(isset($_GET['id'])) {
    $id = shivka_escapeParam(trim($_GET['id'], '/'));
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('works')->find($params);

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




    <!-- Html -->


<?php if($found){ ?>


    <?=$data->display('post_title')?>
    <?=$data->display('post_content')?>
    <?=$data->display('patch')?>
    <?=$data->display('description')?>
    <?=$data->display('image')?>

    С <?=date("d.m.Y", strtotime($data->display('start_date')));?> по <?=date("d.m.Y", strtotime($data->display('end_date')));?>

<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>