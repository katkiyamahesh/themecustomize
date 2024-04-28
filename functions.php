<?php
 /*
 * Functions and definitions
 */
// echo wp_get_theme()->get('TextDomain');
   

if ( ! function_exists( 'theme_customize_setup' ) ) {

   function theme_customize_setup(){

   	
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on Theme Customize, use a find and replace
	* to change 'themecustomizeone' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'themecustomizeone', get_template_directory() . '/languages' );

    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' ); //title show

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for custom line height controls.
	add_theme_support( 'custom-line-height' );

	// Add support for experimental link color control.
	add_theme_support( 'experimental-link-color' );

	// Add support for experimental cover block spacing.
	add_theme_support( 'custom-spacing' );

	// Add support for custom units.
	// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
	add_theme_support( 'custom-units' );

	// Remove feed icon link from legacy RSS widget.
	add_filter( 'rss_widget_feed_link', '__return_false' );

	
	/**
	* Adds custom classes to the array of body classes.
	*
	*/
	// function theme_customize_body_classes( $classes ) {

	// // Adds a class of no-sidebar to sites without active sidebar.
	// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	// 	$classes[] = 'no-sidebar';
	// }

	// return $classes;
	// }
	// add_filter( 'body_class', 'theme_customize_body_classes' );				

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );	

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );

		if ( 127 > Theme_customize_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

	$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
	add_editor_style( $editor_stylesheet_path );
			
	/**
	 * Add post-formats support.
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1568, 9999 );

 
    /*
    * Navigation Menu 
    */
	register_nav_menus(
			array(
				'primary' => esc_html__( 'primaryary menu', 'themecustomize' ),
				'footer'  => esc_html__( 'Secondary menu', 'themecustomize' ),
			)
		);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

    /*
	 * Add support for core custom logo
	 */

	$logo_width  = 300;
	$logo_height = 100;

	add_theme_support(
		'custom-logo',
		array(
			'width'                => $logo_width,
			'height'               => $logo_height,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);

	// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);
		

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'themecustomizeone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'themecustomizeone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'themecustomizeone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'themecustomizeone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'themecustomizeone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'themecustomizeone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'themecustomizeone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'themecustomizeone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'themecustomizeone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'themecustomizeone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'themecustomizeone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

   }
}
add_action( 'after_setup_theme', 'theme_customize_setup' );

//post view count
function gt_get_post_view() {

    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    echo $count;
    die();
    return "$count views";
}

function gt_set_post_view() {

    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}

add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
function gt_posts_column_views( $columns ) {

    $columns['post_views'] = 'Views';
    return $columns;
}

add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
function gt_posts_custom_column_views( $column ) {

    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}

if ( ! function_exists( 'function_name_given' ) ) :    
/**     * get the value of view.     */ 
function function_name_given($postID) {   
		$count_key = 'wpb_post_views_count';   
		$count = get_post_meta($postID, $count_key, true);    
		// print_r($count);
		if($count ==''){

			$count = 1;     
			// echo "true 1";
			delete_post_meta($postID, $count_key);        
			add_post_meta($postID, $count_key, '1');    
		} else {    

			$count++;        
			update_post_meta($postID, $count_key, $count);    
		}
} 
endif; 
add_action('init','function_name_given');


// custom block gutenberg
function custom_gutenberg_block( $location ){

   wp_enqueue_script('blockjs',get_template_directory_uri().'/assets/js/block.js',array('wp-blocks'));

	register_block_type('ourtheme/wordpressblocks',array('editor_script'=>'blockjs'));

	
// $menus = wp_get_nav_menus();
// print_r($menus);

}
add_action('init','custom_gutenberg_block');


