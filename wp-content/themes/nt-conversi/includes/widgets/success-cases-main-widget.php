<?php

/**
 * Adds success_cases_main_block widget.
 */
class success_cases_main_block extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'success_cases_main_block', // Base ID
            esc_html__( 'Success cases', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Success cases from main page (text left,cases right)', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        get_template_part('widget-templates/success-cases-main-block');
    }

}
function register_success_cases_main_block() {
    register_widget( 'success_cases_main_block' );
}
add_action( 'widgets_init', 'register_success_cases_main_block' );
?>