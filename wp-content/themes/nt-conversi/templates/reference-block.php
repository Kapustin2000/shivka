
<?php

$params = array(
    'where'=>hys_filter_by_industry_category_technology_query(),
    'orderby' => hys_sort_by(),
    'offset' => isset($_REQUEST['offset']) ? intval($_REQUEST['offset']) : 0,
    'limit' => isset($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 0
);

$reference = pods('reference')->find($params);

// Loop through the items returned
while ( $reference->fetch() ) {  ?>
    <div class="reference-media">
        <?php
        if($reference->field( 'info_type' ) ==  1){ ?>
            <iframe id="soundcloud-player"
                    width="100%"
                    height="300"
                    scrolling="no"
                    frameborder="no"
                    allow="autoplay"
                    class="soundcloud-frame"
                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $reference->display( 'link_info' )?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
        <?php } elseif($reference->field( 'info_type' ) == 2){ ?>
            <div class="youtube-wrap">
                <div class="youtube-thumbnail"
                     id="thumbnail"
                     style="background-image: url(<?php echo $reference->display( 'preview' )?>);">
                    <button id="play-button" class="btn-circle btn-play" onclick="loadPlayer(this, '<?php echo $reference->display( 'link_info' )?>')"></button>
                </div>
                <div class="player" id="<?php echo $reference->display( 'link_info' )?>"></div>
            </div>
        <?php } ?>
    </div>
    <div class="reference-description-wrap">
        <h3 class="reference-description"><?php echo $reference->display( 'post_content' )?></h3>
        <div class="reference-description-info">
            <div class="author">
                <div class="author-avatar" style="background-image: url(<?php echo $reference->display( 'client_photo' )?>);"></div>
                <div class="author-info">
                    <h3 class="author-name text-white"><?php echo $reference->display( 'client_first_name' )?> <?php echo $reference->display( 'client_second_name' )?></h3>
                    <div class="author-position text-white"><?php echo $reference->display( 'client_position' )?></div>
                </div>
            </div>
            <a href="<?php echo $reference->display( 'external_link' )?>" target="_blank" class="logo-wrap">
                <img src="<?php echo $reference->display( 'logo' )?>" alt="<?php echo $reference->display( 'post_title' )?>">
            </a>
        </div>
    </div>
<?php } ?>
             