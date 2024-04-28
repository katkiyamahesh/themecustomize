<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php theme_customize_one_post_thumbnail(); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer default-max-width">
		<?php theme_customize_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<div class="entry-content">
		<?php function_name_given(get_the_ID()); ?>
		<li > <i class="fa fa-eye"></i>                            
		<?php                             
		if ( get_post_meta( get_the_ID() , 'wpb_post_views_count', true) == '') {                               
		  echo '0' ;                            
		} else { 
		echo get_post_meta( get_the_ID() , 'wpb_post_views_count', true); };                            
		?>                             
		</li>
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


	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-page/post/author' ); ?> 
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
