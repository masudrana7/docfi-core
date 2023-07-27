<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Marquee_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Marquee Slider', 'docfi-core' );
		$this->rt_base = 'rt-marquee-slider';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater(); 
		
		$repeater->add_control(
			'title', [
				'type'  => Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'docfi-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'url', [
				'type'  => Controls_Manager::TEXT,
				'label' => esc_html__( 'URL(optional)', 'docfi-core' ),
				'label_block' => true,
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'docfi-core' ),
				'options' => array(
					'style1' => esc_html__( 'Marquee Style 1', 'docfi-core' ),
					'style2' => esc_html__( 'Marquee Style 2', 'docfi-core' ),
				),
				'default' => 'style1',
			),		
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'marquee_direction',
				'label'   => esc_html__( 'Marquee', 'docfi-core' ),
				'options' => array(
					'marquee_left' => esc_html__( 'Left Direction' , 'docfi-core' ),
					'marquee_right' => esc_html__( 'Right Direction', 'docfi-core' ),
				),
				'default' => 'marquee_left',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'marquee_slide',
				'label'   => esc_html__( 'Add as many title as you want', 'docfi-core' ),
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'Construction', ],
					['title' => 'Pre-Building', ],
					['title' => 'General Construction', ],
					['title' => 'Industrial Work', ],
				),			
			),
			array(
				'mode' => 'section_end',
			),
			
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title Typo', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-marquee-slider .rt-marquee-item .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
			 	'id'      => 'title_color',				
				'label'   => esc_html__( 'Title Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .marquee-slider-1 .rt-marquee-item .entry-title a' => '-webkit-text-stroke-color: {{VALUE}}',
					'{{WRAPPER}} .marquee-slider-2 .rt-marquee-item .entry-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image',
				'label'   => esc_html__( 'Image', 'docfi-core' ),
				'description' => esc_html__( 'Recommended full image', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
			 	'id'      => 'box_rotate',				
				'label'   => esc_html__( 'Rotate', 'docfi-core' ),
				'description' => esc_html__( 'Box rotate default use: -5deg', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .marquee-slider-2' => 'transform: rotate({{VALUE}}deg)',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'box_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Box Margin', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .marquee-slider-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'condition'   => array( 'style' => array( 'style2' ) ),
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'box_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Box Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .marquee-slider-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style2' ) ),
			),	
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();	

		$template = 'rt-marquee-slider';
		
		return $this->rt_template( $template, $data );
	}
}