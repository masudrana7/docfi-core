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
?>
<div id="bbpress-forums" class="docfi-wrapper-forums bbpress-wrapper">
	<ul id="forums-list-0" class="rt-tofics-info bbp-topics">
		<li class="bbp-header">
			<ul class="forum-titles">
				<li class="bbp-topic-title"><?php esc_html_e( 'Topic', 'docfi-core' ); ?></li>
				<li class="bbp-topic-title2 bbp-topic-replies"><?php esc_html_e( 'Replies', 'docfi-core' ); ?></li>
				<li class="bbp-topic-title2 bbp-topic-riews"><?php esc_html_e( 'Views', 'docfi-core' ); ?></li>
				<li class="bbp-topic-freshness"><?php esc_html_e( 'Activity', 'docfi-core' ); ?></li>
			</ul>
		</li>
		<li class="bbp-body">
		<?php
		$topics = new WP_Query(array(
			'post_type' => 'topic',
			'posts_per_page' 	=> $data['number'],
			'paged' 			=> $paged,
		));
		
		$i = 0;
		while($topics->have_posts()): $topics->the_post(); ?>

			<ul id="bbp-topic-<?php bbp_topic_id(get_the_ID()); ?>" <?php bbp_topic_class(get_the_ID()); ?>>
				<li class="bbp-topic-title">
					<div class="rt-topices-title">
						<h5 class="rt-title">
							<a href="<?php the_permalink(); ?>">
								<svg width="15" height="16" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M7.17275 7.54636L9.10111 5.24823L10.0391 6.03532L10.8105 5.11606L5.18239 0.393543L4.41104 1.3128L5.34905 2.09988L3.42069 4.39802C2.78048 5.161 1.6352 5.24955 0.856653 4.59627L0.0853085 5.51552L2.88528 7.86497L0.185571 11.0824L0.268906 11.9355L1.12358 11.8694L3.82329 8.65206L6.6514 11.0251L7.42275 10.1059C6.6442 9.45259 6.53253 8.30934 7.17275 7.54636Z" fill="#0289FF"></path>
								</svg> 
							</a>
							<?php the_title(); ?>
						</h5>
						<div class="user-meta">
							<span class="author"><?php printf( esc_html__( '%1$s', 'docfi-core' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>
							<span class="topics-meta"><?php echo esc_html__('In:', 'docfi-core'); ?>
								<a href="<?php bbp_forum_permalink(bbp_get_topic_forum_id(get_the_ID())); ?>">
										<?php bbp_forum_title(bbp_get_topic_forum_id(get_the_ID())); ?>
									</a>
							</span>
						</div>
					</div>
				</li>
				<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(get_the_ID()); ?></li>

				<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic(get_the_ID()) ? bbp_topic_reply_count(get_the_ID()) : bbp_topic_post_count(get_the_ID()); ?></li>
				<li class="bbp-topic-freshness">
					<?php echo bbp_get_forum_last_active_time(bbp_get_topic_forum_id(get_the_ID())) ?>
					<p class="bbp-topic-meta">
						<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>
						<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(get_the_ID()), 'size' => 14 ) ); ?></span>
						<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>
					</p>
				</li>
			</ul>
			<?php $i++; endwhile; wp_reset_postdata(); ?>
		</li>
	</ul>
	<?php DocfiTheme_Helper::pagination( $topics  ); ?>
	
</div>