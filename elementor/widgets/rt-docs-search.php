<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;
class RT_Docs_Search extends Custom_Widget_Base {
	
    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'RT Search Ajax', 'docfi-core' );
        $this->rt_base  = 'rt-docs-search';
        parent::__construct( $data, $args );
    }
    public function rt_fields(){
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'searches_word', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Searches Word', 'docfi-core' ),
				'default' => esc_html__( 'WordPress' , 'docfi-core' ),
				'label_block' => true,
			)
		);
		$fields = array(
			array(
				'mode'  => 'section_start',
				'id'    => 'section_general',
				'label' => __( 'General', 'docfi-core' )
			),
			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'popular_text',
				'label'   => esc_html__( 'Popular Text', 'docfi-core' ),
				'default' => 'Popular:',
			),

		

			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'word_repeat',
				'label'   => esc_html__( 'Words', 'docfi-core' ),
				'title_field' => '{{{ searches_word }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'January', ],
				),
			),

			array(
				'mode'  => 'section_end'
			),
			/*style*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'tab'     => Controls_Manager::TAB_STYLE,
				'label'   => __( 'Style', 'docfi-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-docs-search .rt-dropdown .rt-btn',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-docs-search .input-group-append button',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => __( 'Category Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-search .rt-drop-menu li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-docs-search .rt-dropdown .rt-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => __( 'Button Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-search .input-group-append button' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => __( 'Button BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-docs-search .input-group-append button' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'  => 'section_end'
			),
			// Animation style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_animation_style',
				'label'   => esc_html__( 'Animation', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'docfi-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'docfi-core' ),
					'hide'        => esc_html__( 'Off', 'docfi-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'docfi-core' ),
				'options' => array(
					'none' => esc_html__( 'none', 'docfi-core' ),
					'bounce' => esc_html__( 'bounce', 'docfi-core' ),
					'flash' => esc_html__( 'flash', 'docfi-core' ),
					'pulse' => esc_html__( 'pulse', 'docfi-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'docfi-core' ),
					'shakeX' => esc_html__( 'shakeX', 'docfi-core' ),
					'shakeY' => esc_html__( 'shakeY', 'docfi-core' ),
					'headShake' => esc_html__( 'headShake', 'docfi-core' ),
					'swing' => esc_html__( 'swing', 'docfi-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'docfi-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'docfi-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'docfi-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'docfi-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'docfi-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'docfi-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'docfi-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'docfi-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'docfi-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'docfi-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'docfi-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'docfi-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'docfi-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'docfi-core' ), 
				),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'docfi-core' ),
				'default' => '0.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'docfi-core' ),
				'default' => '1.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
       
    }
	protected function render() {
		$data = $this->get_settings();
		$template = 'rt-docs-search';
		return $this->rt_template( $template, $data );
	}

}
