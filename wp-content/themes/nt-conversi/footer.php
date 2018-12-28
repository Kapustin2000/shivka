<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage nt_conversi
 * @since nt_conversi 1.0
 */
?>
<?php $settings = pods('website_settings'); ?>
<footer>

    <div class="container">
        <div class="footer-contacts">
            <div class="row">
                <div class="footer-media col-md-6 hidden-sm hidden-xs">
                    <small>Email</small>
                    <h3><a href="mailto:<?=$settings->display('email')?>"><?=$settings->display('email')?></a></h3>
                </div>
                <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                <ul class="social-icons">
                    <li><a target="_blank" href="<?=$settings->display('instagram')?>"> <i class="icon-instagram"></i> </a></li>
                    <li><a target="_blank" href="<?=$settings->display('facebook')?>"> <i class="icon-facebook"></i> </a></li>
                    <li><a target="_blank" href="<?=$settings->display('linkedin')?>"> <i class="icon-linkedin"></i> </a></li>
                    <li><a target="_blank" href="<?=$settings->display('twitter')?>"> <i class="icon-twitter"></i> </a></li>
                    <li><a target="_blank" href="<?=$settings->display('youtube')?>"> <i class="icon-youtube"></i> </a></li>
                </ul>
                <?php } ?>
                <div class="footer-offices col-md-6 col-sm-12 col-xs-12">
                    <small>Our Offices</small>
                    <ul class="location-list">
                        <?php
                        $offices = pods('offices')->find();
                        while($offices->fetch()){ ?>
                            <li>
                                <a href="<?php echo $offices->display('google_link') ?>"
                                   target="_blank" class="grey"><?php echo $offices->display('street') ?><b><?php echo $offices->field('country') ?></b></a>
                            </li>
                        <?php   }  ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-menu">
            <div class="row">
                <div class="col-lg-9 col-xs-12">
                    <ul>
                        <?php
                        $pages  = $settings->field('footer_menu');
                        if(!empty($pages)){
                            foreach($pages as $page){ ?>
                                <li><a href="/<?php  echo $page['post_name']  ; ?>"><?php echo $page['post_title']; ?></a></li>
                         <?php  } } ?>
                    </ul>
                </div>
                <div class="col-lg-3 col-xs-12"><small class="copywrite">© All rights reserved 2007 - <span id="current-year"></span></small></div>
            </div>
        </div>
    </div>

</footer>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        $("#current-year").text( (new Date).getFullYear() );
    });
</script>

<?php wp_footer(); ?>
<!-- Start of HubSpot Embed Code --> 
<?php if($settings->field('livechat') &&!is_page( 'career') && !is_page(297)) { ?>
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4264808.js"></script>
<?php } ?>
<!-- End of HubSpot Embed Code -->
<!-- #footer end -->
</body>
</html>