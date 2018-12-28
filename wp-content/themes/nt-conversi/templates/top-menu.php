<ul id="primary-menu-affix" class="nav navbar-nav primary-menu">
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
</ul>