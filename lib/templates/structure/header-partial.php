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

//<!--    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">-->
beans_open_markup_e(
    'beans_fixed_wrap[__header]',
    'div',
    array(
        'uk-sticky' => 'sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky '
//            'uk-sticky' => "sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky"
    ));

	beans_open_markup_e(
	    'beans_fixed_wrap[_header]',
        'div',
        array(
            'class' => 'uk-container ' . beans_get_header_max_width(),
//            'uk-sticky' => "sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky"
        ));
//<nav class="uk-navbar-container uk-margin" uk-navbar>
beans_open_markup_e(
    'beans_navbar_container[_header]',
    'div',
    array(
        'class' => 'uk-navbar uk-navbar-container uk-margin',
//'uk-navbar' =>''
    ));


/**
		 * Fires in the header.
		 *
		 * @since 1.0.0
		 */
		do_action( 'beans_header' );

beans_close_markup_e( 'beans_fixed_wrap[_header]', 'div' );
beans_close_markup_e( 'beans_fixed_wrap[_header]', 'div' );
beans_close_markup_e( 'beans_fixed_wrap[__header]', 'div' );

beans_close_markup_e( 'beans_header', 'header' );
