<?php
function docfi_post_share() {

	if( get_post_type() != 'page' ) { 

		$counter      = 0;
		$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$share_class  = '';
		$button_class = '';
		$text_class   = '';
		
		# Post link ----------
		$post_link = get_permalink();
		
		# Buttons array ----------
		$share_buttons = array(

			'facebook-f' => array(
				'url'  => 'http://www.facebook.com/sharer.php?u='. $post_link,
				'text' => esc_html__( 'Facebook', 'docfi-core' ),
			),

			'twitter' => array(
				'url'   => 'https://twitter.com/intent/tweet?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Twitter', 'docfi-core' ),
			),

			'youtube' => array(
				'url'   => 'https://www.youtube.com?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Youtube', 'docfi-core' ),
			),

			'linkedin-in' => array(
				'url'   => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'LinkedIn', 'docfi-core' ),
			),
			
			'pinterest-p' => array(
				'url'   => 'http://pinterest.com/pin/create/button/?url='. $post_link .'&amp;description='. $post_title .'&amp;media='. docfi_post_img_src( 'docfi-size1' ),
				'text'  => esc_html__( 'Pinterest', 'docfi-core' ),
			),
			
			'whatsapp' => array(
				'url'   => 'https://api.whatsapp.com/send?text='. $post_title . ' – ' . $post_link ,
				'text'  => esc_html__( 'Whatsapp', 'docfi-core' ),
			),

			'cloud' => array(
				'url'   => 'https://cloud.google.com/send?text='. $post_title . ' – ' . $post_link ,
				'text'  => esc_html__( 'Cloud', 'docfi-core' ),
				'icon'  => 'fas fa-cloud',
			),

			'dribbble' => array(
				'url'   => 'https://dribbble.com?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'StumbleUpon', 'docfi-core' ),
			),

			'tumblr' => array(
				'url'   => 'http://www.tumblr.com/share/link?url='. $post_link .'&amp;name='. $post_title,
				'text'  => esc_html__( 'Tumblr', 'docfi-core' ),
			),

			'reddit' => array(
				'url'   => 'http://reddit.com/submit?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'Reddit', 'docfi-core' ),
			),			
			
			'print' => array(
				'url'   => '#',
				'text'  => esc_html__( 'Print', 'docfi-core' ),
				'icon'  => 'fas fa-print',
			),

			'email' => array(
				'url'   => 'mailto:?subject='. $post_title .'&amp;body='. $post_link,
				'text'  => esc_html__( 'Share via Email' , 'docfi-core' ),
				'icon'  => 'far fa-envelope',
			),
		);
		
		if ( DocfiTheme::$options['post_share_facebook'] == 0 ){
		unset($share_buttons['facebook-f']);
		}
		if ( DocfiTheme::$options['post_share_twitter'] == 0 ){
		unset($share_buttons['twitter']);
		}
		if ( DocfiTheme::$options['post_share_youtube'] == 0 ){
		unset($share_buttons['youtube']);
		}
		if ( DocfiTheme::$options['post_share_linkedin'] == 0 ){
		unset($share_buttons['linkedin-in']);
		}
		if ( DocfiTheme::$options['post_share_pinterest'] == 0 ){
		unset($share_buttons['pinterest-p']);
		}
		if ( DocfiTheme::$options['post_share_whatsapp'] == 0 ){
		unset($share_buttons['whatsapp']);
		}
		if ( DocfiTheme::$options['post_share_cloud'] == 0 ){
		unset($share_buttons['cloud']);
		}
		if ( DocfiTheme::$options['post_share_dribbble'] == 0){
		unset($share_buttons['dribbble']);
		}
		if ( DocfiTheme::$options['post_share_tumblr'] == 0 ){
		unset($share_buttons['tumblr']);
		}
		if ( DocfiTheme::$options['post_share_reddit'] == 0 ){
		unset($share_buttons['reddit']);
		}
		if ( DocfiTheme::$options['post_share_print'] == 0 ){
		unset($share_buttons['print']);
		}
		if ( DocfiTheme::$options['post_share_email'] == 0 ){
		unset($share_buttons['email']);
		}

		$active_share_buttons = array();

		foreach ( $share_buttons as $network => $button ){
			
			$counter ++;
			$icon = empty( $button['icon'] ) ? 'fab fa-'.$network : $button['icon'];

			# Buttons Style 1 ----------
			if( empty( $share_style )){
				$button_class = '';
				$text_class   = 'screen-reader-text';

				if( $counter <= 2 ){
					$button_class = ' large-share-button';
					$text_class   = 'social-text';
				}
			}

			if( !isset( $button['out_desktop'] )){
				$button['url'] = esc_url( $button['url'] );
			}

			if( $network == 'twitter' ) {
				$network   = 'rttwitter';
			}

			$active_share_buttons[] = '<a href="'. $button['url'] .'" rel="external" target="_blank" class="'. $network.'-share-button' . $button_class .'"><span class="'. $icon .'"></span> <span class="'. $text_class .'">'. $button['text'] .'</span></a>';
		}

		if( is_array( $active_share_buttons ) && ! empty( $active_share_buttons ) ){ ?>
			<div class="share-links <?php echo esc_attr( $share_class ) ?>">
				<?php echo implode( '', $active_share_buttons ); ?>
			</div>
		<?php
		}
		
	}
}
