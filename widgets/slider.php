<?php

/**
 * SLider Widget Addon
 * 
 * @package ghog
 */

namespace GHOG\ElementorWidgets\Widgets;

use Elementor\Widget_Base;

class slider extends Widget_Base
{

  public function get_name()
  {
    return 'ghog-slider';
  }

  public function get_title()
  {
    return __('Ghog Slider', 'ghog');
  }

  public function get_icon()
  {
    return 'eicon-thumbnails-down';
  }

  public function get_categories()
  {
    return ['ghog', 'basic'];
  }

  public function get_style_depends()
  {
    wp_register_style('swiper-style', plugins_url('scss/swiper.min.css', __FILE__));
    wp_register_style('ghog-style', plugins_url('scss/style.css', __FILE__));

    return ['swiper-style', 'ghog-style'];
  }

  public function get_script_depends()
  {
    wp_register_script('swiperghog-js', plugins_url('js/swiper.min.js', __FILE__), [], false, true);
    wp_register_script('ghog-script', plugins_url('js/script.js', __FILE__), ['swiperghog-js'], false, true);

    return ['swiperghog-js', 'ghog-script'];
  }

  protected function render()
  {
    $gallery = get_field('gallery_images', get_the_ID());

    if ($gallery) :
?>
      <div class="relative w-full">
        <div class="swiper-container ghog-swiper relative overflow-hidden w-full">

          <div class="swiper-wrapper overflow-y-clip h-swiper-container">
            <?php
            foreach ($gallery as $index => $item) :
              $image = $item['url'];
              $alt = $item['alt'];
            ?>
              <div class="swiper-slide">
                <figure class="swiper-slide-inner h-full w-full flex items-center justify-center">
                  <img src="<?php echo esc_url($image); ?>" alt="<?php echo __($alt, 'ghog'); ?>" class="swiper-slide-image">
                </figure>
              </div>
            <?php
            endforeach;
            ?>
          </div>

          <script>
            var galleryData = <?php echo json_encode($gallery); ?>;
          </script>

          <!-- Add Navigation Arrows -->
          <div class="swiper-button-next ghog-swiper-button-next sm-hidden"></div>
          <div class="swiper-button-prev ghog-swiper-button-prev sm-hidden"></div>

        </div>

        <div class="ghog-thumb-swiper swiper pt-31">
          <div class="swiper-wrapper">
            <?php
            foreach ($gallery as $index => $item) :
              $image = $item['url'];
              $alt = $item['alt'];
            ?>
              <div class="swiper-slide ghog-pagination-bullet">
                <figure>
                  <img src="<?php echo esc_url($image); ?>" alt="<?php echo __($alt, 'ghog'); ?>" class="swiper-slide-image">
                </figure>
              </div>
            <?php
            endforeach;
            ?>
          </div>
        </div>

      </div>



<?php
    endif;
  }
}
