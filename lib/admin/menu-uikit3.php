<?php
/**
 * This class build the Beans UiKit3 Admin Page.
 *
 * @package Beans\Framework\API
 *
 * @since 1.0.0
 */

/**
 * Beans admin page.
 *
 * @since   1.0.0
 * @ignore
 * @access  private
 *
 * @package Beans\Framework\API
 */
final class _Beans_Admin_Menu_Uikit3 {

    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 150 );
        add_action( 'admin_init', array( $this, 'register' ), 20 );
    }

    /**
     * Add Beans' menu.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function admin_menu() {
        add_submenu_page( 'beans', __( 'UiKit3', 'tm-beans' ), __( 'UiKit3', 'tm-beans' ), 'manage_options', 'beans_uikit3', array( $this, 'display_screen' ));
    }

    /**
     * Beans options page content.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function display_screen() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Beans Settings', 'tm-beans' ); ?><span style="float: right; font-size: 12px; color: #555;"><?php esc_html_e( 'Version ', 'tm-beans' ); ?><?php echo esc_attr( BEANS_VERSION ); ?></span></h1>
            <p>Hello - do things</p>
            <?php beans_options( 'beans_uikit3' ); ?>
        </div>
        <?php
    }

    /**
     * Register options.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function register() {
        global $wp_meta_boxes;

        $fields = array(
            array(
                'id'             => 'beans_migration_mode',
                'checkbox_label' => __( 'Select to include scripts.', 'tm-beans' ),
                'type'           => 'checkbox',
                'description'    => __( 'This option should be enabled while the migration is occurring only. See <a href="https://getuikit.com/docs/migration">Migration</a> for more details.  <p>Note: Warnings found in component navbar can be ignored.</p>', 'tm-beans' ),
            ),
        );

        beans_register_options(
            $fields,
            'beans_uikit3',
            'css_framework_options',
            array(
                'title'   => __( 'UiKit 2 to UiKit 3 Migration', 'tm-beans' ),
                'context' => beans_get( 'beans_settings', $wp_meta_boxes ) ? 'column' : 'normal',
                // Check for other beans boxes.
            )
        );

    }
}

new _Beans_Admin_Menu_Uikit3();
