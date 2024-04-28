<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Theme_customize_One
 * @since Theme Customize-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-page/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'themecustomizeone' ), '%title' ),
			)
		);
	}

	

	// Previous/next post navigation.
	$themecustomizeone_next = is_rtl() ? theme_customize_one_get_icon_svg( 'ui', 'arrow_left' ) : theme_customize_one_get_icon_svg( 'ui', 'arrow_right' );
	$themecustomizeone_prev = is_rtl() ? theme_customize_one_get_icon_svg( 'ui', 'arrow_right' ) : theme_customize_one_get_icon_svg( 'ui', 'arrow_left' );

	// $themecustomizeone_next_label     = esc_html__( 'Next post', 'themecustomizeone' );
	// $themecustomizeone_previous_label = esc_html__( 'Previous post', 'themecustomizeone' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">%title' . $themecustomizeone_next . '</p>',
			'prev_text' => '<p class="meta-nav">' . $themecustomizeone_prev .'%title</p>',
		)
	);
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
