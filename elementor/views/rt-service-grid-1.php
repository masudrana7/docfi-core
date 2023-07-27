<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      	=> 'docfi_service',
	'posts_per_page' 	=> $data['number'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'paged' 			=> $paged
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'docfi_service_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

$query = new WP_Query( $args );
$temp = DocfiTheme_Helper::wp_set_temp_query( $query );

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="rt-service-default rt-service-layout-1 service-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
		<?php $m = 1; $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post();
			$id            			= get_the_id();
			$docfi_service_icon= get_post_meta( get_the_ID(), 'docfi_service_icon', true );
			$icon_class 			= '' ;
			if ( empty( $docfi_service_icon ) ) {
				$icon_class 		= ' no-icon';	
			}

			if ( $data['contype'] == 'content' ) {
				$content = apply_filters( 'the_content', get_the_content() );
			}
			else {
				$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
			}
			$content = wp_trim_words( $content, $data['count'], '' );
			$content = "$content";
		?>
			<div class="<?php echo esc_attr( $col_class );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="service-item <?php if( $data['hover_animation'] == 'yes' ) { ?>hover-animation<?php } ?> <?php if( $data['active_hover'] == 'yes' && $m == 1 ) { ?>hover-animation-active<?php } ?> <?php echo esc_attr( $icon_class ); ?>">
					<div class="service-content">
						<?php if ( !empty( $docfi_service_icon ) && $data['icon_display']  == 'yes' ) { ?>
						<div class="service-icon"><i class="<?php echo wp_kses( $docfi_service_icon , 'alltext_allow' );?>"></i></div>
						<?php } ?>
						<h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<?php if ( $data['content_display']  == 'yes' ) { ?>
						<div class="service-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>
						<?php } if ( $data['action_display']  == 'yes' ) { ?>
						<div class="service-action"><a class="button-style-3 btn-common" href="<?php the_permalink();?>"><?php esc_html_e( 'See Details', 'docfi' );?><i class="icon-docfi-right-arrow"></i></a>
			      		</div>	
						<?php } ?>
					</div>
				</div>
			</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; $m++; } ?>
		<?php } ?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="service-button"><a class="button-style-2 btn-common" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="icon-docfi-right-arrow"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php DocfiTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php DocfiTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>