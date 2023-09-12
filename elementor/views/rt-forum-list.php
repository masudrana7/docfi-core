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
?>

<div id="bbpress-forums" class="rt-forum-list-wrapper docfi-wrapper-forums">
	<ul id="forums-list-0" class="rt-forum-info bbp-forums">
		<li class="bbp-header">
			<ul class="forum-titles">
				<li class="bbp-forum-info"><?php echo esc_html('Forum', 'docfi-core');?></li>

				<li class="bbp-forum-topic-count"><?php echo esc_html('Replies', 'docfi-core');?></li>
				<li class="bbp-forum-reply-count"><?php echo esc_html('Views', 'docfi-core');?></li>
				<li class="bbp-forum-freshness"><?php echo esc_html('Activity', 'docfi-core');?></li>

				
			</ul>
		</li>
		<li class="bbp-body">
		<?php
		$forums = new WP_Query(array(
			'post_type' => 'forum',
			'posts_per_page' 	=> $data['number'],
		));
		$i = 0;
		while($forums->have_posts()): $forums->the_post(); ?>
			<ul id="bbp-forum-<?php echo esc_attr($i);?>" class="loop-item-0 bbp-forum-status-open bbp-forum-visibility-publish odd  post-3066 forum type-forum status-publish has-post-thumbnail hentry <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
				<li class="bbp-forum-info rt-title-inner">
					<?php if(has_post_thumbnail()){?>
					<div class="rt-author-image">
						<?php the_post_thumbnail('full');?>
					</div>
					<?php } ?>

					<div class="rt-forum-title">
						<a class="bbp-forum-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<div class="bbp-forum-content"><?php the_content(); ?></div>
					</div>
				</li>
				<li class="bbp-forum-topic-count"><?php bbp_forum_topic_count(get_the_ID()); ?></li>
				<li class="bbp-forum-reply-count"><?php bbp_forum_post_count(get_the_ID()); ?></li>
				<li class="bbp-forum-freshness">
					<div class="rt-bbp-forum-author">
						<div class="rt-forum-content">
							<?php do_action( 'bbp_theme_before_topic_author' ); ?>
							<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(get_the_ID()), 'type' => 'name' ) ); ?>
							<?php do_action( 'bbp_theme_after_topic_author' ); ?>

							<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>
							<?php bbp_forum_freshness_link(get_the_ID()); ?>
							<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>
						</div>
					</div>
				</li>
			</ul>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</li>
	</ul>
</div>