//elementor widgets add
function register_oembed_widget( $widgets_manager ) {

	// require_once( get_template_directory '/widgets/oembed-widget.php' );
   require get_template_directory().'/classes/elementor-widget/elementor-widget.php';
	$widgets_manager->register( new Elementor_oEmbed_Widget() );

   require get_template_directory().'/classes/elementor-widget/site-logo.php';
	$widgets_manager->register( new Elementor_Site_Widget() );
   
   require get_template_directory().'/classes/elementor-widget/nav-menu.php';
	$widgets_manager->register( new Elementor_Navmenu_Widget() );

	require get_template_directory().'/classes/elementor-widget/Test-widget.php';
	$widgets_manager->register( new Elementor_Test_Widget() );

	require get_template_directory().'/classes/elementor-widget/controls-widget/currency-widget.php';
	$widgets_manager->register( new Elementor_Currency_Widget() );

   require get_template_directory(). '/classes/elementor-widget/elementor-emojionearea-control/test-widget.php' ;
	$widgets_manager->register( new Elementor_emoji_Widget() );

	require get_template_directory(). '/classes/elementor-widget/form.php' ;
	$widgets_manager->register( new Elementor_form_Widget() );

}
add_action( 'elementor/widgets/register', 'register_oembed_widget' );

function register_emojionearea_control( $controls_manager ) {

	require get_template_directory().'/classes/elementor-widget/controls-widget/currency.php';
	$controls_manager->register( new Elementor_Currency_Control() );

    // ger_template_directory();
	require get_template_directory().'/classes/elementor-widget/elementor-emojionearea-control/emojionearea.php';
   $controls_manager->register( new Elementor_EmojiOneArea_Control() );	
}
add_action( 'elementor/controls/register', 'register_emojionearea_control' );

function register_random_number_dynamic_tag( $dynamic_tags_manager ) {

	$dynamic_tags_manager->register_group(
		'site',
		[
			'title' => esc_html__( 'Site', 'elementor-acf-average-dynamic-tag' )
		]
	);

    require get_template_directory().'/classes/elementor-widget/dynamic-random-number/dynamic-tag.php';
	$dynamic_tags_manager->register( new Elementor_Dynamic_Tag_Random_Number );
}
add_action( 'elementor/dynamic_tags/register', 'register_random_number_dynamic_tag' );

function add_new_ping_action( $form_actions_registrar ) {

	require get_template_directory().'/classes/elementor-widget/form-action/form-actions.php';
	$form_actions_registrar->register( new Ping_Action_After_Submit() );

}
add_action( 'elementor_pro/forms/actions/register', 'add_new_ping_action' );

function add_new_credit_card_number_field( $form_fields_registrar ) {

	require get_template_directory().'/classes/elementor-widget/form-fields/credit-card-number.php';

	$form_fields_registrar->register( new Elementor_Credit_Card_Number_Field() );

}
add_action( 'elementor/forms/fields/register', 'add_new_credit_card_number_field' );

function unregister_widgets( $controls_manager  ) {

	// $widgets_manager->unregister( 'Test' );
	// $widgets_manager->unregister( 'oembed' );
	// $controls_manager->unregister( 'currency' );

}
add_action( 'elementor/controls/register', 'unregister_widgets' );

// /https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png
add_filter( 'avatar_defaults', 'newgravatar' );  

function newgravatar ($avatar_defaults) {  
    $myavatar = 'https://www.nicepng.com/png/full/136-1366211_group-of-10-guys-login-user-icon-png.png';
   
	    $avatar_defaults[$myavatar] = "FB Profile Picture";  
	    return $avatar_defaults;  	
}

// function theme_customize_sidebar_class( $classes ){

	 
   
  
// 	return $classes;

// }
// add_filter( 'body_class', 'theme_customize_sidebar_class' );


/**
 * Register widget area.
 *
 * @since Theme Customize 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function theme_customize_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'themecustomizeone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'themecustomizeone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-1', 'themecustomizeone' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'themecustomizeone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebars(
		array(
			'name'          => esc_html__( 'Footer-1', 'themecustomizeone' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'themecustomizeone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'theme_customize_one_widgets_init' );

// function yourthemeslug_category_list_description() {
// $displaycategory = '<ul>';
// $categories = get_terms( 'category', 'orderby=count&hide_empty=0' );
// if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
//   foreach ( $categories as $key => $item ) {
//     $displaycategory .= '<li><strong>'. $item->name . '</strong><br />'. $item->description . '</li>';
//   }
// }
// $displaycategory .= '</ul>';
 
// return $displaycategory;
// }
// add_shortcode('yourthemeslug_categories', 'yourthemeslug_category_list_description');

/**
 * Enqueue scripts and styles.
 *
 * @since Theme Customize 1.0
 *
 * @return void
 */
