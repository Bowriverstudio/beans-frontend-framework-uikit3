<?php
/**
 * Add Uikit 3 related options to the WordPress Customizer.
 *
 * @package Uikit3\Framework\Admin
 *
 * @since   1.0.0
 */

beans_add_smart_action('customize_register', 'uikit3_beans_do_register_wp_customize_options');
/**
 * Add Uikit 3 related options to the WordPress Customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function uikit3_beans_do_register_wp_customize_options()
{

    $fields = array(
        array(
            'id' => 'beans_header_max_width',
            'label' => __('Max Width', 'tm-beans'),
            'type' => 'select',
            'default' => beans_get_customizer_default_value('beans_header_max_width'),
            'options' => array(
                '' => __('None', 'tm-beans'),
                'uk-container-xsmall' => __('xsmall container', 'tm-beans'),
                'uk-container-small' => __('small container.', 'tm-beans'),
                'uk-container-large' => __('large container', 'tm-beans'),
                'uk-container-expand' => __('Unlimited with dynamic horizontal padding', 'tm-beans'),
            ),
            'description' => 'Add one of the following classes to the container to apply a different max-width.'
        ),
    );

    beans_register_wp_customize_options(
        $fields,
        'beans_header_layout',
        array(
            'title'    => __( 'Header Layout', 'tm-beans' ),
            'priority' => 1000,
        )
    );
}