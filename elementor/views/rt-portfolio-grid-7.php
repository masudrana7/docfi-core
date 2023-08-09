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

$thumb_size  = 'docfi-size1';

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
	'post_type'      	=> 'docfi_docs',
	'posts_per_page' 	=> $data['number'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'paged' 			=> $paged
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'docfi_docs_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

$query = new WP_Query( $args );
$temp = DocfiTheme_Helper::wp_set_temp_query( $query );
?>
<div class="rt-docs-default rt-docs-multi-layout-7 docs-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row rt-docs-grid <?php echo esc_attr( $data['item_space'] );?>">
		<?php $count = 1; $m = $data['delay']; $n = $data['duration']; 
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post();
			$id            	= get_the_id();
		?>
        <div class="grid-item grid-item-<?php echo esc_attr($count) ?>">
		<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $m );?>s" data-wow-duration="<?php echo esc_attr( $n );?>s">
			<div class="docs-item">
				<div class="docs-figure">
					<a href="<?php the_permalink(); ?>" aria-label="Portfolio">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size, ['class' => 'img-fluid width-100'] );
							} else {
								if ( !empty( DocfiTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( DocfiTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . DocfiTheme_Helper::get_img( 'noimage_1296X690.jpg' ) . '" alt="'.get_the_title().'" loading="lazy" >';
								}
							}
						?>
					</a>			
				</div>
				<div class="docs-content">
					<div class="content-info">
						<h3 class="entry-title"><a aria-label="Portfolio" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<?php if ( $data['category_display']  == 'yes' ) { ?>
						<span class="docs-cat"><?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'docfi_docs_category' );
							if( $term_lists ) {
							foreach ( $term_lists as $term_list ){ 
							$link = get_term_link( $term_list->term_id, 'docfi_docs_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a aria-label="Portfolio" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?>
						</span>
						<?php } ?>
					</div>
					<?php if ( $data['action_display']  == 'yes' ) { ?>
					<div class="content-action">
						<a aria-label="Portfolio" href="<?php the_permalink();?>"><i class="icon-docfi-right-arrow"></i></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
        </div>        
			<?php $count++; $m = $m + 0.2; $n = $n + 0.1; } ?>
		<?php } ?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="docs-button"><a class="button-style-2 btn-common" aria-label="Portfolio" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="icon-docfi-right-arrow"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php DocfiTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php DocfiTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>