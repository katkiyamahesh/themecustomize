<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$themecustomizeone_unique_id = wp_unique_id( 'search-form-' );
echo $themecustomizeone_unique_id;

$themecustomizeone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
// echo $themecustomizeone_aria_label;
?>
<form role="search" <?php echo $themecustomizeone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $themecustomizeone_unique_id ); ?>"><?php _e( 'Search&hellip;', 'themecustomizeone' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
	<input type="search" id="<?php echo esc_attr( $themecustomizeone_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'themecustomizeone' ); ?>" />
</form>
