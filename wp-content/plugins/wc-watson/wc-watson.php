<?php
/*
Plugin Name: WooCommerce Watson Integration
Plugin URI: http://www.webis.co.za
Description: IBM Watson Campaign Automation
Version: 0
Author: Johan Erasmus
Author URI: http://www.webis.co.za
*/

class Watson_Integration_Plugin {
	public function __construct() {
		// Hook into the admin menu
		add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
		// Add Settings and Fields
		add_action( 'admin_init', array( $this, 'setup_sections' ) );
		add_action( 'admin_init', array( $this, 'setup_fields' ) );
	}
	public function create_plugin_settings_page() {
		// Add the menu item and page
		$page_title = 'IBM Watson Campaign Automation Configuration';
		$menu_title = 'IBM Watson';
		$capability = 'manage_options';
		$slug = 'watson_integration';
		$callback = array( $this, 'plugin_settings_page_content' );
		$icon = 'dashicons-admin-plugins';
		$position = 100;
		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}
	public function plugin_settings_page_content() {?>
		<div class="wrap">
			<h2>IBM Watson Campaign Automation Integration</h2><?php
			if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
				$this->admin_notice();
			} ?>
			<form method="POST" action="options.php">
				<?php
				settings_fields( 'watson_integration' );
				do_settings_sections( 'watson_integration' );
				submit_button();
				?>
			</form>
		</div> <?php
	}

	public function admin_notice() { ?>
		<div class="notice notice-success is-dismissible">
			<p>Your settings have been updated!</p>
		</div><?php
	}
	public function setup_sections() {
		add_settings_section( 'our_first_section', '', array( $this, 'section_callback' ), 'watson_integration' );
		add_settings_section( 'our_second_section', '', array( $this, 'section_callback' ), 'watson_integration' );
		add_settings_section( 'our_third_section', '', array( $this, 'section_callback' ), 'watson_integration' );
	}
	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
			case 'our_first_section':
				echo '----';
				break;
			case 'our_second_section':
				echo '----';
				break;
			case 'our_third_section':
				echo '----';
				break;
		}
	}
	public function setup_fields() {
		$fields = array(
			array(
				'uid' => 'cid',
				'label' => 'Client ID:',
				'section' => 'our_first_section',
				'type' => 'text',

			),
			array(
				'uid' => 'secret',
				'label' => 'Client Secret:',
				'section' => 'our_first_section',
				'type' => 'text',

			),
			array(
				'uid' => 'token',
				'label' => 'Refresh Token:',
				'section' => 'our_first_section',
				'type' => 'text',

			),



			array(
				'uid' => 'pod',
				'label' => 'Engage Pod:',
				'section' => 'our_second_section',
				'type' => 'select',
				'options' => array(
					'option1' => 'Pod 1',
					'option2' => 'Pod 2',
					'option3' => 'Pod 3',
					'option4' => 'Pod 4',
					'option5' => 'Pod 5',
				),
				'default' => array()
			),
			array(
				'uid' => 'did',
				'label' => 'Master Database ID:',
				'section' => 'our_third_section',
				'type' => 'text',

			),
			array(
				'uid' => 'rid',
				'label' => 'Orders Relational Table ID:',
				'section' => 'our_third_section',
				'type' => 'text',

			),


		);
		foreach( $fields as $field ){
			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'watson_integration', $field['section'], $field );
			register_setting( 'watson_integration', $field['uid'] );
		}
	}
	public function field_callback( $arguments ) {
		$value = get_option( $arguments['uid'] );
		if( ! $value ) {
			$value = $arguments['default'];
		}
		switch( $arguments['type'] ){
			case 'text':
			case 'password':
			case 'number':
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
				break;
			case 'textarea':
				printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
				break;
			case 'select':
			case 'multiselect':
				if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
					$attributes = '';
					$options_markup = '';
					foreach( $arguments['options'] as $key => $label ){
						$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
					}
					if( $arguments['type'] === 'multiselect' ){
						$attributes = ' multiple="multiple" ';
					}
					printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
				}
				break;
			case 'radio':
			case 'checkbox':
				if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
					$options_markup = '';
					$iterator = 0;
					foreach( $arguments['options'] as $key => $label ){
						$iterator++;
						$options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
					}
					printf( '<fieldset>%s</fieldset>', $options_markup );
				}
				break;
		}
		if( $helper = $arguments['helper'] ){
			printf( '<span class="helper"> %s</span>', $helper );
		}
		if( $supplimental = $arguments['supplimental'] ){
			printf( '<p class="description">%s</p>', $supplimental );
		}
	}
}
new Watson_Integration_Plugin();