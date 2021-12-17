<?php

namespace Tensor;

defined( 'ABSPATH' ) or exit;

class Assets {
    // This array will hold all js script dependencies
    public $script_deps = [
        'widget'   => ['jquery'],
        'frontend' => ['jquery'],
    ];

    // This array will hold all css stylesheet dependencies
    public $stylesheet_deps = [

    ];

    function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue'] );
    }

    /**
     * Get list of files from a folder
     *
     * @param  string  $type
     * @return array
     */
    protected function get_file_list( $type = '' ) {
        return array_diff( scandir( TENSOR_ASSETS_PATH . "/{$type}" ), ['..', '.'] );
    }

    /**
     * Split and get file name from string
     *
     * @param  string   $filename
     * @return string
     */
    protected function get_file_name( $filename ) {
        return explode( '.', $filename )[0];
    }

    /**
     * Split and get file extension from string
     *
     * @param  string   $filename
     * @return string
     */
    protected function get_file_ext( $filename ) {
        return explode( '.', $filename )[sizeof( explode( '.', $filename ) ) - 1];
    }

    /**
     * Generate a files version based on last modified time
     *
     * @param  string $file_path
     * @return int
     */
    protected function file_version( $file_path ) {
        return filemtime( $file_path );
    }

    /**
     * This function collects list of javascript files from assets folder
     *
     * @return array
     */
    protected function get_scripts() {
        $file_list = $this->get_file_list( 'js' );
        $scripts   = [];

        foreach ( $file_list as $file ) {
            $tmp            = [];
            $tmp['handle']  = 'tensor-' . $this->get_file_name( $file );
            $tmp['src']     = TENSOR_ASSETS_URL . "/js/$file";
            $tmp['version'] = $this->file_version( TENSOR_ASSETS_PATH . "/js/$file" );
            $tmp['deps']    = isset( $this->script_deps[$this->get_file_name( $file )] ) ? $this->script_deps[$this->get_file_name( $file )] : [];

            $scripts[] = $tmp;
        }

        return $scripts;
    }

    /**
     * This function collects list of css files from assets folder
     *
     * @return array
     */
    protected function get_stylesheets() {
        $file_list = $this->get_file_list( 'css' );
        $scripts   = [];

        foreach ( $file_list as $file ) {
            $tmp            = [];
            $tmp['handle']  = 'tensor-' . $this->get_file_name( $file );
            $tmp['src']     = TENSOR_ASSETS_URL . "/css/$file";
            $tmp['version'] = $this->file_version( TENSOR_ASSETS_PATH . "/css/$file" );
            $tmp['deps']    = isset( $this->stylesheet_deps[$this->get_file_name( $file )] ) ? $this->stylesheet_deps[$this->get_file_name( $file )] : [];

            $scripts[] = $tmp;
        }

        return $scripts;
    }

    /**
     * This function returns localize variables
     *
     * @return array
     */
    protected function get_localize() {

    }

    public function enqueue() {
        $scripts     = $this->get_scripts();
        $stylesheets = $this->get_stylesheets();
        $localize    = $this->get_localize();

        // Render scripts
        foreach ( $scripts as $script ) {
            wp_enqueue_script( $script['handle'], $script['src'], $script['deps'], $script['version'] );
        }
        // Render stylesheets
        foreach ( $stylesheets as $sheet ) {
            wp_enqueue_style( $sheet['handle'], $sheet['src'], $sheet['deps'], $sheet['version'] );
        }
        // Render localize vars
        wp_localize_script( 'tensor-universal', 'tensor', $localize );
    }
}