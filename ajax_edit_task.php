<?php

/**
 * Edit task data via AJAX
 */

//Load Wordpress API
if ( !defined( 'WP_PLUGIN_URL' ) ) {
	require_once( realpath( '../../../' ) . '/wp-config.php' );
}

require_once 'util.php';

/**
 * @todo Cambiar capability por una propia de Kanpress
 */
if ( kanpress_current_user_can( 'task_edit' ) ) {
	if ( isset( $_POST[ 'taskId' ] ) ) {

		$wpdb->update( $wpdb->prefix . 'kanpress_task', array(
					'description' => $_POST[ 'description' ],
					'term_id' => intval( $_POST[ 'category' ] ),
					'priority' => intval( $_POST[ 'priority' ] ) ), 
				array( 'task_id' => $_POST[ 'taskId' ] ) );
	}
} else {
	header( 'HTTP/1.0 403 Forbidden' );
	die( 'Permission denied' );
}