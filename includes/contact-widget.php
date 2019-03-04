<?php 
/**
 * Adds contactWidget widget.
 */
class contactWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contact_widget', // Base ID
			__( 'Contact US Whitesands', 'acframework' ), // Name
			array( 'description' => __( 'Chat and Clickable Phone number widget', 'acframework' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$homepage_options = get_option('ac_homepage_settings');
		$general_options = get_option('ac_general_settings');
		$phone_number = $general_options['ac_number'];
		$call_image_url = $homepage_options['cta_button_image_one'];
		$call_image_id = ac_get_image_id($call_image_url);
		$call_alt = get_post_meta($call_image_id, '_wp_attachment_image_alt', true);
		$chat_image_url = $homepage_options['cta_button_image_two'];
		$chat_image_id = ac_get_image_id($chat_image_url);
		$chat_alt = get_post_meta($chat_image_id, '_wp_attachment_image_alt', true);

		echo $args['before_widget'];
			echo '<div class="call-wrap"><a href="tel:'. preg_replace("/[^0-9,.]/", "", $phone_number) .'"><img class="call-image contact-image" src="'. $call_image_url .'" alt="'. ( !empty($call_alt) ? $call_alt : get_bloginfo( 'name') ) .'"></a></div>';
	
			echo '<div class="chat-wrap"><a href="#" onclick="Comm100API.open_chat_window(event, 1225);"><img class="chat-image contact-image" src="'. $chat_image_url .'" alt="'  . ( !empty($chat_alt) ? $call_alt : get_bloginfo( 'name') ) . '"></a></div>';
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$call_title = ! empty( $instance['call_title'] ) ? $instance['call_title'] : __( 'Call our 24 Hour Help Line', 'acframework' );
		$chat_title = ! empty( $instance['chat_title'] ) ? $instance['chat_title'] : __( 'Chat With us Online Today', 'acframework' );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'call_title' ); ?>"><?php _e( 'Call Us Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'call_title' ); ?>" name="<?php echo $this->get_field_name( 'call_title' ); ?>" type="text" value="<?php echo esc_attr( $call_title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'chat_title' ); ?>"><?php _e( 'Chat Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'chat_title' ); ?>" name="<?php echo $this->get_field_name( 'chat_title' ); ?>" type="text" value="<?php echo esc_attr( $chat_title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['call_title'] = ( ! empty( $new_instance['call_title'] ) ) ? strip_tags( $new_instance['call_title'] ) : '';
		$instance['chat_title'] = ( ! empty( $new_instance['chat_title'] ) ) ? strip_tags( $new_instance['chat_title'] ) : '';
		return $instance;
	}

}
// register contactWidget widget
function register_contact_widget() {
    register_widget( 'contactWidget' );
}
add_action( 'widgets_init', 'register_contact_widget' );