<?php  
// require_once 'currency.php';
class Elementor_Currency_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'currency';
	}

	public function get_title() {
		return esc_html__( 'Currency', 'elementor-currency-control' );
	}

	public function get_icon() {
		return 'eicon-custom';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'currency', 'currencies' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-currency-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 100,
			]
		);

		$this->add_control(
			'price_currency',
			[
				'label' => esc_html__( 'Currency', 'elementor-currency-control' ),
				'type' => 'currency',
			]
		);

	    $this->end_controls_section();
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
		// print_r($settings['price_currencynemojionearea']);
			echo $settings['price_currency'].' '.$settings['price'];
    }

}

?>

