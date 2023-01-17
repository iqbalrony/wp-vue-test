<?php
/**
 * Plugin Name: WP Vue Test
 * Author URI:  https://www.iqbalrony.com
 * Author:      IqbalRony
 * Version:     1.0.0
 * Text Domain: wp-vue-test
 */

namespace IR\WpVueTest;

final class WpVueTest {

	/**
	 * @var mixed
	 */
	private static $instance = null;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function init() {
		add_action( 'plugins_loaded', [$this, 'on_plugins_loaded'] );
	}

	public function on_plugins_loaded() {
		$this->menu_add();
		add_action( 'admin_enqueue_scripts', [ $this, 'load_scripts' ] );

    }

	public function load_scripts() {
		// wp_enqueue_script(
		// 	'vue-3',
		// 	// 'https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js',
		// 	'https://unpkg.com/vue@3/dist/vue.global.prod.js',
		// 	[],
		// 	rand(),
		// 	true
		// );

		wp_enqueue_script(
			'wp-vue-test-js',
			// plugins_url( '', __FILE__ ) . '/assets/js/main.js',
			// plugins_url( '', __FILE__ ) . '/assets/js/main-2.js',
			plugins_url( '', __FILE__ ) . '/src/js/main.js',
			[],
			rand(),
			true
		);

        // wp_localize_script( 'wpvk-admin', 'wpvkAdminLocalizer', [
        //     'adminUrl'  => admin_url( '/' ),
        //     'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        //     'apiUrl'    => home_url( '/wp-json' ),
        // ] );
    }

	public function menu_add() {
        add_menu_page (
            __( 'WP Vue Test', 'textdomain' ),
            __( 'WP Vue Test', 'textdomain' ),
            'manage_options',
            'wp-vue-test',
            [ $this, 'menu_callback' ],
            'dashicons-buddicons-replies',
			7
        );
    }

	public function menu_callback() {
        echo '<div id="wp-vue-test">{{name}}</dev>';
    }

}
WpVueTest::instance()->init();
