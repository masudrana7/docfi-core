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
            <pre><code class="javascript hljs">calculateIfScrolledTo(el) {
      if (window.scrollY + this.browserHeight > el.offsetTop) {
        console.log("calculated")
        let scrollPercent = (el.getBoundingClientRect().y / this.browserHeight) * 100
        if (scrollPercent < this.threshholdPercent) {
          el.classList.add('reveal-item--is-visible')
          el.isRevealed = true
          if (el.isLastItem) {
            window.removeEventListener('scroll', this.scrollThrottle)
          }
        }
      }
    }</code></pre>
            <button class="copy-code-button">COPY&nbsp;&nbsp;<i class="fas fa-copy"></i></button>
        </div>
        </div>

