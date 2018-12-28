<?php

/**
 * Adds book_meeting_form widget.
 */
class book_meeting_form extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'book_meeting_form', // Base ID
            esc_html__( 'Book a meeting block', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Book a meeting block', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        $settings = pods('book_meeting_block')->find();
        $title =  isset($instance['title']) ?  $instance['title'] : $settings->display('title');
        $description = isset($instance['description']) ?  $instance['description'] : $settings->display('description');
        $external_link = isset($instance['external_link']) ?  $instance['external_link'] : $settings->display('external_link');
        echo do_shortcode('[get_book_meeting_block title="'.$title.'" description="'.$description.'" link="'.$external_link.'"] ');
    }
    public function form( $instance )
    {
        $settings = pods('book_meeting_block')->find();
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( $settings->display('title'), 'text_domain' );
        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( $settings->display('description'), 'text_domain' );
        $external_link = ! empty( $instance['external_link'] ) ? $instance['external_link'] : esc_html__( $settings->display('external_link'), 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label>
            <textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'external_link' ) ); ?>"><?php esc_attr_e( 'External link:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'external_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'external_link' ) ); ?>" type="text" value="<?php echo esc_attr( $external_link ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['external_link'] = ( ! empty( $new_instance['external_link'] ) ) ? strip_tags( $new_instance['external_link'] ) : '';
        return $instance;
    }

}
function register_book_meeting_form() {
    register_widget( 'book_meeting_form' );
}
add_action( 'widgets_init', 'register_book_meeting_form' );
?>