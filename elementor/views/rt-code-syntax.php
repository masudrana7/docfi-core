<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use Elementor\Utils;
extract($data);
?>
<div class="rt-code-syntax-area">
  <div class="contains-code">
    <?php echo wp_kses_post( $data['content'] );?>
    <button class="copy-code-button">COPY&nbsp;&nbsp;<i class="fas fa-copy"></i></button>
  </div>
</div>

