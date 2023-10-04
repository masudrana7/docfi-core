<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Docfi_Core;
use Elementor\Utils;
    extract($data);
    $terms = get_terms( array('taxonomy' => 'docfi_docs_group' ) );
    $category_dropdown = array(  0 => __( 'All Docs', 'docfi-core' ) );
    foreach ( $terms as $category ) {
        $category_dropdown[$category->term_id] = $category->name;
    }
?>

<div class="rt-hero-section-content-wrapper">
    <div class="rt-searchbox-container">
        <form class="rt-searchbox-form d-flex justify-content-between align-items-center" role="search" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'docfi_docs' ) ); ?>">
            <div class="searchbox-textfield">
                <div class="input-area d-flex align-items-center">
                    <div class="input-group-addon rt-input-wrap flex-grow-1">
                        <input type="text" class="searchbox-input" name="search" id="searchInput" placeholder="<?php echo wp_kses_post( $data['placeholder'] ); ?>" autocomplete="off">
                        <span id="cleanText">x</span>
                    </div>   
                </div>
            </div>
            <?php if($data['category_show'] == 'yes'){?>
            <div class="category-selector">
                <select name="categories" id="categories">
                    <?php foreach ( $category_dropdown as $key => $value ): ?>
                    <option value="<?php echo esc_attr( $key );?>"><?php echo esc_html( $value );?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php } ?>
            <div class="searchbox-submit">
                <?php if($data['btn_text'] == 'yes'){  ?>
                    <button class="search-btn coolBeans btn-dark rt-searchbox-btn" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i><?php esc_html_e( 'Search', 'docfi-core' ); ?>
                </button>  
                <?php } else { ?>
                    <button class="search-btn rt-search-hide-text coolBeans btn-dark rt-searchbox-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i> </button>  
                <?php } ?>
             </div>
            <div id="rt_datafetch"></div>
        </form>
    </div>
    <div class="search-text d-md-flex">
        <p><span><?php echo wp_kses_post( $data['popular_text'] ); ?></span> </p>
        <ul class="rt-search-key rt-addon-search">
            <?php foreach ( $data['word_repeat'] as $rtword ) {?>
                <li class="keyword"><a href="#"><?php echo wp_kses_post($rtword['searches_word']); ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>


