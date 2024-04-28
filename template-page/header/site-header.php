<?php
/**
 * Displays the site header.
 */

$header_classes  = 'site-header';
$header_classes .= has_custom_logo() ? ' has-logo' : '';
$header_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$header_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $header_classes ); ?> header-<?php echo get_option('header_layout'); ?>">

<div class="site-head" >

	<?php get_template_part( 'template-page/header/site-branding' ); ?>
	<?php get_template_part( 'template-page/header/site-nav' ); ?>
	
</div>

</header><!-- #masthead -->
