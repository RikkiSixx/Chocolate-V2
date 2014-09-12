<?php

global $slug;
$slug = get_template();

global $meta_fields;
$meta_fields = array(
	'image-source' => array(
		'name' => 'image-source',
		'title' => 'Image Source',
		'description' => '',
		'object_type' => array( 'post', 'quest-level' )
	),
	'image-source-url' => array(
		'name' => 'image-source-url',
		'title' => 'Image Source URL',
		'description' => '',
		'object_type' => array( 'post', 'quest-level' )
	)
);

function theme_meta_box_init() {
	global $slug;

	if( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'image-source', 'Image Source', 'theme_display_meta_box', 'post', 'normal', 'high' );	
		add_meta_box( 'image-source', 'Image Source', 'theme_display_meta_box', 'quest-level', 'normal', 'high' );	
	}
}

function theme_display_meta_box() {
	global $post, $meta_fields, $slug;
	?>
	<div class="form-wrap">
		<?php
		wp_nonce_field( plugin_basename( __FILE__ ), $slug . '_wpnonce', false, true );
		foreach ( $meta_fields as $meta_field ) :
			if ( isset( $meta_field['object_type'] ) && is_array( $meta_field['object_type'] ) && in_array( get_post_type($post->ID), $meta_field['object_type'] ) ) :
				$data = get_post_meta($post->ID, $slug, true);
				?>
				<div class="form-field form-required">
					<label for="<?php echo $meta_field['name']; ?>"><?php echo $meta_field[ 'title' ]; ?></label>
					<input type="text" name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>" value="<?php echo (isset($data[$meta_field['name']]) ? htmlspecialchars( $data[ $meta_field['name'] ] ) : ''); ?>" />
					<p><?php echo $meta_field['description']; ?></p>
				</div>
				<?php
			endif;
		endforeach;
		?>
	</div>
	<?php
}

function theme_save_meta_box( $post_id ) {
	global $post, $meta_fields, $slug;

	foreach( $meta_fields as $meta_field ) {
		@$data[ $meta_field['name'] ] = $_POST[ $meta_field['name'] ];
	}

	if ( !isset($_POST[ $slug . '_wpnonce' ]) || !wp_verify_nonce( $_POST[ $slug . '_wpnonce' ], plugin_basename(__FILE__) ) )
		return $post_id;

	if ( !current_user_can( 'edit_post', $post_id ))
		return $post_id;

	update_post_meta( $post_id, $slug, $data );
}

function get_post_meta_value( $key ) {
	global $post;
	$data = get_post_meta( $post->ID, get_template(), true );
	if ( isset($data[$key]) && $data[$key] ) {
		return $data[$key];
	} else {
		return false;
	}
}

add_action( 'admin_menu', 'theme_meta_box_init' );
add_action( 'save_post', 'theme_save_meta_box' );

?>
