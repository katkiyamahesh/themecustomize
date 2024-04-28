<?php
/**
 *Footer widget range Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize 1.0
 */
class Customizer_Range_Value_Control extends WP_Customize_Control {
	public $type = 'range-value';

	public function enqueue() {
		// wp_enqueue_script( 'customizer-range-value-control-js', get_template_directory_uri().'/inc/customizer/range/range.js', array( 'jquery' ), true );
		wp_enqueue_style( 'customizer-range-value-control-css', get_template_directory_uri() . '/inc/customizer/range/range.css' ) ;
	}

	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>">
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}

	
}