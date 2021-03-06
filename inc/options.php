<?php
/* * Plugin Name: Options Page 
* Plugin URI: https://phoenix.sheridanc.on.ca/~ccit2705/
* Description: Showing various customizations that are avaliable to the user. 
* Author: Royal Kings 
* Version: 1.0 
* Author URI: https://phoenix.sheridanc.on.ca/~ccit2705/ 
*/
function rk_submenu() { /* Create a new submenu in the wordpress dashboard */
	add_submenu_page( 'options-general.php', 'Submenu', 'Submenu', 'manage_options', 'my-sub-menu', 'cd_display_submenu_options');
	}
	add_action( 'admin_menu', 'rk_submenu' );

function rk_admin_menu(){ /* Add a new submenu in the wordpress dashboard and give it a name of "My Options Page */
	add_menu_page( 'My Options Page', 'My Options Page', 'manage_options', 'my_options_page', 'my_theme_options_page', 'dashicons-hammer', 66 );
	}
	add_action( 'admin_menu', 'rk_admin_menu' );
	
function rk_setting(){ /* Registers the submenu in the wordpress dashboard */
	register_setting('theme_options', 'options_settings');
	add_settings_section( 'options_page',
	 __( 'Your section description', 
	 'royal-kings' ), 
	 'options_page_callback', 
	 'theme_options');
	function options_page_callback() { /* Adds the below items in the options page form */
		echo __( 'A description and detail about the section.','royal-kings' );
		}
	add_settings_field( 'rk_text', __('Enter the title for your options page: ', 'royal-kings'), 'rk_text_render', 'theme_options', 'options_page');/* Registers a text box in the form of the Options Page */
	add_settings_field( 'rk_checkbox', __( 'Check your preference', 'royal-kings' ), 'rk_checkbox_render', 'theme_options', 'options_page');/* Registers a checkbox in the form of the Options Page */
	add_settings_field( 'rk_textarea', __( 'Enter sponsors that you might have:', 'royal-kings' ), 'rk_textarea_render', 'theme_options', 'options_page');/* Registers a text area in the form of the Options Page */
	function rk_text_render() {/* Create a text box in the form of the Options Page */
		$options=get_option( 'options_settings' );
		?>
		<input type="text" name="options_settings[rk_text]" value="<?php if (isset($options['rk_text'])) 
		echo $options['rk_text']; ?>">
		<?php
	}
	function rk_checkbox_render() { /* Create a checkbox in the form of the Options Page */
		$options=get_option( 'options_settings' );
		?>
		<input type="checkbox"name="options_settings[rk_checkbox]"
		<?php if (isset($options['rk_checkbox'])) checked( $options['rk_checkbox'], 1); ?>value="1">
		<?php
	}
	function rk_textarea_render() { /* Create a text area in the form of the Options Page */
		$options=get_option( 'options_settings' );
		?>
		<textarea cols="40"rows="5"name="options_settings[rk_textarea]">
		<?php if (isset($options['rk_textarea'])) echo$options['rk_textarea']; ?></textarea>
		<?php
		}
}
function my_theme_options_page(){ /* Create the form in the Options Page so the user can input their own customizations to the page */
?>
	<form action="options.php"method="post"><h2>Options Page</h2>
	<?php
	settings_fields( 'theme_options' );do_settings_sections( 'theme_options' );submit_button();
	?>
	</form>
	<?php
}

add_action( 'admin_init', 'rk_setting' );

?>
