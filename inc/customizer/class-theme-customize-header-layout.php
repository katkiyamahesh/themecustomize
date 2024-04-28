<?php
/**
 * Header Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize 1.0
 */

class Theme_Customize_Header_Layout extends WP_Customize_Control{

	public $type = 'header_layout';

	public function render_content() {

		// echo $total_tabs = count( $this->choices );
		$name = '_customize-radio-' . $this->id;
		?>

		<style type="text/css">

			.radio-image-item img{
				border: 3px solid #fcfcfc;
			}
			.radio-image-item.active img{
				border: 3px solid #5ea1ed;
			}
			.radio-image-item input[type=radio]{
				display: none !important;
			}
			
		</style>

        <script type="text/javascript">
			( function( $ ) {

				// $('.radio-image-item input[type="radio"]').on('click', function() {
				// 	$('image-select').attr('checked',true);

				// 	alert("workin");

				// });

			} )( jQuery );
        </script>
		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) {
		    ?>
				<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" class="radio-image-item <?php echo ( $this->value() === $value ) ? 'active' : ''; ?>">
					<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( ucwords( str_replace( '-', ' ', $value ) ) ); ?>">
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>"
						id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>"
						<?php
							$this->link();
							checked( $this->value(), $value );
						?>>

				</label>

			<?php } ?>
		</div>
		<?php


	}

}
