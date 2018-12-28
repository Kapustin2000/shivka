<section class="success-cases-references">
    <div class="container has-margin-bottom">
        <div class="success-cases-content">
            <div class="row">
                <!-- Reference -->
                <div class="col-xs-12">
                    <!-- Wrapper for slides -->
                    <?php  $reference_total = pods('reference')->find(); ?>
                    <h2 class="text-blue hidden-xl hidden-lg">What Our Partners Say</h2>
                    <div class="top">
                        <div id="reference-carousel" class="carousel slide" data-interval="false" data-total="<?php echo $reference_total->total_found(); ?>">
                            <div class="carousel-inner ajax-call" role="listbox">
                                <?php
                                $params = array('where'=>hys_filter_by_industry_category_technology_query(null,true, false, false),
                                    'orderby' => hys_sort_by(),
                                    'limit' => 1
                                );
                                $reference = pods('reference')->find($params); ?>
                                <?php
                                // Loop through the items returned
                                while ( $reference->fetch() ) {  ?>
                                    <div class="item active">
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
                                                         data-src="<?php echo $reference->display( 'preview' )?>">
                                                        <button id="play-button" class="btn-circle btn-play" onclick="loadPlayer(this, '<?php echo $reference->display( 'link_info' )?>')"></button>
                                                    </div>
                                                    <div class="player" id="<?php echo $reference->display( 'link_info' )?>"></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a href="<?=get_permalink($reference->display('id'));?>" class="reference-description-wrap">
                                            <h3 class="reference-description"><?php echo $reference->display( 'post_content' )?></h3>
                                            <div class="reference-description-info">
                                                <div class="author">
                                                    <div class="author-avatar" data-src="<?php echo $reference->display( 'client_photo' )?>"></div>
                                                    <div class="author-info">
                                                        <h3 class="author-name text-white"><?php echo $reference->display( 'client_first_name' )?> <?php echo $reference->display( 'client_second_name' )?></h3>
                                                        <div class="author-position text-white"><?php echo $reference->display( 'client_position' )?></div>
                                                    </div>
                                                </div>
                                                <div class="logo-wrap">
                                                    <img src="" data-src="<?php echo $reference->display( 'logo' )?>" alt="<?php echo $reference->display( 'post_title' )?>">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="row">
                            <div class="col-lg-3 col-xs-12">
                                <h2 class="text-blue hidden-md hidden-sm hidden-xs">What Our Partners Say</h2>
                                <!-- Controls -->
                                <a class="btn-icon btn-arrow blue" id="reference-next" href="#reference-carousel" role="button" data-slide="next">
                                    <span>Next</span>
                                    <i class="icon-arrow-short"></i>
                                </a>
                            </div>
                        </div>
                        <a class="btn-icon btn-arrow orange" href="/references">
                            <span>See More References</span>
                            <i class="icon-arrow-short"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>