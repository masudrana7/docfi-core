<div class="rt-group-single-list">
    <?php
        if ( !empty( $data['category_list'] ) ) {
            foreach ( $data['category_list'] as $cat ) {
                $cats[] = array(
                    'cat_multi_box' => $cat['cat_multi_box'],
                );
            }
        } else {
            $docs_terms = get_terms( 'docfi_docs_group', array(
                'hide_empty' => true,
            ) );
            foreach ( $docs_terms as $docs_term ){
                $cats[] = array(
                    'cat_multi_box' => $docs_term->term_id,
                );
            }	
        }

    if ( !empty( $cats ) ) {
    // Category
    $category_number = count( $cats );
        foreach ( $cats as $cat ) {
        $get_item_bg  = get_term_meta( $cat['cat_multi_box'], 'rt_item_bg', true ); 
        $get_color    = get_term_meta( $cat['cat_multi_box'], 'rt_group_color', true ); 
        $hexcolor     = DocfiTheme_Helper::hex2rgb( $get_item_bg );
        $r = hexdec(substr($get_item_bg,0,2));
        $g = hexdec(substr($get_item_bg,2,2));
        $b = hexdec(substr($get_item_bg,4,2));
        $get_image = get_term_meta( $cat['cat_multi_box'], 'rt_term_image', true );
        $image_id = wp_get_attachment_image_src( $cat, 'full' );  
        if ( $cat['cat_multi_box'] != 0 ) {
            $term_name = get_term( $cat['cat_multi_box'], 'docfi_docs_group' ); 
        ?>

        <div class="rt-single-sidebar-list" style="--docfi-red2: <?php echo absint( $r ); ?>;--docfi-green2: <?php echo absint( $g ); ?>;--docfi-blue2: <?php echo absint( $b ); ?>">

            <?php 
                $args = array(
                    'post_type' => 'docfi_docs',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key'     => 'group_post_select', 
                            'value'   => $cat['cat_multi_box'], 
                            'compare' => 'LIKE', 
                            'type'    => 'CHAR', 
                        ),
                    ),
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {  
                        $query->the_post(); 
                        $postid = get_the_ID();?>
                        <div id="rt-post-<?php echo $postid; ?>" class="rt-single-content-wrapper">
                            <?php the_content(); ?>
                        </div>
                    <?php }
                } wp_reset_postdata(); 
            ?>              

            
        </div>    


    <?php } } }  ?>
</div>
