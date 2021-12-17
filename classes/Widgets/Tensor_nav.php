<?php

namespace Tensor\Widgets;

defined( 'ABSPATH' ) or exit;

use \Elementor\Widget_Base as Base;

class Tensor_nav extends Base {
    /**
     * Return widget name
     *
     * @return string
     */
    public function get_name() {
        return 'Tensor_nav';
    }

    /**
     * Return Widget title
     *
     * @return string
     */
    public function get_title() {
        return __( 'Tensor nav', 'tensor' );
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
        return 'fas fa-bars';
    }

    /**
     * Return search keywords
     *
     * @return array
     */
    public function get_keywords() {
        return ['tensor', 'nav', 'menu'];
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
        ?>
        <div class="page-header header-01 header-dark nav-links-hover-style-01 header-sticky-dark-logo headroom headroom--not-top headroom--not-bottom">
            <div class="header-bottom">
                <div class="container">
                    <?php unicamp_load_template( 'navigation' ); ?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}