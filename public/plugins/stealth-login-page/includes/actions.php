<?php
/**
 * Front-End Actions
 *
 * @package     SLP
 * @subpackage  Functions
 * @copyright   Copyright (c) 2013, Jesse Petersen
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_init', 'slp_register_settings'); // create settings in database
function slp_register_settings() {
	register_setting('slp_settings_group', 'slp_settings');
}

add_action( 'login_init', 'which_settings', 1);
function which_settings() {
    global $slp_auth_key, $slp_redirect, $slp_question, $slp_answer;

    if ( isset( $slp_auth_key ) ) {
    	require_once SLP_PLUGIN_DIR . 'includes/functions-auth-key.php'; // loads the new 4.0.0 auth key functions
    }
    elseif ( isset( $slp_question ) && isset( $slp_answer ) && isset( $slp_redirect ) ) {
    	require_once SLP_PLUGIN_DIR . 'includes/functions-oldfile.php'; // loads the wp-config.php functions
    }
    else {
     require_once SLP_PLUGIN_DIR . 'includes/functions-oldsql.php'; // loads the settings page functions
    }
}