<?php
/**
 * Plugin Name:     RRZE TOS
 * Plugin URI:      https://github.com/RRZE-Webteam/rrze-tos.git
 * Description:     WordPress-Plugin: Prüfung einer Website aus dem FAU-Netzwerk gemäß den Konformitätskriterien der TOS.
 * Version:         0.1.2
 * Author:          RRZE-Webteam
 * Author URI:      https://blogs.fau.de/webworking/
 * License:         GPL-3.0
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:     /languages
 * Text Domain:     rrze-tos
 *
 * @package    WordPress
 * @subpackage TOS
 *
RRZE TOS is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

RRZE TOS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with RRZE TOS. If not, see https://www.gnu.org/licenses/old-licenses/gpl-3.0.txt.
 */

namespace RRZE\Tos {

	use RRZE\Tos\Main;

	defined( 'ABSPATH' ) || exit;

	const RRZE_PHP_VERSION = '7.1';
	const RRZE_WP_VERSION  = '5.0';

	register_activation_hook( __FILE__, 'RRZE\Tos\activation' );
	register_deactivation_hook( __FILE__, 'RRZE\Tos\deactivation' );

	add_action( 'plugins_loaded', 'RRZE\Tos\loaded' );

	/**
	 * Einbindung der Sprachdateien.
	 *
	 * @return void
	 */
	function load_textdomain() {
		load_plugin_textdomain( 'rrze-tos', false, sprintf( '%s/languages/', dirname( plugin_basename( __FILE__ ) ) ) );
	}

	/**
	 * Wird durchgeführt, nachdem das Plugin aktiviert wurde.
	 *
	 * @return void
	 */
	function activation() {
		// Sprachdateien werden eingebunden.
		load_textdomain();

		// Überprüft die minimal erforderliche PHP- u. WP-Version.
		system_requirements();

		include_once __DIR__ . '/includes/endpoint/class-tos-endpoint.php';
		$obj = new Tos_Endpoint();
		$obj->default_options();
		$obj->rewrite();

		flush_rewrite_rules();

		// Ab hier können die Funktionen hinzugefügt werden,
		// die bei der Aktivierung des Plugins aufgerufen werden müssen.
		// Bspw. wp_schedule_event, flush_rewrite_rules, etc.
	}

	/**
	 * Wird durchgeführt, nachdem das Plugin deaktiviert wurde.
	 *
	 * @return void
	 */
	function deactivation() {
		flush_rewrite_rules();
		// Hier können die Funktionen hinzugefügt werden, die
		// bei der Deaktivierung des Plugins aufgerufen werden müssen.
		// Bspw. wp_clear_scheduled_hook, flush_rewrite_rules, etc.
	}

