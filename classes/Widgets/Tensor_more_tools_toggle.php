<?php

namespace Tensor\Widgets;

defined( 'ABSPATH' ) or exit;

use \Elementor\Widget_Base as Base;

class Tensor_more_tools_toggle extends Base {
    /**
     * Return widget name
     *
     * @return string
     */
    public function get_name() {
        return 'Tensor_more_tools_toggle';
    }

    /**
     * Return Widget title
     *
     * @return string
     */
    public function get_title() {
        return __( 'Tensor more tools toggle', 'tensor' );
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
        return 'fas fa-ellipsis-h';
    }

    /**
     * Return search keywords
     *
     * @return array
     */
    public function get_keywords() {
        return ['tensor', 'tools', 'mobile'];
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
        printf('<div class="tensor-more-tools-toggle">%s</div>', \Unicamp_Header::instance()->print_more_tools_button());
        echo ob_get_clean();
    }
}