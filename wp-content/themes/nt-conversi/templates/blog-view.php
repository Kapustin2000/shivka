<?php
/*
Template Name: Blog - view
*/

$id = hys_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('blog')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        hys_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>


<section id="blog" class="blog blog-post">
    <div class="container has-margin-bottom">
        <div class="row">
            <div class="blog-item-wrap col-xs-12">
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="/blog" class="btn btn-back transparent">
                                <i class="icon icon-arrow-short"></i>
                                <span>Back to Blog</span>
                            </a>
                        </div>
                    </div>
                    <?php
                    if($found) { { $id = $data->display( 'id' );   $authorId = $data->display('post_author'); ?>
                        <div class="blog-item-heading">
                            <div class="blog-item-heading-wrap">
                                <?php if($data->field( 'blog_type' ) == 1) { ?>
                                    <a href="/blog-search?type=<?=$data->field( 'blog_type' )?>" class="tag-doubled night-blue">
                                        <span><?php echo $data->display( 'blog_type' )?></span>
                                        <span><?php echo $data->display( 'file_type' )?></span>
                                    </a>
                                <?php }else{  ?>
                                    <a href="/blog-search?type=<?=$data->field( 'blog_type' )?>" class="tag">
                                        <?php echo $data->display( 'blog_type' )?>
                                    </a>
                                <?php } ?>
                                <span class="date"><?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?></span>
                            </div>
                            <div class="blog-statistics">
                            <?php
                            $settings = pods('ui_settings');
                            if( $settings->field('dispaly_react_system_blog')){ ?>
                                <ul class="links-list">
                                    <li>
                                        <i class="icon icon-views"></i>
                                        <?php echo $data->display( 'views') ?>
                                    </li>
                                    <li>
                                        <i class="icon icon-clap"></i>
                                        <?php echo $data->display( 'claps' )?>
                                    </li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2><?php echo $data->display( 'post_title' )?></h2>
                                </div>
                                <div class="col-md-10 col-xs-12">
                                    <?php echo $data->display( 'post_content' )?>
                                    <!-- Author -->
                                    <?php if($data->field( 'blog_type' ) != 1) { ?>
                                        <div class="author">
                                            <div class="author-avatar">
                                                <?php echo get_avatar( $authorId ,  120);  ?>
                                            </div>
                                            <div class="author-info">
                                                <div class="author-name"><?php echo get_the_author_meta('first_name',$authorId).' '.get_the_author_meta('last_name',$authorId);  ?></div>
                                                <div class="author-position"><?php echo get_the_author_meta('description',$authorId);  ?></div>
                                            </div>
                                        </div>
                                    <?php }else{  ?>
                                        <div class="blog-statistics blog-statistics-mobile">
                                            <?php
                                            if( $settings->field('dispaly_react_system_blog')){ ?>
                                                <ul class="links-list">
                                                    <li>
                                                        <i class="icon icon-views"></i>
                                                        <?php echo $data->display( 'views') ?>
                                                    </li>
                                                    <li>
                                                        <i class="icon icon-clap"></i>
                                                        <?php echo $data->display( 'claps' )?>
                                                    </li>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <!-- End -->
                        <div class="blog-content">
                            <div class="content-editable">
                                <div class="full-width">
                                    <!-- if common post -->
                                    <div class="image-wrap"
                                         data-src="<?php echo $data->display( 'image' )?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-xs-12">
                                    <div class="content-editable">
                                        <div <?php if($data->field( 'blog_type' ) == 1) { ?> class="content-description" data-mode-pdf="<?php echo isset($_GET['mode']) ? 1 : 0?>" <?php } ?>>
                                            <?php echo $data->display( 'description' )?>
                                            <div class="full-width full-width-last">
                                                <?php if($data->field( 'blog_type' ) == 1) { ?>
                                                    <?php if($data->field( 'file_type' ) == 1){?>
                                                        <!-- if whitepaper video -->
                                                        <div class="youtube-wrap">
                                                            <div class="youtube-thumbnail"
                                                                 id="thumbnail"
                                                                 data-src="<?php echo $data->display( 'image' )?>">
                                                                <button id="play-button" class="btn-circle btn-play"></button>
                                                            </div>
                                                            <iframe id="youtube-player"
                                                                    width="100%"
                                                                    height="600"
                                                                    class="youtube-frame"
                                                                    src="//www.youtube.com/embed/<?php echo $data->display( 'link_info' );?>?rel=0&amp;showinfo=0&amp;enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    <?php }elseif($data->field( 'file_type' ) == 2){?>
                                                        <!-- if whitepaper pdf -->

                                                        <a class="image-wrap"
                                                           target="_blank"
                                                           <?php if( !empty( $data->display( 'file' ))){ ?>  href="<?php echo $data->display( 'file' ); ?>"  <?php } ?>
                                                           style="background-image: url(<?php echo $data->display( 'image' )?>);">
                                                        </a>

                                                    <?php }elseif($data->field( 'file_type' ) == 3){  ?>
                                                        <iframe id="soundcloud-player"
                                                                width="100%"
                                                                height="300"
                                                                scrolling="no"
                                                                frameborder="no"
                                                                allow="autoplay"
                                                                class="soundcloud-frame"
                                                                src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $data->display( 'link_info' )?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                                    <?php } ?>
                                                <?php }?>
                                            </div>
                                        </div>

                                        <?php if($data->field( 'blog_type' ) == 1 && !isset($_GET['mode'])) { ?>
                                            <div class="full-width">
                                                <form action="#" id="blog-form" class="contact-form" novalidate data-scroll="get-info">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <h3 class="text-blue">Get Full Information</h3>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group form-group-floating">
                                                                <input type="text" name="user_name" id="name">
                                                                <label for="name">Your Name (optional)</label>
                                                            </div>
                                                            <div class="form-group form-group-floating">
                                                                <input type="text" name="company" id="company">
                                                                <label for="company">Your Company (optional)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group form-group-floating">
                                                                <input type="text" id="email" name="email" data-unvalid="Valid email required" required>
                                                                <label for="email">Your Email</label>
                                                                <div class="error-tooltip">
                                                                    <div class="icon icon-question"></div>
                                                                    <div class="tooltip"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-group-floating">
                                                                <input type="text" name="phone" id="phone">
                                                                <label for="phone">Your Phone (optional)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xs-12">
                                                            <div class="form-group form-group-floating">
                                                                <input type="text" name="country" id="country">
                                                                <label for="country">Your Country (optional)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="form-group checkbox-wrap">
                                                                <label>
                                                                    <input type="checkbox" id="marketing">
                                                                    <label for="marketing"></label>
                                                                    <span>I want to receive commercial communications and marketing information from HYS Enterpise</span>
                                                                </label>
                                                            </div>
                                                            <button type="submit" class="btn blue">See Full Information</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php } ?>

                                        <div class="row">
                                            <div class="col-md-10 col-xs-12">
                                                <div class="tag-wrap">
                                                    <?php foreach(wp_get_object_terms($data->display( 'id' ), 'industry') as $industry) { ?>
                                                        <a href="/blog-search?industry=<?=$industry->slug?>" class="tag outline"><?=$industry->name?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                                        <div class="row">
                                            <div class="col-md-11 col-xs-12">
                                                <div class="blog-post-footer">
                                                    <h3>Like what you read? Give us a round of applause.</h3>
                                                    <small>From a quick cheer to a standing ovation, clap to show how much you enjoyed this story.</small>
                                                    <div class="social">
                                                        <div>
                                                            <ul class="links-list">
                                                                <li>
                                                                    <button type="button" class="btn-icon btn-clap btn-circle outline">
                                                                        <i class="icon icon-clap"></i>
                                                                    </button>
                                                                    <span class="clap-count" style="visibility:hidden;">
                                                                        <?php echo $data->display( 'claps' )?>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <i class="icon icon-views"></i>
                                                                    <span class="views-count" style="visibility:hidden;">
                                                                        <?php echo $data->display('views')+1; ?>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <script>
                                                                document.addEventListener("DOMContentLoaded", function(event) {
                                                                    $.get(
                                                                        '/wp-content/themes/nt-conversi/actions/blogcounters.php?id=' + <?php echo $id ?>,
                                                                        function(response) {
                                                                            if (response) {
                                                                                $('.clap-count').css('visibility', 'visible')
                                                                                                .html(response['claps']);
                                                                                $('.views-count').css('visibility', 'visible')
                                                                                                 .html(response['views']);
                                                                            }
                                                                        }
                                                                    );
                                                                });
                                                            </script>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <a id="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                                    <i class="icon icon-facebook"></i>
                                                                </a>
                                                            </li>
<!--                                                            <li>-->
<!--                                                                <a href="#">-->
<!--                                                                    <i class="icon icon-instagram"></i>-->
<!--                                                                </a>-->
<!--                                                            </li>-->
                                                            <li>
                                                                <a id="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                                    <i class="icon icon-linkedin"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a id="twitter" href="http://twitter.com/share?url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                                    <i class="icon icon-twitter"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div> 
                                                        <a class="btn-icon outline btn-download hidden" href="/wp-content/uploads/pdf/<?=$id?>.pdf" download target="_blank">
                                                            <span>Download White Paper</span>
                                                            <span class="tag ghost-white">
                                                             PDF
                                                             <i class="icon icon-arrow-short"></i>
                                                         </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="social-sidebar sticky col-md-3 hidden-sm hidden-xs">
                                    <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                                    <ul>
                                        <li class="claps">
                                            <span class="clap-count" style="visibility:hidden;">
                                                <?php echo $data->display( 'claps' )?>
                                            </span>
                                            <button type="button" class="btn-icon btn-clap btn-circle outline">
                                                <i class="icon icon-clap"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a id="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>"
                                               target="_blank">
                                                <i class="icon icon-facebook"></i>
                                            </a>
                                        </li>
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="icon icon-instagram"></i>-->
<!--                                            </a>-->
<!--                                        </li>-->
                                        <li>
                                            <a id="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>"
                                               target="_blank">
                                                <i class="icon icon-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="twitter" href="http://twitter.com/share?url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>"
                                               target="_blank">
                                                <i class="icon icon-twitter"></i>
                                            </a>
                                        </li>
                                        <?php if($data->field( 'blog_type' ) == 1) { ?>
                                        <li>
                                            <button type="button" data-scroll-tag="get-info" class="btn outline">
                                                Get Full Information
                                                <i class="icon icon-arrow-short"></i>
                                            </button>
                                        </li>
                                        <?php } else { ?>
                                            <li>
                                                <button type="button" data-scroll-tag="subscribe" class="btn outline">
                                                    Subscribe
                                                    <i class="icon icon-arrow-short"></i>
                                                </button>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <?php if(!empty($data->field('related'))){ ?>
            <div class="blog-related">
                <div class="col-xs-12">
                    <h2>You Might Also Like</h2>
                </div>
                <?php foreach($data->field('related') as $related) {$related_post = pods('blog')->find(array('limit' => 1, 'where' => 't.id = '.$related['ID']));
                    while ( $related_post->fetch() ) { ?>
                        <div class="col-md-6 col-xs-12">
                            <div class="blog-item">
                                <div class="blog-item-heading">
                                    <div class="blog-item-heading-wrap">
                                        <a class="image-wrap"
                                           href="<?php echo $related_post->display( 'external_link' )?>"
                                           data-src="<?php echo $related_post->display( 'image' )?>">
                                        </a>
                                        <?php if($related_post->field( 'blog_type' ) == 1) { ?>
                                            <a href="/blog-search?type=<?=$related_post->display( 'blog_type' )?>" class="tag-doubled night-blue">
                                                <span><?php echo $related_post->display( 'blog_type' )?></span>
                                                <span><?php echo $related_post->display( 'file_type' )?></span>
                                            </a>
                                        <?php }else{  ?>
                                            <a href="/blog-search?type=<?=$related_post->display( 'blog_type' )?>" class="tag">
                                                <?php echo $related_post->display( 'blog_type' )?>
                                            </a>
                                        <?php } ?>
                                        <span class="date"><?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?></span>
                                        <div class="blog-statistics">
                                            <?php
                                            $settings = pods('ui_settings');
                                            if( $settings->field('dispaly_react_system_blog')){ ?>
                                                <ul class="links-list">
                                                    <li>
                                                        <i class="icon icon-views"></i>
                                                        <?php echo $data->display( 'views'); ?>
                                                    </li>
                                                    <li>
                                                        <i class="icon icon-clap"></i>
                                                        <?php echo $data->display( 'claps' )?>
                                                    </li>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <h3 title="<?php echo $data->display( 'post_title' )?>">
                                        <a class="truncate" href="<?php echo get_post_permalink( $related_post->display( 'id' ) ) ?>">
                                            <?php echo $related_post->display( 'post_title' )?>
                                        </a>
                                    </h3>
                                    <?php echo $related_post->display( 'post_content' )?>
                                    <div class="blog-statistics blog-statistics-mobile">
                                        <?php
                                        if( $settings->field('dispaly_react_system_blog')){ ?>
                                            <ul class="links-list">
                                                <li>
                                                    <i class="icon icon-views"></i>
                                                    <?php echo $data->display( 'views')?>
                                                </li>
                                                <li>
                                                    <i class="icon icon-clap"></i>
                                                    <?php echo $data->display( 'claps' )?>
                                                </li>
                                            </ul>
                                        <?php }  ?>
                                    </div>
                                    <a href="<?php echo get_post_permalink( $related_post->display( 'id' ) ) ?>"
                                       target="_blank"
                                       class="btn-icon blue transparent">
                                        <i class="ic ic-arrow">
                                            <span></span>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
            </div>
            <?php } ?>
            <?php    }}else{ ?>
                <script language="javascript" type="text/javascript">
                    document.location = "/404";
                </script>
            <?php }  ?>
        </div>
    </div>
    
            <!-- Dont touch -->
            <?php //hys_new_view('blog',$id) ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    $('.btn-clap').on('mousedown', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var clapCount = $('.clap-count');
                        var clapIcon = $this.find('.icon-clap');
                        clapIcon.addClass('scale-animation');
                        setTimeout(function() {
                            clapIcon.removeClass('scale-animation')
                        }, 500);
                        $.ajax({
                            url: "/wp-content/themes/nt-conversi/actions/clap.php", //the page containing php script
                            type: "post", //request type,
                            dataType: 'json',
                            data: {id: '<?=$id?>', pods: "blog"}
                        });
                        clapCount.html(parseInt(clapCount.html()) + 1);
                    });
                    $('#facebook, #twitter , #linkedin').on('mouseup', function (e) {
                        e.preventDefault();
                        var soc = $(this).attr('id');
                        $.ajax({
                            url: "/wp-content/themes/nt-conversi/actions/"+soc+"_share.php", //the page containing php script
                            type: "post", //request type,
                            dataType: 'json',
                            data: {id: '<?=$id?>', pods: "blog"}
                        });
                        $('.'+soc+'-count').html(parseInt($('.'+soc+'-count').html()) + 1);
                    });
                });
            </script>
            <!-- Dont touch -->
</section>

<?php

if (  is_active_sidebar( 'blog-view-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'blog-view-page' ) ) : ?>
        <?php dynamic_sidebar( 'blog-view-page' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>

