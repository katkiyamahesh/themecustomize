<?php
	class Elementor_Credit_Card_Number_Field extends \ElementorPro\Modules\Forms\Fields\Field_Base{

		public function get_type() {
		    return 'credit-card-number';
		}

		public function get_name() {
		    return esc_html__( 'Credit Card Number', 'elementor-form-credit-card-number-field' );
	    }
	    public function render( $item, $item_index, $form ) {
		$form_id = $form->get_id();

		$form->add_render_attribute(
			'input' . $item_index,
			[
				'class' => 'elementor-field-textual',
				'for' => $form_id . $item_index,
				'type' => 'tel',
				'inputmode' => 'numeric',
				'maxlength' => '19',
				'pattern' => '[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}',
				'placeholder' => $item['credit-card-placeholder'],
				'autocomplete' => 'cc-number',
			]
		);

		echo '<input ' . $form->get_render_attribute_string( 'input' . $item_index ) . '>';
	}
	public function validation( $field, $record, $ajax_handler ) {
		if ( empty( $field['value'] ) ) {
			return;
		}

		if ( preg_match( '/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/', $field['value'] ) !== 1 ) {
			$ajax_handler->add_error(
				$field['id'],
				esc_html__( 'Credit card number must be in "XXXX XXXX XXXX XXXX" format.', 'elementor-form-credit-card-number-field' )
			);
		}
	}
	public function update_controls( $widget ) {
		$elementor = \Elementor\Plugin::elementor();

		$control_data = $elementor->controls_manager->get_control_from_stack( $widget->get_unique_name(), 'form_fields' );

		if ( is_wp_error( $control_data ) ) {
			return;
		}

		$field_controls = [
			'credit-card-placeholder' => [
				'name' => 'credit-card-placeholder',
				'label' => esc_html__( 'Card Placeholder', 'elementor-form-credit-card-number-field' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'xxxx xxxx xxxx xxxx',
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],
		];

		$control_data['fields'] = $this->inject_field_controls( $control_data['fields'], $field_controls );

		$widget->update_control( 'form_fields', $control_data );
	}


 

	}
?>