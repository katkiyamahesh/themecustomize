<?php
/**
 * Elementor currency control.
 *
 * A control for displaying a select field with the ability to choose currencies.
 *
 * @since 1.0.0
 */
class Elementor_Currency_Control extends \Elementor\Base_Data_Control {

	public function get_type() {
		return 'currency';
	}

	public static function get_currencies() {
		return [
			'USD' => 'USD ($)',
			'EUR' => 'EUR (€)',
			'GBP' => 'GBP (£)',
			'JPY' => 'JPY (¥)',
			'ILS' => 'ILS (₪)',
		];
	}

	protected function get_default_settings() {
		return [
			'currencies' => self::get_currencies()
		];
	}

	public function get_default_value() {
		return 'EUR';
	}

	public function content_template() {
		// echo get_default_settings();
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">

			<# if ( data.label ) {#>
			<label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>

			<div class="elementor-control-input-wrapper">
				<select id="<?php echo $control_uid; ?>" data-setting="{{ data.name }}">
					<option value=""><?php echo esc_html__( 'Select currency', 'elementor-currency-control' );?></option>
					<# _.each( data.currencies, function( currency_label, currency_value ) { #>
					<option value="{{ currency_value }}">{{{ currency_label }}}</option>
					<# } ); #>
				</select>
			</div>

		</div>

		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}


}