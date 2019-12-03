<?php
/**
 * Echo breadcrumb fragment.
 *
 * @package Beans\Framework\Templates\Fragments
 *
 * @since   1.0.0
 */





beans_add_smart_action( 'beans_main_grid_before_markup', 'beans_breadcrumb' );
/**
 * Echo the breadcrumb.
 *
 * @updated 2.0.0 Add support for sidebar, and moved logic to theme.
 * @since 1.0.0
 *
 * @return void
 */
function beans_breadcrumb() {


    $breadcrumbs = beans_get_breadcrumbs();
    if( ! $breadcrumbs) {
        return;
    }

	// Open breadcrumb.
	beans_open_markup_e( 'beans_breadcrumb', 'ul', array( 'class' => 'uk-breadcrumb uk-width-1-1' ) );
		$i = 0;

	foreach ( $breadcrumbs as $breadcrumb_url => $breadcrumb ) {

		// Breadcrumb items.
		if ( count( $breadcrumbs ) - 1 !== $i ) {
			beans_open_markup_e( 'beans_breadcrumb_item', 'li' );

				beans_open_markup_e( 'beans_breadcrumb_item_link', 'a', array( 'href' => $breadcrumb_url ) ); // Automatically escaped.

					// Used for mobile devices.
					beans_open_markup_e( 'beans_breadcrumb_item_link_inner', 'span' );

						beans_output_e( 'beans_breadcrumb_item_text', $breadcrumb );

					beans_close_markup_e( 'beans_breadcrumb_item_link_inner', 'span' );

				beans_close_markup_e( 'beans_breadcrumb_item_link', 'a' );

			beans_close_markup_e( 'beans_breadcrumb_item', 'li' );
		} else { // Active.
			beans_open_markup_e( 'beans_breadcrumb_item[_active]', 'li', array( 'class' => 'uk-active uk-text-muted' ) );

				beans_output_e( 'beans_breadcrumb_item[_active]_text', $breadcrumb );

			beans_close_markup_e( 'beans_breadcrumb_item[_active]', 'li' );
		}

		$i++;
	}

	// Close breadcrumb.
	beans_close_markup_e( 'beans_breadcrumb', 'ul' );
}
