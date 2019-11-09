<?php
/**
 * Extends the Beans Header Layout API.

 * @package Beans\Framework\API\Layout
 *
 * @since   Beans 2.0.0
 */

/**
 * Get the current web page's header max with.
 *
 * @since 1.0.0
 *
 * @return string UiKit class, empty string if no layout class found.
 */
function beans_get_header_max_width( ) {

    /**
     * Filter the header's max width.
     *
     * @since 1.0.0
     *
     */
    return apply_filters( "beans_header_max_width", get_theme_mod('beans_header_max_width', beans_get_customizer_default_value('beans_header_max_width') ));
}

