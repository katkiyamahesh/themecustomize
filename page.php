<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();?>

 <div id="tc-container" class="tc-site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
/* Start the Loop */
while ( have_posts() ) :
	 the_post();

	get_template_part( 'template-page/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {

         comments_template(); 
		
	}
endwhile; // End of the loop.
?>
		</main><!-- #main -->
			</div><!-- #primary -->

	<?php get_sidebar();?>
	</div>
	<?php
// get_sidebar();
get_footer();
?>