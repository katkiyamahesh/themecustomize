<?php
/**
 * Template part for displaying post archives and search results
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php get_template_part( 'template-page/header/excerpt-header', get_post_format() ); ?>

    <footer class="entry-footer default-max-width">
		<?php theme_customize_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<div class="entry-content">
	 <?php get_template_part( 'template-page/excerpt/excerpt', get_post_format() ); ?> 
	</div><!-- .entry-content -->

	
</article><!-- #post-${ID} -->
