<?php
/**
Plugin Name: Fail2ban helper
Description: Pushes failed logins to webserver error log for Fail2Ban use
Version: 1.0
Author: zEvilz
Author URI: https://zevilz.dev
Plugin URI: https://github.com/zevilz/zevilz-f2b-helper
License: MIT
 */

add_action( 'wp_login_failed', function( $username ) {
	error_log( 'WP LOGIN FAILED for username: ' . $username );
} );
