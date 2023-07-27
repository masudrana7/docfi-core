<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Service_Tab extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Service Tab', 'docfi-core' );
		$this->rt_base = 'rt-service-tab';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'docfi-core' ),
				'default' => esc_html__( 'Tab Title' , 'docfi-core' ),
				'label_block' => true,
            )
		);

		$repeater->add_control(
			'sub_title', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Sub Title', 'docfi-core' ),
				'default' => esc_html__( 'Wiam iaculis Morbienim' , 'docfi-core' ),
				'label_block' => true,
            )
		);

		$repeater->add_control(
			'count_title', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title Count', 'docfi-core' ),
				'default' => esc_html__( '01' , 'docfi-core' ),
				'label_block' => true,
            )
		);

		$repeater->add_control(
			'content', array(
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus error sittery voluptatem accusantium doloremque lauda awrntiu totam rem aperiam, eaque ipsa quaed ieawr nven tore veritatis et quasi architecto' , 'docfi-core' ),
				'label_block' => true,
            )
		);
		$repeater->add_control(
            'selected_icon',[
                'label' => esc_html__( 'Icon', 'docfi-core' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-plus',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
            ]
        );

        $repeater->add_control(
			'image', array(
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__( 'Image', 'docfi-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'description' => esc_html__( 'Recommended full image', 'docfi-core' ),
				'label_block' => true,
            )
		);
		$repeater->add_control(
			'buttontext', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'docfi-core' ),
				'default' => esc_html__( 'Take Our Service', 'docfi-core' ),
				'label_block' => true,
            )
		);
		$repeater->add_control(
			'url', array(
				'type' => \Elementor\Controls_Manager::URL,
				'label' => esc_html__( 'Link (Optional)', 'docfi-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
            )
		);		

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'docfi-core' ),
			),

			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'docfi-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Tab Layout 1', 'docfi-core' ),
					'layout2' => esc_html__( 'Tab Layout 2', 'docfi-core' ),
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'tab_items',
				'label'   => esc_html__( 'Address', 'docfi-core' ),
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'Power & Energy Sector', ],
					['title' => 'Explore Tiling & Painiting', ],
					['title' => 'Modern Architecture & Building', ],
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_option',
				'label'   => esc_html__( 'Option', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'icon_display',
				'label'       => esc_html__( 'Icon Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Icon. Default: On', 'docfi-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'action_display',
				'label'       => esc_html__( 'Action Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Action. Default: On', 'docfi-core' ),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'docfi-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} .rt-service-tab img',		
			),
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout1' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'insurex-core' ),
				'selector' => '{{WRAPPER}} .rt-service-tab .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .entry-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .sub-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'line_color',
				'label'   => esc_html__( 'Line Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .entry-title .titleline' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'line_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Line Width', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .entry-title.active-animation .titleline' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'title_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Title Space', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout1' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'insurex-core' ),
				'selector' => '{{WRAPPER}} .rt-service-tab .entry-content',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .entry-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'list_icon_color',
				'label'   => esc_html__( 'Icon Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab ul li:before' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Section title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'section_title_style',
	            'label'   => esc_html__( 'Section Title', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout2' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sec_title_typo',
				'label'   => esc_html__( 'Title Typo', 'insurex-core' ),
				'selector' => '{{WRAPPER}} .rt-service-tab .section-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sec_title_color',
				'label'   => esc_html__( 'Title Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .section-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sec_sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .section-subtitle' => 'color: {{VALUE}}',
				),				
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sec_sub_line_color',
				'label'   => esc_html__( 'Line Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .section-subtitle .line' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'section_title',
				'label'   => esc_html__( 'Section Title', 'docfi-core' ),
				'default' => esc_html__( 'Welcome To Docfi', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'section_sub_title',
				'label'   => esc_html__( 'Section Sub Title', 'docfi-core' ),
				'default' => esc_html__( 'ABOUT DOCFI', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'section_text',
				'label'   => esc_html__( 'Content', 'docfi-core' ),
				'default' => esc_html__( 'It is a long established fact that reader will bear awrw Follow distracted the readable content of a page flow when looking at it will beayout and the point of using lorem ipsum.s area layout gear.', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'section_text_color',
				'label'   => esc_html__( 'Content Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .section-content' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'section_padding',
	            'label'   => __( 'Section Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-service-tab-layout2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',               
	            ),
	            'condition'   => array( 'layout' => array( 'layout2' ) ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'section_bg_color',
				'label'   => esc_html__( 'Section Background Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab-layout2' => 'background-color: {{VALUE}}',
				),
			),
	        array(
				'mode' => 'section_end',
			),

			// Layout option two
			array(
	            'mode'    => 'section_start',
	            'id'      => 'layout_option_two',
	            'label'   => esc_html__( 'Option', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout2' ) ),
	        ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'layout_two_content',
				'label'       => esc_html__( 'Content Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: Off', 'docfi-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'layout_two_icon',
				'label'       => esc_html__( 'Icon Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Icon. Default: On', 'docfi-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'layout_two_content_color',
				'label'   => esc_html__( 'Content Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab-layout2 .content-wrap' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'layout_two_title_color',
				'label'   => esc_html__( 'Title Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item .entry-title' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item .list-counter' => '-webkit-text-stroke-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'layout_two_sub_title_color',
				'label'   => esc_html__( 'SubTitle / Line Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item .sub-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item .list-counter::after' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'layout_two_hover_color',
				'label'   => esc_html__( 'Hover Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item:hover .entry-title, .rt-service-tab-layout2 .list-item.active .entry-title' => '-webkit-text-fill-color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item:hover .sub-title, .rt-service-tab-layout2 .list-item.active .sub-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item:hover .list-counter, .rt-service-tab-layout2 .list-item.active .list-counter' => '-webkit-text-fill-color: {{VALUE}}',
					'{{WRAPPER}} .rt-service-tab-layout2 .list-item.active .list-counter::after' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_button_style',
	            'label'   => esc_html__( 'Button', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout1' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'insurex-core' ),
				'selector' => '{{WRAPPER}} .rt-service-tab .action-button a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => esc_html__( 'Button Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .action-button a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Button BG Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .action-button a' => 'Background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_hov_color',
				'label'   => esc_html__( 'Button Hover Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .action-button a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_hov_color',
				'label'   => esc_html__( 'Button BG Hover Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .action-button a:before' => 'Background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_color',
				'label'   => esc_html__( 'Button Border Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .action-button a' => 'border-color: {{VALUE}}',
				),
			),			
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'button_padding',
	            'label'   => __( 'Padding', 'docfi-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-service-tab .action-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Content Icon style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_icon',
	            'label'   => esc_html__( 'Content Icon', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'layout' => array( 'layout1' ) ),
	        ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'content_icon_size',
				'label'   => esc_html__( 'Icon Size', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .content-icon' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_icon_color',
				'label'   => esc_html__( 'Icon Color', 'insurex-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .content-icon' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'content_icon_right',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Left/Right', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .content-icon' => 'right: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'content_icon_bottom',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Top/Bottom', 'docfi-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-service-tab .content-icon' => 'bottom: {{SIZE}}{{UNIT}};',
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

		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'rt-service-tab-2';
			break;
			default:
			$template = 'rt-service-tab-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}