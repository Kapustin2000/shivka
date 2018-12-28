<ul>
    <li>
        <a id="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
            <i class="icon icon-facebook"></i>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="icon icon-instagram"></i>
        </a>
    </li>
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