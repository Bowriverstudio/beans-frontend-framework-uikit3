<?php
/**
 * Echo menu fragments.
 *
 * @package Beans\Framework\Templates\Fragments
 *
 * @since   1.0.0
 */

beans_add_smart_action( 'beans_header', 'test_menu', 15 );

function test_menu(){
?>
    <nav class="uk-navbar-container uk-margin uk-navbar" uk-navbar="">
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav uk-navbar-nav-primary">
                <li class="uk-active"><a href="#">Active</a></li>
                <li>
                    <a href="#" aria-expanded="false" class="">Parent</a>
                    <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-left uk-animation-fade uk-animation-enter" style="left: 72.3125px; top: 80px; animation-duration: 200ms;">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li class="uk-active"><a href="#">Active</a></li>
                            <li class="uk-parent">
                                <a href="#">Parent</a>
                                <ul class="uk-nav-sub">
                                    <li><a href="#">Sub item</a></li>
                                    <li><a href="#">Sub item</a></li>
                                </ul>
                            </li>
                            <li class="uk-nav-header">Header</li>
                            <li><a href="#"><span class="uk-margin-small-right uk-icon" uk-icon="icon: table"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="table"><rect x="1" y="3" width="18" height="1"></rect><rect x="1" y="7" width="18" height="1"></rect><rect x="1" y="11" width="18" height="1"></rect><rect x="1" y="15" width="18" height="1"></rect></svg></span> Item</a></li>
                            <li><a href="#"><span class="uk-margin-small-right uk-icon" uk-icon="icon: thumbnails"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="thumbnails"><rect fill="none" stroke="#000" x="3.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="3.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="11.5" y="11.5" width="5" height="5"></rect><rect fill="none" stroke="#000" x="3.5" y="11.5" width="5" height="5"></rect></svg></span> Item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="#"><span class="uk-margin-small-right uk-icon" uk-icon="icon: trash"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="trash"><polyline fill="none" stroke="#000" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline><polyline fill="none" stroke="#000" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline><rect x="8" y="7" width="1" height="9"></rect><rect x="11" y="7" width="1" height="9"></rect><rect x="2" y="3" width="16" height="1"></rect></svg></span> Item</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" aria-expanded="false" class="">Content</a>
                    <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-left uk-animation-fade uk-animation-enter" style="left: 146.781px; top: 80px; animation-duration: 200ms;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                </li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
            </ul>

        </div>
    </nav>
<!--    </div>-->
<?php
}

//beans_add_smart_action( 'beans_header', 'beans_primary_menu', 15 );
/**
 * Echo primary menu.
 *
 * @since 1.0.0
 * @since 1.5.0 Added ID and tabindex for skip links.
 *
 * @return void
 */
function beans_primary_menu() {
	$nav_visibility = current_theme_supports( 'offcanvas-menu' ) ? 'uk-visible-large-todo' : '';

	beans_open_markup_e(
		'beans_primary_menu',
		'nav',
		array(
			'class'      => 'tm-primary-menu uk-navbar-right uk-navba-todor',
			'id'         => 'beans-primary-navigation',
			'role'       => 'navigation',
			'itemscope'  => 'itemscope',
			'itemtype'   => 'https://schema.org/SiteNavigationElement',
			'aria-label' => esc_attr__( 'Primary Navigation Menu', 'tm-beans' ),
			'tabindex'   => '-1',
            'uk-navbar-todo '  => '',
		)
	);

		/**
		 * Filter the primary menu arguments.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args Nav menu arguments.
		 */
		$args = apply_filters(
			'beans_primary_menu_args',
			array(
				'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
				'fallback_cb'    => 'beans_no_menu_notice',
				'container'      => '',
				'menu_class'     => $nav_visibility, // Automatically escaped.
				'echo'           => false,
				'beans_type'     => 'navbar',
			)
		);

		// Navigation.
		beans_output_e( 'beans_primary_menu', wp_nav_menu( $args ) );

	beans_close_markup_e( 'beans_primary_menu', 'nav' );
}

//beans_add_smart_action( 'beans_primary_menu_append_markup', 'beans_primary_menu_offcanvas_button', 5 );
/**
 * Echo primary menu offcanvas button.
 *
 * @since 1.0.0
 *
 * @return void
 */
function beans_primary_menu_offcanvas_button() {

	if ( ! current_theme_supports( 'offcanvas-menu' ) ) {
		return;
	}

	beans_open_markup_e(
		'beans_primary_menu_offcanvas_button',
		'a',
		array(
			'href'              => '#offcanvas_menu',
			'class'             => 'uk-button uk-button-default uk-hidden@l',
			'uk-toggle' => '',
		)
	);

		beans_open_markup_e(
			'beans_primary_menu_offcanvas_button_icon',
			'span',
			array(
				'class'       => 'uk-margin-small-right',
				'aria-hidden' => 'true',
                'uk-icon="menu"' => '',
            )
		);

		beans_close_markup_e( 'beans_primary_menu_offcanvas_button_icon', 'span' );

		beans_output_e( 'beans_offcanvas_menu_button', esc_html__( 'Menu', 'tm-beans' ) );

	beans_close_markup_e( 'beans_primary_menu_offcanvas_button', 'a' );
}

beans_add_smart_action( 'beans_widget_area_offcanvas_bar_offcanvas_menu_prepend_markup', 'beans_primary_offcanvas_menu' );
/**
 * Echo off-canvas primary menu.
 *
 * @since 1.0.0
 *
 * @return void
 */
function beans_primary_offcanvas_menu() {

	if ( ! current_theme_supports( 'offcanvas-menu' ) ) {
		return;
	}

	beans_open_markup_e(
		'beans_primary_offcanvas_menu',
		'nav',
		array(
			'class'      => 'tm-primary-offcanvas-menu uk-margin uk-margin-top',
			'role'       => 'navigation',
			'aria-label' => esc_attr__( 'Off-Canvas Primary Navigation Menu', 'tm-beans' ),
		)
	);

		/**
		 * Filter the off-canvas primary menu arguments.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args Off-canvas nav menu arguments.
		 */
		$args = apply_filters(
			'beans_primary_offcanvas_menu_args',
			array(
				'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
				'fallback_cb'    => 'beans_no_menu_notice',
				'container'      => '',
				'echo'           => false,
				'beans_type'     => 'offcanvas',
			)
		);

		beans_output_e( 'beans_primary_offcanvas_menu', wp_nav_menu( $args ) );

	beans_close_markup_e( 'beans_primary_offcanvas_menu', 'nav' );
}

/**
 * Echo no menu notice.
 *
 * @since 1.0.0
 *
 * @return void
 */
function beans_no_menu_notice() {
	beans_open_markup_e( 'beans_no_menu_notice', 'p', array( 'class' => 'uk-alert uk-alert-warning' ) );

		beans_output_e( 'beans_no_menu_notice_text', esc_html__( 'Whoops, your site does not have a menu!', 'tm-beans' ) );

	beans_close_markup_e( 'beans_no_menu_notice', 'p' );
}
