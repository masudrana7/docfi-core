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
use Elementor\Group_Control_Box_Shadow;

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
				'label' => esc_html__( 'Search Word', 'docfi-core' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'docfi-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'docfi-core' ),
					'style2' => esc_html__( 'Style 2', 'docfi-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'placeholder',
				'label'   => esc_html__( 'Placeholder Text', 'docfi-core' ),
				'default' => esc_html__( 'What are you looking for?', 'docfi-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'category_show',
				'label'       => esc_html__( 'Display Category', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'btn_text',
				'label'       => esc_html__( 'Display Button', 'docfi-core' ),
				'label_on'    => esc_html__( 'Show', 'docfi-core' ),
				'label_off'   => esc_html__( 'Hide', 'docfi-core' ),
				'default'     => 'yes',
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
				'selector' => '{{WRAPPER}} .rt-searchbox-container .current',
				'condition' => array( 'category_show' => array( 'yes' ) ),
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => __( 'Category Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-searchbox-container .current' => 'color: {{VALUE}}',
				),
				'condition' => array( 'category_show' => array( 'yes' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo_drop',
				'label'   => esc_html__( 'Dropdown Category Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-searchbox-container .list li',
				'condition' => array( 'category_show' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color_drop',
				'label'   => __( 'Dropdown Category Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-searchbox-container .list li' => 'color: {{VALUE}}',
				),
				'condition' => array( 'category_show' => array( 'yes' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .searchbox-submit .rt-searchbox-btn',
			),
			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => __( 'Button Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => __( 'Button BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'background: {{VALUE}}',
				),
			),

			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_hover_color',
				'label'   => __( 'Button Hover BG Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-searchbox-btn:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rt-searchbox-btn:hover:before' => 'background: {{VALUE}}',
				),
			),

			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'btn_padding',
	            'label'   => __( 'Button Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey',
				'label'   => __( 'Search Key Title Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-hero-section-content-wrapper .search-text span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey_text',
				'label'   => __( 'Search Key Text Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-search-key li:before' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-key li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'searchkey_text_hover',
				'label'   => __( 'Search Key Text Hover Color', 'docfi-core' ),
				'selectors' => array(
					'{{WRAPPER}} .rt-search-key li:after' => 'background: {{VALUE}} !important',
					'{{WRAPPER}} .rt-search-key li a:hover' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .rt-search-key li:hover:before' => 'color: {{VALUE}} !important',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'      => 'item_boxshadow',
				'label'   => esc_html__( 'Box Shadow', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-searchbox-container'

			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Box Radius', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-searchbox-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	                '{{WRAPPER}} .searchbox-submit .rt-searchbox-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	        ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo_icon',
				'label'   => esc_html__( 'Button Icon Typo', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .searchbox-submit .rt-searchbox-btn i',
			),
			
			array(
				'mode'  => 'section_end'
			),
		);
		return $fields;
       
    }

	protected function render() {
		$data = $this->get_settings();
		switch ( $data['style'] ) {
			case 'style2':
			$template = 'rt-docs-search-2';
			break;
			default:
			$template = 'rt-docs-search';
			break;
		}
		return $this->rt_template( $template, $data );
	}

}
