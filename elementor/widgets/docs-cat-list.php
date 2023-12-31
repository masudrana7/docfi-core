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

class Docs_Cat_List extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ){
        $this->rt_name = esc_html__( 'RT Docs Cat List', 'docfi-core' );
        $this->rt_base = 'rt-docs-cat-list';
        $this->rt_translate = array(
            'cols'  => array(
                '12' => esc_html__( '1 Col', 'docfi-core' ),
                '6'  => esc_html__( '2 Col', 'docfi-core' ),
                '4'  => esc_html__( '3 Col', 'docfi-core' ),
                '3'  => esc_html__( '4 Col', 'docfi-core' ),
                '2'  => esc_html__( '6 Col', 'docfi-core' ),
            ),
        );
        parent::__construct( $data, $args );
    }

    private function rt_load_scripts(){
        wp_enqueue_script( 'isotope-pkgd' );
    }

    public function rt_fields(){
        
        $terms  = get_terms( array( 'taxonomy' => 'docfi_docs_category', 'fields' => 'id=>name' ) );
        $category_dropdown = array( '0' => __( 'Please Selecet category', 'docfi-core' ) );
        foreach ( $terms as $id => $name ) {
            $category_dropdown[$id] = $name;
        }
        $fields = array(
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general',
                'label'   => esc_html__( 'General', 'docfi-core' ),
            ),
            /*category select( box Multi )*/
            array (
                'type'    => Controls_Manager::REPEATER,
                'id'      => 'category_list',
                'label'   => esc_html__( 'Add as many Categories as you want', 'docfi-core' ),
                'fields'  => array(
                    array(
                        'type'    => Controls_Manager::SELECT2,
                        'name'    => 'cat_multi_box',
                        'label'   => esc_html__( 'Categories', 'docfi-core' ),
                        'options' => $category_dropdown,
                        'multiple'=> false,
                        'default' => '1',
                    ),
                ),
            ),  

            array (
                'type'    => Controls_Manager::TEXT,
                'id'      => 'cat_text',
                'label'   => esc_html__( 'Category Featured Title', 'docfi-core' ),
                'default' => esc_html__( 'Featured Products New', 'docfi-core' ),
            ),

            array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'icon_display',
				'label'       => esc_html__( 'Icon Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: Show', 'docfi-core' ),
			),

            array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_desc_display',
				'label'       => esc_html__( 'Cat Description Display', 'docfi-core' ),
				'label_on'    => esc_html__( 'On', 'docfi-core' ),
				'label_off'   => esc_html__( 'Off', 'docfi-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Cat Content. Default: off', 'docfi-core' ),
			),

            /*Post Order*/         
            array(
                'type'    => Controls_Manager::REPEATER,
                'id'      => 'posts_not_in',
                'label'   => esc_html__( 'Enter Post ID that will not display', 'docfi-core' ),
                'fields'  => array(
                    array(
                        'type'    => Controls_Manager::NUMBER,
                        'name'    => 'post_not_in',
                        'label'   => esc_html__( 'Post ID', 'docfi-core' ),
                        'default' => '0',
                    ),
                ),
            ),
            array(
                'mode' => 'section_end',
            ),

            // Responsive Columns
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_responsive',
                'label'   => esc_html__( 'Number of Responsive Columns', 'docfi-core' ),
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_lg',
                'label'   => esc_html__( 'Desktops: > 1199px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '4',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_md',
                'label'   => esc_html__( 'Desktops: > 991px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '4',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_sm',
                'label'   => esc_html__( 'Tablets: > 767px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_xs',
                'label'   => esc_html__( 'Phones: < 768px', 'docfi-core' ),
                'options' => $this->rt_translate['cols'],
                'default' => '12',
            ),
            array(
                'mode' => 'section_end',
            ),

            // Box Style
			array(
				'mode'    => 'section_start',
				'id'      => 'style_area',
				'label'   => esc_html__( 'Logo Style', 'docfi-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cattitle_typo2',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .logo-card .logo .text',
			),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__( 'Title Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .logo-card .logo .text' => 'color: {{VALUE}}',
                ),
            ),
            array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_desc_typo',
				'label'   => esc_html__( 'Title Typography', 'docfi-core' ),
				'selector' => '{{WRAPPER}} .rt-cat-list .logo-card .cat_desc',
			),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'cat_desc_color',
                'label'   => esc_html__( 'Title Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .rt-cat-list .logo-card .cat_desc' => 'color: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_color',
                'label'   => esc_html__( 'Icon Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .nav .nav-link .logo-card-btn svg' => 'fill: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'icon_active_color',
                'label'   => esc_html__( 'Icon Active Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .nav .nav-link.active .logo-card-btn svg' => 'fill: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_bg_color',
                'label'   => esc_html__( 'Item Background Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'background: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_bg_hover_color',
                'label'   => esc_html__( 'Item Hover Background Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link:hover' => 'background: {{VALUE}}',
                ),
            ),
            array (
                'type'    => Controls_Manager::COLOR,
                'id'      => 'item_border_color',
                'label'   => esc_html__( 'Item Border Color', 'docfi-core' ),
                'default' => '',
                'selectors' => array( 
                    '{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'border-color: {{VALUE}}',
                ),
            ),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'item_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Padding', 'docfi-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .best-online-documentation-section .nav .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
                'mode' => 'section_end',
            ),
            // Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'docfi-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'docfi-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'docfi-core' ),
					'hide'        => esc_html__( 'Off', 'docfi-core' ),
				),
				'default' => 'wow',
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
		$template = 'docs-cat-list';
		return $this->rt_template( $template, $data );
	}
}