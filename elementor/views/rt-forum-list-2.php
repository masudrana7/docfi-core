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

<div id="bbpress-forums" class="rt-forum-list-<?php echo esc_attr( $data['style'] );?> rt-forum-list-wrapper docfi-wrapper-forums">
	<ul id="forums-list-0" class="rt-forum-info bbp-forums rt-forums-addons">

		<?php if($data['topbar_show'] == 'yes'){ ?>
		<li class="bbp-header">
			<ul class="forum-titles">
				<li class="bbp-forum-info"><?php echo esc_html('Forum', 'docfi-core');?></li>
				<li class="bbp-forum-topic-count"><?php echo esc_html('Replies', 'docfi-core');?></li>
				<li class="bbp-forum-reply-count"><?php echo esc_html('Views', 'docfi-core');?></li>
				<li class="bbp-forum-freshness"><?php echo esc_html('Activity', 'docfi-core');?></li>
			</ul>
		</li>
		<?php } ?>


		<li class="bbp-body">
		<?php
		$forums = new WP_Query(array(
			'post_type' => 'forum',
			'posts_per_page' 	=> $data['number'],
		));
		$i = 0;
		while($forums->have_posts()): $forums->the_post(); 
		?>
			<ul id="bbp-forum-<?php echo esc_attr($i);?>" class="loop-item-0 bbp-forum-status-open bbp-forum-visibility-publish odd  post-3066 forum type-forum status-publish has-post-thumbnail hentry <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
				<li class="bbp-forum-info rt-title-inner">
					<?php if(has_post_thumbnail()){?>
					<div class="rt-author-image">
						<?php the_post_thumbnail('full');?>
					</div>
					<?php } ?>
				</li>

				<li class="rt-info-wrapper">
					<div class="bbp-forum-info">
						<div class="rt-forum-title">
							<a class="bbp-forum-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<div class="bbp-forum-content"><?php the_content(); ?></div>
						</div>
					</div>
					<div class="rt-forum-meta">
						<ul>
							<li class="bbp-forum-topic-count">
								<span class="bbp-author-name">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.6602 10.44L20.6802 14.62C19.8402 18.23 18.1802 19.69 15.0602 19.39C14.5602 19.35 14.0202 19.26 13.4402 19.12L11.7602 18.72C7.59018 17.73 6.30018 15.67 7.28018 11.49L8.26018 7.30001C8.46018 6.45001 8.70018 5.71001 9.00018 5.10001C10.1702 2.68001 12.1602 2.03001 15.5002 2.82001L17.1702 3.21001C21.3602 4.19001 22.6402 6.26001 21.6602 10.44Z" stroke="#038EDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M15.0599 19.39C14.4399 19.81 13.6599 20.16 12.7099 20.47L11.1299 20.99C7.15985 22.27 5.06985 21.2 3.77985 17.23L2.49985 13.28C1.21985 9.30998 2.27985 7.20998 6.24985 5.92998L7.82985 5.40998C8.23985 5.27998 8.62985 5.16998 8.99985 5.09998C8.69985 5.70998 8.45985 6.44998 8.25985 7.29998L7.27985 11.49C6.29985 15.67 7.58985 17.73 11.7599 18.72L13.4399 19.12C14.0199 19.26 14.5599 19.35 15.0599 19.39Z" stroke="#038EDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M12.6401 8.53003L17.4901 9.76003" stroke="#038EDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M11.6602 12.4L14.5602 13.14" stroke="#038EDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
								<?php bbp_forum_topic_count(get_the_ID()); ?>
							</li>
							<li class="bbp-forum-freshness rt-addon-forum">
								<div class="rt-bbp-forum-author">

									<?php echo get_avatar(get_the_author_meta('ID'), 40) ?>

									<div class="rt-forum-content">
										<?php do_action( 'bbp_theme_before_topic_author' ); ?>
										<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(get_the_ID()), 'type' => 'name' ) ); ?>
										<?php do_action( 'bbp_theme_after_topic_author' ); ?>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>

				
			</ul>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</li>
	</ul>
</div>