<?php

/**
 * Plugin Name: Ghog Slider
 * Author: Theme Wire
 * Author URI: https://themewire.co
 * Description: Ghog Slider
 * Version: 0.1.0
 * text-domain: ghog
 * 
 * @package ghog
 */

namespace GHOG\ElementorWidgets;

use GHOG\ElementorWidgets\Widgets\slider;

if (!defined('ABSPATH')) :
  exit;
endif;


final class ghog
{
  private static $_instance = null;

  public static function get_instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function __construct()
  {
    add_action('elementor/init', [$this, 'init']);
  }

  public function init()
  {
    add_action('elementor/elements/categories_registered', [$this, 'create_new_category']);
    add_action('elementor/widgets/register', [$this, 'init_widgets']);
  }

  public function create_new_category($elements_manager)
  {
    $elements_manager->add_category(
      'ghog',
      [
        'title' => __('Ghog', 'ghog')
      ]
    );
  }

  public function init_widgets($widgets_manager)
  {
    //require Widgets
    require_once __DIR__ . '/widgets/slider.php';

    //Instantiate Widgets
    $widgets_manager->register(new slider());
  }
}

ghog::get_instance();
