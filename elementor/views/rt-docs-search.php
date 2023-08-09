<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$terms = get_terms( array('taxonomy' => 'docfi_docs_group' ) );
$category_dropdown = array(  0 => __( 'All', 'docfi-core' ) );

// if( class_exists( 'rt-docs-search-1' ) ) {
    foreach ( $terms as $category ) {
        $category_dropdown[$category->slug] = $category->name;
    }
//}

?>



<form role="search" method="get" id="custom-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <label for="category-select">Select Category:</label>
        <?php wp_dropdown_categories(array('show_option_all' => 'All Categories', 'hide_empty' => 0, 'name' => 'cat', 'id' => 'docfi_docs_group')); ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" id="search-input" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
