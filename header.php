<?php
/*
*Header Template
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php themecustomizeone_the_html_classes(); ?>>
<head>
    <title><?php wp_title('');?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" >
    <meta http-equiv="pragma" content="no-cache" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div id="page" class="site">
     <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'themecustomizeone' ); ?></a>

	<?php get_template_part( 'template-page/header/site-header' ); ?>

    <div id="content" class="site-content"> <!-- content start -->
    <?php
    // $color_scheme_option = get_option( 'footer_range' );
    // $scroll = get_option( 'header_layout');
    // echo $color_scheme_option;
    // echo $scroll;
 // if($scroll > 0){
 //    echo "string";
 //    echo $scroll;
 // } 
    
?>

