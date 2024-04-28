<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_oEmbed_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'oembed';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'oEmbed', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}
   


    public function get_script_depends() {
		return [ 'script-handle' ];
	}

	public function get_style_depends() {
		return [ 'style-handle' ];
	}
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'oembed', 'url', 'link' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
		'open_lightbox',
		[
			'type' => \Elementor\Controls_Manager::SELECT,
			'label' => esc_html__( 'Lightbox', 'elementor-oembed-widget' ),
			'options' => [
				'default' => esc_html__( 'Default', 'elementor-oembed-widget' ),
				'yes' => esc_html__( 'Yes', 'elementor-oembed-widget' ),
				'no' => esc_html__( 'No', 'elementor-oembed-widget' ),
			],
			'default' => 'no',
		]
		);

		$this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'elementor-oembed-widget' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-oembed-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-oembed-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-oembed-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_control(
			'OnlyText',[
				'type'=>\Elementor\Controls_Manager::TEXT,
				'label'=>esc_html__('only text','elementor-oembed-widget'),
				'input_type'=>'text',
				'placeholder'=>esc_html__('enter text','elementor-oembed-widget'),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'List Item', 'textdomain' ),
						'default' => esc_html__( 'List Item', 'textdomain' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
					[
						'text' => esc_html__( 'List Item #2', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);


		$this->end_controls_section();

        // style tab 
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3.oembed-elementor-widget' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} h3.oembed-elementor-widget ',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .your-class',
			]
		);
		// $this->add_group_control(
		// 	\Elementor\Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'border',
		// 		'selector' => '{{WRAPPER}} .your-class',
		// 	]
		// );
		// $this->add_group_control(
		// 	\Elementor\Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'background',
        //         'label' => esc_html__( 'Background', 'textdomain' ),

		// 		'types' => [ 'classic', 'gradient', 'video',],
		// 		'selector' => '{{WRAPPER}} .elementor-widget-oembed .elementor-widget-container',
		// 	],	
		// );
		//   $this->add_group_control(
        //     \Elementor\Group_Control_Background::get_type(),
        //     [
        //         'name' => 'backgroundtest',
        //         'label' => esc_html__( 'Background11', 'elementskit-lite' ),
        //         'types' => [ 'classic', 'gradient' ],
        //         // 'condition' => [
        //         //     'ekit_accordion_style!' => ['curve-shape']
        //         // ],
        //         'selector' => '{{WRAPPER}} .oembed-elementor-widget ul',
        //     ]
        // );



		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		// print_r($settings['url']);
		$html = wp_oembed_get( $settings['url'] );
		// echo $html;

		echo '<div class="oembed-elementor-widget">';
		echo ( $html ) ? $html : $settings['url'];
		echo '</div>';

	    $testtext=$this->get_settings_for_display();
	    $heading=$testtext['OnlyText'];
		echo '<h3 class="oembed-elementor-widget">';
        echo $heading;
	    echo '</h3>';

	    $testimg=$this->get_settings_for_display();
	    // print_r($testimg['image']);
        $showimg=$testimg['image'];
        // print_r($showimg);
        // Get image url
		// echo '<img src="' . esc_url( $showimg['url'] ) . '" alt="'.$showimg['alt'].'">';

		// Get image by id
		// echo wp_get_attachment_image( $showimg['id'], 'thumbnail' );

		$repeatlist=$this->get_settings_for_display();
		$repeatshow=$repeatlist['list'];
		// print_r($repeatshow);
		?>
		<ul>
		<?php foreach ( $repeatshow as $index => $item ) : 
			?>
			<li>
				<?php
				if ( ! $item['link']['url'] ) {
					echo $item['text'];
				} else {
					?><a href="<?php echo esc_url( $item['link']['url'] ); ?>"><?php echo $item['text']; ?></a><?php
				}
				?>
			</li>
		<?php endforeach; ?>
		</ul>
		
		<?php
	}


	protected function content_template() {
		
	}

}