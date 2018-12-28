<?php

/**
 * Adds reference_slider widget.
 */
class reference_slider extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'reference_slider', // Base ID
            esc_html__( 'Reference Slider', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Reference Slider', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        get_template_part('widget-templates/reference-slider-block');
    }

}
function register_reference_slider() {
    register_widget( 'reference_slider' );
}
add_action( 'widgets_init', 'register_reference_slider' );
?>