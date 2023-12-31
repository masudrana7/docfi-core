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
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>

<div class="rt-forum-wrapper rt-forum-grid">
		<div class="row">
			<?php $i = $data['delay']; $j = $data['duration']; ?>
			<?php
				$forums = new WP_Query(array(
					'post_type' => 'forum',
					'posts_per_page' 	=> $data['number'],
				));
				while($forums->have_posts()): $forums->the_post();
				global $post;
			?>
			<div class="<?php echo esc_attr( $col_class );?>">

			<div class="rt-card rt-card--style-4 text-center <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<?php if(has_post_thumbnail()){?>
				<div class="icon d-flex justify-content-center align-items-center rt-border-radius-style-2">
					<?php the_post_thumbnail('full'); ?>
				</div>
				<?php }?>

				<h3 class="card-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
				<p class="card-info circle-radius">
					<?php bbp_forum_topic_count(get_the_ID()); ?> <?php esc_html_e('Posts', 'docfi-core') ?> / 
					
					<?php 
						if (function_exists('bbp_get_forum_reply_count') && bbp_is_forum($post->ID)) {
							$reply_count = bbp_get_forum_reply_count($post->ID);
							echo esc_html($reply_count) . ' ' . esc_html__('Replies', 'docfi-core');
						}
					?>
				</p>
				<a href="<?php the_permalink(); ?>" class="card-btn d-inline-flex justify-content-center align-items-center">
					<svg width="13" height="11" viewBox="0 0 13 11" fill="#1D2746" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.3516 6.37891L7.97656 10.7539C7.8125 10.918 7.59375 11 7.375 11C7.12891 11 6.91016 10.918 6.74609 10.7539C6.39062 10.4258 6.39062 9.85156 6.74609 9.52344L9.61719 6.625H1.25C0.757812 6.625 0.375 6.24219 0.375 5.75C0.375 5.28516 0.757812 4.875 1.25 4.875H9.61719L6.74609 2.00391C6.39062 1.67578 6.39062 1.10156 6.74609 0.773438C7.07422 0.417969 7.64844 0.417969 7.97656 0.773438L12.3516 5.14844C12.707 5.47656 12.707 6.05078 12.3516 6.37891Z" fill=""/>
					</svg>
				</a>
			</div>
			</div>
			<?php $i = $i + 0.2; $j = $j + 0.01; endwhile; wp_reset_postdata();?>
	</div>
			
</div>