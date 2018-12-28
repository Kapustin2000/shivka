<?php
/*
Template Name: Reference-view
*/

?>
<?php
$id = hys_escapeParam(trim($_GET['id'], '/'));
$params = array(
    'limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('reference')->find($params);
$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        hys_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}
if(!$found){ ?>
<script language="javascript" type="text/javascript">
    document.location = "/404";
</script>
<?php }  ?>
<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<section id="references" class="reference-view">
    <div class="container">
        <div class="container-mx">
            <div class="row">
                <div class="reference-item-wrap col-xs-12">
                    <div class="reference-item">
                        <div class="reference-info">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="reference-content">
                                        <a href="/references" class="btn btn-back transparent">
                                            <i class="icon icon-arrow-short"></i>
                                            <span>Back to References</span>
                                        </a>
                                        <div class="reference-description-wrap">
                                            <div class="label-wrap">
                                                <label><?=$data->display('industry')?></label>
                                            </div>
                                            <h2 class="reference-title"><?=$data->display('post_title')?></h2>
                                            <h3 class="reference-description quote">
                                                <?=$data->display('post_content')?>
                                            </h3>
                                            <div class="reference-description-info">
                                                <div class="author">
                                                    <div class="author-avatar" data-src="<?=$data->display('client_photo')?>"></div>
                                                    <div class="author-info">
                                                        <h3 class="author-name"><?=$data->display('client_first_name') .' '.$data->display('client_second_name')?></h3>
                                                        <div class="author-position"><?=$data->display('client_position')?></div>
                                                    </div>
                                                </div>
                                                <a href="<?=$data->display('external_link')?>" target="_blank" class="logo-wrap">
                                                    <img src="" data-src="<?=$data->display('logo')?>" alt="Client">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reference-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="content-editable">
                                    <div class="full-width"> 
                                        <?php if($data->field('info_type') == 1 ){ ?>
                                            <!-- Soundcloud -->
                                            <iframe id="soundcloud-player"
                                                    width="100%"
                                                    height="300"
                                                    scrolling="no"
                                                    frameborder="no"
                                                    allow="autoplay"
                                                    class="soundcloud-frame"
                                                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $data->display( 'link_info' )?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                        <?php }elseif($data->field('info_type') == 2){ ?>
                                            <!-- Youtube -->
                                            <div class="youtube-wrap">
                                                <div class="youtube-thumbnail"
                                                     id="thumbnail"
                                                     data-src="<?=$data->display('preview')?>">
                                                    <button id="play-button" class="btn-circle btn-play" onclick="loadPlayer(this, '<?=$data->display('link_info')?>')"></button>
                                                </div>
                                                <div class="player" id="<?=$data->display('link_info')?>"></div>
                                            </div>

                                        <?php }elseif($data->field('info_type') == 3){ ?>
                                            <!-- Text -->
                                            <div class="youtube-wrap">
                                                <div class="youtube-thumbnail"
                                                     id="thumbnail"
                                                     data-src="<?=$data->display('preview')?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-md-9 col-xs-12">
                                    <div class="content-editable">
                                        <?php echo $data->display( 'description' )?>
                                        <?php if(!empty($data->field('cases'))){ ?>
                                            <h3 class="success-cases-title">Success cases for this partner</h3>
                                            <p class="success-cases-links">
                                                <?php foreach($data->field('cases') as $related) {
                                                    $related_case = pods('success_cases')->find(array('limit' => 1, 'where' => 't.id = '.$related['ID']));
                                                    ?>
                                                    <a href="<?= get_permalink($related_case->display('id')) ?>" class="blue"><?=$related_case->display('post_title')?></a>
                                                <?php } ?>
                                            </p>
                                        <?php } ?>
                                        <?php if(!empty($data->field('solutions'))){ ?>
                                        <h3 class="business-solution-title">Business solutions</h3>
                                        <ul class="links-list">
                                            <?php foreach($data->field('solutions') as $related) {
                                                $related_solution = pods('business_solution')->find(array('limit' => 1, 'where' => 't.term_id = '.$related['term_id'])); ?>
                                                <li><a class="link blue" href="/success-cases-search?business_solution=<?=$related_solution->display('slug')?>"><?=$related_solution->display('name')?></a></li>

                                            <?php } } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($data->field('references'))){ ?>
                        <div class="related-references">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>Related References</h2>
                                </div>
                            </div>
                            <div class="success-cases-reference-list">
                                <div class="row">
                                    <?php foreach($data->field('references') as $related) {
                                        $reference = pods('reference')->find(array('limit' => 1, 'where' => 't.id = '.$related['ID']));
                                        while($reference->fetch()){ ?>
                                            <div class="col-lg-6 col-xs-12">
                                                <a href="<?=get_permalink($reference->display('id'))?>" class="reference-description-wrap">
                                                    <div class="label-wrap">
                                                        <label><?=$reference->display('industry')?></label>
                                                        <label><?=$reference->display('info_type')?></label>
                                                    </div>
                                                    <h3 class="reference-description">
                                                        <?=$reference->display('post_content')?>
                                                    </h3>
                                                    <div class="reference-description-info">
                                                        <div class="author">
                                                            <div class="author-avatar" data-src="<?=$reference->display('client_photo')?>"></div>
                                                            <div class="author-info">
                                                                <h3 class="author-name"><?=$reference->display('client_first_name') .' '.$reference->display('client_second_name')?></h3>
                                                                <div class="author-position"><?=$reference->display('client_position')?></div>
                                                            </div>
                                                        </div>
                                                        <div class="logo-wrap">
                                                            <img src="" data-src="<?=$reference->display('logo')?>" alt="Author">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div> 
    <?php

    if (  is_active_sidebar( 'references-view-page' )  ) : ?>
        <?php if ( is_active_sidebar( 'references-view-page' ) ) : ?>
            <?php dynamic_sidebar( 'references-view-page' ); ?>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

