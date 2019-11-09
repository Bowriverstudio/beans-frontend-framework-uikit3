<?php
/**
 * Since WordPress force us to use the header.php name to open the document, we add a header-partial.php template for the actual header.
 *
 * @package Beans\Framework\Templates\Structure
 *
 * @since   1.0.0
 */

beans_open_markup_e(
	'beans_header',
	'header',
	array(
		'class'     => 'tm-header uk-section',
		'role'      => 'banner',
		'itemscope' => 'itemscope',
		'itemtype'  => 'https://schema.org/WPHeader',
	)
);

	beans_open_markup_e(
	    'beans_fixed_wrap[_header]',
        'div',
        array(
            'class' => 'uk-container ' . beans_get_header_max_width(),
//            'uk-sticky' => "sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky"
        ));

		/**
		 * Fires in the header.
		 *
		 * @since 1.0.0
		 */
		do_action( 'beans_header' );

	beans_close_markup_e( 'beans_fixed_wrap[_header]', 'div' );

beans_close_markup_e( 'beans_header', 'header' );
