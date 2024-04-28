<?php
/*
*WordPress Importer class for managing the import process of a WXR file
*
*/
require_once ABSPATH . 'wp-admin/includes/import.php';

if ( ! class_exists( 'WP_Importer' ) ) {
	$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	if ( file_exists( $class_wp_importer ) )
		require $class_wp_importer;
}

/** Functions missing in older WordPress versions. */
require_once 'compat.php';

/** WXR_Parser class */
require_once 'class-wxr-parser.php';

/** WXR_Parser_SimpleXML class */
require_once 'class-wxr-parser-simplexml.php';

/** WXR_Parser_XML class */
require_once 'class-wxr-parser-xml.php';

/** WXR_Parser_Regex class */
require_once 'class-wxr-parser-regex.php';			

/** WP_Import class */
require_once 'class-themecustomize-import.php';

function theme_customize_add_admin_import(){

	$GLOBALS['wp_import'] = new WP_Import_test();
    
	add_menu_page('Theme Customize option', 'Theme Customize Import', 'manage_options', 'my-menu', array($GLOBALS['wp_import'],'dispatch'),'dashicons-download' );
    add_submenu_page('my-menu', 'Submenu Page Title', 'Whatever You Want', 'manage_options', 'my-menu' );
}

add_action('admin_menu','theme_customize_add_admin_import');


?>
