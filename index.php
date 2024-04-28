<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 */
get_header();
?>
<div id="tc-container" class="tc-site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
<!-- wordpress -->
<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
		<header class="page-header alignwide">
			<h1 class="page-title"><?php  single_post_title(); ?></h1>
		</header><!-- .page-header -->
	<?php endif; ?>

	<?php
	if ( have_posts() ) {

		// Load posts loop.
		while ( have_posts() ) {
		 the_post();

			get_template_part( 'template-page/content/content', get_theme_mod( '', 'excerpt' ) );
		}

		// Previous/next page navigation.
		theme_customize_one_the_posts_navigation();

	} else {

		// If no content, include the "No posts found" template.
		get_template_part( 'template-page/content/content-none' );

	}
    ?>
    </main><!-- #main -->
			</div><!-- #primary -->

	<?php get_sidebar();?>
	</div>
	<?php
    // get_sidebar();
	get_footer();	?>