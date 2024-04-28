<?php  

class Ping_Action_After_Submit extends \ElementorPro\Modules\Forms\Classes\Action_Base {

	public function get_name() {
		return 'ping';
	}

	public function get_label() {
		return esc_html__( 'Ping', 'elementor-forms-ping-action' );
	}

	public function get_icon() {
		return 'eicon-editor-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'form','selected','action' ];
	}



	public function run( $record, $ajax_handler ) {

		wp_remote_post(
			'https://api.example.com/',
			[
				'method' => 'GET',
				'headers' => [
					'Content-Type' => 'application/json',
				],
				'body' => wp_json_encode([
					'site' => get_home_url(),
					'action' => 'Form submitted',
				]),
				'httpversion' => '1.0',
				'timeout' => 60,
			]
		);

	}
    

	public function register_settings_section( $widget ) {

		$widget->start_controls_section(
			'section_sendy',
			[
				'label' => esc_html__( 'Sendy', 'elementor-forms-sendy-action' ),
				// 'condition' => [
				// 	'submit_actions' => $this->get_name(),
				// ],
			]
		);

		$widget->add_control(
			'sendy_url',
			[
				'label' => esc_html__( 'Sendy URL', 'elementor-forms-sendy-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'https://your_sendy_installation/',
				'description' => esc_html__( 'Enter the URL where you have Sendy installed.', 'elementor-forms-sendy-action' ),
			]
		);
	}

	public function on_export( $element ) {

		unset(
			$element['section_sendy'],
			$element['sendy_url'],
			
		);
			return $element;
	}

}

?>