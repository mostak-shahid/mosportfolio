<?php 
function mosportfolio_custom_metabox () {
	//add_meta_box( $id, $title, $callback, $screen = null, $context = 'advanced', $priority = 'default', $callback_args = null );

	add_meta_box( 
		'_mosportfolio_custom_metabox', 
		'mosportfolio Custom Metabox', 
		'mosportfolio_custom_metabox_html', 
		array('post','page'),
		'normal', //advanced, normal, side
		$priority = 'default' //high, core, low
		/*$callback_args = null */
	);
}
add_action( 'add_meta_boxes', 'mosportfolio_custom_metabox' );

function mosportfolio_custom_metabox_html ($post) { 
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'mosportfolio_save_custom_metabox', 'mosportfolio_custom_metabox_nonce' );
	//$basic_field = get_post_meta( $post->id, '_basic_field', true )
	$basic_field = (get_post_meta( $post->ID, '_basic_field', true )) ? get_post_meta( $post->ID, '_basic_field', true ) : '';
	?>
	
	<p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="basic_field">Basic Field</label></p>
	<input class="widefat" type="text" id="basic_field" name="_basic_field" placeholder="Basic Field" value="<?php echo $basic_field; ?>">

	<?php
}
function mosportfolio_custom_metabox_update ($post_ID) {

	if ( ! isset( $_POST['mosportfolio_custom_metabox_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['mosportfolio_custom_metabox_nonce'], 'mosportfolio_save_custom_metabox' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

 	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$basic_field = sanitize_text_field( $_POST['_basic_field'] );

	update_post_meta( $post_ID, '_basic_field', $basic_field );
}
add_action( 'save_post', 'mosportfolio_custom_metabox_update' );