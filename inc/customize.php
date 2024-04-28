<?php
/**
 * Theme Customize Customizer functionality
 *
 */



/**
 * Register color schemes for Theme Customize.
 *
 * Can be filtered with {@see 'theme_customize_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Sidebar Background Color.
 * 3. Box Background Color.
 * 4. Main Text and Link Color.
 * 5. Sidebar Text and Link Color.
 * 6. Meta Box Background Color.
 *
 
 */
function theme_customize_get_color_schemes() {
	/**
	 * Filters the color schemes registered for use with Theme Customize.
	 *
	 * The default schemes include 'default', 'dark', 'yellow', 'pink', 'purple', and 'blue'.
	 *
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, sidebar
	 *                              background, box background, main text and link, sidebar text and link,
	 *                              meta box background.
	 *     }
	 * }
	 */
	return apply_filters(
		'theme_customize_color_schemes',
		array(
			'default' => array(
				'label'  => __( 'Default', 'themecustomize' ),
				'colors' => array(
					'#f1f1f1',
					'#ffffff',
					'#ffffff',
					'#333333',
					'#333333',
					'#f7f7f7',
				),
			),
			'dark'    => array(
				'label'  => __( 'Dark', 'themecustomize' ),
				'colors' => array(
					'#111111',
					'#202020',
					'#202020',
					'#bebebe',
					'#bebebe',
					'#1b1b1b',
				),
			),
			'yellow'  => array(
				'label'  => __( 'Yellow', 'themecustomize' ),
				'colors' => array(
					'#f4ca16',
					'#ffdf00',
					'#ffffff',
					'#111111',
					'#111111',
					'#f1f1f1',
				),
			),
			'pink'    => array(
				'label'  => __( 'Pink', 'themecustomize' ),
				'colors' => array(
					'#ffe5d1',
					'#e53b51',
					'#ffffff',
					'#352712',
					'#ffffff',
					'#f1f1f1',
				),
			),
			'purple'  => array(
				'label'  => __( 'Purple', 'themecustomize' ),
				'colors' => array(
					'#674970',
					'#2e2256',
					'#ffffff',
					'#2e2256',
					'#ffffff',
					'#f1f1f1',
				),
			),
			'blue'    => array(
				'label'  => __( 'Blue', 'themecustomize' ),
				'colors' => array(
					'#e9f2f9',
					'#55c3dc',
					'#ffffff',
					'#22313f',
					'#ffffff',
					'#f1f1f1',
				),
			),
		)
	);
}

if ( ! function_exists( 'theme_customize_get_color_scheme' ) ) :
	/**
	 * Get the current Theme Customize color scheme.
	 *
	 */
	function theme_customize_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
		$color_schemes       = theme_customize_get_color_schemes();
        // echo $color_scheme_option; die("h");
		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif; // twentyfifteen_get_color_scheme()


/**
 * Returns CSS for the color schemes.
 *
 */
function theme_customize_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args(
		$colors,
		array(
			'background_color'            => '',
			'header_background_color'     => '',
			
		)
	);

	$css = <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}

	/* Sidebar Background Color */
	body:before,
	.site-header {
		background-color: {$colors['header_background_color']};
	}

	
	
CSS;

	return $css;
}

