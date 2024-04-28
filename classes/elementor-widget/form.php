<?php

class Elementor_form_Widget extends \Elementor\Widget_Base{
	public function get_name() {
		return 'form';
	}

	public function get_title() {
		return esc_html__( 'Form', 'elementor-demo' );
	}

	public function get_icon() {
		return 'fab fa-wpforms';
	}

	public function get_keywords() {
		return [ 'form', 'forms', 'field', 'button',];
	}

	protected function register_controls() {
		// $repeater = new Elementor\Repeater();

		$field_types = [
			'text' => esc_html__( 'Text', 'elementor-pro' ),
			'email' => esc_html__( 'Email', 'elementor-pro' ),
			'textarea' => esc_html__( 'Textarea', 'elementor-pro' ),
			'url' => esc_html__( 'URL', 'elementor-pro' ),
			'tel' => esc_html__( 'Tel', 'elementor-pro' ),
			'radio' => esc_html__( 'Radio', 'elementor-pro' ),
			'select' => esc_html__( 'Select', 'elementor-pro' ),
			'checkbox' => esc_html__( 'Checkbox', 'elementor-pro' ),
			'acceptance' => esc_html__( 'Acceptance', 'elementor-pro' ),
			'number' => esc_html__( 'Number', 'elementor-pro' ),
			'date' => esc_html__( 'Date', 'elementor-pro' ),
			'time' => esc_html__( 'Time', 'elementor-pro' ),
			'upload' => esc_html__( 'File Upload', 'elementor-pro' ),
			'password' => esc_html__( 'Password', 'elementor-pro' ),
			'html' => esc_html__( 'HTML', 'elementor-pro' ),
			'hidden' => esc_html__( 'Hidden', 'elementor-pro' ),
		];

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Form field', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]

		);
		$this->add_control('form_name',[
			'label'=>esc_html__('Form name','elementor-demo'),
			'type'=>\Elementor\Controls_Manager::TEXT,
			'default'=>'',
		]);

        $this->start_controls_tabs( 'form_fields_tabs' );

        $this->start_controls_tab('form_fields_content_tab', [
			'label' => esc_html__( 'Content', 'elementor-demo' ),
		] );

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'from_list',
			[
				'label' => esc_html__( '', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
                // 'tabs'=>'form_fields_tabs',
                'fields' => [
                	// [    
                	// 	'name' => 'ggg',
                	// 	'label'=>esc_html__('content',''),
                	// 	'type'=>\Elementor\Controls_Manager::TAB_CONTENT,
                	// ],
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options'=> $field_types,
						// 'placeholder' => esc_html__( 'List Item', 'textdomain' ),
						'default' => 'text',
					],
					[
						'name' => 'Label',
						'label' => esc_html__( 'Label', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						// 'placeholder' => esc_html__( 'Name', 'textdomain' ),
						'default'=>esc_html__('Name','')
					],
					[
						'name' => 'placeholder',
						'label' => esc_html__( 'Placeholder', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default'=>esc_html__('Name','')

						// 'placeholder' => esc_html__( 'Name', 'textdomain' ),
					],
					[
						'name' => 'required',
						'label' => esc_html__( 'Required', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default'=>esc_html__('Name','')

						// 'placeholder' => esc_html__( 'Name', 'textdomain' ),
					],
				],
				'default'=>[
					[
						'text' => esc_html__( 'text', 'textdomain' ),
					    'Label'=>esc_html__('Name','textdomain'),
					    'placeholder'=>esc_html__('Name','textdomain')
					],
					[
						'text' => esc_html__( 'Email', 'textdomain' ),
					],	
				]
			]
		);

		$this->add_control(
			'field_type',
			[
				'label' => esc_html__( 'Type', 'elementor-pro' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $field_types,
				'default' => 'text',
			]
		);
        
		$this->end_controls_section();

		// $this->start_controls_tabs( 'form_fields_tabs' );

		// $this->start_controls_tab( 'form_fields_content_tab', [
		// 	'label' => esc_html__( 'Content', 'elementor-pro' ),
		// 	'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			
		// ] );
		// $this->end_controls_tab();


		// $this->end_controls_tabs();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		print_r($settings['from_list']['0']['text']);

		echo '<div>'
		.$settings['form_name'].
		'</div>';

		$input='';
		$input.='
		';
		echo $input;
	}

	protected function content_template() {

	}
}

?>