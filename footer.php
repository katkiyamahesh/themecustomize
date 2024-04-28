<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */

 ?>
	
		</div><!-- #content -->

		<?php
		$footer_widget = get_option( 'footer_widget');
		if( $footer_widget > 0 ){

        $footer_range = get_option( 'footer_range');
		$footer_bg_color=get_theme_mod( 'footer_widget_bg_color', 'default' );
		$footer_text_color=get_theme_mod( 'footer_widget_text_color', 'default' );
		$footer_link_color=get_theme_mod( 'footer_widget_link_color', 'default' );


        ?>
		<style>
			.foooter-widget-option{
				background-color: <?php echo $footer_bg_color; ?>;
				color: <?php echo $footer_text_color; ?>;
				margin-top: <?php echo $footer_range;?>px;
			}
			.menu-footer-widget li.menu-item a{
				color: <?php echo $footer_link_color; ?>;
			}
			

		</style>

      <div class="foooter-widget-option" >
        
	 	<aside class="site-footer-widget footer-widget-col-<?php echo $footer_widget;?>">
		 <?php dynamic_sidebar( 'sidebar-2' ); ?>
		</aside><!-- .widget-area -->

      </div>
<?php
	
	     } 
		?>

		<footer id="colophon" class="site-footer">
			<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->

			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '<div class="privacy-policy">', '</div>' );
			}
			?>

			<div class="powered-by">
				<?php 
				// $footer_copy=get_option('footer_content');
				// echo $footer_copy;die();
 
				?>
				<?php
				printf(
					/* translators: %s: WordPress. */
					esc_html__( 'Proudly powered by %s.', 'themecustomizeone' ),
					'<a href="' . esc_url( __( 'https://wordpress.org/', 'themecustomizeone' ) ) . '">WordPress</a>'
				);
				?>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->
<a id="scroll-top" class="show" style="text-decoration: none;"></a>


<a href="#" id="scroll-to-top" class="scroll-to-<?php
echo $scroll = get_option( 'scroll_to_top' ); 
?>"></a>

 <?php wp_footer(); ?> 
 
</body>
</html>