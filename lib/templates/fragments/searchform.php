<?php
/**
 * Modify the search from.
 *
 * @package Beans\Framework\Templates\Fragments
 *
 * @since   1.0.0
 * @updated 2.0.0 - changed support to uikit3.
 */

// Filter.
beans_add_smart_action( 'get_search_form', 'beans_search_form' );
/**
 * Modify the search form.
 *
 * @since 1.0.0
 *
 * @return string The form.
 */
function beans_search_form() {

    $output = beans_open_markup(
        'beans_search_form_wrapper',
        'div',
        array(
            'class'  => 'uk-margin',
        )
    );
        $output .= beans_open_markup(
            'beans_search_form',
            'form',
            array(
                'class'  => 'uk-search uk-search-default',
                'method' => 'get',
                'action' => esc_url( home_url( '/' ) ),
                'role'   => 'search',
            )
        );


            $output .= beans_open_markup(
                'beans_search_form_input_icon',
                'span',
                array(
                    'class'       => 'uk-search-icon-flip uk-search-icon',
                    'aria-hidden' => 'true',
                    'uk-icon'     => 'icon:search'
                )
            );


            $output .= beans_close_markup( 'beans_search_form_input_icon', 'span' );
            $output .= beans_selfclose_markup(
                'beans_search_form_input',
                'input',
                array(
                    'class'       => 'uk-search-input uk-width-1-1',
                    'type'        => 'search',
                    'placeholder' => __( 'Search...', 'tm-beans' ), // Automatically escaped.
                    'value'       => esc_attr( get_search_query() ),
                    'name'        => 's',
                )
            );

        $output .= beans_close_markup( 'beans_search_form', 'form' );

    $output .= beans_close_markup( 'beans_search_form_wrapper', 'div' );

    return $output;
}
