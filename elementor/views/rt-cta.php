<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Group_Control_Image_Size;

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  = 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'cta_image' );?>

<div class="join-community-wrapper d-flex justify-content-around align-items-center flex-wrap">
	<div class="join-community-text-content d-flex justify-content-center align-items-center flex-wrap text-center text-md-start">
		<div class="icon wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms">
			<img src="images/icons/problem-solve1.svg" alt="">
		</div>
		<?php if( !empty( $getimg ) ) { ?>
		<div class="icon wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="400ms"><?php echo wp_kses_post($getimg);?></div>
		<?php } ?>
		<div class="title-area wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="500ms">
			<h3 class="title">
				<?php echo wp_kses_post( $data['title'] ) ?>
			</h3>
			<p class="para-text">
				<?php echo wp_kses_post( $data['desc'] ) ?>
			</p>
		</div>
	</div>

	<?php if( !empty( $data['buttontext'] ) ) { ?>
		<a <?php echo $attr; ?> class="coolBeans join-community-btn wow animate__fadeInUp animate__animated" data-wow-duration="1200ms" data-wow-delay="600ms"><?php echo esc_html( $data['buttontext'] );?></a>
	<?php } ?>
</div>
