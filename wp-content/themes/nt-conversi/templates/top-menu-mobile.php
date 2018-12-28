<?php $settings = pods('website_settings'); ?>
<ul id="mobile-menu-affix" class="nav navbar-nav mobile-menu">
    <li class="menu-item">
        <a title="Industries"
           href="#"
           data-toggle="dropdown"
           class="dropdown-toggle"
           aria-expanded="false">
            Industries <span class="caret"></span></a>
        <ul role="menu" class="sub-menu dropdown-menu">
            <?php
            $data = pods('industry')->find(
                array(
                    'orderby' => 'order_weight.meta_value DESC , term_id DESC',
                )
            ); ?>
            <?php while ( $data->fetch() ) {  if( $data->display('count') > 0) {   ?>
                <li class="menu-item"><a href="/industries/?id=<?=$data->display( 'slug' )?>"><?=$data->display( 'name' )?></a></li>
            <?php } } ?>
        </ul>
    </li>
    <li class="menu-item">
        <a title="Success Cases"
           href="/success-cases/">
            Success Cases
        </a>
    </li>
    <li class="menu-item">
        <a title="Company"
           href="/company/">
            Company
        </a>
    </li>
    <li class="menu-item">
        <a title="Career"
           href="/career/">Career</a>
    </li>
    <li class="menu-item">
        <a title="Blog"
           href="/blog/">
            Blog
        </a>
    </li>
    <li class="menu-item">
        <a title="Contact us"
           href="/contact-us/">
            Contact us
        </a>
    </li>
    <li class="menu-item social">
        <?php if(!isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
            <ul class="social-icons">
                <li><a target="_blank" href="<?=$settings->display('instagram')?>"> <i class="icon-instagram"></i> </a></li>
                <li><a target="_blank" href="<?=$settings->display('facebook')?>"> <i class="icon-facebook"></i> </a></li>
                <li><a target="_blank" href="<?=$settings->display('linkedin')?>"> <i class="icon-linkedin"></i> </a></li>
                <li><a target="_blank" href="<?=$settings->display('twitter')?>"> <i class="icon-twitter"></i> </a></li>
                <li><a target="_blank" href="<?=$settings->display('youtube')?>"> <i class="icon-youtube"></i> </a></li>
            </ul>
        <?php } ?>
    </li>
</ul>