<?php

/**
 * Adds subscribe_form widget.
 */
class subscribe_form extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'subscribe_form', // Base ID
            esc_html__( 'Subscribe form', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Subscribe form', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        $settings = pods('subscribe_block')->find();
        $title =  isset($instance['title']) ?  $instance['title'] : $settings->display('title');
        $description = isset($instance['description']) ?  $instance['description'] : $settings->display('description');
        echo do_shortcode('[get_subscribe_block title="'.$title.'" description="'.$description.'"]');
    }
    public function form( $instance )
    {
        $settings = pods('subscribe_block')->find();
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( $settings->display('title'), 'text_domain' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( $settings->display('description'), 'text_domain' );
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
function register_subscribe_form() {
    register_widget( 'subscribe_form' );
}
add_action( 'widgets_init', 'register_subscribe_form' );
?>