<?php 
/**
 * Adds footertWidget widget.
 */
class footertWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'footer_widget', // Base ID
			__( 'Footer Logo and Contact Infrmation', 'acframework' ), // Name
			array( 'description' => __( 'Add fields in the theme options footer section.', 'acframework' ), ) // Args
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
		$footer_options = get_option('ac_footer_settings');
		$general_options = get_option('ac_general_settings');

		$phone_number = $general_options['ac_number'];
		$footer_logo_url = $footer_options['footer_logo_image'];
		$footer_logo_id = ac_get_image_id($footer_logo_url);
		$footer_logo_alt = get_post_meta($footer_logo_id, '_wp_attachment_image_alt', true);
		$footer_address = $footer_options['footer_address'];
		$footer_chat_title = $footer_options['footer_chat_title'];

		echo $args['before_widget'];
		echo '<a href="'. home_url() .'"><img class="footer-logo" src="'. $footer_logo_url .'" alt="'. ( !empty($footer_logo_alt ) ? $footer_logo_alt : get_bloginfo( 'name') ) .'"></a>';
		echo '<div class="footer-address">'. htmlspecialchars_decode($footer_address) .'</div>';
		echo '<div class="chat-wrap"><span class="icon"></span><a href="#" onclick="Comm100API.open_chat_window(event, 1225);">'. $footer_chat_title .'</a></div>';
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
		?>
		<p>Please enter the option in the Footer Section of the Theme Options.</p>
		<?php 
	}

}
// register footerWidget widget
function register_footer_widget() {
    register_widget( 'footertWidget' );
}
add_action( 'widgets_init', 'register_footer_widget' );