<?php
/*
Template Name: Events - view
*/
$id = hys_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('events')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        hys_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}

?>



<?php if($found){ ?>



<!-- PUT HTML HERE -->










<?php }else{ ?>

     <!-- TODO UNCOMMENT AFTER FINISH HTML -->


<!--    <script language="javascript" type="text/javascript">-->
<!--        document.location = "/404";-->
<!--    </script>-->
<?php } ?>


<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>















<!-- Leave before footer -->
<?php

if (  is_active_sidebar( 'events-view-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'events-view-page' ) ) : ?>
        <?php dynamic_sidebar( 'events-view-page' ); ?>
    <?php endif; ?>
<?php endif; ?>


<?php get_footer(); ?>
