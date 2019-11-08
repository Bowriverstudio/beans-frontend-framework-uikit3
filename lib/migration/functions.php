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

add_action( 'wp_enqueue_scripts', __NAMESPACE__.'\beans_migration' );
/**
 * Enquires uikit migration script.
 */
function beans_migration(){
    if( get_option( 'beans_migration_mode', false )){
        wp_enqueue_script( 'uikit_migration', 'https://getuikit.com/migrate.min.js', array(), '1.0.0', true );
    }
}


