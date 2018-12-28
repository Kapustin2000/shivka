<?php

/**
 * Adds social_media widget.
 */
class social_media extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'social_media', // Base ID
            esc_html__( 'Social media block', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Social media block', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        get_template_part('widget-templates/social-media-block');
    }

}
function register_social_media() {
    register_widget( 'social_media' );
}
add_action( 'widgets_init', 'register_social_media' );
?>