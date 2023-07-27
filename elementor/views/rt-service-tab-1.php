<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Icons_Manager;
use DocfiTheme;
use DocfiTheme_Helper;
use \WP_Query;
extract($data);
$thumb_size = 'docfi-size5';

if ( ! isset( $data['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
    $data['icon'] = 'fa fa-plus';
    $data['icon_align'] = $this->get_settings( 'icon_align' );
}

?>
<div class="rt-service-tab rt-service-tab-<?php echo esc_attr( $data['layout'] );?>">
	<div class="service-tab-item">
	  	<div class="nav nav-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	  		<?php $i = 1;
			foreach ( $data['tab_items'] as $tab_item_list ) { ?>
		    	<button class="nav-link <?php if ( $i == 1 ) { ?>active<?php } ?>" id="v-pills-<?php echo esc_html( $i ); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo esc_html( $i ); ?>" type="button" role="tab" aria-controls="v-pills-<?php echo esc_html( $i ); ?>" aria-selected="true"><?php if ( $data['icon_display'] == 'yes' ) { ?><?php Icons_Manager::render_icon( $tab_item_list['selected_icon'] ); ?><?php } ?><?php echo wp_kses_post( $tab_item_list['title'] ); ?></button>
		    <?php $i++; } ?>
	  	</div>
	  	<div class="tab-content" id="v-pills-tabContent">
	  		<?php $i = 1;
			foreach ( $data['tab_items'] as $tab_item_list ) {
				if( $tab_item_list['image']['id'] ) {
					$image_class = 'image';
				} else {
					$image_class = 'noimage';
				}
				?>
		    	<div class="tab-pane rtTabFadeInUp show <?php if ( $i == 1 ) { ?>active<?php } ?>" id="v-pills-<?php echo esc_html( $i ); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo esc_html( $i ); ?>-tab">
		    		<div class="item-content <?php echo esc_attr( $image_class ); ?>">
			    		<div class="entry-content">
				    		<h3 class="entry-title has-animation"><?php echo wp_kses_post( $tab_item_list['title'] ); ?><span class="titleline"></span></h3>
				    		<?php if( $tab_item_list['sub_title'] ) { ?>
					    		<div class="sub-title"><?php echo wp_kses_post( $tab_item_list['sub_title'] ); ?></div>
					    	<?php } ?>
				    		<?php echo wp_kses_post( $tab_item_list['content'] ); ?>
				    		<?php if ( $data['action_display'] == 'yes' ) { ?>
				    		<div class="action-button">
					    		<a class="button-style-4 btn-common" href="<?php echo esc_url( $tab_item_list['url']['url'] );?>"><?php echo esc_html( $tab_item_list['buttontext'] );?><i class="icon-docfi-right-arrow"></i></a>
					    	</div>
					    	<?php } ?>					    	
							<?php if ( $data['icon_display'] == 'yes' ) { ?><div class="content-icon"><?php Icons_Manager::render_icon( $tab_item_list['selected_icon'] ); ?></div><?php } ?>
					    </div>
					    <?php if( !empty( $tab_item_list['image']['id'] ) ) { ?>
					    <div class="service-figure">
					    	<?php echo wp_get_attachment_image( $tab_item_list['image']['id'], $thumb_size ); ?>
					    </div>
						<?php } ?>
					</div>
		    	</div>
		    <?php $i++; } ?>
	  	</div>
	</div>
</div>
