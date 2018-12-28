<?php

/**
 * Adds hys_blog_main_block widget.
 */
class hys_blog_main_block extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'hys_blog_main_block', // Base ID
            esc_html__( 'Blog Main Block', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Blog Main Block', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        get_template_part('widget-templates/blog-main-block');
    }

}
function register_hys_blog_main_block() {
    register_widget( 'hys_blog_main_block' );
}
add_action( 'widgets_init', 'register_hys_blog_main_block' );
?>