<?php
/**
 * Beans Frontend Framework, using UiKit3.
 *
 * https://getuikit.com/v2/
 *
 * @package    Beans_Frontend_Framework_UiKit3_2
 * @since      1.0.0
 * @author     Maurice Tadros, Yaidel Ferralize, Disnel Rodriguez
 * @link       https://bowriverstudio.com
 * @license    GNU-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:     Beans Frontend Framework UiKit 3.2
 * Description:      Use uikit 3.2 as the frontend framework.
 * Version:         0.9
 * Requires PHP:    7.0.x
 *
 * In-progress:
 *  - Add support for plugin to be activated deactivated.
 *  - Add Unit Tests
 *  - Clean up TODOs
 *  - Test on a few different sites.
 *  - Add Breakpoint to Admin Menu.
 *  - Create a Page in Admin system with some uikit documentation.
 */
namespace Beans_Frontend_Framework_UiKit3;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Hello, Hello, Hello, what\'s going on here then?' );
}

define( 'BEANS_FRONTEND_FRAMEWORK_PATH', plugin_dir_path(__FILE__)  .'/' );
define( 'BEANS_FRONTEND_FRAMEWORK_BASE_URL', plugin_dir_url(__FILE__) );

require_once BEANS_FRONTEND_FRAMEWORK_PATH . 'lib/init.php';






