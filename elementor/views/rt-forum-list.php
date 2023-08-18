<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use NiftricTheme;
use NiftricTheme_Helper;
use \WP_Query;
?>

<div class="rt-forum-list-wrapper">


	<?php
		$forums = new WP_Query(array(
			'post_type' => 'forum',
			'posts_per_page' => -1,
		));
		while($forums->have_posts()): $forums->the_post();
	?>



	<ul id="bbp-forum-3066" class="loop-item-0 bbp-forum-status-open bbp-forum-visibility-publish odd  post-3066 forum type-forum status-publish has-post-thumbnail hentry <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-duration="1200ms" data-wow-delay="500ms" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
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
		<li class="bbp-forum-topic-count">5</li>
		<li class="bbp-forum-reply-count">9</li>
		<li class="bbp-forum-freshness">
			<div class="rt-bbp-forum-author">
				<div class="rt-forum-image">
					<a href="http://docfi.local/forums/users/test/" title="View MRana's profile"
						class="bbp-author-link"><span class="bbp-author-avatar"><img alt=""
								src="http://1.gravatar.com/avatar/1aedb8d9dc4751e229a335e371db8058?s=40&amp;d=mm&amp;r=g"
								srcset="http://1.gravatar.com/avatar/1aedb8d9dc4751e229a335e371db8058?s=80&amp;d=mm&amp;r=g 2x"
								class="avatar avatar-40 photo" height="40" width="40" loading="lazy"
								decoding="async"></span></a>
				</div>

				<div class="rt-forum-content">
					<a href="http://docfi.local/forums/users/test/" title="View MRana's profile"
						class="bbp-author-link"><span class="bbp-author-name">MRana</span></a>
					<a href="http://docfi.local/forums/topic/woocommerce-setup-has-no-available-for-selection/#post-3130"
						title="Reply To: WooCommerce Setup has no available for selection">2 days, 4 hours ago</a>
				</div>

			</div>
		</li>
	</ul>


	
	<?php endwhile; wp_reset_postdata(); ?>
</div>