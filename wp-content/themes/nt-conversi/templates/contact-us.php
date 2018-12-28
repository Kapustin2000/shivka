<?php
/*
Template Name: Contact - Us
*/
?>
<?php $settings = pods('website_settings'); ?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<section class="contact-us">
    <div class="container">
        <div class="container-mx">
            <div class="row">
                <div class="hys-contact-form col-lg-6 col-xs-12">
                    <div class="form-wrap">
                        <form action="#" id="contact-form" class="contact-form" method="post" novalidate>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="text-night-blue">Contact Us</h2>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group form-group-floating">
                                        <input maxlength="200" type="text" id="full_name" name="full_name">
                                        <label for="full_name">Your Name (optional)</label>
                                    </div>
                                    <div class="form-group form-group-floating">
                                        <input type="text" id="email" name="email" data-unvalid="Valid email required" required>
                                        <label for="email">Your Email</label>
                                        <div class="error-tooltip">
                                            <div class="icon icon-question"></div>
                                            <div class="tooltip"></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-floating">
                                        <textarea name="message" id="message" rows="1" required></textarea>
                                        <label for="message">Message</label>
                                        <div class="error-tooltip">
                                            <div class="icon icon-question"></div>
                                            <div class="tooltip"></div>
                                        </div>
                                    </div>
                                    <div class="form-group checkbox-wrap">
                                        <label>
                                            <input type="checkbox" id="privacy-policy" required>
                                            <label for="privacy-policy"></label>
                                            <span>
                                                I’ve read and understand <a href="/privacy-policy" class="blue" target="_blank">Privacy Policy</a> and I want to receive commercial communications and marketing information from HYS Enterpise
                                            </span>
                                        </label>
                                        <div class="error-tooltip">
                                            <div class="icon icon-question"></div>
                                            <div class="tooltip"></div>
                                        </div>
                                    </div>
                                    <div class="submit-wrap">
                                        <button type="submit" class="btn blue">Send</button>
                                        <div class="form-message"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hys-contacts col-lg-offset-1 col-lg-5 col-xs-12">
                    <div class="media">
                        <h3><a href="mailto:<?=$settings->display('email')?>" class="blue"><?=$settings->display('email')?></a></h3>
                        <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                            <ul class="social-icons">
                                <li><a target="_blank" href="<?=$settings->display('instagram')?>"> <i class="icon-instagram"></i> </a></li>
                                <li><a target="_blank" href="<?=$settings->display('facebook')?>"> <i class="icon-facebook"></i> </a></li>
                                <li><a target="_blank" href="<?=$settings->display('linkedin')?>"> <i class="icon-linkedin"></i> </a></li>
                                <li><a target="_blank" href="<?=$settings->display('twitter')?>"> <i class="icon-twitter"></i> </a></li>
                                <li><a target="_blank" href="<?=$settings->display('youtube')?>"> <i class="icon-youtube"></i> </a></li>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="hys-contacts-list">
                        <!-- HR -->
                        <?php
                        $hr_params = array(
                            'orderby' => 'order_weight.meta_value DESC , id DESC',
                        );
                        $hr = pods('hr')->find($hr_params);

                        while ( $hr->fetch() ) { ?>
                            <div class="contact-item"> 
                                <small class="purpose-type"><?=$hr->display('post_content')?></small>
                                <div class="contact-info">
                                    <div class="contact-avatar" data-src="<?php echo $hr->display('avatar'); ?>"></div>
                                    <div>
                                        <h3><?php echo $hr->display('first_name'); ?> <?php echo $hr->display('last_name'); ?></h3>
                                        <small><?php echo $hr->display('position'); ?></small>
                                    </div>
                                </div>
                                <ul class="contact-social">
                                    <li>
                                        <a href="maito:<?php echo $hr->display('email'); ?>" class="blue"><?php echo $hr->display('email'); ?></a>
                                    </li>
                                    <li>
                                        <a href="skype:<?php echo $hr->display('skype_link'); ?>?userinfo">
                                            <i class="icon icon-skype-fill">
                                                <span class="path1"></span><span class="path2"></span>
                                            </i>
                                        </a>
                                        <a href="<?php echo $hr->display('linkedin_link');?>" target="_blank">
                                            <i class="icon icon-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="hys-offices col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="text-night-blue">Our Offices</h3>
                        </div>
                        <?php
                        $offices = pods('offices')->find();
                        $offices_blocks = array();

                        while($offices->fetch()){
                            if(!array_key_exists($offices->display('country'),$offices_blocks)){
                                $offices_blocks[$offices->display('country')] = array();
                            }
                            array_push($offices_blocks[$offices->display('country')], array(
                                'street' =>  $offices->display('street'),
                                'country' =>  $offices->display('country'),
                                'google_link' =>  $offices->display('google_link'),
                            ));
                        };
                        ?>
                        <!-- Offices display -->
                        <?php
                        foreach($offices_blocks as $key=>$val){ ?>
                            <div class="col-lg-6 col-xs-12">
                                <div class="office-item">
                                    <div class="office-map hidden-md hidden-sm hidden-xs" data-src="/wp-content/themes/nt-conversi/images/<?=$key?>-map.jpg"></div>
                                    <h2><?=$key?></h2>
                                    <ul>
                                        <?php foreach($val as $office){ ?>
                                            <li>
                                                <a href="<?php echo $office['google_link'] ?>"
                                                   target="_blank"><?php echo $office['street'] ?></a>
                                            </li>
                                        <?php   } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php  }  ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section> 

<?php echo do_shortcode('[get_book_meeting_block]') ?>

<?php get_footer(); ?>
