<?php

/**
 * Adds left_network_block widget.
 */
class left_network_block extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'left_network_block', // Base ID
            esc_html__( "Let's Network", 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Lets network block', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        get_template_part('widget-templates/lets-network-block');
    }

}
function register_left_network_block() {
    register_widget( 'left_network_block' );
}
add_action( 'widgets_init', 'register_left_network_block' );
?>