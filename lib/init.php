<?php
/**
 *
 */
namespace Beans_Frontend_Framework_UiKit3;

add_action( 'beans_init', __NAMESPACE__.'\beans_includes_assets' );
/**
 * Include framework files.
 *
 * @since 1.0.0
 * @ignore
 *
 * @return void
 */
function beans_includes_assets() {
    require_once BEANS_FRONTEND_FRAMEWORK_PATH . 'assets/assets.php';
}

add_action( 'plugin_loaded', __NAMESPACE__.'\plugin_includes');
function plugin_includes(){
    require_once BEANS_FRONTEND_FRAMEWORK_PATH . 'lib/migration/functions.php';
}

add_action( 'plugin_loaded', __NAMESPACE__.'\define_constants');
/**
 * Define constants, used in this plugin and Bean's Framework.
 *
 * @since 1.0.0
 *
 * @return null
 */
function define_constants() {

    if (defined('BEANS_FRONTEND_FRAMEWORK')) {
        return;
    }

    // Required to ensure a frontend framework is loaded.
    define( 'BEANS_FRONTEND_FRAMEWORK', 'uikit3' );

    // Used by the Beans Framework.
    define( 'BEANS_RENDER_PATH', BEANS_FRONTEND_FRAMEWORK_PATH . 'lib/render/' );
    define( 'BEANS_TEMPLATES_PATH', BEANS_FRONTEND_FRAMEWORK_PATH . 'lib/templates/' );
//
    // Used Internally within this plugin
    define( 'BEANS_CSSFRAMEWORK_ADMIN_PATH', BEANS_FRONTEND_FRAMEWORK_PATH . 'lib/admin/' );

    define( 'BEANS_ASSETS_URL', BEANS_FRONTEND_FRAMEWORK_BASE_URL . 'assets/' );
    define( 'BEANS_LESS_URL', BEANS_ASSETS_URL . 'less/' );
    define( 'BEANS_JS_URL', BEANS_ASSETS_URL . 'js/' );
    define( 'BEANS_IMAGE_URL', BEANS_ASSETS_URL . 'images/' );
    define( 'BEANS_FRONTEND_FRAMEWORK_CONFIG_PATH' , BEANS_FRONTEND_FRAMEWORK_PATH . 'config/');

}

add_action( 'beans_init', __NAMESPACE__.'\beans_includes' );
/**
 * Include framework files.
 *
 * @modified 2.0.0 - removed hard dependency on uikit3
 * @since 1.0.0
 * @ignore
 *
 * @return void
 */
function beans_includes()
{
// Include renderers.
    require_once BEANS_RENDER_PATH . 'template-parts.php';
    require_once BEANS_RENDER_PATH . 'fragments.php';
    require_once BEANS_RENDER_PATH . 'widget-area.php';
    require_once BEANS_RENDER_PATH . 'walker.php';
    require_once BEANS_RENDER_PATH . 'menu.php';

    // Include customizer.
    if ( is_customize_preview() ) {
        require_once BEANS_FRONTEND_FRAMEWORK_PATH.'lib/admin/wp-customizer.php';
    }
}

add_action('beans_after_load_api', __NAMESPACE__.'\add_custom_css_framework');
/**
 * Load css framework dependencies.
 *
 * @since 1.0.0
 *
 * @return null
 */
function add_custom_css_framework(){
    if (is_admin() ){
        require_once BEANS_FRONTEND_FRAMEWORK_PATH.'lib/admin/menu-uikit3.php';
    }
    require_once BEANS_FRONTEND_FRAMEWORK_PATH.'lib/api/layout/functions.php';
    require_once BEANS_FRONTEND_FRAMEWORK_PATH.'lib/api/header-layout/functions.php';
    require_once BEANS_FRONTEND_FRAMEWORK_PATH.'lib/api/utilities/functions.php';

}

add_filter('beans_get_container_options', __NAMESPACE__ .'\beans_get_container_options');
/**
 * List of containers that header or body can use.
 *
 * Since Beans 2.0.0
 * @return array
 */
function beans_get_container_options(){
    return array(
        '' => ['label' => __('Default', 'tm-beans')],
        'uk-container-xsmall' => ['label' => __('xsmall container', 'tm-beans')],
        'uk-container-small' => ['label' => __('small container.', 'tm-beans')],
        'uk-container-large' => ['label' => __('large container', 'tm-beans')],
        'uk-container-expand' => ['label' => __('Unlimited with dynamic horizontal padding', 'tm-beans')],
    );
}