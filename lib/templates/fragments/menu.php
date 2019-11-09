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
<!--    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">-->
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">Logo</a>
    </div>
        <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="#">
                    <span class="uk-icon uk-margin-small-right" uk-icon="icon: star"></span>
                    Features
                </a>
            </li>
        </ul>

        <div class="uk-navbar-item">
            <div>Some <a href="#">Link</a></div>
        </div>

        <div class="uk-navbar-item">
            <form action="javascript:void(0)">
                <input class="uk-input uk-form-width-small" type="text" placeholder="Input">
                <button class="uk-button uk-button-default">Button</button>
            </form>
        </div>

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
			'class'      => 'tm-primary-menu uk-navba-todor',
			'id'         => 'beans-primary-navigation',
			'role'       => 'navigation',
			'itemscope'  => 'itemscope',
			'itemtype'   => 'https://schema.org/SiteNavigationElement',
			'aria-label' => esc_attr__( 'Primary Navigation Menu', 'tm-beans' ),
			'tabindex'   => '-1',
            'uk-navbar-todo'  => '',
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

beans_add_smart_action( 'beans_primary_menu_append_markup', 'beans_primary_menu_offcanvas_button', 5 );
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
