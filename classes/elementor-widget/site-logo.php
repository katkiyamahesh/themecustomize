<?php  
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Site_Widget extends \Elementor\Widget_Base {

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
		return 'site-logo';
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
		return esc_html__( 'Site logo demo', 'elementor-site-widget' );
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
		return 'eicon-nav-menu';
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

	public function get_keywords() {
		return [ 'site', 'logo' ,'demo'];
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
			'demo',
			[
				'label' => esc_html__( 'Site Logo', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// $this->add_group_control(
		// 	Group_Control_Image_Size::get_type(),
		// 	[
		// 		'name'    => 'site_logo_size',
		// 		'label'   => __( 'Image Size', 'header-footer-elementor' ),
		// 		'default' => 'medium',
		// 	]
		// );
	}

	/**
	 * Render Site Image output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.3.0
	 * @param array $size returns the size of an image.
	 * @access public
	 */
	public function site_image_url( $size ) {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['custom_image']['url'] ) ) {
			$logo = wp_get_attachment_image_src( $settings['custom_image']['id'], $size, true );
		} else {
			$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), $size, true );
		}
		return $logo[0];
	}

	protected function render() {
		$link     = '';

		$settings = $this->get_settings_for_display();   
		// print_r($settings);
		// $size = $settings['site_logo_size_size']; 
        $demo=the_custom_logo();
        ?>
       <div class="site-logo"><?php $demo; ?></div>
       <?php
		// $site_image = $this->site_image_url( $size );
		// echo $site_image;
		// echo '<img src="' .esc_url( $site_image['url'] ).'" alt="">';
		// die();
	}


}
?>