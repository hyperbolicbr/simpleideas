<?php
add_action( 'admin_menu', 'si_theme_menu' );

function si_theme_menu() {
	add_submenu_page('themes.php', 'Opções do tema', 'Opções do tema', 'manage_options', 'theme-options', 'si_theme_options');
}

function si_theme_options() {
	if ( !current_user_can( 'administrator' ) )  {
		wp_die( __( 'Você não tem permições suficientes para acessar essa página.' ) );
	}
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Opções Salvas', 'theme' ); ?></strong></p></div>
	<?php endif; ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Opções do tema</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'si_options' ); do_settings_sections( 'si_options' );?>
				<br class="clear">
					<?php 
					$fields[] = array( 'field' => 'facebook', 'name' => 'Facebook', 'type' => 'text');
					$fields[] = array( 'field' => 'twitter', 'name' => 'Twitter', 'type' => 'text');
					$fields[] = array( 'field' => 'inkedin', 'name' => 'LinkedIn', 'type' => 'text');
					$fields[] = array( 'field' => 'instagram', 'name' => 'Instagram', 'type' => 'text');
					
					foreach($fields as $field) {
						echo '<div class="'.$field['field'].'" style="width: 100%; float: left; '.($field['type'] == 'text' ? 'height: 32px;': 'height: auto !important;').'">';
						echo '<span style="width: 200px; float: left;">'.$field['name'].'</span>';
						if($field['type'] == 'text') {
							echo '<input type="text" id="si_'.$field['field'].'" name="si_'.$field['field'].'" value="'.get_option('si_'.$field['field']).'" size="30">';
						}
						echo '</div>';
					}
					?>
			<?php submit_button(); ?>
		</form>
	</div>
<?php }

add_action( 'admin_init', 'si_register_fields' );

function si_register_fields() { // whitelist options
  register_setting( 'si_options', 'si_facebook' );
  register_setting( 'si_options', 'si_twiiter' );
  register_setting( 'si_options', 'si_instagram' );
  register_setting( 'si_options', 'si_linkedin' );
}