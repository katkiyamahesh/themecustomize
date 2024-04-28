<?php
class Elementor_Navmenu_Widget extends \Elementor\Widget_Base {

	protected $nav_menu_index = 1;

	public function get_name() {
		return 'nav menus';

	}

	public function get_title() {
		return esc_html__( 'nav menu demo', 'elementor-site-widget' );

	}

	public function get_icon() {
		return 'eicon-nav-menu';

	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';

	}

	public function get_categories() {
		return [ 'general' ];

	}

	public function get_keywords() {
		return [ 'nav', 'menu' ];

	}
    
	
	protected function get_nav_menu_index() {
		return $this->nav_menu_index++;
	}

	private function get_available_menus() {

		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	public function get_style_depends() {
		wp_enqueue_style('widget',get_template_directory_uri().'/classes/elementor-widget/widgets.css');
  
        return ['widget-css'];
	}   
	public function get_script_depends() {
		wp_enqueue_script('widget-js',get_template_directory_uri().'/classes/elementor-widget/widgetjs.js');
		return['widget-js'];
	}


	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]

		);
		$menus = $this->get_available_menus();

		$this->add_control(
			'menu',
			[
				'label' => esc_html__( 'Menu', 'elementor-navmenu-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default'      => array_keys( $menus )[0],
				'save_default' => true,
				'options' => $menus,
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'Layout',
			[
				'label' => esc_html__( 'layout', 'elementor-navmenu-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default'      => 'horizontal',
				'save_default' => true,
				'options' => [
					'' => esc_html__( 'default', 'elementor-navmenu-widget' ),
					'horizontal' => esc_html__( 'Horizontal', 'elementor-navmenu-widget' ),
					'vertical'  => esc_html__( 'Vertical', 'elementor-navmenu-widget' ),
				],
			]
		);


		$this->add_control(
			'Alignment',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
					// 'justify' => [
					// 	'title' => esc_html__( 'justify', 'textdomain' ),
					// 	'icon' => 'eicon-text-align-justify',
					// ],
				],
				'default' => 'left',
				'save_default' => true,
				'toggle' => true,
				'condition'    => [
						'Layout' => [ 'horizontal', 'vertical' ],
					],

				// 'prefix_class' => 'hfe-nav-menu__align-',

				// 'selectors' => [
				// 	'{{WRAPPER}} .your-class' => 'text-align: {{VALUE}};',
				// ],
			]
		);

		$this->add_control(
			'submenu_icon',
			[
				'label'        => __( 'Submenu Icon', 'textdomain' ),
				'type'         =>  \Elementor\Controls_Manager::SELECT,
				'default'      => 'arrow',
				'options'      => [
					'arrow'   => __( 'Arrows', 'textdomain' ),
					'plus'    => __( 'Plus Sign', 'textdomain' ),
					'classic' => __( 'Classic', 'textdomain' ),
				],
					// 'prefix_class' => 'hfe-submenu-icon-',
				]
			);

	
		$this->add_control(
				'heading_responsive',
				[
					'label'     =>esc_html__( 'Responsive', 'textdomain' ),					
					'type'      => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);


		$this->add_control(
			'dropdown',
			[
				'label'        => __( 'Breakpoint', 'textdomain' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'tablet',
				'options'      => [
					'mobile' => __( 'Mobile (768px >)', 'textdomain' ),
					'tablet' => __( 'Tablet (1025px >)', 'textdomain' ),
					'none'   => __( 'None', 'textdomain' ),
				],
				'prefix_class' => 'hfe-nav-menu__breakpoint-',
				'condition'    => [
					'Layout' => [ 'horizontal', 'vertical' ],
				],
				'render_type'  => 'template',
			]
		);


		$this->add_control(
			'menu_align',
			[
				'label'        => __( 'Alignment', 'textdomain' ),
				'type'         => \Elementor\Controls_Manager::CHOOSE,
				'default'      => 'Center',
				'options'      => [
					'left'   => [
						'title' => __( 'Left', 'textdomain' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'textdomain' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'textdomain' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'hfe-nav-menu__breakpoint-',
				'condition'    => [
					'Layout' => [ 'horizontal', 'vertical' ],
				],
				'render_type'  => 'template',
			]
		);

		// if ( $this->is_elementor_updated11() ) {
			$this->add_control(
				'dropdown_icon',
				[
					'label'       => __( 'Menu Icon', 'textdomain' ),
					'type'        => \Elementor\Controls_Manager::ICONS,
					'label_block' => 'true',
					'default'     => [
						'value'   => 'fas fa-align-justify',
						'library' => 'fa-solid',
					],
					'condition'   => [
						'dropdown!' => 'none',
					],
				]
			);
	

		// if ( $this->is_elementor_updated() ) {
			$this->add_control(
				'dropdown_close_icon',
				[
					'label'       => __( 'Close Icon', 'textdomain' ),
					'type'        => \Elementor\Controls_Manager::ICONS,
					'label_block' => 'true',
					'default'     => [
						'value'   => 'far fa-window-close',
						'library' => 'fa-regular',
					],
					'condition'   => [
						'dropdown!' => 'none',
					],
				]
			);
	


	    $this->end_controls_section();

	    // style tab 
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Main Menu', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'global' => [
					'default' =>  \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} .menu-item',
			]
		);

		$this->start_controls_tabs( 'tabs_menu_text_color' );

		$this->start_controls_tab(
				'tab_menu_item_normal',
				[
					'label' => __( 'Normal', 'textdomain' ),
				]
			);
		$this->add_control(
				'color_menu_item',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'global'    => [
						'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu .menu-item a, {{WRAPPER}} .menu-item-has-children .sub-menu a' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu li.menu-item a' => 'background-color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_tab();

		$this->start_controls_tab(
					'tab_menu_item_hover',
					[
						'label' => __( 'Hover', 'textdomain' ),
					]
				);
		$this->add_control(
				'color_menu_item_hv',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu .menu-item a:hover, {{WRAPPER}} .menu-item-has-children .sub-menu a:hover' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item_hv',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu li.menu-item a:hover' => 'background-color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_tab();

		$this->start_controls_tab(
					'tab_menu_item_active',
					[
						'label' => __( 'Active', 'textdomain' ),
					]
				);
		$this->add_control(
				'color_menu_item_av',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu .menu-item a:active, {{WRAPPER}} .menu-item-has-children .sub-menu a:active' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item_av',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav .hfe-nav-menu li.menu-item a:active' => 'background-color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_tab();

	    $this->end_controls_tabs();

	    


		$this->add_responsive_control(
			'padding_horizontal_menu_item',
			[
				'label' => esc_html__( 'Horizontal Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} nav .hfe-nav-menu li' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_vertical_menu_item',
			[
				'label' => esc_html__( 'Vertical Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} nav .hfe-nav-menu li' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		//  $this->add_group_control(
        //     \Elementor\Group_Control_Background::get_type(),
        //     [
        //         'name' => 'backgroundtest',
        //         'label' => esc_html__( 'Background11', 'elementskit-lite' ),
        //         'types' => [ 'classic', 'gradient' ],
        //         // 'condition' => [
        //         //     'ekit_accordion_style!' => ['curve-shape']
        //         // ],
        //         'selector' => '{{WRAPPER}} .hfe-nav-menu',
        //     ]
        // );


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_dropdown',
			[
				'label' => esc_html__( 'Dropdown', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_menu_text_color_drop' );

		$this->start_controls_tab(
				'tab_menu_item_normal_drop',
				[
					'label' => __( 'Normal', 'textdomain' ),
				]
			);
		$this->add_control(
				'color_menu_item_drop',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'global'    => [
						'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown .hfe-nav-menu .menu-item a, {{WRAPPER}}  nav.hfe-dropdown  .menu-item-has-children .sub-menu a' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item_drop',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown  .hfe-nav-menu li.menu-item a' => 'background-color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_tab();

		$this->start_controls_tab(
					'tab_menu_item_hover_drop',
					[
						'label' => __( 'Hover', 'textdomain' ),
					]
				);
		$this->add_control(
				'color_menu_item_hv_drop',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown .hfe-nav-menu .menu-item a:hover, {{WRAPPER}} nav.hfe-dropdown  .menu-item-has-children .sub-menu a:hover' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item_hv_drop',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown  .hfe-nav-menu li.menu-item a:hover' => 'background-color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_tab();

		$this->start_controls_tab(
					'tab_menu_item_active_drop',
					[
						'label' => __( 'Active', 'textdomain' ),
					]
				);
		$this->add_control(
				'color_menu_item_av_drop',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown  .hfe-nav-menu .menu-item a:active, {{WRAPPER}} nav.hfe-dropdown .menu-item-has-children .sub-menu a:active' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'bg_color_menu_item_av_drop',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} nav.hfe-dropdown .hfe-nav-menu li.menu-item a:active' => 'background-color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_tab();

	    $this->end_controls_tabs();

	    $this->add_control(
				'heading_divider',
				[
					'label'     =>esc_html__( 'Divider', 'textdomain' ),					
					'type'      => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
	    $this->add_control(
			'border_style',
			[
				'label' => esc_html__( 'Border Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'none' => esc_html__( 'None', 'textdomain' ),
					'solid'  => esc_html__( 'Solid', 'textdomain' ),
					'dashed' => esc_html__( 'Dashed', 'textdomain' ),
					'dotted' => esc_html__( 'Dotted', 'textdomain' ),
					'double' => esc_html__( 'Double', 'textdomain' ),
				],
				'selectors' => [
					'{{WRAPPER}} .hfe-dropdown .hfe-nav-menu li.menu-item' => 'border-bottom-style: {{VALUE}};',
				],
			]
		);
		$this->add_control(
				'border_color',
				[
					'label'     => __( 'Border Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .hfe-dropdown .hfe-nav-menu li.menu-item' => 'border-color: {{VALUE}}',
					],
					'condition' => [
						'border_style!' => 'none',
					],
				]
			);

		$this->add_control(
			'boder-width',
			[
				'label' => esc_html__( 'Border width', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				// 'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .hfe-dropdown .hfe-nav-menu li.menu-item' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
						'border_style!' => 'none',
				],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'menu_icon_close_icon',
			[
				'label' => esc_html__( 'Menu Icon & Close Icon', 'elementor-navmenu-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->start_controls_tabs('menu_and_close_icon');
        $this->start_controls_tab(
        'menu_and_close_nm',
				[
					'label' => __( 'Normal', 'textdomain' ),
				]
			);

        $this->add_control(
				'menu_and_close_nm_color',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon i' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'menu_and_close_nm_bg',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon ' => 'background-color: {{VALUE}}',
					],
				]
			);

        $this->end_controls_tab();

        $this->start_controls_tab(
        'menu_and_close_hv',
				[
					'label' => __( 'Hover', 'textdomain' ),
				]
			);
        $this->add_control(
				'menu_and_close_hv_color',
				[
					'label'     => __( 'Text Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					// 'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon i:hover' => 'color: {{VALUE}}',
					],
				]
			);
		$this->add_control(
				'menu_and_close_hv_bg',
				[
					'label'     => __( 'Background Color', 'textdomain' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					// 'global'    => [
					// 	'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
					// ],
					'default'   => '',
					'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon:hover' => 'background-color: {{VALUE}}',
					],
				]
			);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
        	'icon_size',
        	[
        		'label'=>esc_html__('Icon size','textdomain'),
        		'type' => \Elementor\Controls_Manager::SLIDER,
        		'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default'=>[
				
					'size' => 15,
				],
				'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
					],
        	]
        );

        $this->add_responsive_control(
        	'border_width',
        	[
        		'label'=>esc_html__('Border width','textdomain'),
        		'type' => \Elementor\Controls_Manager::SLIDER,
        		'range' => [
					'px' => [
						'max' => 10,
					],
				],
				'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon ' => 'border: {{SIZE}}{{UNIT}} solid black',
				],
        	]
        );
        $this->add_responsive_control(
        	'border_redius',
        	[
        		'label'=>esc_html__('Border Redius','textdomain'),
        		'type' => \Elementor\Controls_Manager::SLIDER,
        		'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
						'{{WRAPPER}} .hfe-nav-menu-icon ' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
        	]
        );
        
		
        
		$this->end_controls_section();


	    // $this->end_controls_tabs();

	}
/**
	 * Get the menu and close icon HTML.
	 *
	 * @since 1.5.2
	 * @param array $settings Widget settings array.
	 * @access public
	 */
	public function get_menu_close_icon( $settings ) {
		$menu_icon     = '';
		$close_icon    = '';
		$icons         = [];
		$icon_settings = [
			$settings['dropdown_icon'],
			$settings['dropdown_close_icon'],
		];
		foreach ( $icon_settings as $icon ) {
			// if ( $this->is_elementor_updated() ) {
				ob_start();
				\Elementor\Icons_Manager::render_icon(
					$icon,
					[
						'aria-hidden' => 'true',
						'tabindex'    => '0',
					]
				);
				$menu_icon = ob_get_clean();
			// } else {
				// echo $menu_icon = '<i class="' . esc_attr( $icon ) . '" aria-hidden="true" tabindex="0"></i>';

			// }

			array_push( $icons, $menu_icon );
		}

		return $icons;
	}
	protected function render() {

		$menus = $this->get_available_menus();

		$settings = $this->get_settings_for_display();
		// print_r($settings['menu_align']);
		$menu_close_icons = [];
		$menu_close_icons = $this->get_menu_close_icon( $settings );
         // print_r($menu_close_icons);
		$args = [
			'echo'        => false,
			'menu'        => $settings['menu'],
			'menu_class'  => 'hfe-nav-menu',
			'menu_id'     => 'menu-' . $this->get_nav_menu_index() . '-' . $this->get_id(),
			'fallback_cb' => '__return_empty_string',
			'container'   => '',
			// 'walker'      => new Menu_Walker,
		];
		$menu_html = wp_nav_menu( $args );
		// print_r($menu_html);	

		// $this->add_render_attribute('wrapper', 'class', 'hfe-nav-menu-layout');
		// $this->add_render_attribute('wrapper', 'class',$settings['Layout'] );
		$this->add_render_attribute(
			'wrapper',
			'class',
			[
				'hfe-nav-menu__layout-'.$settings['Layout'],
			]
		);
		$this->add_render_attribute(
			'wrapper',
			'class',
			[
				'hfe-nav-menu__align-'.$settings['Alignment'],
			]
		);
		$this->add_render_attribute(
			'wrapper',
			'class',
			[
				'hfe-submenu-icon-'.$settings['submenu_icon'],
			]
		);	
		$this->add_render_attribute('dropdownicon','class',['hfe-nav-menu__breakpoint-'.$settings['dropdown'],]);

		$this->add_render_attribute( 'wrapper', 'data-toggle-icon', $menu_close_icons[0] );

	    $this->add_render_attribute( 'wrapper', 'data-close-icon', $menu_close_icons[1] );
		?>

		<div class="hfe-nav-menu__toggle elementor-clickable hfe-nav-menu__breakpoint-<?php echo $settings['dropdown']; ?>" >
			<div class="hfe-nav-menu-icon hfe-nav-menu__align-<?php echo $settings['menu_align']; ?>">
				<?php echo isset( $menu_close_icons[0] ) ? $menu_close_icons[0] : ''; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>

		<nav <?php echo $this->get_render_attribute_string( 'wrapper' ) ; ?>><?php echo $menu_html; ?></nav>
		<?php

	}

	protected function content_template() {

	}

}

?>