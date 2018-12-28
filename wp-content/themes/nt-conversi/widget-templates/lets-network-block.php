<?php

$color_classes = array(
    'tag-outline', 'tag-outline-blue', 'tag-outline-orange', 'tag-outline-green', 'tag-outline-violet'
);

?>
<section class="hys-events">
    <div class="container">
        <div class="container-mx">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Let’s Network</h2>
                    <div class="events-description">
                        <p>
                            We would be happy to share our experience and learn from yours.
                            Let’s meet each other at upcoming events to get acquainted in person!
                        </p>
                        <a href="/events" class="btn-icon btn-arrow orange">
                            <span>Upcoming Events</span>
                            <i class="icon-arrow-short"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="hys-events-wrap hidden-scrollbar">
                <div class="row">
                    <?php
                    $params = array(
                        'where' => "end.meta_value >= '".date("Y-m-d")."'",
                        'orderby'=>"start",
                        'limit' => 3
                    );
                    $events = pods('events')->find($params);
                    while($events->fetch()){?>
                        <div class="event-item col-xs-4">
                            <div class="event-image-wrap">
                                <div class="event-image" data-src="<?=$events->display('preview')?>"></div>
                                <div class="event-image-hover">
                                    <button type="button" class="btn blue">Book a Meeting</button>
                                </div>
                            </div>
                            <div class="tag <?php echo ( isset($color_classes[$events->field('role')]) ? $color_classes[$events->field('role')] : $color_classes[0]) ?>">
                                <?=$events->display('role')?>
                            </div>
                            <a href="<?=get_permalink($events->display('id'))?>" class="event-title"><?=$events->display('post_title')?></a>
                            <div class="event-date"><?=date("d", strtotime($events->display('start'))); ?> - <?=date("d M , Y", strtotime($events->display('end'))); ?></div>
                            <p class="event-description">
                                <?=$events->display('post_content')?>
                            </p>
                            <div class="event-location">
                                <i class="icon icon-location"></i>
                                <span><?=$events->display('place')?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>