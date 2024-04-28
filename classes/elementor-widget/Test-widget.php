
<?php
class Elementor_Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Test';
	}

	public function get_title() {
		return esc_html__( 'Test', 'elementor-test-widget' );
	}

	public function get_icon() {
		return 'eicon-editor-code';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'test', 'demo' ];
	}
	 

	public function get_script_depends() {
		wp_enqueue_script('widget-js',get_template_directory_uri().'/classes/elementor-widget/widgetjs.js');
		return['widget-js'];
	}

	public function get_style_depends() {}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'item_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Spacing', 'textdomain' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .widget-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);	

		$this->add_control(
			'popover-toggle',
			[
				'label' => esc_html__( 'Box', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'textdomain' ),
				'label_on' => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
			]
		);
        
        $this->start_popover();

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => esc_html__( 'Default description', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);

        $this->end_popover();
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_dynamic',
			[
				'label' => esc_html__( 'Dynamic', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your heading', 'textdomain' ),
				// 'show_label' => false,
				'label_block' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your content', 'textdomain' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Important Note', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'A very important message to show in the panel.', 'textdomain' ),
				'content_classes' => 'your-class',
			]
		);


		$this->end_controls_section();
        
        //style tab
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		 $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'backgroundtest',
                'label' => esc_html__( 'Background', 'elementskit-lite' ),
                'types' => [ 'classic', 'gradient' ],
                // 'condition' => [
                //     'ekit_accordion_style!' => ['curve-shape']
                // ],
                'selector' => '{{WRAPPER}} .description',
            ]
        );

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'frontend_available' => false,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'custom_css_filters',
				'selector' => '{{WRAPPER}} .description',
			]
		);

		$this->add_control(
			'custom_box_shadow',
			[
				'label' => esc_html__( 'Box Shadow', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{item_description}}' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'delete_content',
			[
				'label' => esc_html__( 'Delete Content', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'button_type' => 'success',
				'text' => esc_html__( 'Delete', 'textdomain' ),
				'event' => 'MyClickEvent',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		// print_r($settings['heading']);
		?>
		<div class="description">
			<?php echo $settings['item_description']; ?>
		</div>
		<?php
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

		echo "<div class='dynamic-test'>";
		echo $settings['heading'];
		echo "</div>";

	}

	protected function content_template() {
		?>
		<!-- <span class="description">
			{{{ settings.item_description }}}
		</span> -->
		<?php
	}

}

