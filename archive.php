<?php
/**
* The template for displaying archive pages
*
*/
get_header();

$description = get_the_archive_description();

// echo $description;
// echo "decription check";
?>

<?php
the_archive_description( '<div class="taxonomy-description">', '</div>' );
// echo do_shortcode('[yourthemeslug_categories ="1"]');
// do_action [yourthemeslug_categories cat_ids = “1”]
          
// die("gkjhb")
?>

<?php if ( have_posts() ) : 
  // $catID = get_the_category();
 // echo category_description( $catID[1] );die("hi")?> 
    <header class="page-header alignwide">
        <?php  /*echo the_archive_title();die();*/ ?>
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
        
        <?php if ( $description ) : ?>
        <div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
        <?php endif; ?>
    </header><!-- .page-header -->
    
    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <?php get_template_part( 'template-page/content/content' , get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
    <?php endwhile; ?>

    <?php theme_customize_one_the_posts_navigation(); ?>

    <?php else : ?>
    <?php get_template_part( 'template-page/content/content-none' ); ?>
    <?php endif; ?>

<?php get_footer(); ?>