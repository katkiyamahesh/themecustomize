<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize 1.0
 */

?>
  <?php /*get_template_part( 'template-page/header/site-header-slider' );*/ ?> 
<article id="post-<?php the_ID();  ?>" <?php post_class(); ?>>
 
	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header alignwide">
			 <?php get_template_part( 'template-page/header/entry-header' ); ?> 
			 <?php theme_customize_one_post_thumbnail(); ?> 
		</header><!-- .entry-header -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="entry-header alignwide">
			<?php theme_customize_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
 			<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'themecustomizeone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'themecustomizeone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
