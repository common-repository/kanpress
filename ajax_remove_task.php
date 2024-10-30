<?php

/**
 * Remove a tasks
 */
//Load Wordpress API
if ( !defined( 'WP_PLUGIN_URL' ) ) {
	require_once( realpath( '../../../' ) . '/wp-config.php' );
}

require_once 'util.php';

/**
 * @todo Change capability
 */
if ( kanpress_current_user_can( 'task_remove' ) ) {
	if ( isset( $_POST[ 'task_id' ] ) ) {
		$wpdb->query( "DELETE FROM " . TABLE_TASK . " WHERE task_id = '" . intval( $_POST[ 'task_id' ] ) . "'" );
		/** @todo Instead of 1, return # of rows deleted */
		die( 1 );
	}
} else {
	die( 'Permission denied' );
}
