<?php

namespace Tensor;

defined( 'ABSPATH' ) or exit;

class Widget {
    function __construct() {
        add_action( 'elementor/widgets/widgets_registered', [$this, 'register'] );
    }

    /**
     * Register widgets in Elementor
     *
     * @return void
     */
    public function register() {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Tensor_search() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Tensor_nav() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Tensor_nav_mobile() );
    }

}