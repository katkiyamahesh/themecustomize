<?php
/**
 * Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize 1.0
 */
// require_once 'class-theme-customize-switch-control.php';

if ( ! class_exists( 'Theme_customize_One_Customize' ) ) {
	/**
	 * Customizer Settings.
	 *
	 * @since Theme Customize 1.0
	 */
	class Theme_customize_One_Customize {

		/**
		 * Constructor. Instantiate the object.
		 *
		 * @since Theme Customize 1.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'register' ) );
		}

		/**
		 * Register customizer options.
		 *
		 * @since Theme Customize 1.0
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public function register( $wp_customize ) {

			// Change site-title & description to postMessage.
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.

			// Add partial for blogname.
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title',
					'render_callback' => array( $this, 'partial_blogname' ),
				)
			);

			// Add partial for blogdescription.
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'partial_blogdescription' ),
				)
			);

		

			// Background color.
			// Include the custom control class.
			include_once get_theme_file_path( 'classes/class-theme-customize-one-customize-color-control.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			// Register the custom control.
			$wp_customize->register_control_type( 'Theme_customize_One_Customize_Color_Control' );

			// Get the palette from theme-supports.
			$palette = get_theme_support( 'editor-color-palette' );

			// Build the colors array from theme-support.
			$colors = array();
			if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
				foreach ( $palette[0] as $palette_color ) {
					$colors[] = $palette_color['color'];
				}
			}

			// Add the control. Overrides the default background-color control.
			include_once get_theme_file_path( '/inc/customizer/class-theme-customize-switch-control.php' );

			$wp_customize->add_control(
				new Theme_customize_One_Customize_Color_Control(
					$wp_customize,
					'background_color',
					array(
						'label'   => esc_html_x( 'Background color', 'Customizer control', 'themecustomizeone' ),
						'section' => 'colors',
						'palette' => $colors,
					)
				)
			);
			
			$wp_customize->add_section( 'footer_options1', array(
			  'title' => __( 'Footer options', 'Universal Theme' ),
			  // 'capability' => 'edit_theme_options'
			));

			$wp_customize->add_setting( 'footer_options', array(
			  'title' => __( 'Footer column options', 'Universal Theme'),
			  // 'capability' => 'edit_theme_options',
			  'description' => __( 'Update footer options')
			));


			$wp_customize->add_control( 'footer_options', array(
			  'settings' => 'footer_options',
			  'section' => 'footer_options1',
			  'type' => 'radio',
			  'choices' => array(
			    1 => __( '1' ),
			    2 => __( '2' ),
			    3 => __( '3' ),
			    4 => __( '4' ),
			    5 => __( '5' ),
			    6 => __( '6' )
			  ),
			  'label' => __( 'Number of columns' )
			));

			$wp_customize->add_control( 'footer_options_header1', array(
			  'settings' => 'footer_options',
			  'section' => 'footer_options1',
			  'type' => 'text',
			  'label' => __( 'Footer header 1' )
			));



			$wp_customize->add_section( 
			'theme_slug_layout_options', 
			array(
			'title'    => esc_html__( 'Siderbar', 'themecustomize' ),
			// 'priority' => '120',
		    ) );

			// Add Sidebar customizer.
			$wp_customize->add_setting(
			 'sidebar_position',
			 array(
				'default'           => 'right',
				'sanitize_callback' => '',
				'type'              => 'option',
			) );


			$wp_customize->add_control(
			 'sidebar_position',
			 array(
				'label'    => __( 'Sidebar Position', 'themecustomize' ),
				'settings' => 'theme_slug_layout_options',
				'section'  => 'sidebar_position',
				'type'     => 'select',
				// 'priority' => 1,
				'choices'  => array(
					'full'   => __('No Sidebar', 'themecustomize'),
					'left'   => __( 'Left Sidebar', 'themecustomize' ),
					'right'  => __( 'Right Sidebar', 'themecustomize' ),
				),
				// 'use_widgets_block_editor'=>'Add Block',
			) );
			// $wp_customize->add_control( 'footer_options_header1', array(
			//   'settings' => 'theme_slug_layout_options',
			//   'section' => 'sidebar_position',
			//   'type' => 'text',
			//   'label' => __( 'Footer header 1' )
			// ));


            // Performance customizer
			$wp_customize->add_section(
				'themecustomize_performance',
					array(
					'title'      => esc_html__( 'Performance', 'themecustomize' ),
					'panel'      => '',
					// 'priority'   => 43
					)
			);


			$wp_customize->add_setting(
	           'perf_google_fonts_local',
					array(
						'default'           => 0,
						'sanitize_callback' => 'themecustomize_sanitize_checkbox'
					)
			);


			$wp_customize->add_control(
				new Theme_Customize_Switch_Control(
					$wp_customize,
					'perf_google_fonts_local',
					array(
						'label'    => __( 'Load Google Fonts Locally', 'themecustomize' ),
						'section'  => 'themecustomize_performance',
					)
				)
			);
             
            // Scroll to top customizer 
			$wp_customize->add_section(
				'themecustomize_scroll_to_top',
				array(
					'title'=>__('Scroll to Top','themecustomize'),
				));

			$wp_customize->add_setting(
				'scroll_to_top',
				array(
					'default'=>'right-top',
				    'sanitize_callback'=>'',
				    'type'              => 'option',
		     	));

			$wp_customize->add_control(
				'scroll_to_top',
				array(
					'label' =>__('Position','themecustomize'),
					'section' =>'themecustomize_scroll_to_top',
					'type'     => 'select',
					'choices'  => 
				array(
						'right-top'  => __( 'Right Top', 'themecustomize' ),
						'left-top'   => __( 'Left Top', 'themecustomize' ),
				   ) ,
				)
			  );

            require get_template_directory().'/inc/customizer/class-theme-customize-header-layout.php';
            // Header layout customize
            $wp_customize->add_section(
            	'themecustomize_header_layout',
            	array(
            		'title'=>__('Header','themecustomize'),
            	));

            $wp_customize->add_setting(
                'header_layout',
                array(
                	'default'=>'layout-1',
                	'sanitize_callback'=>'',
                	'type'=>'option',
                ));
            $wp_customize->add_control(
            	new Theme_Customize_Header_Layout(
            	$wp_customize,
                'header_layout',
                array(
                	'label'=>__('Header Layout','themecustomize'),
                	'section'=>'themecustomize_header_layout',
                	'choices'=>array(
                		'layout-1'=>get_template_directory_uri().'/assets/images/header-left.png',
                		'layout-2'=>get_template_directory_uri().'/assets/images/header-center.png',
                		'layout-3'=>get_template_directory_uri().'/assets/images/header-right.png',
                	),
                )
            )
            );    	  
            


			//weiget footer add customizer
			// $wp_customize->add_section(
			// 	'themecustomize-footer-widget',
			// 	array(
			// 		'title'=> __('Footer','themecustomize'),
			// 	));

			// $wp_customize->add_control(
			// 	'footer_tab',
			// 	array(
			// 		'section'=>'themecustomize-footer-widget',
			// 		'choices'=>array(
			// 			'general'=>__('General','themecustomize'),
			// 			'design'=>__('Design','themecustomize'),
			// 		)
			// 	));

			// Tabs.
			// $wp_customize->add_setting(
			// 	'woostify_setting',
			// 	array(
			// 		'sanitize_callback' => '',
			// 	)
			// );

			// $wp_customize->add_control(
			// 	new Woostify_Tabs_Control(
			// 		$wp_customize,
			// 		'woostify_setting',
			// 		array(
			// 			'section'  => 'woostify_footer',
			// 			'settings' => 'woostify_setting',
			// 			'choices'  => array(
			// 				'general' => __( 'General', 'woostify' ),
			// 				'design'  => __( 'Design', 'woostify' ),
			// 			),
			// 		)
			// 	)
			// );

			// $wp_customize->add_setting(
			// 	'footer_widget',
			// 		array(
			// 			'default'=> 0,
			// 		    'sanitize_callback'=>'',
			// 		    'type'              => 'option',
			//      	));

			// $wp_customize->add_control(
			// 	'footer_widget',
			// 	array(
			// 		'label' =>__('Widget Columns','themecustomize'),
			// 		'section' =>'themecustomize-footer-widget',
			// 		'type'     => 'select',
			// 		'choices'  => 
			// 	array(
			// 			0 => 0,
			// 			1 => 1,
			// 			2 => 2,
			// 			3 => 3,
			// 			4 => 4,
			// 	   ) ,
			// 	'tab'=>'general',
			// 	)
			//   );

			// // Footer background color divider.
			// $wp_customize->add_setting(
			// 	'footer_background_color_divider',
			// 	array(
			// 		'sanitize_callback' => '',
			// 	)
			// );
			// $wp_customize->add_control(
			// 		'footer_background_color_divider',
			// 		array(
			// 			'section'  => 'themecustomize-footer-widget',
			// 			// 'settings' => 'footer_background_color_divider',
			// 			'type'     => 'divider',
			// 			'tab'      => 'design',
			// 		)
			//     );

 
            require get_template_directory().'/inc/customizer/class-theme-customize-footer-tab.php';
			// include_once get_theme_file_path( 'classes/class-theme-customize-switch-control.php' );

            // footer customizer 
			$wp_customize->add_section(
				'themecustomize-footer-widget',
				array(
					'title'=>__('Footer','themecustomize'),
				));

			$wp_customize->add_setting( 
				'footer_tab',
				array(
					'sanitize_callback' => '',
				) );
	 
			$wp_customize->add_control(
			    new Example_Customize_Textarea_Control(
			        $wp_customize,
			        'footer-tab-widget',
			        array(
			            'section' => 'themecustomize-footer-widget',
			            'settings' => 'footer_tab',
			            'choices'  => array(   	
							'general' => __( 'General', 'themecustomize' ),
							'design'  => __( 'Design', 'themecustomize' ),
						),
			        )
			    )
			);

            require get_template_directory().'/inc/customizer/class-customizer-range-value-control.php';
            // Footer widget range 
            $wp_customize->add_setting(
            	'footer_range',
            	array(
            		'default'=> 10,
            		'sanitize_callback'=>'',
            		'type'=> 'option',
            		// 'transport'=>'postMessage',
            	));

            $wp_customize->add_control(
            	// New Customizer_Range_Value_Control(
            	// $wp_customize,
            	'footer_range',
            	array(
            		// 'label'=>__('Space','themecustomize'),
            		'label'    => __( 'Width' ),
            		'section'=>'themecustomize-footer-widget',
            		'type'=>'range',
            		'input_attrs' => 
            		array(
						'min'    => 1,
						'max'    => 100,
						'step'   => 1,
						'suffix' => 'px', //optional suffix
					),
            	// )
            ));

            // Footer widget columns.
			$wp_customize->add_setting(
				'footer_widget',
					array(
						'default'=> 0,
					    'sanitize_callback'=>'',
					    'type'              => 'option',
			     	));

			$wp_customize->add_control(
				'footer_widget',
				array(
					'label' =>__('Widget Columns','themecustomize'),
					'section' =>'themecustomize-footer-widget',
					'type'     => 'select',
					'choices'  =>
					array(
						0 => 0,
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
				    ),
				'tab'=>'general',
				)
			  );

            // Custom Text.
            $wp_customize->add_setting(
            	'footer_content',
		        array(
				   'default' => '',
				   'transport' => 'refresh',
				   'sanitize_callback' => ''
				));
            $wp_customize->add_control(
            	'footer_content',
            	array(
            		'label'=>__( 'Custom Text', 'themecustomize' ),
            		'type'=>'textarea',
            		'section'=>'themecustomize-footer-widget',
            		'input_attrs' => array( 
				        'class' => 'my-custom-class',
				        'style' => 'border: 1px solid #999',
				        'placeholder' => __( 'Enter message...' ),
				      ),
			        // 'tab'      => 'general',

            	)
            );
            
            // Footer Background color.	
            $wp_customize->add_setting(
             'footer_widget_bg_color',
				array(
				  'default' => '#ffffff',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_hex_color'
				)
				);

				$wp_customize->add_control( 'footer_widget_bg_color',
				array(
				  'label' => __( 'Background Color', 'themecustomize' ),
				  'section' => 'themecustomize-footer-widget',
				  'priority' => 10, // Optional. Order priority to load the control. Default: 10
				  'type' => 'color',
				  'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'\
				  'tab'      => 'design',
				)
				);

            // Footer heading color.
			$wp_customize->add_setting( 'footer_widget_heading_color',

				array(
				  'default' => '',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_hex_color'
				)
				);

				$wp_customize->add_control( 'footer_widget_heading_color',
				array(
				  'label' => __( 'Heading Color', 'themecustomize' ),
				  'section' => 'themecustomize-footer-widget',
				  'priority' => 11, // Optional. Order priority to load the control. Default: 10
				  'type' => 'color',
				  'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'\
				  'tab'      => 'design',
				)
				);	



            // Footer link color.
			$wp_customize->add_setting( 'footer_widget_link_color',

				array(
				  'default' => '#000000',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_hex_color'
				)
				);

				$wp_customize->add_control( 'footer_widget_link_color',
				array(
				  'label' => __( 'Link Color', 'themecustomize' ),
				  'section' => 'themecustomize-footer-widget',
				  'priority' => 12, // Optional. Order priority to load the control. Default: 10
				  'type' => 'color',
				  'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'\
				  'tab'      => 'design',
				)
				);	

            // Footer text color.
			$wp_customize->add_setting( 'footer_widget_text_color',

				array(
				  'default' => '#000000',
				  'transport' => 'refresh',
				  'sanitize_callback' => 'sanitize_hex_color'
				)
				);

				$wp_customize->add_control( 'footer_widget_text_color',
				array(
				  'label' => __( 'Text Color', 'themecustomize' ),
				  'section' => 'themecustomize-footer-widget',
				  'priority' => 13, // Optional. Order priority to load the control. Default: 10
				  'type' => 'color',
				  'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'\
				  'tab'      => 'design',
				)
				);		
			
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @since Theme Customize 1.0
		 *
		 * @param bool $checked Whether or not a box is checked.
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked = null ) {
			return (bool) isset( $checked ) && true === $checked;
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @since Theme Customize 1.0
		 *
		 * @return void
		 */
		public function partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @since Theme Customize 1.0
		 *
		 * @return void
		 */
		public function partial_blogdescription() {
			bloginfo( 'description' );
		}
	}
}

