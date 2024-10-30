<?php

/**
 * Change a task status
 */
//Load Wordpress API
if ( !defined( 'WP_PLUGIN_URL' ) ) {
	require_once( realpath( '../../../' ) . '/wp-config.php' );
}

require_once 'util.php';

/**
 * @todo Cambiar capability por una propia de Kanpress
 */
if ( kanpress_current_user_can( 'task_move' ) ) {
	if ( isset( $_POST[ 'task_id' ] ) ) {
		/* @todo use TABLE_TASK constant */
		die( $wpdb->update( $wpdb->prefix . 'kanpress_task', 
				array( 'status' => $_POST[ 'status' ] ), 
				array( 'task_id' => $_POST[ 'task_id' ] ) ) );
	}
} else {
	header( 'HTTP/1.0 403 Forbidden' );
	die( 'Permission denied' );
}
