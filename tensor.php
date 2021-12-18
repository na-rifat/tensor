<?php

/**
 * Plugin name: Tensor
 * Description: Tensor functionalities handler plugin
 * Version: 1.0.0
 * Author: Notionhive
 * Author URI: https://notionhive.com
 * Text domain: tensor
 * Requires at least: 5.8.2
 * Requires PHP: 7.0
 * License GPL V2 or later
 */

namespace Tensor;

defined( 'ABSPATH' ) or exit;

require_once "vendor/autoload.php";

class Tensor {
    function __construct() {

        $this->define_const();

        add_action( 'plugins_loaded', [$this, 'init_classes'] );
    }

    /**
     * Initialize plugin classes
     *
     * @return void
     */
    public function init_classes() {

        new Assets();

        // Init Elementor widgets
        new Widget();

    }

    /**
     * Define constants for later use
     *
     * @return void
     */
    public function define_const() {

        $plugin_info = get_file_data( __FILE__, ['Plugin name', 'Description', 'Version', 'Plugin Author', 'Author URI'] );

        define( 'TENSOR_TITLE', $plugin_info[0] );
        define( 'TENSOR_DESCRIPTION', $plugin_info[1] );
        define( 'TENSOR_VERSION', $plugin_info[2] );

        define( 'TENSOR_PATH', __DIR__ );
        define( 'TENSOR_URL', plugins_url( '', __FILE__ ) );

        define( 'TENSOR_ASSETS_PATH', TENSOR_PATH . '/assets' );
        define( 'TENSOR_ASSETS_URL', TENSOR_URL . '/assets' );

        define( 'TENSOR_TEMPLATE_PATH', TENSOR_PATH . '/templates' );
    }

    /**
     * Build the class and run the plugin
     *
     * @return void
     */
    public static function build() {

        static $me = false;

        if ( ! $me ) {
            $me = new self();
        }
    }

}

// Initialization call
Tensor::build();