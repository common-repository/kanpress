<?php

/**
 * Single task template
 * @param array $task Task data
 * @param array $categories Array containing every category in the DB
 * 
 * @todo En vez de pasar las categorías como parámetro, buscar algo más elegante
 */
function kanpress_html_task( $task, $categories ) {

	$priorities = array( 0 => 'low', 1 => 'medium', 2 => 'high' );
	
	$estados_post = array( 
		'publish'		=> __( 'Published' ),
		'auto-draft'	=> __( 'Auto Draft' ), 
		'pending'		=> __( 'Pending' ), 
		'draft'			=> __( 'Draft' ),
		'future'		=> __( 'Scheduled' ),
	);

	$task_classes = '';
	$post_title = strlen( trim( $task[ 'post' ]->post_title ) ) > 0 ? $task[ 'post' ]->post_title : '(' . __( 'Untitled' ) . ')';
	if ( $task[ 'post' ]->post_status == 'publish' ) {
		$task_classes .= 'post-published ';
	}
	?>
	<div class="tarea <?php echo $task_classes ?>" id="tarea-<?php echo $task[ 'task_id' ] ?>">
		<div class="dentro">

			<a class="img asignar" href="javascript:void(0)">
				<?php if ( intval( $task[ 'assigned_to' ] ) > 0 ) : ?>
					<?php echo get_avatar( $task[ 'assigned_to' ], 50, null, $task[ 'user_assigned' ] ) ?>
				<?php else : ?>
					<?php _e( 'Not assigned', 'kanpress' ) ?>
				<?php endif ?>
			</a>

			<?php $prioridades = array( __( 'low', 'kanpress' ), __( 'normal', 'kanpress' ), __( 'high', 'kanpress' ) ) ?>
			<h4 class="<?php echo $priorities[ $task[ 'priority' ] ] ?>" title="<?php _e( 'Priority', 'kanpress' ) ?> <?php echo $prioridades[ $task[ 'priority' ] ] ?>">
				<a href="javascript:void(0)" class="enlace-detalles" data-id="<?php echo $task[ 'task_id' ] ?>"><?php echo $task[ 'summary' ] ?></a>
				<span>#<?php echo $task[ 'task_id' ] ?></span>
			</h4>

			<p>
				<span class="task-description-short" id="short-<?php echo $task[ 'task_id' ] ?>"><?php e( trim_text( $task[ 'description' ], 80 ) ) ?></span>

			<div id="detalles-<?php echo $task[ 'task_id' ] ?>" class="tarea-detalles">
				<p class="asignacion">
					<?php if ( empty( $task[ 'assigned_to' ] ) ) : ?>
						<?php _e( 'This task has not been assigned yet', 'kanpress' ) ?>.
					<?php else : ?>
						<?php echo get_avatar( $task[ 'assigned_to' ], 50, null, $task[ 'user_assigned' ] ) ?>
						<span class="light"><?php _e( 'Assigned to', 'kanpress' ) ?></span>
						<br />
						<?php echo $task[ 'user_assigned' ] ?>
					<?php endif ?>
				</p>

				<div class="overflow">
					<div class="task-category">
						<label for="category-<?php echo $task[ 'task_id' ] ?>"><?php _e( 'Category', 'kanpress' ) ?>:</label>
						<?php echo form_select( 'category-' . $task[ 'task_id' ], $categories, $task[ 'term_id' ], kanpress_current_user_can( 'task_edit' ) ? null : array('disabled'=>'disabled'), null ) ?>
					</div>
					<div class="task-priority">
						<label for="priority-<?php echo $task[ 'task_id' ] ?>"><?php _e( 'Priority', 'kanpress' ) ?>:</label>
						<?php echo form_select( 'priority-' . $task[ 'task_id' ], $prioridades, $task[ 'priority' ], kanpress_current_user_can( 'task_edit' ) ? null : array('disabled'=>'disabled'), null ) ?>
					</div>
				</div>

				<div class="task-description">
					<?php _e( 'Description', 'kanpress' ) ?>: <br />
					<textarea rows="4" cols="30" class="edit-description" <?php if ( !kanpress_current_user_can( 'task_link' ) ) : ?>disabled="disabled"<?php endif ?>><?php e( $task[ 'description' ] ) ?></textarea>
				</div>

				<ul class="task-history">
					<li>
						<?php _e( 'Created', 'kanpress' ) ?> 
						<span><?php echo strtolower( date_i18n( get_option( 'date_format' ), strtotime( $task[ 'time_proposed' ] ) ) ) ?></span>
						<?php _e( 'by', 'kanpress' ) ?> <span><?php echo $task[ 'user_proposed' ] ?></span>
					</li>
					<?php if ( intval( $task[ 'assigned_to' ] ) > 0 ) : ?>
						<li>
							<?php _e( 'Assigned', 'kanpress' ) ?>
							<span><?php echo strtolower( date_i18n( get_option( 'date_format' ), strtotime( $task[ 'time_assigned' ] ) ) ) ?></span>
							<?php _e( 'to', 'kanpress' ) ?> <span><?php echo $task[ 'user_assigned' ] ?></span>
						</li>
					<?php endif ?>
					<?php if ( intval( $task[ 'time_done' ] ) > 0 ) : ?>
						<li>
							<?php _e( 'Completed', 'kanpress' ) ?>
							<span><?php echo strtolower( date_i18n( get_option( 'date_format' ), strtotime( $task[ 'time_done' ] ) ) ) ?></span>
						</li>
					<?php endif ?>
				</ul>

				<div class="task-post">
					<?php /** @todo Poner "no hay artículo enlazado" si se da el caso */ ?>
					<?php if ( intval( $task[ 'post_id' ] ) > 0 ) : ?>
					
						<h5><?php _e( 'Respective article', 'kanpress' ) ?></h5>

						<span class="post-status <?php if ( $task[ 'post' ]->post_status == 'publish' ) echo 'bold' ?>">[<?php echo strtoupper( $estados_post[ $task[ 'post' ]->post_status ] ) ?>]</span>

						<a class="post-link" href="post.php?action=edit&post=<?php echo $task[ 'post' ]->ID ?>">
							<?php echo $post_title ?>
						</a>

						<span class="post-meta"> · <?php _e( 'Modified', 'kanpress' ) ?> <?php echo strtolower( date_i18n( get_option( 'date_format' ), strtotime( $task[ 'post' ]->post_modified ) ) ) ?></span>

					<?php else : ?>
						<?php if ( kanpress_current_user_can( 'task_link' ) ) : ?>
						<a href="javascript:void(0)" class="create-article" id="create-<?php echo $task[ 'task_id' ] ?>">
							<?php _e( 'Create corresponding article', 'kanpress' ) ?>
						</a>
						<?php endif ?>
					<?php endif ?>
				</div>

				<div class="task-actions">
					
					<button type="button" name="save" class="button-primary margen-arriba btn-guardar" id="guardar-<?php echo $task[ 'task_id' ] ?>" <?php if ( !kanpress_current_user_can( 'task_edit' ) ) : ?>disabled="disabled"<?php endif ?>><?php _e( 'Save', 'kanpress' ) ?></button>
					
					<?php if ( kanpress_current_user_can( 'task_remove' ) ) : ?>
						<?php _e( 'or', 'kanpress' ) ?> <a href="javascript:void(0)" class="remove-task-link" id="remove-<?php echo $task[ 'task_id' ] ?>"><?php _e( 'Remove task', 'kanpress' ) ?></a>
					<?php endif ?>
				</div>
			</div>
			</p>

			<?php if ( $task[ 'post' ]->post_status == 'publish' ) : ?>
				<p class="post-is-publish">
					<a href="<?php echo $task[ 'post' ]->guid ?>">
						<?php /** @todo Poner en un sólo mensaje i18n */ ?>
						<?php _e( 'Published', 'kanpress' ) ?> <?php echo strtolower( date_i18n( get_option( 'date_format' ), strtotime( $task[ 'post' ]->post_modified ) ) ) ?>
						<?php _e( 'by', 'kanpress' ) ?> <?php echo get_userdata( $task[ 'post' ]->post_author )->data->display_name ?>
					</a>
					
					<?php if ( kanpress_current_user_can( 'task_remove' ) ) : ?>
						<div class="centro"><a href="javascript:void(0)" class="remove-task-link" id="remove-<?php echo $task[ 'task_id' ] ?>"><?php _e( 'Remove task', 'kanpress' ) ?></a></div>
					<?php endif ?>
				</p>
			<?php endif ?>
		</div>

		<div class="pie">
			<div class="seccion">
				<?php echo htmlentities( $task[ 'name' ], null, 'UTF-8' ) ?>
			</div>
			<div class="meta">
				<span class="creation-time"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $task[ 'time_proposed' ] ) ) ?></span>
			</div>
		</div>
	</div>
<?php } ?>
