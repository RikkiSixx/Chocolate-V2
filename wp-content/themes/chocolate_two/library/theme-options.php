<?php

/* REGISTRATION
--------------------------------------------------------------------------------*/

function theme_options_init() {
	if ( false === get_theme_options_array() )
		add_option( THEME_SLUG . '_theme_options', get_theme_options_default() );
	register_setting( THEME_SLUG . '_theme_options', THEME_SLUG . '_theme_options', 'theme_options_validate' );
}
add_action( 'admin_init', 'theme_options_init' );

function theme_options_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_twentyeleven_options', 'theme_options_capability' );

function theme_options_add_page() {
	$options_page = add_theme_page( __( 'Theme Options', THEME_SLUG ), __( 'Theme Options', THEME_SLUG ), 'edit_theme_options', 'theme_options', 'theme_options_render_page' );	
	if ( ! $options_page )
		return;	
	$help = '';	
	add_contextual_help( $options_page, $help );
	add_action( 'admin_print_styles-' . $options_page, 'theme_options_enqueue_scripts' );
}
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_enqueue_scripts() {
	//wp_enqueue_style( 'theme-options', get_template_directory_uri() . '/admin/theme-options.css', false );
	//wp_enqueue_script( 'theme-options', get_template_directory_uri() . '/admin/theme-options.js', false );
}



/* HELPERS
--------------------------------------------------------------------------------*/

function get_theme_options_array() {
	return get_option( THEME_SLUG . '_theme_options', get_theme_options_default() );
}

function get_theme_options_value( $key ) {
	$theme_options = get_option( THEME_SLUG . '_theme_options' );
	if ( $theme_options[$key] !== false ) {
		return $theme_options[$key];
	} else {
		return false;
	}
}

function get_theme_options_default() {
	$default_options = array(
		'seo_meta_desc' => '',
		'social_twitter' => '',
		'social_linkedin' => '',
		'phone_number' => '',
		'contact_email' => ''
	);
	return $default_options;
}

function theme_options_validate( $input ) {
	$valid_options = get_theme_options_array();
	$default_options = get_theme_options_default();
	$valid_options['seo_meta_desc'] = wp_filter_nohtml_kses( $input['seo_meta_desc'] );	
	$valid_options['social_twitter'] = wp_filter_nohtml_kses( $input['social_twitter'] );	
	$valid_options['social_linkedin'] = wp_filter_nohtml_kses( $input['social_linkedin'] );
	$valid_options['phone_number'] = wp_filter_nohtml_kses( $input['phone_number'] );
	$valid_options['contact_email'] = wp_filter_nohtml_kses( $input['contact_email'] );
	return $valid_options;
}

/* RENDERING
--------------------------------------------------------------------------------*/

function theme_options_render_page() {
	?>
	<div class="wrap">
	
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', THEME_SLUG ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php 
			settings_fields( THEME_SLUG . '_theme_options' );
			$options = get_theme_options_array();
			$default_options = get_theme_options_default();
			?>



			<h3><?php _e( 'SEO', THEME_SLUG ); ?></h3>
			<table class="form-table">							
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[seo_meta_desc]"><?php _e( 'Meta Description', THEME_SLUG ); ?></label></th>
					<td>
						<textarea id="<?php echo THEME_SLUG; ?>_theme_options[seo_meta_desc]" class="regular-text" cols="40" rows="5" name="<?php echo THEME_SLUG; ?>_theme_options[seo_meta_desc]" value="<?php esc_attr_e( $options['seo_meta_desc'] ); ?>"></textarea>
					</td>
				</tr>				
			
			</table>


			
			<h3><?php _e( 'Social Media', THEME_SLUG ); ?></h3>
			<table class="form-table">							
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[social_twitter]"><?php _e( 'Twitter URL', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[social_twitter]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[social_twitter]" value="<?php esc_attr_e( $options['social_twitter'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[social_linkedin]"><?php _e( 'LinkedIn URL', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[social_linkedin]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[social_linkedin]" value="<?php esc_attr_e( $options['social_linkedin'] ); ?>" />
					</td>
				</tr>
	
			</table>


			
			<h3><?php _e( 'Contact Information', THEME_SLUG ); ?></h3>
			<table class="form-table">			
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[phone_number]"><?php _e( 'Phone Number', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[phone_number]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[phone_number]" value="<?php esc_attr_e( $options['phone_number'] ); ?>" />
						<br/><small><?php _e( 'This phone number will be displayed in the CTA in the header, and in the footer.', THEME_SLUG ); ?></small>
					</td>
				</tr>                                                                
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[contact_email]"><?php _e( 'Contact Email Address', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[contact_email]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[contact_email]" value="<?php esc_attr_e( $options['contact_email'] ); ?>" />
						<br/><small><?php _e( 'This email address will be shown in the footer.', THEME_SLUG ); ?></small>
					</td>
				</tr>			
				
			</table>

			<?php submit_button(); ?>
			
		</form>
	</div>
	<?php
}