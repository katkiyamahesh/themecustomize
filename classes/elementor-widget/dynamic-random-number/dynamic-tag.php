<?php  

class Elementor_Dynamic_Tag_Random_Number extends \Elementor\Core\DynamicTags\Tag {

	public function get_name() {
	    return 'random-number';
	}

	public function get_title() {
		return esc_html__( 'Random Number', 'elementor-random-number-dynamic-tag' );
	}
    
    // public function get_field() {
	// 	return [ 'dynamic' ];
	// }

	public function get_group() {
		return [ 'site' ];
	}

	public function get_categories() {
		return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY];
	}
     
    function WelcomeMsg()
	{
	    echo "Welcome to GeeksforGeeks";
	}

    protected function register_controls() {
		$this->add_control(
			'fields',
			[
				'label' => esc_html__( 'Fields', 'elementor-acf-average-dynamic-tag' ),
				'type' => 'text',
			]
		);
	}

	public function render() {
		$fields = $this->get_settings( 'fields' );
		
		$dynamic='';
		$dynamic.='<div class="dynamic-tag">
		'.$fields.'
		</div>';
		echo $dynamic;
		
		// print_r($fields);
		// $sum = 0;
		// $count = 0;
		// $value = 0;

		// Make sure that ACF if installed and activated
		// if ( function_exists( 'WelcomeMsg' ) ) {
		// 	echo "0";
		// 	// return;
		// }else{
		// 	echo "string";
		// }

		// foreach ( explode( ',', $fields ) as $index => $field_name ) {
		// 	// $field = get_field( $field_name );
		// 	// print_r($field);
		// 	// echo"nhjh";
		// 	if ( (int) $field > 0 ) {
		// 		$sum += (int) $field;
		// 		$count++;
		// 	}
		// }

		// if ( 0 !== $count ) {
		// 	$value = $sum / $count;
		// }

		// echo $value;

	}
}
?>