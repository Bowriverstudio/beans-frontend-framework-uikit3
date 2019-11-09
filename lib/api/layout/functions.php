<?php
/**
 * Extends the Beans Layout API controls what and how Beans main section elements are displayed.
 * For specific
 *
 * Layouts are:
 *      - "c" - content only
 *      - "c_sp" - content + sidebar primary
 *      - "sp_c" - sidebar primary + content
 *      - "c_ss" - content + sidebar secondary
 *      - "c_sp_ss" - content + sidebar primary + sidebar secondary
 *      - "ss_c" - sidebar secondary + content
 *      - "sp_ss_c" - sidebar primary + sidebar secondary + content
 *      - "sp_c_ss" - sidebar primary + content + sidebar secondary
 *
 * @package Beans\Framework\API\Layout
 *
 * @since   Beans 1.7.0
 */

/**
 * Get the current web page's layout class.
 *
 * This function generates the layout class(es) based on the current layout.
 *
 * @since 1.0.0
 *
 * @param string $id The searched layout section ID.
 *
 * @return bool Layout class, false if no layout class found.
 */
function beans_get_layout_class( $id ) {
    /**
     * Filter the arguments used to define the layout grid.
     *
     * The content number of columns are automatically calculated based on the grid, sidebar primary and
     * sidebar secondary columns.
     *
     * @since 1.0.0
     *
     * @param array $args              {
     *                                 An array of arguments.
     *
     * @type int    $grid              Total number of columns the grid contains. Default 4.
     * @type int    $sidebar_primary   The number of columns the sidebar primary takes. Default 1.
     * @type int    $sidebar_secondary The number of columns the sidebar secondary takes. Default 1.
     * @type string $breakpoint        The UIkit 3 grid breakpoint which may be set to 's', 'm', 'l' or 'xl'. Default 'm'.
     * }
     */
    $args = apply_filters(
        'beans_layout_grid_settings',
        array(
            'grid'              => 4,
            'sidebar_primary'   => 1,
            'sidebar_secondary' => 1,
            'breakpoint'        => 'm',
        )
    );

    /**
     * Filter the layout class.
     *
     * The dynamic portion of the hook name refers to the searched layout section ID.
     *
     * @since 1.0.0
     *
     * @param string $layout The layout class.
     */
    return apply_filters( "beans_layout_class_{$id}", beans_get( $id, _beans_get_layout_classes( $args ) ) );
}

/**
 * Get the layout's class attribute values.
 *
 * @since  1.5.0
 * @ignore
 * @access private
 * @TODO test other layouts
 *
 * @param array $args Grid configuration.
 *
 * @return array
 */
function _beans_get_layout_classes( array $args ) {
    $grid   = beans_get( 'grid', $args );
    $c      = $grid; // $c stands for "content".
    $sp     = beans_get( 'sidebar_primary', $args );
    $ss     = beans_get( 'sidebar_secondary', $args );
    $prefix = 'todo-uk-width-';
    $suffix = '@' . beans_get( 'breakpoint', $args, 'medium' );

    $classes = array(
        'content' => "{$prefix}-{$c}-{$grid}-{$suffix}",
    );

    if ( ! beans_has_widget_area( 'sidebar_primary' ) ) {
        return $classes;
    }

    $layout        = beans_get_layout();
    $has_secondary = beans_has_widget_area( 'sidebar_secondary' );
    $c             = $has_secondary && strlen( trim( $layout ) ) > 4 ? $grid - ( $sp + $ss ) : $grid - $sp;

    switch ( $layout ) {

        case 'c_sp':
        case 'c_sp_ss':
            $classes['content']         = "{$prefix}-{$c}-{$grid}";
            $classes['sidebar_primary'] = "{$prefix}-{$sp}-{$grid}";

            if ( $has_secondary && 'c_sp_ss' === $layout ) {
                $classes['sidebar_secondary'] = "{$prefix}-{$ss}-{$grid}";
            }
            break;

        case 'sp_c':
        case 'sp_c_ss':
            $classes['content']         = "{$prefix}-{$c}-{$grid} uk-push-{$sp}-{$grid}";
            $classes['sidebar_primary'] = "{$prefix}-{$sp}-{$grid} uk-pull-{$c}-{$grid}";

            if ( $has_secondary && 'sp_c_ss' === $layout ) {
                $classes['sidebar_secondary'] = "{$prefix}-{$ss}-{$grid}";
            }
            break;

        case 'c_ss':
            // If we don't have a secondary sidebar, bail out.
            if ( ! $has_secondary ) {
                return $classes;
            }

            $classes['content']           = "{$prefix}-{$c}-{$grid}";
            $classes['sidebar_secondary'] = "{$prefix}-{$ss}-{$grid}";
            break;

        case 'ss_c':
            // If we don't have a secondary sidebar, bail out.
            if ( ! $has_secondary ) {
                return $classes;
            }

            $classes['content']           = "{$prefix}-{$c}-{$grid} uk-push-{$ss}-{$grid}";
            $classes['sidebar_secondary'] = "{$prefix}-{$ss}-{$grid} uk-pull-{$c}-{$grid}";
            break;

        case 'sp_ss_c':
            $push_content               = $has_secondary ? $sp + $ss : $sp;
            $classes['content']         = "{$prefix}-{$c}-{$grid} uk-push-{$push_content}-{$grid}";
            $classes['sidebar_primary'] = "{$prefix}-{$sp}-{$grid} uk-pull-{$c}-{$grid}";

            if ( $has_secondary ) {
                $classes['sidebar_secondary'] = "{$prefix}-{$ss}-{$grid} uk-pull-{$c}-{$grid}";
            }

            break;
    }

    return $classes;
}