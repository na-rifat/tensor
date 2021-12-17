<?php

namespace Tensor\Widgets;

defined( 'ABSPATH' ) or exit;

use \Elementor\Widget_Base as Base;

class Tensor_nav_mobile extends Base {
    /**
     * Return widget name
     *
     * @return string
     */
    public function get_name() {
        return 'Tensor_nav_mobile';
    }

    /**
     * Return Widget title
     *
     * @return string
     */
    public function get_title() {
        return __( 'Tensor mobile nav', 'tensor' );
    }

    /**
     * Return categories
     *
     * @return array
     */
    public function get_categories() {
        return ['general'];
    }

    /**
     * Return icon class name
     *
     * @return string
     */
    public function get_icon() {
        return 'fas fa-mobile';
    }

    /**
     * Return search keywords
     *
     * @return array
     */
    public function get_keywords() {
        return ['tensor', 'nav', 'menu', 'mobile'];
    }

    /**
     * Register input controls
     *
     * @return void
     */
    protected function register_controls() {
        // No controls for now
    }

    /**
     * Render the widget out element
     *
     * @return void
     */
    protected function render() {
        ob_start();
        \Unicamp_Header::instance()->print_open_mobile_menu_button();
        echo ob_get_clean();
    }
}