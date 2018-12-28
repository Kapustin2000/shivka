<?php

/**
 * Adds ask_reference_form widget.
 */
class ask_reference_form extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'ask_reference_form', // Base ID
            esc_html__( 'Ask a reference form', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Ask a reference form', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        $settings = pods('front_page_settings')->find();
        $title =  isset($instance['title']) ?  $instance['title'] : $settings->display('reference_title');
        $description = isset($instance['description']) ?  $instance['description'] : $settings->display('reference_description');
        echo do_shortcode('[get_reference_block title="'.$title.'" description="'.$description.'"]');
    }
    public function form( $instance )
    {
        $settings = pods('front_page_settings')->find();
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( $settings->display('reference_title'), 'text_domain' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( $settings->display('reference_description'), 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label>
            <textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        return $instance;
    }

}
function register_ask_reference_form() {
    register_widget( 'ask_reference_form' );
}
add_action( 'widgets_init', 'register_ask_reference_form' );
?>