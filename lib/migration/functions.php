<?php
/**
 * The Plugin potentially includes the migration script  {@link https://getuikit.com/docs/migration UIkit 2 -> 3 Migration}.
 *
 *
 * When development mode is enabled, file changes will automatically be detected. This makes it very easy
 * to style UIkit themes using LESS.
 *
 * @package Beans_Frontend_Framework_UiKit3_2\Lib\Migration
 *
 * @since   1.0.0
 */
namespace Beans_Frontend_Framework_UiKit3;

add_action( 'admin_init', __NAMESPACE__.'\register_migration_options' );
/**
 * Displays the UiKit 3 Migration option in the dashboard -> themes -> settings.
 */
function register_migration_options(){
    global $wp_meta_boxes;

    $fields = array(
        array(
            'id'             => 'beans_migration_mode',
            'checkbox_label' => __( 'Select to include scripts.', 'tm-beans' ),
            'type'           => 'checkbox',
            'description'    => __( 'This option should be enabled while the migration is occurring only. See <a href="https://getuikit.com/docs/migration">Migration</a> for more details.', 'tm-beans' ),
        ),
    );

    beans_register_options(
        $fields,
        'beans_settings',
        'css_framework_options',
        array(
            'title'   => __( 'UiKit 2 to UiKit 3 Migration', 'tm-beans' ),
            'context' => beans_get( 'beans_settings', $wp_meta_boxes ) ? 'column' : 'normal',
            // Check for other beans boxes.
        )
    );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__.'\beans_migration' );
/**
 * Enquires uikit migration script.
 */
function beans_migration(){
    if( get_option( 'beans_migration_mode', false )){
        wp_enqueue_script( 'uikit_migration', 'https://getuikit.com/migrate.min.js', array(), '1.0.0', true );
    }
}


