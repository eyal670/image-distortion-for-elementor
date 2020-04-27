<?php
/**
 * Plugin Name: Image distortion for elementor
 * Description: Basic Boilerplate for Custom widgets added to Elementor
 * Developer: Eyal Ron
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define('ER_idfe_PLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define( 'ER_idfe_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

// plug it in
add_action('plugins_loaded', 'ER_idfe_require_files');
function ER_idfe_require_files() {
    require_once ER_idfe_PLUGIN_PLUGIN_PATH.'modules.php';
}
