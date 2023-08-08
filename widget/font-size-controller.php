<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/**
* About Widget with Social for footer by DocfiTheme
**/
class DocfiTheme_FontSize_Controller_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt_fontsize_controller_widget',
			'description' => esc_html__( 'Font-Size Controller' , 'docfi-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-about-social', esc_html__( 'Docfi : Font-Size Controller' , 'docfi-core' ), $widget_ops );
		$this->alt_option_name = 'docfi_about_widget';
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
		}
		?>
		<div class="rt-about-widget">
			<?php if( !empty( $instance['text_label'] ) ) { ?>
				<h3 class="social-label"><?php echo wp_kses_post( $instance['text_label'] ); ?></h3>
			<?php } ?>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['text_label']   = ( ! empty( $new_instance['text_label'] ) ) ? wp_kses_post( $new_instance['text_label'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       => esc_html__( 'Font-Size: Controller' , 'docfi-core' ),
			'text_label'=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'        => array(
				'label'    => esc_html__( 'Title', 'docfi-core' ),
				'type'     => 'text',
			),		
			'text_label'  => array(
				'label'    => esc_html__( 'Label', 'docfi-core' ),
				'type'     => 'text',
				),
			);
		
		RT_Widget_Fields::display( $fields, $instance, $this );
	}	
}