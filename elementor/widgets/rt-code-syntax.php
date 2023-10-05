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

class RT_code_syntax extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Code Syntax', 'docfi-core' );
		$this->rt_base = 'rt-code-syntax';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'RT Code Syntax', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'faktorie-core' ),
				'default' => esc_html__( 'Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm rsus consectetur elit.', 'faktorie-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Style', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Text Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .font-size-controller-btn-wrapper button',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .font-size-controller-btn-wrapper button' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_color',
				'label'   => esc_html__( 'Background Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .font-size-controller-btn-area' => 'background: {{VALUE}}',
				),
			),							
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Text Color', 'docfi-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .font-size-controller-btn-area' => 'border-color: {{VALUE}}',
				),
			),							
	        array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	protected function render() {
		$data = $this->get_settings();
		$template = 'rt-code-syntax';
		return $this->rt_template( $template, $data );
	}
}