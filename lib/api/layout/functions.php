<?php
/**
 * Extends the Beans Layout API controls what and how Beans main section elements are displayed.
 * For specific
 *
 * Layouts are:
 *      - "c" or "content" - content only
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
 * @param string $id The searched layout section ID.
 *
 * @return bool Layout class, false if no layout class found.
 * @since 1.0.0
 *
 */
function beans_get_layout_class($id)
{
    /**
     * Filter the arguments used to define the layout grid.
     *
     * The content number of columns are automatically calculated based on the grid, sidebar primary and
     * sidebar secondary columns.
     *
     * @param array $args {
     *                                 An array of arguments.
     *
     * @type int $grid Total number of columns the grid contains. Default 4.
     * @type int $sidebar_primary The number of columns the sidebar primary takes. Default 1.
     * @type int $sidebar_secondary The number of columns the sidebar secondary takes. Default 1.
     * @type string $breakpoint The UIkit 3 grid breakpoint which may be set to 's', 'm', 'l' or 'xl'. Default 'm'.
     * }
     * @since 1.0.0
     *
     */
    $args = apply_filters(
        'beans_layout_grid_settings',
        array(
            'grid' => 4,
            'sidebar_primary' => 1,
            'sidebar_secondary' => 1,
            'breakpoint' => 'm',
        )
    );

    /**
     * Filter the layout class.
     *
     * The dynamic portion of the hook name refers to the searched layout section ID.
     *
     * @param string $layout The layout class.
     * @since 1.0.0
     *
     */
    return apply_filters("beans_layout_class_{$id}", beans_get($id, _beans_get_layout_classes($args)));
}

/**
 * Get the layout's class attribute values.
 *
 * @param array $args Grid configuration.
 *
 * @return array
 * @since  1.5.0
 * @ignore
 * @access private
 *
 */
function _beans_get_layout_classes(array $args)
{
    $grid = beans_get('grid', $args);
    $c = $grid; // $c stands for "content".
    $sp = beans_get('sidebar_primary', $args);
    $ss = beans_get('sidebar_secondary', $args);
    $prefix = 'uk-width';
    $suffix = '@' . beans_get('breakpoint', $args, 'medium');

    $classes = array(
        'content' => "{$prefix}-{$c}-{$grid}-{$suffix}",
    );

    if (!beans_has_widget_area('sidebar_primary')) {
        return $classes;
    }

    $layout = beans_get_layout();

    switch ($layout) {

        case 'c_sp':
        case 'sp_c':
            $c = $grid - $sp;
            $classes['sidebar_primary'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$sp}-{$grid}") . "{$suffix}";
            $classes['content'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$c}-{$grid}") . "{$suffix}";
            break;

        case 'c_ss':
        case 'ss_c':
            $c = $grid - $ss;
            $classes['sidebar_secondary'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$ss}-{$grid}") . "{$suffix}";
            $classes['content'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$c}-{$grid}") . "{$suffix}";
            break;


        case 'c_sp_ss':
        case 'sp_c_ss':
        case 'sp_ss_c':
        $c = $grid - $sp - $ss;
        $classes['sidebar_primary'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$sp}-{$grid}") . "{$suffix}";
        $classes['sidebar_secondary'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$ss}-{$grid}") . "{$suffix}";
        $classes['content'] = "{$prefix}-" . beans_get_uikit_reduced_grid("{$c}-{$grid}") . "{$suffix}";

        break;

        case 'c':
            $classes['content'] = "{$prefix}-1-1{$suffix}";
            break;

    }

    return $classes;
}

/**
 * Sets the Side bar layout order
 *
 * UiKit 3 does not support grid pull or pushes - which is why the dom order is set instead of the original way.
 */
function beans_set_sidebar_layout_callbacks()
{
    $layout = beans_get_layout();
    switch ($layout) {

        case 'c_sp':
        case 'c_sp_ss':
        case 'c_ss':
            beans_add_smart_action('beans_primary_after_markup', 'beans_sidebar_primary_template', 5);
            beans_add_smart_action('beans_primary_after_markup', 'beans_sidebar_secondary_template');
            break;

        case 'sp_c_ss':
            beans_add_smart_action('beans_primary_before_markup', 'beans_sidebar_primary_template', 5);
            beans_add_smart_action('beans_primary_after_markup', 'beans_sidebar_secondary_template');
            break;

        case 'sp_c':
        case 'ss_c':
        case 'sp_ss_c':
            beans_add_smart_action('beans_primary_before_markup', 'beans_sidebar_primary_template', 5);
            beans_add_smart_action('beans_primary_before_markup', 'beans_sidebar_secondary_template');
            break;

        case 'c':
        case 'full-width-content':
        default:
            break;

    }
}
