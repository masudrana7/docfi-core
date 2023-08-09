<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class DocfiTheme_About_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'docfi_about_author', // Base ID
            esc_html__( 'Docfi : About Author', 'docfi-core' ), // Name
            array( 'description' => esc_html__( 'About Author Widget', 'docfi-core' ) ) // Args
        );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		if( isset( $instance['bg_image'] ) ) {
			$bg_img = wp_get_attachment_image_url($instance['bg_image'],'full');
		}else {
			$bg_img = "";
		}

		?>
		
		<div class="author-widget" style="background-image: url(<?php echo $bg_img; ?>)">
			<?php
			if( !empty( $instance['subtitle'] ) ){
				?><h3><?php echo esc_html( $instance['subtitle'] ); ?></h3><?php
			}
			if( !empty( $instance['text'] ) ){
				?><p><?php echo esc_html( $instance['text'] ); ?></p><?php
			}
			if( !empty( $instance['buttontext'] ) ){
				?><a class="about-btn button-style-2 btn-common" href="<?php echo esc_url( $instance['buttonurl'] ); ?>"><?php echo esc_html( $instance['buttontext'] ); ?><i class="icon-docfi-right-arrow"></i></a><?php
			}
			?>

		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['offer']  = ( ! empty( $new_instance['offer'] ) ) ? sanitize_text_field( $new_instance['offer'] ) : '';
		$instance['bg_image']  = ( ! empty( $new_instance['bg_image'] ) ) ? sanitize_text_field( $new_instance['bg_image'] ) : '';
		$instance['subtitle']  = ( ! empty( $new_instance['subtitle'] ) ) ? wp_kses_post( $new_instance['subtitle'] ) : '';
		$instance['text']      = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
		$instance['buttontext']     = ( ! empty( $new_instance['buttontext'] ) ) ? sanitize_text_field( $new_instance['buttontext'] ) : '';
		$instance['buttonurl']     = ( ! empty( $new_instance['buttonurl'] ) ) ? sanitize_text_field( $new_instance['buttonurl'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'About Author' , 'docfi-core' ),
			'subtitle'		=> '',
			'text'			=> '',
			'bg_image'    	=> '',
			'buttontext'   => '',
			'buttonurl'   	=> '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'docfi-core' ),
				'type'  => 'text',
			),
			'bg_image'    => array(
				'label'   => esc_html__( 'background image', 'docfi-core' ),
				'type'    => 'image',
			),
			'subtitle' => array(
				'label'   => esc_html__( 'Sub Title', 'docfi-core' ),
				'type'    => 'text',
			),
			'text' => array(
				'label'   => esc_html__( 'Text', 'docfi-core' ),
				'type'    => 'text',
			),
			'buttontext'     => array(
				'label' => esc_html__( 'Button Text', 'docfi-core' ),
				'type'  => 'text',
			),
			'buttonurl'     => array(
				'label' => esc_html__( 'Button URL', 'docfi-core' ),
				'type'  => 'text',
			), 
			
		);
		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}