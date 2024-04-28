<?php

class Example_Customize_Textarea_Control extends WP_Customize_Control{


	public function enqueue() {
		wp_enqueue_style(
			'footer-tabs',
			get_template_directory_uri().'/inc/customizer/tabs/tabs.css',
			array()
			
		);

		wp_enqueue_script(
			'footer-tabs-js',
			get_template_directory_uri() .'/inc/customizer/tabs/tabs.js',
			true
		);
	}

	public $type = 'footer-tab-widget';
 
    public function render_content() {
    	$total_tabs = count( $this->choices );
    	// echo $total_tabs;
        ?>
        <div class="themecustomize-component-tabs wp-clearfix">
			<ul>
			<?php foreach ( $this->choices as $k => $choice ) { 
				?>
				<li data-tab="<?php echo esc_attr( $k ); ?>" class="themecustomize-tab-button"><?php echo esc_html( $choice ); ?></li>
			<?php } ?>
			</ul>
		</div>
		<style>
			.themecustomize-component-tabs .themecustomize-tab-button {
				width: calc( 100% / <?php echo (int) $total_tabs; ?>);
			}
		</style>
            
        <?php
    }
}