<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
?>

	<header class="page-header alignwide">
		<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'themecustomizeone' ); ?></h1>
	</header><!-- .page-header -->

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
			<p><?php esc_html_e( 'This page not found !sorry', 'themecustomizeone' ); ?></p>
		    <?php get_search_form(); ?> 
		</div><!-- .page-content -->
	</div><!-- .error-404 -->

<?php
get_footer();
