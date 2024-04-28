<?php
/**
 * Template part for displaying posts
 */

  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	  <?php theme_customize_one_post_thumbnail(); ?> 
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>	
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>		
	</header>

	<footer class="entry-footer default-max-width">
		<?php theme_customize_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<div class="entry-content">
		<?php
		the_content(
			twenty_twenty_one_continue_reading_text();
		);
		

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