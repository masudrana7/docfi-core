<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Group_Control_Image_Size;

?>

<div class="rt-shape-layout rt-shape-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">	

    <?php if( $data['style'] == 'style1' ) { ?>
	<div class="rt-shape-item" 
        style="position: <?php echo esc_attr( $data['position'] );?>;
            --docfi-shape:url(<?php echo esc_url($data['shape_one']['url']); ?>);">
	</div>

    <?php } if( $data['style'] == 'style2' ) { 
        $getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape_one' );
        ?>
        <div class="rt-shape-item" style="position: <?php echo esc_attr( $data['position'] );?>"><span class="rt-img fa-spin" style="animation-duration: 10s"><?php echo wp_kses_post($getimg);?></span></div>
    <?php } ?>

    <?php if( $data['style'] == 'style3' ) { 
        $getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape_one' );
        ?>
        <div class="rt-shape-item rt-mouse-parallax" style="position: <?php echo esc_attr( $data['position'] );?>">
            <div class="rt-img" style="animation-duration: 10s" data-depth="5.00"><?php echo wp_kses_post($getimg);?></div>
        </div>
    <?php } ?>

</div>