	/**
	 * Überprüft die minimal erforderliche PHP- u. WP-Version.
	 *
	 * @return void
	 */
	function system_requirements() {
		$error = '';

		if ( version_compare( PHP_VERSION, RRZE_PHP_VERSION, '<' ) ) {
			$error = sprintf( __( 'Your server is running PHP version %1$s. Please upgrade at least to PHP version %2$s.', 'rrze-tos' ), PHP_VERSION, RRZE_PHP_VERSION );
		}

		if ( version_compare( $GLOBALS['wp_version'], RRZE_WP_VERSION, '<' ) ) {
			$error = sprintf( __( 'Your WordPress version is %1$s. Please upgrade at least to WordPress version %2$s.', 'rrze-tos' ), $GLOBALS['wp_version'], RRZE_WP_VERSION );
		}

		// Wenn die Überprüfung fehlschlägt, dann wird das Plugin automatisch deaktiviert.
		if ( ! empty( $error ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ), false, true );
			wp_die( esc_html( $error ) );
		}
	}

	/**
	 * Wird durchgeführt, nachdem das WP-Grundsystem hochgefahren
	 * und alle Plugins eingebunden wurden.
	 *
	 * @return void
	 */
	function loaded() {
		// Sprachdateien werden eingebunden.
		add_action( 'wp_enqueue_scripts', 'RRZE\Tos\rrze_tos_scripts' );
		add_action( 'admin_enqueue_scripts', 'RRZE\Tos\rrze_tos_admin_scripts' );
		load_textdomain();
		include_once __DIR__ . '/includes/helper/tos-helper-functions.php';
		autoload();
		include_once __DIR__ . '/includes/shortcode/tos-contact-form-captcha.php';
		include_once __DIR__ . '/includes/shortcode/tos-contact-form-shortcode.php';
		include_once __DIR__ . '/includes/shortcode/tos-admin-information-shortcode.php';
		include_once __DIR__ . '/includes/endpoint/class-tos-endpoint.php';
		new Tos_Endpoint();
		include_once __DIR__ . '/includes/menu/tos-add-footer-menu.php';

		// Ab hier können weitere Funktionen bzw. Klassen angelegt werden.
	}

	/**
	 * Register Scripts.
	 *
	 * @return void
	 */
	function rrze_tos_scripts() {
//		wp_register_style( 'tos_styles', plugins_url( 'rrze-tos/assets/css/styles.min.css', dirname( __FILE__ ) ) );
//		wp_register_style( 'tos_styles_rrze', plugins_url( 'rrze-tos/assets/css/rrze-styles.min.css', dirname( __FILE__ ) ) );
		wp_register_style( 'tos_styles_events', plugins_url( 'rrze-tos/assets/css/events-styles.min.css', dirname( __FILE__ ) ) );

		$current_theme = wp_get_theme();
		$themes_fau    = array(
			__( 'FAU-Institutions', 'rrze-tos' ),
			'FAU-Natfak',
			'FAU-Philfak',
			'FAU-RWFak',
			'FAU-Techfak',
			'FAU-Medfak',
		);

		if ( in_array( $current_theme, $themes_fau, true ) ) {
			//error_log(print_r($current_theme, true));!
			wp_enqueue_style( 'tos_styles' );
		} elseif ( 'RRZE 2015' === $current_theme ) {
			wp_enqueue_style( 'tos_styles_rrze' );
		} else {
			wp_enqueue_style( 'tos_styles_events' );
		}
	}

	/**
	 * Enqueue admin styles & scripts.
	 * Only load scripts if load user is in plugin site.
	 *
	 * @param string $hook Current name file.
	 */
	function rrze_tos_admin_scripts( $hook ) {
		// load script only in current plugin.
		if ( 'settings_page_rrze_tos' !== $hook ) {
			return;
		}
		wp_enqueue_style( 'admin-styles', plugins_url( 'rrze-tos/assets/css/admin.min.css', dirname( __FILE__ ) ) );
		wp_enqueue_style( 'parsley-validator-styles', plugins_url( 'rrze-tos/assets/css/parsley.min.css', dirname( __FILE__ ) ) );

		wp_enqueue_script( 'parsley-validator',
			plugins_url( 'rrze-tos/assets/js/parsley.min.js', dirname( __FILE__ ) ),
			array( 'jquery' ),
			'2.8.1',
			true
		);
		wp_enqueue_script( 'parsley-i18n',
			plugins_url( 'rrze-tos/assets/js/i18n/de.js', dirname( __FILE__ ) ),
			array( 'parsley-validator' ),
			'2.8.1',
			true
		);
		wp_enqueue_script( 'tos-admin-script',
			plugins_url( 'rrze-tos/assets/js/tos-admin-script.js', dirname( __FILE__ ) ),
			array( 'jquery', 'jquery-ui-tabs', 'jquery-effects-fade', 'parsley-validator' ),
			'1.0',
			true
		);
		$title_nonce = wp_create_nonce( 'rrze_tos_nonce' );
		wp_localize_script( 'tos-admin-script', 'tos_ajax_obj', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => $title_nonce,
		) );

	}

	/**
	 * Automatische Laden von Klassen.
	 *
	 * @return void
	 */
	function autoload() {
		include __DIR__ . '/includes/autoload.php';
		$main = new Main();
		$main->init( plugin_basename( __FILE__ ) );
	}
}