function theme_customize_one_scripts() {

	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'theme-customize-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'theme-customize-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}
   
   wp_enqueue_script('theme-customize',get_template_directory_uri().'/assets/js/theme-custom.js');
   
  	wp_enqueue_style('font-awesome-icon','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

	wp_register_script('theme-customize-one-ie11-polyfills-asset',get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

    // wp_enqueue_script('blockjs',get_template_directory_uri().'/assets/js/block.js',array('wp-blocks'));


	// Register the IE11 polyfill loader.
	wp_register_script(
		'theme-customize-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'theme-customize-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'theme-customize-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script('theme-customize-one-primary-navigation-script',get_template_directory_uri() . '/assets/js/primary-navigation.js',array(),wp_get_theme()->get( 'Version' ),true);
	}
	// Responsive embeds script.
	wp_enqueue_script(
		'theme-customize-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'theme-customize-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
}
add_action( 'wp_enqueue_scripts', 'theme_customize_one_scripts' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Theme Customize 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function theme_customize_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_customize_content_width', 750 );
}
add_action( 'after_setup_theme', 'theme_customize_content_width', 0 );


function theme_customize_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		 include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
		</script>
		<?php
	}
}
add_action( 'wp_print_footer_scripts', 'theme_customize_one_skip_link_focus_fix' );


//Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/customize.php';

// SVG Icons class.
require get_template_directory().'/classes/class-theme-customize-one-svg-icons.php';

// Custom color classes.
require get_template_directory() .'/classes/class-theme-customize-one-custom-colors.php';
new Theme_customize_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory().'/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory().'/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory().'/inc/template-tags.php';

// Customizer additions.
require get_template_directory().'/classes/class-theme-customize-one-customize.php';
new Theme_customize_One_Customize();

// Dark Mode.
// require_once get_template_directory().'/classes/class-theme-customize-one-dark-mode.php';
// new Theme_customize_One_Dark_Mode();

//google font
// require get_template_directory().'/classes/class-theme-customize-switch-control.php';

/*-----------------------------------------------------------------------------------*/
/*	Load Widgets, Shortcodes, Metaboxes & Plugins
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory().'/inc/class-tgm-plugin-activation.php';
require_once get_template_directory().'/inc/theme-active-plugin.php';

//theme option import
require get_template_directory().'/inc/theme-option.php';



/**
 * Calculate classes for the main <html> element.
 *
 * @since Theme Customize 1.0
 *
 * @return void
 */
function themecustomizeone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Theme Customize 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'themecustomizeone_html_classes', '' );

	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}


function theme_slug_body_classes() {
	
	// Switch sidebar to left.
	// if ( 'left-top' === get_option( 'scroll_to_top' ) ) {
	// 	echo "left";
	// 	echo '<script type="text/javascript">
 //                   (function($){
 //                   	debugger;
 //                        alert("left");
 //                        $("#scroll-to-top").addClass("scroll-left"); 
 //                   });
 //               </script>';
	// }else{
	// 	echo "Right";
	// }
	 // $scroll = get_option( 'scroll_to_top' ); 
    
  //   echo $scroll;
}
add_action('init','theme_slug_body_classes');


/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Theme Customize 1.0
 *
 * @return void
 */
function themecustomizeone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgest.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'themecustomizeone_add_ie_class' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator() {
		 // translators: Used between list items, there is a space after the comma. 
		return __( ', ', 'themecustomizeone' );
	}
endif;




// add_action( 'admin_init', 'my_redirect_if_user_not_logged_in' );
 
// function my_redirect_if_user_not_logged_in() {
 
// if ( !is_user_logged_in() && is_page('page slug or page ID here ') ) {
 
// wp_redirect( 'http://localhost/wordpresstheme');
 
// exit;
 
// }
 
// }