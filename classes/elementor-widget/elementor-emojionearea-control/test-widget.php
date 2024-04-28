<?php

class Elementor_emoji_Widget extends \Elementor\Widget_Base {

		public function get_name() {
	    	return 'test';
		}
		public function get_title() {
		    return esc_html__( 'Test', 'elementor-emojionearea-control' );
	    }
	    public function get_icon() {
		    return 'eicon-code';
	    }
	    public function get_custom_help_url() {
	      	return 'https://developers.elementor.com/docs/widgets/';
	    }
	    public function get_categories() {
		    return [ 'general' ];
	    }
	    public function get_keywords() {
		    return [ 'test', 'emoji' ];
     	}

     	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-emojionearea-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Content with Emoji', 'elementor-emojionearea-control' ),
				'type' => 'emojionearea',

			]
		);

		$this->end_controls_section();

	    }

	    protected function render() {
			$settings = $this->get_settings_for_display();
			echo $settings['content'];
	    }


} 

?>