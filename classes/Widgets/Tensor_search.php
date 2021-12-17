<?php

namespace Tensor\Widgets;

defined( 'ABSPATH' ) or exit;

use \Elementor\Controls_Manager as Controls;
use \Elementor\Widget_Base as Base;

class Tensor_search extends Base {
    /**
     * Return widget name
     *
     * @return string
     */
    public function get_name() {
        return 'Tensor_search';
    }

    /**
     * Return Widget title
     *
     * @return string
     */
    public function get_title() {
        return __( 'Tensor search', 'tensor' );
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
        return 'fas fa-search';
    }

    /**
     * Return search keywords
     *
     * @return array
     */
    public function get_keywords() {
        return ['tensor', 'search', 'post search'];
    }

    /**
     * Enqueue required stylesheet
     *
     * @return array
     */
    public function get_style_depends() {
        return ['tensor-widget'];
    }

    /**
     * Register input controls
     *
     * @return void
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'general_controls',
            [
                'label' => __( 'General', 'tensor' ),
                'tab'   => Controls::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'search_width',
            [
                'label'           => __( 'Width', 'tensor' ),
                'type'            => Controls::SLIDER,
                'size_units'      => ['px', 'rem', 'em', '%'],
                'range'           => [
                    'px'  => [
                        'min' => 0,
                        'max' => 800,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 30,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 30,
                    ],
                    '%'   => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices'         => ['mobile', 'tablet', 'desktop'],
                'mobile_default'  => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'desktop_default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .tensor-header-search' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // $this->add_responsive_control(
        //     'alignment',
        //     [
        //         'label'           => __( 'Alignment', 'geomify' ),
        //         'type'            => Controls::CHOOSE,
        //         'devices'         => ['desktop', 'tablet', 'mobile'],
        //         'options'         => [
        //             'flex-start' => [
        //                 'title' => __( 'Left', 'geomify' ),
        //                 'icon'  => 'eicon-h-align-left',
        //             ],
        //             'center'     => [
        //                 'title' => __( 'Center', 'geomify' ),
        //                 'icon'  => 'eicon-h-align-center',
        //             ],
        //             'flex-end'   => [
        //                 'title' => __( 'Right', 'geomify' ),
        //                 'icon'  => 'eicon-h-align-right',
        //             ],
        //         ],
        //         'desktop_default' => 'flex-end',
        //         'tablet_default'  => 'flex-end',
        //         'mobile_default'  => 'center',
        //         'selectors'       => [
        //             '{{WRAPPER}} .tensor-header-search .header-search-form' => 'align-self: {{VALUE}}',
        //         ],
        //     ]
        // );
        $this->end_controls_section();
    }

    /**
     * Render the widget out element
     *
     * @return void
     */
    protected function render() {
        ob_start();
        \Unicamp_Header::instance()->print_search();
        $template = ob_get_clean();
        printf( '<div class="tensor-header-search">%s</div>', $template );
    }
}